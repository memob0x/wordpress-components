<?php

define('WCPT_PATH_PARENT_THEME', get_template_directory());
define('WCPT_URI_PARENT_THEME', get_template_directory_uri());

define('WCPT_PATH_CURRENT_THEME', get_stylesheet_directory());
define('WCPT_URI_CURRENT_THEME', get_stylesheet_directory_uri());

define('WCPT_VERSION_PARENT_THEME', wp_get_theme(basename(WCPT_PATH_PARENT_THEME))->get('Version'));
define('WCPT_VERSION_CURRENT_THEME', wp_get_theme(basename(WCPT_PATH_CURRENT_THEME))->get('Version'));
define('WCPT_VERSION', join('.', array(WCPT_VERSION_PARENT_THEME, WCPT_VERSION_CURRENT_THEME)));
