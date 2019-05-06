<?php declare(strict_types=1);
/**
 * Created by Patricio A. Di Muzio.
 * Date: 06/05/19
 * Time: 00:17
 */

namespace App\Shared\Infrastructure;


use App\Security\User\Domain\VOs\Password;
use App\Shared\Domain\Security\EncryptationMethod;
use App\Shared\Domain\VOs\Contract\StringValueObject;

class PasswordEncryptor implements EncryptationMethod
{
    
    public function encrypt(string $string)
    {
        return password_hash($string, PASSWORD_BCRYPT);
    }
    
    public function verify(Password $password, StringValueObject $string): bool
    {
        return password_verify($string->getPrimitive(), $password->getPrimitive());
    }
    
}