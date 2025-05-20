<!DOCTYPE html>
<html>
<head>

    <link rel="stylesheet" href="style/login.css">

</head>
<body>

<header>
    <img src="icon/logo.png" alt="Logo Avogadro">
    <h1>AVOGESTIONE</h1>
</header>

<h2>BENTORNATO</h2>
<h3>INSERISCI I TUOI DATI PER CONTINUARE</h3>


<form method="post" action="index.php?action=login">
    <label for="username">Username:</label><br>
    <input type="text" id="username" name="username" required><br>
    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password" required><br>
    <input type="submit" value="Invio">
</form>


</body>
</html>