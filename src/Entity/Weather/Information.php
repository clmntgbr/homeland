<?php

namespace App\Entity\Weather;

use App\Repository\Weather\InformationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InformationRepository::class)
 */
class Information
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(type="datetime", options={"comment":"Current date/time requested."}, nullable=true)
     */
    private $date;

    /**
     * @var int|null
     *
     * @ORM\Column(type="integer", options={"comment":"Current date/time requested in UNIX."}, nullable=true)
     */
    private $dateUNIX;

    /**
     * @var float|null
     *
     * @ORM\Column(type="float", nullable=true, options={"comment":"The intensity (in inches of liquid water per hour) of precipitation occurring at the given time. This value is conditional on probability (that is, assuming any precipitation occurs at all)."})
     */
    private $precipIntensity;

    /**
     * @var float|null
     *
     * @ORM\Column(type="float", nullable=true, options={"comment":"The probability of precipitation occurring, between 0 and 1, inclusive."})
     */
    private $precipProbability;

    /**
     * @var string|null
     *
     * @ORM\Column(type="string", nullable=true, options={"comment":"The type of precipitation occurring at the given time. If defined, this property will have one of the following values: 'rain', 'snow', or 'sleet'."})
     */
    private $precipType;

    /**
     * @var float|null
     *
     * @ORM\Column(type="float", nullable=true, options={"comment":"The air temperature in degrees Fahrenheit."})
     */
    private $temperature;

    /**
     * @var float|null
     *
     * @ORM\Column(type="float", nullable=true, options={"comment":"The apparent (or “feels like”) temperature in degrees Fahrenheit."})
     */
    private $apparentTemperature;

    /**
     * @var float|null
     *
     * @ORM\Column(type="float", nullable=true, options={"comment":"The dew point in degrees Fahrenheit."})
     */
    private $dewPoint;

    /**
     * @var float|null
     *
     * @ORM\Column(type="float", nullable=true, options={"comment":"The relative humidity, between 0 and 1, inclusive."})
     */
    private $humidity;

    /**
     * @var float|null
     *
     * @ORM\Column(type="float", nullable=true, options={"comment":"The sea-level air pressure in millibars."})
     */
    private $pressure;

    /**
     * @var float|null
     *
     * @ORM\Column(type="float", nullable=true, options={"comment":"The wind speed in miles per hour."})
     */
    private $windSpeed;

    /**
     * @var float|null
     *
     * @ORM\Column(type="float", nullable=true, options={"comment":"The wind gust speed in miles per hour."})
     */
    private $windGust;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(type="datetime", nullable=true, options={"comment":"The time at which the maximum wind gust speed occurs during the day."})
     */
    private $windGustTime;

    /**
     * @var int|null
     *
     * @ORM\Column(type="integer", nullable=true, options={"comment":"The time at which the maximum wind gust speed occurs during the day. UNIX"})
     */
    private $windGustTimeUNIX;

    /**
     * @var float|null
     *
     * @ORM\Column(type="float", nullable=true, options={"comment":"The direction that the wind is coming from in degrees, with true north at 0° and progressing clockwise. (If windSpeed is zero, then this value will not be defined.)"})
     */
    private $windBearing;

    /**
     * @var float|null
     *
     * @ORM\Column(type="float", nullable=true, options={"comment":"The percentage of sky occluded by clouds, between 0 and 1, inclusive."})
     */
    private $cloudCover;

    /**
     * @var float|null
     *
     * @ORM\Column(type="float", nullable=true, options={"comment":"The UNIX time of when the maximum uvIndex occurs during a given day."})
     */
    private $uvIndex;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(type="datetime", nullable=true, options={"comment":"The time of when the maximum uvIndex occurs during a given day."})
     */
    private $uvIndexTime;

    /**
     * @var int|null
     *
     * @ORM\Column(type="integer", nullable=true, options={"comment":"The UNIX time of when the maximum uvIndex occurs during a given day."})
     */
    private $uvIndexTimeUNIX;

    /**
     * @var float|null
     *
     * @ORM\Column(type="float", nullable=true, options={"comment":"The average visibility in miles, capped at 10 miles."})
     */
    private $visibility;

    /**
     * @var float|null
     *
     * @ORM\Column(type="float", nullable=true, options={"comment":"The columnar density of total atmospheric ozone at the given time in Dobson units."})
     */
    private $ozone;

    /**
     * @var string|null
     *
     * @ORM\Column(type="text", nullable=true, options={"comment":"A human-readable text summary of this data point."})
     */
    private $summary;

    /**
     * @var string|null
     *
     * @ORM\Column(type="text", nullable=true, options={"comment":"A machine-readable text summary of this data point, suitable for selecting an icon for display."})
     */
    private $icon;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(type="datetime", nullable=true, options={"comment":"The time of when the sun will rise during a given day."})
     */
    private $sunriseTime;

    /**
     * @var int|null
     *
     * @ORM\Column(type="integer", nullable=true, options={"comment":"The UNIX time of when the sun will rise during a given day."})
     */
    private $sunriseTimeUNIX;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(type="datetime", nullable=true, options={"comment":"The time of when the sun will set during a given day."})
     */
    private $sunsetTime;

    /**
     * @var int|null
     *
     * @ORM\Column(type="integer", nullable=true, options={"comment":"The UNIX time of when the sun will set during a given day."})
     */
    private $sunsetTimeUNIX;

    /**
     * @var float|null
     *
     * @ORM\Column(type="float", nullable=true, options={"comment":"The fractional part of the lunation number during the given day."})
     */
    private $moonPhase;

    /**
     * @var float|null
     *
     * @ORM\Column(type="float", nullable=true, options={"comment":"The maximum value of precipIntensity during a given day."})
     */
    private $precipIntensityMax;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(type="datetime", nullable=true, options={"comment":"The time of when precipIntensityMax occurs during a given day."})
     */
    private $precipIntensityMaxTime;

    /**
     * @var int|null
     *
     * @ORM\Column(type="integer", nullable=true, options={"comment":"The UNIX time of when precipIntensityMax occurs during a given day."})
     */
    private $precipIntensityMaxTimeUNIX;

    /**
     * @var float|null
     *
     * @ORM\Column(type="float", nullable=true, options={"comment":"The daytime high temperature."})
     */
    private $temperatureHigh;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(type="datetime", nullable=true, options={"comment":"The time representing when the daytime high temperature occurs."})
     */
    private $temperatureHighTime;

    /**
     * @var int|null
     *
     * @ORM\Column(type="integer", nullable=true, options={"comment":"The UNIX time representing when the daytime high temperature occurs."})
     */
    private $temperatureHighTimeUNIX;

    /**
     * @var float|null
     *
     * @ORM\Column(type="float", nullable=true, options={"comment":"The overnight low temperature."})
     */
    private $temperatureLow;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(type="datetime", nullable=true, options={"comment":"The time representing when the overnight low temperature occurs."})
     */
    private $temperatureLowTime;

    /**
     * @var int|null
     *
     * @ORM\Column(type="integer", nullable=true, options={"comment":"The time representing when the overnight low temperature occurs."})
     */
    private $temperatureLowTimeUNIX;

    /**
     * @var float|null
     *
     * @ORM\Column(type="float", nullable=true, options={"comment":"The daytime high apparent temperature."})
     */
    private $apparentTemperatureHigh;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(type="datetime", nullable=true, options={"comment":"The time representing when the daytime high apparent temperature occurs."})
     */
    private $apparentTemperatureHighTime;

    /**
     * @var int|null
     *
     * @ORM\Column(type="integer", nullable=true, options={"comment":"The UNIX time representing when the daytime high apparent temperature occurs."})
     */
    private $apparentTemperatureHighTimeUNIX;

    /**
     * @var float|null
     *
     * @ORM\Column(type="float", nullable=true, options={"comment":"The overnight low apparent temperature."})
     */
    private $apparentTemperatureLow;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(type="datetime", nullable=true, options={"comment":"The time representing when the overnight low apparent temperature occurs."})
     */
    private $apparentTemperatureLowTime;

    /**
     * @var int|null
     *
     * @ORM\Column(type="integer", nullable=true, options={"comment":"The UNIX time representing when the overnight low apparent temperature occurs."})
     */
    private $apparentTemperatureLowTimeUNIX;

    /**
     * @var float|null
     *
     * @ORM\Column(type="float", nullable=true, options={"comment":"The minimum temperature during a given date."})
     */
    private $temperatureMin;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(type="datetime", nullable=true, options={"comment":"The time representing when the minimum temperature during a given date occurs."})
     */
    private $temperatureMinTime;

    /**
     * @var int|null
     *
     * @ORM\Column(type="integer", nullable=true, options={"comment":"The UNIX time representing when the minimum temperature during a given date occurs."})
     */
    private $temperatureMinTimeUNIX;

    /**
     * @var float|null
     *
     * @ORM\Column(type="float", nullable=true, options={"comment":"The maximum temperature during a given date."})
     */
    private $temperatureMax;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(type="datetime", nullable=true, options={"comment":"The UNIX time representing when the maximum temperature during a given date occurs."})
     */
    private $temperatureMaxTime;

    /**
     * @var int|null
     *
     * @ORM\Column(type="integer", nullable=true, options={"comment":"The time representing when the maximum temperature during a given date occurs."})
     */
    private $temperatureMaxTimeUNIX;

    /**
     * @var float|null
     *
     * @ORM\Column(type="float", nullable=true, options={"comment":"The minimum apparent temperature during a given date."})
     */
    private $apparentTemperatureMin;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(type="datetime", nullable=true, options={"comment":"The time representing when the minimum apparent temperature during a given date occurs."})
     */
    private $apparentTemperatureMinTime;

    /**
     * @var int|null
     *
     * @ORM\Column(type="integer", nullable=true, options={"comment":"The UNIX time representing when the minimum apparent temperature during a given date occurs."})
     */
    private $apparentTemperatureMinTimeUNIX;

    /**
     * @var float|null
     *
     * @ORM\Column(type="float", nullable=true, options={"comment":"The maximum apparent temperature during a given date."})
     */
    private $apparentTemperatureMax;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(type="datetime", nullable=true, options={"comment":"The time representing when the maximum apparent temperature during a given date occurs."})
     */
    private $apparentTemperatureMaxTime;

    /**
     * @var int|null
     *
     * @ORM\Column(type="integer", nullable=true, options={"comment":"The UNIX time representing when the maximum apparent temperature during a given date occurs."})
     */
    private $apparentTemperatureMaxTimeUNIX;

    /**
     * @var Weather
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Weather\Weather", inversedBy="informations", cascade={"persist", "remove"}, fetch="EXTRA_LAZY")
     */
    public $weather;

    public function __construct(Weather $weather, ?float $precipIntensity, ?float $precipProbability, ?string $precipType, ?float $temperature, ?float $apparentTemperature, ?float $dewPoint, ?float $humidity, ?float $pressure, ?float $windSpeed, ?float $windGust, ?float $windBearing, ?float $cloudCover, ?float $uvIndex, ?float $visibility, ?float $ozone)
    {
        $this->weather = $weather;
        $this->precipIntensity = $precipIntensity;
        $this->precipProbability = $precipProbability;
        $this->precipType = $precipType;
        $this->temperature = $temperature;
        $this->apparentTemperature = $apparentTemperature;
        $this->dewPoint = $dewPoint;
        $this->humidity = $humidity;
        $this->pressure = $pressure;
        $this->windSpeed = $windSpeed;
        $this->windGust = $windGust;
        $this->windBearing = $windBearing;
        $this->cloudCover = $cloudCover;
        $this->uvIndex = $uvIndex;
        $this->visibility = $visibility;
        $this->ozone = $ozone;
    }

    public function setInformations(Weather $weather, ?string $summary, ?string $icon, ?int $windGustTimeUNIX, ?int $uvIndexTimeUNIX, ?int $sunriseTimeUNIX, ?int $sunsetTimeUNIX, ?float $moonPhase, ?float $precipIntensityMax, ?int $precipIntensityMaxTimeUNIX, ?float $temperatureHigh, ?int $temperatureHighTimeUNIX, ?float $temperatureLow, ?int $temperatureLowTimeUNIX, ?float $apparentTemperatureHigh, ?int $apparentTemperatureHighTimeUNIX, ?float $apparentTemperatureLow, ?int $apparentTemperatureLowTimeUNIX, ?float $temperatureMin, ?int $temperatureMinTimeUNIX, ?float $temperatureMax, ?int $temperatureMaxTimeUNIX, ?float $apparentTemperatureMin, ?int $apparentTemperatureMinTimeUNIX, ?float $apparentTemperatureMax, ?int $apparentTemperatureMaxTimeUNIX)
    {
        $this->weather = $weather;
        $this->summary = $summary;
        $this->icon = $icon;
        $this->windGustTimeUNIX = $windGustTimeUNIX;
        $this->windGustTime = Weather::unixToDateTime($windGustTimeUNIX);
        $this->uvIndexTimeUNIX = $uvIndexTimeUNIX;
        $this->uvIndexTime = Weather::unixToDateTime($uvIndexTimeUNIX);
        $this->sunriseTimeUNIX = $sunriseTimeUNIX;
        $this->sunriseTime = Weather::unixToDateTime($sunriseTimeUNIX);
        $this->sunsetTimeUNIX = $sunsetTimeUNIX;
        $this->sunsetTime = Weather::unixToDateTime($sunsetTimeUNIX);
        $this->moonPhase = $moonPhase;
        $this->precipIntensityMax = $precipIntensityMax;
        $this->precipIntensityMaxTimeUNIX = $precipIntensityMaxTimeUNIX;
        $this->precipIntensityMaxTime = Weather::unixToDateTime($precipIntensityMaxTimeUNIX);
        $this->temperatureHigh = $temperatureHigh;
        $this->temperatureHighTimeUNIX = $temperatureHighTimeUNIX;
        $this->temperatureHighTime = Weather::unixToDateTime($temperatureHighTimeUNIX);
        $this->temperatureLow = $temperatureLow;
        $this->temperatureLowTimeUNIX = $temperatureLowTimeUNIX;
        $this->temperatureLowTime = Weather::unixToDateTime($temperatureLowTimeUNIX);
        $this->apparentTemperatureHigh = $apparentTemperatureHigh;
        $this->apparentTemperatureHighTimeUNIX = $apparentTemperatureHighTimeUNIX;
        $this->apparentTemperatureHighTime = Weather::unixToDateTime($apparentTemperatureHighTimeUNIX);
        $this->apparentTemperatureLow = $apparentTemperatureLow;
        $this->apparentTemperatureLowTimeUNIX = $apparentTemperatureLowTimeUNIX;
        $this->apparentTemperatureLowTime = Weather::unixToDateTime($apparentTemperatureLowTimeUNIX);
        $this->temperatureMin = $temperatureMin;
        $this->temperatureMinTimeUNIX = $temperatureMinTimeUNIX;
        $this->temperatureMinTime = Weather::unixToDateTime($temperatureMinTimeUNIX);
        $this->temperatureMax = $temperatureMax;
        $this->temperatureMaxTimeUNIX = $temperatureMaxTimeUNIX;
        $this->temperatureMaxTime = Weather::unixToDateTime($temperatureMaxTimeUNIX);
        $this->apparentTemperatureMin = $apparentTemperatureMin;
        $this->apparentTemperatureMinTimeUNIX = $apparentTemperatureMinTimeUNIX;
        $this->apparentTemperatureMinTime = Weather::unixToDateTime($apparentTemperatureMinTimeUNIX);
        $this->apparentTemperatureMax = $apparentTemperatureMax;
        $this->apparentTemperatureMaxTimeUNIX = $apparentTemperatureMaxTimeUNIX;
        $this->apparentTemperatureMaxTime = Weather::unixToDateTime($apparentTemperatureMaxTimeUNIX);
    }

    public function __toString()
    {
        return (string)$this->id;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrecipIntensity(): ?float
    {
        return $this->precipIntensity;
    }

    public function setPrecipIntensity(?float $precipIntensity): self
    {
        $this->precipIntensity = $precipIntensity;

        return $this;
    }

    public function getPrecipProbability(): ?float
    {
        return $this->precipProbability;
    }

    public function setPrecipProbability(?float $precipProbability): self
    {
        $this->precipProbability = $precipProbability;

        return $this;
    }

    public function getPrecipType(): ?string
    {
        return $this->precipType;
    }

    public function setPrecipType(?string $precipType): self
    {
        $this->precipType = $precipType;

        return $this;
    }

    public function getTemperature(): ?float
    {
        return $this->temperature;
    }

    public function setTemperature(float $temperature): self
    {
        $this->temperature = $temperature;

        return $this;
    }

    public function getApparentTemperature(): ?float
    {
        return $this->apparentTemperature;
    }

    public function setApparentTemperature(?float $apparentTemperature): self
    {
        $this->apparentTemperature = $apparentTemperature;

        return $this;
    }

    public function getDewPoint(): ?float
    {
        return $this->dewPoint;
    }

    public function setDewPoint(?float $dewPoint): self
    {
        $this->dewPoint = $dewPoint;

        return $this;
    }

    public function getHumidity(): ?float
    {
        return $this->humidity;
    }

    public function setHumidity(?float $humidity): self
    {
        $this->humidity = $humidity;

        return $this;
    }

    public function getPressure(): ?float
    {
        return $this->pressure;
    }

    public function setPressure(?float $pressure): self
    {
        $this->pressure = $pressure;

        return $this;
    }

    public function getWindSpeed(): ?float
    {
        return $this->windSpeed;
    }

    public function setWindSpeed(?float $windSpeed): self
    {
        $this->windSpeed = $windSpeed;

        return $this;
    }

    public function getWindGust(): ?float
    {
        return $this->windGust;
    }

    public function setWindGust(?float $windGust): self
    {
        $this->windGust = $windGust;

        return $this;
    }

    public function getWindGustTime(): ?\DateTimeInterface
    {
        return $this->windGustTime;
    }

    public function setWindGustTime(?\DateTimeInterface $windGustTime): self
    {
        $this->windGustTime = $windGustTime;

        return $this;
    }

    public function getWindGustTimeUNIX(): ?int
    {
        return $this->windGustTimeUNIX;
    }

    public function setWindGustTimeUNIX(?int $windGustTimeUNIX): self
    {
        $this->windGustTimeUNIX = $windGustTimeUNIX;

        return $this;
    }

    public function getWindBearing(): ?float
    {
        return $this->windBearing;
    }

    public function setWindBearing(?float $windBearing): self
    {
        $this->windBearing = $windBearing;

        return $this;
    }

    public function getCloudCover(): ?float
    {
        return $this->cloudCover;
    }

    public function setCloudCover(?float $cloudCover): self
    {
        $this->cloudCover = $cloudCover;

        return $this;
    }

    public function getUvIndex(): ?float
    {
        return $this->uvIndex;
    }

    public function setUvIndex(?float $uvIndex): self
    {
        $this->uvIndex = $uvIndex;

        return $this;
    }

    public function getUvIndexTime(): ?\DateTimeInterface
    {
        return $this->uvIndexTime;
    }

    public function setUvIndexTime(?\DateTimeInterface $uvIndexTime): self
    {
        $this->uvIndexTime = $uvIndexTime;

        return $this;
    }

    public function getUvIndexTimeUNIX(): ?int
    {
        return $this->uvIndexTimeUNIX;
    }

    public function setUvIndexTimeUNIX(?int $uvIndexTimeUNIX): self
    {
        $this->uvIndexTimeUNIX = $uvIndexTimeUNIX;

        return $this;
    }

    public function getVisibility(): ?float
    {
        return $this->visibility;
    }

    public function setVisibility(?float $visibility): self
    {
        $this->visibility = $visibility;

        return $this;
    }

    public function getOzone(): ?float
    {
        return $this->ozone;
    }

    public function setOzone(?float $ozone): self
    {
        $this->ozone = $ozone;

        return $this;
    }

    public function getSummary(): ?string
    {
        return $this->summary;
    }

    public function setSummary(?string $summary): self
    {
        $this->summary = $summary;

        return $this;
    }

    public function getIcon(): ?string
    {
        return $this->icon;
    }

    public function setIcon(?string $icon): self
    {
        $this->icon = $icon;

        return $this;
    }

    public function getSunriseTime(): ?\DateTimeInterface
    {
        return $this->sunriseTime;
    }

    public function setSunriseTime(?\DateTimeInterface $sunriseTime): self
    {
        $this->sunriseTime = $sunriseTime;

        return $this;
    }

    public function getSunriseTimeUNIX(): ?int
    {
        return $this->sunriseTimeUNIX;
    }

    public function setSunriseTimeUNIX(?int $sunriseTimeUNIX): self
    {
        $this->sunriseTimeUNIX = $sunriseTimeUNIX;

        return $this;
    }

    public function getSunsetTime(): ?\DateTimeInterface
    {
        return $this->sunsetTime;
    }

    public function setSunsetTime(?\DateTimeInterface $sunsetTime): self
    {
        $this->sunsetTime = $sunsetTime;

        return $this;
    }

    public function getSunsetTimeUNIX(): ?int
    {
        return $this->sunsetTimeUNIX;
    }

    public function setSunsetTimeUNIX(?int $sunsetTimeUNIX): self
    {
        $this->sunsetTimeUNIX = $sunsetTimeUNIX;

        return $this;
    }

    public function getMoonPhase(): ?float
    {
        return $this->moonPhase;
    }

    public function setMoonPhase(?float $moonPhase): self
    {
        $this->moonPhase = $moonPhase;

        return $this;
    }

    public function getPrecipIntensityMax(): ?float
    {
        return $this->precipIntensityMax;
    }

    public function setPrecipIntensityMax(?float $precipIntensityMax): self
    {
        $this->precipIntensityMax = $precipIntensityMax;

        return $this;
    }

    public function getPrecipIntensityMaxTime(): ?\DateTimeInterface
    {
        return $this->precipIntensityMaxTime;
    }

    public function setPrecipIntensityMaxTime(?\DateTimeInterface $precipIntensityMaxTime): self
    {
        $this->precipIntensityMaxTime = $precipIntensityMaxTime;

        return $this;
    }

    public function getPrecipIntensityMaxTimeUNIX(): ?int
    {
        return $this->precipIntensityMaxTimeUNIX;
    }

    public function setPrecipIntensityMaxTimeUNIX(?int $precipIntensityMaxTimeUNIX): self
    {
        $this->precipIntensityMaxTimeUNIX = $precipIntensityMaxTimeUNIX;

        return $this;
    }

    public function getTemperatureHigh(): ?float
    {
        return $this->temperatureHigh;
    }

    public function setTemperatureHigh(?float $temperatureHigh): self
    {
        $this->temperatureHigh = $temperatureHigh;

        return $this;
    }

    public function getTemperatureHighTime(): ?\DateTimeInterface
    {
        return $this->temperatureHighTime;
    }

    public function setTemperatureHighTime(?\DateTimeInterface $temperatureHighTime): self
    {
        $this->temperatureHighTime = $temperatureHighTime;

        return $this;
    }

    public function getTemperatureHighTimeUNIX(): ?int
    {
        return $this->temperatureHighTimeUNIX;
    }

    public function setTemperatureHighTimeUNIX(?int $temperatureHighTimeUNIX): self
    {
        $this->temperatureHighTimeUNIX = $temperatureHighTimeUNIX;

        return $this;
    }

    public function getTemperatureLow(): ?float
    {
        return $this->temperatureLow;
    }

    public function setTemperatureLow(?float $temperatureLow): self
    {
        $this->temperatureLow = $temperatureLow;

        return $this;
    }

    public function getTemperatureLowTime(): ?\DateTimeInterface
    {
        return $this->temperatureLowTime;
    }

    public function setTemperatureLowTime(?\DateTimeInterface $temperatureLowTime): self
    {
        $this->temperatureLowTime = $temperatureLowTime;

        return $this;
    }

    public function getTemperatureLowTimeUNIX(): ?int
    {
        return $this->temperatureLowTimeUNIX;
    }

    public function setTemperatureLowTimeUNIX(?int $temperatureLowTimeUNIX): self
    {
        $this->temperatureLowTimeUNIX = $temperatureLowTimeUNIX;

        return $this;
    }

    public function getApparentTemperatureHigh(): ?float
    {
        return $this->apparentTemperatureHigh;
    }

    public function setApparentTemperatureHigh(?float $apparentTemperatureHigh): self
    {
        $this->apparentTemperatureHigh = $apparentTemperatureHigh;

        return $this;
    }

    public function getApparentTemperatureHighTime(): ?\DateTimeInterface
    {
        return $this->apparentTemperatureHighTime;
    }

    public function setApparentTemperatureHighTime(?\DateTimeInterface $apparentTemperatureHighTime): self
    {
        $this->apparentTemperatureHighTime = $apparentTemperatureHighTime;

        return $this;
    }

    public function getApparentTemperatureHighTimeUNIX(): ?int
    {
        return $this->apparentTemperatureHighTimeUNIX;
    }

    public function setApparentTemperatureHighTimeUNIX(?int $apparentTemperatureHighTimeUNIX): self
    {
        $this->apparentTemperatureHighTimeUNIX = $apparentTemperatureHighTimeUNIX;

        return $this;
    }

    public function getApparentTemperatureLow(): ?float
    {
        return $this->apparentTemperatureLow;
    }

    public function setApparentTemperatureLow(?float $apparentTemperatureLow): self
    {
        $this->apparentTemperatureLow = $apparentTemperatureLow;

        return $this;
    }

    public function getApparentTemperatureLowTime(): ?\DateTimeInterface
    {
        return $this->apparentTemperatureLowTime;
    }

    public function setApparentTemperatureLowTime(?\DateTimeInterface $apparentTemperatureLowTime): self
    {
        $this->apparentTemperatureLowTime = $apparentTemperatureLowTime;

        return $this;
    }

    public function getApparentTemperatureLowTimeUNIX(): ?int
    {
        return $this->apparentTemperatureLowTimeUNIX;
    }

    public function setApparentTemperatureLowTimeUNIX(?int $apparentTemperatureLowTimeUNIX): self
    {
        $this->apparentTemperatureLowTimeUNIX = $apparentTemperatureLowTimeUNIX;

        return $this;
    }

    public function getTemperatureMin(): ?float
    {
        return $this->temperatureMin;
    }

    public function setTemperatureMin(?float $temperatureMin): self
    {
        $this->temperatureMin = $temperatureMin;

        return $this;
    }

    public function getTemperatureMinTime(): ?\DateTimeInterface
    {
        return $this->temperatureMinTime;
    }

    public function setTemperatureMinTime(?\DateTimeInterface $temperatureMinTime): self
    {
        $this->temperatureMinTime = $temperatureMinTime;

        return $this;
    }

    public function getTemperatureMinTimeUNIX(): ?int
    {
        return $this->temperatureMinTimeUNIX;
    }

    public function setTemperatureMinTimeUNIX(?int $temperatureMinTimeUNIX): self
    {
        $this->temperatureMinTimeUNIX = $temperatureMinTimeUNIX;

        return $this;
    }

    public function getTemperatureMax(): ?float
    {
        return $this->temperatureMax;
    }

    public function setTemperatureMax(?float $temperatureMax): self
    {
        $this->temperatureMax = $temperatureMax;

        return $this;
    }

    public function getTemperatureMaxTime(): ?\DateTimeInterface
    {
        return $this->temperatureMaxTime;
    }

    public function setTemperatureMaxTime(?\DateTimeInterface $temperatureMaxTime): self
    {
        $this->temperatureMaxTime = $temperatureMaxTime;

        return $this;
    }

    public function getTemperatureMaxTimeUNIX(): ?int
    {
        return $this->temperatureMaxTimeUNIX;
    }

    public function setTemperatureMaxTimeUNIX(?int $temperatureMaxTimeUNIX): self
    {
        $this->temperatureMaxTimeUNIX = $temperatureMaxTimeUNIX;

        return $this;
    }

    public function getApparentTemperatureMin(): ?float
    {
        return $this->apparentTemperatureMin;
    }

    public function setApparentTemperatureMin(?float $apparentTemperatureMin): self
    {
        $this->apparentTemperatureMin = $apparentTemperatureMin;

        return $this;
    }

    public function getApparentTemperatureMinTime(): ?\DateTimeInterface
    {
        return $this->apparentTemperatureMinTime;
    }

    public function setApparentTemperatureMinTime(?\DateTimeInterface $apparentTemperatureMinTime): self
    {
        $this->apparentTemperatureMinTime = $apparentTemperatureMinTime;

        return $this;
    }

    public function getApparentTemperatureMinTimeUNIX(): ?int
    {
        return $this->apparentTemperatureMinTimeUNIX;
    }

    public function setApparentTemperatureMinTimeUNIX(?int $apparentTemperatureMinTimeUNIX): self
    {
        $this->apparentTemperatureMinTimeUNIX = $apparentTemperatureMinTimeUNIX;

        return $this;
    }

    public function getApparentTemperatureMax(): ?float
    {
        return $this->apparentTemperatureMax;
    }

    public function setApparentTemperatureMax(?float $apparentTemperatureMax): self
    {
        $this->apparentTemperatureMax = $apparentTemperatureMax;

        return $this;
    }

    public function getApparentTemperatureMaxTime(): ?\DateTimeInterface
    {
        return $this->apparentTemperatureMaxTime;
    }

    public function setApparentTemperatureMaxTime(?\DateTimeInterface $apparentTemperatureMaxTime): self
    {
        $this->apparentTemperatureMaxTime = $apparentTemperatureMaxTime;

        return $this;
    }

    public function getApparentTemperatureMaxTimeUNIX(): ?int
    {
        return $this->apparentTemperatureMaxTimeUNIX;
    }

    public function setApparentTemperatureMaxTimeUNIX(?int $apparentTemperatureMaxTimeUNIX): self
    {
        $this->apparentTemperatureMaxTimeUNIX = $apparentTemperatureMaxTimeUNIX;

        return $this;
    }

    public function getWeather(): ?string
    {
        return $this->weather;
    }

    public function setWeather(?string $weather): self
    {
        $this->weather = $weather;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getDateUNIX(): ?int
    {
        return $this->dateUNIX;
    }

    public function setDateUNIX(?int $dateUNIX): self
    {
        $this->dateUNIX = $dateUNIX;

        return $this;
    }
}
