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
 * Spanish translation https://www.bombercode.net Copyright 2014-2019
 */

global $helptxt, $scripturl;

$txt['fabi_icon'] = 'Icono de foro con FontAwesome';
$txt['fabi_color'] = 'Icono de color';
$txt['fabi_help'] = 'Todos los iconos se pueden encontrar aquí: <a href="https://fontawesome.com/icons"><b>https://fontawesome.com/icons</b></a><br>example: <span class="fabi_code">fas fa-<em>{icon_name}</em></span>';
$txt['fabi_default_icon'] = 'Icono predeterminado del foro con FontAwesome';
$txt['fabi_default_color'] = 'Color predeterminado del icono del foro con FontAwesome';
$txt['fabi_default_color_subtext'] = '<a id="fabi_default_color_set">Establecer como predeterminado</a> &bullet; <a id="fabi_color_picker">Selector de color</a>';
$txt['fabi_force_default_icon'] = 'Forzar el icono por defecto para ser utilizado';
$txt['fabi_force_default_color'] = 'Forzar el color por defecto para ser usado';
$txt['fabi_show_on'] = 'Show difference between new posts and no new posts in icon style';
$txt['fabi_show_on_subtext'] = 'By default the style will be translucent for no new posts, and normal for new posts. You can edit the style in <b>Themes/default/css/fabi.css</b>';

$helptxt['fabi_default_icon'] = $txt['fabi_help'] . '<br><b>fas</b> significa iconos sólidos<br><b>fab</b> significa iconos de marca (como Facebook o Twitter)<br><b>far</b> significa iconos regulares';
$helptxt['fabi_default_color'] = 'El color predeterminado se establece en el archivo CSS fabi.css ubicado en el tema predeterminado.';
$helptxt['fabi_board_icon'] = 'Puede forzar el uso de un solo icono y color en todos los foros desde <a href="'.$scripturl.'?action=admin;area=modsettings;sa=general">esta página</a>';