<h1>Страница авторизации</h1>
<?php if($data['login_status']=="access_granted") { ?>
<p style="color:green">Авторизация прошла успешно.</p>
<?php } elseif($data['login_status']=="access_denied") { ?>
<p style="color:red">Логин и/или пароль введены неверно.</p>
<?php } ?>
