<body> 
	<?php
		// добавление нового сотрудника
		if($admin && !empty($_GET['action'])&&($_GET['action'] =='addstaff')) {
			$sqltext='insert into staff (post, name, photo, timetable, so) values ("'.$_POST['post'].'", "'.$_POST['name'].'", "'.$_POST['photo'].'", "'.$_POST['timetable'].'", "'.$_POST['so'].'")';
			print('<br/><br/><p class="text">Сотрудник "'.$_POST['name'].'" добавлен</p><br/>');
			mysqli_query($db,$sqltext);
		}

		// изменение сотрудника
		if($admin && !empty($_GET['action']) && ($_GET['action'] == 'updatestaff')) {
			$sqltext='update staff set post="'.$_POST['post'].
			         '", name="'.$_POST['name'].'", photo="'.$_POST['photo'].'", timetable="'.$_POST['timetable'].'", so="'.$_POST['so'].'" where ID='.$_POST['ID'];
			print('<br/><br/><p class="text">Сотрудник "'.$_POST['name'].'" изменен</p><br/>');
			mysqli_query($db,$sqltext);
		}

		// удаление сотрудника
		if($admin&&!empty($_GET['action']) && ($_GET['action']=='deletestaff') && !empty($_GET['ID'])) {
			$sqltext="DELETE FROM staff WHERE ID=".$_GET['ID'];
			print('<p class="text">Сотрудник удален<br/></p>');
			mysqli_query($db,$sqltext); 
		}

		// вывод карточек
		$sqltext = "select * from staff order by so";
		
		if($r=mysqli_query($db,$sqltext))
		{
			print('<div class="main-content">
					<div class="cards">');
			if ($admin) {
					print('
						<div class="updateform"><form action="index.php?page=staff&action=addstaff"method="POST">
						<p class="text">Добавить нового сотрудника:</p>			
						<input type="hidden" name="ID"/>
						<p class="text"><br/>Положение сотрудника:</p>
						<input type="text" name="post"/>
						<p class="text">Имя:</p>
						<input type="text" name="name"/>
						<p class="text">Фото:</p>
						<input type="text" name="photo"/>
						<p class="text">Расписание:</p>
						<textarea name="timetable"></textarea>
						<p class="text">Порядковый номер:</p>
						<input type="text" name="so" />
						<input type="submit" value="Добавить"></form></div>');
				}
			while($i=mysqli_fetch_array($r)) {
				print('
					<div class="card">
		        <div class="avatar"><img src="'.$i['photo'].'"></div>
		        <div class="infoStaff">
		            <div class="text job">'.$i['post'].'</div>
		            <div class="text name">'.$i['name'].'</div>
		            <div class="text regime" id="regime">Режим работы</div>
		            <div class="text time" id="time">'.$i['timetable'].'</div>
		        </div>
	    	</div>
	    </div>
	   </div>');
					if(($admin)&&!empty($_GET['action']) && ($_GET['action']=='updateform' && !empty($_GET['ID'])&&($_GET['ID']==$i['ID']))) {
				         print(' 
				         		<div class="updateform">
									<form action="index.php?page=staff&action=updatestaff&ID='.$i['ID'].'" method="POST"> 
					                	<p class="text"><br/>Положение сотрудника:</p>
										<input type="text" name="post" value="'.$i['post'].'"/>
										<p class="text">Имя:</p>
										<input type="text" name="name" value="'.$i['name'].'"/>
										<p class="text">Фото:</p>
										<input type="text" name="photo" value="'.$i['photo'].'"/>
										<p class="text">Расписание:</p>
										<textarea name="timetable">'.$i['timetable'].'</textarea>
										<p class="text">Порядковый номер:</p>
										<input type="text" name="so" value="'.$i['so'].'"/>
										<input type="hidden" name="ID" value="'.$i['ID'].'"/>
										<input type="submit" value="Изменить"/>
			               			</form>
				            	</div>');
				          }
				    else if ($admin){
				    	print('
						<div class="adminButtonChange"><form action="index.php?page=staff&action=updateform&ID='.$i['ID'].'" method="POST">
							<input type="hidden" name="ID" value="'.$i['ID'].'">
							<input type="submit" value="Изменить"></form>
						</div>
						<div class="adminButtonChange">
							<form action="index.php?page=staff&action=deletestaff&ID='.$i['ID'].'" method="POST">
							<input type="hidden" name="ID" value="'.$i['ID'].'">
							<input type="submit" value="Удалить" 
							onclick="return confirm(\'ВЫ ДЕЙСТВИТЕЛЬНО ХОТИТЕ БЕЗВОЗВРАТНО УДАЛИТЬ ЭТОТ СЕРВИС?\');">
							</form>
						</div>' );
				    }
				
			}
		}

	?>
	  

</body>
</html>
