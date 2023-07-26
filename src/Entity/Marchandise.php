<?php

namespace App\Entity;

use App\Repository\MarchandiseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: MarchandiseRepository::class)]
class Marchandise
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['selected'])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['selected'])]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'marchandise', targetEntity: Article::class, orphanRemoval: true)]
    private Collection $articles;

    public function __toString(): string
    {
        return $this->name;
    }

    public function __construct()
    {
        $this->articles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, Article>
     */
    public function getArticles(): Collection
    {
        return $this->articles;
    }

    public function addArticle(Article $article): static
    {
        if (!$this->articles->contains($article)) {
            $this->articles->add($article);
            $article->setMarchandise($this);
        }

        return $this;
    }

    public function removeArticle(Article $article): static
    {
        if ($this->articles->removeElement($article)) {
            // set the owning side to null (unless already changed)
            if ($article->getMarchandise() === $this) {
                $article->setMarchandise(null);
            }
        }

        return $this;
    }
}
