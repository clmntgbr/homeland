<?php

namespace App\Entity\Weather;

use App\Repository\Weather\AlertRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AlertRepository::class)
 */
class Alert
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", options={"comment":"A brief description of the alert."})
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(type="text", options={"comment":"A detailed description of the alert."})
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(type="string", options={"comment":"An HTTP(S) URI that one may refer to for detailed information about the alert."})
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(type="string", options={"comment":"The severity of the weather alert."})
     */
    private $severity;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime", options={"comment":"Time at which the alert was issued."})
     */
    private $date;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", options={"comment":"Time at which the alert was issued in UNIX."})
     */
    private $dateUNIX;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime", options={"comment":"The time at which the alert will expire."})
     */
    private $expireAt;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", options={"comment":"The UNIX time at which the alert will expire."})
     */
    private $expireAtUNIX;

    /**
     * @var Weather
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Weather\Weather", inversedBy="alerts", cascade={"persist", "remove"}, fetch="EXTRA_LAZY")
     * @ORM\JoinColumn(name="weather_id", referencedColumnName="id", nullable=true)
     */
    public $weather;

    public function __construct(Weather $weather, string $title, string $description, string $severity, string $url, int $dateUNIX, int $expireAtUNIX)
    {
        $this->weather = $weather;
        $this->title = $title;
        $this->description = $description;
        $this->severity = $severity;
        $this->url = $url;
        $this->dateUNIX = $dateUNIX;
        $this->date = Weather::unixToDateTime($dateUNIX);
        $this->expireAtUNIX = $expireAtUNIX;
        $this->expireAt = Weather::unixToDateTime($expireAtUNIX);
    }

    public function __toString()
    {
        return (string)$this->id;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getSeverity(): ?string
    {
        return $this->severity;
    }

    public function setSeverity(string $severity): self
    {
        $this->severity = $severity;

        return $this;
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

    public function getExpireAt(): ?\DateTimeInterface
    {
        return $this->expireAt;
    }

    public function setExpireAt(\DateTimeInterface $expireAt): self
    {
        $this->expireAt = $expireAt;

        return $this;
    }

    public function getExpireAtUNIX(): ?int
    {
        return $this->expireAtUNIX;
    }

    public function setExpireAtUNIX(int $expireAtUNIX): self
    {
        $this->expireAtUNIX = $expireAtUNIX;

        return $this;
    }

    public function getWeather(): ?Weather
    {
        return $this->weather;
    }

    public function setWeather(?Weather $weather): self
    {
        $this->weather = $weather;

        return $this;
    }
}
