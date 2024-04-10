<?php

namespace App\Form;

use App\Entity\Vehicles;
use App\Entity\Drivers;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class newTripForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options )
    {
        $builder->add('vehicle', EntityType::class, array('class' => Vehicles::class,'choice_label' => 'model'))
        ->add('driver', EntityType::class, array('class' => Drivers::class, 'choice_label' => 'surname'))
        ->add('submit', SubmitType::class, array('label' => 'Select this date'));
    }
}

?>