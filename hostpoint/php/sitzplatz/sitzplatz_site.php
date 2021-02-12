<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="../../css/andrew.css">
    <style>
        .seat {
            width: 4%;
            height: 4%;
        }
    </style>

</head>

<body class="admin">
    <?php
    $id = 1;
    require_once("../connection.class.php");
    require_once("../anzeigen/anzeigen.class.php");
    session_start();
    $_SESSION['saal'] = $id;
    $_SESSION['film'] = $id;
    ?>
    <h1 class="cine_reg">Cinema Register</h1>



    <form method="post" action="sitzplatz.php" class="form-container register">
        <h1>Login</h1>

        <label for="email"><b>Firstname</b></label>
        <input type="text" class="textbox" id="txt_uname" name="txt_uname" placeholder="Username" required />

        <label for="psw"><b>Lastname</b></label>
        <input type="text" class="textbox" id="txt_uname" name="txt_pwd" placeholder="Lastname" required />

        <label for="psw"><b><br><br> Place Nr<br></b></label>
        <input type="number" class="textbox" id="txt_place" name="txt_place" placeholder="Place Nr" required />

        <button type="submit" class="btn">Login</button>
    </form>
    <form action="../../index.php">
        <input type="submit" name="back_to_index" value="Back to homepage" class="db_btn" id="back">
    </form>
    <?php
    $vis = new Visualise($connection);
    $vis->choose($id);
    ?>

</body>

</html>