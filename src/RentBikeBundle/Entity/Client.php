<?php

namespace RentBikeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Client
 *
 * @ORM\Table(name="client")
 * @ORM\Entity(repositoryClass="RentBikeBundle\Repository\UserRepository")
 */
class Client
{
    /**
     * @ORM\Column(type="guid")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="UUID")
     */
    private $id;

    /**
     * @ORM\Column(name="fullname", type="string", length=255)
     */
    private $fullname;

    /**
     * @ORM\ManyToOne(targetEntity="RentBikeBundle\Entity\AttributeList",cascade={"persist"})
     * @ORM\JoinColumn(name="identificationType_id", referencedColumnName="id", nullable=false)
     * @Assert\NotBlank()
     */
    private $identificationType;

    /**
     * @ORM\Column(name="identification", type="string", length=255)
     */
    private $identification;



    /**
     * Get id
     *
     * @return guid
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set fullname
     *
     * @param string $fullname
     *
     * @return Client
     */
    public function setFullname($fullname)
    {
        $this->fullname = $fullname;

        return $this;
    }

    /**
     * Get fullname
     *
     * @return string
     */
    public function getFullname()
    {
        return $this->fullname;
    }

    /**
     * Set identificationType
     *
     * @param \RentBikeBundle\Entity\AttributeList $identificationType
     *
     * @return Client
     */
    public function setIdentificationType($identificationType)
    {
        $this->identificationType = $identificationType;

        return $this;
    }

    /**
     * Get identificationType
     *
     * @return string
     */
    public function getIdentificationType()
    {
        return $this->identificationType;
    }

    /**
     * Set identification
     *
     * @param string $identification
     *
     * @return Client
     */
    public function setIdentification($identification)
    {
        $this->identification = $identification;

        return $this;
    }

    /**
     * Get identification
     *
     * @return string
     */
    public function getIdentification()
    {
        return $this->identification;
    }
}
