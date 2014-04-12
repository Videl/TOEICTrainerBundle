<?php

namespace TN\TOEICTrainerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\File;

/**
 * AudioFile
 * @ORM\HasLifecycleCallbacks
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $path;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    public $name;

    /**
     * @Assert\File(
     * maxSize="6000000",
     * mimeTypes = {"audio/mpeg", "audio/x-wav"},
     * mimeTypesMessage = "The mime type of the file is invalid ({{ type }}). Allowed mime types are {{ types }}"
     * )
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
     * @param File $file
     * @return AudioFile
     */
    public function setFile($file)
    {
        $this->file = $file;
        // Remove old file
        if ($this->path) {
            if ($file = $this->getAbsolutePath()) {
                unlink($file);
            }
        }
        $this->path = $this->getWebPath();
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
     * Set name
     *
     * @param string $name
     * @return AudioFile
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
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

    public function getAbsolutePath()
    {
        return null === $this->path ? null : $this->getUploadRootDir().'/'.$this->path;
    }
 
    public function getWebPath()
    {
        return null === $this->path ? null : $this->getUploadDir().'/'.$this->path;
    }

    protected function getUploadRootDir()
    {
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        return 'bundles/toeictrainer/uploads/audioFiles';
    }

    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload()
    {
        if (null !== $this->file) {
            $this->path = sha1(uniqid(mt_rand(), true)).'.'.$this->file->guessExtension();
        }
    }
 
    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload()
    {
        if (null === $this->file) {
            return;
        }
 
        $this->file->move($this->getUploadRootDir(), $this->path);
 
        unset($this->file);
    }
 
    /**
     * @ORM\PostRemove()
     */
    public function removeUpload()
    {
        if ($file = $this->getAbsolutePath()) {
            unlink($file);
        }
    }

    public function __toString()
    {
        return $this->name;
    }
}
