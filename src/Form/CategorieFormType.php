<?php

namespace App\Form;

use App\Entity\Categorie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CategorieFormType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options):void
    {
        $builder->add('nom')
        ->add('famille');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([ //$resolver:une instance de la class OptionsResolver; par défaut c'est null, on veut changer ça et mettre data_class à la place
            'data_class'=>Categorie::class
        ]);
    }
}