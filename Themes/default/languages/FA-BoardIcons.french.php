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

$txt['fabi_icon'] = 'Icône FontAwesome';
$txt['fabi_color'] = 'Couleur de l\'icône';
$txt['fabi_help'] = 'Trouvez toutes les icônes sur: <a href="https://fontawesome.com/icons"><b>https://fontawesome.com/icons</b></a><br>example d\'utilisation: <span class="fabi_code">fas fa-<em>{nom_icone}</em></span>';
$txt['fabi_default_icon'] = 'Icône par défault';
$txt['fabi_default_color'] = 'Couleur par défault';
$txt['fabi_default_color_subtext'] = '<a id="fabi_default_color_set">Valeur par défault</a> &bullet; <a id="fabi_color_picker">Pipette à couleurs</a>';
$txt['fabi_force_default_icon'] = 'Forcer l\'utilisation de l\'icône par défaut';
$txt['fabi_force_default_color'] = 'Forcer l\'utilisation de la couleur par défaut';
$txt['fabi_show_on'] = "Afficher la différence entre les nouveaux messages et aucun nouveau message dans le style d'icône";
$txt['fabi_show_on_subtext'] = 'Par défaut, le style sera translucide pour aucun nouveau message et normal pour les nouveaux messages. Vous pouvez modifier le style dans <b>Themes/default/css/fabi.css</b>';

$helptxt['fabi_default_icon'] = $txt['fabi_help'] . '<br><b>fas</b> représente les icônes solides<br><b>fab</b> représente les icônes de marque (tel que facebook ou twitter)<br><b>far</b> représente les icônes régulaires';
$helptxt['fabi_default_color'] = 'La couleur par défault est définie dans le fichier fabi.css qui se trouve au niveau du dossier du thème par default.';
$helptxt['fabi_board_icon'] = 'Vous pouvez forcer l’utilisation d’une seule icône et couleur sur toutes les séctions à partir de <a href="'.$scripturl.'?action=admin;area=modsettings;sa=general">cette page</a>';