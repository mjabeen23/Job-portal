<?php
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'jobs';
$conn =  mysqli_connect($server, $username, $password,$database);
if($conn->connect_error){
    die("Connection failed:" . $conn->connect_error);
}
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['phone_no'];
    $password = $_POST['password'];
    $sql = "INSERT INTO users(Name, email, password, phone_no) VALUES ('$name','$email','$password','$number')";
    if(mysqli_query($conn,$sql)){
        echo "Records inserted successfully.";
    }
    else{
        echo "ERROR : Could not able to execute $sql. " . mysqli_error($conn);
    }
}
session_start();
if(isset($_POST['Login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    if(mysqli_num_rows($result)==1){
        header("location:index.php");
    }
    else{
        $error = 'email id or password is incorrect';
    }
}
if(isset($_POST['job'])){
    $cname = $_POST['cname'];
    $pos = $_POST['pos'];
    $jdesc = $_POST['Jdesc'];
    $skills = $_POST['skills'];
    $ctc = $_POST['CTC'];
    $sql = "INSERT INTO jobs(cname, position, jdesc, skills, CTC) VALUES ('$cname','$pos','$jdesc','$skills','$ctc')";
    if(mysqli_query($conn,$sql)){
        echo "New Job Posted";
    }
    else{
        echo "ERROR : Failed to Post the job $sql. " . mysqli_error($conn);
    }
}
if(isset($_POST['apply'])){
    $name = $_POST['name'];
    $apply = $_POST['appl'];
    $qual = $_POST['qual'];
    $year = $_POST['year'];
    $sql = "INSERT INTO candidates(name, apply, qual, year) VALUES ('$name','$apply','$qual','$year')";
    $res = mysqli_query($conn, $sql);
}
?>