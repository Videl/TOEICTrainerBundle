<?php

namespace TN\TOEICTrainerBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DocHolesType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        switch($options['flow_step'])
        {
            case 1:
                $builder
                    ->add('document');
                break;

            case 2:
                $builder
                    ->add('wordDocHoles', 'text', array(
                        'label' => 'Choose the holes that can be hidden:'
                        ));
                break;
        }
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
        return 'tn_toeictrainerbundle_docholes';
    }
}
