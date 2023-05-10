<?php
require('../admin/inc/db_config.php');
require('../admin/inc/essentials.php');



if(isset($_POST['register'])){
    $data = filteration($_POST);
    if($data['pass'] != $data['cpass']){
        echo 'pass missmatch';
        exit;
    }

    $u_exist = select("SELECT * FROM `user_cred` WHERE `email` = ? AND `phonenum` =? LIMIT 1" ,[$data['email'],$data['phonenum']],"ss");
    if(mysqli_num_rows($u_exist)!=0){
        $u_exist_fetch = mysqli_fetch_assoc($u_exit);
        echo ($u_exist_fetch['email'] == $data['email']) ? 'email already' : 'phone already';
    exit;
    }



//upload image

// $img = uploadUserImage($_FILES['profile']);
// if($img == 'inv_image'){
//     echo 'inv_img';
//     exit;
// }
// else if($img == 'upd_failed'){
//     echo 'upd_failed';
//     exit;
// }




$enc_pass = password_hash($data['pass'],PASSWORD_BCRYPT);
$query = "INSERT INTO `user_cred`(`name`, `email`, `address`, `phonenum`, `pincode`, `dob`, `password`) VALUES (?,?,?,?,?,?,?)";

$values = [$data['name'],$data['email'],$data['address'],$data['phonenum'],$data['pincode'],$data['dob'],$enc_pass];
if(insert($query,$values,'sssssss')){
    echo 1;
}
else{
    echo 'ins_failed';
}
}

?>