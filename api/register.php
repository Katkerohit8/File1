<?php
include("connect.php");

$name = $_POST['name'];
$mobile = $_POST['mobile'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
$address = $_POST['address'];
$age = $_POST['age'];
$role = $_POST['role'];

if($password==$cpassword){
    $insert = mysqli_query($connect,"INSERT INTO  user(name,mobile,password,address,age,role,status,votes) VALUES ('$name','$mobile','$password','$address','$age','$role',0,0)");
    if ($insert){
                if($age<18){echo'
                    <script>
                    alert("Sorry,only individuals aged 18 and above are eligible to vote.");
                    window.location = "../routes/register.html";
                    
                    </script>
                    
                    ';
                }
                else{
                    echo '
                    <script>
                    alert("Thank you," .$name."!Your vote has been submitted.");
                    window.location = "../routes/register.html";
                    </script>
                    return true;
                ';
                }
                if($age>18){echo'
                    <script>
                    alert("Congrats, you are 18+ and you are eligible to vote.");
                    window.location = "../";
                    
                    </script>
                    
                    ';
                }
}
else{
    echo '
        <script>
            alert("Password and Confirm Password does not match");
            window.location = "../routes/register.html";
        </script>
        ';  
    
}
}
?>