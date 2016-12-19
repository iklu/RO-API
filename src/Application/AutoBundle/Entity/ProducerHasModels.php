<?php

namespace Application\AutoBundle\Entity;

/**
 * ProducerHasModels
 */
class ProducerHasModels
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
    private $models;


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
     * @return ProducerHasModels
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
     * Set models
     *
     * @param integer $models
     *
     * @return ProducerHasModels
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
}

