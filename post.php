<?php
   include 'module/connect_sql.php';
   include 'module/insert.php';
   if($_SERVER['REQUEST_METHOD']=='POST'){
    $error = array();
    $name = array();
    $tmp_name = array();
    $type = array();
    $size = array();
    $img = array();
    if(empty($_POST['tieude'])){
	$error['tieude']="bạn cần nhập tiêu đề";    
    }
    else{
        $tieude=$_POST['tieude'];   
    }
    if(empty($_POST['diachi'])){
	$error['diachi']="bạn cần nhập địa chỉ";    
    }
    else{
        $diachi=$_POST['diachi'];   
    }
    if(empty($_POST['gia'])){
	$error['gia']="bạn cần nhập giá bán";    
    }
    else{
        $gia=$_POST['gia'];   
    }
    if(empty($_FILES['file']['tmp_name'])){
        $error['image']='bạn chưa chọn file ảnh';
    }
    
    foreach ($_FILES['file']['name']as $file){
        $name[]=$file;
    }
    foreach ($_FILES['file']['tmp_name']as $file){
        $tmp_name[]=$file;
    } 
    foreach ($_FILES['file']['error']as $file){
        $error[]=$file;
    } 
    foreach ($_FILES['file']['type']as $file){
        $type[]=$file;
    } 
    foreach ($_FILES['file']['size']as $file){
        $size[]=$file;
    }
    if(!empty($error)){
    for($i=0;$i<count($name);$i++){
            $target_dir='images-upload/';
            $target_file=$target_dir.basename($name[$i]);
            $img[$i]=basename($name[$i]);
            if(move_uploaded_file($tmp_name[$i], $target_file)){
                $flag=TRUE;
            }else{
                $flag=FALSE;
                $error['upload']='upload thất bại';
            }  
    }
    if($flag==true){
        for($i=0;$i<4;$i++){
        if(empty($name[$i])){
            $img[$i]='';
        }
        }
        $flag= insert_post('dinhnam','01628337724','cả nước', 'tất cả', 'tất cả', $tieude, $diachi, $gia, '', '24/11/2017', $img[0], $img[1], $img[2], $img[3]);
    }
    }
    
    }
    
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Chợ đồ cũ</title>
        <link href="css/css_post.css" rel="stylesheet" type="text/css"/>
        <link href="css/css_index.css" rel="stylesheet" type="text/css"/>
        <script src="jquery/jquery-3.2.1.min.js" type="text/javascript"></script>
        <script>
        $(document).ready( function(){
          $(".menu-sub").hide();
	  $(".menu").hover( function(){
		$(this).find('div:first').next().slideToggle(200);
	  });
          
          $("#input-image").change(function() {
             $("#image1").hide();
             $("#image2").hide();
             $("#image3").hide();
             $("#image4").hide();
             var img=$("#image1");
             for($i=0;$i<this.files.length;$i++){
             var reader = new FileReader();
             reader.onload = function(e) {
              img.attr('src', e.target.result);
              img.show();
              img=img.next();
             };
             reader.readAsDataURL(this.files[$i]);
             }
          });
    
         
        });
        </script>
    </head>
    <body>
        <div class="wrapper">
            <?php
            include 'module/header.php';
            ?>
            <div class="form">
                <form  class="form" method="POST" enctype="multipart/form-data">
                    <div class="add-image">
                        <h4>THÊM HÌNH ẢNH (tối đa 4 hình)</h4>
                        
                        <input id="input-image" type="file" name="file[]"  multiple="">
                        <img id="image1" src="#"  width="230px" height="230px" style="float: left; display: none;"/>
                        <img id="image2" src="#"  width="230px" height="230px" style="float: left; display: none;"/>
                        <img id="image3" src="#"  width="230px" height="230px" style="float: left; display: none;"/>
                        <img id="image4" src="#"  width="230px" height="230px" style="float: left; display: none;"/>
                    </div>
                    <div class="add-detail">
                        <h4>THÊM THÔNG TIN</h4>
                        <div class="menu-select">
                        <select>
                        <option value="0">Cả nước</option>
                        <option value="1">Hà nội</option>
                        <option value="2">TP Hồ Chí Minh</option>
                        <option value="4">Lạng sơn</option>
                        <option value="4">Hải phòng</option>
                        <option value="3">Thanh hóa</option>
                        <option value="4">Nghệ an</option>
                        </select>
                        </div>
                        <div class="text">Chọn khu vực</div>
                        <div class="menu-select">
                        <select>
                        <option value="0">Tất cả</option>
                        <option value="" disabled="disabled">---Điện tử---------</option>
                        <option value="1">#</option>
                        <option value="2">#</option>
                        <option value="3">#</option>
                        <option value="4">#</option>
                        <option value="5">#</option>
                        <option value="6">#</option>
                        <option value="" disabled="disabled">---Xe cộ-----------</option>
                        <option value="7">#</option>
                        <option value="8">#</option>
                        <option value="9">#</option>
                        <option value="10">#</option>
                        <option value="11">#</option>
                        <option value="12">#</option>
                        <option value="" disabled="disabled">---Gia dụng--------</option>
                        <option value="13">#</option>
                        <option value="14">#</option>
                        <option value="15">#</option>
                        <option value="16">#</option>
                        <option value="17">#</option>
                        <option value="" disabled="disabled">---Bất động sản----</option>
                        <option value="18">#</option>
                        <option value="19">#</option>
                        <option value="20">#</option>
                        <option value="21">#</option>
                        <option value="22">#</option>
                        </select>
                        </div>
                        <div class="text">Chọn chuyên mục</div>
                        <input type="text" name="tieude" class="txt" size="32" value="" placeholder="Tiêu đề sản phẩm"/><br />
                        <?php form_error('tieude');?>
                        <input type="text" name="diachi" class="txt" size="32" value="" placeholder="Địa chỉ giao dịch"/><br />
                        <?php form_error('diachi');?>
                        <input type="text" name="gia" class="txt" size="32" value="" placeholder="Giá sản phẩm"/><br />
                        <?php form_error('gia');?>
                        <textarea name="chitiet" cols="66" rows="10" placeholder="Thêm chi tiết"></textarea><br>
                        <input id="sub" type="submit" name="submit"><br/>
                        <?php 
                        if(isset($flag)){
                            if($flag==true){
                            echo "<span style=\"color: #FFF; margin-left: 200px;\">Đăng tin thành công</span><br/>";
                            
                            }
                            else{
                            echo "<span style=\"color: #FFF; margin-left: 200px;\">Đăng tin thất bại</span><br/>";
                            }
                        }
                        
                        ?>
                        
                    </div>
                    
                </form>
             
            </div>
            
        </div>
    </body>
</html>
