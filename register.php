
<?php
  include 'config.php';

  if($_SERVER["REQUEST_METHOD"] == 'POST'){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'],PASSWORD_DEFAULT); //hashing Password for protection

    $sql = "INSERT INTO regis_table(name,email,password) VALUES (?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss",$name,$email,$password);

    if($stmt->execute()){
      header('Location:login.php');
      echo "Registration Successfully";
    }else{
      echo "Invalid Email";
      echo "Registration Failed" . $stmt->error;
    }
    $stmt->close();
  }

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Form</title>
  <link rel="stylesheet" href="./css/output.css"/>
</head>
<body>
  <h2 class="reg-form-title text-center font-bold text-[50px] uppercase tracking-[2px] mb-5">Registration Form</h2>
  <form action="" method="post" class="bg-white shadow-md p-5 rounded max-w-md mx-auto">
    <input type="text" name="name" id="name" placeholder="Enter Full Name" require class="p-4 bg-gray-200 mb-2 border-none rounded focus:bg-gray-400 focus:outline-none w-full" />
    <input type="email" name="email" id="email" placeholder="Enter Full Email" require class="p-4 bg-gray-200 mb-2 border-none rounded focus:bg-gray-400 focus:outline-none w-full" />
    <input type="password" name="password" id="password" placeholder="Enter Password" require class="p-4 mb-2 bg-gray-200 border-none rounded focus:bg-gray-400 focus:outline-none w-full" />
    <input type="submit" value="Register" name="register" class="py-3 px-5 bg-blue-400 rounded transition-all duration-300 ease-out hover:bg-blue-600 cursor-pointer" />
  </form>
  <a href="login.php" class="block mt-[10px] text-[20px] capitalize tracking-tide text-blue-400 transition-all duration-300 ease-in-out hover:text-black mx-auto text-left max-w-[450px] w-full mx-auto">Login Here</a>
</body>
</html>