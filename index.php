<?php
// エラーを表示する
ini_set( 'display_errors', 1 );

require_once 'function.php';

$pdo = connectDB();

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    // 画像を取得

    $sql = 'SELECT * FROM k_table ORDER BY created_at DESC';
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $image = $stmt->fetchAll();


} else {
    // 画像を保存
    if (!empty($_FILES['image']['name'])) {
        $name = $_FILES['image']['name'];
        $type = $_FILES['image']['type'];
        $content = file_get_contents($_FILES['image']['tmp_name']);
        $size = $_FILES['image']['size'];

        $sql = 'INSERT INTO k_table(image_name, image_type, image_content, image_size, created_at)
                VALUES (:image_name, :image_type, :image_content, :image_size, now())';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':image_name', $name, PDO::PARAM_STR);
        $stmt->bindValue(':image_type', $type, PDO::PARAM_STR);
        $stmt->bindValue(':image_content', $content, PDO::PARAM_STR);
        $stmt->bindValue(':image_size', $size, PDO::PARAM_INT);
        $stmt->execute();
    }
    unset($pdo);
    header('Location:index.php');
    exit();
}

unset($pdo);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>BENTO</title>
    <script src="https://kit.fontawesome.com/3e8aa2c505.js" crossorigin="anonymous"></script>

    </head>
<body>
<header>
    <div class="bg-image">
        <!-- BENTOの説明 -->
        <div class="content">
          <h1 class="inner">BENTO</h1>
          <div id="mean" style="display: none;">
            <p class="meaning">is</p>
            <p class="meaning">Japanese culture</p>
            <p class="meaning">For someone you love</p>
          </div>
        </div>
       </div>
</header>

<main>


            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <br>

 <input type="file" name="image" id="image" required >
                    <br>
                    <button type="submit" class="btn save">SAVE</button>

                </div>
            </form>



<div id="logs">
        <?php for ($i = 0; $i < count($image); $i++): ?>
        <img src="image.php?id=<?= $image[$i]['image_id']; ?>" width="100px" height="100px" class="specify">
        
        <a href="javascript:void(0);" 
            onclick="var ok = confirm('Are you sure?'); if (ok) location.href='delete.php?id=<?= $image[$i]['image_id']; ?>'">
        <i class="fas fa-trash-restore"></i>
        <?php endfor; ?>
       

</div>
 

</main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="./js/app.js"></script>

</body>
</html>