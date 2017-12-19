<?php

function is_username($username) {
    $parttern = "/^[A-Za-z0-9_\.]{6,32}$/";
    if (preg_match($parttern, $username))
        return true;
}
function is_password($password) {
    $parttern = "/^([A-Z]){1}([\w_\.!@#$%^&*()]+){5,31}$/";
    if (preg_match($parttern, $password))
        return true;
}
//kiem tra loi khong khop
function unlike_pasword($password,$password_2){
    if(strcasecmp((string)$password, (string)$password_2)){
        return true;
    }
}
function is_email($password) {
    $parttern = "/^[A-Za-z0-9_.]{6,32}@([a-zA-Z0-9]{2,12})(.[a-zA-Z]{2,12})+$/";
    if (preg_match($parttern, $password))
        return true;
}
function is_sdt($txtPhone) {
    $sdt = $txtPhone;
    $parttern = "/^(84|0)(1\d{9}|9\d{8})$/";
    if (preg_match($parttern, $sdt)) {
        return true;
    }
    else {
        return false;
    }
}
//hàm ghi nhớ giá trị đã nhập
function set_value($label_field) {
    global $$label_field;
    if (isset($$label_field)){
        echo $$label_field;
    }
}
//báo lỗi nhập liệu của người dùng

?>