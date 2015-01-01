<?php session_start() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>HTML5 Form Generator - Download</title>
<link href="css/main.css" type="text/css" rel="stylesheet" />
</head>

<body>
	<table cellpadding="0" cellspacing="0" align="center" width="100%" >
	 <tr>
		<td>			
			<?php include("header.php"); ?>
		</td>
	  </tr>
	  <tr>
	  	<td>
			<div class="mainbody">
				<div class="header">
					Download Here
				</div>
		 	</div>
		</td>
		</tr>		
		<tr>
			<td>
				<div>
					<table cellpadding="30" cellspacing="0" align="center">
						<tr>
							<td>
								<div align="center" class="down-container">
									<a href="downloadit.php" name="download" id="download" class="download" >Download</a>
									<div class="file-details">
										<div>Size : <?php 
													$fsize = filesize( $_SESSION['fname']);
													$fsize /= 1000;
													$fsize += " kb";
													echo $fsize;
										
											 ?> kb <span class="fdate">Date : <?php echo date('d-m-Y'); ?></span>
										</div>
										<!--<div>Type : HTML</div>-->
									</div>
								</div>								
							</td>
						</tr>
						<tr>
							<td>
								<div>
									<a href="selection.php" class="btnagain" >Create Again</a>
								</div>
							</td>
						</tr>
					</table>
				</div>
			</td>
		</tr>
		  <tr>
	  	<td>
			<div class="footer">
				<div style="float:left;">
					@copyrights from developers of Acme Groups | 2014  
				</div>
			</div>
		</td>
	  </tr>
	</table>
</body>
</html>
