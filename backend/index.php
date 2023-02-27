<?php 

session_start();

if (isset($_SESSION['id']) || isset($_SESSION['username'])) {
 ?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="refresh" content="15*60;url=/logout_session" />
    <title>Home Page</title>

    <link rel="stylesheet" href="backend/css_file.css">

</head>

<body>
    <div class="login-container">
        <form action="/logout_session" method="post">
        <?php if (isset($_GET['error'])) { ?>

        <p class="error"><?php echo $_GET['error']; ?></p>

        <?php } ?>

            <button type="submit">Logout</button>
            
            <a class="active" href="/dok_api">Dokumentasi API</a>
            <br>
        </form>
    </div>

    <div class="intro">
        <h1>Hello, <?php echo $_SESSION['username']; ?></h1>
        <p>Selamat datang di backend El-AKIP, di sini dapat mengakses kegiatan yang ada di database.</p>
        <p>Seperti melihat dokumentasi API, data user, visi, misi, tujuan, target serta indikator dan kegiatan yang telah diinputkan oleh user.</p>
    </div>

    <div class="log">
        <iframe src="/data_log" title="Data Log" width="800" height="570" align="left"></iframe>
    </div>
    
    <div class="log">
        <iframe src="/login_log" title="Login Log" width="600" height="500" align="right"></iframe>
    </div>

</body>
</html>

<?php 

    }
    else {
        header("Location: /home");
        exit();
    }
?>