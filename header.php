<?php
include("site.php");
?>
<!-- Meta Tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<meta name="description" content="IEBC - Independent Electoral and Boundaries Commission" />
<meta name="keywords" content="Kenya,Elections" />
<meta name="author" content="IEBC" />

<!-- Page Title -->
<title>
<?php
if($page=="")
{
	echo "Kiwash";
}
else
{
	echo str_replace("v="," ",$page)." - Kiwash";
}
?>
</title>

<!-- Favicon and Touch Icons -->
<link rel="shortcut icon" href="<?=$site;?>images/kiwashlog.png">


<link href="<?=$site;?>images/favicon.png" rel="apple-touch-icon">
<link href="<?=$site;?>images/favicon.png" rel="apple-touch-icon" sizes="72x72">
<link href="<?=$site;?>images/favicon.png" rel="apple-touch-icon" sizes="114x114">
<link href="<?=$site;?>images/favicon.png" rel="apple-touch-icon" sizes="144x144">

<!-- Stylesheet -->
<link href="<?=$site;?>css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="<?=$site;?>css/theme.scss" type="text/css" />
<link rel="stylesheet" href="<?=$site;?>css/tablet-and-desktop.scss" type="text/css" media="screen and (min-width: 768px)" />
<link rel="stylesheet" href="<?=$site;?>css/gcs.scss" type="text/css" />

<link href="<?=$site;?>css/jquery-ui.min.css" rel="stylesheet" type="text/css">
<link href="<?=$site;?>css/animate.css" rel="stylesheet" type="text/css">
<link href="<?=$site;?>css/css-plugin-collections.css" rel="stylesheet"/>
<!-- CSS | menuzord megamenu skins -->
<link id="menuzord-menu-skins" href="<?=$site;?>css/menuzord-skins/menuzord-strip.css" rel="stylesheet"/>
<!-- CSS | Main style file -->
<link href="<?=$site;?>css/style-main.css" rel="stylesheet" type="text/css">
<!--<link href="<?=$site;?>css/full-slider.css" rel="stylesheet" type="text/css">-->
<!-- CSS | Preloader Styles css/full-slider.css
<link href="<?=$site;?>css/preloader.css" rel="stylesheet" type="text/css">
<!-- CSS | Custom Margin Padding Collection -->
<link href="<?=$site;?>css/custom-bootstrap-margin-padding.css" rel="stylesheet" type="text/css">
<!-- CSS | Responsive media queries -->
<link href="<?=$site;?>css/responsive.css" rel="stylesheet" type="text/css">
<!-- CSS | Style css. This is the file where you can place your own custom css code. Just uncomment it and use it. -->
<!-- <link href="<?=$site;?>css/style.css" rel="stylesheet" type="text/css"> -->

<style>

.jssorb05 {
position: absolute;
}
.jssorb05 div, .jssorb05 div:hover, .jssorb05 .av {
position: absolute;
/* size of bullet elment */
width: 16px;
height: 16px;
background: url('images/b05.png') no-repeat;
overflow: hidden;
cursor: pointer;
}
.jssorb05 div { background-position: -7px -7px; }
.jssorb05 div:hover, .jssorb05 .av:hover { background-position: -37px -7px; }
.jssorb05 .av { background-position: -67px -7px; }
.jssorb05 .dn, .jssorb05 .dn:hover { background-position: -97px -7px; }

/* jssor slider arrow navigator skin 12 css */
/*
.jssora12l                  (normal)
.jssora12r                  (normal)
.jssora12l:hover            (normal mouseover)
.jssora12r:hover            (normal mouseover)
.jssora12l.jssora12ldn      (mousedown)
.jssora12r.jssora12rdn      (mousedown)
*/
/*.jssora12l, .jssora12r {
display: block;
position: absolute;
/* size of arrow element */
/*width: 30px;
height: 46px;
cursor: pointer;
background: url('images/a12.png') no-repeat;
overflow: hidden;
}
.jssora12l { background-position: -16px -37px; }
.jssora12r { background-position: -75px -37px; }
.jssora12l:hover { background-position: -136px -37px; }
.jssora12r:hover { background-position: -195px -37px; }
.jssora12l.jssora12ldn { background-position: -256px -37px; }
.jssora12r.jssora12rdn { background-position: -315px -37px; }
*/
.pushme{
	width:73%;position: relative;margin:0px auto 0 auto;padding: 4px 0px 0px 0px;left:122px;background-color: #fff;

}
.bkala{
	background-color: #f0f1f3
}
.boldline{
	display: inline-block;
    padding-right: 100%;
    border-bottom: 1px solid #888;
    margin-bottom: 10px;

}
.content-margin{
	    margin-left: -16px;
}
.content-margin-header{
	    margin-left: 0px;
}
.footer-text{
	font-family: sans-serif;
    font-size: 13px;
    font-style: normal;
    line-height: normal;
    text-decoration: none;
    top: 241.787px;
    left: 212.507px;
}

