<?php declare(strict_types=1);
/**
 * Created by Patricio A. Di Muzio.
 * Date: 04/05/19
 * Time: 19:52
 */

namespace App\Security\User\Domain;


use App\Security\User\Domain\VOs\Email;
use App\Security\User\Domain\VOs\UserName;
use App\Security\User\Domain\VOs\Password;
use App\Shared\Domain\VOs\Uuid;

final class User
{
    
    /*** @var \App\Security\User\Domain\VOs\UserName */
    private $name;
    
    /*** @var \App\Security\User\Domain\VOs\Password */
    private $password;
    
    /*** @var \App\Shared\Domain\VOs\Uuid */
    private $uuid;
    
    /*** @var \App\Security\User\Domain\VOs\Email */
    private $email;
    
    public function __construct(UserName $name, Password $password, Uuid $uuid, Email $email)
    {
        $this->name = $name;
        $this->password = $password;
        $this->uuid = $uuid;
        $this->email = $email;
    }
    
    /**
     * @return \App\Security\User\Domain\VOs\UserName
     */
    public function getName(): UserName
    {
        return $this->name;
    }
    
    /**
     * @return \App\Security\User\Domain\VOs\Password
     */
    public function getPassword(): Password
    {
        return $this->password;
    }
    
    /**
     * @return \App\Shared\Domain\VOs\Uuid
     */
    public function getUuid(): Uuid
    {
        return $this->uuid;
    }
    
    /**
     * @return \App\Security\User\Domain\VOs\Email
     */
    public function getEmail(): Email
    {
        return $this->email;
    }
}