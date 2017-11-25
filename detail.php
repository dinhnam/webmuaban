<?php
include 'module/connect_sql.php';

if( isset($_GET['id'])){
    $id_post=(int)$_GET['id'];
    $query_select="SELECT * FROM post WHERE  id LIKE '%$id_post%'";
    if($result=mysqli_query($link, $query_select)){
    if(mysqli_num_rows($result)>0){
    $row= mysqli_fetch_assoc($result);
    $img=array();
    $name=$row['ten'];
    $sdt=$row['sdt'];
    $khuvuc=$row['khuvuc'];
    $danhmuc=$row['danhmuc'];
    $tieude=$row['tieude'];
    $diachi=$row['diachi'];
    $gia=$row['gia'];
    $chitiet=$row['chitiet'];
    $ngaydang=$row['ngaydang'];
    $img[0]=$row['anh1'];
    $img[1]=$row['anh2'];
    $img[2]=$row['anh3'];
    $img[3]=$row['anh4'];
    }
    }
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Chợ đồ cũ</title>
        <link href="css/css_index.css" rel="stylesheet" type="text/css"/>
        <link href="css/css_detail.css" rel="stylesheet" type="text/css"/>
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
        <div class="detail">
            <div class="select">
            <div class="croll">
                <a href="#">Trang chủ ></a>
                <a href="#">
                    <?php
                    if( isset($row)){
                        echo "$danhmuc>";
                    }
                    ?>
                </a>
                <span>
                    <?php
                    if( isset($row)){
                        echo $tieude;
                    }
                    ?>
                </span>
                
            </div>
            </div>
            <div class="image">
                
                <?php
                if( isset($img)){
                for($i=0;$i<4;$i++){
                    if(strcmp($img[$i],'')){
                       echo "<img src=\"images-upload/$img[$i]\"/>"; 
                    }
                }
                }
                ?>
                
            </div> 
            <div class="details">
                <?php if( isset($row)){
                ?>
                <ul>
                    <li>
                        Tiêu đề: <?php echo $tieude; ?>
                    </li>
                    <li>
                        Giá bán: <?php echo $gia; ?>
                    </li>
                    <li>
                        Tên người đăng: <?php echo $name; ?>
                    </li>
                    <li>
                        Số điện thoại người bán: <?php echo $sdt; ?>
                    </li>
                    <li>
                        Địa chỉ giao dịch: <?php echo $diachi; ?>
                    </li>
                    <li>
                        Ngày đăng tin: <?php echo $ngaydang; ?>
                    </li>
                    <li>
                        Chi tiết sản phẩm: <?php echo $chitiet; ?>
                    </li>
                    
                </ul>
                <?php
                }
                ?>
            </div>
        </div>
        <div class="footer">
            <span>Coppyright 2017</span>
        </div>
        </div>
    </body>
</html>
