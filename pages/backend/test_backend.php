<?php require '../../assets/includes/config.inc.php';?>

<?php

//php general variables

//form name

//$formName = 'programme-form';

//database name

$databaseName = 'subscriptions';

//identifier

$identifier = 'id';



//javascript general variables
//to be passed via divs on page


?>


<!DOCTYPE html>
<html lang="en">
<meta charset="ISO-8859-1">



<head>

    <?php

//define user access level

$openaccess = 0;
$requiredUserLevel = 1;

require BASE_URI . '/head.php';

$formv1 = new formGenerator;

spl_autoload_unregister ('class_loader');
require BASE_URI . '/assets/scripts/pdocrud/script/pdocrud.php';
$pdocrud = new PDOCrud();
spl_autoload_register ('class_loader');

$timezones = array('Pacific/Midway' => '(UTC-11:00) Midway',
'Pacific/Niue' => '(UTC-11:00) Niue',
'Pacific/Pago_Pago' => '(UTC-11:00) Pago Pago',
'America/Adak' => '(UTC-10:00) Adak',
'Pacific/Honolulu' => '(UTC-10:00) Honolulu',
'Pacific/Johnston' => '(UTC-10:00) Johnston',
'Pacific/Rarotonga' => '(UTC-10:00) Rarotonga',
'Pacific/Tahiti' => '(UTC-10:00) Tahiti',
'Pacific/Marquesas' => '(UTC-09:30) Marquesas',
'America/Anchorage' => '(UTC-09:00) Anchorage',
'Pacific/Gambier' => '(UTC-09:00) Gambier',
'America/Juneau' => '(UTC-09:00) Juneau',
'America/Nome' => '(UTC-09:00) Nome',
'America/Sitka' => '(UTC-09:00) Sitka',
'America/Yakutat' => '(UTC-09:00) Yakutat',
'America/Dawson' => '(UTC-08:00) Dawson',
'America/Los_Angeles' => '(UTC-08:00) Los Angeles',
'America/Metlakatla' => '(UTC-08:00) Metlakatla',
'Pacific/Pitcairn' => '(UTC-08:00) Pitcairn',
'America/Santa_Isabel' => '(UTC-08:00) Santa Isabel',
'America/Tijuana' => '(UTC-08:00) Tijuana',
'America/Vancouver' => '(UTC-08:00) Vancouver',
'America/Whitehorse' => '(UTC-08:00) Whitehorse',
'America/Boise' => '(UTC-07:00) Boise',
'America/Cambridge_Bay' => '(UTC-07:00) Cambridge Bay',
'America/Chihuahua' => '(UTC-07:00) Chihuahua',
'America/Creston' => '(UTC-07:00) Creston',
'America/Dawson_Creek' => '(UTC-07:00) Dawson Creek',
'America/Denver' => '(UTC-07:00) Denver',
'America/Edmonton' => '(UTC-07:00) Edmonton',
'America/Hermosillo' => '(UTC-07:00) Hermosillo',
'America/Inuvik' => '(UTC-07:00) Inuvik',
'America/Mazatlan' => '(UTC-07:00) Mazatlan',
'America/Ojinaga' => '(UTC-07:00) Ojinaga',
'America/Phoenix' => '(UTC-07:00) Phoenix',
'America/Shiprock' => '(UTC-07:00) Shiprock',
'America/Yellowknife' => '(UTC-07:00) Yellowknife',
'America/Bahia_Banderas' => '(UTC-06:00) Bahia Banderas',
'America/Belize' => '(UTC-06:00) Belize',
'America/North_Dakota/Beulah' => '(UTC-06:00) Beulah',
'America/Cancun' => '(UTC-06:00) Cancun',
'America/North_Dakota/Center' => '(UTC-06:00) Center',
'America/Chicago' => '(UTC-06:00) Chicago',
'America/Costa_Rica' => '(UTC-06:00) Costa Rica',
'Pacific/Easter' => '(UTC-06:00) Easter',
'America/El_Salvador' => '(UTC-06:00) El Salvador',
'Pacific/Galapagos' => '(UTC-06:00) Galapagos',
'America/Guatemala' => '(UTC-06:00) Guatemala',
'America/Indiana/Knox' => '(UTC-06:00) Knox',
'America/Managua' => '(UTC-06:00) Managua',
'America/Matamoros' => '(UTC-06:00) Matamoros',
'America/Menominee' => '(UTC-06:00) Menominee',
'America/Merida' => '(UTC-06:00) Merida',
'America/Mexico_City' => '(UTC-06:00) Mexico City',
'America/Monterrey' => '(UTC-06:00) Monterrey',
'America/North_Dakota/New_Salem' => '(UTC-06:00) New Salem',
'America/Rainy_River' => '(UTC-06:00) Rainy River',
'America/Rankin_Inlet' => '(UTC-06:00) Rankin Inlet',
'America/Regina' => '(UTC-06:00) Regina',
'America/Resolute' => '(UTC-06:00) Resolute',
'America/Swift_Current' => '(UTC-06:00) Swift Current',
'America/Tegucigalpa' => '(UTC-06:00) Tegucigalpa',
'America/Indiana/Tell_City' => '(UTC-06:00) Tell City',
'America/Winnipeg' => '(UTC-06:00) Winnipeg',
'America/Atikokan' => '(UTC-05:00) Atikokan',
'America/Bogota' => '(UTC-05:00) Bogota',
'America/Cayman' => '(UTC-05:00) Cayman',
'America/Detroit' => '(UTC-05:00) Detroit',
'America/Grand_Turk' => '(UTC-05:00) Grand Turk',
'America/Guayaquil' => '(UTC-05:00) Guayaquil',
'America/Havana' => '(UTC-05:00) Havana',
'America/Indiana/Indianapolis' => '(UTC-05:00) Indianapolis',
'America/Iqaluit' => '(UTC-05:00) Iqaluit',
'America/Jamaica' => '(UTC-05:00) Jamaica',
'America/Lima' => '(UTC-05:00) Lima',
'America/Kentucky/Louisville' => '(UTC-05:00) Louisville',
'America/Indiana/Marengo' => '(UTC-05:00) Marengo',
'America/Kentucky/Monticello' => '(UTC-05:00) Monticello',
'America/Montreal' => '(UTC-05:00) Montreal',
'America/Nassau' => '(UTC-05:00) Nassau',
'America/New_York' => '(UTC-05:00) New York',
'America/Nipigon' => '(UTC-05:00) Nipigon',
'America/Panama' => '(UTC-05:00) Panama',
'America/Pangnirtung' => '(UTC-05:00) Pangnirtung',
'America/Indiana/Petersburg' => '(UTC-05:00) Petersburg',
'America/Port-au-Prince' => '(UTC-05:00) Port-au-Prince',
'America/Thunder_Bay' => '(UTC-05:00) Thunder Bay',
'America/Toronto' => '(UTC-05:00) Toronto',
'America/Indiana/Vevay' => '(UTC-05:00) Vevay',
'America/Indiana/Vincennes' => '(UTC-05:00) Vincennes',
'America/Indiana/Winamac' => '(UTC-05:00) Winamac',
'America/Caracas' => '(UTC-04:30) Caracas',
'America/Anguilla' => '(UTC-04:00) Anguilla',
'America/Antigua' => '(UTC-04:00) Antigua',
'America/Aruba' => '(UTC-04:00) Aruba',
'America/Asuncion' => '(UTC-04:00) Asuncion',
'America/Barbados' => '(UTC-04:00) Barbados',
'Atlantic/Bermuda' => '(UTC-04:00) Bermuda',
'America/Blanc-Sablon' => '(UTC-04:00) Blanc-Sablon',
'America/Boa_Vista' => '(UTC-04:00) Boa Vista',
'America/Campo_Grande' => '(UTC-04:00) Campo Grande',
'America/Cuiaba' => '(UTC-04:00) Cuiaba',
'America/Curacao' => '(UTC-04:00) Curacao',
'America/Dominica' => '(UTC-04:00) Dominica',
'America/Eirunepe' => '(UTC-04:00) Eirunepe',
'America/Glace_Bay' => '(UTC-04:00) Glace Bay',
'America/Goose_Bay' => '(UTC-04:00) Goose Bay',
'America/Grenada' => '(UTC-04:00) Grenada',
'America/Guadeloupe' => '(UTC-04:00) Guadeloupe',
'America/Guyana' => '(UTC-04:00) Guyana',
'America/Halifax' => '(UTC-04:00) Halifax',
'America/Kralendijk' => '(UTC-04:00) Kralendijk',
'America/La_Paz' => '(UTC-04:00) La Paz',
'America/Lower_Princes' => '(UTC-04:00) Lower Princes',
'America/Manaus' => '(UTC-04:00) Manaus',
'America/Marigot' => '(UTC-04:00) Marigot',
'America/Martinique' => '(UTC-04:00) Martinique',
'America/Moncton' => '(UTC-04:00) Moncton',
'America/Montserrat' => '(UTC-04:00) Montserrat',
'Antarctica/Palmer' => '(UTC-04:00) Palmer',
'America/Port_of_Spain' => '(UTC-04:00) Port of Spain',
'America/Porto_Velho' => '(UTC-04:00) Porto Velho',
'America/Puerto_Rico' => '(UTC-04:00) Puerto Rico',
'America/Rio_Branco' => '(UTC-04:00) Rio Branco',
'America/Santiago' => '(UTC-04:00) Santiago',
'America/Santo_Domingo' => '(UTC-04:00) Santo Domingo',
'America/St_Barthelemy' => '(UTC-04:00) St. Barthelemy',
'America/St_Kitts' => '(UTC-04:00) St. Kitts',
'America/St_Lucia' => '(UTC-04:00) St. Lucia',
'America/St_Thomas' => '(UTC-04:00) St. Thomas',
'America/St_Vincent' => '(UTC-04:00) St. Vincent',
'America/Thule' => '(UTC-04:00) Thule',
'America/Tortola' => '(UTC-04:00) Tortola',
'America/St_Johns' => '(UTC-03:30) St. Johns',
'America/Araguaina' => '(UTC-03:00) Araguaina',
'America/Bahia' => '(UTC-03:00) Bahia',
'America/Belem' => '(UTC-03:00) Belem',
'America/Argentina/Buenos_Aires' => '(UTC-03:00) Buenos Aires',
'America/Argentina/Catamarca' => '(UTC-03:00) Catamarca',
'America/Cayenne' => '(UTC-03:00) Cayenne',
'America/Argentina/Cordoba' => '(UTC-03:00) Cordoba',
'America/Fortaleza' => '(UTC-03:00) Fortaleza',
'America/Godthab' => '(UTC-03:00) Godthab',
'America/Argentina/Jujuy' => '(UTC-03:00) Jujuy',
'America/Argentina/La_Rioja' => '(UTC-03:00) La Rioja',
'America/Maceio' => '(UTC-03:00) Maceio',
'America/Argentina/Mendoza' => '(UTC-03:00) Mendoza',
'America/Miquelon' => '(UTC-03:00) Miquelon',
'America/Montevideo' => '(UTC-03:00) Montevideo',
'America/Paramaribo' => '(UTC-03:00) Paramaribo',
'America/Recife' => '(UTC-03:00) Recife',
'America/Argentina/Rio_Gallegos' => '(UTC-03:00) Rio Gallegos',
'Antarctica/Rothera' => '(UTC-03:00) Rothera',
'America/Argentina/Salta' => '(UTC-03:00) Salta',
'America/Argentina/San_Juan' => '(UTC-03:00) San Juan',
'America/Argentina/San_Luis' => '(UTC-03:00) San Luis',
'America/Santarem' => '(UTC-03:00) Santarem',
'America/Sao_Paulo' => '(UTC-03:00) Sao Paulo',
'Atlantic/Stanley' => '(UTC-03:00) Stanley',
'America/Argentina/Tucuman' => '(UTC-03:00) Tucuman',
'America/Argentina/Ushuaia' => '(UTC-03:00) Ushuaia',
'America/Noronha' => '(UTC-02:00) Noronha',
'Atlantic/South_Georgia' => '(UTC-02:00) South Georgia',
'Atlantic/Azores' => '(UTC-01:00) Azores',
'Atlantic/Cape_Verde' => '(UTC-01:00) Cape Verde',
'America/Scoresbysund' => '(UTC-01:00) Scoresbysund',
'Africa/Abidjan' => '(UTC+00:00) Abidjan',
'Africa/Accra' => '(UTC+00:00) Accra',
'Africa/Bamako' => '(UTC+00:00) Bamako',
'Africa/Banjul' => '(UTC+00:00) Banjul',
'Africa/Bissau' => '(UTC+00:00) Bissau',
'Atlantic/Canary' => '(UTC+00:00) Canary',
'Africa/Casablanca' => '(UTC+00:00) Casablanca',
'Africa/Conakry' => '(UTC+00:00) Conakry',
'Africa/Dakar' => '(UTC+00:00) Dakar',
'America/Danmarkshavn' => '(UTC+00:00) Danmarkshavn',
'Europe/Dublin' => '(UTC+00:00) Dublin',
'Africa/El_Aaiun' => '(UTC+00:00) El Aaiun',
'Atlantic/Faroe' => '(UTC+00:00) Faroe',
'Africa/Freetown' => '(UTC+00:00) Freetown',
'Europe/Guernsey' => '(UTC+00:00) Guernsey',
'Europe/Isle_of_Man' => '(UTC+00:00) Isle of Man',
'Europe/Jersey' => '(UTC+00:00) Jersey',
'Europe/Lisbon' => '(UTC+00:00) Lisbon',
'Africa/Lome' => '(UTC+00:00) Lome',
'Europe/London' => '(UTC+00:00) London',
'Atlantic/Madeira' => '(UTC+00:00) Madeira',
'Africa/Monrovia' => '(UTC+00:00) Monrovia',
'Africa/Nouakchott' => '(UTC+00:00) Nouakchott',
'Africa/Ouagadougou' => '(UTC+00:00) Ouagadougou',
'Atlantic/Reykjavik' => '(UTC+00:00) Reykjavik',
'Africa/Sao_Tome' => '(UTC+00:00) Sao Tome',
'Atlantic/St_Helena' => '(UTC+00:00) St. Helena',
'UTC' => '(UTC+00:00) UTC',
'Africa/Algiers' => '(UTC+01:00) Algiers',
'Europe/Amsterdam' => '(UTC+01:00) Amsterdam',
'Europe/Andorra' => '(UTC+01:00) Andorra',
'Africa/Bangui' => '(UTC+01:00) Bangui',
'Europe/Belgrade' => '(UTC+01:00) Belgrade',
'Europe/Berlin' => '(UTC+01:00) Berlin',
'Europe/Bratislava' => '(UTC+01:00) Bratislava',
'Africa/Brazzaville' => '(UTC+01:00) Brazzaville',
'Europe/Brussels' => '(UTC+01:00) Brussels',
'Europe/Budapest' => '(UTC+01:00) Budapest',
'Europe/Busingen' => '(UTC+01:00) Busingen',
'Africa/Ceuta' => '(UTC+01:00) Ceuta',
'Europe/Copenhagen' => '(UTC+01:00) Copenhagen',
'Africa/Douala' => '(UTC+01:00) Douala',
'Europe/Gibraltar' => '(UTC+01:00) Gibraltar',
'Africa/Kinshasa' => '(UTC+01:00) Kinshasa',
'Africa/Lagos' => '(UTC+01:00) Lagos',
'Africa/Libreville' => '(UTC+01:00) Libreville',
'Europe/Ljubljana' => '(UTC+01:00) Ljubljana',
'Arctic/Longyearbyen' => '(UTC+01:00) Longyearbyen',
'Africa/Luanda' => '(UTC+01:00) Luanda',
'Europe/Luxembourg' => '(UTC+01:00) Luxembourg',
'Europe/Madrid' => '(UTC+01:00) Madrid',
'Africa/Malabo' => '(UTC+01:00) Malabo',
'Europe/Malta' => '(UTC+01:00) Malta',
'Europe/Monaco' => '(UTC+01:00) Monaco',
'Africa/Ndjamena' => '(UTC+01:00) Ndjamena',
'Africa/Niamey' => '(UTC+01:00) Niamey',
'Europe/Oslo' => '(UTC+01:00) Oslo',
'Europe/Paris' => '(UTC+01:00) Paris',
'Europe/Podgorica' => '(UTC+01:00) Podgorica',
'Africa/Porto-Novo' => '(UTC+01:00) Porto-Novo',
'Europe/Prague' => '(UTC+01:00) Prague',
'Europe/Rome' => '(UTC+01:00) Rome',
'Europe/San_Marino' => '(UTC+01:00) San Marino',
'Europe/Sarajevo' => '(UTC+01:00) Sarajevo',
'Europe/Skopje' => '(UTC+01:00) Skopje',
'Europe/Stockholm' => '(UTC+01:00) Stockholm',
'Europe/Tirane' => '(UTC+01:00) Tirane',
'Africa/Tripoli' => '(UTC+01:00) Tripoli',
'Africa/Tunis' => '(UTC+01:00) Tunis',
'Europe/Vaduz' => '(UTC+01:00) Vaduz',
'Europe/Vatican' => '(UTC+01:00) Vatican',
'Europe/Vienna' => '(UTC+01:00) Vienna',
'Europe/Warsaw' => '(UTC+01:00) Warsaw',
'Africa/Windhoek' => '(UTC+01:00) Windhoek',
'Europe/Zagreb' => '(UTC+01:00) Zagreb',
'Europe/Zurich' => '(UTC+01:00) Zurich',
'Europe/Athens' => '(UTC+02:00) Athens',
'Asia/Beirut' => '(UTC+02:00) Beirut',
'Africa/Blantyre' => '(UTC+02:00) Blantyre',
'Europe/Bucharest' => '(UTC+02:00) Bucharest',
'Africa/Bujumbura' => '(UTC+02:00) Bujumbura',
'Africa/Cairo' => '(UTC+02:00) Cairo',
'Europe/Chisinau' => '(UTC+02:00) Chisinau',
'Asia/Damascus' => '(UTC+02:00) Damascus',
'Africa/Gaborone' => '(UTC+02:00) Gaborone',
'Asia/Gaza' => '(UTC+02:00) Gaza',
'Africa/Harare' => '(UTC+02:00) Harare',
'Asia/Hebron' => '(UTC+02:00) Hebron',
'Europe/Helsinki' => '(UTC+02:00) Helsinki',
'Europe/Istanbul' => '(UTC+02:00) Istanbul',
'Asia/Jerusalem' => '(UTC+02:00) Jerusalem',
'Africa/Johannesburg' => '(UTC+02:00) Johannesburg',
'Europe/Kiev' => '(UTC+02:00) Kiev',
'Africa/Kigali' => '(UTC+02:00) Kigali',
'Africa/Lubumbashi' => '(UTC+02:00) Lubumbashi',
'Africa/Lusaka' => '(UTC+02:00) Lusaka',
'Africa/Maputo' => '(UTC+02:00) Maputo',
'Europe/Mariehamn' => '(UTC+02:00) Mariehamn',
'Africa/Maseru' => '(UTC+02:00) Maseru',
'Africa/Mbabane' => '(UTC+02:00) Mbabane',
'Asia/Nicosia' => '(UTC+02:00) Nicosia',
'Europe/Riga' => '(UTC+02:00) Riga',
'Europe/Simferopol' => '(UTC+02:00) Simferopol',
'Europe/Sofia' => '(UTC+02:00) Sofia',
'Europe/Tallinn' => '(UTC+02:00) Tallinn',
'Europe/Uzhgorod' => '(UTC+02:00) Uzhgorod',
'Europe/Vilnius' => '(UTC+02:00) Vilnius',
'Europe/Zaporozhye' => '(UTC+02:00) Zaporozhye',
'Africa/Addis_Ababa' => '(UTC+03:00) Addis Ababa',
'Asia/Aden' => '(UTC+03:00) Aden',
'Asia/Amman' => '(UTC+03:00) Amman',
'Indian/Antananarivo' => '(UTC+03:00) Antananarivo',
'Africa/Asmara' => '(UTC+03:00) Asmara',
'Asia/Baghdad' => '(UTC+03:00) Baghdad',
'Asia/Bahrain' => '(UTC+03:00) Bahrain',
'Indian/Comoro' => '(UTC+03:00) Comoro',
'Africa/Dar_es_Salaam' => '(UTC+03:00) Dar es Salaam',
'Africa/Djibouti' => '(UTC+03:00) Djibouti',
'Africa/Juba' => '(UTC+03:00) Juba',
'Europe/Kaliningrad' => '(UTC+03:00) Kaliningrad',
'Africa/Kampala' => '(UTC+03:00) Kampala',
'Africa/Khartoum' => '(UTC+03:00) Khartoum',
'Asia/Kuwait' => '(UTC+03:00) Kuwait',
'Indian/Mayotte' => '(UTC+03:00) Mayotte',
'Europe/Minsk' => '(UTC+03:00) Minsk',
'Africa/Mogadishu' => '(UTC+03:00) Mogadishu',
'Africa/Nairobi' => '(UTC+03:00) Nairobi',
'Asia/Qatar' => '(UTC+03:00) Qatar',
'Asia/Riyadh' => '(UTC+03:00) Riyadh',
'Antarctica/Syowa' => '(UTC+03:00) Syowa',
'Asia/Tehran' => '(UTC+03:30) Tehran',
'Asia/Baku' => '(UTC+04:00) Baku',
'Asia/Dubai' => '(UTC+04:00) Dubai',
'Indian/Mahe' => '(UTC+04:00) Mahe',
'Indian/Mauritius' => '(UTC+04:00) Mauritius',
'Europe/Moscow' => '(UTC+04:00) Moscow',
'Asia/Muscat' => '(UTC+04:00) Muscat',
'Indian/Reunion' => '(UTC+04:00) Reunion',
'Europe/Samara' => '(UTC+04:00) Samara',
'Asia/Tbilisi' => '(UTC+04:00) Tbilisi',
'Europe/Volgograd' => '(UTC+04:00) Volgograd',
'Asia/Yerevan' => '(UTC+04:00) Yerevan',
'Asia/Kabul' => '(UTC+04:30) Kabul',
'Asia/Aqtau' => '(UTC+05:00) Aqtau',
'Asia/Aqtobe' => '(UTC+05:00) Aqtobe',
'Asia/Ashgabat' => '(UTC+05:00) Ashgabat',
'Asia/Dushanbe' => '(UTC+05:00) Dushanbe',
'Asia/Karachi' => '(UTC+05:00) Karachi',
'Indian/Kerguelen' => '(UTC+05:00) Kerguelen',
'Indian/Maldives' => '(UTC+05:00) Maldives',
'Antarctica/Mawson' => '(UTC+05:00) Mawson',
'Asia/Oral' => '(UTC+05:00) Oral',
'Asia/Samarkand' => '(UTC+05:00) Samarkand',
'Asia/Tashkent' => '(UTC+05:00) Tashkent',
'Asia/Colombo' => '(UTC+05:30) Colombo',
'Asia/Kolkata' => '(UTC+05:30) Kolkata',
'Asia/Kathmandu' => '(UTC+05:45) Kathmandu',
'Asia/Almaty' => '(UTC+06:00) Almaty',
'Asia/Bishkek' => '(UTC+06:00) Bishkek',
'Indian/Chagos' => '(UTC+06:00) Chagos',
'Asia/Dhaka' => '(UTC+06:00) Dhaka',
'Asia/Qyzylorda' => '(UTC+06:00) Qyzylorda',
'Asia/Thimphu' => '(UTC+06:00) Thimphu',
'Antarctica/Vostok' => '(UTC+06:00) Vostok',
'Asia/Yekaterinburg' => '(UTC+06:00) Yekaterinburg',
'Indian/Cocos' => '(UTC+06:30) Cocos',
'Asia/Rangoon' => '(UTC+06:30) Rangoon',
'Asia/Bangkok' => '(UTC+07:00) Bangkok',
'Indian/Christmas' => '(UTC+07:00) Christmas',
'Antarctica/Davis' => '(UTC+07:00) Davis',
'Asia/Ho_Chi_Minh' => '(UTC+07:00) Ho Chi Minh',
'Asia/Hovd' => '(UTC+07:00) Hovd',
'Asia/Jakarta' => '(UTC+07:00) Jakarta',
'Asia/Novokuznetsk' => '(UTC+07:00) Novokuznetsk',
'Asia/Novosibirsk' => '(UTC+07:00) Novosibirsk',
'Asia/Omsk' => '(UTC+07:00) Omsk',
'Asia/Phnom_Penh' => '(UTC+07:00) Phnom Penh',
'Asia/Pontianak' => '(UTC+07:00) Pontianak',
'Asia/Vientiane' => '(UTC+07:00) Vientiane',
'Asia/Brunei' => '(UTC+08:00) Brunei',
'Antarctica/Casey' => '(UTC+08:00) Casey',
'Asia/Choibalsan' => '(UTC+08:00) Choibalsan',
'Asia/Chongqing' => '(UTC+08:00) Chongqing',
'Asia/Harbin' => '(UTC+08:00) Harbin',
'Asia/Hong_Kong' => '(UTC+08:00) Hong Kong',
'Asia/Kashgar' => '(UTC+08:00) Kashgar',
'Asia/Krasnoyarsk' => '(UTC+08:00) Krasnoyarsk',
'Asia/Kuala_Lumpur' => '(UTC+08:00) Kuala Lumpur',
'Asia/Kuching' => '(UTC+08:00) Kuching',
'Asia/Macau' => '(UTC+08:00) Macau',
'Asia/Makassar' => '(UTC+08:00) Makassar',
'Asia/Manila' => '(UTC+08:00) Manila',
'Australia/Perth' => '(UTC+08:00) Perth',
'Asia/Shanghai' => '(UTC+08:00) Shanghai',
'Asia/Singapore' => '(UTC+08:00) Singapore',
'Asia/Taipei' => '(UTC+08:00) Taipei',
'Asia/Ulaanbaatar' => '(UTC+08:00) Ulaanbaatar',
'Asia/Urumqi' => '(UTC+08:00) Urumqi',
'Australia/Eucla' => '(UTC+08:45) Eucla',
'Asia/Dili' => '(UTC+09:00) Dili',
'Asia/Irkutsk' => '(UTC+09:00) Irkutsk',
'Asia/Jayapura' => '(UTC+09:00) Jayapura',
'Pacific/Palau' => '(UTC+09:00) Palau',
'Asia/Pyongyang' => '(UTC+09:00) Pyongyang',
'Asia/Seoul' => '(UTC+09:00) Seoul',
'Asia/Tokyo' => '(UTC+09:00) Tokyo',
'Australia/Adelaide' => '(UTC+09:30) Adelaide',
'Australia/Broken_Hill' => '(UTC+09:30) Broken Hill',
'Australia/Darwin' => '(UTC+09:30) Darwin',
'Australia/Brisbane' => '(UTC+10:00) Brisbane',
'Pacific/Chuuk' => '(UTC+10:00) Chuuk',
'Australia/Currie' => '(UTC+10:00) Currie',
'Antarctica/DumontDUrville' => '(UTC+10:00) DumontDUrville',
'Pacific/Guam' => '(UTC+10:00) Guam',
'Australia/Hobart' => '(UTC+10:00) Hobart',
'Asia/Khandyga' => '(UTC+10:00) Khandyga',
'Australia/Lindeman' => '(UTC+10:00) Lindeman',
'Australia/Melbourne' => '(UTC+10:00) Melbourne',
'Pacific/Port_Moresby' => '(UTC+10:00) Port Moresby',
'Pacific/Saipan' => '(UTC+10:00) Saipan',
'Australia/Sydney' => '(UTC+10:00) Sydney',
'Asia/Yakutsk' => '(UTC+10:00) Yakutsk',
'Australia/Lord_Howe' => '(UTC+10:30) Lord Howe',
'Pacific/Efate' => '(UTC+11:00) Efate',
'Pacific/Guadalcanal' => '(UTC+11:00) Guadalcanal',
'Pacific/Kosrae' => '(UTC+11:00) Kosrae',
'Antarctica/Macquarie' => '(UTC+11:00) Macquarie',
'Pacific/Noumea' => '(UTC+11:00) Noumea',
'Pacific/Pohnpei' => '(UTC+11:00) Pohnpei',
'Asia/Sakhalin' => '(UTC+11:00) Sakhalin',
'Asia/Ust-Nera' => '(UTC+11:00) Ust-Nera',
'Asia/Vladivostok' => '(UTC+11:00) Vladivostok',
'Pacific/Norfolk' => '(UTC+11:30) Norfolk',
'Asia/Anadyr' => '(UTC+12:00) Anadyr',
'Pacific/Auckland' => '(UTC+12:00) Auckland',
'Pacific/Fiji' => '(UTC+12:00) Fiji',
'Pacific/Funafuti' => '(UTC+12:00) Funafuti',
'Asia/Kamchatka' => '(UTC+12:00) Kamchatka',
'Pacific/Kwajalein' => '(UTC+12:00) Kwajalein',
'Asia/Magadan' => '(UTC+12:00) Magadan',
'Pacific/Majuro' => '(UTC+12:00) Majuro',
'Antarctica/McMurdo' => '(UTC+12:00) McMurdo',
'Pacific/Nauru' => '(UTC+12:00) Nauru',
'Antarctica/South_Pole' => '(UTC+12:00) South Pole',
'Pacific/Tarawa' => '(UTC+12:00) Tarawa',
'Pacific/Wake' => '(UTC+12:00) Wake',
'Pacific/Wallis' => '(UTC+12:00) Wallis',
'Pacific/Chatham' => '(UTC+12:45) Chatham',
'Pacific/Apia' => '(UTC+13:00) Apia',
'Pacific/Enderbury' => '(UTC+13:00) Enderbury',
'Pacific/Fakaofo' => '(UTC+13:00) Fakaofo',
'Pacific/Tongatapu' => '(UTC+13:00) Tongatapu',
'Pacific/Kiritimati' => '(UTC+14:00) Kiritimati',);

