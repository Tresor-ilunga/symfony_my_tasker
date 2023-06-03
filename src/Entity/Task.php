<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\TaskRepository;
use DateTimeImmutable;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Task
 *
 * @author tresor-ilunga <ilungat82@gmail.com>
 */

#[ORM\Entity(repositoryClass: TaskRepository::class)]
#[UniqueEntity('title')]
class Task
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank()]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Assert\NotBlank()]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank()]
    #[Assert\Choice(['high','medium', 'low'])]
    private ?string $priorities = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank()] // qui vérifie si la propriété est vide
    #[Assert\Choice(['todo','inprogress', 'done'])] // ui vérifie si la propriété est l'une des valeurs autorisées
    private ?string $state = null;

    #[ORM\Column]
    #[Assert\NotBlank()]
    private ?DateTimeImmutable $created_at;

    #[ORM\Column]
    #[Assert\NotBlank()]
    //#[Assert\GreaterThan("today")]
    private ?DateTimeImmutable $endDate;

    public function __construct()
    {
        $this->created_at = new DateTimeImmutable();
        $this->endDate = new DateTimeImmutable();
    }

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPriorities(): ?string
    {
        return $this->priorities;
    }

    public function setPriorities(string $priorities): self
    {
        $this->priorities = $priorities;

        return $this;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(string $state): self
    {
        $this->state = $state;

        return $this;
    }

    public function getCreatedAt(): ?DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(DateTimeImmutable $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getEndDate(): ?DateTimeImmutable
    {
        return $this->endDate;
    }

    public function setEndDate(DateTimeImmutable $endDate): self
    {
        $this->endDate = $endDate;

        return $this;
    }

    public function __toString(): string
    {
        return $this->description;
    }
}
