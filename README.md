signDataBehavior
================

Wrapper for yii security manager functions. Provide ability to sign data for safe transmission

REQUIREMENTS
------------
1. Yii 1.1.9

INSTALLATION
------------
1. Copy behavior file to application/components/behaviors directory
2. Add behavior to application or other component

in application config:
<pre><code>
'behaviors' => array(
    'signDataBehavior' => array(
        'class' => 'application.components.behaviors.SignDataBehavior',
        'key' => 'my-secret-key',
    ),
),
</code></pre>

or dynamic attach:

<pre><code>
$behavior = Yii::createComponent(array(
    'class' => 'application.components.behaviors.SignDataBehavior',
    'key' => 'my-secret-key'
));
Yii::app()->attachBehavior('signDataBehavior', $behavior);
</code></pre>


USAGE
------------ 
<pre><code>
// data
$userName = 'user';
$userEmail = 'user.example.com';

// create sign
$sign = Yii::app()->createSign($userName, $userEmail);

// check sign in other place
$isValidSign = Yii::app()->checkSign($sign, $userName, $userEmail);
</code></pre>