?>

    <title>Ghent International Endoscopy Symposium - Backend</title>

    <!-- Page CSS -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/libs/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/libs/datatables/datatables.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/libs/sweetalert2/dist/sweetalert2.min.css">
    <script src="<?php echo BASE_URL;?>/assets/libs/sweetalert2/dist/sweetalert2.min.js"></script>
    <!-- Purpose CSS -->
    <!-- <link rel="stylesheet" href="<?php //echo BASE_URL; ?>/assets/css/purpose.css" id="stylesheet"> -->

    <style>
    .modal-backdrop {
        opacity: 0.75 !important;
    }

    

    @media screen and (max-width: 400px) {


        .scroll {

            font-size: 1em;

        }

        .h5 {

            font-size: 1em;
        }

        .tiny {
            font-size: 0.75em;

        }

        .btn {

            padding: 0.25rem 1.00rem;
            margin-bottom: 0.75rem;
        }
    }
    </style>
</head>

<body>
    <header class="header header-transparent" id="header-main">
        <!-- Topbar -->

        <?php require BASE_URI . '/topbar.php';?>

        <!-- Main navbar -->

        <?php require BASE_URI . '/nav.php';?>

    </header>







    <div class="container-fluid mx-0 pl-0 pr-0">



        <section class="header-account-page bg-dark d-flex align-items-end" data-offset-top="#header-main"
            style="padding-top: 147.4px;">
            <!-- Header container -->
            <div class="container pt-4 pt-lg-0">
                <div class="row">
                    <div class=" col-lg-12">
                        <!-- Salute + Small stats -->
                        <div class="row align-items-center mb-4">
                            <div class="col-md-5 mb-4 mb-md-0">
                                <span class="h2 mb-0 text-white d-block">Navigation Editor</span>

                                <!-- <span class="text-white">Have a nice day!</span> -->
                            </div>
                            <div class="col-auto flex-fill d-none d-xl-block">
                <ul class="list-inline row justify-content-lg-end mb-0">
                  <li class="list-inline-item col-sm-4 col-md-auto px-3 my-2 mx-0">
                    <a href="<?php echo BASE_URL;?>/pages/backend/test_backend.php?table=menu"><button class="btn btn-sm">Menus</button></a>
                  </li>
                  <li class="list-inline-item col-sm-4 col-md-auto px-3 my-2 mx-0">
                  <a href="<?php echo BASE_URL;?>/pages/backend/test_backend.php?table=navigation"><button class="btn btn-sm">Navigation</button></a>
                  </li>
                  <li class="list-inline-item col-sm-4 col-md-auto px-3 my-2 mx-0">
                  <a href="<?php echo BASE_URL;?>/pages/backend/test_backend.php?table=headings"><button class="btn btn-sm">Headings</button></a>
                  </li>
                  <li class="list-inline-item col-sm-4 col-md-auto px-3 my-2 mx-0">
                  <a href="<?php echo BASE_URL;?>/pages/backend/test_backend.php?table=pages"><button class="btn btn-sm">Pages</button></a>
                  </li>
                  
                </ul>
              </div>
                        </div>

                        <!-- Account navigation -->
                        <?php require 'backendNav.php';?>


                    </div>
                </div>
            </div>
        </section>

        <section class="slice bg-section-secondary">
            <div class="container-fluid px-lg-8">

                <!-- id check-->
                <?php

