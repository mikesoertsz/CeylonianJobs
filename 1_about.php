<?php include('lib/dbcon.php'); include('lib/functions.php'); ?>
<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="description" content="______________">
<meta name="keywords" content="_________________">
<meta name="author" content="___________________">
<title>Ceylonian Job Network</title>
<link rel="stylesheet" type="text/css" href="styles/styles.css"  />
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300">
<link href='http://fonts.googleapis.com/css?family=Wire+One' rel='stylesheet' type='text/css'>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script src="js/cj_core.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	//	
});
</script>
</head>

<body>
<div id="wrapper">
	<?php headerTop("basic"); ?>
	<div id="main_body">
		<div id="left_column">
			<?php mainNav(); ?>
		</div>
		<div id="mid_column">
			
		</div>
		<div id="right_column">
			<a href="1_resBuilder.php">Resume Builder</a>
			<a href="" id="employers" class="rightcolumn_button">For Employers</a>
		</div>
		<div class="clear"></div>
	</div>
</div> <!-- Close wrapper -->
</body>
</html>