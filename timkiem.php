<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="your-custom-style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <title>Document</title>
    <style>
        img{
            width: 250px;
            height:300px
        }
        .buttons{
            display:flex;
            text-align: center;
        }
        .muangay{
            position: relative;
            left: 150px;
            top: 8px;
        }
        a{
            text-decoration: none;
        }
    </style>
</head>
<body>
    <center>
    <form action="timkiem.php" method="post">
        <input type="text" placehoder="Tìm kiếm sản phẩm" name="tukhoa">
        <input type="submit" name="timkiem" value="Tìm kiếm">
    </form>
    </center>
   
<br><br>
    <?php 
       if(isset($_POST['timkiem'])){
        $connect=mysqli_connect("localhost","root","","products");
        $key=$_POST['tukhoa'];
        $query_search="SELECT * from sanpham where ten like '%$key%'";
        $kq=$connect->query($query_search);
        if (mysqli_num_rows($kq) > 0) {
            ?>
                <div class="row">
            <?php
                while ($row = mysqli_fetch_assoc($kq)) {
            ?>
                    <div class="col-md-3">
                    <div class="card">
                    <img src="<?php echo $row['anh'] ?>" class="card-img-top">
                    <div class="card-body">
                    <h5 class="card-title"><?php echo $row['ten'] ?></h5>
                    <p class="card-text"><?php echo $row['mota'] ?></p>
                    <p class="card-text"><?php echo $row['gia']?></p>
                    <a href="detail.php?id=<?php echo $row['id']?>">Chi tiết sản phẩm</a>
                    <br>
                        <div class="buttons">
                            <div><a href="themgiohang.php" ><ion-icon name="cart-outline" style="font-size: 50px"></ion-icon</a></div>
                            <div class="muangay"><a href="checkout.php" class="btn btn-primary">Mua ngay</a></div>
                        </div>                    
                    </div></div></div>
            <?php     
                }
            ?>
                </div>
            <?php
            } else {
                echo 'Không có sản phẩm nào';
            }
        };  
            
        ?>
</body>
</html>