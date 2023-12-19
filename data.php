
<?php
$servername = "localhost:3306";
$username = "root";
$password = "";
$db = "projectphp";
$conn = mysqli_connect($servername, $username, $password, $db) or die('Connection failed: ' . mysqli_connect_error());

if (isset($_POST['submit'])) {
    $name = $_POST['Name'];
    $email = $_POST['Email'];
    $phone = $_POST['Phone'];
    $message = $_POST['Message'];

    $sql = "INSERT INTO contact (Name, Email, Phone, Message)
            VALUES ('{$name}', '{$email}', '{$phone}', '{$message}')";

    if (mysqli_query($conn, $sql)) {
        $successMessage = "Your message has been sent successfully 🙂!!";
    } else {
        $errorMessage = "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Contact Form</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>

    <!-- Add your CSS styling here -->
    <style>
       
        .success-message {
            background-color: #c3e6cb;
            color: #155724;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #b4d6ad;
            text-align:center;
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
       
    </style>
</head>
<body id="back" style="background-image:url(images/tnk2.jpg); background-repeat:no-repeat; background-attachment:fixed; background-size:100% 100%;">
 
<!-- Your HTML content here -->
    
    <?php if (isset($successMessage)) { ?>
        <h2><div class="success-message"><?php echo $successMessage; ?></div></h2>
    <?php } ?>
    <?php if (isset($errorMessage)) { ?>
        <div class="error-message"><?php echo $errorMessage; ?></div>
    <?php } ?>
    <h1><p style="text-align:left; font-size:25px; padding-left:10px; padding-right:10px "><a href="contactnew.html"><button class="btn">BACK</button></a><h1>

</body>
</html>

