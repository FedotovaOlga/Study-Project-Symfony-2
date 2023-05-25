<?php

namespace App\Entity;

use App\Repository\PaiementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PaiementRepository::class)]
class Paiement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $montant = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(length: 255)]
    private ?string $etat = null;

    #[ORM\OneToMany(mappedBy: 'commandePaiement', targetEntity: Commande::class)]
    private Collection $paiementCommande;

    public function __construct()
    {
        $this->paiementCommande = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMontant(): ?float
    {
        return $this->montant;
    }

    public function setMontant(float $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * @return Collection<int, Commande>
     */
    public function getPaiementCommande(): Collection
    {
        return $this->paiementCommande;
    }

    public function addPaiementCommande(Commande $paiementCommande): self
    {
        if (!$this->paiementCommande->contains($paiementCommande)) {
            $this->paiementCommande->add($paiementCommande);
            $paiementCommande->setCommandePaiement($this);
        }

        return $this;
    }

    public function removePaiementCommande(Commande $paiementCommande): self
    {
        if ($this->paiementCommande->removeElement($paiementCommande)) {
            // set the owning side to null (unless already changed)
            if ($paiementCommande->getCommandePaiement() === $this) {
                $paiementCommande->setCommandePaiement(null);
            }
        }

        return $this;
    }
}
