<?php

namespace App\Entity;

use App\Repository\CommentsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CommentsRepository::class)
 */
class Comments
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity=Videos::class, inversedBy="comments")
     */
    private $author;

    /**
     * @ORM\ManyToOne(targetEntity=Videos::class, inversedBy="comments")
     * @ORM\JoinColumn(nullable=false)
     */
    private $video;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

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

    public function getAuthor(): ?Videos
    {
        return $this->author;
    }

    public function setAuthor(?Videos $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getVideo(): ?Videos
    {
        return $this->video;
    }

    public function setVideo(?Videos $video): self
    {
        $this->video = $video;

        return $this;
    }
}
