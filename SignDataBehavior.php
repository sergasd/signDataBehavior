<?php
/**
 * @class SignDataBehavior
 * Provide ability to sign data for safe transmission
 */

class SignDataBehavior extends CBehavior
{

    /**
     * @var string $key encrypt key, may be different for different components
    */
    public $key;


    /**
     * Create sign for many strings arguments
     *
     * example:
     * ~~~
     * self::createSign('string1', 'string2', 'string3');
     * ~~~
     * @param mixed
     * @return string
     */
    public function createSign()
    {
        $concatString = implode('', func_get_args());
        return Yii::app()->securityManager->encrypt($concatString, $this->key);
    }


    /**
     * Check sign for data.
     *
     * First param should be sign string.
     * Next params should be any strings in order like at self::createSign
     * example:
     * ~~~
     * self::checkSign($signFromRequest, 'string1', 'string2', 'string3');
     * ~~~
     * @return boolean
     */
    public function checkSign()
    {
        $arguments = func_get_args();
        $sign = array_shift($arguments);
        $concatString = implode('', $arguments);
        return ($concatString === Yii::app()->securityManager->decrypt($sign, $this->key));
    }

} 