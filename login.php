<!DOCTYPE html>
<!---Coding By CoderGirl | www.codinglabweb.com--->
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login & Registration Form | CoderGirl</title>
  <!---Custom CSS File--->
  <link href="css/style2.css" rel="stylesheet">
</head>
<body>
  <div class="container">
    <input type="checkbox" id="check">
    <div class="login form">
      <header>Login</header>
      <form action="#" method="post" class="login">
            <input type="email" name="email" placeholder="Email Address" required />
            <input type="password" name="password" placeholder="Password" required />
            <a href="#">Forgot password?</a>
            <input type="submit" name="login" class="button" value="Login">
        </form>
        <div class="signup">
            <span class="signup">Don't have an account?
                <label for="check">Signup</label>
            </span>
        </div>
    </div>

    <div class="registration form">
        <header>Signup</header>
        <form action="#" method="post" class="signup">
            <input type="text" name="name" id="name" placeholder="Name" required />
            <input type="email" name="email" placeholder="Email Address" required />
            <input type="password" name="password" placeholder="Password" required />
            <input type="submit" name="submit" class="button" value="Signup">
        </form>


      <div class="signup">
        <span class="signup">Already have an account?
         <label for="check">Login</label>
        </span>
      </div>
    </div>
  </div>
</body>
</html>


<?php
    include 'connection.php';

    if (isset($_POST['submit'])) {
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password

        if (!empty($email) && !empty($password) && !is_numeric($email)) {
            // Use prepared statement to prevent SQL injection
            $stmt = $con->prepare("INSERT INTO `reg4` (`name`, `email`, `password`) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $name, $email, $password);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                echo "Data inserted successfully";
            } else {
                echo "Sorry, some error occurred: " . $stmt->error;
            }

            $stmt->close();
        }
    }

    if (isset($_POST['login'])) {
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = $_POST['password'];

        if (!empty($email) && !empty($password) && !is_numeric($email)) {
            // Use prepared statement to prevent SQL injection
            $stmt = $con->prepare("SELECT * FROM reg4 WHERE email = ? LIMIT 1");
            $stmt->bind_param("s", $email);
            $stmt->execute();

            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $user_data = $result->fetch_assoc();

                if (password_verify($password, $user_data['password'])) {
                    header("Location: index.php");
                    exit();
                } else {
                    echo "<script type='text/javascript'> alert('Wrong password')</script>";
                }
            } else {
                echo "<script type='text/javascript'> alert('User not found')</script>";
            }

            $stmt->close();
        } else {
            echo "<script type='text/javascript'> alert('Invalid input')</script>";
        }
    }
    ?>