<?php
/**
 * Create by PhpStorm
 * @since 2020-05-06 18-18-53
 * @package MySubject.php
 * @author wangshaowu
 */

namespace apps\ttest\subject;


use SplObserver;

class MySubject implements \SplSubject
{
    /** @var \SplObjectStorage $_observers */
    private $_observers;
    private $_name;

    public function __construct($name) {
        $this->_observers = new \SplObjectStorage();
        $this->_name = $name;
    }

    /**
     * @inheritDoc
     */
    public function attach(SplObserver $observer)
    {
        // TODO: Implement attach() method.
        $this->_observers->attach($observer);
    }

    /**
     * @inheritDoc
     */
    public function detach(SplObserver $observer)
    {
        // TODO: Implement detach() method.
    }

    /**
     * @inheritDoc
     */
    public function notify()
    {
        // TODO: Implement notify() method.
        /**
         * @var SplObserver $observer
         */
        foreach ($this->_observers as $observer) {
            $observer->update($this, $this->_name);
        }
    }
}