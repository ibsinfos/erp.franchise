<style>

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/*
 * CometChat 
 * Copyright (c) 2014 Inscripts - support@cometchat.com | http://www.cometchat.com | http://www.inscripts.com
*/

html, body, div, span, applet, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
a, abbr, acronym, address, big, cite, code,
del, dfn, em, font, img, ins, kbd, q, s, samp,
small, strike, strong, sub, sup, tt, var,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td {
	margin: 0;
	padding: 0;
	border: 0;
	outline: 0;
	font-weight: inherit;
	font-style: inherit;
	font-size: 100%;
	font-family: inherit;
	vertical-align: baseline;
}

html, body {
	background: <?php echo $themeSettings['tab_background'];?>;
	height: 100%;
	overflow: hidden;
}

.container {
	width: 100%;
	margin: 0 auto;
}

.container_title {
	background-color: <?php echo $themeSettings['tab_title_background'];?> !important;
	filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='<?php echo $themeSettings['tab_title_gradient_start'];?>', endColorstr='<?php echo $themeSettings['tab_title_gradient_end'];?>');
	background: -webkit-gradient(linear, left top, left bottom, from(<?php echo $themeSettings['tab_title_gradient_start'];?>), to(<?php echo $themeSettings['tab_title_gradient_end'];?>));
	background: -moz-linear-gradient(top, <?php echo $themeSettings['tab_title_gradient_start'];?>, <?php echo $themeSettings['tab_title_gradient_end'];?>);
	background: -ms-linear-gradient(top, <?php echo $themeSettings['tab_title_gradient_start'];?>, <?php echo $themeSettings['tab_title_gradient_end'];?>);
	background: -o-linear-gradient(top, <?php echo $themeSettings['tab_title_gradient_start'];?>, <?php echo $themeSettings['tab_title_gradient_end'];?>);
	border-left: 1px solid <?php echo $themeSettings['tab_title_border'];?>;
	border-right: 1px solid <?php echo $themeSettings['tab_title_border'];?>;
	border-top: 1px solid <?php echo $themeSettings['tab_title_border'];?>;
	color: <?php echo $themeSettings['tab_title_color'];?>;
	font-family: <?php echo $themeSettings['tab_title_font_family'];?>;
	font-size: <?php echo $themeSettings['tab_title_font_size_large'];?>;
	padding:5px;
	font-weight:bold;
	padding-left:10px;
	padding-bottom:6px;
	text-shadow: 1px 1px 0 <?php echo $themeSettings['tab_title_text_background'];?>;
}

.container_body {
	overflow-y: scroll;
	overflow-x: hidden;
	height: 243px !important;
	background-color: <?php echo $themeSettings['tab_background'];?>;
}

.cometchat_smiley {
	cursor: pointer;
	  float: left;
}

.container_body.embed {
	border: 0px;
	padding: 0px !important;
}

.container_title.embed {
	display: none;
}

.tab {
	float: left;
	background: #EEEEEE;
	color: #333333;
	text-align: center;
	cursor: pointer;
	moz-box-shadow: inset -1px 0px 0px 0px rgba(192, 184, 184, 0.24);
	-webkit-box-shadow: inset -1px 0px 0px 0px rgba(192, 184, 184, 0.24);
	box-shadow: inset -1px 0px 0px 0px rgba(192, 184, 184, 0.24);
	border-right: 1px solid rgba(29, 27, 27, 0.50);
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
	height: 26px;
	width: 16.6666%;
	border-bottom: 1px solid #CCCCCC;
}

.tab h2 {
	line-height: 26px;
	font-family: "Lucida Grande",arial,sans-serif;
	font-size: 13px;
}

.tab:last-child {
	border-right: none;
}

.selected {
	border-right: 1px solid rgba(255, 255, 255, 0.2);
	moz-box-shadow: inset 0 0 131px 0 rgba(0, 0, 0, 0.4);
	-webkit-box-shadow: inset 0 0 131px 0 rgba(0, 0, 0, 0.4);
	box-shadow: inset 0 0 131px 0 rgba(0, 0, 0, 0.4);
	border-right: 1px solid #CCCCCC;
}

.selected  h2 {
	background: white;
	font-weight: bold;
}

.emojis {
	display: none;
        <?php if($rtl) :?>
        padding: 5px 0 0 15px; 
        <?php else :?>
	padding: 5px 0 0 5px;
        <?php endif;?>
}

.emoji_selected {		
	display: block !important;
}

.emojis div {
	cursor:pointer;
	margin: 3px;
	float: left;
}

#tabs {
	width: 100%;
	float: left;
}

.container_body {
	height: 100%;
	width: 100% !important;
	background: #FFFFFF;
}

.slimScrollDiv {
	float: left;
}

</style>