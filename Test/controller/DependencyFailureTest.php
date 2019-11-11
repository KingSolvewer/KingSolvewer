<?php
/**
 * Created by PhpStorm.
 * Date: 2019/10/23
 * Time: 下午1:44
 * @package: DependencyFailureTest.php
 */

namespace Test\controller;

use PHPUnit\Framework\TestCase;

class DependencyFailureTest extends TestCase
{
    public function testOne()
    {
        $this->assertTrue(false);
    }

    /**
     * @depends testOne
     */
    public function testTwo()
    {

    }
}
