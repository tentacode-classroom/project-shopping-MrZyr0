<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User
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
}
