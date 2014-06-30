<?php
?>
<head>
		<meta http-equiv="Content-Tipe" content="text/html; charset=utf-8">
		<link rel="shortcut icon" href="img/main_ico.png" type="image/x-icon"><!--Иконка для странички-->
		<title>Добро пожаловать!</title><!--заголовок страницы-->
		<link rel="stylesheet" type="text/css" href="css/guestbook_style.css" ><!--Подключаем css-->
	</head>
	<body>
		<div class="container">
			<div class="title">
		
			<div class="title_links"><a href="Registration">Регистрация</a>&nbsp;|&nbsp;<a href="Home">На главную</a></div>
			</div>
		<div class="message_form_center">
		<!--Форма входа для зарегистрированных пользователей
		через GET получаем текст, ввденный в поля, если заполнены не все обязательные /Имя, mail, пароль, подтверждение пароля/
		*_error - текст предупреждений, если не все поля заполнены-->
		<form  method="post" action="Enter">
		<h3>Авторизация</h3>
		<p>E-mail:*<input class="text_color" type="text" name="email" size="63" value="<?php if(isset($_SESSION['uemail']))echo $_SESSION['uemail'];?>"></p>
		<h4><?php if (isset($_SESSION['er_emaillenght']))echo $_SESSION['er_emaillenght'];?></h4>
		<h4><?php if (isset($_SESSION['er_invalidemail']))echo $_SESSION['er_invalidemail'];?></h4>
		<h4><?php if (isset($_SESSION['er_noemail']))echo $_SESSION['er_noemail'];?></h4>
		<p>Пароль:*<input class="text_color" type="password" name="password" size="62" value=""></p>
		<h4><?php if (isset($_SESSION['er_passlenght']))echo $_SESSION['er_passlenght'];?></h4>
		<input class="message_form_button" name="message_form_button" type="submit" value="Войти">
		<p>*: Звездочкой помечены поля, обязательные для заполнения.</p>
		</form>
		</div>
		</div>
	</body>
	</html>