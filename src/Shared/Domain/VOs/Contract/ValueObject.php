<?php declare(strict_types=1);
/**
 * Created by Patricio A. Di Muzio.
 * Date: 04/05/19
 * Time: 20:17
 */

namespace App\Shared\Domain\VOs\Contract;


interface ValueObject
{
    public function isSame(ValueObject $object): bool;
    public function getPrimitive();
}