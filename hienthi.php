<!DOCTYPE html>
<?php
 session_start();
?>
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
  <title>hiển thị danh sách sinh viên</title>
  <style>
    .search-form {
      display: flex;
      align-items: center;
      justify-content: center;
      margin-top: 20px;
    }

    .search-form input[type="text"] {
      padding: 10px;
      font-size: 16px;
      border: none;
      border-radius: 4px 0 0 4px;
    }

    .search-form button[type="submit"] {
      padding: 10px 16px;
      background-color: #4CAF50;
      color: white;
      font-size: 16px;
      border: none;
      border-radius: 0 4px 4px 0;
      cursor: pointer;
    }

    .search-form input[type="text"]::placeholder {
      color: #ccc;
    }
  </style>
</head>

<body>
  <div class="container">
    <h1> Danh sách sinh viên</h1>
    <!--<a href="them.html"class="btn btn-info">Thêm sinh viên</a>
         Button to Open the Modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
      Thêm sinh viên
    </button>
    <br>
    <?php require_once 'ketnoi.php';

    ?>
      <div class="search-form">
    <form action="timkiem.php" method="get">
      <input type="text" name="lop" placeholder="Tìm kiếm theo lớp...">
      <button type="submit">Tìm kiếm</button>
    </form>
  </div>


    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th>Mã sinh viên</th>
          <th>Họ tên</th>
          <th>Lớp</th>
          <th> thao tác</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // ket noi
        // cau lenh
        $hienthi_sql = "SELECT * FROM sinhvien order by lop, hoten";
        // thuc thi cau lenh
        $result = mysqli_query($conn, $hienthi_sql);
        // duyet qua result và in ra
        while ($r = mysqli_fetch_assoc($result)) {
          ?>
          <tr>
            <td>
              <?php echo $r['masv']; ?>
            </td>
            <td>
              <?php echo $r['hoten']; ?>
            </td>
            <td>
              <?php echo $r['lop']; ?>
            </td>
            <td><a href="edit.php?sid=<?php echo $r['id']; ?>" class="btn btn-success"> sửa</a>
              <a onclick="return confirm ('bạn có muốn xóa sinh viên này không');"
                href="xoa.php?sid=<?php echo $r['id']; ?>" class="btn btn-danger">xóa
            </td>
          </tr>
          <?php
        }
        ?>
      </tbody>
    </table>

  </div>
  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Form thêm sinh viên</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <form action="them.php" method="post">
            <div class="form-group">
              <label for="hoten"></label>Họ tên<input type="text" id="hoten" class="form-control" name="hoten">
            </div>
            <div class="form-group">
              <label for="masv"></label>Mã sinh viên<input type="text" id="masv" class="form-control" name="masv">
            </div>
            <div class="form-group">
              <label for="lop"></label>Lớp<input type="text" id="lop" class="form-control" name="lop">
            </div>
            <button class="btn btn-success">Thêm sinh viên</button>
          </form>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>
</body>
</html>