<?php

namespace App\Entity;

use App\Repository\ProjectsRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ProjectsRepository::class)]
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

    #[ORM\Column]
    #[Assert\NotNull()]
    private ?int $Progress = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotNull()]
    private ?string $Deadline = null;

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

    public function getProgress(): ?int
    {
        return $this->Progress;
    }

    public function setProgress(int $Progress): self
    {
        $this->Progress = $Progress;

        return $this;
    }

    public function getDeadline(): ?string
    {
        return $this->Deadline;
    }

    public function setDeadline(string $Deadline): self
    {
        $this->Deadline = $Deadline;

        return $this;
    }
    
}
