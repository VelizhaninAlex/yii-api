<?php
use yii\helpers\Html;

/* @var $this \yii\web\View view component instance */
/* @var $message \yii\mail\MessageInterface the message being composed */
/* @var $content string main view render result */
?>
<?php $this->beginPage()
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <title><?= Html::encode($this->title) ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=560">
    <?php $this->head() ?>
</head>
<body bgcolor="#eaeaea" style="margin: 0; padding: 0; font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size: 14px;">
<?php $this->beginBody() ?>
<table bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" style="width:560px;margin:0 auto;padding:0;font-family:Arial, sans-serif;color:#23687e;letter-spacing:.9px;line-height:1.4;">
    <tr>
        <td align="center">
            <img border="0" width="560" height="205" src="https://usrv.io/images/screen.png" alt="" style="display:block;">
        </td>
    </tr>

    <?= $content ?>

    <tr>
        <td align="center" style="background-image: url(https://usrv.io/images/ft_mail.png); padding-top:15px; padding-bottom:2px">

            <a target="_blank" href="https://www.facebook.com/uremont" style="text-decoration:none;">
                <img src="https://usrv.io/images/Facebook.png" style="margin-left: 5px; margin-right: 5px; width:40px" alt="Facebook">
            </a>

            <a target="_blank" href="https://www.instagram.com/uservice.blockchain/" style="text-decoration:none;">
                <img src="https://usrv.io/images/Insta.png" style="margin-left: 5px; margin-right: 5px; width:40px" alt="Instagram">
            </a>

            <a target="_blank" href="https://www.reddit.com/user/uservicebt/" style="text-decoration:none;">
                <img src="https://usrv.io/images/Reddit.png" style="margin-left: 5px; margin-right: 5px; width:40px" alt="Reddit">
            </a>

            <a target="_blank" href="https://t.me/userviceru" style="text-decoration:none;">
                <img src="https://usrv.io/images/Telegram.png" style="margin-left: 5px; margin-right: 5px; width:40px" alt="Telegram">
            </a>

            <a target="_blank" href="https://medium.com/@uservicebt.io" style="text-decoration:none;">
                <img src="https://usrv.io/images/Medium.png" style="margin-left: 5px; margin-right: 5px; width:40px" alt="Medium">
            </a>

            <a target="_blank" href="https://twitter.com/UserviceToken" style="text-decoration:none;">
                <img src="https://usrv.io/images/Twitteer.png" style="margin-left: 5px; margin-right: 5px; width:40px" alt="Twitter">
            </a>

            <a target="_blank" href="https://bitcointalk.org/index.php?topic=2432730.new" style="text-decoration:none;">
                <img src="https://usrv.io/images/Bitcointalk.png" style="margin-left: 5px; margin-right: 5px; width:40px" alt="Bitcointalk">
            </a>

            <a target="_blank" href="https://www.youtube.com/channel/UCwxYP-9mGpnPbNyOr5HoS7Q" style="text-decoration:none;">
                <img src="https://usrv.io/images/Youtube.png" style="margin-left: 5px; margin-right: 5px; width:40px" alt="YouTube">
            </a>

            <a target="_blank" href="https://github.com/devuservice" style="text-decoration:none;">
                <img src="https://usrv.io/images/Github.png" style="margin-left: 5px; margin-right: 5px; width:40px" alt="GitHub">
            </a>
            <br>
        </td>
    </tr>
</table>
    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
