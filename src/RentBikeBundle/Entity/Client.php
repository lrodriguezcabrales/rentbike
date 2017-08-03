<?php

namespace RentBikeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="client")
 * @ORM\Entity(repositoryClass="RentBikeBundle\Repository\UserRepository")
 */
class Client extends User
{
    /**
     * @ORM\Column(type="guid")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="UUID")
     */
    private $id;

    
}