<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AchievementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: AchievementRepository::class)]
#[ApiResource(
    itemOperations: [
        'put',
        'delete',
        'get'=>[
            'normaization_context'=>['groups'=>['read:Achievements', 'read:Achievement']]
        ],
        'patch'
    ],
    normalizationContext: ['groups'=> ['read:Achievements']]
)]
class Achievement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups(['read:Achievements', 'read:Achievement'])]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(['read:Achievements', 'read:Achievement'])]
    private $title;

    #[ORM\Column(type: 'text', nullable: true)]
    #[Groups(['read:Achievements', 'read:Achievement'])]
    private $description;

    #[ORM\Column(type: 'text', nullable: true)]
    #[Groups(['read:Achievements', 'read:Achievement'])]
    private $shortDesc;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(['read:Achievements', 'read:Achievement'])]
    private $link;

    #[ORM\Column(type: 'array', nullable: true)]
    private $tags = [];


    #[ORM\ManyToMany(targetEntity: MediaObject::class, fetch: 'EAGER')]
    #[Groups(['read:Achievements', 'read:Achievement'])]
    private $previewImages;

    #[ORM\ManyToOne(targetEntity: MediaObject::class, fetch: 'EAGER')]
    #[Groups(['read:Achievements', 'read:Achievement'])]
    private $heroImage;

    #[ORM\ManyToOne(targetEntity: MediaObject::class, fetch: 'EAGER')]
    #[Groups(['read:Achievements', 'read:Achievement'])]
    private $portfolioImage;

    public function __construct()
    {
        $this->previewImages = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getShortDesc(): ?string
    {
        return $this->shortDesc;
    }

    public function setShortDesc(?string $shortDesc): self
    {
        $this->shortDesc = $shortDesc;

        return $this;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(?string $link): self
    {
        $this->link = $link;

        return $this;
    }

    public function getTags(): ?array
    {
        return $this->tags;
    }

    public function setTags(?array $tags): self
    {
        $this->tags = $tags;

        return $this;
    }


    /**
     * @return Collection|MediaObject[]
     */
    public function getPreviewImages(): Collection
    {
        return $this->previewImages;
    }

    public function addPreviewImage(MediaObject $previewImage): self
    {
        if (!$this->previewImages->contains($previewImage)) {
            $this->previewImages[] = $previewImage;
        }

        return $this;
    }

    public function removePreviewImage(MediaObject $previewImage): self
    {
        $this->previewImages->removeElement($previewImage);

        return $this;
    }

    public function getHeroImage(): ?MediaObject
    {
        return $this->heroImage;
    }

    public function setHeroImage(?MediaObject $heroImage): self
    {
        $this->heroImage = $heroImage;

        return $this;
    }

    public function getPortfolioImage(): ?MediaObject
    {
        return $this->portfolioImage;
    }

    public function setPortfolioImage(?MediaObject $portfolioImage): self
    {
        $this->portfolioImage = $portfolioImage;

        return $this;
    }
}
