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
	$r1=0;
	$b1=0;
	$g1=0;
	$r2=0;
	$b2=0;
	$g2=0;
    if (imagesx($im) != imagesx($im2)) {
        echo("Width does not match.");
       // exit();
    }
    if (imagesy($im) != imagesy($im2)) {
        echo("Height does not match.");
     //   exit();
    }
    for ($width = 0; $width <= imagesx($im) - 1; $width++) {
        for ($height = 0; $height <= imagesy($im) - 1; $height++) {
            $rgb = imagecolorat($im, $width, $height);
            $r1 += ($rgb >> 16) & 0xFF;
			//$red1=$red1+$r1;
            $g1 += ($rgb >> 8) & 0xFF;
			//$grn1++;
            $b1 += $rgb & 0xFF;
			//$blu1++;
            $rgb = imagecolorat($im2, $width, $height);
            $r2 += ($rgb >> 16) & 0xFF;
			//$red2++;
            $g2 += ($rgb >> 8) & 0xFF;
			//$grn2++;
            $b2 += $rgb & 0xFF;
			//$blu2++;
            /*if ($r1 != $r2)
                $OutOfSpec++;
            if ($g1 != $g2)
                $OutOfSpec++;
            if ($b1 != $b2)
                $OutOfSpec++;*/
        }
    }
	
	/*$r1=($r1)/($r1+$b1+$g1);
	$b1=($b1)/($r1+$b1+$g1);
	$g1=($g1)/($r1+$b1+$g1);
	$r2=($r2)/($r2+$b2+$g2);
	$b2=($b2)/($r2+$b2+$g2);
	$g2=($g2)/($r2+$b2+$g2);*/
	$red=abs($r1-$r2);
	$blu=abs($b1-$b2);
	$grn=abs($g1-$g2);
	//echo "$red $blu $grn";
	$red=($red)/($red+$blu+$grn);
	$blu=($blu)/($red+$blu+$grn);
	$grn=($grn)/($red+$blu+$grn);
	echo "$red $blu $grn";
	//$tot=($red+$blu+$grn)/3;
	//echo $tot;
	//die;
    $TotalPixels = (imagesx($im) * imagesy($im)) * 3;
    $RET['TotalPixels'] = $TotalPixels;
    $RET['PixelsOutOfSpec'] = $OutOfSpec;
    if ($TotalPixels != 0) {
        $PercentOut = ($OutOfSpec / $TotalPixels) * 100;
        $RET['SimilarityScale']=100-round($PercentOut);
        if($RET['SimilarityScale']>90)
            $RET['Match']='Very Good';
		else if($RET['SimilarityScale']>75)
            $RET['Match']='Good';
        else if($RET['SimilarityScale']>50)
            $RET['Match']='Average';
        else
            $RET['Match']='Poor';
    }
    RETURN $RET;
}
?>