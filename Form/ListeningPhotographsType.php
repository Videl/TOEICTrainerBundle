<?php

namespace TN\TOEICTrainerBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ListeningPhotographsType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('picture')
            ->add('correctDescription')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'TN\TOEICTrainerBundle\Entity\ListeningPhotographs'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'tn_toeictrainerbundle_listeningphotographs';
    }
}
