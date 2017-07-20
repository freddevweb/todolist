<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Connection</title>
</head>
<body>
    <form action="services/connection_service.php" method="post">

        <label for="email">Email</label>
        <input type="text" id="email" name="email">

        <label for="password">Pass</label>
        <input type="password" id="password" name="pass">

        <input type="submit" value="connect">

    </form>
    <p>
        <a href="index.php?page=inscription">
            S'inscrire
        </a>
    </p>
    
</body>
</html>