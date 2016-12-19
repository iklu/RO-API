<?php

namespace Application\AutoBundle\Entity;

/**
 * CategoryHasAutoSubcategory
 */
class CategoryHasAutoSubcategory
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $categories;

    /**
     * @var int
     */
    private $subcategories;


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
     * Set categories
     *
     * @param integer $categories
     *
     * @return CategoryHasAutoSubcategory
     */
    public function setCategories($categories)
    {
        $this->categories = $categories;

        return $this;
    }

    /**
     * Get categories
     *
     * @return int
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * Set subcategories
     *
     * @param integer $subcategories
     *
     * @return CategoryHasAutoSubcategory
     */
    public function setSubcategories($subcategories)
    {
        $this->subcategories = $subcategories;

        return $this;
    }

    /**
     * Get subcategories
     *
     * @return int
     */
    public function getSubcategories()
    {
        return $this->subcategories;
    }
}

