<?php

namespace Application\AutoBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\Common\Collections\Collection;


class ModelHasCars
{
    /**
     * @Groups({"model"})
     * @var int
     */
    private $id;

    /**
     * @Groups({"model"})
     * @var int
     */
    private $models;

    /**
     * @Groups({"model"})
     * @var int
     */
    private $cars;


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
     * Set models
     *
     * @param integer $models
     *
     * @return ModelHasCars
     */
    public function setModels($models)
    {
        $this->models = $models;

        return $this;
    }

    /**
     * Get models
     *
     * @return int
     */
    public function getModels()
    {
        return $this->models;
    }

    /**
     * Set cars
     *
     * @param integer $cars
     *
     * @return ModelHasCars
     */
    public function setCars($cars)
    {
        $this->cars = $cars;

        return $this;
    }

    /**
     * Get cars
     *
     * @return int
     */
    public function getCars()
    {
        return $this->cars;
    }
}

