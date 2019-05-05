<?php declare(strict_types=1);
/**
 * Created by Patricio A. Di Muzio.
 * Date: 04/05/19
 * Time: 20:06
 */

namespace App\Security\User\Domain\VOs;


use App\Shared\Domain\VOs\Contract\StringValueObject;
use App\Shared\Domain\VOs\Contract\ValueObject;

final class Name implements StringValueObject
{
    
    /**
     * @var string
     */
    private $name;
    
    public function __construct(string $name)
    {
        $this->name = $name;
    }
    
    public function getPrimitive(): string
    {
        return (string)$this->name;
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