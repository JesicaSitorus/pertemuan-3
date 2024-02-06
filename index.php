
<?php
$nama= "";
$phone= "";
$email= "";
$message="";

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $nama = anti_inject($_POST['nama']);
    $phone = anti_inject($_POST['phone']);
    $email =  anti_inject($_POST['email']);
    $message =  anti_inject($_POST['message']);
}
function anti_inject($data){
    $data = trim($data); //menghapus spasi kanan kiri
    $data = stripslashes($data); // menghilangkan karakter /\ 
    $data = htmlspecialchars($data); //menghilangkan simbol karakter khusus
    $data = preg_replace("/[^ a-zA-Z0-9]/","", $data); // setelah pangkat (^) spasi agar hasil datanya berjarak

    return $data;
}

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form validation</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://kit.fontawesome.com/c4254e24a8.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <form action="#" method="post" target="_self" enctype="multipart/form-data">
            <i class="fas fa-paper-plane"></i>

            <div class="input-group">
                <label>Full Name</label>
                <input type="text" name="nama" placeholder="Enter your name" id="contact-name" onkeyup="validateName()">
                <span id="name-error"></span>
            </div>

            <div class="input-group">
                <label>Phone No.</label>
                <input type="tel" name="phone"  placeholder="123 456 7890" id="contact-phone" onkeyup="validatePhone()">
                <span id="phone-error"></span>
            </div>

            <div class="input-group">
                <label>Email Id</label>
                <input type="email"  name="email" placeholder="Enter Email" id="contact-email" onkeyup="validateEmail()">
                <span id="email-error"></span>
            </div>

            <div class="input-group">
                <label>Your Message</label>
                <textarea rows="5" name="message" placeholder="Enter Your Message" id="contact-message" onkeyup="validateMessage()"></textarea>
                <span id="message-error"></span>
            </div>

            <button onclick="return validateForm()">Submit</button>
            <span id="submit-error"></span>
        </form>

        <div class="c-d">
            <b>Name : <?php echo $nama . "<br>" ?></b>
            <b>Phone : <?php echo $phone . "<br>" ?></b>
            <b>Email : <?php echo $email . "<br>" ?></b>
            <b>Message : <?php echo $message . "<br>" ?></b>
        </div>
        <script src="script.js"></script>
</div>
</body>
</html>