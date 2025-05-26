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
            <?= require_once "templates/BottoniAuth.php" ?>
        </div>
    </div>

    <?php require_once "templates/loghi.php" ?>
</header>

<main>

    <?php require_once "templates/navigation.php" ?>

    <section class="login-container">
        <h2>Proponi qui il tuo corso</h2>
        <h3>Inserisci le specifiche</h3>

        <form action="index.php?action=login" method="post">
            <label for="nomeCorso">Nome:</label>
            <input type="text" id="nomeCorso" name="nomeCorso" required>

            <label for="descrizione">Descrizione:</label>
            <input type="text" id="descrizione" name="descrizione" required>

            <label for="orario">Orario:</label>
            <input type="datetime-local" id="orario" name="orario" required>

            <label for="maxPartecipanti">Numero massimo di partecipanti:</label>
            <input type="number" id="maxPartecipanti" name="maxPartecipanti" required>

            <input type="submit" value="Accedi">
        </form>
    </section>
</main>

</body>
</html>
