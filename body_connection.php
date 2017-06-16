    <div class="fixed-bg-pattern"></div>
    <main class="home">
        <div class="wrapper">
            <nav class="navbar custom-navbar">
                <div class="container">
                    <?php include "navigation.php" ?>
                </div>
            </nav>
            <section class="hero">
<br>
<br>
<br>
<br>
<br>
<br>

hello world

<?php
$servername = "115.85.5.5";
$username = "vcwebsite";
$password = "Vcpwebsite2016";
$table = "rooms";

// Create connection
$conn = mysql_connect($servername, $username, $password, $table);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysql_error());
}
echo "Connected successfully";

mysql_close($conn);
?>
            </section>
        </div>
    </main>
