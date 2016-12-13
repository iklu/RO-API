<?php

namespace Application\AdminBundle\Entity;

/**
 * Roles
 */
class Roles
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $role;

    public function __construct( $role )
    {
        $this->role = $role;
    }

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
     * Set role
     *
     * @param string $role
     *
     * @return Roles
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }
}

