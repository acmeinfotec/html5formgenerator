
<?php 
	
	session_start();
	
	$a = $_REQUEST['frmb'];
	$outStr = "";
	$size = count( $a );
	$style_no = $a [ $size - 1 ][ 'style_number' ];
	$color_name = $a [ $size - 1 ][ 'color_name' ];
	$styles = file_get_contents("css/style/html5-form-generator-style-".$style_no.".css");
	$styles .= file_get_contents("css/color/html5-form-generator-color-".$color_name.".css");
	$getJs = file_get_contents('js/style.js');
	
	file_put_contents( "myfile.txt", $color_no );
	
	$outStr .= "<html> <head> <style> ".$styles."</style><script>".$getJs."</script></head> ";
	$outStr .= "<body> <form><h1>HTML5 Form Generator</h1>";
//	$outStr .= " <table cellpadding='15' cellspacing='0' align=center border='0'>";
//	$outStr .= "<tr><td><div class='frm-header'>Your Site</div></td></tr></table><table cellpadding='15' cellspacing='0' align=center border='0'>";
	for($i = -1; $i < (count( $a )- 1 );$i ++)
	{
	 	$type = $a[$i]['cssClass'];
		
		$req =  $a[$i]['required'];
			if($req)
				$req = 'required';
			else
				$req = '';
				
		$title = $a[$i]['title'];
		
		switch ( $type )
		{
			case "input_text" :
					$outStr .= "<div class='row'><span><input type='text' class='txtbx' id='". $title ."' name='". $title ."' placeholder='".$title."' ". $req ." /><label for='".$title."'>".$title."</label></span></div>";
					break;
			case "button" :
					$outStr .= "<div class='row'><span><input type='button' class='button' id='". $title ."' name='". $title."' value='".$title ."' /></span></div>";
					break;
			case "color" :
					$outStr .= "<div class='row'><span><a class='color'><input type='color' class='color' id='". $title ."' name='". $title ."' placeholder='".$title."' ". $req ." /><label for='".$title."'>".$title."</label></a></span></div>";
					break;
			case "date" :
					$outStr .= "<div class='row'><span><input type='date' class='date' id='". $title ."' name='". $title ."' placeholder='".$title."' ". $req ." /><label for='".$title."'>".$title."</label></span></div>";
					break;
			case "datetime" :
					$outStr .= "<div class='row'><span><input type='datetime' class='datetime' id='". $title ."' name='". $title ."' placeholder='".$title."' ". $req ." /><label for='".$title."'>".$title."</label></span></div>";
					break;
			case "datetime-local" :
					$outStr .= "<div class='row'><span><input type='datetime-local' class='datetime-local' id='". $title ."' name='". $title ."' placeholder='".$title."' ". $req ." /><label for='".$title."'>".$title."</label></span></div>";
					break;
			case "email" :
					$outStr .= "<div class='row'><span><input type='email' class='email' id='". $title ."' name='". $title ."' placeholder='".$title."' ". $req ." /><label for='".$title."'>".$title."</label></span></div>";
					break;
			case "month" :
					$outStr .= "<div class='row'><span><input type='month' class='month' id='". $title ."' name='". $title ."' placeholder='".$title."' ". $req ." /><label for='".$title."'>".$title."</label></span></div>";
					break;
			case "number" :
					$outStr .= "<div class='row'><span><input type='number' class='number' id='". $title ."' name='". $title ."' placeholder='".$title."' ". $req ." /><label for='".$title."'>".$title."</label></span></div>";
					break;
			case "range" :
					$outStr .= "<div class='row'><span><input type='range' class='range' id='". $title ."' name='". $title ."' placeholder='".$title."' ". $req ." /><label for='".$title."'>".$title."</label></span></div>";
					break;
			case "search" :
					$outStr .= "<div class='row'><span><input type='search' class='search' id='". $title ."' name='". $title ."' placeholder='".$title."' ". $req ." /><label for='".$title."'>".$title."</label></span></div>";
					break;
			case "tel" :
					$outStr .= "<div class='row'><span><input type='tel' class='tel' id='". $title ."' name='". $title ."' placeholder='".$title."' ". $req ." /><label for='".$title."'>".$title."</label></span></div>";
					break;
			case "time" :
					$outStr .= "<div class='row'><span><input type='time' class='time' id='". $title ."' name='". $title ."' placeholder='".$title."' ". $req ." /><label for='".$title."'>".$title."</label></span></div>";
					break;
			case "url" :
					$outStr .= "<div class='row'><span><input type='url' class='url' id='". $title ."' name='". $title ."' placeholder='".$title."' ". $req ." /><label for='".$title."'>".$title."</label></span></div>";
					break;
			case "week" :
					$outStr .= "<div class='row'><span><input type='week' class='week' id='". $title ."' name='". $title ."' placeholder='".$title."' ". $req ." /><label for='".$title."'>".$title."</label></span></div>";
					break;
			case "file" :
					$outStr .= "<div class='row'><span><a class='file'><input type='file' class='file' onchange='doChange(this.id)' id='". $title ."' name='". $title ."' placeholder='".$title."' ". $req ." /><label for='".$title."' class='lblfile' id='".$title."lbl' >Choose File </label><label for='".$title."'>".$title."</label></a></span></div>";
					break;
			case "password" :
					$outStr .= "<div class='row'><span><input type='password' class='password' id='". $title ."' name='". $title ."' placeholder='".$title."' ". $req ." /><label for='".$title."'>".$title."</label></span></div>";
					break;
			case "reset" :
					$outStr .= "<div class='row'><span><input type='reset' class='reset' id='". $title ."' name='". $title ."' value='". $title ."' /></span></div>";
					break;
			case "submit" :
					$outStr .= "<div class='row'><span><input type='submit' class='submit' id='". $title ."' name='". $title ."' value='". $title ."' /></span></div>";
					break;
			case "textarea" :
					$outStr .= "<div class='row'><span><textarea class='txtarea' id='". $title ."' name='". $title ."' placeholder='".$title."' ". $req ." ></textarea><label for='". $title."'>". $title ."</label></span></div>";
					break;
			case "checkbox" :
					$c = count($a[$i]['values']);
					$outStr .= "<div class='row'><span><a class='checkbox'>";
					for( $j = 2; $j < ( $c + 2 ); $j ++)
					{
						$subVal = $a[$i]['values'][$j]['value'];
						$subBase = $a[$i]['values'][$j]['baseline'];
						if($subBase == "true")
							$subBase = ' checked';
						else 
							$subBase = '';
						$k = $j - 1;
						$outStr .= "<input type='checkbox' class='chkbx' id='". $title ."".$k."' name='". $title ."' value='". $subVal ."'". $subBase ." ". $req ." ><label for='". $title ."".$k."'>". $subVal ."</label>";
					}					
					$outStr .= "<label for='". $title ."".$k."' class='lbl'>". $title ."</label></a></span></div>";
					break;			
			case "radio" :
					$c = count($a[$i]['values']);
					$outStr .= "<div class='row'><span><a class='radio'>";
					for( $j = 2; $j < ( $c + 2 ); $j ++)
					{
						$subVal = $a[$i]['values'][$j]['value'];
						$subBase = $a[$i]['values'][$j]['baseline'];
						if($subBase == "true")
							$subBase = ' checked';
						else 
							$subBase = '';
						$k = $j - 1;
						$outStr .= "<input type='radio' class='chkbx' id='". $title ."".$k."' name='". $title ."' value='". $subVal ."'". $subBase ." ". $req ." ><label for='". $title ."".$k."'>". $subVal ."</label>";
					}		
					$outStr .= "<label for='". $title ."".$k."' class='lbl'>". $title ."</label></a></span></div>";
					break;
			case "select" :
					$multi = $a[$i]['multiple'];				
						if($multi == "true")
							$multi = ' multiple';
						else
							$multi = '';
					$outStr .= "<div class='row'><span><select class='select' id='". $title ."' name='". $title ."'". $multi ." ". $req .">";
					$c = count($a[$i]['values']);
					for( $j = 2; $j < ( $c + 2 ); $j ++)
					{
						$subVal = $a[$i]['values'][$j]['value'];
						$subBase = $a[$i]['values'][$j]['baseline'];
						$outStr .= "<option value='". $subVal ."' selected='". $subBase ."'> ". $subVal ." </option> ";
					}		
					$outStr .= "</select><label for='".$title."' class='lbl'>". $title ."</label></span></div>";
					break;
			case "data_list" :
					$multi = $a[$i]['multiple'];				
						if($multi == "true")
							$multi = ' multiple';
						else
							$multi = '';
					$outStr .= "<div class='row'><span><input list='".$title."list' class='data_list' id='". $title ."' name='". $title ."'". $multi ." ". $req ."><datalist id='".$title."list'>";
					$c = count($a[$i]['values']);
					for( $j = 2; $j < ( $c + 2 ); $j ++)
					{
						$subVal = $a[$i]['values'][$j]['value'];
						$subBase = $a[$i]['values'][$j]['baseline'];
						$outStr .= "<option value='". $subVal ."' selected='". $subBase ."'> ". $subVal ." </option> ";
					}		
					$outStr .= "</datalist><label for='".$title."' class='lbl'>". $title ."</label></span></div>";
					break;					
		} 	
		
	}
	
//	$outStr .= "<tr><td/><td  valign='top'><input type='submit' name='' value='Submit' /></td></tr>";
//	$outStr .= "</table></form> </body> </html>";
	$outStr .= "<div class='row'><span><input type='submit' name='submit' value='Submit' /></span></div></body></table>";
	
	$filename = "downloads/output/HTML5FormGenerator".date("dmY")."_".time().".html";

	file_put_contents( $filename, $outStr );

	setcookie("fname",$filename,time()+1800,"/");


//	file_put_contents( "myfile.txt", $outStr );
?> 
