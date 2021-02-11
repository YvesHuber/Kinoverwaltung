<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="../../css/andrew.css">
</head>


</style>

<body class="admin">

    <h1 class="cine_reg">Cinema Register</h1>



    <form method="post" action="sitzplatz.php" class="form-container register">
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
        require_once("/PHP/connection.class.php");
        require_once("/Kinoverwaltung/PHP/anzeigen/show.class.php");

        $seat = new Show($connection, 1);

        $info = $seat->seats_of_saal();

        ?>
</body>




</html>