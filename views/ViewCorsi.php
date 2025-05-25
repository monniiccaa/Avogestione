<!doctype html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Corsi</title>

    <style>
        tr, td, th {
            border: 1px solid black;
            text-align: center;
        }
    </style>
</head>
<body>

<a href="index.php?action=update">
    <button>Modifica I tuoi Corsi</button>
</a>

<table>
    <tr>
        <th>Titolo</th>
        <th>descrizione</th>
        <th>Data e Ora</th>
        <th>max Partecipanti</th>
        <th>Organizzatore</th>
        <th>Aula</th>
    </tr>

    <?php /** @var Corsi $corso */
    foreach ($corsi as $corso): ?>

        <tr>
            <td><?= $corso->getTitolo() ?></td>
            <td><?= $corso->getDescrizione() ?></td>
            <td><?= $corso->getDataEOra() ?></td>
            <td><?= $corso->getMaxPartecipanti() ?></td>
            <td><?php
                $user = Users::getById($corso->getIdOrganizzatore());
                echo $user->getUsername() ?></td>
            <td><?= $corso->getAula() ?></td>

            <?php if ($_SESSION['id'] == $corso->getIdOrganizzatore()): ?>
                <td>
                    <form action="index.php?action=update" method="post">
                        <input type="hidden" name="id" value="<?= $corso->getId() ?>"">
                        <input type="submit" value="Modifica">
                    </form>
                </td>
            <?php endif; ?>
        </tr>

    <?php endforeach; ?>
</table>

</body>
</html>