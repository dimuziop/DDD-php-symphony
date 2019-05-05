<?php declare(strict_types=1);
/**
 * Created by Patricio A. Di Muzio.
 * Date: 04/05/19
 * Time: 20:06
 */

namespace App\Security\User\Domain\VOs;


use App\Shared\Domain\VOs\Contract\NullableValueObject;
use App\Shared\Domain\VOs\Contract\StringValueObject;
use App\Shared\Domain\VOs\Contract\ValueObject;

final class Email implements StringValueObject, NullableValueObject
{
    
    /*** @var string */
    private $email;
    
    public function __construct(string $email = null)
    {
        $this->email = $email;
    }
    
    public function getPrimitive(): string
    {
        return (string) $this->email;
    }
    
    public function isNull(): bool
    {
        return is_null($this->email);
    }
    
    public function isSame(ValueObject $object): bool
    {
        // TODO: Implement isSame() method.
    }
}