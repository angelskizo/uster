<?php

namespace App\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class newVehicleForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options )
    {
        $builder->add('brand', TextType::class, array('label' => 'Vehicle Brand'))
        ->add('model', TextType::class, array('label' => 'Vehicle Model'))
        ->add('plate', TextType::class, array('label' => 'Vehicle Plate'))
        ->add('licenseRequired', TextType::class, array('label' => 'License Required'))
        ->add('submit', SubmitType::class, array('label' => 'Save Vehicle Data'));
    }
}

?>