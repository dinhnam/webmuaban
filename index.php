<?php
include 'module/connect_sql.php';
$sql="SELECT * FROM post ORDER BY id DESC limit 0,20";//ORDER BY 'str' DESC
$result= mysqli_query($link, $sql);
if(!$result){
    $error=die("Lỗi: ". mysqli_error($link));
}

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Chợ đồ cũ</title>
        <link href="css/css_index.css" rel="stylesheet" type="text/css"/>
        <script src="jquery/jquery-3.2.1.min.js" type="text/javascript"></script>
        <?php
        include 'script/script_header.php';
        ?>
    </head>
    <body>
        <div class="wrapper">
        <?php
        include 'module/header.php';
        ?>
        <div class="content">
        <div class="select">
            <div class="croll">
                <a href="index.php">Trang chủ ></a>
                <a href="#">Tất cả></a>
                <span>Trang</span>
                <a href="#">1</a>
                <a href="#"><</a>
                <a href="#">2</a>
                <a href="#">3</a>
                <a href="#">4</a>
                <a href="#">5</a>
                <a href="#">6</a>
                <a href="#">7</a>
                <a href="#">8</a>
                <a href="#">9</a>
                <a href="#">10</a>
                <a href="#">11</a>
                <a href="#">12</a>
                <a href="#">13</a>
                <a href="#">14</a>
                <a href="#">15</a>
                <a href="#">16</a>
                <a href="#">17</a>
                <a href="#">18</a>
                <a href="#">19</a>
                <a href="#">20</a>
                <a href="#">></a>
                <a href="#">100</a>
            </div>
            
            <div class="menu-select">
                <select>
                <option value="0">Lọc/ Bỏ lọc</option>
                <option value="1">Cửa hàng</option>
                <option value="2">Cá nhân</option>
                <option value="3">Giá thấp -> cao</option>
                <option value="4">Giá cao -> thấp</option>
                </select>
            </div>
            <div class="menu-select">
                <select>
                <option value="0">Toàn quốc</option>
                <option value="1">Hà nội</option>
                <option value="2">TP Hồ Chí Minh</option>
                <option value="4">Lạng sơn</option>
                <option value="4">Hải phòng</option>
                <option value="3">Thanh hóa</option>
                <option value="4">Nghệ an</option>
                </select>
            </div>
            
        </div>
        <div class="list-product">
            <?php
            if(mysqli_num_rows($result)>0){
            while($row= mysqli_fetch_assoc($result)){
            ?>
            <a href="detail.php?id=<?php echo $row['id']; ?>">
                    <img src="images-upload/<?php echo $row['anh1'];?> " width="237px" height="237px"/>
                    <div class="title">
                    <?php echo substr($row['tieude'],0,42);?><br/>
                    Giá: <?php echo substr($row['gia'],0,15);?>đ<br/>
                    Địa chỉ: <?php echo substr($row['diachi'],0,35);?><br/>
                    Từ: <?php echo substr($row['ngaydang'],0,22);?>
                    </div>
            </a>
            <?php
            }
            }
            ?>
        </div>
        </div>
        <div class="clear"></div>
        <div class="footer">
            <span>Coppyright 2017</span>
        </div>
        </div>
    </body>
</html>
