<?php declare(strict_types=1);
/**
 * Created by Patricio A. Di Muzio.
 * Date: 04/05/19
 * Time: 20:06
 */

namespace App\Tests\Unit\Security\User\Domain\VOs;


use App\Security\User\Domain\VOs\Email;
use App\Security\User\Domain\VOs\UserName;
use App\Shared\Domain\VOs\Contract\StringNullableValueObject;
use App\Shared\Domain\VOs\Contract\StringValueObject;
use App\Shared\Domain\VOs\DomainTypeException;
use PHPUnit\Framework\TestCase;

final class EmailTest extends TestCase
{
    /**
     * @test
     */
    public function assertEmailIsAnInstanceOnStringValueAndReturnStringType(): void
    {
        $emailValueObject = new Email('test@value.object');
        $this->assertInstanceOf(StringNullableValueObject::class, $emailValueObject);
        $this->assertTrue(is_string($emailValueObject->getPrimitive()));
    }
    
    /**
     * @test
     */
    public function assertEmailIsCorrectlySetWhenIsValid(): void
    {
        $mailToTest = 'test@value.object';
        $emailValueObject = new Email($mailToTest);
        $this->assertTrue($emailValueObject->getPrimitive() == $mailToTest);
    }
    
    /**
     * @test
     */
    public function assertThrowsErrorWhenTheMailIsInvalid(): void
    {
        $mailToTest = 'test@valueobject';
        $this->expectException(DomainTypeException::class);
        $emailValueObject = new Email($mailToTest);
    }
    
    /**
     * @test
     */
    public function assertTwoValuesAreSame(): void
    {
        $mailToTest = $mailToTest2 = 'test@valueobject.com';
        $emailValueObject = new Email($mailToTest);
        $emailValueObject2 = new Email($mailToTest2);
        $this->assertTrue($emailValueObject->isSame($emailValueObject2));
    }
    
    /**
     * @test
     */
    public function assertTwoValuesAreDifferent(): void
    {
        $mailToTest = 'test@valuebject.com';
        $mailToTest2 = 'test@valueobject.com';
        $emailValueObject = new Email($mailToTest);
        $emailValueObject2 = new Email($mailToTest2);
        $this->assertFalse($emailValueObject->isSame($emailValueObject2));
    }
    
    /**
     * @test
     */
    public function assertTwoTypesAreDifferent(): void
    {
        $mailToTest = $mailToTest2 = 'test@valueobject.com';
        $emailValueObject = new Email($mailToTest);
        $emailValueObject2 = new UserName($mailToTest2);
        $this->assertFalse($emailValueObject->isSame($emailValueObject2));
    }
    
    /**
     * @test
     */
    public function assertCanBeNullable(): void
    {
        $emailValueObject = new Email();
        $this->assertNull($emailValueObject->getPrimitive());
    }
    
    /**
     * @test
     */
    public function lookIfIsNullWorksProperly(): void
    {
        $emailValueObject = new Email();
        $this->assertTrue(($emailValueObject->isNull()));
    }
    
}