@import url(http://fonts.googleapis.com/css?family=Istok+Web);
@keyframes slidy {
0% { left: 0%; }
20% { left: 0%; }
25% { left: -100%; }
45% { left: -100%; }

}

figure { 
  margin: 0; background: #101010;
  font-family: Istok Web, sans-serif;
  font-weight: 100;
}
div#captioned-gallery { 
  width: 134.1%; overflow:hidden;
}
figure.slider { 
  position: relative; width: 500%;
  font-size: 0; animation: 30s slidy infinite; 
}
figure.slider figure { 
  width: 20%; height: auto;
  display: inline-block;  position: inherit; 
}
figure.slider img { width: 100%; height: auto; }
figure.slider figure figcaption { 
  position: absolute; bottom: 0;
  background: rgba(0,0,0,0.4);
  color: #fff; width: 100%;
  font-size: 2rem; padding: .6rem; 
}
.slider-nav-area {
    float: right;
    margin-top: 19px;
}

.slider-top-area {
    position: absolute;
    z-index: 10;
    width: 588px;
    height: 41px;
    padding: 0 15px;
    line-height: 41px;
    font-size: 17px;
    font-weight: 700;
    color: #FFF;
    left: 0;
    top: 0;
}

p {
    margin: 0 0 1.5em;
    padding: 0;
}

body {
    --x-height-multiplier: 0.35;
    --baseline-multiplier: 0.179;
    /*font-family: "Times New Roman", Times, serif;*/
    letter-spacing: .01rem;
    font-weight: 400;
    font-style: normal;
    font-family: sans-serif;
    letter-spacing: -.003em;
    color: rgba(0,0,0,.8);
    /*font-size: 1rem;*/
    line-height: 1.5;
    font-size: 0.875rem;
    line-height: 1.6;
}





/********************************/
/*          Main CSS     */
/********************************/


#first-slider .main-container {
  padding: 3-px;
}


#first-slider .slide1 h3, #first-slider .slide2 h3, #first-slider .slide3 h3, #first-slider .slide4 h3{
    color: #fff;
    font-size: 30px;
    text-transform: uppercase;
    font-weight:700;
}

#first-slider .slide1 h4,#first-slider .slide2 h4,#first-slider .slide3 h4,#first-slider .slide4 h4{
    color: #fff;
    font-size: 30px;
      text-transform: uppercase;
      font-weight:700;
}
#first-slider .slide1 .text-left ,#first-slider .slide3 .text-left{
    padding-left: 40px;
}


#first-slider .carousel-indicators {
  bottom: 0;
}
#first-slider .carousel-control.right,
#first-slider .carousel-control.left {
  background-image: none;
}
#first-slider .carousel .item {
  min-height: 530px; 
  height: 100%;
  width:100%;
}

.carousel-inner .item .container {
    display: flex;
    justify-content: center;
    align-items: center;
    position: absolute;
    bottom: 0;
    top: 0;
    left: 0;
    right: 0;
}


#first-slider h3{
  animation-delay: 1s;
}
#first-slider h4 {
  animation-delay: 2s;
}
#first-slider h2 {
  animation-delay: 3s;
}


#first-slider .carousel-control {
    width: 6%;
        text-shadow: none;
}


#first-slider h1 {
  text-align: center;  
  margin-bottom: 30px;
  font-size: 30px;
  font-weight: bold;
}

#first-slider .p {
  padding-top: 125px;
  text-align: center;
}

#first-slider .p a {
  text-decoration: underline;
}
#first-slider .carousel-indicators li {
    width: 14px;
    height: 14px;
    ;
  border:none;
}
#first-slider .carousel-indicators .active{
    width: 16px;
    height: 16px;
    background-color: #fff;
  border:none;
}


.carousel-fade .carousel-inner .item {
  -webkit-transition-property: opacity;
  transition-property: opacity;
}
.carousel-fade .carousel-inner .item,
.carousel-fade .carousel-inner .active.left,
.carousel-fade .carousel-inner .active.right {
  opacity: 0;
}
.carousel-fade .carousel-inner .active,
.carousel-fade .carousel-inner .next.left,
.carousel-fade .carousel-inner .prev.right {
  opacity: 1;
}
.carousel-fade .carousel-inner .next,
.carousel-fade .carousel-inner .prev,
.carousel-fade .carousel-inner .active.left,
.carousel-fade .carousel-inner .active.right {
  left: 0;
  -webkit-transform: translate3d(0, 0, 0);
          transform: translate3d(0, 0, 0);
}
.carousel-fade .carousel-control {
  z-index: 2;
}

