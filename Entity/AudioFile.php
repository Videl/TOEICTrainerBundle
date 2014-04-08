<?php

namespace TN\TOEICTrainerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validation\Constraints as Assert;

/**
 * AudioFile
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="TN\TOEICTrainerBundle\Entity\AudioFileRepository")
 */
class AudioFile
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
     * @ORM\OneToOne(targetEntity="TN\TOEICTrainerBundle\Entity\File", cascade={"persist"})
     */
    private $file;

    /**
     * @var string
     *
     * @ORM\Column(name="AudioTranscript", type="text")
     */
    private $audioTranscript;

    /**
     * @var string
     *
     * @ORM\Column(name="Type", type="string", length=255)
     */
    private $type;


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
     * Set file
     *
     * @param string $file
     * @return AudioFile
     */
    public function setFile($file)
    {
        $this->file = $file;

        return $this;
    }

    /**
     * Get file
     *
     * @return string 
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Set audioTranscript
     *
     * @param string $audioTranscript
     * @return AudioFile
     */
    public function setAudioTranscript($audioTranscript)
    {
        $this->audioTranscript = $audioTranscript;

        return $this;
    }

    /**
     * Get audioTranscript
     *
     * @return string 
     */
    public function getAudioTranscript()
    {
        return $this->audioTranscript;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return AudioFile
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }
}
