<?php
require('../admin/inc/db_config.php');
require('../admin/inc/essentials.php');
require("../inc/sendgrid/sendgrid-php.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


date_default_timezone_set("Asia/Kolkata");
//require('login_register2.php');
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;
// $verifytoken=md5(rand());

//Load Composer's autoloader
// require '../vendor/autoload.php';

function send_mail($uemail,$token,$type)
{   
    if($type == "email_confirmation"){
        $page =  'email_confirm.php';
        $subject = "Account verification link";
        $content = "confirm your email";
    }
    else{
        $page =  'index.php';
        $subject = "Reset link";
        $content = "reset your account";
    }
    $email = new \SendGrid\Mail\Mail();
    $email->setFrom(SENDGRID_EMAIL, SENDGRID_NAME);
    $email->setSubject($subject);
    $email->addTo($uemail);
    $email->addContent(
        "text/html",
        "Click the link to $content: <br>
        <a href='".SITE_URL."$page?$type&email=$uemail&token=$token"."'>
        CLICK ME 
        </a>"
    );
    $sendgrid = new \SendGrid(SENDGRID_API_KEY);
    try{
    $sendgrid->send($email);
        return 1;
       
    }
    catch(Exception $e){
        return 0;
       }
}
//  function send_mail($uemail,$name,$token){

//     $mail = new PHPMailer(true);

// $mail->isSMTP();// Set mailer to use SMTP
// $mail->CharSet = "utf-8";// set charset to utf8
// $mail->SMTPAuth = true;// Enable SMTP authentication
// $mail->SMTPSecure = 'tls';// Enable TLS encryption, `ssl` also accepted

// $mail->Host = 'smtp.gmail.com';// Specify main and backup SMTP servers
// $mail->Port = 587;// TCP port to connect to
// $mail->SMTPOptions = array(
//     'ssl' => array(
//         'verify_peer' => false,
//         'verify_peer_name' => false,
//         'allow_self_signed' => true
//     )
// );
// $mail->isHTML(true);// Set email format to HTML

// $mail->Username = 'demononmission@gmail.com';// SMTP username
// $mail->Password = 'Rohans@17';// SMTP password

// $mail->setFrom($uemail);//Your application NAME and EMAIL
// $mail->Subject = 'Test';//Message subject
// $mail->MsgHTML('HTML code');// Message body
// $mail->addAddress('User Email', 'User Name');// Target email


// $mail->send();
    
    // $mail = new PHPMailer(true);

    // $mail->SMTPDebug = 2;  
    // $mail->SMTPKeepAlive = true; 
    // $mail->Mailer = "smtp";                                    
    //     $mail->isSMTP();
    //     $mail->SMTPAuth   = true;
    //     $mail->SMTPOptions = array(
    //         'ssl' => array(
    //             'verify_peer' => false,
    //             'verify_peer_name' => false,
    //             'allow_self_signed' => true
    //         )
    //     );


    //     $mail->Host       = 'smtp.gmail.com;';                                         
    //     $mail->Username   = 'demononmission@gmail.com';                
    //     $mail->Password   = 'Rohans@17';

    //     $mail->SMTPSecure = 'ssl';                             
    //     $mail->Port       = 587; 
     
    //     $mail->setFrom('demononmission@gmail.com');          
    //     $mail->addAddress($uemail);
        
    //     $mail->isHTML(true);                                 
    //     $mail->Subject = 'Account Verification';
    //     $mail->Body    = "<a href ='/userverification'>
    //     <h1>$token</h1>";
    //     //$mail->AltBody = 'Body in plain text for non-HTML mail clients';
    //     $mail->send();
    //     echo "Mail has been sent successfully!";
 
    // try {
    //     $mail->SMTPDebug = 2;                                      
    //     $mail->isSMTP();
    //     $mail->SMTPAuth   = true;

    //     $mail->Host       = 'smtp.gmail.com;';                                         
    //     $mail->Username   = 'krishnanabhishek052002@gmail.com';                
    //     $mail->Password   = 'rdwpzijtypvnujwu';

    //     $mail->SMTPSecure = 'ssl';                             
    //     $mail->Port       = 587; 
     
    //     $mail->setFrom('krishnanabhishek052002@gmail.com');          
    //     $mail->addAddress($uemail);
        
    //     $mail->isHTML(true);                                 
    //     $mail->Subject = 'Account Verification';
    //     $mail->Body    = "<a href ='/userverification'>
    //     <h1>$token</h1>";
    //     //$mail->AltBody = 'Body in plain text for non-HTML mail clients';
    //     $mail->send();
    //     echo "Mail has been sent successfully!";
    // } catch (Exception $e) {
    //     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    // }
    

// $subject = "Account Verification";
// $body = "CLICK ME ";
        // "Click the link to confirm email: <br>
        // <a href='".SITE_URL."email_confirm.php?email_confirmation&email=$uemail&token=$token"."'>
        
        // </a>"
        // $headers = "From: demononmission@gmail.com";
       // mail($uemail,$subject,$body,$headers);
   






//}



// function send_mail($email,$name,$token){
//     require ("PHPMailer\PHPMailer.php");
//     require ("PHPMailer\SMTP.php");
//     require ("PHPMailer\Exception.php");

//     $mail = new PHPMailer(true);
//     try {               
//         $mail->isSMTP();                                            //Send using SMTP
//         $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
//         $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
//         $mail->Username   = 'abhishekkrishnan052002@gmail.com';                     //SMTP username
//         $mail->Password   = 'dkhamolgkalprxlu';                               //SMTP password
//         $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
//         $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
//         $mail->setFrom('abhishekkrishnan052002@gmail.com', 'Avhii');
//         $mail->addAddress($email);     
        
    
//         $mail->isHTML(true);                                  //Set email format to HTML
//         $mail->Subject = 'Email verification';
//         $mail->Body    = 'thanks for registration click the link below to verify';
       
//         $mail->send();
//         return 1;
//     }catch (Exception $e) {
//         return 0;
    
//     }


// }




if (isset($_POST['register'])) {
    $data = filteration($_POST);
    if ($data['pass'] != $data['cpass']) {
        echo 'pass_missmatch';
        exit;
    }

    $u_exist = select("SELECT * FROM `user_cred` WHERE `email` = ? OR `phonenum` = ? LIMIT 1", [$data['email'], $data['phonenum']], "ss");
    if (mysqli_num_rows($u_exist) != 0) {
        
    $u_exist_fetch = mysqli_fetch_assoc($u_exist);
        echo ($u_exist_fetch['email'] == $data['email']) ? 'email_already' : 'phone_already';
        exit;
    }



    //upload image

    // $img = uploadUserImage($_FILES['profile']);
    // if ($img == 'inv_img') {
    //     echo 'inv_img';
    //     exit;
    // } else if ($img == 'upd_failed') {
    //     echo 'upd_failed';
    //     exit;
    // }

    //conformation
    $token = bin2hex(random_bytes(16));
    if(!send_mail($data['email'],$token,"email_confirmation")){
        echo 'mail_failed';
        exit;
    }


    $enc_pass = password_hash($data['pass'], PASSWORD_BCRYPT);
    $query = "INSERT INTO `user_cred`(`name`, `email`, `address`, `phonenum`, `pincode`, 
    `dob`,`password`,`token`) VALUES (?,?,?,?,?,?,?,?)";

    $values = [$data['name'], $data['email'], $data['address'], $data['phonenum'], $data['pincode'], $data['dob'],$enc_pass,$token];
    if (insert($query, $values, 'ssssssss')) {
        echo 1;
    } else {
        echo 'ins_failed';
    }
}




