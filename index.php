<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="/css/style.css">
</head>
<script>
    function openForm() {
        document.getElementById("myForm").style.display = "block";
    }

    function closeForm() {
        document.getElementById("myForm").style.display = "none";
    }
</script>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Balsamiq+Sans&family=Roboto:ital,wght@1,700&display=swap');

    * {
        font-family: 'Balsamiq Sans', cursive;
        font-family: 'Roboto', sans-serif;
    }

    body {
        padding: 150px;
        background-size: cover;
        background-image: url(https://media.istockphoto.com/vectors/modern-cinema-background-with-realistic-film-strips-movie-production-vector-id1204686197?k=6&m=1204686197&s=170667a&w=0&h=KFJhZWhgNDIsgHC07Psc5POVHeF9pmdqIobUmpq6MSg=);
        background-repeat: no-repeat;
    }
</style>

<body>

    <h1 style="font-family: 'Balsamiq Sans', cursive; font-family: 'Roboto', sans-serif; font-size: 60px; text-align: center; color: white">Cinema Register</h1>

    <button class="open-button" onclick="openForm()">Login as Admin </button>


    <div class="form-popup" id="myForm">
        <form method="post" action="/php/Login/login.php" class="form-container">
            <h1>Login</h1>

            <label for="email"><b>Username</b></label>
            <input type="text" class="textbox" id="txt_uname" name="txt_uname" placeholder="Username" required />

            <label for="psw"><b>Password</b></label>
            <input type="password" class="textbox" id="txt_uname" name="txt_pwd" placeholder="Password" required />

            <button type="submit" class="btn">Login</button>
            <button type="submit" class="btn cancel" onclick="closeForm()">Close</button>
        </form>
    </div>



    <h1 style="text-align: center; font-size: 50px;" id="1"><a href="php/sitzplatz/sitzplatz_site.php" style="font-family: 'Balsamiq Sans', cursive;font-family: 'Roboto', sans-serif; color: red;"></a></h1>
    <h1 style="text-align: center; font-size: 50px;" id="2"><a href="php/filme/sitzplatz_site_2.php" style="font-family: 'Balsamiq Sans', cursive;font-family: 'Roboto', sans-serif; color: red;"></a></h1>
    <h1 style="text-align: center; font-size: 50px;" id="3"><a href="php/filme/sitzplatz_site_3.php" style="font-family: 'Balsamiq Sans', cursive;font-family: 'Roboto', sans-serif; color: red;"></a></h1>
</body>
<?php
require_once("../connection.class.php");

$sitze = "SELECT name FROM film;";
$result = $connection->query;
$row = $connection->mysqli_fetch_assoc;

echo "var data = " . json_encode($row->fetch_all(MYSQLI_ASSOC)) . ";";

?>
<script>
    let i = 0;
    const title1 = document.getElementById("1");
    const title2 = document.getElementById("2");
    const title3 = document.getElementById("3");

    /* for the future if no time to automatically do movies
    for (i = 0; i < data.length; i++){
        title = document.createElement('h1');
        title.innerText = data;
    }*/
    title1.innerText = data['name'][0];
    title2.innerText = data['name'][0];
    title3.innerText = data['name'][0];
</script>

</html>