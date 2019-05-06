<?php declare(strict_types=1);
/**
 * Created by Patricio A. Di Muzio.
 * Date: 04/05/19
 * Time: 20:06
 */

namespace App\Tests\Unit\Security\User\Domain\VOs;


use App\Security\User\Domain\VOs\Password;
use App\Shared\Domain\VOs\DomainString;
use App\Shared\Infrastructure\PasswordEncryptor;
use PHPUnit\Framework\TestCase;

final class PasswordTest extends TestCase
{
    /**
     * @test
     */
    public function assertPasswordsAreSame()
    {
        $encryptor = new PasswordEncryptor();
        $passwordStr = 'ThisIsAn123.';
        $password = new Password($passwordStr, $encryptor);
        $this->assertTrue($password->isSame($password));
    }
    
    /**
     * @test
     */
    public function assertPasswordsAreFalseWithDifferentType()
    {
        $encryptor = new PasswordEncryptor();
        $passwordStr = 'ThisIsAn123.';
        $password = new Password($passwordStr, $encryptor);
        $string = new DomainString($passwordStr);
        $this->assertFalse($password->isSame($string));
    }
    
    /**
     * @test
     */
    public function assertPasswordIsValid()
    {
        $encryptor = new PasswordEncryptor();
        $passwordStr = 'ThisIsAn123.';
        $password = new Password($passwordStr, $encryptor);
        $string = new DomainString($passwordStr);
        $this->assertTrue($password->isValid($string));
    }
    
    /**
     * @test
     */
    public function assertPasswordIsNotValid()
    {
        $encryptor = new PasswordEncryptor();
        $passwordStr = 'ThisIsAn123.';
        $password = new Password($passwordStr, $encryptor);
        $string = new DomainString('asdasd');
        $this->assertNotTrue($password->isValid($string));
    }
}