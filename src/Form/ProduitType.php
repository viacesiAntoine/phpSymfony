<?php

namespace App\Form;

use App\Entity\Produit;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Choice;

class ProduitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            //->add('slug')
            ->add('Titre')
            ->add('Description')
            ->add('prixTTC')
            ->add('Poids')
            ->add('Couleur',ChoiceType::class,[
                'choices'=>$this->getColorChoice()
            ])
            ->add('DateCreation')
            ->add('StockQte')
            ->add('Actif')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Produit::class,
        ]);


    }

    private function getColorChoice()
    {
        return array_flip(Produit::COULEUR);
    }
}
