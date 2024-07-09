<?php

namespace App\Form;

use App\Entity\Commande;
use App\Entity\Utilisateur;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommandeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date_commande', null, [
                'widget' => 'single_text',
            ])
            ->add('montant_commande_HT')
            ->add('montant_commande_TTC')
            ->add('TVA')
            ->add('id_facture')
            ->add('date_facture', null, [
                'widget' => 'single_text',
            ])
            ->add('moyen_paiement')
            ->add('adresse_facturation')
            ->add('etat_facture')
            ->add('adresse_livraison')
            ->add('etat_livraison')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Commande::class,
        ]);
    }
}