.carousel-control .fa-angle-right, .carousel-control .fa-angle-left {
    position: absolute;
    top: 50%;
    z-index: 5;
    display: inline-block;
}
.carousel-control .fa-angle-left{
    left: 50%;
    width: 38px;
    height: 38px;
    margin-top: -15px;
    font-size: 30px;
    color: #fff;
    border: 3px solid #ffffff;
    -webkit-border-radius: 23px;
    -moz-border-radius: 23px;
    border-radius: 53px;
}
.carousel-control .fa-angle-right{
    right: 50%;
    width: 38px;
    height: 38px;
    margin-top: -15px;
    font-size: 30px;
    color: #fff;
    border: 3px solid #ffffff;
    -webkit-border-radius: 23px;
    -moz-border-radius: 23px;
    border-radius: 53px;
}
.carousel-control {
    opacity: 1;
    filter: alpha(opacity=100);
}


/********************************/
/*       Slides backgrounds     */
/********************************/
#first-slider .slide1 {
    background-image: url(images/2.jpg);
    background-size: 1200px 550px;
    background-repeat: no-repeat;
}
#first-slider .slide2 {
  background-image: url(images/3.jpg);
    background-size: 1200px 550px;
    background-repeat: no-repeat;
}
#first-slider .slide3 {
  background-image: url(images/1.jpg);
   background-size: 1200px 550px;
    background-repeat: no-repeat;
}
#first-slider .slide4 {
  background-image: url(images/4.jpg);
  background-size: 1200px 550px;
  background-repeat: no-repeat;

}




/********************************/
/*          Media Queries       */
/********************************/
@media screen and (min-width: 980px){
      
}
@media screen and (max-width: 640px){
      
}
</style>

<!-- Revolution Slider 5.x CSS settings -->
<link  href="<?=$site;?>js/revolution-slider/css/settings.css" rel="stylesheet" type="text/css"/>
<link  href="<?=$site;?>js/revolution-slider/css/layers.css" rel="stylesheet" type="text/css"/>
<link  href="<?=$site;?>js/revolution-slider/css/navigation.css" rel="stylesheet" type="text/css"/>

<!-- CSS | Theme Color -->
<link href="<?=$site;?>css/colors/theme-skin-green.css" rel="stylesheet" type="text/css">

<link href="<?=$site;?>admin/default_assets/dt/css/jquery.dataTables.css" rel="stylesheet">
<link rel="stylesheet" href="<?=$site;?>admin/default_assets/jquery_simple/jquery-ui.css">

<!-- external javascripts -->
<script src="<?=$site;?>js/jquery-2.2.0.min.js"></script>
<script src="<?=$site;?>js/jquery-ui.min.js"></script>
<script src="<?=$site;?>js/bootstrap.min.js"></script>
<!-- JS | jquery plugin collection for this theme -->
<script src="<?=$site;?>js/jquery-plugin-collection.js"></script>

<!-- Revolution Slider 5.x SCRIPTS -->
<script src="<?=$site;?>js/revolution-slider/js/jquery.themepunch.tools.min.js"></script>
<script src="<?=$site;?>js/revolution-slider/js/jquery.themepunch.revolution.min.js"></script>

<script src="<?=$site;?>js/jssor.slider-22.2.8.min.js" type="text/javascript"></script>
<script type="text/javascript">
jssor_1_slider_init = function() {

var jssor_1_SlideshowTransitions = [
{$Duration:1200,$Opacity:2}
];

var jssor_1_options = {
$AutoPlay: true,
$SlideshowOptions: {
$Class: $JssorSlideshowRunner$,
$Transitions: jssor_1_SlideshowTransitions,
$TransitionsOrder: 1
},
$ArrowNavigatorOptions: {
$Class: $JssorArrowNavigator$
},
$BulletNavigatorOptions: {
$Class: $JssorBulletNavigator$
}
};

var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

/*responsive code begin*/
/*you can remove responsive code if you don't want the slider scales while window resizing*/
function ScaleSlider() {
var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
if (refSize) {
refSize = Math.min(refSize, 1122);
jssor_1_slider.$ScaleWidth(refSize);
}
else {
window.setTimeout(ScaleSlider, 30);
}
}
ScaleSlider();
$Jssor$.$AddEvent(window, "load", ScaleSlider);
$Jssor$.$AddEvent(window, "resize", ScaleSlider);
$Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
/*responsive code end*/
};
</script>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="<?=$site;?>https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="<?=$site;?>https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
