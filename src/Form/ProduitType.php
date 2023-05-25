<?php

namespace App\Form;

use App\Entity\Produit;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ColorType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProduitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('description')
            ->add('taille')
            ->add('color', ColorType::class)
            ->add('image',FileType::class, [
                'attr'=>[
                    'multiple'=>true
                ]
            ])
            ->add('prix')
            ->add('qte_stock', NumberType::class,[
                'attr'=>[
                    'min' => 0,
                    'placeholder'=>"la quantité en stock"
                ]
            ])
            ->add('categorie')
            // ->add('produitCommande')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Produit::class,
        ]);
    }
}
