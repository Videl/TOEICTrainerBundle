<?php

namespace TN\TOEICTrainerBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class AnswerQuestionType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('question', 'entity', 
                array(
                    'class' => 'TOEICTrainerBundle:AudioFile', 
                    'query_builder' => function(EntityRepository $er) {
                    return $er->createQueryBuilder('af')
                    ->where("af.type = 'Question'");
                }))
            ->add('correctAnswer', 'entity',
                array(
                    'class' => 'TOEICTrainerBundle:AudioFile', 
                    'query_builder' => function(EntityRepository $er) {
                    return $er->createQueryBuilder('af')
                    ->where("af.type = 'Answer'");
                }
            ));
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'TN\TOEICTrainerBundle\Entity\AnswerQuestion'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'tn_toeictrainerbundle_answerquestion';
    }
}
