<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="description" content="You can generate HTML5 & CSS3 form easily and you can download it for further process">
<meta name="keywords" content="html5 form generator,online html5 form,html5 and css3 forms,online html5 form generator,free online html form generator,online html5 and css3 form generator free,free html5 form generator,html5 form generator with css3,css3 and html5 form generator for free, free online form generator,free online form generator for html5 and css3,free html and css3 form designer,html5 and css3 form generator for free online">
<meta name="subject" content="Html form generator is an online Form Generator in HTML5 and CSS3. When you develop any HTML5 form design using a normal html and CSS it takes larger working time to develop it. So, we reduce the working time of a designer to designing an html form design and also to consume their working time with a neat designing work. We develop new software for designing html form with a time reducing complexity, with a neat design work is named as HTML5formgenerator. ">
<meta name="copyright" content="Acme Groups">
<meta name="author" content="Acme Groups,acmeinfotec@gmail.com">
<meta name="URL" content="www.html5formgenerator.com">
<meta name="identifier-URL" content="www.html5formgenerator.com">
<title>HTML5 Form Generator</title>
<link href="css/main.css" type="text/css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" id="style-name" href="css/style/css-1.css" />
<link rel="stylesheet" type="text/css" id="color-name" href="css/color/Green.css" />
<script type="text/javascript" src="js/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">	

	var doChange = function(id){
		var oldvalue = document.getElementById(id+"lbl").innerHTML;
		document.getElementById(id+"lbl").innerHTML = document.getElementById(id).value;
		if(document.getElementById(id+"lbl").innerHTML == "")
		{
				document.getElementById(id+"lbl").innerHTML = oldvalue;
		}
	}

	function previewMe( imgId )
	{
		$(".preview-part-image > img").attr("src", imgId);
	}
	var me1 = "style1";
	function slideMe(me){
		if(me1 != me){
			if(me == "style1"){
				$("#color1").animate({'height':'10px'},1000);
				$("#"+me).animate({'height':'415px'},1000);
				$("#color1 .style-list").fadeOut(500);
				$("#style1 .style-list").fadeIn();
				$("#style1").animate({'margin-bottom':'20px'});
				$("#color1").animate({'margin-top':'0px'});
			}
			else{
				$("#style1").animate({'height':'10px'},1000);
				$("#style1").animate({'margin-bottom':'30px'});
				$("#style1 .style-list").fadeOut(500);
				$("#color1 .style-list").fadeIn();
				$("#color1").animate({'margin-top':'50px'});
				$("#"+me).animate({'height':'415px'},1000);
			}
			me1 = me;
		}
	}
	function changeStyle( s_no ){
		$("#style-name").attr('href','css/style/css-'+s_no+'.css');		
	}
	function changeColor( c_name ){
		$("#color-name").attr('href','css/color/'+c_name+'.css');		
	}
	
</script>
<style type="text/css">
	html, body{
		background-color: #fff;		
	}		
	input[type="text"]:active,input[type="text"]:focus,
	input[type="email"]:active,input[type="email"]:focus,
	input[type="number"]:active,input[type="number"]:focus,
	input[type="password"]:active,input[type="password"]:focus,
	input[type="search"]:active,input[type="search"]:focus,
	input[type="url"]:active,input[type="url"]:focus,
	input[type="date"]:active,input[type="date"]:focus,
	input[type="datetime"]:active,input[type="datetime"]:focus,
	input[type="datetime-local"]:active,input[type="datetime-local"]:focus,
	input[type="text"]:active,input[type="text"]:focus,
	input[type="month"]:active,input[type="month"]:focus,
	input[type="time"]:active,input[type="time"]:focus,
	input[type="week"]:active,input[type="week"]:focus,
	input[type="tel"]:active,input[type="tel"]:focus,
	input[type="color"]:active,input[type="color"]:focus,
	input[type="range"]:active,input[type="range"]:focus,
	input[list]:active,input[list]:focus,
	textarea:active,textarea:focus,
	select:active,select:focus{	
		outline:none;
		border:none;
	}
</style>
</head>

