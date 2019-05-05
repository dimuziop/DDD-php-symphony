<?php declare(strict_types=1);
/**
 * Created by Patricio A. Di Muzio.
 * Date: 04/05/19
 * Time: 19:51
 */

namespace App\Security\User\Infrastructure\Entity;


use App\Security\User\Domain\Roles;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;

class User implements UserInterface
{
    
    /**
     * @TODO: Clean this smell, must be a repo
     */
    /**
     * @var \Ramsey\Uuid\UuidInterface
     * @Groups({"user_read", "user_write"})
     */
    protected $id;
    
    /**
     * @var string
     * @Groups({"user_read", "user_write"})
     */
    protected $name;
    
    /*** @var string */
    protected $email;
    
    /*** @var string */
    protected $password;
    
    /**
     * @var array
     * @Groups({"user_read", "user_write"})
     */
    protected $roles;
    
    /*** @var \DateTime */
    protected $createdAt;
    
    /*** @var \DateTime */
    protected $updatedAt;
    
    /*** @var \DateTime */
    protected $deletedAt;
    
    public function __construct(\App\Security\User\Domain\User $user)
    {
        $this->id = $user->getUuid()->getPrimitive();
        $this->name     = $user->getName()->getPrimitive();
        $this->email    = $user->getEmail()->getPrimitive();
        $this->password = password_hash($user->getPassword()->getPrimitive(), PASSWORD_BCRYPT);
        $this->roles    = [Roles::ROLE_USER];
    }
    
    
    /**
     * Returns the roles granted to the user.
     *
     *     public function getRoles()
     *     {
     *         return ['ROLE_USER'];
     *     }
     *
     * Alternatively, the roles might be stored on a ``roles`` property,
     * and populated in any number of different ways when the user object
     * is created.
     *
     * @return (Role|string)[] The user roles
     */
    public function getRoles(): array
    {
        return $this->roles;
    }
    
    /**
     * Returns the password used to authenticate the user.
     *
     * This should be the encoded password. On authentication, a plain-text
     * password will be salted, encoded, and then compared to this value.
     *
     * @return string The password
     */
    public function getPassword()
    {
        // TODO: Implement getPassword() method.
    }
    
    /**
     * Returns the salt that was originally used to encode the password.
     *
     * This can return null if the password was not encoded using a salt.
     *
     * @return string|null The salt
     */
    public function getSalt()
    {
        // TODO: Implement getSalt() method.
    }
    
    /**
     * Returns the username used to authenticate the user.
     *
     * @return string The username
     */
    public function getUsername()
    {
        // TODO: Implement getUsername() method.
    }
    
    /**
     * Removes sensitive data from the user.
     *
     * This is important if, at any given point, sensitive information like
     * the plain-text password is stored on this object.
     */
    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }
    
    public function markAsUpdated()
    {
        $this->updatedAt = new \DateTime();
    }
}