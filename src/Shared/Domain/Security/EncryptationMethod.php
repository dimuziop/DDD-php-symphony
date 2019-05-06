<?php declare(strict_types=1);
/**
 * Created by Patricio A. Di Muzio.
 * Date: 06/05/19
 * Time: 00:07
 */

namespace App\Shared\Domain\Security;


use App\Security\User\Domain\VOs\Password;
use App\Shared\Domain\VOs\Contract\StringValueObject;

interface EncryptationMethod
{
    
    public function encrypt(string $string);
    
    public function verify(Password $password, StringValueObject $string): bool;
    
}