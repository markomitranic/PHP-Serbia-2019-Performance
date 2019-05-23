<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Authors
 *
 * @ORM\Table(name="authors", uniqueConstraints={@ORM\UniqueConstraint(name="email", columns={"email"})})
 * @ORM\Entity(repositoryClass="App\Repository\AuthorsRepository")
 */
class Authors
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=50, nullable=false)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=50, nullable=false)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=100, nullable=false)
     */
    private $email;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birthdate", type="date", nullable=false)
     */
    private $birthdate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="added", type="datetime", nullable=false, options={"default"="current_timestamp()"})
     */
    private $added = 'current_timestamp()';

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Authors
     */
    public function setId(int $id): Authors
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @return Authors
     */
    public function setFirstName(string $firstName): Authors
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     * @return Authors
     */
    public function setLastName(string $lastName): Authors
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return Authors
     */
    public function setEmail(string $email): Authors
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getBirthdate(): \DateTime
    {
        return $this->birthdate;
    }

    /**
     * @param \DateTime $birthdate
     * @return Authors
     */
    public function setBirthdate(\DateTime $birthdate): Authors
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getAdded(): \DateTime
    {
        return $this->added;
    }

    /**
     * @param \DateTime $added
     * @return Authors
     */
    public function setAdded(\DateTime $added): Authors
    {
        $this->added = $added;

        return $this;
    }
}
