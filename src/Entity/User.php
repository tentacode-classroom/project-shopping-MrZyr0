<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User implements UserInterface, \Serializable
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(
     *  message = "Vous devez obligatoirement remplir ce chanmp !"
     * )
     * @Assert\Email(
     *     message = "Ce n'est pas une adresse email valide !",
     *     checkMX = true
     * )
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(
     *  message = "Vous devez obligatoirement remplir ce chanmp !"
     * )
     * @Assert\Regex(
     *     pattern="/^[a-zA-Z0-9\w+\|]+$/",
     *     match=false,
     *     message = "Votre mot de passe doit être composé de : 2 MAJ + 2 min + 2 caractères spéciaux"
     * )
     * @Assert\Length(
     *      min = 8,
     *      minMessage = "Votre mot de passe doit faire 8 charactères minimum !",
     * )
     */
    private $password;

    // TODO: Changer la Regex pour compter le nb de caractères de chaques types
    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(
     *  message = "Vous devez obligatoirement remplir ce chanmp !"
     * )
     * @Assert\Regex(
     *     pattern="/\d/",
     *     match=false,
     *     message = "Votre nom doit être valide ! Il ne peux être composé que de lettres !"
     * )
     * @Assert\NotEqualTo(
     *     value = "Gabriel",
     *     message = "Votre nom ne peut être Gabriel"
     * )
    */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(
     *  message = "Vous devez obligatoirement remplir ce chanmp !"
     * )
     * @Assert\Regex(
     *     pattern="/\d/",
     *     match=false,
     *     message = "Votre nom doit être valide ! Il ne peux être composé que de lettres !"
     * )
    */
    private $lastName;

    /**
     * @ORM\Column(type="simple_array")
     */
    private $roles = ['ROLE_USER'];


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }
    public function getUsername()
   {
       return $this->email;
   }

   public function getSalt()
   {
       // you *may* need a real salt depending on your encoder
       // see section on salt below
       return null;
   }

   public function setRoles(array $roles): self
   {
       $this->roles = $roles;

       return $this;
   }

   public function getRoles()
   {
       return $this->roles;
   }

   public function eraseCredentials()
   {
   }

   /** @see \Serializable::serialize() */
   public function serialize()
   {
       return serialize(array(
           $this->id,
           $this->email,
           $this->password,
           // see section on salt below
           // $this->salt,
       ));
   }

   /** @see \Serializable::unserialize() */
   public function unserialize($serialized)
   {
       list (
           $this->id,
           $this->email,
           $this->password,
           // see section on salt below
           // $this->salt
       ) = unserialize($serialized, array('allowed_classes' => false));
   }

}
