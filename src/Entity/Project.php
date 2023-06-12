<?php

namespace App\Entity;

use App\Repository\ProjectRepository;
use DateTimeImmutable;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ProjectRepository::class)]
#[ORM\HasLifecycleCallbacks]
#[UniqueEntity('projectName')]
class Project
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
    private ?string $projectLead = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotNull()]
    private ?string $team = null;

    #[ORM\Column(type: "float")]
    #[Assert\NotNull()]
    private ?float $progress = null;

    #[ORM\Column(type: Types::DATETIME_IMMUTABLE)]
    private ?DateTimeImmutable $deadline = null;

    #[ORM\ManyToOne(inversedBy: 'projects')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

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
        return $this->projectLead;
    }

    public function setProjectLead(string $projectLead): self
    {
        $this->projectLead = $projectLead;

        return $this;
    }

    public function getTeam(): ?string
    {
        return $this->team;
    }

    public function setTeam(string $team): self
    {
        $this->team = $team;

        return $this;
    }

    public function getProgress(): ?float
    {
        return $this->progress;
    }

    public function setProgress(float $progress): self
    {
        $this->progress = $progress;

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

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

}
