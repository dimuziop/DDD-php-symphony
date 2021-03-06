<?php declare(strict_types=1);
/**
 * Created by Patricio A. Di Muzio.
 * Date: 04/05/19
 * Time: 20:36
 */

namespace App\Shared\Domain\VOs\Contract;


interface StringNullableValueObject extends ValueObject
{
    public function isNull(): bool;
    
    public function getPrimitive(): ?string ;
}