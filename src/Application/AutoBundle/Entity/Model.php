<?php

namespace Application\AutoBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\Common\Collections\Collection;

/**
 * @ApiResource(
 *     itemOperations={
 *          "getModel"={"route_name"="get_model"},
 *          "updateModel"={"route_name"="update_model"}
 *      },
 *     collectionOperations = {
 *          "addModel"={"route_name"="add_model"},
 *          "getModels"={"route_name"="get_models"}
 *      },
 *     attributes={
 *          "normalization_context"={"groups"={"model", "user-read"}},
 *          "denormalization_context"={"groups"={"model", "user-write"}}
 * }
 *  )
 */
class Model
{
    /**
     * @var int
     */
    private $id;

    /**
     * @Groups({"model"})
     * @var string
     */
    private $name;

    /**
     * @Groups({"model"})
     * @var string
     */
    private $shortDescription;

    /**
     * @Groups({"model"})
     * @var string
     */
    private $description;

    /**
     * @Groups({"model"})
     * @var string
     */
    private $photo;

    /**
     * @Groups({"model"})
     * @var string
     */
    private $slug;

    /**
     * @Groups({"model"})
     * @var string
     */
    private $metaTitle;

    /**
     * @Groups({"model"})
     * @var string
     */
    private $metaKeywords;

    /**
     * @Groups({"model"})
     * @var string
     */
    private $metaDescription;

    /**
     * @Groups({"model"})
     * @var int
     */
    private $orderIdx;

    /**
     * @Groups({"model"})
     * @var \DateTime
     */
    private $dateUpdated;

    /**
     * @Groups({"model"})
     * @var \DateTime
     */
    private $dateCreated;

    /**
     * @Groups({"model"})
     * @var array
     */
    protected $cars;

    /**
     * Model constructor.
     *
     */
    public function __construct()
    {
        $this->cars = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Model
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set shortDescription
     *
     * @param string $shortDescription
     *
     * @return Model
     */
    public function setShortDescription($shortDescription)
    {
        $this->shortDescription = $shortDescription;

        return $this;
    }

    /**
     * Get shortDescription
     *
     * @return string
     */
    public function getShortDescription()
    {
        return $this->shortDescription;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Model
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set photo
     *
     * @param string $photo
     *
     * @return Model
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo
     *
     * @return string
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return Model
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set metaTitle
     *
     * @param string $metaTitle
     *
     * @return Model
     */
    public function setMetaTitle($metaTitle)
    {
        $this->metaTitle = $metaTitle;

        return $this;
    }

    /**
     * Get metaTitle
     *
     * @return string
     */
    public function getMetaTitle()
    {
        return $this->metaTitle;
    }

    /**
     * Set metaKeywords
     *
     * @param string $metaKeywords
     *
     * @return Model
     */
    public function setMetaKeywords($metaKeywords)
    {
        $this->metaKeywords = $metaKeywords;

        return $this;
    }

    /**
     * Get metaKeywords
     *
     * @return string
     */
    public function getMetaKeywords()
    {
        return $this->metaKeywords;
    }

    /**
     * Set metaDescription
     *
     * @param string $metaDescription
     *
     * @return Model
     */
    public function setMetaDescription($metaDescription)
    {
        $this->metaDescription = $metaDescription;

        return $this;
    }

    /**
     * Get metaDescription
     *
     * @return string
     */
    public function getMetaDescription()
    {
        return $this->metaDescription;
    }

    /**
     * Set orderIdx
     *
     * @param integer $orderIdx
     *
     * @return Model
     */
    public function setOrderIdx($orderIdx)
    {
        $this->orderIdx = $orderIdx;

        return $this;
    }

    /**
     * Get orderIdx
     *
     * @return int
     */
    public function getOrderIdx()
    {
        return $this->orderIdx;
    }

    /**
     * Set dateUpdated
     *
     * @param \DateTime $dateUpdated
     *
     * @return Model
     */
    public function setDateUpdated($dateUpdated)
    {
        $this->dateUpdated = $dateUpdated;

        return $this;
    }

    /**
     * Get dateUpdated
     *
     * @return \DateTime
     */
    public function getDateUpdated()
    {
        return $this->dateUpdated;
    }

    /**
     * Set dateCreated
     *
     * @param \DateTime $dateCreated
     *
     * @return Model
     */
    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;

        return $this;
    }

    /**
     * Get dateCreated
     *
     * @return \DateTime
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    /**
     * {@inheritdoc}
     */
    public function getCars()
    {
        return $this->cars;
    }


    /**
     * Set cars
     *
     * @param \Application\AutoBundle\Entity\Car $cars
     *
     * @return Model
     */
    public function setCars(\Application\AutoBundle\Entity\Car $cars = null)
    {
        $this->cars = $cars;

        return $this;
    }
}
