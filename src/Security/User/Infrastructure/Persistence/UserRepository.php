<?php declare(strict_types=1);
/**
 * Created by Patricio A. Di Muzio.
 * Date: 05/05/19
 * Time: 00:35
 */

namespace App\Security\User\Infrastructure\Persistence;


use App\Security\User\Domain\VOs\Email;
use App\Security\User\Infrastructure\Entity\User;
use App\Shared\Infrastructure\Persistence\BaseRepository;

class UserRepository extends BaseRepository
{
    
    protected static function entityClass(): string
    {
        return User::class;
    }
    
    /**
     * @param $email
     *
     * @return User|null
     */
    public function findOneByEmail($email): ?User
    {
        /*** @var User $user | null */
        $user = $this->objectRepository->findOneBy(['email' => $email]);
        
        return $user;
    }
    
    /**
     * @param $username
     *
     * @return User|null
     */
    public function findOneByUsername($username): ?User
    {
        /*** @var User $user | null */
        $user = $this->objectRepository->findOneBy(['username' => $username]);
        
        return $user;
    }
    
    public function save(User $user): void
    {
        $this->saveEntity($user);
    }
    
    public function remove(User $user)
    {
        $this->removeEntity($user);
    }
}