$formv1 = new formGenerator;

$general = new general;
$userFunctions = new userFunctions;

//error_reporting(E_ALL);

${$databaseName} = new $databaseName;

//eval("\$" . $databaseName . " = new " . $databaseName . ";");

//$programme = new programme;

if (isset($_GET['identifier']) && is_numeric($_GET['identifier'])) {
    $identifierValue = $_GET['identifier'];
    //echo $identifierValue;

} else {

    $identifierValue = null;

}

if (isset($_GET['table'])) {
    $table = $_GET['table'];
    //echo $identifierValue;

} else {

    $table = null;

}

if ($identifierValue) {

    $sessionIdentifier = $identifierValue;

    $validRecord = ${$databaseName}->matchRecord($sessionIdentifier);

    if ($validRecord === false) {
        echo "No $databaseName with that id exists";
        exit();

    }
}

?>

                <div id="data" style="display:none;">
                    <?php

//get an array of the known programmes [first 50]

//echo ${$databaseName}->Load_records_limit_json(50);
?>
                </div>
                <?php

//create a standard form based on the database to be included in modals

?>

                <!--alerts-->

                <div id="topTableAlert" class="alert alert-success alert-flush collapse" role="alert">
                    <span id="topTableSuccess"></span>
                </div>

              

<?php 

