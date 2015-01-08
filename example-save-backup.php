<?php 
	
	session_start();
	
	$a = $_REQUEST['frmb'];
	$outStr = "";
	$size = count( $a );
	$style = $a [ $size - 1 ][ 'style_number' ];
	$styles = file_get_contents("css/css-".$style.".css");
	
	$outStr .= "<html> <head> <style> ".$styles."</style></head> ";
	$outStr .= "<body> <form> <table cellpadding='15' cellspacing='0' align=center border='0'>";
	$outStr .= "<tr><td><div class='frm-header'>Your Site</div></td></tr></table><table cellpadding='15' cellspacing='0' align=center border='0'>";
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
					$outStr .= "<tr><td valign='top'><label class='lbl'>". $title ."</label></td><td  valign='top'><input type='text' class='txtbx' id='". $title ."' name='". $title ."' ". $req ." /></td></tr>";	
					break;
			case "textarea" :
					$outStr .= "<tr><td  valign='top'><label class='lbl'>". $title ."</label></td><td  valign='top'><textarea class='txtarea' id='". $title ."' name='". $title ."' ". $req ." ></textarea></td></tr>";
					break;
			case "checkbox" :
					$c = count($a[$i]['values']);
					$outStr .= "<tr><td  valign='top'><label class='lbl'>". $title ."</label></td><td  valign='top'>";
					for( $j = 2; $j < ( $c + 2 ); $j ++)
					{
						$subVal = $a[$i]['values'][$j]['value'];
						$subBase = $a[$i]['values'][$j]['baseline'];
						if($subBase == "true")
							$subBase = ' checked';
						else 
							$subBase = '';
						$outStr .= "<input type='checkbox' class='chkbx' id='". $title ."' name='". $title ."' value='". $subVal ."'". $subBase ." ". $req ." > ". $subVal ."  ";
					}					
					$outStr .= "</td></tr>";
					break;			
			case "radio" :
					$c = count($a[$i]['values']);
					$outStr .= "<tr><td  valign='top'><label class='lbl'>". $title ."</label></td><td  valign='top'>";
					for( $j = 2; $j < ( $c + 2 ); $j ++)
					{
						$subVal = $a[$i]['values'][$j]['value'];
						$subBase = $a[$i]['values'][$j]['baseline'];
						if($subBase == "true")
							$subBase = ' checked';
						else 
							$subBase = '';
						$outStr .= "<input type='radio' class='chkbx' id='". $title ."' name='". $title ."' value='". $subVal ."'". $subBase ." ". $req ." > ". $subVal ."  ";
					}		
					$outStr .= "</td></tr>";
					break;
			case "select" :
					$multi = $a[$i]['multiple'];				
						if($multi == "true")
							$multi = ' multiple';
						else
							$multi = '';
					$outStr .= "<tr><td  valign='top'><label class='lbl'>". $title ."</label></td><td  valign='top'><select class='select' id='". $title ."' name='". $title ."'". $multi ." ". $req ." >";
					$c = count($a[$i]['values']);
					for( $j = 2; $j < ( $c + 2 ); $j ++)
					{
						$subVal = $a[$i]['values'][$j]['value'];
						$subBase = $a[$i]['values'][$j]['baseline'];
						$outStr .= "<label class='lbl'>". $title ."</label><option value='". $subVal ."' selected='". $subBase ."'> ". $subVal ." </option> ";
					}		
					$outStr .= "</select> </td></tr>";
					break;					
		} 	
		
	}
	
	$outStr .= "<tr><td/><td  valign='top'><input type='submit' name='' value='Submit' /></td></tr>";
	$outStr .= "</table></form> </body> </html>";
	
	$filename = "downloads/output/Formbuilder_".date("dmY")."_".time().".html";

	setcookie("fname",$filename,time()+1800,"/");

	$_COOKIE['fname'] = $filename;
	
	file_put_contents( $_COOKIE['fname'], $outStr );
?> 
