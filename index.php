<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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
                <a href="#">Trang chủ ></a>
                <a href="#">Điện tử ></a>
                <a href="#">Điện thoại ></a>
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
                <a href="#">
                    <img src="images/background.png" alt="" width="100px" height="100px"/>
                    <div>
                    Tên: Điện thoại cũ<br/>
                    Giá: 3000,000 vnđ<br/>
                    Sđt: 01628337724<br/>
                    Địa chỉ: 29/60/129/trương định/hà nội<br/>
                    Ngày đăng: 21/11/2017
                    </div>
                </a>
                <a href="#">
                    <img src="images/background.png" alt="" width="100px" height="100px"/>
                    <div>
                    Tên: Điện thoại cũ<br/>
                    Giá: 3000,000 vnđ<br/>
                    Sđt: 01628337724<br/>
                    Địa chỉ: 29/60/129/trương định/hà nội<br/>
                    Ngày đăng: 21/11/2017
                    </div>
                </a>
                <a href="#">
                    <img src="images/background.png" alt="" width="100px" height="100px"/>
                    <div>
                    Tên: Điện thoại cũ<br/>
                    Giá: 3000,000 vnđ<br/>
                    Sđt: 01628337724<br/>
                    Địa chỉ: 29/60/129/trương định/hà nội<br/>
                    Ngày đăng: 21/11/2017
                    </div>
                </a>
                <a href="#">
                    <img src="images/background.png" alt="" width="100px" height="100px"/>
                    <div>
                    Tên: Điện thoại cũ<br/>
                    Giá: 3000,000 vnđ<br/>
                    Sđt: 01628337724<br/>
                    Địa chỉ: 29/60/129/trương định/hà nội<br/>
                    Ngày đăng: 21/11/2017
                    </div>
                </a>
                

        </div>
        </div>
        <div class="clear"></div>
        <div class="footer">
            <span>Coppyright 2017</span>
        </div>
        </div>
    </body>
</html>
