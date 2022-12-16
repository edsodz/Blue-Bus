<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>blueBus - A Heaven For Travellers</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css"></head>

<body>
    <form action="login.php" method="post">
        <h2>Login</h2>
        <?php if(isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error'];?> </p>
        }
        <?php } ?>
        <label for="username">username</label>
        <input type="text" id="username" class="username" name="username" placeholder="username"><br>
        <label for="password">password</label>
        <input type="text" id="password" class="password" name="password" placeholder="password" ><br>
        
        <a href="ticketbooking.html"><button type="submit">Login</button></a>
    </form>
</body>
</html>