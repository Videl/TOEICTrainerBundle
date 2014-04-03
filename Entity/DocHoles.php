<?php

namespace TN\TOEICTrainerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DocHoles
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="TN\TOEICTrainerBundle\Entity\DocHolesRepository")
 */
class DocHoles
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
     * @var string
     *
     * @ORM\Column(name="WordDocHoles", type="text")
     */
    private $wordDocHoles;


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
     * Set wordDocHoles
     *
     * @param string $wordDocHoles
     * @return DocHoles
     */
    public function setWordDocHoles($wordDocHoles)
    {
        $this->wordDocHoles = $wordDocHoles;

        return $this;
    }

    /**
     * Get wordDocHoles
     *
     * @return string 
     */
    public function getWordDocHoles()
    {
        return $this->wordDocHoles;
    }

    /**
     * Set document
     *
     * @param \TN\TOEICTrainerBundle\Entity\WrittenDocument $document
     * @return DocHoles
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
}
