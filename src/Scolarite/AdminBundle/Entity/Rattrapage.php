<?php

namespace Scolarite\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rattrapage
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Scolarite\AdminBundle\Entity\RattrapageRepository")
 */
class Rattrapage
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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;
     /**
     * @ORM\ManyToOne(targetEntity="Salle")
     * @ORM\JoinColumn(name="salle_id", referencedColumnName="id")
     * */
private $salle;
 /**
     * @ORM\ManyToOne(targetEntity="Matiere")
     * @ORM\JoinColumn(name="matiere_id", referencedColumnName="id")
     * */
private $matiere;
/**
     * @ORM\ManyToOne(targetEntity="Classe")
     * @ORM\JoinColumn(name="classe_id", referencedColumnName="id")
     * */
private $classe;
/**
     * @ORM\ManyToOne(targetEntity="Departement")
     * @ORM\JoinColumn(name="departement_id", referencedColumnName="id")
     * */
private $departement;
/**
     * @ORM\ManyToOne(targetEntity="Enseignant")
     * @ORM\JoinColumn(name="enseignant_id", referencedColumnName="id")
     * */
private $enseignant;
/**
     * @ORM\ManyToOne(targetEntity="Specialite")
     * @ORM\JoinColumn(name="specialite_id", referencedColumnName="id")
     * */
private $specialite;
/**
     * @ORM\ManyToOne(targetEntity="Niveau")
     * @ORM\JoinColumn(name="niveau_id", referencedColumnName="id")
     * */
private $niveau;


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
     * Set date
     *
     * @param \DateTime $date
     * @return Rattrapage
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set salle
     *
     * @param \Scolarite\AdminBundle\Entity\Salle $salle
     * @return Rattrapage
     */
    public function setSalle(\Scolarite\AdminBundle\Entity\Salle $salle = null)
    {
        $this->salle = $salle;

        return $this;
    }

    /**
     * Get salle
     *
     * @return \Scolarite\AdminBundle\Entity\Salle 
     */
    public function getSalle()
    {
        return $this->salle;
    }

    /**
     * Set matiere
     *
     * @param \Scolarite\AdminBundle\Entity\Matiere $matiere
     * @return Rattrapage
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

    /**
     * Set classe
     *
     * @param \Scolarite\AdminBundle\Entity\Classe $classe
     * @return Rattrapage
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
     * Set departement
     *
     * @param \Scolarite\AdminBundle\Entity\Departement $departement
     * @return Rattrapage
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
     * Set enseignant
     *
     * @param \Scolarite\AdminBundle\Entity\Enseignant $enseignant
     * @return Rattrapage
     */
    public function setEnseignant(\Scolarite\AdminBundle\Entity\Enseignant $enseignant = null)
    {
        $this->enseignant = $enseignant;

        return $this;
    }

    /**
     * Get enseignant
     *
     * @return \Scolarite\AdminBundle\Entity\Enseignant 
     */
    public function getEnseignant()
    {
        return $this->enseignant;
    }

    /**
     * Set specialite
     *
     * @param \Scolarite\AdminBundle\Entity\Specialite $specialite
     * @return Rattrapage
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
     * Set niveau
     *
     * @param \Scolarite\AdminBundle\Entity\Niveau $niveau
     * @return Rattrapage
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
}
