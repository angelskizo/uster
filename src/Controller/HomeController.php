<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Form\newVehicleForm;
use App\Entity\Vehicles;
use Doctrine\ORM\EntityManagerInterface;

class HomeController extends AbstractController
{
    public function home(){

        return $this->render('home/home.html.twig', [ 
            
        ]);
    }

    
}
