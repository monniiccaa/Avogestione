<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="/style/homePage.css"/>
    <link rel="stylesheet" href="/style/login.css"/>
    <title>Corsi disponibili - Avogestione</title>
    <style>
        .table-container {
            max-width: 900px;
            margin: 40px auto;
            background-color: white;
            border: 4px solid #FFD700;
            border-radius: 10px;
            padding: 30px 25px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
            font-family: Verdana, sans-serif;
            color: #003366;
        }

        .table-container h2 {
            text-align: center;
            font-size: 2rem;
            margin-bottom: 20px;
            font-weight: bold;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px 15px;
            border: 1px solid #003366;
            text-align: left;
        }

        th {
            background-color: #FFD700;
            color: #003366;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #e6f0ff;
        }

        /* Stile pulsante iscriviti */
        .btn-iscriviti {
            background-color: #FFD700;
            color: #003366;
            font-weight: bold;
            border: none;
            border-radius: 6px;
            padding: 6px 12px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-decoration: none;
            display: inline-block;
            font-family: Verdana, sans-serif;
            font-size: 0.9rem;
        }

        .btn-iscriviti:hover {
            background-color: #e6c200;
        }
    </style>
</head>
<body>

<header class="header">
    <div class="top-bar">
        <h1>Istituto Amedeo Avogadro - Torino</h1>
        <?php require_once "templates/BottoniAuth.php" ?>
    </div>

    <?php require_once "templates/loghi.php" ?>
</header>

<main>
    <section class="navigation">
        <?php require_once "templates/navigation.php" ?>
    </section>

    <section class="table-container">
        <h2>Corsi disponibili</h2>
        <table>
            <thead>
            <tr>
                <th>Nome Corso</th>
                <th>Organizzatore</th>
                <th>Data e ora</th>
                <th>Posti disponibili</th>
            </tr>
            </thead>
            <tbody>
            <?php if (isset($corsi)) : ?>
                <?php /** @var Corsi $corso */
                foreach ($corsi as $corso): ?>
                    <tr>
                        <td><?= $corso->getTitolo() ?></td>
                        <td><?php
                            $id = $corso->getIdOrganizzatore();
                            echo Users::getById($id)->getId() ?></td>
                        <td><?= $corso->getDataEOra() ?></td>
                        <td><?= Iscrizioni::getPostiDisponibili($corso->getId()) ?></td>
                        <td>
                            <form method="post" action="/index.php?action=subscribe">
                                <input type="hidden" name="id" value="<?= $corso->getId() ?>">
                                <input class="btn-iscriviti" type="submit" value="Iscriviti">
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
            </tbody>
        </table>
    </section>
</main>

</body>
</html>

