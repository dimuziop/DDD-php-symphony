<?php declare(strict_types=1);
/**
 * Created by Patricio A. Di Muzio.
 * Date: 04/05/19
 * Time: 20:06
 */

namespace App\Security\User\Domain\VOs;


use App\Shared\Domain\VOs\Contract\StringValueObject;
use App\Shared\Domain\VOs\Contract\ValueObject;

final class Password implements StringValueObject
{
    
    /*** @var string */
    private $password;
    
    public function __construct(string $password)
    {
        $this->password = $password;
    }
    
    public function getPrimitive(): string
    {
        return (string) $this->password;
    }
    
    public function isNull(): bool
    {
        // TODO: Implement isNull() method.
    }
    
    public function isSame(ValueObject $object): bool
    {
        // TODO: Implement isSame() method.
    }
}