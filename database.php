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
// If SSI.php is in the same place as this file, and SMF isn't defined, this is being run standalone.
if (file_exists(dirname(__FILE__) . '/SSI.php') && !defined('SMF'))
	require_once(dirname(__FILE__) . '/SSI.php');
// Hmm... no SSI.php and no SMF?
elseif (!defined('SMF'))
	die('<b>Error:</b> Cannot install - please verify you put this in the same place as SMF\'s index.php.');

db_extend('packages');

// Add the 'fabi_icon' column to smf_boards table
$smcFunc['db_add_column']('{db_prefix}boards', array(
	'name' => 'fabi_icon',
	'type' => 'varchar',
	'size' => 255,
	'null' => false,
	'default' => '',
), '', 'update');
// Add the 'fabi_color' column to smf_boards table
$smcFunc['db_add_column']('{db_prefix}boards', array(
	'name' => 'fabi_color',
	'type' => 'varchar',
	'size' => 16,
	'null' => false,
	'default' => '',
), '', 'update');

// Initialize some mod settings
updateSettings(array(
	'fabi_default_icon' => 'fas fa-comments',
	'fabi_default_color' => '',
));