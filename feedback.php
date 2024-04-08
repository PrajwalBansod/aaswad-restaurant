<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>feedback form</title>
   <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }

    form {
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      padding: 20px;
      width: 300px;
    }

    label {
      display: block;
      margin-bottom: 8px;
    }

    input,
    textarea {
      width: 100%;
      padding: 8px;
      margin-bottom: 16px;
      box-sizing: border-box;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    textarea {
      resize: vertical;
      height: 100px;
    }

    button {
      background-color: #4caf50;
      color: #fff;
      border: none;
      padding: 10px 15px;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
    }

    button:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
  <form action="" method="post">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>

    <label for="phone">Phone No:</label>
    <input type="text" id="phone" name="phone" required>

    <label for="message">Message:</label>
    <textarea id="message" name="message" required></textarea>

    <button type="submit" name="Submit">Feedback</button>
  </form>
</body>
</html>

<?php
error_reporting(0);
include 'connection.php';

if (isset($_POST['Submit'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    $sql = "INSERT INTO reg0 (name, phone, message) VALUES ('$name','$phone','$message')";
    $data = mysqli_query($conn, $sql);

    if ($data) {
        echo "Inserted successfully";
    } else {
        echo "Sorry, there was an error";
    }
}
?>

         