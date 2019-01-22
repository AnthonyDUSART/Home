<?php

namespace Home\UtilisateurBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Home\UtilisateurBundle\Entity\Role;

/**
 * Groupe
 *
 * @ORM\Table(name="utilisateur_groupe")
 * @ORM\Entity(repositoryClass="Home\UtilisateurBundle\Repository\GroupeRepository")
 */
class Groupe
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_groupe", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=255, unique=true)
     */
    private $libelle;

    /**
     * @var ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="Role")
     * @ORM\JoinTable(name="utilisateur_groupes_roles",
     *      joinColumns={@ORM\JoinColumn(name="id_groupe", referencedColumnName="id_groupe")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="id_role", referencedColumnName="id_role", unique=true)}
     *      )
     */
    private $roles;

    public function __construct($libelle) {
        $this->libelle = $libelle;
        $this->roles = new ArrayCollection();
    }


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set libelle
     *
     * @param string $libelle
     *
     * @return Groupe
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Get Roles
     * @return Role
     */
    public function getRoles() {
        return $this->roles;
    }

    /**
     * Add Role
     * @param Role $role
     */
    public function addRole(Role $role) {
        $this->roles[] = $role;
    }
}
