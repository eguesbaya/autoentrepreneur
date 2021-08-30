<?php

namespace App\Entity;

use DateTime;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\ProjectRepository;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints\Currency;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ProjectRepository::class)
 */
class Project
{
    const STATUS = ['pending', 'in progress', 'submitted', 'invoiced', 'completed'];

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    private string $name;

    /**
     * @ORM\Column(type="date")
     * @Assert\Type("\DateTimeInterface")
     */
    private DateTime $endDate;

    /**
     * @ORM\Column(type="float")
     * @Assert\Positive
     */
    private float $ratePerHour;

    /**
     * @ORM\Column(type="date", nullable=true)
     * @Assert\Type("\DateTimeInterface")
     */
    private ?DateTime $startDate;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $projectOwner;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Email(
     *     message = "{{ value }}' is not a valid email."
     * )
     */
    private ?string $email;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $telephone;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Choice(choices=Project::STATUS, message="Choose a valid status.")
     */
    private ?string $status;

    /**
     * @ORM\Column(type="string", length=3, nullable=true)
     * @Assert\Currency
     */
    private ?string $currency;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @Assert\Positive
     * 
     */
    private ?float $hoursEstimated;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private ?float $priceReduction;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private ?float $additionalCost;

    /**
     * @var \DateTime $created
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    private DateTime $createdAt;

    /**
     * @var \DateTime $updated
     *
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime")
     */
    private DateTime $updatedAt;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private ?float $totalHours;

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

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->endDate;
    }

    public function setEndDate(\DateTimeInterface $endDate): self
    {
        $this->endDate = $endDate;

        return $this;
    }

    public function getRatePerHour(): ?float
    {
        return $this->ratePerHour;
    }

    public function setRatePerHour(float $ratePerHour): self
    {
        $this->ratePerHour = $ratePerHour;

        return $this;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->startDate;
    }

    public function setStartDate(?\DateTimeInterface $startDate): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getProjectOwner(): ?string
    {
        return $this->projectOwner;
    }

    public function setProjectOwner(?string $projectOwner): self
    {
        $this->projectOwner = $projectOwner;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getTelephone(): ?int
    {
        return $this->telephone;
    }

    public function setTelephone(?int $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    public function setCurrency(?string $currency): self
    {
        $this->currency = $currency;

        return $this;
    }

    public function getHoursEstimated(): ?float
    {
        return $this->hoursEstimated;
    }

    public function setHoursEstimated(?float $hoursEstimated): self
    {
        $this->hoursEstimated = $hoursEstimated;

        return $this;
    }

    public function getPriceReduction(): ?float
    {
        return $this->priceReduction;
    }

    public function setPriceReduction(?float $priceReduction): self
    {
        $this->priceReduction = $priceReduction;

        return $this;
    }

    public function getAdditionalCost(): ?float
    {
        return $this->additionalCost;
    }

    public function setAdditionalCost(?float $additionalCost): self
    {
        $this->additionalCost = $additionalCost;

        return $this;
    }

    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }

    /**
     * Get $updated
     *
     * @return  \DateTime
     */ 
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set $created
     *
     * @param  \DateTime  $createdAt  $created
     *
     * @return  self
     */ 
    public function setCreatedAt(\DateTime $createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Set $updated
     *
     * @param  \DateTime  $updatedAt  $updated
     *
     * @return  self
     */ 
    public function setUpdatedAt(\DateTime $updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getTotalHours(): ?float
    {
        return $this->totalHours;
    }

    public function setTotalHours(?float $totalHours): self
    {
        $this->totalHours = $totalHours;

        return $this;
    }
}
