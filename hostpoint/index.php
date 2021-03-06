<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/andrew.css">
    
</head>
<script>
    function openForm() {
        document.getElementById("myForm").style.display = "block";
    }

    function closeForm() {
        document.getElementById("myForm").style.display = "none";
    }
</script>


<body class="index">

    <h1 class="header_60px">Cinema Register</h1>

    <button class="open-button" onclick="openForm()">Login as Admin </button>

    <div class="form-popup" id="myForm">
        <form method="post" action="/php/Login/login.php" class="form-container">
            <h1>Login</h1>

            <label for="email"><b>Username</b></label>
            <input type="text" class="textbox" id="txt_uname" name="txt_uname" placeholder="Username" required />

            <label for="psw"><b>Password</b></label>
            <input type="password" class="textbox" id="txt_uname" name="txt_pwd" placeholder="Password" required />

            <button type="submit" class="btn">Login</button>
            <button type="submit" class="btn cancel" onclick="closeForm()" style="background-color: red;" >Close</button>
        </form>
    </div>

    <h1 ><a class="header" href="./php/sitzplatz/sitzplatz_site.php" id="title1">hello</a></h1>
    <h2 class="showtime" id="time"></h2>
    <h1 ><a class="header" href="./php/filme/sitzplatz_site_2.php" id="title2"></a></h1>
    <h2 class="showtime" id="time2"></h2>
    <h1 ><a class="header" href="./php/filme/sitzplatz_site_3.php" id="title3"></a></h1>
    <h2 class="showtime" id="time3"></h2>
    <script>

        <?php
        
        require_once("./php/connection.class.php");
        require_once("./php/anzeigen/anzeigen.class.php");
        require_once("./php/sitzplatz/sitzplatz.class.php");
        
        $vis = new Visualise($connection);
        $vis->autodelete();
        
        $sitze = "SELECT name,zeit FROM film;";
        $result = $connection->query($sitze);
        echo "var data = " . json_encode($result->fetch_all(MYSQLI_ASSOC)) . ";";
        ?>
        console.log(data);
        let i = 0;
        const title1 = document.getElementById("title1");
        const title2 = document.getElementById("title2");
        const title3 = document.getElementById("title3");
        const time1 = document.getElementById("time");
        const time2 = document.getElementById("time2");
        const time3 = document.getElementById("time3");
        title1.innerText = data[0]['name'];
        title2.innerText = data[1]['name'];
        title3.innerText = data[2]['name'];
        time1.innerText = data[0]['zeit'];
        time2.innerText = data[1]['zeit'];
        time3.innerText = data[2]['zeit'];

    </script>
</body>


</html>