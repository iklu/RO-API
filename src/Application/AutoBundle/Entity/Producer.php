<?php

namespace Application\AutoBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\Common\Collections\Collection;

/**
 * @ApiResource(
 *     itemOperations={
 *          "getCarProducer"={"route_name"="get_car_producer"},
 *          "updateCarProducer"={"route_name"="update_car_producer"}
 *      },
 *     collectionOperations = {
 *          "addCarProducer"={"route_name"="add_car_producer"},
 *          "getCarProducers"={"route_name"="get_car_producers"}
 *      },
 *     attributes={
 *          "normalization_context"={"groups"={"producer", "user-read"}},
 *          "denormalization_context"={"groups"={"producer", "user-write"}}
 * }
 *  )
 */
class Producer
{
    /**
     * @var int
     */
    private $id;

    /**
     * @Groups({"producer"})
     * @var string
     */
    private $name;

    /**
     * @Groups({"producer"})
     * @var string
     */
    private $shortDescription;

    /**
     * @Groups({"producer"})
     * @var string
     */
    private $description;

    /**
     * @Groups({"producer"})
     * @var string
     */
    private $photo;

    /**
     * @Groups({"producer"})
     * @var string
     */
    private $slug;

    /**
     * @Groups({"producer"})
     * @var string
     */
    private $metaTitle;

    /**
     * @Groups({"producer"})
     * @var string
     */
    private $metaKeywords;

    /**
     * @Groups({"producer"})
     * @var string
     */
    private $metaDescription;

    /**
     * @Groups({"producer"})
     * @var int
     */
    private $orderIdx;

    /**
     * @Groups({"producer"})
     * @var \DateTime
     */
    private $dateUpdated;

    /**
     * @Groups({"producer"})
     * @var \DateTime
     */
    private $dateCreated;

    /**
     * @Groups({"producer"})
     * @var array
     */
    protected $models;

    /**
     * @Groups({"producer"})
     * @var integer
     */
    protected $autoSubCategories;


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
     * @return Producer
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
     * @return Producer
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
     * @return Producer
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
     * @return Producer
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
     * @return Producer
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
     * @return Producer
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
     * @return Producer
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
     * @return Producer
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
     * @return Producer
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
     * @return Producer
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
     * @return Producer
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
     * Constructor
     */
    public function __construct()
    {
        $this->models = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add model
     *
     * @param \Application\AutoBundle\Entity\Model $model
     *
     * @return Producer
     */
    public function addModel(\Application\AutoBundle\Entity\Model $model)
    {
        $this->models[] = $model;

        return $this;
    }

    /**
     * Remove model
     *
     * @param \Application\AutoBundle\Entity\Model $model
     */
    public function removeModel(\Application\AutoBundle\Entity\Model $model)
    {
        $this->models->removeElement($model);
    }

    /**
     * Get models
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getModels()
    {
        return $this->models;
    }

    /**
     * Add autoSubCategory
     *
     * @param \Application\AutoBundle\Entity\AutoSubCategory $autoSubCategory
     *
     * @return Producer
     */
    public function addAutoSubCategory(\Application\AutoBundle\Entity\AutoSubCategory $autoSubCategory)
    {
        $this->autoSubCategories[] = $autoSubCategory;

        return $this;
    }

    /**
     * Remove autoSubCategory
     *
     * @param \Application\AutoBundle\Entity\AutoSubCategory $autoSubCategory
     */
    public function removeAutoSubCategory(\Application\AutoBundle\Entity\AutoSubCategory $autoSubCategory)
    {
        $this->autoSubCategories->removeElement($autoSubCategory);
    }

    /**
     * Get autoSubCategories
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAutoSubCategories()
    {
        return $this->autoSubCategories;
    }
}
