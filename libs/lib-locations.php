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
        if (isset($_SESSION['loginadmin'])) {
            $status = 1;
            $id = 0;
        } elseif (isset($_SESSION['loginuser'])) {
            $status = $_SESSION['loginuser'][0]['is_verified'];
            $id = $_SESSION['loginuser'][0]['id'];
        }
        global $pdo;
        $sql = "INSERT INTO locations(user_id,title,lat,lng,type,status) VALUES (?,?,?,?,?,?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id, $validtitle, $validLatLng['data']['lat'], $validLatLng['data']['lng'], $params['type'], $status]);
        $msg = $status ? 'ادمین محترم اطلاعات با موفقیت ثبت شد' : 'اطلاعات با موفقیت ثبت شد منتظر تایید مدیر باشید.';
        jsonresponse(true, $msg);
    } catch (PDOException $e) {
        jsonresponse(false,'خطایی در ثبت اطلاعات روی داده است لطفا با ادمین تماس برقرار کنید.');
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


function getlocation($params = [],$is_search=false)
{
    global $pdo;
    $conditions = [];
    $values = [];

    if (isset($params['status'])) {
        if (!in_array($params['status'], [0, 1])) {
            return;
        }
        $conditions[] = "status = :status";
        $values[':status'] = $params['status'];
    }

    if (isset($params['keyword']) && $params['keyword'] !== '') {
            $conditions[] = "status = 1";
            $conditions[] = "title LIKE :keyword";
        $values[':keyword'] = $params['keyword'] . '%';
    }
    if($is_search){
        $conditions[] = "status = 1";
    }
    $where = '';
    if (!empty($conditions)) {
        $where = ' WHERE ' . implode(' AND ', $conditions);
    }

    $sql = "SELECT * FROM locations" . $where;
    $stmt = $pdo->prepare($sql);
    $stmt->execute($values);
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}


function getloc($id){
    global $pdo;
    $sql = "SELECT * FROM locations WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function statusToggle($id){
    global $pdo;
    $sql = "UPDATE locations set status = (1-status) WHERE id = ?";
    $stmt = $pdo ->prepare($sql);
    $stmt->execute([$id]);
    return jsonresponse($stmt->rowCount(),$stmt->rowCount());
}
function deleteloc($id){
    global $pdo;
    $sql = "DELETE FROM locations WHERE id = ?";
    $stmt = $pdo ->prepare($sql);
    $stmt->execute([$id]);
    return jsonresponse($stmt->rowCount(),$stmt->rowCount());
}