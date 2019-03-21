<?php
/**
 * @package FA Board Icons
 * @author Sami "SychO" Mazouz
 * @version 1.1
 * @license Copyright (c) 2019 Sami "SychO" Mazouz
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
 * 		integrate_edit_board
 */
function fabi_manage_board_ui()
{
	global $context, $smcFunc, $txt;

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
	
	if(empty($context['custom_board_settings']))
		$context['custom_board_settings'] = array();

	$context['custom_board_settings'] = array_merge(array(
		array(
			'dt' => '
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
 * 		integrate_getboardtree
 */
function fabi_board_index($boardIndexOptions, &$categories)
{
	global $smcFunc;
	// load the icon template
	loadTemplate('FA-BoardIcons');
	// load the board icons
	if($boardIndexOptions['include_categories'])
	{
		foreach($categories as $cat_id => $category)
			foreach($category['boards'] as $board_id => $board)
			{
				$request = $smcFunc['db_query']('', '
					SELECT fabi_icon, fabi_color
					FROM {db_prefix}boards
					WHERE id_board = {int:board_id}',
					array(
						'board_id' => $board_id
					)
				);
				$result = $smcFunc['db_fetch_assoc']($request);
				$categories[$cat_id]['boards'][$board_id]['fabi_icon'] = $result['fabi_icon'];
				$categories[$cat_id]['boards'][$board_id]['fabi_color'] = $result['fabi_color'];
				$smcFunc['db_free_result']($request);
				// Change the board type to 'fabi', this is to change the board icons without editing template files.
				$categories[$cat_id]['boards'][$board_id]['type'] = 'fabi';
			}
	}
	else
	{
		foreach($categories as $board_id => $board)
		{
			$request = $smcFunc['db_query']('', '
				SELECT fabi_icon, fabi_color
				FROM {db_prefix}boards
				WHERE id_board = {int:board_id}',
				array(
					'board_id' => $board_id
				)
			);
			$result = $smcFunc['db_fetch_assoc']($request);
			$categories[$board_id]['fabi_icon'] = $result['fabi_icon'];
			$categories[$board_id]['fabi_color'] = $result['fabi_color'];
			$smcFunc['db_free_result']($request);
			// Change the board type to 'fabi', this is to change the board icons without editing template files.
			$categories[$board_id]['type'] = 'fabi';
		}
	}
}

/**
 * Saves the icon & color values to the database
 *
 * Called by:
 * 		integrate_modify_board
 */
function fabi_modify_board($id, $boardOptions, &$boardUpdates, &$boardUpdateParameters)
{
	global $smcFunc;

	if(empty($boardOptions['fabi_icon']))
		$boardOptions['fabi_icon'] = !empty($_POST['fabi_icon']) ? $smcFunc['htmlspecialchars']($_POST['fabi_icon'], ENT_QUOTES) : '';
	if(empty($boardOptions['fabi_color']))
		$boardOptions['fabi_color'] = !empty($_POST['fabi_color']) ? $smcFunc['htmlspecialchars']($_POST['fabi_color'], ENT_QUOTES) : '';

	if(!empty($boardOptions['fabi_icon']))
	{
		$boardUpdates[] = 'fabi_icon = {string:fabi_icon}';
		$boardUpdateParameters['fabi_icon'] = $boardOptions['fabi_icon'];
	}
	if(!empty($boardOptions['fabi_icon']))
	{
		$boardUpdates[] = 'fabi_color = {string:fabi_color}';
		$boardUpdateParameters['fabi_color'] = $boardOptions['fabi_color'];
	}
}

/**
 * Loads the FontAwesome library and a custom css file 'fabi.css'
 *
 * Called by:
 * 		integrate_pre_css_output
 */
function fabi_fontawesome_css()
{
	loadCSSFile('https://use.fontawesome.com/releases/v5.7.2/css/all.css', array('external'=>true));
	loadCSSFile('fabi.css', array('force_current'=>false, 'minimize'=>true), 'smf_fabi');
}

/**
 * Adds some default settings
 *
 * Called by:
 * 		integrate_general_mod_settings
 */
function fabi_settings(&$config_vars)
{
	global $modSettings, $txt;

	// Adds a seperator if any settings are above
	$fabi = empty($config_vars) ? array() : array('');

	// Now the actual settings
	$fabi[] = array('text', 'fabi_default_icon', 'postinput' => '<i id="fabi_dynamic" class="'.(!empty($modSettings['fabi_default_icon']) ? $modSettings['fabi_default_icon'] : '').'"></i>', 'javascript'=>'oninput="document.getElementById(\'fabi_dynamic\').className = this.value;"');
	$fabi[] = array(!empty($modSettings['fabi_default_color']) ? 'color' : 'text', 'fabi_default_color', 'subtext' => $txt['fabi_default_color_subtext']);
	$fabi[] = array('check', 'fabi_force_default_icon');
	$fabi[] = array('check', 'fabi_force_default_color');
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
 * Give credit to the author
 *
 * Called by:
 * 		integrate_credits
 */
function fabi_credits()
{
	global $context;
	$context['copyrights']['mods'][] = '<a href="https://github.com/SychO9/smf-fa-board-icons">FA Board Icons</a> by <a href="https://github.com/SychO9">SychO</a> &copy; 2019';
}