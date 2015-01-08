<!DOCTYPE html>
<html>
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
		<title>HTML5 Form Builder</title>
		<meta charset="utf-8" />
		<script src="js/jquery-latest.min.js"></script>
		<script src="js/libs/jqueryui/1.11.1/jquery-ui.min.js"></script>
		<script src="js/jquery.formbuilder.js"></script>
		<link href="css/jquery.formbuilder.css" media="screen" rel="stylesheet" />
		<link href="css/main.css" type="text/css" rel="stylesheet" />
		<style type="text/css">
			body { font-family: "Tahoma", "Verdana", sans-serif; font-size: 12px; }
		</style>
		<script>
			$(function(){
				$('#my-form-builder').formbuilder({
					'save_url': 'example-save.php',
					'load_url': 'example-json.php',
					'useJson' : true
				});
				$(function() {
					$("#my-form-builder ul").sortable({ opacity: 0.6, cursor: 'move'});
				});
			});
		</script>
	</head>
	<body>
	<table cellpadding="0" cellspacing="0" align="center" width="100%;">
	  <tr>
		<td>				
			<?php include("header.php"); ?>
		</td>
	  </tr>
	  <tr>
	  	<td>
			<div class="mainbody">
				<div class="header">
					Select Your Controls
				</div>
			<div class="container-controls">
				<input type="hidden" id="form-style" value="<?php echo $_REQUEST['form-style'] ?>" />
				<input type="hidden" id="form-color" value="<?php echo $_REQUEST['form-color'] ?>" />
				<div id="my-form-builder">
				</div>
			</div>
		</td>
	  </tr>
		  <tr>
	  	<td>
			<div class="footer-container">
				<div class="footer">
					<div style="float:left;">
						@copyrights from developers of Acme Groups | 2014
					</div>
				</div>
			</div>
		</td>
	  </tr>
	</table>
	</body>

<!-- Mirrored from botsko.net/Demos/formbuilder/ by HTTrack Website Copier/3.x [XR&CO'2010], Mon, 17 Nov 2014 16:15:30 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
</html>