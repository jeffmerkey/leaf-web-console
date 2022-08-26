<?php
/***************************************************************************
*
*   Copyright(c) Leaf Linux and Jeff V. Merkey 1997-2022.
*   All rights reserved.
*
*   Leaf PHP Web Console
*
**************************************************************************/
session_start();
include "config.php";

$show_label = true; // true = show label, false = don't show label.
$show_percent = true; // true = show percentage, false = don't show percentage.
$show_text = true; // true = show text, false = don't show text.
$show_parts = true; // true = show parts, false = don't show parts.
//$label_form = 'round'; // 'square' or 'round' label.
$label_form = 'square'; // 'square' or 'round' label.
$width = 270;
$background_color = 'FFFFFF'; // background-color of the chart...
$text_color = '000000'; // text-color.
$colors = array('003366','CCD6E0','7F99B2','F7EFC6', 
                'C6BE8C','CC6600','990000','520000',
                'BFBFC1','808080',
               ); 
$shadow_height = 16; // Height on shadow.
$shadow_dark = true; // true = darker shadow, false = lighter shadow...
$shape = 'circle'; // 'circle' or 'ellipse' 

$data = $_GET["data"];
$label = $_GET["label"];
$heading = $_GET["heading"];

if ($shape == 'ellipse')
   $height = $width/2;
else
   $height = $width;

$data = explode('*',$data);

if ($label != '') 
   $label = explode('*',$label);

$text_length = 0;
for ($i = 0; $i < count($label); $i++) 
{
	if ($data[$i]/array_sum($data) < 0.1) $number[$i] = ' '.number_format(($data[$i]/array_sum($data))*100,2,',','.').'%';
	else $number[$i] = number_format(($data[$i]/array_sum($data))*100,2,',','.').'%';
	if (strlen($label[$i]) > $text_length) $text_length = strlen($label[$i]);
}

if (is_array($label))
{
	$antal_label = count($label);
	$xtra = (5+15*$antal_label)-($height+ceil($shadow_height));
	if ($xtra > 0) 
		$xtra_height = (5+15*$antal_label)-($height+ceil($shadow_height));

	$xtra_width = 5;
	if ($show_label) $xtra_width += 20;
	if ($show_percent) $xtra_width += 45;
	if ($show_text) $xtra_width += $text_length * 8;
	if ($show_parts) $xtra_width += 130;
}

$xtra_height = 0;
if ($heading) 
	$xtra_height += 33;
$img = ImageCreateTrueColor(1200, $height+ceil($shadow_height)+$xtra_height);
//$img = ImageCreateTrueColor($width+$xtra_width, $height+ceil($shadow_height)+$xtra_height);

//imagecolortransparent($img,$background_color);
ImageFill($img, 0, 0, colorHex($img, $background_color));

foreach ($colors as $colorkode) 
{
	$fill_color[] = colorHex($img, $colorkode);
	$shadow_color[] = colorHexshadow($img, $colorkode, $shadow_dark);
}

$label_place = 25;
$font = '.'.$fontsdir.'FreeSans.ttf';

if (is_array($label))
{
	for ($i = 0; $i < count($label); $i++) 
	{
		if ($label_form == 'round' && $show_label)
		{
			imagefilledellipse($img,$width+60,$label_place+5,13,13,colorHex($img, $colors[$i % count($colors)]));
			imageellipse($img,$width+60,$label_place+5,13,13,colorHex($img, $text_color));
		}
		else if ($label_form == 'square' && $show_label)
		{	
			imagefilledrectangle($img,$width+47,$label_place,$width+65,$label_place+12,
                	                    colorHex($img, $colors[$i % count($colors)]));
			imagerectangle($img,$width+47,$label_place,$width+65,$label_place+12,
        	                             colorHex($img, $text_color));
		}

		if ($show_percent) $label_output = $number[$i].'  ';
	   	if ($show_text) $label_output = $label_output.$label[$i].'  ';
		if ($show_parts) $label_output = $label_output.$data[$i];

	        if (strlen($label_output) > 90) {
		        $label_output = substr($label_output, 0, 90);
                	$label_output .= '...';
	        }

		//imagestring($img,'4',$width+20,$label_place,$label_output,colorHex($img, $text_color));
	        imagettftext($img, 13, 0, $width+50+25,$label_place+12, colorHex($img, $text_color),$font,$label_output);
		$label_output = '';
		$label_place = $label_place + 17;
	}

	if ($heading) {
		//imagestring($img, '4', 20, $height+ceil($shadow_height)+10, $heading,colorHex($img, $text_color));
		imagettftext($img, 14, 0, ($width/2)-15, $height+ceil($shadow_height)+20, colorHex($img, $text_color), $font,
        	             $heading);
	}
	//strtoupper($heading));
}

$centerX = round($width/2) + 40;
$centerY = round($height/2) + 10;
$diameterX = $width-4;
$diameterY = $height-4;
$data_sum = array_sum($data);
$start = 270;
$value = $value_counter = 0;

for ($i = 0; $i < count($data); $i++) 
{
	$value += $data[$i];
	$end = ceil(($value/$data_sum)*360) + 270;
	$slice[] = array($start, $end, $shadow_color[$value_counter % count($shadow_color)], $fill_color[$value_counter % count($fill_color)]);
	$start = $end;
	$value_counter++;
}

if ($shape == 'ellipse') {
	for ($i=$centerY+$shadow_height; $i>$centerY; $i--) 
	{
		for ($j = 0; $j < count($slice); $j++)
		{
			ImageFilledArc($img, $centerX, $i, $diameterX, $diameterY, $slice[$j][0],
                                       $slice[$j][1], $slice[$j][2], IMG_ARC_PIE);
		}
	}	
}

for ($j = 0; $j < count($slice); $j++)
{
	ImageFilledArc($img, $centerX, $centerY, $diameterX, $diameterY, $slice[$j][0],
                       $slice[$j][1], $slice[$j][3], IMG_ARC_PIE);
}

OutputImage($img);
ImageDestroy($img);


function colorHex($img, $HexColorString) 
{
		$R = hexdec(substr($HexColorString, 0, 2));
		$G = hexdec(substr($HexColorString, 2, 2));
		$B = hexdec(substr($HexColorString, 4, 2));
		return ImageColorAllocate($img, $R, $G, $B);
}

function colorHexshadow($img, $HexColorString, $mork) 
{
	$R = hexdec(substr($HexColorString, 0, 2));
	$G = hexdec(substr($HexColorString, 2, 2));
	$B = hexdec(substr($HexColorString, 4, 2));

	if ($mork)
	{
		($R > 99) ? $R -= 100 : $R = 0;
		($G > 99) ? $G -= 100 : $G = 0;
		($B > 99) ? $B -= 100 : $B = 0;
	}
	else
	{
		($R < 220) ? $R += 35 : $R = 255;
		($G < 220) ? $G += 35 : $G = 255;
		($B < 220) ? $B += 35 : $B = 255;				
	}			
	
	return ImageColorAllocate($img, $R, $G, $B);
}

function OutputImage($img) 
{
	header('Content-type: image/jpeg');
	ImageJPEG($img,NULL,100);
}

?>

