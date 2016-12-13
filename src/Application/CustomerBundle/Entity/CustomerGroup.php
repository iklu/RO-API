<?php



namespace Application\CustomerBundle\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Application\AdminBundle\Model\GroupableInterface;
use Application\AdminBundle\Model\GroupInterface;
use Application\AdminBundle\Model\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;


/**
 * @ApiResource(
 *     itemOperations={
 *          "getGroup"={"route_name"="get_group"},
 *          "updateGroup"={"route_name"="update_group"}
 *      },
 *     collectionOperations = {
 *          "addGroup"={"route_name"="add_group"},
 *          "getGroups"={"route_name"="get_groups"}
 *      },
 *     attributes={
 *          "normalization_context"={"groups"={"group", "user-read"}},
 *          "denormalization_context"={"groups"={"group", "user-write"}}
 * }
 *  )
 */
class CustomerGroup implements GroupInterface
{
    /**
     * @Groups({"group"})
     * @var mixed
     */
    protected $id;

    /**
     * @Groups({"group"})
     * @var string
     */
    protected $name;

    /**
     * @Groups({"group"})
     * @var array
     */
    protected $roles;

    /**
     * @Groups({"group"})
     * @var array
     */
    protected $users;

    /**
     * Group constructor.
     *
     * @param string $name
     * @param array  $roles
     */
    public function __construct($name, $roles = array())
    {
        $this->name = $name;
        $this->roles = $roles;
        $this->users = new ArrayCollection();
    }

    /**
     * {@inheritdoc}
     */
    public function addRole($role)
    {
        if (!$this->hasRole($role)) {
            $this->roles[] = strtoupper($role);
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * {@inheritdoc}
     */
    public function hasRole($role)
    {
        return in_array(strtoupper($role), $this->roles, true);
    }

    /**
     * {@inheritdoc}
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * {@inheritdoc}
     */
    public function removeRole($role)
    {
        if (false !== $key = array_search(strtoupper($role), $this->roles, true)) {
            unset($this->roles[$key]);
            $this->roles = array_values($this->roles);
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function setRoles(array $roles)
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getUsers()
    {
        return $this->users;
    }
}
