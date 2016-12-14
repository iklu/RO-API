<?php

namespace Application\AutoBundle\Entity;

/**
 * CarModelHasCar
 */
class CarModelHasCar
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $models;

    /**
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
     * @return CarModelHasCar
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
     * @return CarModelHasCar
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

