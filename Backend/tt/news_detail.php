<?php
// Kết nối CSDL
$conn = new mysqli('localhost', 'root', '', 'db');
$id = $_GET['id'];
$sql = "SELECT * FROM baiviet WHERE id = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?= $row['tieu_de'] ?></title>

</head>
<body>

    <h1><?= htmlspecialchars($row['tieu_de']) ?></h1>
    <div class="meta">
        Ngày đăng: <?= date("d/m/Y", strtotime($row['ngay_dang'])) ?> |
        <?= htmlspecialchars($row['chuyenmuc']) ?> |
        <a href="user.php" class="back-link">Quay lại</a>
    </div>

    <img src="uploads/<?= $row['hinhanh'] ?>" alt="<?= $row['tieu_de'] ?>">

    <h2><?= htmlspecialchars($row['mo_ta_ngan']) ?></h2>
    <div>
        <?= nl2br($row['noidung']) ?>
    </div>

</body>
</html>
