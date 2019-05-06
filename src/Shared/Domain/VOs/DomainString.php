<?php declare(strict_types=1);
/**
 * Created by Patricio A. Di Muzio.
 * Date: 06/05/19
 * Time: 00:44
 */

namespace App\Shared\Domain\VOs;


use App\Shared\Domain\VOs\Contract\StringValueObject;
use App\Shared\Domain\VOs\Contract\ValueObject;

class DomainString implements StringValueObject
{
    
    /**
     * @var string
     */
    private $string;
    
    public function __construct(string $string)
    {
        $this->string = $string;
    }
    
    public function getPrimitive(): string
    {
        return (string) $this->string;
    }
    
    public function isSame(ValueObject $object): bool
    {
        if (!$object instanceof $this) {
            return false;
        }
    
        return $object->getPrimitive() === $this->getPrimitive();
    }
}