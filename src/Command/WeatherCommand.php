<?php

namespace App\Command;

use App\Util\Logger;
use App\Entity\Weather\Alert;
use App\Entity\Weather\Information;
use App\Entity\Weather\Weather;
use App\Exceptions\DarkSkyAPIException;
use App\Util\DotEnv;
use Doctrine\ORM\EntityManagerInterface;
use GuzzleHttp\Client;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class WeatherCommand extends Command
{
    protected static $defaultName = 'app:weather';

    /** @var Client */
    private $client;

    /** @var DotEnv */
    private $dotEnv;

    /** @var EntityManagerInterface */
    private $em;

    /** @var Logger */
    private $logger;

    /** @var string */
    private $darkSkyForecastURL;

    /** @var string */
    private $darkSkyApiKey;

    /** @var string */
    private $darkSkyLatitude;

    /** @var string */
    private $darkSkyLongitude;

    public function __construct(Client $client, DotEnv $dotEnv, EntityManagerInterface $em, Logger $logger)
    {
        parent::__construct(self::$defaultName);
        $this->client = $client;
        $this->dotEnv = $dotEnv;
        $this->em = $em;
        $this->logger = $logger;
        $this->darkSkyForecastURL = $this->dotEnv->load('DARK_SKY_FORECAST_URL');
        $this->darkSkyApiKey = $this->dotEnv->load('DARK_SKY_API_KEY');
        $this->darkSkyLatitude = $this->dotEnv->load('DARK_SKY_LATITUDE');
        $this->darkSkyLongitude = $this->dotEnv->load('DARK_SKY_LONGITUDE');
    }

    protected function configure()
    {
        $this->setDescription('Add a short description for your command');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->logger->start();

        $response = $this->client->request('GET', sprintf($this->darkSkyForecastURL, $this->darkSkyApiKey, $this->darkSkyLatitude, $this->darkSkyLongitude));

        if (200 != $response->getStatusCode()) {
            throw new DarkSkyAPIException('Something went wrong with the forecast URL.');
        }

        $data = json_decode($response->getBody()->getContents(), true);

        if (!isset($data['currently'])) {
            throw new DarkSkyAPIException(sprintf('There is no currently data.'));
        }

        $today = (new \DateTime('now'))->format('d');

        $weather = new Weather(
            $data['currently']['time'],
            $data['latitude'],
            $data['longitude'],
            $data['timezone'],
            $data['currently']['precipIntensity'] ?? null,
            $data['currently']['precipProbability'] ?? null,
            $data['currently']['precipType'] ?? null,
            $data['currently']['temperature'] ?? null,
            $data['currently']['apparentTemperature'] ?? null,
            $data['currently']['dewPoint'] ?? null,
            $data['currently']['humidity'] ?? null,
            $data['currently']['pressure'] ?? null,
            $data['currently']['windSpeed'] ?? null,
            $data['currently']['windGust'] ?? null,
            $data['currently']['windBearing'] ?? null,
            $data['currently']['cloudCover'] ?? null,
            $data['currently']['uvIndex'] ?? null,
            $data['currently']['visibility'] ?? null,
            $data['currently']['ozone'] ?? null
        );

        $this->em->persist($weather);
        $this->em->flush();

        if (0 === count($data['daily']['data'])) {
            return 0;
        }

        if ((Weather::unixToDateTime($data['daily']['data'][0]['time']))->format('d') != (Weather::unixToDateTime(time()))->format('d')) {
            throw new DarkSkyAPIException(sprintf('There is no daily data for today.'));
        }

        $forecast = $data['daily']['data'];

        foreach ($forecast as $daily) {
            if (Weather::unixToDateTime($daily['time'])->format('d') == $today) {
                $this->setInformations($weather->getTodayInformations(), $weather, $daily);
                continue;
            }

            $information = $this->createDailyInformations($weather, $daily);
            $this->setInformations($information, $weather, $daily);
            $information->setDate(Weather::unixToDateTime($daily['time']));
            $information->setDateUNIX($daily['time']);
            $this->em->persist($information);
        }

        $this->em->persist($weather);
        $this->em->flush();

        $this->logger->end(self::$defaultName, 'command', []);

        return 0;
    }

    private function setInformations(Information $information, Weather $weather, array $daily)
    {
        $information->setInformations(
            $weather,
            $daily['summary'] ?? null,
            $daily['icon'] ?? null,
            $daily['windGustTime'] ?? null,
            $daily['uvIndexTime'] ?? null,
            $daily['sunriseTime'] ?? null,
            $daily['sunsetTime'] ?? null,
            $daily['moonPhase'] ?? null,
            $daily['precipIntensityMax'] ?? null,
            $daily['precipIntensityMaxTime'] ?? null,
            $daily['temperatureHigh'] ?? null,
            $daily['temperatureHighTime'] ?? null,
            $daily['temperatureLow'] ?? null,
            $daily['temperatureLowTime'] ?? null,
            $daily['apparentTemperatureHigh'] ?? null,
            $daily['apparentTemperatureHighTime'] ?? null,
            $daily['apparentTemperatureLow'] ?? null,
            $daily['apparentTemperatureLowTime'] ?? null,
            $daily['temperatureMin'] ?? null,
            $daily['temperatureMinTime'] ?? null,
            $daily['temperatureMax'] ?? null,
            $daily['temperatureMaxTime'] ?? null,
            $daily['apparentTemperatureMin'] ?? null,
            $daily['apparentTemperatureMinTime'] ?? null,
            $daily['apparentTemperatureMax'] ?? null,
            $daily['apparentTemperatureMaxTime'] ?? null
        );
    }

    private function createDailyInformations(Weather $weather, array $daily)
    {
        return new Information(
            $weather,
            $daily['precipIntensity'] ?? null,
            $daily['precipProbability'] ?? null,
            $daily['precipType'] ?? null,
            $daily['temperature'] ?? null,
            $daily['apparentTemperature'] ?? null,
            $daily['dewPoint'] ?? null,
            $daily['humidity'] ?? null,
            $daily['pressure'] ?? null,
            $daily['windSpeed'] ?? null,
            $daily['windGust'] ?? null,
            $daily['windBearing'] ?? null,
            $daily['cloudCover'] ?? null,
            $daily['uvIndex'] ?? null,
            $daily['visibility'] ?? null,
            $daily['ozone'] ?? null
        );
    }
}
