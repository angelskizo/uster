<?php

namespace App\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class newDriverForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options )
    {
        $builder->add('name', TextType::class, array('label' => 'Name'))
        ->add('surname', TextType::class, array('label' => 'Surname'))
        ->add('license', TextType::class, array('label' => 'Driver License'))
        ->add('submit', SubmitType::class, array('label' => 'Save Driver Data'));
    }
}

?>