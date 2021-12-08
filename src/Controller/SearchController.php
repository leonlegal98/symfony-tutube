<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\VideosRepository;
use App\Entity\Videos;
use Symfony\Component\Form\Extension\Core\Type\SearchType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\FormTypeInterface;

class SearchController extends AbstractController
{
    #[Route('/search', name: 'search')]
    public function index(): Response
    {
        return $this->render('search/index.html.twig', [
            'controller_name' => 'SearchController',
        ]);
    }
    // public function searchBar()
    // {
    //     $form = $this->createFormBuilder()
    //         ->setAction($this->generateUrl('handleSearch'))
    //         ->add('query', Videos::class, [
    //             'label' => false,
    //             'attr' => [
    //                 'class' => 'form-control',
    //                 'placeholder' => 'Entrez un mot-clé'
    //             ]
    //         ])
    //         ->add('recherche', Videos::class, [
    //             'attr' => [
    //                 'class' => 'btn btn-primary'
    //             ]
    //         ])
    //         ->getForm();
    //     return $this->render('search/searchBar.html.twig', [
    //         'form' => $form->createView()
    //     ]);
    // }


    /**
     * @Route("/handleSearch", name="handleSearch")
     * @param Request $request
     */
    public function handleSearch(Request $request, VideosRepository $repo)
    {
        $query = $request->request->get('form')['query'];
        if ($query) {
            $video = $repo->findVideosByName($query);
        }
        return $this->render('search/index.html.twig', [
            'video' => $video
        ]);
    }
}
