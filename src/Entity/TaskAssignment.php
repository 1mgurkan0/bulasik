<?php

namespace App\Entity;

use App\Repository\TaskAssignmentRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TaskAssignmentRepository::class)]
class TaskAssignment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $assignedDate = null;

    #[ORM\Column]
    private ?\DateTime $createdA = null;

    #[ORM\Column(length: 1024, nullable: true)]
    private ?string $note = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?TaskType $taskType = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAssignedDate(): ?\DateTime
    {
        return $this->assignedDate;
    }

    public function setAssignedDate(\DateTime $assignedDate): static
    {
        $this->assignedDate = $assignedDate;

        return $this;
    }

    public function getCreatedA(): ?\DateTime
    {
        return $this->createdA;
    }

    public function setCreatedA(\DateTime $createdA): static
    {
        $this->createdA = $createdA;

        return $this;
    }

    public function getNote(): ?string
    {
        return $this->note;
    }

    public function setNote(?string $note): static
    {
        $this->note = $note;

        return $this;
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

    public function getTaskType(): ?TaskType
    {
        return $this->taskType;
    }

    public function setTaskType(?TaskType $taskType): static
    {
        $this->taskType = $taskType;

        return $this;
    }
}
