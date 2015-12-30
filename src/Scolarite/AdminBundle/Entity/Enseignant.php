<?php

namespace Scolarite\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Enseignant
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Scolarite\AdminBundle\Entity\EnseignantRepository")
 */
class Enseignant
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
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var integer
     *
     * @ORM\Column(name="tel", type="integer")
     */
    private $tel;

    /**
     * @var integer
     *
     * @ORM\Column(name="mobile", type="integer")
     */
    private $mobile;

    /**
     * @var string
     *
     * @ORM\Column(name="date_naissance", type="string", length=255)
     */
    private $dateNaissance;
    /**
     * @ORM\ManyToOne(targetEntity="Specialite", cascade={"persist"})
     * @ORM\JoinColumn(name="specialite_id", referencedColumnName="id",nullable=true,onDelete="SET NULL")
     * */
private $specialite;
/**
     * @ORM\ManyToOne(targetEntity="Adresse", cascade={"persist"})
     * @ORM\JoinColumn(name="adresse_id", referencedColumnName="id",nullable=true,onDelete="SET NULL")
     * */
private $adresse;
/**
     * @ORM\ManyToOne(targetEntity="Departement", cascade={"persist"})
     * @ORM\JoinColumn(name="departement_id", referencedColumnName="id",nullable=true,onDelete="SET NULL")
     * */
private  $departement;
/**
     * @ORM\ManyToOne(targetEntity="Classe", cascade={"persist"})
     * @ORM\JoinColumn(name="classe_id", referencedColumnName="id",nullable=true,onDelete="SET NULL")
     * */
private $classe;
 /**
     * @ORM\ManyToOne(targetEntity="Matiere", cascade={"persist"})
     * @ORM\JoinColumn(name="matiere_id", referencedColumnName="id",nullable=true,onDelete="SET NULL")
     * */
private $matiere;

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
     * @return Enseignant
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
     * Set prenom
     *
     * @param string $prenom
     * @return Enseignant
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string 
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Enseignant
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set tel
     *
     * @param integer $tel
     * @return Enseignant
     */
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get tel
     *
     * @return integer 
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set mobile
     *
     * @param integer $mobile
     * @return Enseignant
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;

        return $this;
    }

    /**
     * Get mobile
     *
     * @return integer 
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * Set dateNaissance
     *
     * @param string $dateNaissance
     * @return Enseignant
     */
    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    /**
     * Get dateNaissance
     *
     * @return string 
     */
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    /**
     * Set specialite
     *
     * @param \Scolarite\AdminBundle\Entity\Specialite $specialite
     * @return Enseignant
     */
    public function setSpecialite(\Scolarite\AdminBundle\Entity\Specialite $specialite = null)
    {
        $this->specialite = $specialite;

        return $this;
    }

    /**
     * Get specialite
     *
     * @return \Scolarite\AdminBundle\Entity\Specialite 
     */
    public function getSpecialite()
    {
        return $this->specialite;
    }

    /**
     * Set adresse
     *
     * @param \Scolarite\AdminBundle\Entity\Adresse $adresse
     * @return Enseignant
     */
    public function setAdresse(\Scolarite\AdminBundle\Entity\Adresse $adresse = null)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return \Scolarite\AdminBundle\Entity\Adresse 
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set departement
     *
     * @param \Scolarite\AdminBundle\Entity\Departement $departement
     * @return Enseignant
     */
    public function setDepartement(\Scolarite\AdminBundle\Entity\Departement $departement = null)
    {
        $this->departement = $departement;

        return $this;
    }

    /**
     * Get departement
     *
     * @return \Scolarite\AdminBundle\Entity\Departement 
     */
    public function getDepartement()
    {
        return $this->departement;
    }

    /**
     * Set classe
     *
     * @param \Scolarite\AdminBundle\Entity\Classe $classe
     * @return Enseignant
     */
    public function setClasse(\Scolarite\AdminBundle\Entity\Classe $classe = null)
    {
        $this->classe = $classe;

        return $this;
    }

    /**
     * Get classe
     *
     * @return \Scolarite\AdminBundle\Entity\Classe 
     */
    public function getClasse()
    {
        return $this->classe;
    }

    /**
     * Set matiere
     *
     * @param \Scolarite\AdminBundle\Entity\Matiere $matiere
     * @return Enseignant
     */
    public function setMatiere(\Scolarite\AdminBundle\Entity\Matiere $matiere = null)
    {
        $this->matiere = $matiere;

        return $this;
    }

    /**
     * Get matiere
     *
     * @return \Scolarite\AdminBundle\Entity\Matiere 
     */
    public function getMatiere()
    {
        return $this->matiere;
    }
     
      public function __toString() {
        return $this->nom;
    }
}