$pdocrud->setSettings("inlineEditbtn", true);


switch ($table) {
    case "menu":
        echo $pdocrud->dbTable("menu")->render();
        break;
    case "navigation":
        $pdocrud->relatedData('menu_id','menu','id','title');
        $pdocrud->relatedData('superCategory','values','superCategory','superCategory_t');
        //$pdocrud->addFilter("superCategoryFilter", "Super Category", "superCategory", "dropdown");
        //$pdocrud->setFilterSource("superCategoryFilter", "values", "superCategory", "superCategory_t", "db");
        //$pdocrud->setAdvSearchParam('superCategory', 'Super Category');
        echo $pdocrud->dbTable("navigation")->render();
        break;
    case "headings":
        $pdocrud->relatedData('navigation_id','navigation','id','title');
        echo $pdocrud->dbTable("headings")->render();
        break;
    case "pages":

        //pages table
        $pPages = new PDOCrud();

        $pPages->relatedData('headings_id','headings','id','name');
        $pPages->fieldTypes("simple", "radio");//change gender to radio button
        $pPages->fieldDataBinding("simple", array(0 => "No (displays tag categories)", 1=> "Yes (displays list of individual videos)"), "", "","array");//add data for radio button

        $pPages->tableHeading("Pages");
        $pPages->tableSubHeading("<br><span class=\"text-muted\">Here you can edit individual pages on the site.</span>");

        //add button to view page
        $action = BASE_URL . "/pages/learning/pages/general/show_subscription.php?page_id={pk}";//pk will be replaced by primary key value
        $text = '<i class="fa fa-external-link" aria-hidden="true"></i>';
        $attr = array("title"=>"Show Page");
        $pPages->enqueueBtnActions("url", $action, "url",$text,"id", $attr);   


        echo $pPages->dbTable("pages")->render();

        //tag Category pages table;
        $ppagesTagCategory = new PDOCrud(true);
        $ppagesTagCategory->addPlugin('select2');
        $ppagesTagCategory->tableHeading("Page Tag Categories");
        $ppagesTagCategory->tableSubHeading("<br><span class=\"text-muted\">Add tag categories to the page.  Dependent upon the simple variable on the page.  If simple is 0 these will work.  If simple is 1 these will have no effect.</span>");
        $ppagesTagCategory->relatedData('pages_id','pages','id','title');
        $ppagesTagCategory->relatedData('tagCategories_id','tagCategories','id','tagCategoryName');
        $ppagesTagCategory->fieldCssClass("pages_id", array("select2-element-identifier"));// add css classes
        $ppagesTagCategory->fieldCssClass("tagCategories_id", array("select2-element-identifier"));// add css classes

/*         $ppagesTagCategory->fieldTypes('pages_id', 'multiselect');
 *//*         $ppagesTagCategory->fieldTypes('tagCategories_id', 'multiselect');
 */        
        $ppagesTagCategory->dbTable("pagesTagCategory");
        echo $ppagesTagCategory->render();
        echo $ppagesTagCategory->loadPluginJsCode("select2",".select2-element-identifier");//to add plugin call on select elements


        //video pages table

        $ppagesVideo = new PDOCrud(true);
        $ppagesVideo->dbTable("pagesVideo");
        $ppagesVideo->tableHeading("Page Videos");
        $ppagesVideo->tableSubHeading("<br><span class=\"text-muted\">Add individual videos to the page.  Dependent upon the simple variable on the page.  If simple is 1 these will be added.  If simple is 0 these will have no effect.</span>");

        $ppagesVideo->relatedData('pages_id','pages','id','title');
        $ppagesVideo->relatedData('video_id','video','id','name');
        $ppagesVideo->fieldCssClass("pages_id", array("select2-element-identifier"));// add css classes

        $ppagesVideo->fieldCssClass("video_id", array("select2-element-identifier"));// add css classes


        echo $ppagesVideo->render();
        
//first paramater is first table(object) columnn name and 2nd parameter is 2nd object column name



            break;
            case "blog":
                $pdocrud->relatedData('video_id','video','id','name');
echo $pdocrud->dbTable("blog_v2")->render();
break;
}


