<?php

namespace Scolarite\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EmploiType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('nom')
                ->add('file')
            ->add('departement')
            ->add('specialite')
            ->add('niveau')
            ->add('classe')
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Scolarite\AdminBundle\Entity\Emploi'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'scolarite_adminbundle_emploi';
    }

}
