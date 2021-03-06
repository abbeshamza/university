<?php

namespace Scolarite\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Etudiant
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Scolarite\AdminBundle\Entity\EtudiantRepository")
 */
class Etudiant
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
     * @ORM\Column(name="date_naissance", type="string", length=255)
     */
    private $dateNaissance;

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
     * @ORM\ManyToOne(targetEntity="Departement")
     * @ORM\JoinColumn(name="departement_id", referencedColumnName="id")
     * */
    private $departement;
    /**
     * @ORM\ManyToOne(targetEntity="Classe")
     * @ORM\JoinColumn(name="classe_id", referencedColumnName="id")
     * */
    private $classe;
    /**
     * @ORM\ManyToOne(targetEntity="Niveau")
     * @ORM\JoinColumn(name="niveau_id", referencedColumnName="id")
     * */
    private $niveau;
      /**
     * @ORM\ManyToOne(targetEntity="Adresse")
     * @ORM\JoinColumn(name="adresse_id", referencedColumnName="id")
     * */
    private $adresse;
    

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
     * @return Etudiant
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
     * @return Etudiant
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
     * Set dateNaissance
     *
     * @param string $dateNaissance
     * @return Etudiant
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
     * Set email
     *
     * @param string $email
     * @return Etudiant
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
     * @return Etudiant
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
     * @return Etudiant
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
     * Set departement
     *
     * @param \Scolarite\AdminBundle\Entity\Departement $departement
     * @return Etudiant
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
     * @return Etudiant
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
     * Set niveau
     *
     * @param \Scolarite\AdminBundle\Entity\Niveau $niveau
     * @return Etudiant
     */
    public function setNiveau(\Scolarite\AdminBundle\Entity\Niveau $niveau = null)
    {
        $this->niveau = $niveau;

        return $this;
    }

    /**
     * Get niveau
     *
     * @return \Scolarite\AdminBundle\Entity\Niveau 
     */
    public function getNiveau()
    {
        return $this->niveau;
    }

    /**
     * Set adresse
     *
     * @param \Scolarite\AdminBundle\Entity\Adresse $adresse
     * @return Etudiant
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
}
