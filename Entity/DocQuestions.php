<?php

namespace TN\TOEICTrainerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DocQuestions
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="TN\TOEICTrainerBundle\Entity\DocQuestionsRepository")
 */
class DocQuestions
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
     * Document entity
     * Relationship 1-1
     * 
     * @ORM\OneToOne(targetEntity="WrittenDocument")
     */
    private $document;

    /**
     * Question/Answer
     * 
     * @ORM\OneToMany(targetEntity="AnswerQuestion", mappedBy="docQuestions", cascade={"persist"})
     */
    private $AQPairs;

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
     * Constructor
     */
    public function __construct()
    {
        $this->AQPairs = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set document
     *
     * @param \TN\TOEICTrainerBundle\Entity\WrittenDocument $document
     * @return DocQuestions
     */
    public function setDocument(\TN\TOEICTrainerBundle\Entity\WrittenDocument $document = null)
    {
        $this->document = $document;

        return $this;
    }

    /**
     * Get document
     *
     * @return \TN\TOEICTrainerBundle\Entity\WrittenDocument 
     */
    public function getDocument()
    {
        return $this->document;
    }

    /**
     * Add AQPairs
     *
     * @param \TN\TOEICTrainerBundle\Entity\AnswerQuestion $aQPairs
     * @return DocQuestions
     */
    public function addAQPair(\TN\TOEICTrainerBundle\Entity\AnswerQuestion $aQPairs)
    {
        $this->AQPairs[] = $aQPairs;

        return $this;
    }

    /**
     * Remove AQPairs
     *
     * @param \TN\TOEICTrainerBundle\Entity\AnswerQuestion $aQPairs
     */
    public function removeAQPair(\TN\TOEICTrainerBundle\Entity\AnswerQuestion $aQPairs)
    {
        $this->AQPairs->removeElement($aQPairs);
    }

    /**
     * Get AQPairs
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAQPairs()
    {
        return $this->AQPairs;
    }
}
