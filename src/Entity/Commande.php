<?php

namespace App\Entity;

use App\Repository\CommandeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommandeRepository::class)]
class Commande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_cmd = null;

    #[ORM\Column]
    private ?bool $etat = null;

    #[ORM\ManyToMany(targetEntity: Produit::class, inversedBy: 'produitCommande')]
    private Collection $commandeProduit;

    #[ORM\ManyToMany(targetEntity: Detail::class)]
    private Collection $commandeDetail;

    // #[ORM\ManyToOne(inversedBy: 'paiementCommande')]
    // private ?Paiement $commandePaiement = null;

    public function __construct()
    {
        $this->commandeProduit = new ArrayCollection();
        $this->commandeDetail = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateCmd(): ?\DateTimeInterface
    {
        return $this->date_cmd;
    }

    public function setDateCmd(\DateTimeInterface $date_cmd): self
    {
        $this->date_cmd = $date_cmd;

        return $this;
    }

    public function isEtat(): ?bool
    {
        return $this->etat;
    }

    public function setEtat(bool $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * @return Collection<int, Produit>
     */
    public function getCommandeProduit(): Collection
    {
        return $this->commandeProduit;
    }

    public function addCommandeProduit(Produit $commandeProduit): self
    {
        if (!$this->commandeProduit->contains($commandeProduit)) {
            $this->commandeProduit->add($commandeProduit);
        }

        return $this;
    }

    public function removeCommandeProduit(Produit $commandeProduit): self
    {
        $this->commandeProduit->removeElement($commandeProduit);

        return $this;
    }

    /**
     * @return Collection<int, Detail>
     */
    public function getCommandeDetail(): Collection
    {
        return $this->commandeDetail;
    }

    public function addCommandeDetail(Detail $commandeDetail): self
    {
        if (!$this->commandeDetail->contains($commandeDetail)) {
            $this->commandeDetail->add($commandeDetail);
        }

        return $this;
    }

    public function removeCommandeDetail(Detail $commandeDetail): self
    {
        $this->commandeDetail->removeElement($commandeDetail);

        return $this;
    }

    // public function getCommandePaiement(): ?Paiement
    // {
    //     return $this->commandePaiement;
    // }

    // public function setCommandePaiement(?Paiement $commandePaiement): self
    // {
    //     $this->commandePaiement = $commandePaiement;

    //     return $this;
    // }
}
