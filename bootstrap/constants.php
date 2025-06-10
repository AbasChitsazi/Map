<?php

define('SITE_TITLE','MAP\'s');
define('BASE_URL',$_SERVER['REQUEST_SCHEME']."://".$_SERVER['HTTP_HOST']);
define('BASE_PATH',$_SERVER['DOCUMENT_ROOT']);

const locationTypes =[
    1 => "عمومی",
    2 => "رستوران",
    3 => "پارک",
    4 => "شهربازی",
    5 => "فروشگاه",
    6 => "سوپرمارکت",
    7 => "پاساژ",
];