<?php

namespace App\Controller;

use App\Form\LibrosType;
use App\Repository\LibrosRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LibrosController extends AbstractController
{
    /**
     * @Route("/libros", name="libros")
     */
    public function index(): Response
    {
        $repo = new LibrosRepository($this->getDoctrine());
        $data = $repo->findAll();

        return $this->render('libros/index.html.twig', [
            "data" => $data
        ]);
    }

    /**
     * @Route("/libros/crear", name="libros_crear")
     */
    public function crear(Request $r): Response
    {
        $id = $r->get("id", 0);
        $repo = new LibrosRepository($this->getDoctrine());
        $data = $repo->find($id);

        $form_autores = $this->createForm(LibrosType::class, $data, [
            "action" => $this->generateUrl('libros_crear', ["id" => $id]),
            "method" => "patch"
        ]);

        //Update or create section
        $manager = $this->getDoctrine()->getManager();
        $form_autores->handleRequest($r);
        if($form_autores->isSubmitted() && $form_autores->isValid()){
            $data_form = $form_autores->getData();
            $libros = $r->get("libros");
            $data_form->setIsbn($libros["ISBN"]);
            //print_r($data_form);
            //exit();
            $manager->persist($data_form);
            $manager->flush();
            return $this->redirectToRoute('libros');
        }


        $form = $form_autores->createView();
        return $this->render('main/form.html.twig', [
            "form" => $form
        ]);
    }
}
