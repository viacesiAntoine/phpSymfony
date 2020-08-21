<?php

namespace App\Form;

use App\Entity\Marque;
use App\Entity\Produit;
use App\Entity\Stock;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProduitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            //->add('slug')
            ->add('Titre')
            ->add('Description')
            ->add('prixTTC',MoneyType::class,[
                'divisor'=>100
            ])
            ->add('Poids')
            ->add('Couleur',ChoiceType::class,[
                'choices'=>$this->getColorChoice()
            ])
            ->add('DateCreation')
            ->add('Stock',EntityType::class,[
                'class'=>Stock::class,
                'choice_label'=>'qte'
            ])
            ->add('Actif')
            ->add('marque',EntityType::class,[
                'class'=>Marque::class,
                'choice_label'=>'Nom'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Produit::class,
            'translation_domain'=> 'forms_produit'
        ]);
    }

    private function getColorChoice()
    {
        return array_flip(Produit::COULEUR);
    }
}
