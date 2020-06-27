<?php

namespace App\Entity\Weather;

use App\Repository\Weather\WeatherRepository;
use DateTimeImmutable;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use function GuzzleHttp\Psr7\str;

/**
 * @ORM\Entity(repositoryClass=WeatherRepository::class)
 */
class Weather
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime", options={"comment":"Current date/time requested."})
     */
    private $date;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", options={"comment":"Current date/time requested in UNIX."})
     */
    private $dateUNIX;

    /**
     * @var string
     *
     * @ORM\Column(type="string", options={"comment":"The latitude of a location (in decimal degrees). Positive is north, negative is south."})
     */
    private $latitude;

    /**
     * @var string
     *
     * @ORM\Column(type="string", options={"comment":"The longitude of a location (in decimal degrees). Positive is east, negative is west."})
     */
    private $longitude;

    /**
     * @var string
     *
     * @ORM\Column(type="string", options={"comment":"The IANA timezone name for the requested location. This is used for text summaries and for determining when hourly and daily data block objects begin."})
     */
    private $timezone;

    /**
     * @var Information[]
     *
     * @ORM\OneToMany(targetEntity="App\Entity\Weather\Information", mappedBy="weather", cascade={"persist", "remove"}, fetch="EAGER")
     */
    private $informations;

    /**
     * @var Alert[]
     *
     * @ORM\OneToMany(targetEntity="App\Entity\Weather\Alert", mappedBy="weather", cascade={"persist", "remove"}, fetch="EXTRA_LAZY")
     * @ORM\OrderBy({"date" = "DESC"})
     */
    private $alerts;

    public function __construct(int $dateUNIX, string $latitude, string $longitude, string $timezone, ?float $precipIntensity, ?float $precipProbability, ?string $precipType, float $temperature, ?float $apparentTemperature, ?float $dewPoint, ?float $humidity, ?float $pressure, ?float $windSpeed, ?float $windGust, ?float $windBearing, ?float $cloudCover, ?float $uvIndex, ?float $visibility, ?float $ozone)
    {
        $this->date = $this->unixToDateTime($dateUNIX);
        $this->dateUNIX = $dateUNIX;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->timezone = $timezone;
        $this->informations = new ArrayCollection();
        $this->alerts = new ArrayCollection();

        $this->informations->add(new Information($this, $precipIntensity, $precipProbability, $precipType, $temperature, $apparentTemperature, $dewPoint, $humidity, $pressure, $windSpeed, $windGust, $windBearing, $cloudCover, $uvIndex, $visibility, $ozone));
    }

    public function __toString()
    {
        return (string)$this->id;
    }

    /**
     * @return Information|null
     */
    public function getTodayInformations()
    {
        return $this->informations->first();
    }

    public function getForecastInformations()
    {
        /** @var Information $information */
        return $this->informations->filter(function ($information) {
            if (is_null($information->getDate()) && is_null($information->getDateUnix())) {
                return false;
            }
            return true;
        });
    }

    static function unixToDateTime($unix): ?DateTimeImmutable
    {
        if (is_null($unix)) {
            return null;
        }

        return (new \DateTimeImmutable())
            ->setTimezone(new \DateTimeZone('Europe/Paris'))
            ->setTimestamp($unix);
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getDateUNIX(): ?int
    {
        return $this->dateUNIX;
    }

    public function setDateUNIX(int $dateUNIX): self
    {
        $this->dateUNIX = $dateUNIX;

        return $this;
    }

    public function getLatitude(): ?string
    {
        return $this->latitude;
    }

    public function setLatitude(string $latitude): self
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getLongitude(): ?string
    {
        return $this->longitude;
    }

    public function setLongitude(string $longitude): self
    {
        $this->longitude = $longitude;

        return $this;
    }

    public function getTimezone(): ?string
    {
        return $this->timezone;
    }

    public function setTimezone(string $timezone): self
    {
        $this->timezone = $timezone;

        return $this;
    }

    /**
     * @return Collection|Alert[]
     */
    public function getAlerts(): Collection
    {
        return $this->alerts;
    }

    public function addAlert(Alert $alert): self
    {
        if (!$this->alerts->contains($alert)) {
            $this->alerts[] = $alert;
            $alert->setWeather($this);
        }

        return $this;
    }

    public function removeAlert(Alert $alert): self
    {
        if ($this->alerts->contains($alert)) {
            $this->alerts->removeElement($alert);
            // set the owning side to null (unless already changed)
            if ($alert->getWeather() === $this) {
                $alert->setWeather(null);
            }
        }

        return $this;
    }

    public function addInformation(Information $information): self
    {
        if (!$this->informations->contains($information)) {
            $this->informations[] = $information;
            $information->setWeather($this);
        }

        return $this;
    }

    public function removeInformation(Information $information): self
    {
        if ($this->informations->contains($information)) {
            $this->informations->removeElement($information);
            // set the owning side to null (unless already changed)
            if ($information->getWeather() === $this) {
                $information->setWeather(null);
            }
        }

        return $this;
    }
}
