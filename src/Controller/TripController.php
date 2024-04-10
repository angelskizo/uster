<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Form\newTripForm;
use App\Entity\Trip;
use App\Entity\Vehicles;
use Doctrine\ORM\EntityManagerInterface;


class TripController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    public function tripList(): Response
    {
        $tripsRepo = $this->entityManager->getRepository(Trip::class);
        $trips = $tripsRepo->findAll();

        return $this->render('trip/tripList.html.twig', [
            'trips' => $trips,
        ]);
    }

    public function newTrip(Request $request): Response
    {
        $trip = new Trip;
        $form=$this->createForm(newTripForm::class, $trip);
        $form->handleRequest($request);
        if($form->isSubmitted())
        {
            $this->entityManager->persist($trip);
            $this->entityManager->flush();
            return $this->redirectToRoute('tripList');  
        }
        return $this->render('trip/newTrip.html.twig', [
            'tripForm' => $form->createView(),
        ]);
    }
 
    public function deleteTrip($id): Response
    {
        $em = $this->entityManager;
        $item = $em->getRepository(Trip::class)->find($id);
        $em->remove($item);
        $em->flush();
        return $this->redirectToRoute('tripList');    
    }
}
