<?php declare(strict_types=1);
/**
 * Created by Patricio A. Di Muzio.
 * Date: 05/05/19
 * Time: 00:43
 */

namespace App\Security\User\Infrastructure;


use App\Security\User\Infrastructure\Persistence\UserRepository;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

class UserProvider implements UserProviderInterface
{
    
    /**
     * @var \App\Security\User\Infrastructure\Persistence\UserRepository
     */
    private $userRepository;
    
    public function __construct(UserRepository $userRepository)
    {
        
        $this->userRepository = $userRepository;
    }
    
    /**
     * Loads the user for the given username.
     *
     * This method must throw UsernameNotFoundException if the user is not
     * found.
     *
     * @param string $username The username
     *
     * @return UserInterface
     *
     * @throws UsernameNotFoundException if the user is not found
     */
    public function loadUserByUsername($username)
    {
        return $this->findUser($username);
    }
    
    /**
     * Refreshes the user.
     *
     * It is up to the implementation to decide if the user data should be
     * totally reloaded (e.g. from the database), or if the UserInterface
     * object can just be merged into some internal array of users / identity
     * map.
     *
     * @param \Symfony\Component\Security\Core\User\UserInterface $user
     *
     * @return \Symfony\Component\Security\Core\User\UserInterface
     */
    public function refreshUser(UserInterface $user): UserInterface
    {
        if (!$user instanceof $user) {
            throw new UnsupportedUserException(
                sprintf('Instances of [%s] are not supported', get_class($user))
            );
        }
        
        return $this->findUser($user->getUsername());
    }
    
    /**
     * Whether this provider supports the given user class.
     *
     * @param string $class
     *
     * @return bool
     */
    public function supportsClass($class)
    {
        // TODO: Implement supportsClass() method.
    }
    
    protected function findUser($username)
    {
        return $this->userRepository->findOneByUsername($username);
    }
}