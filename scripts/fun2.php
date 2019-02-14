
<?php
	$img1 = $_SESSION["img1"];
	$img2 = $_SESSION["img2"];
?>
<?php
function neat_r($arr, $return = false) {
    $out = array();
    $oldtab = "    ";
    $newtab = "  ";
    $lines = explode("\n", print_r($arr, true));
    foreach ($lines as $line) {
        if (substr($line, -5) != "Array") {
            $line = preg_replace("/^(\s*)\[[0-9]+\] => /", "$1", $line, 1);
        }
        foreach (array("Array" => "", "[" => "", "]" => "", " =>" => ":",) as $old => $new) {
            $out = str_replace($old, $new, $out);
        }
        if (in_array(trim($line), array("Array", "(", ")", "")))
            continue;
        $indent = "\n";
        $indents = floor((substr_count($line, $oldtab) - 1) / 2);
        if ($indents > 0) {
            for ($i = 0; $i < $indents; $i++) {
                $indent .= $newtab;
            }
        }
        $out[] = $indent . trim($line);
    }
    $out = implode("<br/>", $out) . "\n";
    if ($return == true)
        return $out;
    echo $out;
}
function imageCompare($image1, $image2) {
    if (!$im = imagecreatefrompng($image1)) {
        echo("Image 1 could not be opened");
        exit();
    }
    if (!$im2 = imagecreatefrompng($image2)) {
        echo("Image 2 could not be opened");
        exit();
    }
    $OutOfSpec = 0;
    if (imagesx($im) <= imagesx($im2)) {
		$set_width=imagesx($im);
         }
	else
		$set_width=imagesx($im2);
    if (imagesy($im) <= imagesy($im2)) {
        $set_height=imagesy($im);
         }
	else
		$set_height=imagesy($im2);
    for ($width = 0; $width <= $set_width- 1; $width++) {
        for ($height = 0; $height <= $set_height - 1; $height++) {
            $rgb = imagecolorat($im, $width, $height);
            $r1 = ($rgb >> 16) & 0xFF;
            $g1 = ($rgb >> 8) & 0xFF;
            $b1 = $rgb & 0xFF;
            $rgb = imagecolorat($im2, $width, $height);
            $r2 = ($rgb >> 16) & 0xFF;
            $g2 = ($rgb >> 8) & 0xFF;
            $b2 = $rgb & 0xFF;
            if ($r1 != $r2)
                $OutOfSpec++;
            if ($g1 != $g2)
                $OutOfSpec++;
            if ($b1 != $b2)
                $OutOfSpec++;
        }
    }
	
    $TotalPixels = (imagesx($im) * imagesy($im)) * 3;
    $RET['Total Pixels'] = $TotalPixels;
	    $RET['Pixels Mismatched'] = $OutOfSpec;
    if ($TotalPixels != 0) {
        $PercentOut = ($OutOfSpec / $TotalPixels) * 100;
        $RET['Similarity Scale']=100-round($PercentOut);
        if($RET['Similarity Scale']==100)
            $RET['Match']='Perfect';
		else if($RET['Similarity Scale']>90)
            $RET['Match']='Very Good';
		else if($RET['Similarity Scale']>75)
            $RET['Match']='Good';
        else if($RET['Similarity Scale']>50)
            $RET['Match']='Average';
        else
            $RET['Match']='Poor';
    }
	if((imagesx($im) != imagesx($im2))||(imagesy($im) != imagesy($im2)))
	{
			$RET['NOTE']='The images are not of the same DIMENSIONS';
	}
    RETURN $RET;
}
?>
