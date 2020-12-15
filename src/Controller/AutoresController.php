<?php

namespace App\Controller;

use App\Form\AutoresType;
use App\Repository\AutoresRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AutoresController extends AbstractController
{
    /**
     * @Route("/autores", name="autores")
     */
    public function index(): Response
    {
        $repo = new AutoresRepository($this->getDoctrine());
        $data = $repo->findAll();

        return $this->render('autores/index.html.twig', [
            'controller_name' => 'AutoresController',
            "data" => $data
        ]);
    }
    /**
     * @Route("/autores/crear", name="autores_crear")
     */
    public function crear(Request $r): Response
    {
        $id = $r->get("id", 0);
        $repo = new AutoresRepository($this->getDoctrine());
        $data = $repo->find($id);

        $form_autores = $this->createForm(AutoresType::class, $data, [
            "action" => $this->generateUrl('autores_crear', ["id" => $id]),
            "method" => "patch"
        ]);

        //Update or create section
        $manager = $this->getDoctrine()->getManager();
        $form_autores->handleRequest($r);
        if($form_autores->isSubmitted() && $form_autores->isValid()){
            $data_form = $form_autores->getData();
            $manager->persist($data_form);
            $manager->flush();
            return $this->redirectToRoute('autores');
        }


        $form = $form_autores->createView();
        return $this->render('main/form.html.twig', [
            "form" => $form
        ]);
    }
}
