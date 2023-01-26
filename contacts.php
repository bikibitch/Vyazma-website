<body> 
	<?php 
		// изменение сообщения
		if($admin && !empty($_GET['action']) && ($_GET['action']=='updatemessage' && !empty($_GET['ID']))) {
			$sqltext='update messages set uname="'.$_POST['uname'].
			         '", message="'.$_POST['message'].'", email="'.$_POST['email'].'", mdate="'.$_POST['mdate']
			         .'" where ID='.$_POST['ID'];
			print('<br/><br/><p class="text">Комментарий изменен</p><br/>');
			mysqli_query($db,$sqltext);
         }

        // удаление сообщения
		if($admin && !empty($_GET['action']) && ($_GET['action']=='deletemessage') && !empty($_GET['ID'])) {
			$sqltext="DELETE FROM messages WHERE ID=".$_GET['ID'];
			print('<p class="text">Комментарий удален<br/></p>');
			mysqli_query($db,$sqltext); 
		}

		// добавление сообщения
		if(!empty($_GET['action'])&&($_GET['action']=='addrecord')) {
					if(!empty($_POST['uname']) && !empty($_POST['message']) && !empty($_POST['email'])) {
						
						$sqltext='INSERT INTO messages (uname,email,message,mdate) VALUES ("'.$_POST['uname']
						                       .'","'.$_POST['email'].'","'.$_POST['message']
						                       .'","'.date("Y-m-d").'");';
						mysqli_query($db,$sqltext);    
						print('<p class="text">Сообщение отправлено!</p>');
					}
					else print('<p class="text">ВАШЕ СООБЩЕНИЕ НЕ ОТПРАВЛЕНО, ПОСКОЛЬКУ НЕ УКАЗАНО ИМЯ И/ИЛИ СООБЩЕНИЕ И/ИЛИ EMAIL<br/><br/></p>');
			}

		print('
			<div class="main-content">
				<div class="contacts">
					<div class="form">
						<h1 class="text">Есть вопросы или предложения?</h1>
						<form action="index.php?page=contacts&action=addrecord"method="POST">
							<label for="fname">Ваше имя</label>
							<input type="text" name="uname">
							<label for="email">Ваша email</label>
							<input type="email" name="email">
							<label for="comment">Ваш текст</label>
							<textarea name="message"></textarea>
							<input type="submit" value="Отправить">
						</form>
					</div>');

		$sqltext = "select * from contacts order by so";

		if($r = mysqli_query($db,$sqltext)) {
			print('
				<div class="links1">
					<div class="imgCon">
						<div id="imgCon1"></div>
						<div id="imgCon2"></div>
					</div>
				<div class="links2">');
			while($i = mysqli_fetch_array($r)) {
				print('
					<a href="'.$i['link'].'">'.$i['lname'].'</a>');
			}
			print('</div></div></div></div>');
		}

		$sqltext = "select * from messages";

		if($admin&&$r=mysqli_query($db,$sqltext)) {
				print('
					<div class="review">
						<div class="comments">
						<h2 class="text">Сообщения</h2>');
				while($k=mysqli_fetch_array($r)) {
					print('
							<div class="comment">
								<div class="comPart1">
									<div class="text nameCom">'.$k['uname'].'</div>
									<div class="text dateCom"> - '.$k['mdate'].'</div>
									<a class="adminImg" href="index.php?page=contacts&action=deletemessage&ID='.$k['ID'].'">
				               			<img src="../images/deleteIcon.png"/>
				               		</a>
				               		<a class="adminImg" href="index.php?page=contacts&action=updateform&ID='.$k['ID'].'">
				               			<img src="../images/editIcon.png"/>   
				               		</a>
								</div>
								<div class="comPart2">
									<div class="text emailCom">'.$k['email'].'</div>
									'.$k['message'].'
								</div>
							</div>');
					if($admin && !empty($_GET['action']) && ($_GET['action']=='updateform' && !empty($_GET['ID'])&&($_GET['ID']==$k['ID']))) {
				         print(' 
				         		<div class="updateform" id="comment">
									<form action="index.php?page=contacts&action=updatemessage&ID='.$k['ID'].'" method="POST"> 
										<p class="text">Имя:</p>
										<input type="text" name="uname" value="'.$k['uname'].'"/>
										<p class="text">Email:</p>
										<input type="email" name="email" value="'.$k['email'].'">
										<p class="text">Сообщение:</p>
										<textarea name="message">'.$k['message'].'</textarea>
										<p class="text">Дата:</p>
										<input type="text" name="mdate" value="'.$k['mdate'].'"/>
										<input type="hidden" name="ID" value="'.$k['ID'].'"/>
										<input type="submit" value="Изменить"/>
				                	</form>
				                </div>');
				    }
				}
				print('
						</div>
					</div>');
		}
	
	?>

</body>
</html>