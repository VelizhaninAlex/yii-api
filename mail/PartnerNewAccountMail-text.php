<?php

/* @var $this yii\web\View */
/* @var $user common\models\User */
/* @var $token */
/* @var $password */
/* @var $email */

?>
<?=Yii::t('mail','Hello');?>,

<?= Yii::t('mail','Link to enter');?>: https://partner.usrv.io

<?= Yii::t('mail','Your login');?>: <?= $email ?>


<?= Yii::t('mail','Your password');?>: <?= $password ?>
