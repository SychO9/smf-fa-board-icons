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
global $helptxt, $scripturl;

$txt['fabi_icon'] = 'FontAwesome Board Icon';
$txt['fabi_color'] = 'Icon Color';
$txt['fabi_help'] = 'All icons can be found here: <a href="https://fontawesome.com/icons"><b>https://fontawesome.com/icons</b></a><br>example: <span class="fabi_code">fas fa-<em>{icon_name}</em></span>';
$txt['fabi_default_icon'] = 'Default FontAwesome board icon';
$txt['fabi_default_color'] = 'Default FontAwesome board icon color';
$txt['fabi_default_color_subtext'] = '<a id="fabi_default_color_set">Set to default</a> &bullet; <a id="fabi_color_picker">Color picker</a>';
$txt['fabi_force_default_icon'] = 'Force default icon to be used';
$txt['fabi_force_default_color'] = 'Force default color to be used';

$helptxt['fabi_default_icon'] = $txt['fabi_help'] . '<br><b>fas</b> stands for solid icons<br><b>fab</b> stands for brand icons (like facebook or twitter)<br><b>far</b> stands for regular icons';
$helptxt['fabi_default_color'] = 'The default color is set in the CSS file fabi.css located in the default theme.';
$helptxt['fabi_board_icon'] = 'You can force use a single icon and color on all boards from <a href="'.$scripturl.'?action=admin;area=modsettings;sa=general">this page</a>';
?>