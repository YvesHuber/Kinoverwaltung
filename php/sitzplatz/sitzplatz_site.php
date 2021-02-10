<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="../../css/style.css">
</head>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Balsamiq+Sans&family=Roboto:ital,wght@1,700&display=swap');

    * {
        font-family: 'Balsamiq Sans',
            cursive;
        font-family: 'Roboto',
            sans-serif;
    }

    body {
        text-align: center;
    }

    form {
        display: inline-block;


    }
</style>

<body>

    <h1 style="font-size: 50px; color: white;">Cinema Register</h1>



    <form style="background-color: rgb(255, 255, 255, 0.7); border-radius: 25px" method="post" action="sitzplatz.php" class="form-container">
        <h1>Login</h1>

        <label for="email"><b>Firstname</b></label>
        <input type="text" class="textbox" id="txt_uname" name="txt_uname" placeholder="Username" required />

        <label for="psw"><b>Lastname</b></label>
        <input type="text" class="textbox" id="txt_uname" name="txt_pwd" placeholder="Lastname" required />


        <label for="psw"><b>Saal Nr <br></b></label>
        <input type="number" class="textbox" id="txt_saal" name="txt_saal" placeholder="Saal Nr" required />


        <label for="psw"><b><br><br> Place Nr<br></b></label>
        <input type="number" class="textbox" id="txt_place" name="txt_place" placeholder="Place Nr" required />


        <label for="psw"><b><br><br> Film Nr <br></b></label>
        <input type="number" class="textbox" id="txt_film" name="txt_film" placeholder="Film Nr" required />

        <button type="submit" class="btn">Login</button>
    </form>

        <?php
        require_once("../../Projekt_Kino/Kinoverwaltung/PHP/connection.class.php");
        require_once("../../Projekt_Kino/Kinoverwaltung/PHP/anzeigen/show.class.php");

        $seat = new Show($connection, 1);

        $info = $seat->seats_of_saal();

        ?>
</body>




</html>