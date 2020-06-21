<?php

global $helptxt, $scripturl;

$txt['fabi_icon'] = 'Иконка раздела';
$txt['fabi_color'] = 'Цвет иконки';
$txt['fabi_help'] = 'Все иконки доступны на сайте <a href="https://fontawesome.com/icons"><b>https://fontawesome.com/icons</b></a><br>Пример: <span class="fabi_code">fas fa-<em>{имя_иконки}</em></span>';
$txt['fabi_default_icon'] = 'Иконка раздела по умолчанию';
$txt['fabi_default_color'] = 'Цвет иконки по умолчанию';
$txt['fabi_default_color_subtext'] = '<a id="fabi_default_color_set">Задать вручную</a> &bullet; <a id="fabi_color_picker">Палитра</a>';
$txt['fabi_force_default_icon'] = 'Использовать иконку по умолчанию';
$txt['fabi_force_default_color'] = 'Использовать цвет по умолчанию';
$txt['fabi_show_on'] = 'Show difference between new posts and no new posts in icon style';
$txt['fabi_show_on_subtext'] = 'By default the style will be translucent for no new posts, and normal for new posts. You can edit the style in <b>Themes/default/css/fabi.css</b>';

$helptxt['fabi_default_icon'] = $txt['fabi_help'] . '<br>Приставка <b>fas</b> используется для бесплатных иконок<br><b>fab</b> — для брендовых иконок (типа facebook или twitter)<br><b>far</b> — для обычных иконок, требующих подписку Font Awesome Pro.';
$helptxt['fabi_default_color'] = 'Цвет по умолчанию устанавливается в CSS-файле fabi.css, расположенном в /Themes/default/css.';
$helptxt['fabi_board_icon'] = 'На <a href="' . $scripturl . '?action=admin;area=modsettings;sa=general">этой странице</a> можно настроить иконку и цвет по умолчанию для всех разделов.';