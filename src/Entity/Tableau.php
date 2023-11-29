<?php

namespace App\Entity;

use App\Repository\TableauRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TableauRepository::class)]
class Tableau
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titreTab = null;

    #[ORM\OneToMany(mappedBy: 'tableau', targetEntity: projet::class)]
    private Collection $projectName;

    #[ORM\Column(length: 255)]
    private ?string $visibility = null;

    public function __construct()
    {
        $this->projet = new ArrayCollection();
        $this->projectName = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, projet>
     */
    public function getProjet(): Collection
    {
        return $this->projet;
    }

    public function addProjet(projet $projet): static
    {
        if (!$this->projet->contains($projet)) {
            $this->projet->add($projet);
            $projet->setTableau($this);
        }

        return $this;
    }

    public function removeProjet(projet $projet): static
    {
        if ($this->projet->removeElement($projet)) {
            // set the owning side to null (unless already changed)
            if ($projet->getTableau() === $this) {
                $projet->setTableau(null);
            }
        }

        return $this;
    }

    public function getTitreTab(): ?string
    {
        return $this->titreTab;
    }

    public function setTitreTab(string $titreTab): static
    {
        $this->titreTab = $titreTab;

        return $this;
    }

    /**
     * @return Collection<int, projet>
     */
    public function getProjectName(): Collection
    {
        return $this->projectName;
    }

    public function addProjectName(projet $projectName): static
    {
        if (!$this->projectName->contains($projectName)) {
            $this->projectName->add($projectName);
            $projectName->setTableau($this);
        }

        return $this;
    }

    public function removeProjectName(projet $projectName): static
    {
        if ($this->projectName->removeElement($projectName)) {
            // set the owning side to null (unless already changed)
            if ($projectName->getTableau() === $this) {
                $projectName->setTableau(null);
            }
        }

        return $this;
    }

    public function getVisibility(): ?string
    {
        return $this->visibility;
    }

    public function setVisibility(string $visibility): static
    {
        $this->visibility = $visibility;

        return $this;
    }
}
