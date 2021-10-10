<?php

namespace App\Entity;

use App\Repository\BookRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BookRepository::class)
 */
class Book
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $title;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nbrPages;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $editionDate;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbrCopies;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $price;

    /**
     * @ORM\Column(type="integer")
     */
    private $isbn;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="books")
     */
    private $category;

    /**
     * @ORM\OneToMany(targetEntity=Image::class, mappedBy="book", orphanRemoval=true)
     */
    private $images;

    /**
     * @ORM\OneToMany(targetEntity=Publication::class, mappedBy="book", orphanRemoval=true)
     */
    private $publications;

    /**
     * @ORM\OneToMany(targetEntity=Bookings::class, mappedBy="book", orphanRemoval=true)
     */
    private $bookings;

    /**
     * @ORM\ManyToOne(targetEntity=Editor::class, inversedBy="books")
     * @ORM\JoinColumn(nullable=false)
     */
    private $editor;

    public function __construct()
    {
        $this->images = new ArrayCollection();
        $this->publications = new ArrayCollection();
        $this->bookings = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getNbrPages(): ?int
    {
        return $this->nbrPages;
    }

    public function setNbrPages(?int $nbrPages): self
    {
        $this->nbrPages = $nbrPages;

        return $this;
    }

    public function getEditionDate(): ?\DateTimeInterface
    {
        return $this->editionDate;
    }

    public function setEditionDate(?\DateTimeInterface $editionDate): self
    {
        $this->editionDate = $editionDate;

        return $this;
    }

    public function getNbrCopies(): ?int
    {
        return $this->nbrCopies;
    }

    public function setNbrCopies(int $nbrCopies): self
    {
        $this->nbrCopies = $nbrCopies;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(?int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getIsbn(): ?int
    {
        return $this->isbn;
    }

    public function setIsbn(int $isbn): self
    {
        $this->isbn = $isbn;

        return $this;
    }


    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return Collection|Image[]
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(Image $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images[] = $image;
            $image->setBook($this);
        }

        return $this;
    }

    public function removeImage(Image $image): self
    {
        if ($this->images->removeElement($image)) {
            // set the owning side to null (unless already changed)
            if ($image->getBook() === $this) {
                $image->setBook(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Publication[]
     */
    public function getPublications(): Collection
    {
        return $this->publications;
    }

    public function addPublication(Publication $publication): self
    {
        if (!$this->publications->contains($publication)) {
            $this->publications[] = $publication;
            $publication->setBook($this);
        }

        return $this;
    }

    public function removePublication(Publication $publication): self
    {
        if ($this->publications->removeElement($publication)) {
            // set the owning side to null (unless already changed)
            if ($publication->getBook() === $this) {
                $publication->setBook(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Bookings[]
     */
    public function getBookings(): Collection
    {
        return $this->bookings;
    }

    public function addBooking(Bookings $booking): self
    {
        if (!$this->bookings->contains($booking)) {
            $this->bookings[] = $booking;
            $booking->setBook($this);
        }

        return $this;
    }

    public function removeBooking(Bookings $booking): self
    {
        if ($this->bookings->removeElement($booking)) {
            // set the owning side to null (unless already changed)
            if ($booking->getBook() === $this) {
                $booking->setBook(null);
            }
        }

        return $this;
    }

    public function getEditor(): ?Editor
    {
        return $this->editor;
    }

    public function setEditor(?Editor $editor): self
    {
        $this->editor = $editor;

        return $this;
    }
}
