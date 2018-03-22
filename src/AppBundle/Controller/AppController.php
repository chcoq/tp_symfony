<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AppController extends Controller
{
    /**
     * @Route("/home", name="home")
     */
    public function homeAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $articles = $em->getRepository('AppBundle:Article')->findAll();
        return $this->render('app/home.html.twig', [
            'articles' => $articles

        ]);
    }

    /**
     * @Route("/detail/{id}", name="detail")
     */
    public function detailAction(Request $request, $id)
    {
        /** @var  $em */
        $em = $this->getDoctrine()->getManager();
        $article = $em->getRepository('AppBundle:Article')->find($id);

//        $article->getCommentaires();
        return $this->render('app/detail.html.twig', [
            'article' => $article
        ]);
    }

}
