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

/**
 * All board types were changed to 'fabi' and so we can edit the icons by creating
 * this new function.
 */
function template_bi_fabi_icon($board)
{
	global $context, $scripturl, $modSettings;

	// Do we have an icon value, and are we forcing a default value ?
	$icon = !empty($board['fabi_icon']) && empty($modSettings['fabi_force_default_icon']) ? $board['fabi_icon'] : (!empty($modSettings['fabi_default_icon']) ? $modSettings['fabi_default_icon'] : 'fas fa-comments');

	// Is there a color, and are we forcing a default color ?
	$color = !empty($board['fabi_color']) && empty($modSettings['fabi_force_default_color']) ? $board['fabi_color'] : (!empty($modSettings['fabi_default_color']) ? $modSettings['fabi_default_color'] : '');

	// Show a difference between new post icons and no new post icons
	$show_on = !empty($modSettings['fabi_show_on']) ? ' fabi_show_on' : '';

	echo '
		<a
			href="', ($context['user']['is_guest'] ? $board['href'] : $scripturl . '?action=unread;board=' . $board['id'] . '.0;children'), '"
			class="board_', $board['board_class'], ' fabi_icon', $show_on, '"', !empty($board['board_tooltip']) ? ' title="' . $board['board_tooltip'] . '"' : '', '
		>
			<i class="', $icon, '"', !empty($color) ? ' style="color:'.$color.'"' : '', '></i>
		</a>';
}