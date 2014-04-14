<?php

namespace TN\TOEICTrainerBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DocHolesExerciceType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('document', 'entity', array(
                'class' => 'TN\TOEICTrainerBundle\Entity\WrittenDocument',
                'required' => false,
                )) // <- this bit will be hidden, I use this to get the data
            ->add('wordDocHoles', 'collection', array(
                'type' => 'text',
                'allow_add' => true,
                'by_reference' => false,
                'allow_delete' => true,
                'disabled' => true,
                ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'TN\TOEICTrainerBundle\Entity\DocHoles'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'tn_toeictrainerbundle_docholes_exercice';
    }
}
