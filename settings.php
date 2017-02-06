<?php

defined('MOODLE_INTERNAL') || die;

if ($ADMIN->fulltree) {

// logo image setting
	$name = 'theme_addisco3column/logo';
	$title = get_string('logo','theme_addisco3column');
	$description = get_string('logodesc', 'theme_addisco3column');
	$setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
	$settings->add($setting);


	// link color setting
	$name = 'theme_addisco3column/linkcolor';
	$title = get_string('linkcolor','theme_addisco3column');
	$description = get_string('linkcolordesc', 'theme_addisco3column');
	$default = '#003d64';
	$previewconfig = NULL;
	$setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
	$settings->add($setting);

	// link hover color setting
	$name = 'theme_addisco3column/linkhover';
	$title = get_string('linkhover','theme_addisco3column');
	$description = get_string('linkhoverdesc', 'theme_addisco3column');
	$default = '#003d64';
	$previewconfig = NULL;
	$setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
	$settings->add($setting);
}