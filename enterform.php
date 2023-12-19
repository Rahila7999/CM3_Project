<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "projectphp";
$conn = mysqli_connect($servername, $username, $password, $db) or die('not working ');

$errors = array(); // Initialize an array to store validation errors

if (isset($_POST['submit'])) {
    $Fname = $_POST['Fname'];
    $Lname = $_POST['Lname'];
    $Email = $_POST['Email'];
    $phone = $_POST['phone'];

    // Validation checks
    if (empty($Fname)) {
        $errors[] = "First name is required.";
    }

    if (empty($Lname)) {
        $errors[] = "Last name is required.";
    }

    if (empty($Email)) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "<h2>Invalid Email format.</h2>";
    }

    // Phone number validation
    if (empty($phone)) {
        $errors[] = "Phone number is required.";
    } elseif (!preg_match('/^[0-9]{10}$/', $phone)) {
        $errors[] = "<h2>Invalid phone number format. Please enter a 10-digit number.</h2>";
    }

    if (empty($errors)) {
        // Proceed with the rest of the code
        $sql = "INSERT INTO register(Fname, Lname, Email, phone)
                VALUES ('$Fname', '$Lname', '$Email', '$phone')";

        $query = mysqli_query($conn, $sql);

        if ($query === TRUE) {
            function redirect($url)
            {
                header("Location: $url");
                exit();
            }

            redirect("coursesnew.html"); // Redirects to coursesnew.html after successful insertion
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        foreach ($errors as $error) {
            echo "<p class='error-message'>$error</p>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr"></html>
<head>
    <meta charset="utf-8">
    <title>SignUp</title>
    <style>
        body{
            margin: 0;
            padding: 0;
			}
        #a{
            text-align:center;
			font-family:arial black;
			font-size:50px;
        }
    .center{
        position:absolute;
        top:50%;
        left:50%;
        transform: translate(-50%, -50%) ;
        width: 450px;
        background:white;
        box-shadow: 5px 5px 10px 5px blue;
        border-radius: 5px;
    }
.center h1{
    text-align: center;
    padding: 0 0 20px 0;
    border-bottom: 1px solid silver;
    font-family: arial;
    
}
.center form{
    padding: 0 40px ;
    box-sizing: border-box;
    margin-bottom: 20px;
}
form .txt_field{
    position: relative;
    border-bottom: 2px solid #adadad;
    margin: 30px 0;
}
.txt_field input{
    width: 100%;
    padding: 0 5px;
    height: 40px;
    font-size: 16px;
    border: none;
    background: none;
    outline: none;
}
.txt_field label{
    position: absolute;
    top: 50%;
    left: 5px;
    color: #ababab;
    transform: translateY(-50%);
    font-size: 20px;
    pointer-events: none;
    transition: .5s;

}
.txt_field span::before{
    content: '';
    position: absolute;
    top:40;
    left: 0;
    width: 0%;
    height: 2px;
    background: #2691d9;
    transition: .5s;
}
.txt_field input:focus ~ label,
.txt_field input:valid ~ label{
    top: -5px;
    color:#2691d9;
}
.txt_field input:focus ~ span::before,
.txt_field input:focus ~ span::before{
  width: 100%;  
}
.pass{
    margin: -5px 0 20px 5px;
    color:gray;
    cursor: pointer;


}
.pass:hover{
    text-decoration: underline;
}

input[type="submit"]{
    width: 100%;
    height: 50px;
    border: 1px  solid ;
    background: #2691d9;
    border-radius: 30px;
    font-size: 20px;
    font-family: Arial black;
    color: #e9f4fb;
    cursor: pointer;
    outline: none;

}
input[type="submit"]:hover{
    box-shadow:2px 2px 10px 2px red;
    transition: .5s;
}
.signup_link{
    margin: 30px 0;
    text-align: center;
    font-size: 20px;
    color: #666666;
}
.signup_link a{
    color: #2691d9;
    text-decoration: none;
}
.signup_link a:hover{
    text-decoration: underline;
}
  .btn{
            width:100px;   
            height:50px;      
            font-size:20px; 
            border-radius:7px;
            background-color:gray;
            color:white;

        }

        .btn:hover{
            background-color:white;
            color:black;

        }
        .error-message {
    color: red;
    font-size: 16px;
    margin-top: 5px;
}

    </style>
</head>    
<body style="background-image:url(images/abc1.jpg); background-repeat:no-repeat; background-attachment:fixed; background-size:100% 100%;">
<h1><p style="text-align:left; font-size:25px; padding-left:10px; padding-right:10px "><a href="index.html"><button class="btn">BACK</button></a></h1>

	<div class="center">
        <h1>Entry Form</h1>
        <form action=" " method="post">
            <div class="txt_field">
                <input type="text" name="Fname"  autofocus>
                <span></span>
                <label style="font-size: 20px;">First name</label>
            </div>
			<div class="txt_field">
                <input type="text" name="Lname" >
                <span></span>
                <label style="font-size: 20px;">Last name</label>
            </div>
			<div class="txt_field">
                <input type="email" name="Email" id="inputEmail4" >
                <span></span>
                <label style="font-size: 20px;">Email</label>
            </div>
            <div class="txt_field">
             <input type="tel" name="phone" id="phone" >
            <span></span>
            <label style="font-size: 20px;">Phone No.</label>
            </div>
            <div class="error-message" id="phone-error"></div>
		
            <div  style="font-size: 20px;" class="pass">
                <input type="checkbox" name="btn" value="" required>
			<label>I agree to the news-letter <label>
            </div>
            <input type="submit" value="Enter" name="submit">
            <div  style="font-size: 20px;" class="enretform_link">
              
        </form>
    </div>
</body> 
</html>