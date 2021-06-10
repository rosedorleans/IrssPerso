<?php

namespace App\Entity;

use App\Repository\EventRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EventRepository::class)
 */
class Event
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $title;

    /**
     * @ORM\Column(type="datetime")
     */
    private $start;

    /**
     * @ORM\Column(type="datetime")
     */
    private $end;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="string")
     */
    private $place;

    /**
     * @ORM\Column(type="boolean")
     */
    private $all_day;

    /**
     * @ORM\ManyToOne(targetEntity=CategoryFormation::class, inversedBy="events")
     * @ORM\JoinColumn(nullable=false)
     */
    private $categoryFormation;

    /**
     * @ORM\ManyToOne(targetEntity=City::class, inversedBy="Cities")
     */
    private $city;

    /**
     * @ORM\ManyToOne(targetEntity=City::class, inversedBy="Cities")
     */
    private $city2;

    /**
     * @ORM\ManyToOne(targetEntity=City::class, inversedBy="Cities")
     */
    private $city3;




    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getStart(): ?\DateTimeInterface
    {
        return $this->start;
    }

    public function setStart(\DateTimeInterface $start): self
    {
        $this->start = $start;

        return $this;
    }

    public function getEnd(): ?\DateTimeInterface
    {
        return $this->end;
    }

    public function setEnd(\DateTimeInterface $end): self
    {
        $this->end = $end;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPlace()
    {
        return $this->place;
    }

    public function setPlace($place): void
    {
        $this->place = $place;
    }

    public function getAllDay(): ?bool
    {
        return $this->all_day;
    }

    public function setAllDay(bool $all_day): self
    {
        $this->all_day = $all_day;

        return $this;
    }

    public function getCategoryFormation(): ?CategoryFormation
    {
        return $this->categoryFormation;
    }

    public function setCategoryFormation(?CategoryFormation $categoryFormation): self
    {
        $this->categoryFormation = $categoryFormation;

        return $this;
    }

    public function getCity(): ?City
    {
        return $this->city;
    }

    public function setCity(?City $city): self
    {
        $this->city = $city;

        return $this;
    }


    public function getCity2(): ?City
    {
        return $this->city;
    }

    public function setCity2(?City $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getCity3(): ?City
    {
        return $this->city;
    }

    public function setCity3(?City $city): self
    {
        $this->city = $city;

        return $this;
    }

}

