<?php

namespace Application\AutoBundle\Entity;

/**
 * AutoSubCategoryHasCarProducer
 */
class AutoSubCategoryHasCarProducer
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $subcategory;

    /**
     * @var int
     */
    private $producers;


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
     * Set subcategory
     *
     * @param integer $subcategory
     *
     * @return AutoSubCategoryHasCarProducer
     */
    public function setSubcategory($subcategory)
    {
        $this->subcategory = $subcategory;

        return $this;
    }

    /**
     * Get subcategory
     *
     * @return int
     */
    public function getSubcategory()
    {
        return $this->subcategory;
    }

    /**
     * Set producers
     *
     * @param integer $producers
     *
     * @return AutoSubCategoryHasCarProducer
     */
    public function setProducers($producers)
    {
        $this->producers = $producers;

        return $this;
    }

    /**
     * Get producers
     *
     * @return int
     */
    public function getProducers()
    {
        return $this->producers;
    }
}

