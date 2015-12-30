<?php

namespace Scolarite\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Emploi
 *
 * @ORM\Table(name="emploi")
 * @ORM\Entity(repositoryClass="Scolarite\AdminBundle\Entity\EmploiRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Emploi {

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
     * @ORM\ManyToOne(targetEntity="Scolarite\AdminBundle\Entity\Classe", inversedBy="Absence", cascade={"persist"})
     * @ORM\JoinColumn(name="classe_id", referencedColumnName="id", nullable=true, onDelete="CASCADE")
     */
    private $classe;

    /**
     * @var string
     *
     * @ORM\Column(name="path", type="string", length=255, nullable=true)
     */
    private $path;
    private $temp;

    /**
     * @Assert\File(maxSize="6000000")
     */
    private $file;

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
     * @return Emploi
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

    // upload file functions

    public function getAbsolutePath() {
        return null === $this->path ? null : $this->getUploadRootDir() . '/' . $this->path;
    }

    public function getWebPath() {
        return null === $this->path ? null : $this->getUploadDir() . '/' . $this->path;
    }

    protected function getUploadRootDir() {
        // the absolute directory path where uploaded
        // documents should be saved
        return __DIR__ . '/../../../../web/' . $this->getUploadDir();
    }

    protected function getUploadDir() {
        // get rid of the __DIR__ so it doesn't screw up
        // when displaying uploaded doc/image in the view.
        return 'uploads/emploi';
    }

    /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFile(UploadedFile $file = null) {
        $this->file = $file;
        // check if we have an old image path
        if (isset($this->path)) {
            // store the old name to delete after the update
            $this->temp = $this->path;
            $this->path = null;
        } else {
            $this->path = 'initial';
        }
    }

    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getFile() {
        return $this->file;
    }

    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload() {
        if (null !== $this->getFile()) {
            // do whatever you want to generate a unique name
            $filename = sha1(uniqid(mt_rand(), true));
            $this->path = $filename . '.' . $this->getFile()->guessExtension();
        }
    }

    //function upload file

    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload() {
        if (null === $this->getFile()) {
            return;
        }

        // if there is an error when moving the file, an exception will
        // be automatically thrown by move(). This will properly prevent
        // the entity from being persisted to the database on error
        $this->getFile()->move($this->getUploadRootDir(), $this->path);

        // check if we have an old image
        if (isset($this->temp)) {
            // delete the old image
            unlink($this->getUploadRootDir() . '/' . $this->temp);
            // clear the temp image path
            $this->temp = null;
        }
        $this->file = null;
    }

    /**
     * @ORM\PostRemove()
     */
    public function removeUpload() {
        if ($file = $this->getAbsolutePath()) {
            unlink($file);
        }
    }

    /**
     * Set path
     *
     * @param string $path
     * @return Outlet
     */
    public function setPath($path) {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string
     */
    public function getPath() {
        return $this->path;
    }

    public function __toString() {
        return $this->nom;
    }



    /**
     * Set classe
     *
     * @param \Scolarite\AdminBundle\Entity\Classe $classe
     * @return Emploi
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
     * @return Emploi
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
     * @return Emploi
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
     * @return Emploi
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
