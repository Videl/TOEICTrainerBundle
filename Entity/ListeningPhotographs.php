<?php

namespace TN\TOEICTrainerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ListeningPhotographs
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="TN\TOEICTrainerBundle\Entity\ListeningPhotographsRepository")
 */
class ListeningPhotographs
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
     * PictureFile entity
     * Relationship 1-1
     * 
     * @ORM\OneToOne(targetEntity="PictureFile")
     */
    private $picture;

    /**
     * AudioFile entity
     * Relationship 1-1
     * 
     * @ORM\OneToOne(targetEntity="AudioFile")
     */
    private $correctDescription;


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
     * Get picture
     *
     * @return \TN\TOEICTrainerBundle\Entity\PictureFile 
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set picture
     *
     * @param \TN\TOEICTrainerBundle\Entity\PictureFile $picture
     * @return ListeningPhotographs
     */
    public function setPicture(\TN\TOEICTrainerBundle\Entity\PictureFile $picture = null)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get correctDescription
     *
     * @return \TN\TOEICTrainerBundle\Entity\AudioFile 
     */
    public function getCorrectDescription()
    {
        return $this->correctDescription;
    }

    /**
     * Set correctDescription
     *
     * @param \TN\TOEICTrainerBundle\Entity\AudioFile $correctDescription
     * @return ListeningPhotographs
     */
    public function setCorrectDescription(\TN\TOEICTrainerBundle\Entity\AudioFile $correctDescription = null)
    {
        $this->correctDescription = $correctDescription;

        return $this;
    }

}
