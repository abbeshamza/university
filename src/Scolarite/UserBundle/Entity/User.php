<?php

namespace Scolarite\UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Scolarite\AdminBundle\Entity\Departement;

/**
 * @ORM\Entity
 * @ORM\Table(name="utilisateurs")
 * @ORM\HasLifecycleCallbacks
// */
class User extends BaseUser {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="nom", type="string", length=255)
     */
    protected $nom;

    /**
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    protected $prenom;
    /**
     * @var string
     *
     * @ORM\Column(name="date_naissance", type="string",nullable=true, length=255)
     */
    private $dateNaissance;

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
     * @ORM\ManyToOne(targetEntity="\Scolarite\AdminBundle\Entity\Departement")
     * @ORM\JoinColumn(name="departement_id", referencedColumnName="id")
     * */
    private $departement;
    /**
     * @ORM\ManyToOne(targetEntity="\Scolarite\AdminBundle\Entity\Classe")
     * @ORM\JoinColumn(name="classe_id", referencedColumnName="id")
     * */
    private $classe;
    /**
     * @ORM\ManyToOne(targetEntity="\Scolarite\AdminBundle\Entity\Niveau")
     * @ORM\JoinColumn(name="niveau_id", referencedColumnName="id")
     * */
    private $niveau;
    /**
     * @ORM\ManyToOne(targetEntity="\Scolarite\AdminBundle\Entity\Adresse")
     * @ORM\JoinColumn(name="adresse_id", referencedColumnName="id")
     * */
    private $adresse;
    /**
     * @ORM\ManyToOne(targetEntity="\Scolarite\AdminBundle\Entity\Specialite", cascade={"persist"})
     * @ORM\JoinColumn(name="specialite_id", referencedColumnName="id",nullable=true,onDelete="SET NULL")
     * */
    private $specialite;
    /**
     * @ORM\ManyToOne(targetEntity="\Scolarite\AdminBundle\Entity\Matiere", cascade={"persist"})
     * @ORM\JoinColumn(name="matiere_id", referencedColumnName="id",nullable=true,onDelete="SET NULL")
     * */
    private $matiere;


    /**
     * @var string
     *
     * @ORM\Column(name="path", type="string", length=255, nullable=false)
     */
    private $path;
    private $temp;

    /**
     * @Assert\File(maxSize="6000000")
     */
    private $file;

    public function __construct() {
        parent::__construct();
        // your own logic
        $this->enabled = true;
    }

    function getNom() {
        return $this->nom;
    }

    function getPrenom() {
        return $this->prenom;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }

    function setPrenom($prenom) {
        $this->prenom = $prenom;
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
        return 'uploads/utilisateurs';
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


    /**
     * Set dateNaissance
     *
     * @param string $dateNaissance
     * @return User
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
     * Set tel
     *
     * @param integer $tel
     * @return User
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
     * @return User
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
     * @return User
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
     * @return User
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
     * @return User
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
     * @return User
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
     * Set specialite
     *
     * @param \Scolarite\AdminBundle\Entity\Specialite $specialite
     * @return User
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
     * Set matiere
     *
     * @param \Scolarite\AdminBundle\Entity\Matiere $matiere
     * @return User
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



}
