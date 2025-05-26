<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="style/homePage.css"/>
    <title>Avogestione</title>
</head>
<div id="cookie-banner" class="cookie-banner">
    <p>Questo sito utilizza cookie per migliorare la tua esperienza. <a href="views/privacy.html" target="_blank">Leggi
            di
            più</a></p>
    <button onclick="acceptCookies()">Accetta</button>
</div>
<script>
    function acceptCookies() {
        localStorage.setItem("cookiesAccepted", "true");
        document.getElementById("cookie-banner").style.display = "none";
    }

    window.addEventListener("load", function () {
        if (!localStorage.getItem("cookiesAccepted")) {
            document.getElementById("cookie-banner").style.display = "block";
        }
    });
</script>

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
    <section class="navigation">
        <?= require_once "templates/navigation.php" ?>
        <form id="search-form" class="search-form" action="#">
            <input type="text" name="query" id="search-input" placeholder="Cerca un corso..."/>
            <input type="submit" value="Cerca"/>
        </form>
    </section>

    <section class="gallery">
        <img src="icon/laboratorio.jpg" alt="Laboratorio creativo"/>
        <img src="icon/assemblea.jpeg" alt="Assemblea studenti"/>
        <img src="icon/sport.jpeg" alt="Attività sportiva"/>
    </section>

    <section class="eventi">
        <h2>Ultime novità di Avogestione</h2>
        <div class="event-list">
            <article class="box">
                <h3>Iscrizioni aperte!</h3>
                <p>Gli studenti possono ora iscriversi ai corsi per ogni fascia oraria dei giorni 24, 25 e 26 marzo.
                    Attenzione: una sola iscrizione per fascia oraria!</p>
            </article>
            <article class="box">
                <h3>Organizza il tuo corso</h3>
                <p>Se hai proposte interessanti per un laboratorio, seminario o attività sportiva, crea il tuo corso
                    tramite l’apposita sezione.</p>
            </article>
            <article class="box">
                <h3>Visualizza le tue attività</h3>
                <p>Accedi alla tua area personale per vedere a quali corsi ti sei iscritto e gestire le tue
                    partecipazioni.</p>
            </article>
            <article class="box">
                <h3>Consulta il regolamento</h3>
                <p>Leggi attentamente le regole di Avogestione per vivere al meglio questa esperienza di partecipazione
                    e responsabilità.</p>
            </article>
        </div>
    </section>

    <section class="in-evidenza">
        <h2>Risorse utili</h2>
        <div class="iframe-container">
            <iframe src="https://www.3bmeteo.com/meteo/torino" frameborder="0"></iframe>
            <iframe src="https://www.visitaretorino.it/torino-eventi.php" frameborder="0"></iframe>
        </div>
    </section>

    <section class="calendario">
        <h2>Calendario Avogestione</h2>
        <img src="icon/cal.jpg" alt="Calendario Avogestione 2025"/>
    </section>

    <section class="circoscrizioni">
        <h2>Le attività per categoria</h2>
        <div class="circos-container">
            <ol>
                <li>Laboratori creativi</li>
                <li>Attività sportive</li>
                <li>Incontri tematici e seminari</li>
                <li>Assemblee e dibattiti</li>
                <li>Iniziative culturali</li>
                <li>Progetti multimediali</li>
            </ol>
            <img src="icon/turin.jpg" alt="Attività in tutta la scuola"/>
        </div>
    </section>
</main>

<footer>
    <div class="footer-top">
        <img src="/icon/stemma.png" alt="Stemma Torino"/>
        <h2>Progetto Avogestione 2024/25</h2>
        <nav class="social-nav">
            <a href="https://www.facebook.com/cittaditorino" target="_blank"><img src="/icon/fb.jpg" alt="Facebook"></a>
            <a href="https://www.instagram.com/cittaditorino/" target="_blank"><img src="/icon/ig.jpg" alt="Instagram"></a>
            <a href="https://www.youtube.com/@YouTorino" target="_blank"><img src="/icon/yb.jpg" alt="YouTube"></a>
        </nav>
    </div>
    <div class="footer-bottom">
        <p>Ultimo aggiornamento: 06/10/2023</p>
        <a href="http://www.comune.torino.it/condizioni.html" target="_blank">Privacy e condizioni d'uso</a>
    </div>
</footer>
</body>
</html>
