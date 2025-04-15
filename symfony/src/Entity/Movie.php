<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: 'App\Repository\MovieRepository')]
#[ORM\Table(name: 'movie')]
class Movie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 255)]
    private string $name;

    #[ORM\Column(type: 'text')]
    private string $plot;

    #[ORM\Column(type: 'string', length: 255)]
    private string $genre;

    #[ORM\Column(type: 'string', length: 255)]
    private string $director;

    #[ORM\Column(type: 'string', length: 50)]
    private string $duration;

    #[ORM\Column(type: 'string', length: 10)]
    private string $rating;

    #[ORM\Column(type: 'string', length: 255)]
    private string $poster;

    public function getId(): ?int { return $this->id; }

    public function getName(): ?string { return $this->name; }
    public function setName(string $name): self { $this->name = $name; return $this; }

    public function getPlot(): ?string { return $this->plot; }
    public function setPlot(string $plot): self { $this->plot = $plot; return $this; }

    public function getGenre(): ?string { return $this->genre; }
    public function setGenre(string $genre): self { $this->genre = $genre; return $this; }

    public function getDirector(): ?string { return $this->director; }
    public function setDirector(string $director): self { $this->director = $director; return $this; }

    public function getDuration(): ?string { return $this->duration; }
    public function setDuration(string $duration): self { $this->duration = $duration; return $this; }

    public function getRating(): ?string { return $this->rating; }
    public function setRating(string $rating): self { $this->rating = $rating; return $this; }

    public function getPoster(): ?string { return $this->poster; }
    public function setPoster(string $poster): self { $this->poster = $poster; return $this; }
}
