<head>
    <meta charset="UTF-8">
    <title>..:: SIMORETA ::..</title>
    <link rel="stylesheet" href="admin_login/style.css" />
    <link rel='stylesheet' type='text/css'>
      <link rel="shortcut icon" href="../../template/img/logo.png">

</head>
<body>
    <div class="lg-container">
        <h1>SIMORETA</h1>
        <form action="proses_login.php" id="lg-form" name="lg-form" method="post">

            <div>
                <label for="username">Username:</label>
                <input type="text" name="username_admin" id="username" placeholder="username" required/>
            </div>

            <div>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" placeholder="password" required/>
            </div>

            <div>				
                <button type="submit" id="login">Login</button>
            </div>

        </form>
        <center><h2>PENGADILAN AGAMA MAJALENGKA</h2></center>
        <div id="message"></div>
    </div>
</body>