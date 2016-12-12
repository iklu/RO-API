<?php

namespace Application\AutoBundle\Entity;

/**
 * CarHasProducer
 */
class CarHasProducer
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $producers;

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
     * Set producers
     *
     * @param integer $producers
     *
     * @return CarHasProducer
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

    /**
     * Set cars
     *
     * @param integer $cars
     *
     * @return CarHasProducer
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

