<?php


function insertLocation($params)
{
    $validLatLng = validateLatLng($params['lat'], $params['lng']);
    if (!$validLatLng['status']) {
        jsonresponse($validLatLng['status'], $validLatLng['message']);
        return;
    }
    if (mb_strlen($params['title'], 'UTF-8') < 3) {
        jsonresponse(false, 'عنوان باید بیشتر از 2 کاراکتر باشد');
        return;
    }
    $validtitle = sanitizeInput($params['title']);
    if (!array_key_exists($params['type'], locationTypes)) {
        jsonresponse(false, 'لطفا از نوع های موجود انتخاب کنید');
        return;
    }
    try {
        global $pdo;
        $sql = "INSERT INTO locations(user_id,title,lat,lng,type) VALUES (?,?,?,?,?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([1, $validtitle, $validLatLng['data']['lat'], $validLatLng['data']['lng'], $params['type']]);
        jsonresponse(true, 'اطلاعات با موفقیت ثبت شد منتظر تایید مدیر باشید.');
    } catch (PDOException $e) {
        jsonresponse(false, 'خطایی در ثبت اطلاعات رخ داد. لطفا دوباره تلاش کنید.');

    }

}

function validateLatLng($lat, $lng)
{
    if (!is_numeric($lat) || !is_numeric($lng)) {
        return [
            'status' => false,
            'message' => 'طول و عرض جغرافیایی باید مقدار عددی داشته باشند'
        ];
    }
    return [
        'status' => true,
        'data' => [
            'lat' => (float)$lat,
            'lng' => (float)$lng
        ]
    ];
}
