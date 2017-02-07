<?php
$hasheading = ($PAGE->heading);
$hasnavbar = (empty($PAGE->layout_options['nonavbar']) && $PAGE->has_navbar());
$hasfooter = (empty($PAGE->layout_options['nofooter']));

$hassidepre = $PAGE->blocks->region_has_content('side-pre', $OUTPUT);
$hassidepost = $PAGE->blocks->region_has_content('side-post', $OUTPUT);

$showsidepre = $hassidepre && !$PAGE->blocks->region_completely_docked('side-pre', $OUTPUT);
$showsidepost = $hassidepost && !$PAGE->blocks->region_completely_docked('side-post', $OUTPUT);

$custommenu = $OUTPUT->custom_menu();
$hascustommenu = (empty($PAGE->layout_options['nocustommenu']) && !empty($custommenu));
$haslogo = (!empty($PAGE->theme->settings->logo));

$bodyclasses = array();
if ($showsidepre && !$showsidepost) {
    $bodyclasses[] = 'side-pre-only';
} else if ($showsidepost && !$showsidepre) {
    $bodyclasses[] = 'side-post-only';
} else if (!$showsidepost && !$showsidepre) {
    $bodyclasses[] = 'content-only';
}
if ($hascustommenu) {
    $bodyclasses[] = 'has_custom_menu';
}

if ($hasnavbar) {
    $bodyclasses[] = 'has_navbar';
}

echo $OUTPUT->doctype() ?>
<html <?php echo $OUTPUT->htmlattributes() ?>>
<head>
    <title><?php echo $PAGE->title ?></title>
    <div id="box-before-header-wrapper">
	<div id="box-before-header">
    <a href="http://addisco.no/"><img src="<?php echo $OUTPUT->pix_url('Addisco_logo_without_subs', 'theme')?>" id="logo"></a><br>
	<?php include("heading_socialmedia.html"); ?>
    </div>
	</div>
 <!-- To insert a favicon -->   
    <link rel="shortcut icon" href="<?php echo $OUTPUT->pix_url('favicon', 'theme')?>" />
    <?php echo $OUTPUT->standard_head_html() ?>
</head>
<body id="<?php p($PAGE->bodyid) ?>" class="<?php p($PAGE->bodyclasses.' '.join(' ', $bodyclasses)) ?>">
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) {return;}
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<?php echo $OUTPUT->standard_top_of_body_html() ?>

<div id="page">
	<div id="wrapper">
	
<!-- start OF header -->
		<div id="page-header" class="page-header-home">
			<?php if ($haslogo) {
                        echo html_writer::link(new moodle_url('/'), "<img src='".$PAGE->theme->settings->logo."' id='logo' alt='logo' />");
                    } else { ?>
			<!--<img src="<?php echo $OUTPUT->pix_url('logo', 'theme')?>" id="logo">-->
			<?php } ?>
			
<!-- start of custom menu -->	
<?php if ($hascustommenu) { ?>
<div id="custommenu-wrap"><div id="custommenu"><?php echo $custommenu; ?>
<?php } ?>
<!-- end of menu -->

<?php echo $OUTPUT->user_menu(); ?>

</div></div>		
</div>
<!-- end of header -->		

	

<div id="page-content-wrapper">
<!-- start OF moodle CONTENT -->
<!-- start of navbar -->
<div id="navformholder">
<div id="mainheadholder"><h1 class="mainhead"><?php echo $PAGE->heading ?></h1></div>
</div>       

<!-- end of navbar -->

 <div id="page-content">
 <!-- start of navbar -->
<?php if ($hasnavbar) { ?>
        <div class="navbar clearfix">
          <div class="breadcrumb"><?php echo $OUTPUT->navbar(); ?></div>
          <div class="navbutton"> <?php echo $PAGE->button; ?></div>
        </div>
<?php } ?>
<!-- end of navbar -->
        <div id="region-main-box">
            <div id="region-post-box">
            
                <div id="region-main-wrap">
                    <div id="region-main">
                        <div class="region-content">
                            <?php echo core_renderer::MAIN_CONTENT_TOKEN ?>
                        </div>
                    </div>
                </div>
                
                <?php if ($hassidepre) { ?>
                <div id="region-pre" class="block-region">
                    <div class="region-content">
                        <?php echo $OUTPUT->blocks_for_region('side-pre') ?>
                    </div>
                </div>
                <?php } ?>
                
                <?php if ($hassidepost) { ?>
                <div id="region-post" class="block-region">
                    <div class="region-content">
                        <?php echo $OUTPUT->blocks_for_region('side-post') ?>
                    </div>
                </div>
                <?php } ?>
                
            </div>
        </div>
    </div>
<!-- end OF moodle CONTENT -->
<div class="clearer"></div>
</div>
<!-- end OF moodle CONTENT wrapper -->


<!-- start of footer -->

<div id="page-footer">
<?php include("footercontent.html"); ?>
<a href="http://addisco.no/"><img src="<?php echo $OUTPUT->pix_url('Addisco_whitelogo_without_subs', 'theme')?>" id="footer-logo"></a><br>

</div>

</br></br>
<!-- end of footer -->	


<div class="clearer"></div>

	</div><!-- end #wrapper -->
</div><!-- end #page -->	



<?php echo $OUTPUT->standard_end_of_body_html() ?>
</body>
</html>
