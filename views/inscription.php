<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inscription</title>
</head>
<body>
    <form action="services/inscription_service.php" method="post">
        <table>
            <tr>
                <td>
                    <label for="email">Votre email</label>
                </td>
                <td>
                    <input type="email" id="email" name="email" />
                </td>
            </tr>
            <tr>
                <td>
                    <label for="pass">Votre mot de passe</label>
                </td>
                <td>
                    <input type="password" id="pass" name="pass" />
                </td>
            </tr>
            <tr>
                <td>
                    <label for="pseudo">Votre pseudo</label>
                </td>
                <td>
                    <input type="text" id="pseudo" name="pseudo">
                </td>
            </tr>
            <tr>
                <td>
                    <a href="index.php?page=inscription">
                        <button>Effacer</button>
                    </a>
                </td>
                <td>
                    <input type="submit" value="Envoyer" />
                </td>
            </tr>
        </table>
    </form>
    
</body>
</html>