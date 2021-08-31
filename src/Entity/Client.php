<?php

namespace App\Entity;

use DateTimeImmutable;
use App\Entity\Project;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\ClientRepository;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\HttpFoundation\File\File;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints\Image;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass=ClientRepository::class)
 * @Vich\Uploadable
 */
class Client
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $type;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $comment;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $logo = null;

    /**
    * @Vich\UploadableField(mapping="image_uploads", fileNameProperty="logo")
    * @var File|null
    * @Assert\Image(
    *     maxSize = "2M",
    *     minWidth = 200,
    *     mimeTypes = {
    *              "image/jpg", "image/jpg",
    *              "image/jpeg", "image/jpeg",
    *              "image/png", "image/webp"},
    * )
    */
    private $logoFile;

    /**
     * @ORM\OneToMany(targetEntity=Project::class, mappedBy="client")
     */
    private $projects;

    /**
     * @ORM\Column(type="datetime_immutable", nullable=true)
     */
    private $updatedAt;

    public function __construct()
    {
        $this->projects = new ArrayCollection();
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

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(?string $logo): self
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * @return Collection|Project[]
     */
    public function getProjects(): Collection
    {
        return $this->projects;
    }

    public function addProject(Project $project): self
    {
        if (!$this->projects->contains($project)) {
            $this->projects[] = $project;
            $project->setClient($this);
        }

        return $this;
    }

    public function removeProject(Project $project): self
    {
        if ($this->projects->removeElement($project)) {
            // set the owning side to null (unless already changed)
            if ($project->getClient() === $this) {
                $project->setClient(null);
            }
        }

        return $this;
    }

    /**
     * Get the value of logoFile
     */ 
    public function getLogoFile(): ?File
    {
        return $this->logoFile;
    }

    /**
     * Set the value of logoFile
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $imageFile
     * @return  self
     */ 
    public function setLogoFile(?File $image = null): Client
    {
        $this->logoFile = $image;
        if ($image) {
            $this->updatedAt = new DateTimeImmutable();
        }

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAtt(?\DateTimeImmutable $updatedAt): self
    {
        $this->updatedAtt = $updatedAt;

        return $this;
    }
}
