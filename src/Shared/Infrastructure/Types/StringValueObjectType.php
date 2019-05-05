<?php declare(strict_types=1);
/**
 * Created by Patricio A. Di Muzio.
 * Date: 05/05/19
 * Time: 17:34
 */

namespace App\Shared\Infrastructure\Types;


use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;

class StringValueObjectType extends Type
{
    const NAME = 'StringValueObject';
    /**
     * Gets the SQL declaration snippet for a field of this type.
     *
     * @param mixed[] $fieldDeclaration The field declaration.
     * @param AbstractPlatform $platform The currently used database platform.
     *
     * @return string
     */
    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        // TODO: Implement getSQLDeclaration() method.
    }
    
    /**
     * Gets the name of this type.
     *
     * @return string
     *
     * @todo Needed?
     */
    public function getName()
    {
        // TODO: Implement getName() method.
    }
}