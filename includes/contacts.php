<?php
//
//if($page_id != "index"){
//    header("Location:/");
//    die;
//}

$phone = cockpit('regions:region_field', 'Контакты', 'phone', 'value');
$phone2 = cockpit('regions:region_field', 'Контакты', 'phone2', 'value');
$email = cockpit('regions:region_field', 'Контакты', 'email', 'value');
$address = cockpit('regions:region_field', 'Контакты', 'address', 'value');
$skype = cockpit('regions:region_field', 'Контакты', 'skype', 'value');
$site = cockpit('regions:region_field', 'Контакты', 'site', 'value');
$gps = cockpit('regions:region_field', 'Контакты', 'gps', 'value');
$social = [
    "vk" => cockpit('regions:region_field', 'Контакты', 'vk', 'value'),
    "fb" => cockpit('regions:region_field', 'Контакты', 'fb', 'value'),
    "yt" => cockpit('regions:region_field', 'Контакты', 'yt', 'value'),
    "inst" => cockpit('regions:region_field', 'Контакты', 'inst', 'value'),
    "mailru" => cockpit('regions:region_field', 'Контакты', 'mailru', 'value'),
    "ok" => cockpit('regions:region_field', 'Контакты', 'ok', 'value'),
    "tw" => cockpit('regions:region_field', 'Контакты', 'tw', 'value')
];

?>