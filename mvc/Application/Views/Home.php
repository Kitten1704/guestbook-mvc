<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
		<link rel="shortcut icon" href="img/main_ico.png" type="image/x-icon">
		<link rel="stylesheet" type="text/css" href="css/guestbook_style.css" >
		<title>Гостевая книга</title>
	</head>
	<body>
		<div class="container">
			<div class="title">
				<div class="title_links">
				<?php
				if (isset($_SESSION['uID']))
				{

				print'
				<a href="Profile">Редактировать профиль</a>&nbsp;|&nbsp;
				<a href="Logout">Выход</a>';
				}
				else
				{
				print'
				<a href="Login">Войти</a>&nbsp;|&nbsp;
				<a href="Registration">Регистрация</a>';
				}	
				?>
				</div>
			</div>
		<div class="messages">
			<table width=75%>
				<tr><td colspan="2" height=10px><hr></td></tr>
				<?php
				if(count($arr) == 0)
				{
					echo "<h3>В книге пока нет записей.</h3>";
				}
				else 
				{

					foreach((array)$arr as $item)
					{
						echo "<tr><td width=25%><h1>".htmlspecialchars($item['uname'])." ";	
						echo htmlspecialchars($item['usname'])."</h1>";
						echo "<div class='avatar'><img src=".$item['uavatar']."></div>";		
						echo "<h1>".htmlspecialchars($item['uemail'])."</h1><br>";
						echo "<h2>".htmlspecialchars($item['pdate'])."</h2><br></td>";	
						echo "<td><p>".htmlspecialchars($item['ptext'])."</p></td></tr>";
						echo "<tr><td colspan='2'><hr></td></tr>";
					}
				}
				?>
			</table>
		</div>
		</div>
		<div class="clear"></div>
		<?php
			if (isset($_SESSION['uID']))
			{
				print'<div class="message_form">
				<div class="message_form_center">';
				
				print'<form  method="post" action="Addmessage">';
						
				echo "<div class='user_name'><p>".$arr2['uname'].":</p></div>";
				echo"<div class='avatar'><img src=".$arr2['uavatar']."></div>";
				print'<div class="text_box">
						<p>
							<textarea class="text_color" name="message" cols="45" rows="8" placeholder="Введите текст сообщения"></textarea>
						</p>';
				if (isset($_SESSION['er_umessage']))echo "<h4>".$_SESSION['er_umessage']."</h4>";		
				print'	   </div>
				<input class="message_form_button" name="message_form_button" type="submit" value="Разместить">';
			}
			?>
				</form>
			</div>
		</div>
	
</body>
</html>
		