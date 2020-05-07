<?php
/**
 * Create by PhpStorm
 * @since 2020-05-06 18-15-58
 * @package MyObserver1.php
 * @author wangshaowu
 */

namespace apps\ttest\observer;


use SplSubject;

class MyObserver1 implements \SplObserver
{

    /**
     * @inheritDoc
     */
    public function update(SplSubject $subject)
    {
        // TODO: Implement update() method.
        echo '<pre>';

        print_r($subject);

        echo "\r\n";
//        exit;
    }
}