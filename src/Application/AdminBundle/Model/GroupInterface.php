<?php


namespace Application\AdminBundle\Model;

use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ApiResource(
 *     itemOperations={
 *          "getUser"={"route_name"="get_user"},
 *          "updateUser"={"route_name"="update_user"}
 *      },
 *     collectionOperations = {
 *          "addUser"={"route_name"="add_user"},
 *          "getUsers"={"route_name"="get_users"}
 *      },
 *     attributes={
 *          "normalization_context"={"groups"={"user", "user-read"}},
 *          "denormalization_context"={"groups"={"user", "user-write"}}
 * }
 *  )
 */
interface GroupInterface
{
    /**
     * @param string $role
     *
     * @return self
     */
    public function addRole($role);

    /**
     * @return int
     */
    public function getId();

    /**
     * @return string
     */
    public function getName();

    /**
     * @param string $role
     *
     * @return bool
     */
    public function hasRole($role);

    /**
     * @return array
     */
    public function getRoles();

    /**
     * @param string $role
     *
     * @return self
     */
    public function removeRole($role);

    /**
     * @param string $name
     *
     * @return self
     */
    public function setName($name);

    /**
     * @param array $roles
     *
     * @return self
     */
    public function setRoles(array $roles);
}
