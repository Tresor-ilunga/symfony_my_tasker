<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\PriorityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Priority
 *
 * @author tresor-ilunga <ilungat82@gmail.com>
 */
#[ORM\Entity(repositoryClass: PriorityRepository::class)]
class Priority
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank()]
    private ?string $name = null;

    #[ORM\Column]
    #[Assert\NotBlank()]
    private ?int $value = null;

    #[ORM\OneToMany(mappedBy: 'priorities', targetEntity: Task::class)]
    private Collection $priorities;

    public function __construct()
    {
        $this->priorities = new ArrayCollection();
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

    public function getValue(): ?int
    {
        return $this->value;
    }

    public function setValue(int $value): self
    {
        $this->value = $value;

        return $this;
    }

    public function __toString(): string
    {
        return $this->name;
    }

    /**
     * @return Collection<int, Task>
     */
    public function getPriorities(): Collection
    {
        return $this->priorities;
    }

    public function addPriority(Task $priority): self
    {
        if (!$this->priorities->contains($priority)) {
            $this->priorities->add($priority);
            $priority->setPriorities($this);
        }

        return $this;
    }

    public function removePriority(Task $priority): self
    {
        if ($this->priorities->removeElement($priority)) {
            // set the owning side to null (unless already changed)
            if ($priority->getPriorities() === $this) {
                $priority->setPriorities(null);
            }
        }

        return $this;
    }
}
