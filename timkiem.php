<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>
<body>
<?php
// kết nối database
include 'ketnoi.php';

// lấy từ khóa tìm kiếm từ form
$lop = $_GET['lop'];

// câu lệnh SQL để lấy danh sách sinh viên có lớp bằng với từ khóa tìm kiếm
$hienthi_sql = "SELECT * FROM sinhvien WHERE lop LIKE '%$lop%' ORDER BY lop, hoten";

// thực thi câu lệnh SQL
$result = mysqli_query($conn, $hienthi_sql);
?>

<!-- hiển thị kết quả tìm kiếm -->
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th>Mã sinh viên</th>
      <th>Họ tên</th>
      <th>Lớp</th>
      <th>Thao tác</th>
    </tr>
  </thead>
  <tbody>
    <?php while ($r = mysqli_fetch_assoc($result)) { ?>
      <tr>
        <td><?php echo $r['masv']; ?></td>
        <td><?php echo $r['hoten']; ?></td>
        <td><?php echo $r['lop']; ?></td>
        <td>
          <a href="edit.php?sid=<?php echo $r['id']; ?>" class="btn btn-success">Sửa</a>
          <a onclick="return confirm('Bạn có muốn xóa sinh viên này không');" href="xoa.php?sid=<?php echo $r['id']; ?>" class="btn btn-danger">Xóa</a>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>
</body>
</html>
