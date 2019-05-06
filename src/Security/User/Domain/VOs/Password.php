<?php declare(strict_types=1);
/**
 * Created by Patricio A. Di Muzio.
 * Date: 04/05/19
 * Time: 20:06
 */

namespace App\Security\User\Domain\VOs;


use App\Shared\Domain\Security\Encryptable;
use App\Shared\Domain\Security\EncryptationMethod;
use App\Shared\Domain\VOs\Contract\StringValueObject;
use App\Shared\Domain\VOs\Contract\ValueObject;

final class Password implements StringValueObject, Encryptable
{
    
    /** @var string */
    private $password;
    
    /** @var EncryptationMethod */
    private $encryptor;
    
    public function __construct(string $password, EncryptationMethod $encryptor)
    {
        $this->encryptor = $encryptor;
        $this->password = $this->crypt($password);
    }
    
    public function getPrimitive(): string
    {
        return (string) $this->password;
    }
    
    /**
     * Passwords never can be the same, except if it is the same instance
     * @param \App\Shared\Domain\VOs\Contract\ValueObject $object
     *
     * @return bool
     */
    public function isSame(ValueObject $object): bool
    {
        if (!$object instanceof $this) {
            return false;
        }
    
        return $object->getPrimitive() === $this->getPrimitive();
    }
    
    public function crypt($password): string
    {
        return $this->encryptor->encrypt($password);
    }
    
    public function isValid(StringValueObject $plainPassword): bool
    {
        return $this->encryptor->verify($this, $plainPassword);
    }
}