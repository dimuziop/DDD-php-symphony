<?php declare(strict_types=1);
/**
 * Created by Patricio A. Di Muzio.
 * Date: 04/05/19
 * Time: 20:22
 */

namespace App\Shared\Domain\VOs\Contract;


interface StringValueObject extends ValueObject
{
    public function getPrimitive(): string;
}