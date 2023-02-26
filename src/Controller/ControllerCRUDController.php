<?php

namespace App\Controller;

use App\Entity\Supplier;
use App\Form\SupplierType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ControllerCRUDController extends AbstractController
{
    //Creació de entity manager i constructor per recuperació de proveidors
    private $em;

    /**
     * @param $em
     */

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    #[Route('', name: 'app_controller_c_r_u_d')]

    //index i vista proveïdors
    public function index(): Response
    {

        //Mostramos proveedores
        $suppliers = $this->em->getRepository(Supplier::class)->findAll();
        return $this->render('controller_crud/index.html.twig', [
            'suppliers' => $suppliers,
        ]);
    }

    #[Route('/create', name: 'app_controller_create')]

    //Formulario creación proveedores
    public function create(Request $request): Response
    {


        $supplier = new Supplier;
        $form = $this->createForm(SupplierType::class, $supplier);
        $form->handleRequest($request);

        // Si existe un proveedor con el mismo nombre no hacemos nada si és nuevo lo agregamos a la base

        $check = $this->em->getRepository(Supplier::class)->findOneBy(['name' => $supplier->getName()]);

        if ($check != null) {
            return $this->redirectToRoute('app_controller_c_r_u_d');

        } else if ($form->isSubmitted() && $form->isValid()) {

            $this->em->persist($supplier);
            $this->em->flush();

            return $this->redirectToRoute('app_controller_c_r_u_d');
        }

        return $this->render('controller_crud/create.html.twig', [

            'form' => $form->createView(),
        ]);
    }

    #[Route('/update/{id}', name: 'app_controller_update')]
    public function update(Request $request, $id)
    {

        $supplier = $this->em->getRepository(Supplier::class)->find($id);

        $form = $this->createForm(SupplierType::class, $supplier);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $supplier->setDateEdit();
            $this->em->persist($supplier);
            $this->em->flush();

            return $this->redirectToRoute('app_controller_c_r_u_d');
        }

        return $this->render('controller_crud/update.html.twig', [

            'supplier' => $supplier,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/delete/{id}', name: 'app_controller_delete')]
    public function delete(int $id)
    {
        $supplier = $this->em->getRepository(Supplier::class)->find($id);
        $this->em->remove($supplier);
        $this->em->flush();

        return $this->redirectToRoute('app_controller_c_r_u_d');
    }
}