//$pdocrud->setSkin("dark");
//$pdocrud->formDisplayInPopup();// call this function to show forms in popup

/* $pdocrud->joinTable("video", "usersViewsVideo.videoid = video.id", "LEFT JOIN");
 */

//menu
 //


//navigation


//headings


//pages


//blog





//echo $pdocrud->dbTable("usersViewsVideo")->render();?>



            </div>
        </section>


    </div>

    <!-- Modal -->
    <div class="modal fade" id="modal-row-1" role="dialog" aria-labelledby="modal-change-username" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">

            <div class="modal-content bg-dark border" style="border-color:rgb(238, 194, 120) !important;">
                <div class="modal-header">
                    <div class="modal-title d-flex align-items-left" id="modal-title-change-username">
                        <div>
                            <div class="icon bg-dark icon-sm icon-shape icon-info rounded-circle shadow mr-3">
                                <img src="../../assets/img/icons/gieqsicon.png">
                            </div>
                        </div>
                        <div class="text-left">
                            <h5 class="mb-0">Edit <?php echo $databaseName;?></h5>
                            <span class="mb-0"></span>
                        </div>

                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="text-white" aria-hidden="true">&times;</span>
                    </button>

                </div>
                <div class="modal-subheader px-3 mt-2 mb-2 border-bottom">
                    <div class="row">
                        <div class="col-sm-12 text-left">
                            <div>
                                <h6 class="mb-0"></h6>
                                <span id="modalMessageArea" class="mb-0"></span>

                            </div>
                            <div id="topModalAlert" class="alert alert-warning alert-flush collapse" role="alert">
                                <span id="topModalSuccess"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-body">

                    <div class="<?php echo $databaseName;?>-body">
                        <form id="<?php echo $databaseName;?>-form">
                            <div class="form-group">
                                <!-- EDIT -->

                                <label for="user_id">user_id</label>
                                <div class="input-group mb-3">
                                    <select id="user_id" type="text" data-toggle="select" class="form-control"
                                        name="user_id">
                                        <option value="" selected disabled hidden>please select an option</option>

                                    </select>
                                </div>

                                <label for="asset_id">asset_id</label>
                                <div class="input-group mb-3">
                                    <select id="asset_id" type="text" data-toggle="select" class="form-control"
                                        name="asset_id">
                                        <option value="" selected disabled hidden>please select an option</option>

                                    </select>
                                </div>

                                <label for="start_date">start_date</label>
                                <div class="input-group mb-3">
                                    <input id="start_date" type="date" class="form-control" data-toggle="date"
                                        name="start_date">
                                </div>

                                <label for="expiry_date">expiry_date</label>
                                <div class="input-group mb-3">
                                    <input id="expiry_date" type="date" class="form-control" data-toggle="date"
                                        name="expiry_date">
                                </div>

                                <label for="active">active</label>
                                <div class="input-group mb-3">
                                    <select id="active" type="text" data-toggle="select" class="form-control"
                                        name="active">
                                        <option value="" selected disabled hidden>please select an option</option>
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>

                                <label for="auto_renew">auto_renew</label>
                                        <div class="input-group mb-3">
                                            <select id="auto_renew" type="text" data-toggle="select" class="form-control" name="auto_renew">
                                            <option value="" selected disabled hidden>please select an option</option>
                                            <option value="0">No</option>
                                            <option value="1">Yes</option>
                                            </select>
                                        </div>

                                <!-- <label for="firstname">First Name</label>
                                        <div class="input-group mb-3">
                                            <input id="firstname" type="text" class="form-control" name="firstname">
                                        </div>

                                    <label for="surname">Surname</label>
                                    <div class="input-group mb-3">
                                        <input id="surname" type="text" class="form-control" name="surname">
                                    </div>

                                    <label for="gender">Gender</label>
                                        <div class="input-group mb-3">
                                        <select id="gender" name="gender" class="form-control" data-toggle="select" aria-hidden="true" aria-invalid="false">
                            <option hidden="">select gender
                            </option>  
                            <option value="1">Female</option>
                              <option value="2"> Male</option>
                              <option value="3">Rather not say</option>
                            </select>
                                        </div> -->

                                <!-- <label for="email">email (also user id)</label>
                                    <div class="input-group mb-3">
                                        <input id="email" type="text" class="form-control" name="email">
                                    </div>

                                    <button class="btn bg-warning text-white p-2 m-2 send-welcome-mail">Send GIEQs digital welcome mail</button>

                                    <button class="btn bg-warning text-white p-2 m-2 send-mail">Send Password Reset Mail   </button>
                                    <button class="btn bg-warning text-white p-2 m-2 reset-activity">Fix user login issue   </button>


                                    <br/> -->



                                <!-- <label for="centreName">centreName</label>
                                        <div class="input-group mb-3">
                                            <input id="centreName" type="text" class="form-control" name="centreName">
                                        </div>

                                        <label for="registered_date">registered_date</label>
                                        <div class="input-group mb-3">
                                            <input id="registered_date" data-toggle = "date" type="text" class="form-control" name="registered_date">
                                        </div> -->




                                <!-- <label for="contactPhone">contactPhone</label>
                                        <div class="input-group mb-3">
                                            <input id="contactPhone" type="text" class="form-control" name="contactPhone">
                                        </div>

                                        <label for="centreCity">centreCity</label>
                                        <div class="input-group mb-3">
                                            <input id="centreCity" type="text" class="form-control" name="centreCity">
                                        </div>

                                        <label for="centreCountry">centreCountry</label>
                                        <div class="input-group mb-3">
                                            <input id="centreCountry" type="text" class="form-control" name="centreCountry">
                                        </div>

                                        <label for="trainee">trainee</label>
                                        <div class="input-group mb-3">
                                            <select id="trainee" type="text" data-toggle="select" class="form-control" name="trainee">
                                            <option value="0">No</option>
                                            <option value="1">Yes</option>
                
                                            </select>
                                        </div>
 -->
                                <!--  <label for="emailPreferences">emailPreferences</label>
                                        <div class="input-group mb-3">
                                            <select id="emailPreferences" type="text" data-toggle="select" class="form-control" name="emailPreferences">
                                            <option value="" selected disabled hidden>select</option>
                                            <option value="1">All email ok</option>
                                            <option value="2">Only regarding activities on the site</option>
                                            <option value="3">No email contact</option>
                                            </select>
                                        </div>

                                        <label for="key">key</label>
                                        <div class="input-group mb-3">
                                            <input id="key" type="text" class="form-control" name="key">
                                        </div> -->



                            </div>
                        </form>

                        <div class="px-5 pt-2 mt-2 mb-2 pb-2 text-center">
                            <p class="text-muted text-sm">Data entered here will change the live site</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button"
                            class="submit-<?php echo $databaseName;?>-form btn btn-sm btn-success">Save</button>
                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>

    </div>










    <!-- Core JS - includes jquery, bootstrap, popper, in-view and sticky-kit -->
    <!-- <script src="../../assets/js/purpose.core.js"></script> -->

    <script src="<?php echo BASE_URL; ?>/assets/libs/autosize/dist/autosize.min.js"></script>

    <!-- Datatables -->
  <!-- Purpose JS -->
