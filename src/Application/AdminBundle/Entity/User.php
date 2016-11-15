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
 *          "normalization_context"={"groups"={"user", "user-read", "user-write"}},
 *          "denormalization_context"={"groups"={"user", "user-write", "user-read"}}
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
     * @Groups({"user"})
     */
    protected $email;

    /**
     * @Groups({"user"})
     */
    protected $fullname;

    /**
     * @Groups({"user"})
     */
    protected $plainPassword;

    /**
     * @Groups({"user"})
     */
    protected $username;

    /**
     * @Groups({"user"})
     */
    protected $usernameCanonical;

    /**
     * @Groups({"user"})
     */
    protected $emailCanonical;

    /**
     * @Groups({"user"})
     */
    protected $enabled;

    /**
     * @Groups({"user"})
     */
    protected $salt;

    /**
     * @Groups({"user"})
     */
    protected $password;


    /**
     * @Groups({"user"})
     */
    protected $confirmationToken;


    /**
     * @Groups({"user"})
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