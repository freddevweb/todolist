<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin profil list</title>
</head>
<body>
    <h1>Admin profil list</h1>

    <div>
        <table>
            <tr>
                <td> go to </td>
                <!--<td> change state</td>-->
                <td> id </td>
                <td> user </td>
                <td> mail </td>
                <td> state </td>
            </tr>
            
            <?php
                foreach( $users as $users ){
                    ?>
                    <tr>
                        <td>
                            <a href="profil_admin.php?pageAdmin=admin_profile_content&userId=<?=$users->id;?>" >
                                <button> &nbsp; &nbsp; &nbsp;
                                </button>
                            <a href="">
                        </td>
                        <!--<td> 
                            <a href="profil_admin.php?pageAdmin=admin_profile_content&userId=<?=$users->id;?>" >
                                <button> &nbsp; &nbsp; &nbsp;
                                </button>
                            <a href="">
                        </td>-->
                        <td><?=$users->id;?></td>
                        <td><?=$users->username;?></td>
                        <td><?=$users->email;?></td>
                        <td><?=$users->state;?></td>
                    <?php
                }
            ?>
        </table>
    </div>
</body>
</html>