<!--   <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/css/purpose.css" id="stylesheet">
 -->    

  <!-- <script src="<?php echo BASE_URL; ?>/assets/js/purpose.js"></script>
     -->

     <style>
     
     .select2-selection__arrow
{
    /*display: none;*/
}

.select2.select2-container
{
    width: 100% !important;
}

.select2-container .select2-selection--single,
.select2-container--default.select2-container--focus .select2-selection--multiple,
.select2-container--default .select2-selection--multiple,
.select2-container--default .select2-search--dropdown .select2-search__field
{
    font-size: 1rem;
    line-height: 1.5;

    display: block;

    width: 100%;
    height: calc(1.5em + 1.5rem + 2px);
    padding: .75rem 1.25rem;

    transition: all .2s ease; 

    color: #fff;
    border: 1px solid #142b47;
    border-radius: .25rem;
    background-color: #1b385d;
    background-clip: padding-box;
    box-shadow: inset 0 1px 1px rgba(18, 38, 63, .075);
}
@media (prefers-reduced-motion: reduce)
{
    .select2-container .select2-selection--single,
    .select2-container--default.select2-container--focus .select2-selection--multiple,
    .select2-container--default .select2-selection--multiple,
    .select2-container--default .select2-search--dropdown .select2-search__field
    {
        transition: none;
    }
}
.select2-container .select2-selection--single::-ms-expand,
.select2-container--default.select2-container--focus .select2-selection--multiple::-ms-expand,
.select2-container--default .select2-selection--multiple::-ms-expand,
.select2-container--default .select2-search--dropdown .select2-search__field::-ms-expand
{
    border: 0; 
    background-color: transparent;
}
.select2-container .select2-selection--single:focus,
.select2-container--default.select2-container--focus .select2-selection--multiple:focus,
.select2-container--default .select2-selection--multiple:focus,
.select2-container--default .select2-search--dropdown .select2-search__field:focus
{
    color: #fff;
    border-color: rgba(48, 110, 255, .5);
    outline: 0;
    background-color: #1b385d;
    box-shadow: inset 0 1px 1px rgba(18, 38, 63, .075), 0 0 20px rgba(48, 110, 255, .1);
}
.select2-container .select2-selection--single::-ms-input-placeholder,
.select2-container--default.select2-container--focus .select2-selection--multiple::-ms-input-placeholder,
.select2-container--default .select2-selection--multiple::-ms-input-placeholder,
.select2-container--default .select2-search--dropdown .select2-search__field::-ms-input-placeholder
{
    opacity: 1; 
    color: #95aac9;
}
.select2-container .select2-selection--single::placeholder,
.select2-container--default.select2-container--focus .select2-selection--multiple::placeholder,
.select2-container--default .select2-selection--multiple::placeholder,
.select2-container--default .select2-search--dropdown .select2-search__field::placeholder
{
    opacity: 1; 
    color: #95aac9;
}
.select2-container .select2-selection--single:disabled,
.select2-container .select2-selection--single[readonly],
.select2-container--default.select2-container--focus .select2-selection--multiple:disabled,
.select2-container--default.select2-container--focus .select2-selection--multiple[readonly],
.select2-container--default .select2-selection--multiple:disabled,
.select2-container--default .select2-selection--multiple[readonly],
.select2-container--default .select2-search--dropdown .select2-search__field:disabled,
.select2-container--default .select2-search--dropdown .select2-search__field[readonly]
{
    opacity: 1; 
    background-color: #edf2f9;
}

