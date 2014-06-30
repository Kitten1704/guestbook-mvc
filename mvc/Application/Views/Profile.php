<html>

	<head>
		<meta http-equiv="Content-Tipe" content="text/html" charset="utf-8">
		<link rel="shortcut icon" href="img/main_ico.png" type="image/x-icon"><!--Иконка для странички-->
		<title>Профиль пользователя</title><!--заголовок страницы-->
		<link rel="stylesheet" type="text/css" href="css/guestbook_style.css" ><!--Подключаем css-->
	</head>
	<body>
		<div class="container">
			<div class="title">
			<div class="title_links"><a href="Home">На главную</a>&nbsp;|&nbsp;<a href="Logout">Выход</a></div>
			</div>
		<div class="message_form_center">
		<!--Форма регистрации пользователей
		через GET получаем текст, ввденный в поля, если заполнены не все обязательные /Имя, mail, пароль, подтверждение пароля/
		*_error - текст предупреждений, если не все поля заполнены-->
		<form  method="post" action="Profupdate" enctype="multipart/form-data">
		<h3>Редактировать данные</h3>
		<p>Имя: * <input class="text_color" type="text" name="name" value="<?php echo $arr['uname'];?>">&nbsp;
		Фамилия:<input class="text_color" type="text" name="sname" size="24" value="<?php echo $arr['usname'];?>"></p>
		<h4><?php if (isset($_SESSION['er_name'])) echo $_SESSION['er_name'];?></h4>	
		<p>E-mail:*<input class="text_color" type="text" name="email" size="63" value="<?php echo $arr['uemail'];?>"></p>
		<h4><?php if (isset($_SESSION['er_email'])) echo $_SESSION['er_email'];?></h4>
		<h4><?php if (isset($_SESSION['er_emaillenght'])) echo $_SESSION['er_emaillenght'];?></h4>
		<p>Пароль:<input class="text_color" type="password" name="password" size="61" placeholder="Введите новый пароль"></p>
		<h4><?php if (isset($_SESSION['er_password'])) echo $_SESSION['er_password'];?></h4>
		<p>Подтвердите пароль:<input class="text_color" type="password" name="re_password" size="44" placeholder="Подтвердите новый пароль"></p>
		<h4><?php if (isset($_SESSION['er_repassword'])) echo $_SESSION['er_repassword'];?></h4>
		<p>Аватар:<input type="file" name="avatar"></p>
		<h4><?php if (isset($_SESSION['er_file'])) echo $_SESSION['er_file'];?></h4>
		<input class="message_form_button" name="message_form_button" type="submit" value="Сохранить">
		<p>*: Звездочкой помечены поля, обязательные для заполнения.</p>
		</form>
		</div>
		</div>
	</body>
	</html>