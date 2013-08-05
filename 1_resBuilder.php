<?php include('lib/dbcon.php'); include('lib/functions.php'); ?>
<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="description" content="______________">
<meta name="keywords" content="_________________">
<meta name="author" content="___________________">
<title>Resume Builder</title>
<link rel="stylesheet" type="text/css" href="styles/styles.css"  />
<link rel="stylesheet" type="text/css'href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600">
<link href='http://fonts.googleapis.com/css?family=Wire+One' rel='stylesheet' type='text/css'>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script src="js/cj_core.js" type="text/Javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
	
});
</script>
</head>

<body>
<div id="wrapper">
	<?php headerTop("candidate"); ?>
	<div id="main_body">
		<div id="left_column">
			<?php mainNav(); ?>
		</div>
		<div id="mid_column">
			<h1 style="padding:15px;">Resume Builder</h1>
			<div id="accordion">
				<h3 class="resume_form_section">Details</h3>
				<div class="form_content">
					<div class=""></div>
					<form id="resume_1" action="" method="POST">
						<ul class="resumeform">
							<li><label for=""></label><input  id="__" name="__" type="text"/></li>
							<li><label for=""></label><input  id="__" name="__" type="text"/></li>
							<li><label for=""></label><input  id="__" name="__" type="text"/></li>
							<li><label for=""></label><input  id="__" name="__" type="text"/></li>
						</ul>
						<div class="clear"></div>
					</form>
				</div>
				<h3 class="resume_form_section">Experience</h3>
				<div class="form_content"></div>
				<h3 class="resume_form_section">Education</h3>
				<div class="form_content"></div>
				<h3 class="resume_form_section">Skills</h3>
				<div class="form_content"></div>
				<h3 class="resume_form_section">Intro/Summary</h3>
				<div class="form_content"></div>
				<h3 class="resume_form_section">Achievements</h3>
				<div class="form_content"></div>
				<h3 class="resume_form_section">Reccommendations</h3>
				<div class="form_content"></div>
			</div>
		</div>
		<div id="right_column"></div>
		<div class="clear"></div>
	</div>
</div> <!-- Close wrapper -->
</body>
</html>