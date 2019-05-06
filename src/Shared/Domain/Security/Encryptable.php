<?php declare(strict_types=1);
/**
 * Created by Patricio A. Di Muzio.
 * Date: 06/05/19
 * Time: 00:03
 */

namespace App\Shared\Domain\Security;


use App\Shared\Domain\VOs\Contract\StringValueObject;

interface Encryptable
{
    
    public function crypt(string $string): string;
    
    public function isValid(StringValueObject $string): bool;
    
}
