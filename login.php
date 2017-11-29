<?php
function form_error($label_field) {
    global $error;
    if (isset($error[$label_field])) {
        echo "<label style=\"color: red;\">{$error[$label_field]}</label><br/>";
    }
}
if($_SERVER['REQUEST_METHOD']=="POST"){
	// phất cờ
	$error=array();
        
        if(isset($_POST['submit_login']) ){
            if(empty($_POST['sdt'])){
             $error['sdt']="bạn cần nhập số điện thoại";
	    }
	    else{
            $sdt=$_POST['sdt'];
	    }
        
	    if(empty($_POST['password'])){
            $error['password']="bạn cần nhập password";
	    }
	    else{
            $password=$_POST['password'];    
            }
            
            if(empty($error)){
		//xử lý theo dữ liệu đã được nhập
		
	    }
	    else{
            //xử lý lỗi 	
	    }
        }
        
       
        if(isset($_POST['submit_reg']) ){ 
            if(empty($_POST['name_reg'])){
		$error['name_reg']="bạn cần nhập username";
	    }
	    else{
            $name_reg=$_POST['name_reg'];
	    }
        
            if(empty($_POST['sdt_reg'])){
               $error['sdt_reg']="bạn cần nhập số điện thoại";
	    }
	    else{
            $sdt=$_POST['sdt_reg'];
	    }
        
	    if(empty($_POST['pass_reg'])){
		$error['pass_reg']="bạn cần nhập password";
	    }
	    else{
               $password=$_POST['pass_reg'];
            }
            
	    if(empty($error)){
		//xử lý theo dữ liệu đã được nhập
		
	    }
	    else{
            //xử lý lỗi 	
	    }
        }
        
	
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>login</title>
        <link href="css/css_index.css" rel="stylesheet" type="text/css"/>
        <link href="css/css_login.css" rel="stylesheet" type="text/css"/>
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
                <a href="login.php">Đăng nhập/ Đăng kí</a>
                </span>
                
            </div>
            </div>
            <div class="dangnhap">
                <form id="login" action="login.php" method="post">
                    <h4 >ĐĂNG NHẬP</h4>
                    <label>số điện thoại</label><br>
                    <input type="text" name="sdt" class="txt" size="32" value=""/><br />
                    <?php form_error('sdt');?>
                    <label>mật khẩu</label><br>
                    <input type="password" name="password" class="txt" size="32" value=""/><br />
                    <?php form_error('password');?>
                    <input class="submit" type="submit" name="submit_login" value="Đăng nhập" />
                </form>
                
                <form id="sign_up" action="login.php" method="post">
                    <h4> ĐĂNG KÍ</h4>
                    <label>Tên</label><br>
                    <input type="text" name="name_reg" class="txt" size="32" value=""/><br />
                    <?php form_error('name_reg');?>
                    <label>số điện thoại</label><br>
                    <input type="text" name="sdt_reg" class="txt" size="32" value=""/><br />
                    <?php form_error('sdt_reg');?>
                    <label>mật khẩu</label><br>
                    <input type="password" name="pass_reg" class="txt" size="32" value=""/><br />
                    <?php form_error('pass_reg');?>
                    <input  class="submit" type="submit" name="submit_reg" value="Đăng kí" />
                </form>
            </div>
        </div>
    </body>
</html>
