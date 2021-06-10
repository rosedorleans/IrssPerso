<?php

namespace App\Entity;

use App\Repository\CityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CityRepository::class)
 */
class City
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;





    /**
     * @ORM\OneToMany(targetEntity=Event::class, mappedBy="city")
     */
    private $Cities;

    public function __construct()
    {
        $this->Cities = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|Event[]
     */
    public function getCities(): Collection
    {
        return $this->Cities;
    }

    public function addCity(Event $city): self
    {
        if (!$this->Cities->contains($city)) {
            $this->Cities[] = $city;
            $city->setCity($this);
        }

        return $this;
    }

    public function removeCity(Event $city): self
    {
        if ($this->Cities->removeElement($city)) {
            // set the owning side to null (unless already changed)
            if ($city->getCity() === $this) {
                $city->setCity(null);
            }
        }

        return $this;
    }
}
