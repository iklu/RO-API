<?php

namespace Application\AdminBundle\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\GroupableInterface;
use FOS\UserBundle\Model\User as BaseUser;
use FOS\UserBundle\Model\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity
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
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Groups({"user-write"})
     */
    protected $email;

    /**
     * @Groups({"user-write"})
     */
    protected $fullname;

    /**
     * @Groups({"user-write"})
     */
    protected $plainPassword;

    /**
     * @Groups({"user-write"})
     */
    protected $username;

    /**
     * @Groups({"user-write"})
     */
    protected $usernameCanonical;

    /**
     * @Groups({"user-write"})
     */
    protected $emailCanonical;

    /**
     * @Groups({"user-write"})
     */
    protected $enabled;

    /**
     * @Groups({"user-write"})
     */
    protected $salt;

    /**
     * @Groups({"user-write"})
     */
    protected $password;


    /**
     * @Groups({"user-write"})
     */
    protected $confirmationToken;


    /**
     * @Groups({"user-write"})
     */
    protected $locked;


    public function setFullname($fullname)
    {
        $this->fullname = $fullname;

        return $this;
    }
    public function getFullname()
    {
        return $this->fullname;
    }

    public function isUser(UserInterface $user = null)
    {
        return $user instanceof self && $user->id === $this->id;
    }
}