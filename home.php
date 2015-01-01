<!DOCTYPE html>
<html>
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta name="description" content="You can generate HTML5 & CSS3 form easily and you can download it for further process">
<meta name="keywords" content="html5 form generator,online html5 form,html5 and css3 forms,online html5 form generator,free online html form generator,online html5 and css3 form generator free,free html5 form generator,html5 form generator with css3,css3 and html5 form generator for free, free online form generator,free online form generator for html5 and css3,free html and css3 form designer,html5 and css3 form generator for free online">
<meta name="subject" content="Html form generator is an online Form Generator in HTML5 and CSS3. When you develop any HTML5 form design using a normal html and CSS it takes larger working time to develop it. So, we reduce the working time of a designer to designing an html form design and also to consume their working time with a neat designing work. We develop new software for designing html form with a time reducing complexity, with a neat design work is named as HTML5formgenerator. ">
<meta name="copyright" content="Acme Groups">
<meta name="author" content="Acme Groups,acmeinfotec@gmail.com">
<meta name="URL" content="www.html5formgenerator.com">
<meta name="identifier-URL" content="www.html5formgenerator.com">
<head>
		<title>HTML5 Form Generator</title>
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