if (isset($_POST['login'])) {
    $data = filteration($_POST);

    $u_exist = select("SELECT * FROM `user_cred` WHERE `email` = ? OR `phonenum` = ? LIMIT 1", [$data['email_mob'], $data['email_mob']], "ss");
    
    if (mysqli_num_rows($u_exist) == 0){
        echo 'inv_email_mob';
    } 
    else{
    $u_fetch = mysqli_fetch_assoc($u_exist);
    // if($u_fetch['is_verified']==0){
    //     echo 'not_verified';
    // }
    if($u_fetch['status']==0){
        echo 'inactive';
    }
    else{
        if(!password_verify($data['pass'],$u_fetch['password'])){
            echo 'invalid_pass';
        }
        else{
            session_start();
            $_SESSION['login'] = TRUE;
            $_SESSION['uID'] = $u_fetch['id'];
            $_SESSION['uName'] = $u_fetch['name'];
            //$_SESSION['uPic'] = $u_fetch['profile'];
            $_SESSION['uPhone'] = $u_fetch['phonenum'];
            echo 1;
        }
    }
    }
       
}


if (isset($_POST['forgot_pass'])){
    $data = filteration($_POST);
    $u_exist = select("SELECT * FROM `user_cred` WHERE `email` = ?  LIMIT 1", [$data['email']], "s");
    
    if (mysqli_num_rows($u_exist) == 0){
        echo 'inv_email';
    } 
    else{
        $u_fetch = mysqli_fetch_assoc($u_exist);
        // if($u_fetch['is_verified']==0){
        //     echo 'not_verified';
        // }
        if($u_fetch['status']==0){
            echo 'inactive';
        }
        else{
            //send reset link 
            $token = bin2hex(random_bytes(16));
            if(!send_mail($data['email'],$token,'account_recovery')){
                echo "mail_failed";
            }
            else{
                
                $date = date("Y-m-d");
                $query = mysqli_query($con, "UPDATE `user_cred` SET `token`='$token',`t_expire`='$date' 
                WHERE `id`='$u_fetch[id]' ");
                if($query){
                    echo 1;

                }
                else{
                    echo 'upd_failed';
                }

            }
        }
    }
}


if (isset($_POST['recover_user'])){
    $data = filteration($_POST);
    $enc_pass = password_hash($data['pass'],PASSWORD_BCRYPT);
    $query = "";
   $query = "UPDATE `user_cred` SET `password`=? `token`=? `t_expire`=?
   WHERE `email`=? AND `token`=?";
   $values = [$enc_pass,null,null,$data['email'],$data['token']];
   if(update($query,$values,'sssss')){
    echo 1;
   }
   else{
    echo 'failed';
   }
}



?>