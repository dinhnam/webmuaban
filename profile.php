<?php
   session_start();
   include 'module/connect_sql.php';
   function form_error($label_field) {
    global $error;
    if (isset($error[$label_field])) {
        echo "<label style=\"color: red; \">{$error[$label_field]}</label><br/>";
    }
   } 
   if (isset($_SESSION['sdt']) && $_SESSION['sdt']){
       $sdt=$_SESSION['sdt'];
       $ten=$_SESSION['username'];
       $query="SELECT * FROM user  WHERE sdt LIKE '%$sdt%'";
       $res=mysqli_query($link, $query);
       $row= mysqli_fetch_assoc($res);
       $matkhau=$row['matkhau'];
       $query_seach="SELECT * FROM post  WHERE sdt LIKE '%$sdt%'"; 
       $result=mysqli_query($link, $query_seach);
       
   }
   else{
       header("Location:login.php");
   }
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Hồ sơ</title>
        <link href="css/css_index.css" rel="stylesheet" type="text/css"/>
        <link href="css/css_profile.css" rel="stylesheet" type="text/css"/>
        <script src="jquery/jquery-3.2.1.min.js" type="text/javascript"></script>
        <script>
          $(document).ready( function(){//load body truoc
          $(".menu-sub").hide();
	  $(".menu").hover( function(){
		$(this).find('div:first').next().slideToggle(200);
	  });
          });
        </script>
    </head>
    <body>
        <div class="wrapper">
            <?php
            include 'module/header.php';
            ?>
            <div class="select">
            <div class="croll">
                <a href="index.php?danhmuc=tất cả">Trang chủ ></a>
                <a href="profile.php">hồ sơ</a>
            </div>
            </div>
            <div class='profile'>
            <form id="sign_up" action="login.php" method="post">
                    <h5>Thông tin tài khoản</h5>
                    <label>Tên</label><br>
                    <input type="text" name="name_reg" class="txt" size="32" value="<?php echo $ten;?>"/><br />
                    <?php form_error('name_reg');?>
                    <label>số điện thoại</label><br>
                    <input type="text" name="sdt_reg" class="txt" size="32" value="<?php echo $sdt;?>"/><br />
                    <?php form_error('sdt_reg');?>
                    <label>mật khẩu</label><br>
                    <input type="password" name="pass_reg" class="txt" size="32" value="<?php echo $matkhau;?>"/><br />
                    <?php form_error('pass_reg');?>
                    <input  class="submit" type="submit" name="submit_reg" value="cập nhập" /><br />
                    <?php form_error('capnhat'); 
                    if(!empty($flag)){
                        if($flag==TRUE){
                             echo "<label style=\"color: blue; \">bạn đã cập nhật thành công</label><br/>";
                        }
                    }
                    ?>
            </form>   
            <h5>Mặt hàng đã đăng bán</h5>
            <div class="list">
            <?php
            if(mysqli_num_rows($result)>0){
            while($row= mysqli_fetch_assoc($result)){
            ?>
            <div class="product">
            <a href="detail.php?id=<?php echo $row['id']; ?>">
                    <img src="images-upload/<?php echo $row['anh1'];?> " width="200px" height="200px"/>
                    <div class="title">
                    <?php echo substr($row['tieude'],0,34);?><br/>
                    Giá: <?php echo substr($row['gia'],0,15);?>đ<br/>
                    <?php echo substr($row['diachi'],0,35);?><br/>
                    Từ: <?php echo substr($row['ngaydang'],0,22);?>
                    </div>
            </a>
                <a class='xoa' href="profile.php?delete=<?php echo $row['id'];?>"> Xóa</a>
            </div>
            <?php
            }
            }
            ?>
            </div>
                
            </div>
        </div>
    </body>
</html>
