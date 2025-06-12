<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Map Panel</title>
    <link href="favicon.png" rel="shortcut icon" type="image/png">

    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/styles.css<?= "?v=" . rand(99, 9999999) ?>" />
    <style>
        body {
            background: #f2f2f2;
        }

        a {
            text-decoration: none;
        }

        h1 {
            text-align: center;
        }

        .main-panel {
            width: 1030px;
            margin: 30px auto;
        }

        .box {
            background: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            box-shadow: 0px 3px 3px #EEE;
            margin-bottom: 20px;
        }

        table.tabe-locations {
            width: 100%;
            border-collapse: collapse;
        }

        .statusToggle {
            background: #eee;
            color: #686868;
            border: 0;
            padding: 3px 12px;
            border-radius: 20px;
            cursor: pointer;
            font-size: 13px;
            font-weight: 400;
            font-family: iransans;
            display: inline-block;
            margin: 0 3px;
            min-width: 15px;

            text-align: center;
        }
            .statusToggle-delete {
            background: #eee;
            color: #686868;
            border: 0;
            padding: 3px 12px;
            border-radius: 20px;
            cursor: pointer;
            font-size: 13px;
            font-weight: 400;
            font-family: iransans;
            display: inline-block;
            margin: 0 3px;
            min-width: 15px;

            text-align: center;
        }

        .statusToggle.all {
            background: #007bec;
            color: #ffffff;
        }

        .statusToggle.active {
            background: #0c8f10;
            color: #ffffff;
            margin-left: 11px;
            text-align: center;
            margin-right: 15px;
            ;
        }

        .statusToggle:hover,
        button.preview:hover {
            opacity: 0.7;
        }

        button.preview {
            padding: 0 10px;
            background: none;
            border: none;
            font-size: 20px;
            cursor: pointer;
            float: left;
        }

        tr {
            line-height: 36px;
        }

        tr:nth-child(2n) {
            background: #f7f7f7;
        }

        td {
            padding: 0 5px;
        }

        iframe#mapWivdow {
            width: 100%;
            height: 500px;
        }

        .text-center {
            text-align: center;
        }

        .deleteloc {
            background: rgb(252, 31, 31);
            color: #ffffff;
        }
    </style>
</head>

<body>
    <div class="main-panel">
        <h1>پنل مدیریت <span style="color:#007bec">مپ</span></h1>
        <div class="box">
            <a class="statusToggle" href="<?= BASE_URL ?>" target="_blank">🗺️نقشه</a>
            <a class="statusToggle all" href="<?= BASE_URL ?>/adm.php">همه</a>
            <a class="statusToggle active" href="?status=1">فعال</a>
            <a class="statusToggle" href="?status=0">غیرفعال</a>
            <?php if (isset($_SESSION['msg'])): ?>
                <?php if ($_SESSION['msg']['status']): ?>
                    <p style="margin-left: 45px;float: right;margin-top: 1px;color:green"><?= $_SESSION['msg']['message'] ?></p>
                <?php else: ?>
                    <p style="margin-left: 45px;float: right;margin-top: 1px;color:red"><?= $_SESSION['msg']['message'] ?></p>
                <?php endif; ?>
                <?php unset($_SESSION['msg']);  ?>
            <?php endif; ?>
            <a class="statusToggle" href="?logout=1" style="float:left" target="_blank">خروج</a>
        </div>
        <div class="box">
            <table class="tabe-locations">
                <thead>
                    <tr>
                        <th style="width:40%">عنوان مکان</th>
                        <th style="width:15%" class="text-center">تاریخ ثبت</th>
                        <th style="width:10%" class="text-center">lat</th>
                        <th style="width:10%" class="text-center">lng</th>
                        <th style="width:20%;padding: 0px 21px;">وضعیت</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($locations)): ?>
                        <?php foreach ($locations as $key => $value): ?>
                            <tr>
                                <td><?= $value->title ?></td>
                                <td class="text-center"><?= verta($value->created_at)->format("d F Y") ?></td>
                                <td class="text-center"><?= $value->lat ?></td>
                                <td class="text-center"><?= $value->lng ?></td>
                                <td>
                                    <button class="statusToggle <?= $value->status ? 'active' : ''; ?>" data-loc='<?= $value->id ?>'><?= $value->status ? 'فعال' : 'غیر فعال' ?> </button>
                                    <button class="statusToggle-delete deleteloc" data-loc='<?= $value->id ?>' onclick='return confirm("موقعیت مکانی <?=$value->title?> حذف شود ؟ ");'>حذف</button>
                                    <button class="preview" style="margin-right: 15px;" data-loc='<?= $value->id ?>'>👁️‍🗨️</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center" style="padding: 10px 5px;">هیچ داده ای وجود ندارد</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

    </div>

    <div class="modal-overlay-adm" style="display: none;">
        <div class="modal-adm">
            <span class="close"><img width="24" height="24" src="https://img.icons8.com/color/48/delete-sign--v1.png" alt="delete-sign--v1" /></span>
            <div class="modal-content">
                <iframe id='mapWivdow' src="#" frameborder="0"></iframe>
            </div>
        </div>
    </div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="<?= BASE_URL ?>/assets/js/script-adm.js<?= "?v=" . rand(10000, 50000) ?>"></script>
    <script>
        $(document).ready(function() {
            $('.preview').click(function() {
                $('.modal-overlay-adm').fadeIn();
                $('#mapWivdow').attr('src', '<?= BASE_URL . '?loc=' ?>' + $(this).attr('data-loc'));
            });
            $('.modal-overlay-adm .close').click(function() {
                $('.modal-overlay-adm').fadeOut();
            });
            $('.statusToggle').click(function() {
                let btn = $(this);
                let locid = $(this).attr('data-loc');
                $.ajax({
                    url: '<?= BASE_URL . '/process/statusToggle.php' ?>',
                    method: 'POST',
                    data: {
                        loc: locid
                    },
                    success: function(response) {
                        if (response.status) {
                            btn.toggleClass('active')
                            if (btn.hasClass('active')) {
                                btn.html('فعال');
                            } else {
                                btn.html('غیر فعال');
                            }

                        }
                    },

                });
            });
            $('.deleteloc').click(function(){
                let btn = $(this);
                let locid = $(this).attr('data-loc');
                $.ajax({
                    url: '<?= BASE_URL . '/process/deleteloc.php' ?>',
                    method: 'POST',
                    data: {
                        loc: locid
                    },
                    success: function(response) {
                        if(response.status){
                            btn.closest('tr').remove();
                        }
                    },
                    error: function(error){
                        console.log(error);
                    }

                });
            })
        });
    </script>
</body>

</html>