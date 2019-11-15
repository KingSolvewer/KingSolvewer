<?php
/**
 * Created by PhpStorm.
 * Date: 2019/10/23
 * Time: 上午9:43
 * @package: EmailTest.php
 */

namespace Test\controller;
require dirname(dirname(__DIR__)) . '/apps/controller/Email.php';
use apps\controller\Email;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

final class EmailTest extends TestCase
{
    public function testCanBeCreatedFromValidEmailAddress()
    {
        $email = 'user@example.com';
        $this->assertInstanceOf(
            Email::class,
            Email::fromString($email)
        );
    }

    public function testCannotBeCreatedFromInvalidEmailAddress()
    {
        $this->expectException(InvalidArgumentException::class);

        Email::fromString('invalid');
    }

    public function testCanBeUsedAsString()
    {
        $this->assertEquals(
            'user@example.com',
            Email::fromString('user@example.com')
        );
    }

}
