<?php

namespace App\Controller;

use App\Entity\Weather\Weather;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/default", name="default")
     */
    public function default(EntityManagerInterface $em)
    {
        /* @var Weather $weather */
        $weather = $em->getRepository(Weather::class)->findBy([], ['id' => 'DESC'], 1, 0);
        return $this->render('default/index.html.twig', []);
    }

    /**
     * @Route("/", name="index")
     */
    public function index(EntityManagerInterface $em)
    {
        /* @var Weather $weather */
        $weather = $em->getRepository(Weather::class)->findBy([], ['id' => 'DESC'], 1, 0);
        return $this->render('default/index.html.twig', []);
    }
}