<body>
	<table cellpadding="0" cellspacing="0" align="center" width="100%">
		<tr>
			<td>			
			<?php include("header.php"); ?>
			</td>
	  	</tr>
		<tr>
			<td>
				<div class="mainbody">
					<table cellpadding="0" cellspacing="0" align="center" width="100%">
					  <tr>
						<td><div class="header">Select Your Style</div></td>
					  </tr>
					 </table>
					 <table cellpadding="0" cellspacing="0" align="center" width="100%">
					  <tr>
						<td width="30%" valign="top">
                        <form method="post" action="home.php">
                          <div style="margin-top:40px;" >
                              <div class="selection-part" onclick="slideMe(this.id)" id="style1">
                                <div class="style-list-title"> List of Styles </div>
                                <ul class="style-list">
                                    <li>
                                        <input type="radio" class="radioc" id="form-style1" name="form-style" value='1' checked="checked" > 
                                        <label for="form-style1" onclick="changeStyle(1)">Flip Label</label>
                                        <a class="radio" ><i class="dot">.</i></a>
                                    </li>                                   
                                    <li>
                                        <input type="radio" class="radioc" id="form-style2" name="form-style" value='2' > 
                                        <label for="form-style2" onclick="changeStyle(2)">Balloon Label</label>
                                        <a class="radio" ><i class="dot">.</i></a>
                                    </li>                                   
                                    <li>
                                        <input type="radio" class="radioc" id="form-style3" name="form-style" value='3' > 
                                        <label for="form-style3" onclick="changeStyle(3)">Basic Slide Label</label>
                                        <a class="radio" ><i class="dot">.</i></a>
                                    </li>                                                      
                                    <li>
                                        <input type="radio" class="radioc" id="form-style4" name="form-style" value='4' > 
                                        <label for="form-style4" onclick="changeStyle(4)">Card Slide Label</label>
                                        <a class="radio" ><i class="dot">.</i></a>
                                    </li>                                 
                                    <li>
                                        <input type="radio" class="radioc" id="form-style5" name="form-style" value='5' > 
                                        <label for="form-style5" onclick="changeStyle(5)">Book Flip Label</label>
                                        <a class="radio" ><i class="dot">.</i></a>
                                    </li>                            
                                    <li>
                                        <input type="radio" class="radioc" id="form-style6" name="form-style" value='6' > 
                                        <label for="form-style6" onclick="changeStyle(6)">Top Flip Label</label>
                                        <a class="radio" ><i class="dot">.</i></a>
                                    </li>                            
                                    <li>
                                        <input type="radio" class="radioc" id="form-style7" name="form-style" value='7' > 
                                        <label for="form-style7" onclick="changeStyle(7)">Bottom Flip Label</label>
                                        <a class="radio" ><i class="dot">.</i></a>
                                    </li>                
                                    <li>
                                        <input type="radio" class="radioc" id="form-style8" name="form-style" value='8' > 
                                        <label for="form-style8" onclick="changeStyle(8)">Rotation Label</label>
                                        <a class="radio" ><i class="dot">.</i></a>
                                    </li>                
                                    <li>
                                        <input type="radio" class="radioc" id="form-style9" name="form-style" value='9' > 
                                        <label for="form-style9" onclick="changeStyle(9)">Shirnk Label</label>
                                        <a class="radio" ><i class="dot">.</i></a>
                                    </li>                
                                    <li>
                                        <input type="radio" class="radioc" id="form-style10" name="form-style" value='10' > 
                                        <label for="form-style10" onclick="changeStyle(10)">Slide Left Label</label>
                                        <a class="radio" ><i class="dot">.</i></a>
                                    </li>                
                                    <li>
                                        <input type="radio" class="radioc" id="form-style11" name="form-style" value='11' > 
                                        <label for="form-style11" onclick="changeStyle(11)">Slide Up Label</label>
                                        <a class="radio" ><i class="dot">.</i></a>
                                    </li>                
                                </ul>
                              </div>
                              <div class="selection-part" onclick="slideMe(this.id)" id="color1">
                                <div class="style-list-title"> List of Colours </div>
                                <ul class="style-list">
                                    <li>
                                        <input type="radio" class="radioc" id="form-color1" name="form-color" value='Green' checked="checked"> 
                                        <label for="form-color1" onclick="changeColor('Green')" > Green </label>
                                        <a class="radio" ><i class="dot">.</i></a>
                                    </li>
                                    <li>
                                        <input type="radio" class="radioc" id="form-color2" name="form-color" value='Red' > 
                                        <label for="form-color2" onclick="changeColor('Red')" > Red </label>
                                        <a class="radio" ><i class="dot">.</i></a>
                                    </li>
                                    <li>
                                        <input type="radio" class="radioc" id="form-color3" name="form-color" value='Blue' > 
                                        <label for="form-color3" onclick="changeColor('Blue')" > Blue </label>
                                        <a class="radio" ><i class="dot">.</i></a>
                                    </li>
                                    <li>
                                        <input type="radio" class="radioc" id="form-color4" name="form-color" value='Pink' > 
                                        <label for="form-color4" onclick="changeColor('Pink')" > Pink </label>
                                        <a class="radio" ><i class="dot">.</i></a>
                                    </li>
                                    <li>
                                        <input type="radio" class="radioc" id="form-color5" name="form-color" value='Cyan' > 
                                        <label for="form-color5" onclick="changeColor('Cyan')" > Cyan </label>
                                        <a class="radio" ><i class="dot">.</i></a>
                                    </li>
                                    <li>
                                        <input type="radio" class="radioc" id="form-color6" name="form-color" value='Purple' > 
                                        <label for="form-color6" onclick="changeColor('Purple')" > Purple </label>
                                        <a class="radio" ><i class="dot">.</i></a>
                                    </li>
                                    <li>
                                        <input type="radio" class="radioc" id="form-color7" name="form-color" value='Yellow' > 
                                        <label for="form-color7" onclick="changeColor('Yellow')" > Yellow </label>
                                        <a class="radio" ><i class="dot">.</i></a>
                                    </li>
                                    <li>
                                        <input type="radio" class="radioc" id="form-color8" name="form-color" value='DarkGreen' > 
                                        <label for="form-color8" onclick="changeColor('DarkGreen')" > DarkGreen </label>
                                        <a class="radio" ><i class="dot">.</i></a>
                                    </li>
                                    <li>
                                        <input type="radio" class="radioc" id="form-color9" name="form-color" value='DarkBlue' > 
                                        <label for="form-color9" onclick="changeColor('DarkBlue')" > DarkBlue </label>
                                        <a class="radio" ><i class="dot">.</i></a>
                                    </li>
                                </ul>
                              </div>
                        </div>
                        <div class="btn-next-container">
                            <input type="submit" name="submit" id="submit" style="padding:0;font-size:13px;" class="btn-next" value="Next" />
                        </div>
                       </form>
						 </td>
						 <td width="70%" valign="top">
						 	<div class="preview-part">
								<table cellpadding="0" cellspacing="0" align="center" width="100%">
									<tr>
										<td width="4%">
											<div class="preview-part-title">
												<div>Preview</div>
											</div>
										</td>
										<td>
											<div class="preview-part-image" style="padding-top:20px;"> 
                                            	<table cellpadding="0" cellspacing="0" align="center">
                                                <tr>
                                                	<td>
                                                        <div class="row"> 
                                                            <span>
                                                                <input id="uname" type="text" placeholder="UserName" />
                                                                <label for="uname">UserName</label>
                                                            </span>
                                                        </div>  
                                                    </td>
                                                    <td>
                                                        <div class="row"> 
                                                            <span>
                                                            <input id="range" type="range" name="points" min="1" max="10" placeholder="TelePhone" required="required" />
                                                            <label for="range">Range</label>
                                                            </span>
                                                        </div>  
                                                    </td>
                                                </tr>
                                                <tr>
                                                	<td>
                                                       <div class="row">
                                                          <span>
                                                            <select name="select" id="select" placeholder="Qualification" >
                                                              <option>M.Phil</option>
                                                              <option>M.Sc</option>
                                                              <option>B.Sc</option>
                                                            </select>
                                                            <label for="select" >Qualification</label>
                                                            </span> </div>
                                                       </td>
                                                       <td rowspan="2">
                                                        <div class="row"> 
                                                            <span>
                                                                <textarea name="txtarea" id="txtarea" placeholder="Address" ></textarea>
                                                                <label for="txtarea" >Address</label>
                                                            </span>
                                                        </div>  
                                                    </td>
                                                </tr>
                                                <tr>
                                                	<td>
                                                          <div class='row'><span>
                                                            <a class='checkbox' name="check1" id="check1">
                                                              <input type='checkbox' class='chkbx' id='Q1' name='Qualification1' value='UG'  >
                                                              <label for="Q1">Tamil</label>
                                                              <input type='checkbox' class='chkbx' id='Q2' name='Qualification1' value='PG'  >
                                                              <label for="Q2">Hindi</label>
                                                              <input type='checkbox' class='chkbx' id='Q3' name='Qualification1' value='PG'  >
                                                              <label for="Q3">English</label>
                                                              <label for='Q3' class='lbl'>Language</label>
                                                            </a>
                                                            </span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                	<td>
                                                          <div class='row'><span>
                                                                <a class="file">
                                                                    <input id="file1" type="file" onchange="doChange(this.id)" placeholder="File Upload" required="required" />
                                                                    <label for="file1" class="lblfile"  id="file1lbl" style="background:#efefe;">Choose your file</label>
                                                                    <label for="file1">File Upload</label>
                                                                </a>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="row"> 
                                                            <span>
                                                                <input id="date" type="date" name="date" placeholder="Date" />
                                                                <label for="date">Date</label>
                                                            </span>
                                                        </div>  
                                                    </td>
                                                </tr>
                                                <tr>
                                                	<td>
                                                          <div class='row'>
                                                          	<span>                                                            
																<button> Button </button><input type="reset" value="Reset" /><input type="submit" name="submit" value="Submit" />
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="row"> 
                                                            <span>
                                                                <a class='radio' name="radio1" id="radio1" >
                                                                  <input type='radio' class='chkbx' id='m1' name='Gender' value='Male' >
                                                                  <label for="m1">Male</label>
                                                                  <input type='radio' class='chkbx' id='f1' name='Gender' value='Female' >
                                                                  <label for="f1">Female</label>
                                                                  <label for='f1' class='lbl'>Gender</label>
                                                                </a>
                                                            </span>
                                                        </div>  
                                                    </td>
                                                </tr>
                                              </table>
                                            </div>
										</td>
                                       </form>
									</tr>									
								</table>
							</div>
						 </td>
					  </tr>
					</table>
			  </div>
			 </td>
		  </tr>
		  <tr>
	  	<td>
			<div class="footer" >
				<div style="float:left;">
					@copyrights from developers of <a href="http://www.acmeinfotec.com" style="color:#333; text-decoration:none; font-weight:bold;"> Acme Groups </a> | 2014
				</div>
			</div>
		</td>
	  </tr>
	</table>
</body>
</html>