<?php declare(strict_types=1);
/**
 * Created by Patricio A. Di Muzio.
 * Date: 04/05/19
 * Time: 20:06
 */

namespace App\Security\User\Domain\VOs;


use App\Shared\Domain\VOs\Contract\StringNullableValueObject;
use App\Shared\Domain\VOs\Contract\StringValueObject;
use App\Shared\Domain\VOs\Contract\ValueObject;
use App\Shared\Domain\VOs\DomainTypeException;

final class Email implements StringNullableValueObject
{
    
    /** @var string */
    private $email;
    
    public function __construct(?string $email = null)
    {
        $this->email = $email !== null ? $this->validateMailOrFail($email) : null;
    }
    
    public function getPrimitive(): ?string
    {
        return $this->email;
    }
    
    public function isNull(): bool
    {
        return is_null($this->email);
    }
    
    public function isSame(ValueObject $object): bool
    {
        if (!$object instanceof $this) {
            return false;
        }
        
        return $object->getPrimitive() === $this->getPrimitive();
    }
    
    private function validateMailOrFail(string $email): string
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return $email;
        }
        
        throw new DomainTypeException( 'Invalid Email Format');
    }
}