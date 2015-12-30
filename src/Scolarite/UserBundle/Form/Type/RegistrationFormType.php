<?php

namespace Scolarite\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RegistrationFormType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        // add your custom field
        $builder
                ->add('nom')
                ->add('prenom')
                ->add('file')
                ->add('roles', 'choice', array('label' => 'Roles',
                    'choices' => array('ROLE_ETUDIANT' => 'Etudiant', 'ROLE_ENSEIGNANT' => 'Enseignant',
                        'ROLE_SUPER_ADMIN' => 'Super Administrator'),
                    'multiple' => true
                ))
                ->add('enabled')
                ->add('dateNaissance')
                ->add('tel')//
                ->add('mobile')//
                ->add('departement')
                ->add('classe')
                ->add('niveau')
                ->add('adresse')
                ->add('specialite')
                ->add('matiere')

        ;
    }

    public function getParent() {
        return 'fos_user_registration';
    }

    public function getName() {
        return 'scolarite_user_registration';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Scolarite\UserBundle\Entity\User',
            'csrf_protection' => FALSE,
        ));
    }

}
