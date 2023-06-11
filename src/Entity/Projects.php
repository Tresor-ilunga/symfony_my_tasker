<?php

namespace App\Entity;

use App\Repository\ProjectsRepository;
use DateTimeImmutable;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ProjectsRepository::class)]
#[ORM\HasLifecycleCallbacks]
#[UniqueEntity('projectName')]
class Projects
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    #[Assert\NotNull()]
    #[Assert\Length(min: 1, max: 50)]
    private ?string $projectName = null;

    #[ORM\Column(length: 50)]
    #[Assert\NotNull()]
    #[Assert\Length(min: 1, max: 50)]
    private ?string $ProjectLead = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotNull()]
    private ?string $Team = null;

    #[ORM\Column(type: "float")]
    #[Assert\NotNull()]
    private ?float $Progress = null;

    #[ORM\Column(type: Types::DATETIME_IMMUTABLE)]
    private ?DateTimeImmutable $deadline = null;

    public function __construct()
    {
        $this->deadline = new DateTimeImmutable();
    }

    #[ORM\PrePersist]
    public function prePersist(): void
    {
        $this->deadline = new DateTimeImmutable();
    }

    #[ORM\PreUpdate]
    public function preUpdate(): void
    {
        $this->deadline = new DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProjectName(): ?string
    {
        return $this->projectName;
    }

    public function setProjectName(string $projectName): self
    {
        $this->projectName = $projectName;

        return $this;
    }

    public function getProjectLead(): ?string
    {
        return $this->ProjectLead;
    }

    public function setProjectLead(string $ProjectLead): self
    {
        $this->ProjectLead = $ProjectLead;

        return $this;
    }

    public function getTeam(): ?string
    {
        return $this->Team;
    }

    public function setTeam(string $Team): self
    {
        $this->Team = $Team;

        return $this;
    }

    public function getProgress(): ?float
    {
        return $this->Progress;
    }

    public function setProgress(float $Progress): self
    {
        $this->Progress = $Progress;

        return $this;
    }

    public function getDeadline(): ?DateTimeImmutable
    {
        return $this->deadline;
    }

    public function setDeadline(DateTimeImmutable $deadline): static
    {
        $this->deadline = $deadline;

        return $this;
    }

    public function __toString(): string
    {
        return $this->projectName;
    }

}
