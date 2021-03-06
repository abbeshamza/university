<?php

namespace Scolarite\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Absence
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Scolarite\AdminBundle\Entity\AbsenceRepository")
 */
class Absence
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
     * @ORM\ManyToOne(targetEntity="Scolarite\AdminBundle\Entity\Classe", inversedBy="Absence", cascade={"persist"})
     * @ORM\JoinColumn(name="classe_id", referencedColumnName="id", nullable=true, onDelete="CASCADE")
     */
private $classe;
 /**
     * @ORM\ManyToOne(targetEntity="Scolarite\AdminBundle\Entity\Matiere", inversedBy="Absence", cascade={"persist"})
     * @ORM\JoinColumn(name="matiere_id", referencedColumnName="id", nullable=true, onDelete="CASCADE")
     */
private $matiere;
 /**
     * @ORM\ManyToOne(targetEntity="Scolarite\AdminBundle\Entity\Enseignant", inversedBy="Absence", cascade={"persist"})
     * @ORM\JoinColumn(name="enseignant_id", referencedColumnName="id", nullable=true, onDelete="CASCADE")
     */
private $enseignant;
 /**
     * @ORM\ManyToOne(targetEntity="Scolarite\AdminBundle\Entity\Departement", inversedBy="Absence", cascade={"persist"})
     * @ORM\JoinColumn(name="departement_id", referencedColumnName="id", nullable=true, onDelete="CASCADE")
     */
private $departement;
 /**
     * @ORM\ManyToOne(targetEntity="Scolarite\AdminBundle\Entity\Specialite", inversedBy="Absence", cascade={"persist"})
     * @ORM\JoinColumn(name="specialite_id", referencedColumnName="id", nullable=true, onDelete="CASCADE")
     */
private $specialite;
 /**
     * @ORM\ManyToOne(targetEntity="Scolarite\AdminBundle\Entity\Niveau", inversedBy="Absence", cascade={"persist"})
     * @ORM\JoinColumn(name="niveau_id", referencedColumnName="id", nullable=true, onDelete="CASCADE")
     */
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
     * @return Absence
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
     * Set classe
     *
     * @param \Scolarite\AdminBundle\Entity\Classe $classe
     * @return Absence
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
     * @return Absence
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
     * Set enseignant
     *
     * @param \Scolarite\AdminBundle\Entity\Enseignant $enseignant
     * @return Absence
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
     * Set departement
     *
     * @param \Scolarite\AdminBundle\Entity\Departement $departement
     * @return Absence
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
     * Set specialite
     *
     * @param \Scolarite\AdminBundle\Entity\Specialite $specialite
     * @return Absence
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
     * @return Absence
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
