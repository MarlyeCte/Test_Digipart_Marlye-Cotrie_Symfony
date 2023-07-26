<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: ArticleRepository::class)]
class Article
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['selected'])]
    private ?int $idProduct = null;

    #[ORM\Column(length: 255)]
    #[Groups(['selected'])]
    private ?string $reference = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Groups(['selected'])]
    private ?string $description = null;

    #[ORM\Column]
    #[Groups(['selected'])]
    private ?int $priceTaxIncl = null;

    #[ORM\Column]
    #[Groups(['selected'])]
    private ?int $priceTaxExcl = null;

    #[ORM\Column]
    #[Groups(['selected'])]
    private ?int $quantity = null;

    #[ORM\ManyToOne(inversedBy: 'articles')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['selected'])]
    private ?Marchandise $marchandise = null;

    public function getIdProduct(): ?int
    {
        return $this->idProduct;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): static
    {
        $this->reference = $reference;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getPriceTaxIncl(): ?int
    {
        return $this->priceTaxIncl;
    }

    public function setPriceTaxIncl(int $priceTaxIncl): static
    {
        $this->priceTaxIncl = $priceTaxIncl;

        return $this;
    }

    public function getPriceTaxExcl(): ?int
    {
        return $this->priceTaxExcl;
    }

    public function setPriceTaxExcl(int $priceTaxExcl): static
    {
        $this->priceTaxExcl = $priceTaxExcl;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): static
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getMarchandise(): ?Marchandise
    {
        return $this->marchandise;
    }

    public function setMarchandise(?Marchandise $marchandise): static
    {
        $this->marchandise = $marchandise;

        return $this;
    }

}
