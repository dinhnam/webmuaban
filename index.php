<?php
include 'module/connect_sql.php';

$count=10;
if( isset($_GET['danhmuc'])){
    $danhmuc=(string)$_GET['danhmuc'];
    if(strcmp($danhmuc,"tất cả")){
    $query_seach="SELECT * FROM post WHERE  danhmuc LIKE '%$danhmuc%' ORDER BY id DESC";
    }
    else{   
    $query_seach="SELECT * FROM post ORDER BY id DESC";
    }
}
else{
    $danhmuc="tất cả";
    $query_seach="SELECT * FROM post ORDER BY id DESC";
}

if($res=mysqli_query($link, $query_seach)){
    $num= mysqli_num_rows($res);
    if($num>0){
        $result=$res;
        $num_page= CEIL($num/$count);
    }
    else{
        $num_page=1;
    }
}

if( isset($_GET['trang'])){
    $trang=(int)$_GET['trang'];
}
else{
    $trang=1;
}
 $start_page=($trang-1)*$count;
 $query= $query_seach." limit $start_page , $count";
 $result=mysqli_query($link, $query);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Chợ đồ cũ</title>
        <link href="css/css_index.css" rel="stylesheet" type="text/css"/>
        <script src="jquery/jquery-3.2.1.min.js" type="text/javascript"></script>
        <script>
          $(document).ready( function(){//load body truoc
          $(".menu-sub").hide();
	  $(".menu").hover( function(){
		$(this).find('div:first').next().slideToggle(200);
	  });
          $('select').on('change', function (e) {
          var optionSelected = $("option:selected", this);
          var valueSelected = this.value;
          
          
          });
          });
        </script>
    </head>
    <body>
        <div class="wrapper">
        <?php
        include 'module/header.php';
        ?>
        <div class="content">
        <div class="select">
            <div class="croll">
                <a href="index.php?danhmuc=tất cả">Trang chủ ></a>
                <?php 
                if(isset($danhmuc)){
                echo "<a href=\"index.php?danhmuc=$danhmuc\">$danhmuc></a>";
                echo "<span>trang</span>";
                echo "<a href=\"index.php?danhmuc=$danhmuc&trang=1\">1</a>";
                $next_page=$trang+1;
                $back_page=$trang-1;
                if($back_page>0){
                echo "<a href=\"index.php?danhmuc=$danhmuc&trang=$back_page\"><</a>";
                }
                for($i=2;$i<$num_page;$i++){
                    echo "<a href=\"index.php?danhmuc=$danhmuc&trang=$i\">$i</a>";
                }
                if($next_page<$num_page){
                echo "<a href=\"index.php?danhmuc=$danhmuc&trang=$next_page\">></a>";
                }
                if($num_page>1){
                echo "<a href=\"index.php?danhmuc=$danhmuc&trang=$num_page\">$num_page</a>";
                }
                }
                ?>
            </div>
            
            <div class="menu-select">
                <select id="select_1">
                <option value="0">Lọc/ Bỏ lọc</option>
                <option value="1">Giá thấp -> cao</option>
                <option value="2">Giá cao -> thấp</option>
                </select>
            </div>
            <div class="menu-select">
                <select id="select_2">
                <option value="toàn quốc">Toàn quốc</option>
                <option value="hà nội">Hà nội</option>
                <option value="sài gòn">TP Hồ Chí Minh</option>
                <option value="lạng sơn">Lạng sơn</option>
                <option value="hải phòng">Hải phòng</option>
                <option value="thanh hóa">Thanh hóa</option>
                <option value="nghệ an">Nghệ an</option>
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
                    <?php echo substr($row['tieude'],0,38);?><br/>
                    Giá: <?php echo substr($row['gia'],0,15);?>đ<br/>
                    Địa chỉ: <?php echo substr($row['diachi'],0,34);?><br/>
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
