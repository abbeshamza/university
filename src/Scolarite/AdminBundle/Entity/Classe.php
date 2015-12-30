<?php

namespace Scolarite\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Classe
 *
 * @ORM\Table(name="classe")
 * @ORM\Entity(repositoryClass="Scolarite\AdminBundle\Entity\ClasseRepository")
 */
class Classe {

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
     * @var integer
     *
     * @ORM\Column(name="nbr_etudiant", type="integer")
     */
    private $nbrEtudiant;

    /**
     * @ORM\ManyToOne(targetEntity="Scolarite\AdminBundle\Entity\Departement", inversedBy="Classe", cascade={"persist"})
     * @ORM\JoinColumn(name="departement_id", referencedColumnName="id", nullable=true, onDelete="CASCADE")
     */
    private $departement;

  /**
     * @ORM\ManyToOne(targetEntity="Scolarite\AdminBundle\Entity\Niveau", inversedBy="Classe", cascade={"persist"})
     * @ORM\JoinColumn(name="niveau_id", referencedColumnName="id", nullable=true, onDelete="CASCADE")
     */
    private $niveau;

    /**
     * @ORM\ManyToOne(targetEntity="Scolarite\AdminBundle\Entity\Emploi", inversedBy="Classe", cascade={"persist"})
     * @ORM\JoinColumn(name="emploi_id", referencedColumnName="id", nullable=true, onDelete="CASCADE")
     */
    private $emploi;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Classe
     */
    public function setNom($nom) {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom() {
        return $this->nom;
    }

    /**
     * Set nbrEtudiant
     *
     * @param integer $nbrEtudiant
     * @return Classe
     */
    public function setNbrEtudiant($nbrEtudiant) {
        $this->nbrEtudiant = $nbrEtudiant;

        return $this;
    }

    /**
     * Get nbrEtudiant
     *
     * @return integer 
     */
    public function getNbrEtudiant() {
        return $this->nbrEtudiant;
    }

    /**
     * Set departement
     *
     * @param \Scolarite\AdminBundle\Entity\Departement $departement
     * @return Classe
     */
    public function setDepartement(\Scolarite\AdminBundle\Entity\Departement $departement = null) {
        $this->departement = $departement;

        return $this;
    }

    /**
     * Get departement
     *
     * @return \Scolarite\AdminBundle\Entity\Departement 
     */
    public function getDepartement() {
        return $this->departement;
    }

    /**
     * Set niveau
     *
     * @param \Scolarite\AdminBundle\Entity\Niveau $niveau
     * @return Classe
     */
    public function setNiveau(\Scolarite\AdminBundle\Entity\Niveau $niveau = null) {
        $this->niveau = $niveau;

        return $this;
    }

    /**
     * Get niveau
     *
     * @return \Scolarite\AdminBundle\Entity\Niveau 
     */
    public function getNiveau() {
        return $this->niveau;
    }

    /**
     * Set emploi
     *
     * @param \Scolarite\AdminBundle\Entity\Emploi $emploi
     * @return Classe
     */
    public function setEmploi(\Scolarite\AdminBundle\Entity\Emploi $emploi = null) {
        $this->emploi = $emploi;

        return $this;
    }

    /**
     * Get emploi
     *
     * @return \Scolarite\AdminBundle\Entity\Emploi 
     */
    public function getEmploi() {
        return $this->emploi;
    }
public function __toString()
{
    return $this->nom;
}
}
