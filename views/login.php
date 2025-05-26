<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="style/homePage.css"/>
    <link rel="stylesheet" href="style/login.css"/>
    <title>Login - Avogestione</title>
</head>
<body>
<header class="header">
    <div class="top-bar">
        <h1>Istituto Amedeo Avogadro - Torino</h1>
        <div class="auth-buttons">
            <button onclick="location.href='registrazione.html'">Registrati</button>
        </div>
    </div>

    <div class="logo-container">
        <a href="index.php?action=home">
            <img src="icon/logo.png" alt="Logo Istituto Avogadro"/>
        </a>
        <h2>Portale Avogestione</h2>
        <nav class="social-nav">
            <a href="https://www.facebook.com/p/IIS-Amedeo-Avogadro-Torino-100072315053776/" target="_blank"><img
                        src="/icon/fb.jpg" alt="Facebook"></a>
            <a href="https://www.instagram.com/avogadro_torino_official/" target="_blank"><img src="/icon/ig.jpg"
                                                                                               alt="Instagram"></a>
            <a href="https://www.youtube.com/channel/UCCp9YoDfdV1GMUwQtlNVz9w" target="_blank"><img src="/icon/yb.jpg"
                                                                                                    alt="YouTube"></a>
        </nav>
    </div>
</header>

<main>
    <section class="navigation">
        <?= require_once "templates/navigation.php" ?>
    </section>

    <section class="login-container">
        <h2>Bentornato</h2>
        <h3>Inserisci i tuoi dati per continuare</h3>

        <form action="index.php?action=login" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <input type="submit" value="Accedi">
        </form>
    </section>
</main>

</body>
</html>
