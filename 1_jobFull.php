<?php include('lib/dbcon.php'); include('lib/functions.php'); ?>
<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="description" content="______________">
<meta name="keywords" content="_________________">
<meta name="author" content="___________________">
<title>Job Details</title>
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
			<div id="job_cover"><img src="img/employer/cover_companyid10dd.gif" alt="cover_companyid" width="800" height="70" /></div>
			<div id="job_container">
				<h3 style="font-size:19px;line-height:30px;">Senior Software Engineer</h3>
				<h4 style="line-height:20px;">Min 2 years experience. PHP, MySQL, AJAX, CodeIgniter</h4>
				<div id="job_stats">Job: 450030    |    32 Days Since Posted</div>
				<p id="job_longdescrip"></p>
				<p id="job_companydetails"></p>
				<div id="job_actions"></div>
			</div>
			
			<div id="job_related">
				<h3>More Jobs Like This</h3>
			</div>
		</div>
		<div id="right_column"></div>
		<div class="clear"></div>
	</div>
</div> <!-- Close wrapper -->
</body>
</html>