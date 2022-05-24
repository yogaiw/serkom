<?php 
    require __DIR__.'/connection.php';
    require __DIR__.'/config.php';

    include_once __DIR__.'/models/Pesanan.php';

    $pesanan = new Pesanan;
    $result = $pesanan->showResult();
?>
<!DOCTYPE html>
<html>
    <head>
        Result
    </head>
    <body>
        <?php echo json_encode($result) ?>
    </body>
</html>

