<!DOCTYPE html>
<html lang="it">
<head>

    <link rel="stylesheet" href="style/login.css">
    <title>Nuovo Corso</title>
    <script src="js/index.js">
    </script>
</head>
<body>

<header>
    <img src="icon/logo.png" alt="Logo Avogadro">
    <h1>AVOGESTIONE</h1>
</header>

<h3>INSERISCI I DATI PER CONTINUARE</h3>


<form method="post" id="form" action="index.php?action=<?= $action ?>">

    <?php if (isset($corsi)): ?>
        <label>Corsi
            <select id="corso" name="id">
                <?php /** @var Corsi $corso */
                foreach ($corsi as $corso): ?>
                    <option value="<?= $corso->getId() ?>"> <?= $corso->getTitolo() ?></option>
                <?php endforeach ?>
            </select>
        </label> <br>
    <?php endif ?>


    <label>
        titolo:
        <input type="text" required name="titolo">
    </label><br>
    <label>
        descrizione:
        <input type="text" required name="descrizione">
    </label><br>
    <label>
        max Partecipanti:
        <input type="number" required name="max">
    </label><br>
    <label>
        data e ora:
        <input type="datetime-local" required name="date">
    </label><br>
    <label>
        aula
        <input type="text" required name="aula">
    </label><br>

    <input type="submit" value="Create">
</form>


</body>
</html>