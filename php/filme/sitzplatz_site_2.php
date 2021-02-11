<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="../../css/andrew.css">
</head>



<body class="admin">
<?php
session_start();
$_SESSION['saal'] = 2;
$_SESSION['film'] = 2;
?>
    <h1 class="cine_reg">Cinema Register</h1>



    <form method="post" action="../sitzplatz/sitzplatz.php" class="form-container register">
        <h1>Login</h1>

        <label for="email"><b>Firstname</b></label>
        <input type="text" class="textbox" id="txt_uname" name="txt_uname" placeholder="Username" required />

        <label for="psw"><b>Lastname</b></label>
        <input type="text" class="textbox" id="txt_uname" name="txt_pwd" placeholder="Lastname" required />

        <label for="psw"><b><br><br> Place Nr <br></b></label>
        <input type="number" class="textbox" id="txt_place" name="txt_place" placeholder="Place Nr" required />

        <button type="submit" class="btn"> Login</button>
    </form>

    <script>
        <?php
        require_once("../connection.class.php");

        $sitze = "SELECT platz_nummer FROM saal WHERE saal_plätze_id_fs = 2;";
        $result = $connection->query;
        $row = $connection->mysqli_fetch_assoc;

        echo "var data = " . json_encode($result->fetch_all(MYSQLI_ASSOC)) . ";";
        ?>
        let i = 0;
        for (i = 0; i < data.length; i++) {
            let chair_image = document.createElement('img');
            const chair_num = document.createElement("P");
            img.src = "../../Bilder/stuhl.svg";
            chair_num.innerText = data;
        }
    </script>
</body>




</html>