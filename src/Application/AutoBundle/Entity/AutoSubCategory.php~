<?php

namespace Application\AutoBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\Common\Collections\Collection;

/**
 * @ApiResource(
 *     itemOperations={
 *          "getAutoSubCategory"={"route_name"="get_auto_sub_category"},
 *          "updateAutoSubCategory"={"route_name"="update_auto_sub_category"}
 *      },
 *     collectionOperations = {
 *          "addAutoSubCategory"={"route_name"="add_auto_sub_category"},
 *          "getAutoSubCategories"={"route_name"="get_auto_sub_categories"}
 *      },
 *     attributes={
 *          "normalization_context"={"groups"={"subcategory", "user-read"}},
 *          "denormalization_context"={"groups"={"subcategory", "user-write"}}
 * }
 *  )
 */
class AutoSubCategory
{
    /**
     * @var int
     */
    private $id;

    /**
     * @Groups({"subcategory"})
     * @var string
     */
    private $name;

    /**
     * @Groups({"subcategory"})
     * @var string
     */
    private $shortDescription;

    /**
     * @Groups({"subcategory"})
     * @var string
     */
    private $description;

    /**
     * @Groups({"subcategory"})
     * @var string
     */
    private $photo;

    /**
     * @Groups({"subcategory"})
     * @var string
     */
    private $slug;

    /**
     * @Groups({"subcategory"})
     * @var string
     */
    private $metaTitle;

    /**
     * @Groups({"subcategory"})
     * @var string
     */
    private $metaKeywords;

    /**
     * @Groups({"subcategory"})
     * @var string
     */
    private $metaDescription;

    /**
     * @Groups({"subcategory"})
     * @var int
     */
    private $orderIdx;

    /**
     * @var \DateTime
     */
    private $dateUpdated;

    /**
     * @var \DateTime
     */
    private $dateCreated;

    /**
     * @Groups({"subcategory"})
     * @var array
     */
    protected $producers;


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
     * @return AutoSubCategory
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
     * @return AutoSubCategory
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
     * @return AutoSubCategory
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
     * @return AutoSubCategory
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
     * @return AutoSubCategory
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
     * @return AutoSubCategory
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
     * @return AutoSubCategory
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
     * @return AutoSubCategory
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
     * @return AutoSubCategory
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
     * @return AutoSubCategory
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
     * @return AutoSubCategory
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
        $this->producers = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add producer
     *
     * @param \Application\AutoBundle\Entity\Producer $producer
     *
     * @return AutoSubCategory
     */
    public function addProducer(\Application\AutoBundle\Entity\Producer $producer)
    {
        $this->producers[] = $producer;

        return $this;
    }

    /**
     * Remove producer
     *
     * @param \Application\AutoBundle\Entity\Producer $producer
     */
    public function removeProducer(\Application\AutoBundle\Entity\Producer $producer)
    {
        $this->producers->removeElement($producer);
    }

    /**
     * Get producers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProducers()
    {
        return $this->producers;
    }
}
