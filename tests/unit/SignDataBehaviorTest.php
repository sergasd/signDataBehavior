<?php

use sergasd\behaviors\SignDataBehavior;

/**
 * @requires extension mcrypt
*/
class SignDataBehaviorTest extends TestCase
{

    public function testCreateSignAndCheckValidData()
    {
        $data = $this->getTestData();
        $sign = Yii::app()->createSign($data['id'], $data['name'], $data['email']);
        $this->assertTrue(Yii::app()->checkSign($sign, $data['id'], $data['name'], $data['email']));
    }

    public function testCreateSignAndCheckModifiedData()
    {
        $data = $this->getTestData();
        $sign = Yii::app()->createSign($data['id'], $data['name'], $data['email']);
        $data['id'] = 'modified id';
        $this->assertFalse(Yii::app()->checkSign($sign, $data['id'], $data['name'], $data['email']));
    }

    protected function setUp()
    {
        parent::setUp();

        $behavior = new SignDataBehavior();
        $behavior->key = 'test-key';
        Yii::app()->attachBehavior('signDataBehavior', $behavior);
    }

    private function getTestData()
    {
        return array(
            'id' => 1,
            'name' => 'sergasd',
            'email' => 'sergasd@gmail.com'
        );
    }

} 