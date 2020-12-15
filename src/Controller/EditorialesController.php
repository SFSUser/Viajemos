<?php

namespace App\Controller;

use App\Form\EditorialesType;
use App\Repository\EditorialesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class EditorialesController extends AbstractController
{
    /**
     * @Route("/editoriales", name="editoriales")
     */
    public function index(): Response
    {
        $repo = new EditorialesRepository($this->getDoctrine());
        $data = $repo->findAll();

        return $this->render('editoriales/index.html.twig', [
            "data" => $data
        ]);
    }

    /**
     * @Route("/editoriales/crear", name="editoriales_crear")
     */
    public function crear(Request $r): Response
    {
        $id = $r->get("id", 0);
        $repo = new EditorialesRepository($this->getDoctrine());
        $data = $repo->find($id);

        $form_autores = $this->createForm(EditorialesType::class, $data, [
            "action" => $this->generateUrl('editoriales_crear', ["id" => $id]),
            "method" => "patch"
        ]);

        //Update or create section
        $manager = $this->getDoctrine()->getManager();
        $form_autores->handleRequest($r);
        if($form_autores->isSubmitted() && $form_autores->isValid()){
            $data_form = $form_autores->getData();
            $manager->persist($data_form);
            $manager->flush();
            return $this->redirectToRoute('editoriales');
        }


        $form = $form_autores->createView();
        return $this->render('main/form.html.twig', [
            "form" => $form
        ]);
    }
}
