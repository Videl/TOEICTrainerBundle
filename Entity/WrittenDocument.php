<?php

namespace TN\TOEICTrainerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * WrittenDocument
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="TN\TOEICTrainerBundle\Entity\WrittenDocumentRepository")
 */
class WrittenDocument
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
     * @var string
     *
     * @ORM\Column(name="Document", type="text")
     */
    private $document;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="published", type="datetime")
     */
    private $published;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    public function __construct()
    {
        $this->published = new \DateTime();
    }

    /**
     * Set document
     *
     * @param string $document
     * @return WrittenDocument
     */
    public function setDocument($document)
    {
        $this->document = $document;

        return $this;
    }

    /**
     * Get document
     *
     * @return string 
     */
    public function getDocument()
    {
        return $this->document;
    }

    /**
     * Set published
     *
     * @param \DateTime $published
     * @return WrittenDocument
     */
    public function setPublished($published)
    {
        $this->published = $published;

        return $this;
    }

    /**
     * Get published
     *
     * @return \DateTime 
     */
    public function getPublished()
    {
        return $this->published;
    }

    public function __toString()
    {
        return $this->document;
    }
}
