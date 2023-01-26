<html lang = "ru">

<head>
	<link rel="stylesheet" type ="text/css" href ="style.css">
	<link href="https://fonts.googleapis.com/css2?family=El+Messiri:wght@100;200;300;400;500;600;700&family=Inter:wght@100;200;300;400;500;600&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
</head>
<body> 

	<?php
	session_start();
	
		//выход из админки
 		if(!empty($_GET['action'])&&($_GET['action']=='logout')&&(!empty($_SESSION['admin']))) {
 			$_SESSION['admin']='no';
 		}
 		if (!empty($_GET['adminAccess'])&&$_GET['adminAccess']) {
 			if(!empty($_SESSION['starttime'])) {
 			print('<div class="admin"><p class="text">'.$_SESSION['starttime'].'</p>');
 			}
	 		else {
	 			$_SESSION['starttime']='начало работы с сайтом: '.time();
	 		}

 		}
		
 		//данные для входа в админку

	 	if(!empty($_POST['username'])&&!empty($_POST['userpassword'])) {
	 		if(($_POST['username']=='admin')&&($_POST['userpassword']=='123')) { 
				$_SESSION['admin']='yes'; 
				print('<p class="text"></br>Добро пожаловать, '.$_POST['username'].'!</p>');
			}
			else {
				print('<p class="text"></br>Неправильно введен логин и/или пароль!</p>
					<div class="admin">
						<form action="index.php'.(!empty($_GET['page'])?'?page='.$_GET['page']:'').'&adminAccess=1"method="POST">
							<input type="submit" value="Попробовать еще раз">
						</form>
					</div>');

			}
		}

		if(!empty($_SESSION['admin'])&&($_SESSION['admin']=="yes")) {
			$admin = 1;
		} 
		else {
			$admin = 0;
		}

		if($admin) {
 			print('<a class="text "href="index.php'.(!empty($_GET['page'])?'?page='.$_GET['page'].'&':'?').(!empty($_GET['serviceID'])?'serviceID='.$_GET['serviceID'].'&':'').'action=logout"></br>  Выйти</br></a>');
 		}
 		else if (!empty($_GET['adminAccess'])&&$_GET['adminAccess']){
		 	print('<form action="index.php'.(!empty($_GET['page'])?'?page='.$_GET['page']:'').'"method="POST">
		  	<label for="fname">Логин:</label>
		  	<input type="text" name="username">
		  	<label for="password">Пароль:</label>
		  	<input type="password" name ="userpassword">
		  	<input type="submit">
		  	</form></div>');
	 	}

	$db = mysqli_connect("127.0.0.1:55555", "root", "", "lab");

	//  Header
	$sqltext="select etitle, rtitle from pages order by so";
	print('
		<header>
		<div class="header-container">
			<a href="index.php?page=main">
				<img src="../images/logo.png">
			</a>
			<nav class="header-nav">
				<ul class="header-list"> ');

	if($r=mysqli_query($db,$sqltext)) {

		while($i=mysqli_fetch_array($r)) {
	  		print('<li><a href="index.php?page='.$i['etitle'].'">'.$i['rtitle'].'</a></li> ');
		}
	}

	print('
		</ul>
			</nav>
		</div>
	</header> ');

//  Main Body
	if(!empty($_GET['page'])) {
		$page=$_GET['page'];
	} 
	else {
		$page='main';
	}

	$sqltext = 'select * from pages where etitle="'.$page.'"';

	if ($r = mysqli_query($db, $sqltext)) {
	  	if($i = mysqli_fetch_array($r)) {

			if(!strripos($i['content'],'.php')) {
		  		print($i['content']);
		  	}
		  	else {
		  		print('
					<div class="h1">
						<div class="lilRect"></div>
						<h1 class="text">'.$i['rtitle'].'</h1>
						<div class="lilRect" id="reverse"></div>
					</div>');
		  		include($i['content']);
		  	}
		}
		else {
		  	print('Такой страницы нет!');
	  	}
	}

//  Footer
	print('<footer> <a href="https://itmo.ru/"> <img src="../images/logoWOutback.png"> </a> </footer>');

	 ?>

	 
</body>
</html>