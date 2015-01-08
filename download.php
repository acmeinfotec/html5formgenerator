
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>HTML5 Form Builder - Download</title>
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
				<div class="down-container">
					<div class="download-codingPart">
						<span>
							<?php

								$txt = file_get_contents($_COOKIE['fname']);
								$arr = str_split($txt);
								$space = '';

								for($i = 0; $i < strlen($txt); $i++){

									echo 'sss';

									if($arr[$i] == '<'){
										echo '&lt';
									}
									else if($arr1[$i] == ';'){
										$space .= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
										echo '&gt</br>'.$space.'';
									}else if($arr[$i] == ';'){
										echo $arr[$i].'<br />';

									}else
									{
										echo $arr[$i];
									}
								}
							?>
						</span>
					</div>
					<div class="download-part">
						<div>
							<input type="button" name="btnDownZip" id="btnDownZip" value="Download Zips"/>
							<label for="btnDownZip"> Size : 241 kb  </label>
						</div>
						<div>
							<input type="button" name="btnDownHtml" id="btnDownHtml" value="Download HTML"/>
							<label for="btnDownHtml"> Size : 317 kb  </label>
						</div>
						<div>
							<input type="button" name="btnCopyClip" id="btnCopyClip" value="Copy To ClipBoard"/>
						</div>
					</div>
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
