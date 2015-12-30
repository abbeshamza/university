<?php

namespace Scolarite\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Club
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Scolarite\AdminBundle\Entity\ClubRepository")
 */
class Club
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
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="president", type="string", length=255)
     */
    private $president;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbr_membre", type="integer")
     */
    private $nbrMembre;


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
     * Set nom
     *
     * @param string $nom
     * @return Club
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set president
     *
     * @param string $president
     * @return Club
     */
    public function setPresident($president)
    {
        $this->president = $president;

        return $this;
    }

    /**
     * Get president
     *
     * @return string 
     */
    public function getPresident()
    {
        return $this->president;
    }

    /**
     * Set nbrMembre
     *
     * @param integer $nbrMembre
     * @return Club
     */
    public function setNbrMembre($nbrMembre)
    {
        $this->nbrMembre = $nbrMembre;

        return $this;
    }

    /**
     * Get nbrMembre
     *
     * @return integer 
     */
    public function getNbrMembre()
    {
        return $this->nbrMembre;
    }
}