.select2-container .select2-selection--single .select2-selection__rendered
{
    overflow: inherit;

    padding: 0;

    white-space: inherit; 
    text-overflow: inherit;
}

.select2-container--default .select2-selection--single .select2-selection__rendered
{
    line-height: inherit; 

    color: inherit;
}

.select2-dropdown
{
    padding: .35rem 0;

    border: 1px solid #142b47;
    border-radius: .25rem; 
    background-color: #162e4d;
}

.select2-results__option
{
    padding: .25rem 1.25rem;

    color: #6e84a3; 
    background-color: #fff;
}
.select2-results__option:hover
{
    color: #fff;
}

.select2-container--default .select2-results__option--highlighted[aria-selected],
.select2-container--default .select2-results__option[aria-selected='true']
{
    color: #306eff; 
    background-color: transparent;
}

.select2-container--default .select2-results__option[aria-disabled=true]
{
    color: #95aac9;
}

.select2-container--default.select2-container--focus .select2-selection--multiple,
.select2-container--default .select2-selection--multiple
{
    height: auto;
    min-height: calc(1.5em + 1.5rem + 2px);
}

.select2-container--default .select2-selection--multiple .select2-selection__rendered
{
    display: block;

    margin: 0 0 -.25rem -.25rem;
    padding: 0;
}

