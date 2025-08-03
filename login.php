<?php 
    include 'config.php';
    session_start();

    if($_SERVER["REQUEST_METHOD"] == 'POST'){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM regis_table WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s",$email);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows === 1){
            $res = $result->fetch_assoc();
           if(password_verify($password , $res['password'])){
            $_SESSION['isloggedIn'] = $res['name'];
            header('Location:dashboard.php');
           }else{
              echo "Wrong Password";
           }
        }else{
          echo "Email Not Found";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  <link rel="stylesheet" href="./css/output.css"/>
</head>
<body>
  <h2 class="reg-form-title text-center font-bold text-[40px] uppercase tracking-[2px] mb-5">Login Form</h2>
  <form action="" method="post" class="bg-white shadow-md p-5 rounded max-w-md mx-auto">
    <input type="email" name="email" id="email" placeholder="Enter Full Email" require class="p-4 bg-gray-200 mb-2 border-none rounded focus:bg-gray-400 focus:outline-none w-full" />
    <input type="password" name="password" id="password" placeholder="Enter Password" require class="p-4 mb-2 bg-gray-200 border-none rounded focus:bg-gray-400 focus:outline-none w-full" />
    <input type="submit" value="Login" name="login" class="py-3 px-5 bg-blue-400 rounded transition-all duration-300 ease-out hover:bg-blue-600 cursor-pointer" />
  </form>
  <a href="register.php" class="block mt-[10px] text-[20px] capitalize tracking-tide text-blue-400 transition-all duration-300 ease-in-out hover:text-black mx-auto text-left max-w-[450px] w-full mx-auto">Register Here</a>
</body>
</html>