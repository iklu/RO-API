<?php

namespace Application\AutoBundle\Entity;
use Application\ProductBundle\Entity\Product;

/**
 * Car
 */
class Car extends Product
{
    /**
     * @var string
     */
    private $fuel;

    /**
     * @var float
     */
    private $mileage;

    /**
     * @var float
     */
    private $engineCapacity;

    /**
     * @var string
     */
    private $vehicleType;

    /**
     * @var string
     */
    private $carCondition;

    /**
     * @var int
     */
    private $seatsNumber;

    /**
     * @var string
     */
    private $transmission;

    /**
     * @var string
     */
    private $exteriorColour;

    /**
     * @var bool
     */
    private $airConditioning;

    /**
     * @var Collection
     */
    private $models;

    /**
     * Set fuel
     *
     * @param string $fuel
     *
     * @return Car
     */
    public function setFuel($fuel)
    {
        $this->fuel = $fuel;

        return $this;
    }

    /**
     * Get fuel
     *
     * @return string
     */
    public function getFuel()
    {
        return $this->fuel;
    }

    /**
     * Set mileage
     *
     * @param float $mileage
     *
     * @return Car
     */
    public function setMileage($mileage)
    {
        $this->mileage = $mileage;

        return $this;
    }

    /**
     * Get mileage
     *
     * @return float
     */
    public function getMileage()
    {
        return $this->mileage;
    }

    /**
     * Set engineCapacity
     *
     * @param float $engineCapacity
     *
     * @return Car
     */
    public function setEngineCapacity($engineCapacity)
    {
        $this->engineCapacity = $engineCapacity;

        return $this;
    }

    /**
     * Get engineCapacity
     *
     * @return float
     */
    public function getEngineCapacity()
    {
        return $this->engineCapacity;
    }

    /**
     * Set vehicleType
     *
     * @param string $vehicleType
     *
     * @return Car
     */
    public function setVehicleType($vehicleType)
    {
        $this->vehicleType = $vehicleType;

        return $this;
    }

    /**
     * Get vehicleType
     *
     * @return string
     */
    public function getVehicleType()
    {
        return $this->vehicleType;
    }

    /**
     * Set carCondition
     *
     * @param string $carCondition
     *
     * @return Car
     */
    public function setCarCondition($carCondition)
    {
        $this->carCondition = $carCondition;

        return $this;
    }

    /**
     * Get carCondition
     *
     * @return string
     */
    public function getCarCondition()
    {
        return $this->carCondition;
    }

    /**
     * Set seatsNumber
     *
     * @param integer $seatsNumber
     *
     * @return Car
     */
    public function setSeatsNumber($seatsNumber)
    {
        $this->seatsNumber = $seatsNumber;

        return $this;
    }

    /**
     * Get seatsNumber
     *
     * @return int
     */
    public function getSeatsNumber()
    {
        return $this->seatsNumber;
    }

    /**
     * Set transmission
     *
     * @param string $transmission
     *
     * @return Car
     */
    public function setTransmission($transmission)
    {
        $this->transmission = $transmission;

        return $this;
    }

    /**
     * Get transmission
     *
     * @return string
     */
    public function getTransmission()
    {
        return $this->transmission;
    }

    /**
     * Set exteriorColour
     *
     * @param string $exteriorColour
     *
     * @return Car
     */
    public function setExteriorColour($exteriorColour)
    {
        $this->exteriorColour = $exteriorColour;

        return $this;
    }

    /**
     * Get exteriorColour
     *
     * @return string
     */
    public function getExteriorColour()
    {
        return $this->exteriorColour;
    }

    /**
     * Set airConditioning
     *
     * @param boolean $airConditioning
     *
     * @return Car
     */
    public function setAirConditioning($airConditioning)
    {
        $this->airConditioning = $airConditioning;

        return $this;
    }

    /**
     * Get airConditioning
     *
     * @return bool
     */
    public function getAirConditioning()
    {
        return $this->airConditioning;
    }
}

