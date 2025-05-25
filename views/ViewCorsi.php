<!doctype html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Corsi</title>

    <style>
        body {
            background-color: #FFC300;
        }


        table {
            width: 100%;
            border-collapse: collapse;
            font-family: Arial, sans-serif;
            background-color: #ffcc00; /* Giallo principale */
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 2px solid #0066cc; /* Blu accento */
        }

        th {
            background-color: #0066cc; /* Blu accento */
            color: white;
            text-transform: uppercase;
        }

        tr:nth-child(even) {
            background-color: #ffdd44; /* Tonalità più chiara di giallo per alternare le righe */
        }

        tr:hover {
            background-color: #ffee88; /* Highlight quando si passa sopra */
        }

        td {
            color: #333;
        }

        table {
            box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.2);
            border-radius: 8px;
            overflow: hidden;
        }

    </style>
</head>
<body>

<a href="index.php?action=update">
    <button>Modifica I tuoi Corsi</button>
</a>
<a href="index.php?action=delete">
    <button>Cancella I tuoi Corsi</button>
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
    foreach ($corsi

    as $corso): ?>
    <tr>
        <td><?= $corso->getTitolo() ?></td>
        <td><?= $corso->getDescrizione() ?></td>
        <td><?= $corso->getDataEOra() ?></td>
        <td><?= $corso->getMaxPartecipanti() ?></td>
        <td><?php
            $user = Users::getById($corso->getIdOrganizzatore());
            echo $user->getUsername() ?></td>
        <td><?= $corso->getAula() ?></td>

        <?php endforeach; ?>
</table>

</body>
</html>