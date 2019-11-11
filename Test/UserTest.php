<?php
/**
 * Created by PhpStorm.
 * Date: 2019/10/22
 * Time: 下午8:11
 * @package: UserTest.php
 */

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{

    public function testSuccess()
    {
        $this->assertEquals(1.0, 1.1, '', 0.1);
    }

    public function testFailure()
    {
        $this->assertEquals(1.0, 1.1);
    }

    public function testRegex()
    {
        static::assertStringStartsWith('http', 'htt://www.baidu.com', '期望的字符串没被完整的包含在字符串内');
    }
}
