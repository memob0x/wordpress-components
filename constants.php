<?php

define('VWPT_PATH_PARENT_THEME', get_template_directory());
define('VWPT_URI_PARENT_THEME', get_template_directory_uri());

define('VWPT_PATH_CURRENT_THEME', get_stylesheet_directory());
define('VWPT_URI_CURRENT_THEME', get_stylesheet_directory_uri());

define('VWPT_VERSION_PARENT_THEME', wp_get_theme(basename(VWPT_PATH_PARENT_THEME))->get('Version'));
define('VWPT_VERSION_CURRENT_THEME', wp_get_theme(basename(VWPT_PATH_CURRENT_THEME))->get('Version'));
define('VWPT_VERSION', join('.', array(VWPT_VERSION_PARENT_THEME, VWPT_VERSION_CURRENT_THEME)));

define('VWPT_NAME_DIRECTORY_DIST', 'dist');
define('VWPT_NAME_DIRECTORY_SRC', 'src');
define('VWPT_NAME_DIRECTORY_COMPONENTS', 'components');
define('VWPT_NAME_DIRECTORY_GLOBALS', 'globals');

define('VWPT_PATH_PARENT_THEME_DIST', VWPT_PATH_PARENT_THEME . '/' .VWPT_NAME_DIRECTORY_DIST);
define('VWPT_PATH_PARENT_THEME_SRC', VWPT_PATH_PARENT_THEME . '/' .VWPT_NAME_DIRECTORY_SRC);

define('VWPT_URI_PARENT_THEME_DIST', VWPT_URI_PARENT_THEME . '/' .VWPT_NAME_DIRECTORY_DIST);

define('VWPT_PATH_PARENT_THEME_DIST_COMPONENTS', VWPT_PATH_PARENT_THEME_DIST .'/'. VWPT_NAME_DIRECTORY_COMPONENTS);
define('VWPT_PATH_PARENT_THEME_SRC_COMPONENTS', VWPT_PATH_PARENT_THEME_SRC .'/'. VWPT_NAME_DIRECTORY_COMPONENTS);

define('VWPT_URI_PARENT_THEME_DIST_COMPONENTS', VWPT_URI_PARENT_THEME_DIST .'/' . VWPT_NAME_DIRECTORY_COMPONENTS);

define('VWPT_PATH_PARENT_THEME_DIST_GLOBALS', VWPT_PATH_PARENT_THEME_DIST .'/'. VWPT_NAME_DIRECTORY_GLOBALS);

define('VWPT_URI_PARENT_THEME_DIST_GLOBALS', VWPT_URI_PARENT_THEME_DIST .'/' . VWPT_NAME_DIRECTORY_GLOBALS);

define('VWPT_PATH_CURRENT_THEME_DIST', VWPT_PATH_CURRENT_THEME . '/' .VWPT_NAME_DIRECTORY_DIST);
define('VWPT_PATH_CURRENT_THEME_SRC', VWPT_PATH_CURRENT_THEME . '/' .VWPT_NAME_DIRECTORY_SRC);

define('VWPT_URI_CURRENT_THEME_DIST', VWPT_URI_CURRENT_THEME . '/' .VWPT_NAME_DIRECTORY_DIST);

define('VWPT_PATH_CURRENT_THEME_DIST_COMPONENTS', VWPT_PATH_CURRENT_THEME_DIST .'/'. VWPT_NAME_DIRECTORY_COMPONENTS);
define('VWPT_PATH_CURRENT_THEME_SRC_COMPONENTS', VWPT_PATH_CURRENT_THEME_SRC .'/'. VWPT_NAME_DIRECTORY_COMPONENTS);

define('VWPT_URI_CURRENT_THEME_DIST_COMPONENTS', VWPT_URI_CURRENT_THEME_DIST .'/' . VWPT_NAME_DIRECTORY_COMPONENTS);

define('VWPT_PATH_CURRENT_THEME_DIST_GLOBALS', VWPT_PATH_CURRENT_THEME_DIST .'/'. VWPT_NAME_DIRECTORY_GLOBALS);

define('VWPT_URI_CURRENT_THEME_DIST_GLOBALS', VWPT_URI_CURRENT_THEME_DIST .'/' . VWPT_NAME_DIRECTORY_GLOBALS);

define('VWPT_NAME_SUFFIX_CRITICAL', '-critical');

define('VWPT_NAME_COMPONENTS_STYLESHEET_CRITICAL', 'index'.VWPT_NAME_SUFFIX_CRITICAL);

define('VWPT_PATH_PARENT_THEME_INC', VWPT_PATH_PARENT_THEME . '/inc');
define('VWPT_PATH_PARENT_THEME_UTILS', VWPT_PATH_PARENT_THEME_INC . '/utils');
define('VWPT_PATH_PARENT_THEME_HOOKS', VWPT_PATH_PARENT_THEME_INC . '/hooks');

define('VWPT_NAME_COMPONENTS_STYELSHEET', 'index');
define('VWPT_NAME_COMPONENTS_JAVASCRIPT', 'index');
define('VWPT_NAME_COMPONENTS_INDEX', 'index');
define('VWPT_NAME_COMPONENTS_TEMPLATE', 'template');

define('VWPT_TYPE_ESM', 'esm');
define('VWPT_TYPE_SYSTEMJS', 'system');

define('VWPT_FILE_EXTENSION_CSS', 'css');
define('VWPT_FILE_EXTENSION_JS', 'js');
define('VWPT_FILE_EXTENSION_PHP', 'php');
define('VWPT_FILE_EXTENSION_COMPONENTS_TEMPLATE', VWPT_FILE_EXTENSION_PHP);

// TODO: convert to filter so that the child theme is able to override these
define('VWPT_NAME_MEMBER_ROUTER_OUTLET_COMPONENT', 'routerOutletComponent');
define('VWPT_ID_MAIN_COMPONENT_ROUTER_OUTLET', 'vwpt-router-outlet');
define('VWPT_ID_MAIN_COMPONENT', 'vwpt-app');
