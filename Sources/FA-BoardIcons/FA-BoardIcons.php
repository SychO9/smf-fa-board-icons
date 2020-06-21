<?php
/**
 * @package FA Board Icons
 * @author Sami "SychO" Mazouz
 * @version 1.3
 * @license Copyright (c) 2020 Sami "SychO" Mazouz
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 */

if (!defined('SMF'))
	die('No direct access...');

/**
 * Adds the icon & color fields to the edit/add screen
 * Called by:
 *		integrate_edit_board
 */
function fabi_manage_board_ui()
{
	global $context, $smcFunc, $txt, $scripturl;

	// Load the strings
	loadLanguage('FA-BoardIcons');

	// UI data
	if ($_REQUEST['sa'] == 'newboard')
	{
		$context['board']['fabi_icon'] = '';
		$context['board']['fabi_color'] = '';
	}
	else
	{
		$request = $smcFunc['db_query']('', '
			SELECT fabi_icon, fabi_color
			FROM {db_prefix}boards
			WHERE id_board = {int:board_id}',
			array(
				'board_id' => (int)$context['board']['id']
			)
		);
		$result = $smcFunc['db_fetch_assoc']($request);
		$context['board']['fabi_icon'] = $result['fabi_icon'];
		$context['board']['fabi_color'] = $result['fabi_color'];
		$smcFunc['db_free_result']($request);
	}

	if (empty($context['custom_board_settings']))
		$context['custom_board_settings'] = array();

	$context['custom_board_settings'] = array_merge(array(
		array(
			'dt' => '
				<a id="setting_fabi_default_icon_help" href="' . $scripturl . '?action=helpadmin;help=fabi_board_icon" onclick="return reqOverlayDiv(this.href);"><span class="main_icons help"></span></a>
				<strong>'.$txt['fabi_icon'].':</strong><br>
				<span class="smalltext">'.$txt['fabi_help'].'</span><br>',
			'dd' => '
				<input type="text" name="fabi_icon" value="'.(!empty($context['board']['fabi_icon']) ? $context['board']['fabi_icon'] : '').'" oninput="document.getElementById(\'fabi_dynamic\').className = this.value;"><i id="fabi_dynamic" class="'.(!empty($context['board']['fabi_icon']) ? $context['board']['fabi_icon'] : '').'"></i>',
		),
		array(
			'dt' => '
				<strong>'.$txt['fabi_color'].':</strong><br>
				<span class="smalltext">'.$txt['fabi_default_color_subtext'].'</span><br>',
			'dd' => '
				<input type="'.(!empty($context['board']['fabi_color']) ? 'color' : 'text').'" name="fabi_color" id="fabi_color" value="'.(!empty($context['board']['fabi_color']) ? $context['board']['fabi_color'] : '').'">',
		)
	), $context['custom_board_settings']);

	addInlineJavaScript('
		$(document).ready(function(){
			$("#fabi_default_color_set").click(function() {
				$("#fabi_color").attr("type", "text").attr("value", "");
			});
			$("#fabi_color_picker").click(function(){
				$("#fabi_color").attr("type", "color").click();
			});
		});
	', true);
}

/**
 * Loads the icons and colors of the boards from the database
 *
 * Called by:
 *		integrate_getboardtree
 */
function fabi_board_index($boardIndexOptions, &$categories)
{
	global $smcFunc;

	// load the icon template
	loadTemplate('FA-BoardIcons');

	// An array of all board ids, id_board => id_category
	if ($boardIndexOptions['include_categories'])
	{
		foreach ($categories as $cat_id => $category)
		{
			foreach ($category['boards'] as $board_id => $board)
				$board_ids[$board_id] = $cat_id;
		}
	}
	// If we are on a board, than the keys in $categories are all board ids
	else
	{
		$board_ids = $categories;
		$this_category = &$categories;
	}

	// If there are no boards, than do nothing :)
	if (empty($board_ids))
		return;

	$request = $smcFunc['db_query']('', '
		SELECT id_board, fabi_icon, fabi_color
		FROM {db_prefix}boards
		WHERE id_board IN ({array_int:board_ids})',
		array(
			'board_ids' => array_keys($board_ids)
		)
	);
	while($row = $smcFunc['db_fetch_assoc']($request))
	{
		// If we are on the board index, the board is inside a category, so we need to determine where
		if ($boardIndexOptions['include_categories'])
			$this_category = &$categories[$board_ids[$row['id_board']]]['boards'];

		$this_category[$row['id_board']]['fabi_icon'] = !empty($row['fabi_icon']) ? $row['fabi_icon'] : '';
		$this_category[$row['id_board']]['fabi_color'] = !empty($row['fabi_color']) ? $row['fabi_color'] : '';
		// Change the board type to 'fabi', this is to change the board icons without editing template files.
		$this_category[$row['id_board']]['type'] = 'fabi';
	}
	$smcFunc['db_free_result']($request);
}

/**
 * Saves the icon & color values to the database
 *
 * Called by:
 *		integrate_modify_board
 */
function fabi_modify_board($id, $boardOptions, &$boardUpdates, &$boardUpdateParameters)
{
	global $smcFunc;

	if (empty($boardOptions['fabi_icon']))
		$boardOptions['fabi_icon'] = !empty($_POST['fabi_icon']) ? $smcFunc['htmlspecialchars']($_POST['fabi_icon'], ENT_QUOTES) : '';

	if (empty($boardOptions['fabi_color']))
		$boardOptions['fabi_color'] = !empty($_POST['fabi_color']) ? $smcFunc['htmlspecialchars']($_POST['fabi_color'], ENT_QUOTES) : '';

	if (!empty($boardOptions['fabi_icon']))
	{
		$boardUpdates[] = 'fabi_icon = {string:fabi_icon}';
		$boardUpdateParameters['fabi_icon'] = $boardOptions['fabi_icon'];
	}

	if (!empty($boardOptions['fabi_color']))
	{
		$boardUpdates[] = 'fabi_color = {string:fabi_color}';
		$boardUpdateParameters['fabi_color'] = $boardOptions['fabi_color'];
	}
}

/**
 * Loads the FontAwesome library and a custom css file 'fabi.css'
 *
 * Called by:
 *		integrate_pre_css_output
 */
function fabi_fontawesome_css()
{
	// FontAwesome Free v5.13.1 (https://fontawesome.com)
	loadCSSFile('https://use.fontawesome.com/releases/v5.13.1/css/all.css',
		array(
			'external' => true,
			'attributes' => array(
				'integrity' => 'sha384-xxzQGERXS00kBmZW/6qxqJPyxW3UR0BPsL4c8ILaIWXva5kFi7TxkIIaMiKtqV1Q',
				'crossorigin' => 'anonymous'
			)
	));

	loadCSSFile('fabi.css', array(
		'force_current' => false,
		'minimize' => true
	), 'smf_fabi');
}

/**
 * Adds some default settings
 *
 * Called by:
 *		integrate_general_mod_settings
 */
function fabi_settings(&$config_vars)
{
	global $modSettings, $txt;

	// Load the strings
	loadLanguage('FA-BoardIcons');

	// Adds a seperator if any settings are above
	$fabi = empty($config_vars) ? array() : array('');

	// Default icon
	$fabi[] = array('text', 'fabi_default_icon', 'postinput' => '<i id="fabi_dynamic" class="'.(!empty($modSettings['fabi_default_icon']) ? $modSettings['fabi_default_icon'] : '').'"></i>', 'javascript'=>'oninput="document.getElementById(\'fabi_dynamic\').className = this.value;"');

	// Default color
	$fabi[] = array(!empty($modSettings['fabi_default_color']) ? 'color' : 'text', 'fabi_default_color', 'subtext' => $txt['fabi_default_color_subtext']);

	// Force using the default icon
	$fabi[] = array('check', 'fabi_force_default_icon');

	// Force using the default color
	$fabi[] = array('check', 'fabi_force_default_color');

	// Show difference between new posts and no new posts in icon style
	$fabi[] = array('check', 'fabi_show_on', 'subtext' => $txt['fabi_show_on_subtext']);

	// Add our setting to $config_vars
	$first = array_slice($config_vars, 0);
	$config_vars = array_merge($first, $fabi);

	addInlineJavaScript('
		$(document).ready(function(){
			$("#fabi_default_color_set").click(function() {
				$("#fabi_default_color").attr("type", "text").attr("value", "");
			});
			$("#fabi_color_picker").click(function(){
				$("#fabi_default_color").attr("type", "color").click();
			});
		});
	', true);
}

/**
 * Hints for admins
 *
 * Called by:
 *		integrate_helpadmin
 */
function fabi_helpadmin()
{
	loadLanguage('FA-BoardIcons');
}

/**
 * Give credit to the author
 *
 * Called by:
 *		integrate_credits
 */
function fabi_credits()
{
	global $context;

	$context['copyrights']['mods'][] = '<a href="https://github.com/SychO9/smf-fa-board-icons">FA Board Icons v1.3</a> by <a href="https://github.com/SychO9">SychO</a> &copy; 2020 | Licensed under <a href="http://en.wikipedia.org/wiki/MIT_License" target="_blank" rel="noopener">The MIT License (MIT)</a>';
}