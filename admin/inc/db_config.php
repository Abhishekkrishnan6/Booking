<?php

$hname = 'localhost';
$uname = 'root';
$pass = '';
$db = 'hbwebsite';

$con = mysqli_connect($hname,$uname,$pass,$db);

if(!$con){
    die("cannot connect to database".mysqli_connect_error() );
}

function filteration($data){
    foreach($data as $key => $value){
        // trim()
        // stripcslashes()
        // htmlspecialchars()
        // strip_tags()
        $value = trim($value);
        $value = stripcslashes($value);
        $value = htmlspecialchars($value);
        $value = strip_tags($value);
        $data[$key] = $value;
    }
    return $data;
}





function selectAll($table){
$con = $GLOBALS['con'];
$res = mysqli_query($con,"SELECT * FROM $table");

return $res;
}

function select($sql,$values,$datatypes){

    $con = $GLOBALS['con'];
    if($stmt = mysqli_prepare($con,$sql)){
        mysqli_stmt_bind_param($stmt,$datatypes,...$values);
        if(mysqli_stmt_execute($stmt)){
           $res = mysqli_stmt_get_result($stmt);
           //mysqli_stmt_close($stmt);
           return $res;
        }
        else{
            mysqli_stmt_close($stmt);
            die("query cannot be executed - Select");
        }

       
    }
    else{
        die("query cannot be prepared - Select");
    }
}

function update($sql,$values,$datatypes){

    $con = $GLOBALS['con'];
    if($stmt = mysqli_prepare($con,$sql)){
        mysqli_stmt_bind_param($stmt,$datatypes,...$values);
        if(mysqli_stmt_execute($stmt)){
           $res = mysqli_stmt_affected_rows($stmt);
          // mysqli_stmt_close($stmt);
           return $res;
        }
        else{
            mysqli_stmt_close($stmt);
            die("query cannot be executed - update");
        }

       
    }
    else{
        die("query cannot be prepared - update");
    }
}





function insert($sql,$values,$datatypes){

    $con = $GLOBALS['con'];
    if($stmt = mysqli_prepare($con,$sql)){
        mysqli_stmt_bind_param($stmt,$datatypes,...$values);
        if(mysqli_stmt_execute($stmt)){
           $res = mysqli_stmt_affected_rows($stmt);
          // mysqli_stmt_close($stmt);
           return $res;
        }
        else{
            mysqli_stmt_close($stmt);
            die("query cannot be executed - Insert");
        }

       
    }
    else{
        die("query cannot be prepared - INSERT");
    }
}





function delete($sql,$values,$datatypes){

    $con = $GLOBALS['con'];
    if($stmt = mysqli_prepare($con,$sql)){
        mysqli_stmt_bind_param($stmt,$datatypes,...$values);
        if(mysqli_stmt_execute($stmt)){
           $res = mysqli_stmt_affected_rows($stmt);
          mysqli_stmt_close($stmt);
           return $res;
        }
        else{
            mysqli_stmt_close($stmt);
            die("query cannot be executed - delete");
        }

       
    }
    else{
        die("query cannot be prepared - delete");
    }
}



?>