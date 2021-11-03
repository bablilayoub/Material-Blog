<?php

// get data from database
$settings = getSettings($conn);

// get data from database
$sliderdata = getSliderStatus($conn);

// posts per page
$post_per_page = $settings['post_per_page'];
$result=($page-1)*$post_per_page;

// get theme name
$theme = $settings['theme'];

// post title
$site_title  = $settings['sitename'];

// get and website url
$geturl = $settings['url'];
$site_url = $settings['url'];