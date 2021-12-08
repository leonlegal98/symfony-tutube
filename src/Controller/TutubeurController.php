<?php

namespace App\Controller;

use App\Entity\Videos;
use App\Form\VideosType;
use App\Repository\VideosRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TutubeurController extends AbstractController
{
    #[Route('/tutubeur', name: 'tutubeur')]
    public function index(VideosRepository $videosRepository): Response
    {

        return $this->render('tutubeur/index.html.twig', [
            'videos' => $videosRepository->findAll(),
        ]);
    }
    #[Route('/tutubeur/{id}', name: 'videos_show_tu', methods: ['GET'])]
    public function show(Videos $video): Response
    {
        $recup = substr($video->getLink(), 32);
        return $this->render('tutubeur/index.html.twig', [
            'video' => $video,
            'recup' => $recup,
        ]);
    }
}
