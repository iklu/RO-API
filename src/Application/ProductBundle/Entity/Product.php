<?php

namespace Application\ProductBundle\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     attributes={
 *          "normalization_context"={"groups"={"product", "user-read"}},
 *          "denormalization_context"={"groups"={"product", "user-write"}}
 * }
 *  )
 */
class Product
{
    /**
     * @Groups({"car", "product"})
     * @var int
     */
    protected $id;

    /**
     * @Groups({"car", "product"})
     * @var string
     */
    protected $title;

    /**
     * @Groups({"car", "product"})
     * @var string
     */
    protected $description;

    /**
     * @Groups({"car", "product"})
     * @var float
     */
    protected $price;

    /**
     * @Groups({"car", "product"})
     * @var boolean
     */
    protected $isNegotiable;

    /**
     * @Groups({"car", "product"})
     * @var string
     */
    protected $country;

    /**
     * @Groups({"car", "product"})
     * @var string
     */
    protected $county;

    /**
     * @Groups({"car", "product"})
     * @var string
     */
    protected $village;

    /**
     * @Groups({"car", "product"})
     * @var string
     */
    protected $address1;

    /**
     * @Groups({"car", "product"})
     * @var string
     */
    protected $address2;

    /**
     * @Groups({"car", "product"})
     * @var string
     */
    protected $contactPerson;

    /**
     * @Groups({"car", "product"})
     * @var int
     */
    protected $contactPhone;

    /**
     * @Groups({"car", "product"})
     * @var string
     */
    protected $contactEmail;

    /**
     * @Groups({"car", "product"})
     * @var float
     */
    protected $lng;

    /**
     * @Groups({"car", "product"})
     * @var float
     */
    protected $lat;

    /**
     * @Groups({"car", "product"})
     * @var \DateTime
     */
    protected $addedDate;

    /**
     * @Groups({"car", "product"})
     * @var bool
     */
    protected $isFeatured;

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
     * Set title
     *
     * @param string $title
     *
     * @return Product
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Product
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
     * Set country
     *
     * @param string $country
     *
     * @return Product
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set county
     *
     * @param string $county
     *
     * @return Product
     */
    public function setCounty($county)
    {
        $this->county = $county;

        return $this;
    }

    /**
     * Get county
     *
     * @return string
     */
    public function getCounty()
    {
        return $this->county;
    }

    /**
     * Set village
     *
     * @param string $village
     *
     * @return Product
     */
    public function setVillage($village)
    {
        $this->village = $village;

        return $this;
    }

    /**
     * Get village
     *
     * @return string
     */
    public function getVillage()
    {
        return $this->village;
    }

    /**
     * Set address1
     *
     * @param string $address1
     *
     * @return Product
     */
    public function setAddress1($address1)
    {
        $this->address1 = $address1;

        return $this;
    }

    /**
     * Get address1
     *
     * @return string
     */
    public function getAddress1()
    {
        return $this->address1;
    }

    /**
     * Set address2
     *
     * @param string $address2
     *
     * @return Product
     */
    public function setAddress2($address2)
    {
        $this->address2 = $address2;

        return $this;
    }

    /**
     * Get address2
     *
     * @return string
     */
    public function getAddress2()
    {
        return $this->address2;
    }

    /**
     * Set contactPerson
     *
     * @param string $contactPerson
     *
     * @return Product
     */
    public function setContactPerson($contactPerson)
    {
        $this->contactPerson = $contactPerson;

        return $this;
    }

    /**
     * Get contactPerson
     *
     * @return string
     */
    public function getContactPerson()
    {
        return $this->contactPerson;
    }

    /**
     * Set contactPhone
     *
     * @param integer $contactPhone
     *
     * @return Product
     */
    public function setContactPhone($contactPhone)
    {
        $this->contactPhone = $contactPhone;

        return $this;
    }

    /**
     * Get contactPhone
     *
     * @return int
     */
    public function getContactPhone()
    {
        return $this->contactPhone;
    }

    /**
     * Set contactEmail
     *
     * @param string $contactEmail
     *
     * @return Product
     */
    public function setContactEmail($contactEmail)
    {
        $this->contactEmail = $contactEmail;

        return $this;
    }

    /**
     * Get contactEmail
     *
     * @return string
     */
    public function getContactEmail()
    {
        return $this->contactEmail;
    }

    /**
     * Set lng
     *
     * @param float $lng
     *
     * @return Product
     */
    public function setLng($lng)
    {
        $this->lng = $lng;

        return $this;
    }

    /**
     * Get lng
     *
     * @return float
     */
    public function getLng()
    {
        return $this->lng;
    }

    /**
     * Set lat
     *
     * @param float $lat
     *
     * @return Product
     */
    public function setLat($lat)
    {
        $this->lat = $lat;

        return $this;
    }

    /**
     * Get lat
     *
     * @return float
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * Set addedDate
     *
     * @param \DateTime $addedDate
     *
     * @return Product
     */
    public function setAddedDate($addedDate)
    {
        $this->addedDate = $addedDate;

        return $this;
    }

    /**
     * Get addedDate
     *
     * @return \DateTime
     */
    public function getAddedDate()
    {
        return $this->addedDate;
    }

    /**
     * Set isFeatured
     *
     * @param boolean $isFeatured
     *
     * @return Product
     */
    public function setIsFeatured($isFeatured)
    {
        $this->isFeatured = $isFeatured;

        return $this;
    }

    /**
     * Get isFeatured
     *
     * @return bool
     */
    public function getIsFeatured()
    {
        return $this->isFeatured;
    }

    /**
     * Set isNegotiable
     *
     * @param boolean $isNegotiable
     *
     * @return Product
     */
    public function setIsNegotiable($isNegotiable)
    {
        $this->isNegotiable = $isNegotiable;

        return $this;
    }

    /**
     * Get isNegotiable
     *
     * @return bool
     */
    public function getIsNegotiable()
    {
        return $this->isNegotiable;
    }

    /**
     * Set price
     *
     * @param float $price
     *
     * @return Car
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }
}

