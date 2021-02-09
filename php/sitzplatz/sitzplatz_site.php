<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="../../css/style.css">
</head>

<body>

    <h1>Cinema Register</h1>



        <form method="post" action="sitzplatz.php" class="form-container">
            <h1>Login</h1>

            <label for="email"><b>Firstname</b></label>
            <input type="text" class="textbox" id="txt_uname" name="txt_uname" placeholder="Username" required/>

            <label for="psw"><b>Lastname</b></label>
            <input type="text" class="textbox" id="txt_uname" name="txt_pwd" placeholder="Lastname" required/>

            
            <label for="psw"><b>Saal Nr</b></label>
            <input type="number" class="textbox" id="txt_saal" name="txt_saal" placeholder="Saal Nr" required/>

            
            <label for="psw"><b>Place Nr</b></label>
            <input type="number" class="textbox" id="txt_place" name="txt_place" placeholder="Place Nr" required/>

            
            <label for="psw"><b>Film Nr</b></label>
            <input type="number" class="textbox" id="txt_film" name="txt_film" placeholder="Film Nr" required/>

            <button type="submit" class="btn">Login</button>
        </form>

    <script>
        <?php
            require_once("../connection.class.php");

            $sitze = "SELECT platz_nummer FROM saal WHERE saal_plätze_id_fs = 1;";
            $result = $connection->query;
            $row = $connection->mysqli_fetch_assoc;

            echo "var data = " . json_encode($result->fetch_all(MYSQLI_ASSOC)) . ";";
        ?>
        let i = 0;
        for (i = 0; i < data.length; i++){
            let chair_image = document.createElement('img');
            const chair_num = document.createElement("P");
            img.src = "../../Bilder/stuhl.svg";
            chair_num.innerText = data;
        }
    </script>
</body>




</html>