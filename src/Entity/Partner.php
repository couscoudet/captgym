<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\ApiFilter;
use ApiPlatform\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Doctrine\Orm\Filter\BooleanFilter;
use App\Repository\PartnerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PartnerRepository::class)]
#[ApiResource(
    paginationItemsPerPage: 10
)]
#[ApiFilter(BooleanFilter::class, properties:['active'])]
#[ApiFilter(SearchFilter::class, properties:['name' => 'partial', 'city' => 'partial'])]

class Partner
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $address = null;

    #[ORM\Column(length: 10)]
    private ?string $postalCode = null;

    #[ORM\Column(length: 90)]
    private ?string $city = null;

    #[ORM\Column(length: 90)]
    private ?string $country = null;

    #[ORM\Column(length: 20)]
    private ?string $phone = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $logo_url = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $website_url = null;

    #[ORM\Column]
    private ?bool $active = null;

    #[ORM\Column]
    private array $defaultPerms = [];

    #[ORM\OneToMany(mappedBy: 'partner', targetEntity: SportRoom::class)]
    private Collection $sportRooms;

    #[ORM\OneToMany(mappedBy: 'partner', targetEntity: Contact::class)]
    private Collection $contacts;

    public function __construct()
    {
        $this->sportRooms = new ArrayCollection();
        $this->contacts = new ArrayCollection();
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

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    public function setPostalCode(string $postalCode): self
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getLogoUrl(): ?string
    {
        return $this->logo_url;
    }

    public function setLogoUrl(?string $logo_url): self
    {
        $this->logo_url = $logo_url;

        return $this;
    }

    public function getWebsiteUrl(): ?string
    {
        return $this->website_url;
    }

    public function setWebsiteUrl(?string $website_url): self
    {
        $this->website_url = $website_url;

        return $this;
    }

    public function isActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): self
    {
        $this->active = $active;

        return $this;
    }

    public function getDefaultPerms(): array
    {
        return $this->defaultPerms;
    }

    public function setDefaultPerms(array $defaultPerms): self
    {
        $this->defaultPerms = $defaultPerms;

        return $this;
    }

    /**
     * @return Collection<int, SportRoom>
     */
    public function getSportRooms(): Collection
    {
        return $this->sportRooms;
    }

    public function addSportRoom(SportRoom $sportRoom): self
    {
        if (!$this->sportRooms->contains($sportRoom)) {
            $this->sportRooms->add($sportRoom);
            $sportRoom->setPartner($this);
        }

        return $this;
    }

    public function removeSportRoom(SportRoom $sportRoom): self
    {
        if ($this->sportRooms->removeElement($sportRoom)) {
            // set the owning side to null (unless already changed)
            if ($sportRoom->getPartner() === $this) {
                $sportRoom->setPartner(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Contact>
     */
    public function getContacts(): Collection
    {
        return $this->contacts;
    }

    public function addContact(Contact $contact): self
    {
        if (!$this->contacts->contains($contact)) {
            $this->contacts->add($contact);
            $contact->setPartner($this);
        }

        return $this;
    }

    public function removeContact(Contact $contact): self
    {
        if ($this->contacts->removeElement($contact)) {
            // set the owning side to null (unless already changed)
            if ($contact->getPartner() === $this) {
                $contact->setPartner(null);
            }
        }

        return $this;
    }
}
