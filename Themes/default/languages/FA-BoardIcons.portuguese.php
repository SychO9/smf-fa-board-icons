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
 *
 * Translation By Joomlamz (https://www.simplemachines.org/community/index.php?action=profile;u=79248)
 */
global $helptxt, $scripturl;

$txt['fabi_icon'] = 'Ícone do Quadro de FontAwesome ';
$txt['fabi_color'] = 'Icon Color';
$txt['fabi_help'] = 'Todos os ícones podem ser encontrados aqui: <a href="https://fontawesome.com/icons"><b>https://fontawesome.com/icons</b></a><br>exemplo: <span class="fabi_code">fas fa-<em>{icon_name}</em></span>';
$txt['fabi_default_icon'] = 'Padrão FontAwesome ícone do quadro';
$txt['fabi_default_color'] = 'Padrão FontAwesome cor do ícone do quadro';
$txt['fabi_default_color_subtext'] = '<a id="fabi_default_color_set">Definido como padrão</a> &bullet; <a id="fabi_color_picker">Seletor de cores</a>';
$txt['fabi_force_default_icon'] = 'Force default icon to be used';
$txt['fabi_force_default_color'] = 'Forçar a cor padrão a ser usada';
$txt['fabi_show_on'] = 'Show difference between new posts and no new posts in icon style';
$txt['fabi_show_on_subtext'] = 'By default the style will be translucent for no new posts, and normal for new posts. You can edit the style in <b>Themes/default/css/fabi.css</b>';

$helptxt['fabi_default_icon'] = $txt['fabi_help'] . '<br><b>fas</b> significa ícones sólidos<br><b>fab</b> significa ícones de marca (like facebook or twitter)<br><b>far</b> significa ícones regulares';
$helptxt['fabi_default_color'] = 'A cor padrão é definida no ficheiro CSS fabi.css localizado no tema padrão.';
$helptxt['fabi_board_icon'] = 'Você pode forçar o uso de um único ícone e cor em todos os quadros, <a href="'.$scripturl.'?action=admin;area=modsettings;sa=general">esta página</a>';