.select2-container--default .select2-selection--multiple .select2-selection__choice
{
    font-size: .875rem;
    line-height: 1.5rem;

    display: inline-flex;

    margin: 0 0 .25rem .25rem;
    padding: 0 .5rem;

    color: #fff; 
    border: none;
    border-radius: .2rem;
    background-color: #193659;
}

.select2-container--default .select2-selection--multiple .select2-selection__choice__remove
{
    margin-left: .5rem;

    color: #6e84a3; 

    order: 2;
}
.select2-container--default .select2-selection--multiple .select2-selection__choice__remove:hover
{
    color: #95aac9;
}

.select2-container .select2-search--inline
{
    display: none;
}

.select2-selection[aria-expanded='true']
{
    border-bottom-right-radius: 0 !important; 
    border-bottom-left-radius: 0 !important;
}

.select2-search--dropdown
{
    padding: .25rem 1.25rem;
}

.select2-container--default .select2-search--dropdown .select2-search__field
{
    font-size: .875rem;
    line-height: 1.5;

    height: calc(1.5em + 1rem + 2px);
    padding: .5rem 1.25rem;

    border-radius: .2rem;
}

.form-control-sm + .select2-container .select2-selection--single,
.form-control-sm + .select2-container--default.select2-container--focus .select2-selection--multiple,
.form-control-sm + .select2-container--default .select2-selection--multiple
{
    font-size: .875rem;
    line-height: 1.5;

    height: calc(1.5em + 1rem + 2px);
    padding: .5rem 1.25rem;

    border-radius: .2rem;
}

.form-control-sm + .select2-container--default.select2-container--focus .select2-selection--multiple,
.form-control-sm + .select2-container--default .select2-selection--multiple
{
    min-height: calc(1.5em + 1rem + 2px);
}

.form-control-sm + .select2-container--default .select2-selection--multiple .select2-selection__choice
{
    line-height: 1.3125rem;
}

.form-control-lg + .select2-container .select2-selection--single,
.form-control-lg + .select2-container--default.select2-container--focus .select2-selection--multiple,
.form-control-lg + .select2-container--default .select2-selection--multiple
{
    font-size: 1.25rem;
    line-height: 1.5;

    height: calc(1.5em + 2rem + 2px);
    padding: 1rem 1.875rem;

    border-radius: .375rem;
}

.form-control-lg + .select2-container--default.select2-container--focus .select2-selection--multiple,
.form-control-lg + .select2-container--default .select2-selection--multiple
{
    min-height: calc(1.5em + 2rem + 2px);
}

.form-control-lg + .select2-container--default .select2-selection--multiple .select2-selection__choice
{
    line-height: 1.875rem;
}
     
     </style>
</body>

<?php require BASE_URI . '/footer.php';?>




</html>