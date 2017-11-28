<?php
include 'module/connect_sql.php';
$count=10;
$query_seach="SELECT * FROM post ORDER BY id DESC";
if( isset($_GET['danhmuc'])){
    $danhmuc=(string)$_GET['danhmuc'];
    //$query_seach="SELECT * FROM post WHERE  danhmuc LIKE '%$danhmuc%' ORDER BY id DESC";
    //$query_seach="SELECT * FROM post ORDER BY id DESC";
}
else{
    $danhmuc="tất cả";
    //$query_seach="SELECT * FROM post ORDER BY id DESC";
}
if( isset($_GET['khuvuc'])){
    $khuvuc=(string)$_GET['khuvuc'];
}
else{
    $khuvuc="hà nội";
}
if( isset($_GET['trang'])){
    $trang=(int)$_GET['trang'];
}
else{
    $trang=1;
}
if( strcmp($danhmuc,"tất cả")){
    $query_seach="SELECT * FROM post  WHERE danhmuc LIKE '%$danhmuc%' ORDER BY id DESC";
    if(strcmp($khuvuc,"hà nội")){
    $query_seach="SELECT * FROM post  WHERE danhmuc LIKE '%$danhmuc%' and khuvuc LIKE '%$khuvuc%' ORDER BY id DESC";
    }
}else{
    if(strcmp($khuvuc,"hà nội")){
    $query_seach="SELECT * FROM post WHERE khuvuc LIKE '%$khuvuc%' ORDER BY id DESC";
    }
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
          window.location=""+valueSelected;
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
                <option <?php echo "value=\"index.php?danhmuc=$danhmuc&khuvuc=hà nội\""; if(isset($khuvuc)&&$khuvuc=="hà nội"){echo" selected='selected'";}?>>Hà nội</option>
                <option <?php echo "value=\"index.php?danhmuc=$danhmuc&khuvuc=quận hoàn kiếm\""; if(isset($khuvuc)&&$khuvuc=="quận hoàn kiếm"){echo" selected='selected'";}?>>quận hoàn kiếm</option>
                <option <?php echo "value=\"index.php?danhmuc=$danhmuc&khuvuc=quận ba đình\""; if(isset($khuvuc)&&$khuvuc=="quận ba đình"){echo" selected='selected'";}?>>quận ba đình</option>
                <option <?php echo "value=\"index.php?danhmuc=$danhmuc&khuvuc=quận đống đa\""; if(isset($khuvuc)&&$khuvuc=="quận đống đa"){echo" selected='selected'";}?>>quận đống đa</option>
                <option <?php echo "value=\"index.php?danhmuc=$danhmuc&khuvuc=quận hai bà trưng\""; if(isset($khuvuc)&&$khuvuc=="quận hai bà trưng"){echo" selected='selected'";}?>>quận hai bà trưng</option>
                <option <?php echo "value=\"index.php?danhmuc=$danhmuc&khuvuc=quận thanh xuân\""; if(isset($khuvuc)&&$khuvuc=="quận thanh xuân"){echo" selected='selected'";}?>>quận thanh xuân</option>
                <option <?php echo "value=\"index.php?danhmuc=$danhmuc&khuvuc=quận cầu giấy\""; if(isset($khuvuc)&&$khuvuc=="quận cầu giấy"){echo" selected='selected'";}?>>quận cầu giấy</option>
                <option <?php echo "value=\"index.php?danhmuc=$danhmuc&khuvuc=quận hoàng mai\""; if(isset($khuvuc)&&$khuvuc=="quận hoàng mai"){echo" selected='selected'";}?>>quận hoàng mai</option>
                <option <?php echo "value=\"index.php?danhmuc=$danhmuc&khuvuc=quận long biên\""; if(isset($khuvuc)&&$khuvuc=="quận long biên"){echo" selected='selected'";}?>>quận long biên</option>
                <option <?php echo "value=\"index.php?danhmuc=$danhmuc&khuvuc=quận tây hồ\""; if(isset($khuvuc)&&$khuvuc=="quận tây hồ"){echo" selected='selected'";}?>>quận tây hồ</option>
                <option >huyện đông anh</option>
                <option >huyện sóc sơn</option>
                <option >huyện thanh trì</option>
                <option >quận hà đông</option>
                <option >thị xã sơn tây</option>
                <option >huyện đan phượng</option>
                <option >huyện quốc oai</option>
                <option >huyện thạch thất</option>
                <option >huyện chương mỹ</option>
                <option >huyện thường tín</option>
                <option >huyện phú xuyên</option>
                
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
                    <?php echo substr($row['tieude'],0,34);?><br/>
                    Giá: <?php echo substr($row['gia'],0,15);?>đ<br/>
                    <?php echo substr($row['diachi'],0,35);?><br/>
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
