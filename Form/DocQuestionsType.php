<?php

namespace TN\TOEICTrainerBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DocQuestionsType extends AbstractType
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
                'attr' => array('onchange' => 'switchDoc(this)'),
                ))
            ->add('AQPairs', 'collection', array(
                'type' => new AnswerQuestionExerciceType(),
                'label' => "Choose the question/answers you want.",                
                'allow_add' => true,
                'by_reference' => false,
                'allow_delete' => true,
                ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'TN\TOEICTrainerBundle\Entity\DocQuestions'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'tn_toeictrainerbundle_docquestions';
    }
}
