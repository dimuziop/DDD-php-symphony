<?php declare(strict_types=1);
/**
 * Created by Patricio A. Di Muzio.
 * Date: 04/05/19
 * Time: 20:07
 */

namespace App\Shared\Domain\VOs;


use App\Shared\Domain\VOs\Contract\ValueObject;
use Ramsey\Uuid\Uuid as RamseyUuid;

final class Uuid implements ValueObject
{
    
    /**
     * @var string|null
     */
    private $uuid;
    
    /**
     * Uuid constructor.
     *
     * @param string|null $uuid
     *
     * @throws \Exception
     */
    public function __construct(?string $uuid = null)
    {
        // @TODO: Clean this smell
        $this->uuid = $uuid ?? RamseyUuid::uuid4()->toString();
    }
    
    public function isSame(ValueObject $object): bool
    {
        // TODO: Implement isSame() method.
    }
    
    public function getPrimitive()
    {
        return $this->uuid;
    }
}