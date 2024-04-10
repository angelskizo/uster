<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Form\newVehicleForm;
use App\Entity\Vehicles;
use Doctrine\ORM\EntityManagerInterface;

class VehiclesController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function vehicleList(): Response
    {
        $vehicles = $this->entityManager->getRepository(Vehicles::class)->findAll();

        return $this->render('vehicles/vehicleList.html.twig', [ 
            'vehicles' => $vehicles ,
        ]);
    }

    public function newVehicle(Request $request): Response
    {
        $vehicle = new Vehicles;
        $form=$this->createForm(newVehicleForm::class, $vehicle);
        $form->handleRequest($request);

        if($form->isSubmitted())
        {
            $this->entityManager->persist($vehicle);
            $this->entityManager->flush();
            return $this->redirectToRoute('vehicleList'); 
        }
        return $this->render('vehicles/newVehicle.html.twig', [
            'vehicleForm' => $form->createView(),
        ]);
    }

    public function deleteVehicle($id): Response
    {
        $em = $this->entityManager;
        $item = $em->getRepository(Vehicles::class)->find($id);
        $em->remove($item);
        $em->flush();
        return $this->redirectToRoute('vehicleList');    
    }

    public function updateVehicle(Request $request, $id): Response
    {
        $em = $this->entityManager;
        $vehicle = $em->getRepository(Vehicles::class)->find($id);
        $form=$this->createForm(newVehicleForm::class, $vehicle);
        $form->handleRequest($request);

        if($form->isSubmitted())
        {
            $this->entityManager->persist($vehicle);
            $this->entityManager->flush();
            return $this->redirectToRoute('vehicleList');   
        }
        return $this->render('vehicles/newVehicle.html.twig', [
            'vehicleForm' => $form->createView(),
        ]);
    }
}
