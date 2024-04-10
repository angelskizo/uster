<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Form\newDriverForm;
use App\Entity\Drivers;
use Doctrine\ORM\EntityManagerInterface;

class DriversController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    
    public function driverList(): Response
    {
        $drivers = $this->entityManager->getRepository(Drivers::class)->findAll();

        return $this->render('drivers/driverlist.html.twig', [ 
            'drivers' => $drivers ,
        ]);
    }

    public function newDriver(Request $request): Response
    {
        $driver = new Drivers;
        $form=$this->createForm(newDriverForm::class, $driver);
        $form->handleRequest($request);

        if($form->isSubmitted())
        {
            $this->entityManager->persist($driver);
            $this->entityManager->flush();
            return $this->redirectToRoute('driverList');  
        }
        return $this->render('drivers/newDriver.html.twig', [
           'driverForm' => $form->createView(),
        ]);
    }

    public function deleteDriver($id): Response
    {
        $em = $this->entityManager;
        $item = $em->getRepository(Drivers::class)->find($id);
        $em->remove($item);
        $em->flush();
        return $this->redirectToRoute('driverList');    
    }

    public function updateDriver(Request $request, $id): Response
    {
        $em = $this->entityManager;
        $driver = $em->getRepository(Drivers::class)->find($id);
        $form=$this->createForm(newDriverForm::class, $driver);
        $form->handleRequest($request);

        if($form->isSubmitted())
        {
            $this->entityManager->persist($driver);
            $this->entityManager->flush();
            return $this->redirectToRoute('driverList');   
        }
        return $this->render('drivers/newDriver.html.twig', [
            'driverForm' => $form->createView(),
        ]);
    }
}
