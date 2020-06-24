<?php

namespace App\Controller;

use App\Entity\Weather\Weather;
use Doctrine\ORM\EntityManagerInterface;
use GuzzleHttp\Client;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/default", name="default")
     */
    public function index(EntityManagerInterface $em)
    {
        /* @var Weather $weather */
        $weather = $em->getRepository(Weather::class)->findBy([], ['id' => 'DESC'], 1, 0)[0];
        dump($weather);

        foreach ($weather->getForecastInformations() as $forecastInformation) {
            dump($forecastInformation);
        }
        die;
    }
}
