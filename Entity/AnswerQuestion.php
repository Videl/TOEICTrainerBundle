<?php

namespace TN\TOEICTrainerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AnswerQuestion
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="TN\TOEICTrainerBundle\Entity\AnswerQuestionRepository")
 */
class AnswerQuestion
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * AudioFile entity
     * Relationship 1-1
     * 
     * @ORM\OneToOne(targetEntity="AudioFile")
     */
    private $question;

    /**
     * AudioFile entity
     * Relationship 1-1
     * 
     * @ORM\OneToOne(targetEntity="AudioFile")
     */
    private $correctAnswer;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get question
     *
     * @return \TN\TOEICTrainerBundle\Entity\AudioFile 
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * Set question
     *
     * @param \TN\TOEICTrainerBundle\Entity\AudioFile $question
     * @return AnswerQuestion
     */
    public function setQuestion(\TN\TOEICTrainerBundle\Entity\AudioFile $question = null)
    {
        $this->question = $question;

        return $this;
    }
    
    /**
     * Get correctAnswer
     *
     * @return \TN\TOEICTrainerBundle\Entity\AudioFile 
     */
    public function getCorrectAnswer()
    {
        return $this->correctAnswer;
    }

    /**
     * Set correctAnswer
     *
     * @param \TN\TOEICTrainerBundle\Entity\AudioFile $correctAnswer
     * @return AnswerQuestion
     */
    public function setCorrectAnswer(\TN\TOEICTrainerBundle\Entity\AudioFile $correctAnswer = null)
    {
        $this->correctAnswer = $correctAnswer;

        return $this;
    }
}
