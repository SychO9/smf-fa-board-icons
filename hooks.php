<?php
// If SSI.php is in the same place as this file, and SMF isn't defined, this is being run standalone.
if (file_exists(dirname(__FILE__) . '/SSI.php') && !defined('SMF'))
	require_once(dirname(__FILE__) . '/SSI.php');
// Hmm... no SSI.php and no SMF?
elseif (!defined('SMF'))
	die('<b>Error:</b> Cannot install - please verify you put this in the same place as SMF\'s index.php.');

// Define the hooks
$hook_functions = array(
	'integrate_pre_include' => '$sourcedir/FA-BoardIcons.php',
	'integrate_edit_board' => 'fabi_manage_board_ui',
	'integrate_getboardtree' => 'fabi_board_index',
	'integrate_modify_board' => 'fabi_modify_board',
	'integrate_pre_css_output' => 'fabi_fontawesome_css',
	'integrate_general_mod_settings' => 'fabi_settings',
	'integrate_credits' => 'fabi_credits',
);

// Adding or removing them?
if (!empty($context['uninstalling']))
	$call = 'remove_integration_function';
else
	$call = 'add_integration_function';

foreach ($hook_functions as $hook => $function)
	$call($hook, $function);