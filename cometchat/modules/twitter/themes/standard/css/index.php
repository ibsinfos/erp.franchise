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
	overflow: hidden;
	background: <?php echo $themeSettings['tab_background'];?>;
	direction: <?php echo $dir;?>;
	height:100%;
}

ul {
  float: left;
  margin: 0;
  padding: 0;
  list-style: none;
}

li {
  float: left;
  margin: 0;
  padding: 10px;
} 

.container {
	font-weight: normal;
	font-family: <?php echo $themeSettings['tab_font_family'];?>;
	font-size: <?php echo $themeSettings['tab_font_size'];?>;
	color: <?php echo $themeSettings['tab_color'];?>;
	padding: 0px;
	height:100%;
}

.container a {
	color: <?php echo $themeSettings['tab_link_color'];?>;
}

small {
	color: <?php echo $themeSettings['tab_color_self'];?>;
	font-size: <?php echo $themeSettings['tab_font_size_small'];?>;
}

.followme {
	float: left;
	width: 154px;
	border-right: 1px dotted <?php echo $themeSettings['bar_border_light'];?>;
	padding: 10px;
}

.slimScrollDiv {
	height: 290px !important;
}

#tweets {
	padding-right: 5px !important;
}

</style>