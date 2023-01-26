<body> 
	<?php
		$sqltext = "select * from faq order by so";

		if($r = mysqli_query($db,$sqltext)) {
			print('
				<div class="main-content">
					<div class="content">
						<div class="rect"></div>
						<div class="links">');
			while($i = mysqli_fetch_array($r)) {
				print('
						<a href="#link'.$i['ID'].'">'.$i['header'].'<br/></a>
					');
			}
			print('</div>
				</div>');
		}

		if($r=mysqli_query($db,$sqltext)) {
			print('<div class="textFaq">');
			while($i = mysqli_fetch_array($r)) {
				print('
					<span id="link'.$i['ID'].'"></span>
					<h1>'.$i['header'].'</h1>
					<p>'.$i['text'].'</p><br>');
			}
			print('</div></div>');
		}

	?>

</body>
</html>