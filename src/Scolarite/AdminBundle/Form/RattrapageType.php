<?php

namespace Scolarite\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RattrapageType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date')
            ->add('salle')
            ->add('classe')
            ->add('matiere')
                 ->add('departement')
                 ->add('enseignant')
                 ->add('niveau')
                 ->add('specialite')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Scolarite\AdminBundle\Entity\Rattrapage'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'scolarite_adminbundle_rattrapage';
    }
}
