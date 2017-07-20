<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profil</title>
</head>
<body>
    <h1>Page profil</h1>
    
    
    <h2>Welcome <?= $user->username; ?></h2>
    <div>
        <a href="services/log_out_service.php">
            <button>
                Logout
            </button>
        </a>
    </div>
    <br />
    <br />
        
    <div>
        <?php
            include "views/form_".$form.".php";
        ?>
    </div>
    <div>
        <table>
            <?php
            foreach( $notes as $value ){
                ?>
                <tr>
                    <td>
                        <?= $value->titre ?>
                    </td>
                    <td>
                        <?= $value->description ?>
                    </td>
                    <td>
                        <a href=<?='"index.php?page=profil&id='.$value->id.'"'?> >
                            <button>M</button>
                        </a>
                    </td>
                    <td>
                        <a href=<?='"services/delete_note_service.php?id='.$value->id.'"'?> >
                            <button>S</button>
                        </a>
                    </td>

                </tr>
                <?php
            }
        ?>
        </table>
        

    </div>


</body>
</html>