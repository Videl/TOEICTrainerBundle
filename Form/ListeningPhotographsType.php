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
            ->add('picture', 'entity', array(
                'class' => 'TN\TOEICTrainerBundle\Entity\PictureFile',
                'label' => 'Choose the picture you want the student to recognise.'))
            ->add('correctDescription', 'entity', array(
                'class' => 'TN\TOEICTrainerBundle\Entity\AudioFile',
                'label' => 'Choose the corresponding sound description'))
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
