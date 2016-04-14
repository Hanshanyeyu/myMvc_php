<?php
/**
 *	PHP核心库类: controller.php
 *
 */

class Controller{
 
    /**
     * action前执行的全局方法，可继承并重构
     */
    public function _before_action() {
 
    }
 
    /**
     * action后执行的全局方法,可继承并重构
     */
    public function _after_action() {
 
    }
 
    /**
     * 魔术方法
     * @param type $name
     * @param type $arguments
     */
    public function __call($name, $arguments) {
        echo "error url 404";
    }
 
}