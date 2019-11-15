<?php
/**
 * Created by PhpStorm.
 * Date: 2019/10/23
 * Time: 下午3:09
 * @package: MultipleDependenciesTestTest.php
 */

namespace Test\controller;

use PHPUnit\Framework\TestCase;

class MultipleDependenciesTest extends TestCase
{
    public function testProducerSecond()
    {
        $this->assertTrue(true);
        return 'second';
    }

    public function testProducerFirst()
    {
        $this->assertTrue(true);
        return 'first';
    }



    /**
     * @depends testProducerFirst
     * @depends testProducerSecond
     */
    public function testConsumer()
    {
        $this->assertEquals(
            ['first', 'second'],
            func_get_args()
        );
    }
}
