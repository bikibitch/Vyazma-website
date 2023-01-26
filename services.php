<body> 

	<?php
	$db = mysqli_connect("127.0.0.1:55555", "root", "", "lab");


		// добавление нового сервиса
		if($admin && !empty($_GET['action'])&&($_GET['action'] =='addservice')) {
			$sqltext='insert into services (name, photo, descript, timetable, so) values ("'.$_POST['name'].'", "'.$_POST['photo'].'", "'.$_POST['descript'].'", "'.$_POST['timetable'].'", "'.$_POST['so'].'")';
			print('<br/><br/><p class="text">Сервис "'.$_POST['name'].'" добавлен</p><br/>');
			mysqli_query($db,$sqltext);
		}

		// изменение сервиса
		if($admin && !empty($_GET['action']) && ($_GET['action'] == 'updateservice')) {
			$sqltext='update services set name="'.$_POST['name'].
			         '", photo="'.$_POST['photo'].'", descript="'.$_POST['descript'].'", timetable="'.$_POST['timetable'].'", so="'.$_POST['so'].'" where ID='.$_POST['ID'];
			print('<br/><br/><p class="text">Сервис "'.$_POST['name'].'" изменен</p><br/>');
			mysqli_query($db,$sqltext);
		}

		// удаление сервиса
		if($admin&&!empty($_GET['action']) && ($_GET['action']=='deleteservice') && !empty($_GET['ID'])) {
			$sqltext="DELETE FROM services WHERE ID=".$_GET['ID'];
			mysqli_query($db,$sqltext);
			$sqltext="DELETE FROM reviews where service_ID=".$_GET['ID'];
			mysqli_query($db,$sqltext);
			print('<p class="text">Сервис удален<br/></p>');
			
		}

		// изменение комментария 
		if($admin && !empty($_GET['action']) && ($_GET['action']=='updatereview' && !empty($_GET['ID']))) {
			$sqltext='update reviews set uname="'.$_POST['uname'].
			         '", message="'.$_POST['message'].'", mdate="'.$_POST['mdate']
			         .'" where ID='.$_POST['ID'];
			print('<br/><br/><p class="text">Комментарий изменен</p><br/>');
			mysqli_query($db,$sqltext);
         }

        // удаление комментария
		if($admin && !empty($_GET['action']) && ($_GET['action']=='deletereview') && !empty($_GET['ID'])) {
			$sqltext="DELETE FROM reviews WHERE ID=".$_GET['ID'];
			print('<p class="text"><br/>Комментарий удален<br/><br/></p>');
			mysqli_query($db,$sqltext); 
		}

		


		//вывод списка сервисов
		if(empty($_GET['serviceID'])){

			$sqltext = "select ID, name, photo, descript, timetable from services order by so";

			if($r=mysqli_query($db,$sqltext))
			{
				print('<div class="main-content">
						<div class="cards">');
				if ($admin) {
					print('
						<div class="updateform"><form action="index.php?page=services&action=addservice"method="POST">
						<p class="text">Добавить новый сервис:</p>			
						<input type="hidden" name="ID"/>
						<p class="text"><br/>Название сервиса:</p>
						<input type="text" name="name"/>
						<p class="text">Фото:</p>
						<input type="text" name="photo"/>
						<p class="text">Описание:</p>
						<textarea name="descript"></textarea>
						<p class="text">Расписание:</p>
						<textarea name="timetable"></textarea>
						<p class="text">Порядковый номер:</p>
						<input type="text" name="so" />
						<input type="submit" value="Добавить"></form></div>');
				}
				while($i=mysqli_fetch_array($r)) {
					$k = mysqli_query($db, "SELECT COUNT(1) FROM reviews WHERE service_ID=".$i['ID']);
					$j = mysqli_fetch_array( $k );
					print('<div class="card">
			        <div class="imgServ"><img src="'.$i['photo'].'"></div>
			        <div class="infoServ">
			            <div class="text job"><a href="index.php?page=services&serviceID='.$i['ID'].'">'.$i['name'].'</a></div>
			            <div class="text info">'.$i['descript'].'</div>
			            <div class="text regime" id="regime">Режим работы</div>
			            <div class="text time" id="time">'.$i['timetable'].'</div>
			            <div class="reviewLink"><a href="index.php?page=services&serviceID='.$i['ID'].'">Отзывы ('.$j[0].')</a></div></div></div>');
					if($admin) {
						print('<div class="adminButtonChange"><form action="index.php?page=services&action=deleteservice&ID='.$i['ID'].'" method="POST">
							<input type="hidden" name="deleteID" value="'.$i['ID'].'">
							<input type="submit" value="Удалить этот сервис" 
							onclick="return confirm(\'ВЫ ДЕЙСТВИТЕЛЬНО ХОТИТЕ БЕЗВОЗВРАТНО УДАЛИТЬ ЭТОТ СЕРВИС?\');"></form></div>' );
					}
				}
				print('</div></div>');
			}
		}
		else {

			//вывод информации о конкретном сервисе
			$sqltext="select * from services where ID=".$_GET['serviceID'];
			if($r=mysqli_query($db,$sqltext)) {
				if($i=mysqli_fetch_array($r)) {
					if ($admin) {
			  			print('<div class="updateform"><form action="index.php?page=services&serviceID='.$_GET['serviceID'].'&action=updateservice" method="POST">
									<input type="hidden" name="ID" value="'.$i['ID'].'"/>
									<p class="text">Название сервиса:</p>
									<input type="text" name="name" value="'.$i['name'].'"/>
									<p class="text">Фото:</p>
									<input type="text" name="photo" value="'.$i['photo'].'"/>
									<p class="text">Описание:</p>
									<textarea name="descript">'.$i['descript'].'</textarea>
									<p class="text">Расписание:</p>
									<textarea name="timetable">'.$i['timetable'].'</textarea>
									<p class="text">Порядковый номер:</p>
									<input type="text" name="so" value="'.$i['so'].'"/>
									<input type="submit" value="Изменить"></form>');
			  			print('<form action="index.php?page=services&action=deleteservice&ID='.$i['ID'].'" method="POST">
			                                              <input type="hidden" name="deleteID" value="'.$i['ID'].'">
			                                              <input type="submit" value="Удалить этот раздел" 
			                                    onclick="return confirm(\'ВЫ ДЕЙСТВИТЕЛЬНО ХОТИТЕ БЕЗВОЗВРАТНО УДАЛИТЬ ЭТОТ СЕРВИС?\');"></form></div>' );
	  		}
  		
					print('
						<div class="service">
				<div class="line"></div>

				<div class="text job" id="job">'.$i['name'].'</div>

				<div class="serv1">
					<div class="serv2">
						<div class="text info" id="info">'.$i['descript'].'</div>
			            <div class="text regime" id="regime">Режим работы</div>
			            <div class="text time" id="time">'.$i['timetable'].'</div>
					</div>
					<div class="serv3"><img src="'.$i['photo'].'"></div>
				</div>
				<h2 class="text">Отзывы</h2>');
				}
			}
			


			
			//добавление комментария
			if(!empty($_GET['action'])&&($_GET['action']=='addreview')) {
					if(!empty($_POST['uname'])&& !empty($_POST['message'])) {
						$sqltext='INSERT INTO reviews (uname,message,mdate,service_ID) VALUES ("'.$_POST['uname']
						                 .'","'.$_POST['message'].'","'.date("Y-m-d").'",'.$i['ID'].');';
						mysqli_query($db,$sqltext);    
					}
					else print('<p class="text">ВАШЕ СООБЩЕНИЕ НЕ ДОБАВЛЕНО, ПОСКОЛЬКУ НЕ УКАЗАНО ИМЯ И/ИЛИ СООБЩЕНИЕ<br/><br/></p>');
			}

			// вывод комментария на экран
			if($r=mysqli_query($db,"select * from reviews where service_ID=".$i['ID'])) {
				print('<div class="review">
					<div class="comments">');
				while($k=mysqli_fetch_array($r)) {
					print('
						<div class="comment">
							<div class="comPart1">
								<div class="text nameCom">'.$k['uname'].'</div>
								<div class="text dateCom"> - '.$k['mdate'].'</div>'.
								($admin?'
									<a class="adminImg" href="index.php?page=services&serviceID='.$_GET['serviceID'].'&action=deletereview&ID='.$k['ID'].'">
			               				<img src="../images/deleteIcon.png"/>
			               			</a>
			               			<a class="adminImg" href="index.php?page=services&serviceID='.$_GET['serviceID'].'&action=updateform&ID='.$k['ID'].'">
			               				<img src="../images/editIcon.png"/>   
			               			</a>':'').'
							</div>
							<div class="comPart2">'.$k['message'].'</div>
						</div>');
					if($admin && !empty($_GET['action']) && ($_GET['action']=='updateform' && !empty($_GET['ID'])&&($_GET['ID']==$k['ID']))) {
				         print(' 
				         		<div class="updateform" id="comment">
								<form action="index.php?page=services&serviceID='.$_GET['serviceID'].'&action=updatereview&ID='.$k['ID'].'" method="POST">
								<p class="text">Имя:</p>
								<input type="text" name="uname" value="'.$k['uname'].'"/>
								<p class="text">Дата:</p>
								<input type="text" name="mdate" value="'.$k['mdate'].'"/>
								<p class="text">Комментарий:</p>
								<textarea name="message">'.$k['message'].'</textarea>
								<input type="hidden" name="ID" value="'.$k['ID'].'"/>
								<input type="submit" value="Изменить"/>
				                </form></div>');
				    }
				}
			}

			

			//вывод формы заявки на экран
			$sqltext="select * from services where ID=".$_GET['serviceID'];
			if($r=mysqli_query($db,$sqltext)) {
				if($i=mysqli_fetch_array($r)) {
					print('
						</div>
						<div class="formCom">
							<h1 class="text">Оставьте комментарий</h1>
							<form action="index.php?page=services&serviceID='.$i['ID'].'&action=addreview"method="POST">
								<label for="fname">Ваше имя</label>
								<input type="text" name="uname">
								<label for="comment">Ваш текст</label>
								<textarea name="message"></textarea>
								<input type="submit" value="Отправить">
							</form>
						</div>
					</div>
				</div>  ');
				}
			}
		}
	?>  
</body>
</html>