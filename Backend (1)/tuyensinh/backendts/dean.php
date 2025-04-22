<?php
$conn = new mysqli("localhost", "root", "", "tuyensinhtmu");
$conn->set_charset("utf8");

// Lấy ID nếu đang sửa
$id = $_GET['id'] ?? null;
$edit_data = null;

// Nếu có ID thì lấy dữ liệu từ DB
if ($id) {
    $res = $conn->query("SELECT * FROM noidung_dean WHERE id = " . intval($id));
    $edit_data = $res->fetch_assoc();
}

// Xử lý khi submit form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $muc = $_POST['muc'];
  $tieude = $conn->real_escape_string($_POST['tieude']);
  $noidung = $conn->real_escape_string($_POST['noidung']);
  $filename = '';

   // Upload hình ảnh nếu có
   if (!empty($_FILES['hinhanh']['name'])) {
    $upload_dir = "uploads/";
    if (!is_dir($upload_dir)) mkdir($upload_dir);
    
    $filename = time() . "_" . basename($_FILES['hinhanh']['name']);
    $target_file = $upload_dir . $filename;

    // **Kiểm tra upload file**
    if (move_uploaded_file($_FILES['hinhanh']['tmp_name'], $target_file)) {
        // File upload thành công
    } else {
        echo "⚠️ Có lỗi trong quá trình upload ảnh."; // **Thông báo lỗi nếu upload không thành công**
        exit(); // **Dừng thực thi nếu upload không thành công**
    }
}

  if ($_POST['id']) {
      // Cập nhật
      $update_id = intval($_POST['id']);
      $query = "UPDATE noidung_dean  SET muc='$muc', tieude='$tieude', noidung='$noidung'";
      if ($filename) {
          $query .= ", hinhanh='$filename'";
      }
      $query .= " WHERE id=$update_id";
      $conn->query($query);
  } else {
      // Thêm mới
      $conn->query("INSERT INTO noidung_dean  (muc, tieude, noidung, hinhanh, ngaydang) VALUES ('$muc', '$tieude', '$noidung', '$filename', NOW())");
  }

  header("Location: dean.php"); exit();
}
// xóa nè 
if (isset($_GET['delete'])) {
  $delete_id = intval($_GET['delete']);
  $conn->query("DELETE FROM noidung_dean  WHERE id = $delete_id");
  header("Location: dean.php"); exit();
}

?>

<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Quản lý nội dung - Đế án tuyển sinh </title>
  <link rel="stylesheet" href="style.css"> <!-- Nhúng CSS tại đây -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.10.1/tinymce.min.js"></script>
<script>
  tinymce.init({
    selector: 'textarea'  // Chọn phần tử textarea
  });
</script>
</head>
<body>
<a href="indexts.php" class="button-link">Quản lý Tuyển sinh </a>

  <h2>Quản lý nội dung - Đề án tuyển sinh </h2>
  <form action="" method="POST" enctype="multipart/form-data">
  <input type="hidden" name="id" value="<?= $edit_data['id'] ?? '' ?>">
  <label for="hinhanh">Hình ảnh:</label>
<input type="file" name="hinhanh" accept="image/*">
<?php if (!empty($edit_data['hinhanh'])): ?>
  <p>Ảnh hiện tại: <img src="uploads/<?= $edit_data['hinhanh'] ?>" width="100"></p>
<?php endif; ?>

    <label for="muc">Chọn mục:</label>
    <select name="muc" id="muc" required>
      <option value="thongbao" <?= (isset($edit_data) && $edit_data['muc']=='thongbao')?'selected':'' ?>>Thông báo</option>
      <option value="vanban" <?= (isset($edit_data) && $edit_data['muc']=='vanban')?'selected':'' ?>>Bản tin </option>
      
    </select>

    <label for="tieude">Tiêu đề:</label>
    <input type="text" name="tieude" id="tieude" required style="width:100%;" value="<?= htmlspecialchars($edit_data['tieude'] ?? '') ?>">

    <label for="noidung">Nội dung:</label>
    <textarea name="noidung" id="noidung"><?= htmlspecialchars($edit_data['noidung'] ?? '') ?></textarea>

    <button type="submit" class= "submit-button">
  <?= $edit_data ? 'Cập nhật' : 'Lưu nội dung' ?>
</button>
<?php if ($edit_data): ?>
  <a href="dean.php" class="button-link">Huỷ sửa</a>
<?php endif; ?>
  </form>
  <hr><h3>Danh sách nội dung đã lưu</h3>
<table border="1" cellpadding="10" cellspacing="0" class="table">
  <tr><th>ID</th><th>Mục</th><th>Tiêu đề</th> <th>Hình ảnh</th><th>Hành động</th></tr>
  <?php
  $conn = new mysqli("localhost", "root", "", "tuyensinhtmu");
  $conn->set_charset("utf8");
  $res = $conn->query("SELECT * FROM noidung_dean ORDER BY id DESC");
  while ($r = $res->fetch_assoc()) {
    echo "<tr>
            <td>{$r['id']}</td>
            <td>{$r['muc']}</td>
            <td>{$r['tieude']}</td>
            <td>";
            if ($r['hinhanh']) {
                echo "<img src='uploads/{$r['hinhanh']}' width='80'>";
            } else {
                echo "-";
            }
            echo "</td>
            <td>
              <a href='?id={$r['id']}' class= 'edit' >Sửa</a>    
              <a href='?delete={$r['id']}' class =' delete' onclick=\"return confirm('Bạn chắc chắn muốn xoá nội dung này?')\">Xoá</a>
            </td>";
          }      
  ?>
</table>
</body>
</html>
