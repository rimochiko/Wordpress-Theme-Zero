<?php
    $option = get_option('mochi_theme_options');

    if($option['is_cat_use']==0)
    {
		include(TEMPLATEPATH . '/ca-article.php');
		exit;    	
    }

    $mix_ca = explode(',', $option['use_mix_m']);
    $pic_ca = explode(',', $option['use_pic_m']);

    //整型处理
    foreach ($mix_ca as $key) {
    	if($mix_ca[$key]=='')
    		unset($mix_ca[$key]);
    	$mix_ca[$key] = (int)$mix_ca[$key];	
    }

    foreach ($pic_ca as $key) {
    	if($pic_ca[$key]=='')
    		unset($mix_ca[$key]);
    	$pic_ca[$key] = (int)$pic_ca[$key];
    }

	if (is_category($mix_ca)) {
		include(TEMPLATEPATH . '/ca-mix.php');
	}
	else {
		if ( is_category($pic_ca) ) {
			include(TEMPLATEPATH . '/ca-photo.php');
		} 
		else {
			include(TEMPLATEPATH . '/ca-article.php');
		}
	}
?>