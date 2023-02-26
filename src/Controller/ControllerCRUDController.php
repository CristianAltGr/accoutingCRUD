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

        //Se puede comporvar si el usuario existia antes con el suplier despues del form i una busqueda findBy

        if ($form->isSubmitted() && $form->isValid()) {

            $this->em->persist($supplier);
            $this->em->flush();

            return $this->redirectToRoute('app_controller_c_r_u_d');
        }

        return $this->render('controller_crud/create.html.twig', [

            'form' => $form->createView(),
        ]);
    }

    #[Route('/update', name: 'app_controller_update')]
    public function update(Request $request)
    {

        //configuara id con path
        $supplier = $this->em->getRepository(Supplier::class)->find(4);

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

    public function delete(int $id)
    {
        $supplier = $this->em->getRepository(Supplier::class)->find($id);
        $this->em->remove($supplier);
        $this->em->flush();

        return $this->redirectToRoute('app_controller_c_r_u_d');
    }
}