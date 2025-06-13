<?php

define('SITE_TITLE','MAP\'s');
define('BASE_URL',$_SERVER['REQUEST_SCHEME']."://".$_SERVER['HTTP_HOST']);
define('BASE_PATH',$_SERVER['DOCUMENT_ROOT']);

const locationTypes = [
    1 => ["title" => "عمومی", "color" => "#808080"],
    2 => ["title" => "رستوران", "color" => "#ff6347"],
    3 => ["title" => "پارک", "color" => "#228b22"],
    4 => ["title" => "شهربازی", "color" => "#ff69b4"],
    5 => ["title" => "فروشگاه", "color" => "#4682b4"],
    6 => ["title" => "سوپرمارکت", "color" => "#32cd32"],
    7 => ["title" => "پاساژ", "color" => "#6a5acd"],
    8 => ["title" => "مسجد", "color" => "#006400"],
    9 => ["title" => "باشگاه", "color" => "#dc143c"],
    10 => ["title" => "کتابخانه", "color" => "#8b4513"],
    11 => ["title" => "مدرسه", "color" => "#1e90ff"],
    12 => ["title" => "بیمارستان", "color" => "#00bfff"],
    13 => ["title" => "سینما", "color" => "#2f4f4f"],
    14 => ["title" => "موزه", "color" => "#d2691e"],
    15 => ["title" => "فرودگاه", "color" => "#5f9ea0"],
    16 => ["title" => "ایستگاه قطار", "color" => "#778899"],
    17 => ["title" => "رستوران سنتی", "color" => "#cd853f"],
    18 => ["title" => "کافه", "color" => "#a0522d"],
    19 => ["title" => "هتل", "color" => "#9932cc"],
    20 => ["title" => "مرکز خرید", "color" => "#4169e1"],
    21 => ["title" => "پارکینگ", "color" => "#2e8b57"],
    22 => ["title" => "پل", "color" => "#a9a9a9"],
    23 => ["title" => "مسیر پیاده‌روی", "color" => "#20b2aa"],
    24 => ["title" => "اداره پست", "color" => "#ff8c00"],
    25 => ["title" => "بانک", "color" => "#000080"],
    26 => ["title" => "پمپ بنزین", "color" => "#b22222"],
    27 => ["title" => "مرکز ورزشی", "color" => "#ff4500"],
    28 => ["title" => "پارک آبی", "color" => "#00ced1"],
    29 => ["title" => "باغ وحش", "color" => "#556b2f"],
    30 => ["title" => "نمایشگاه", "color" => "#9370db"],
];
