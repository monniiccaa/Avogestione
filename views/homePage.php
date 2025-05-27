<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="/style/homePage.css"/>
    <title>Avogestione</title>


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
</head>


<body>
<div id="cookie-banner" class="cookie-banner">
    <p>Questo sito utilizza cookie per migliorare la tua esperienza. <a href="/views/privacy.html" target="_blank">Leggi
            di più</a></p>
    <button onclick="acceptCookies()">Accetta</button>
</div>

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
        <form id="search-form" class="search-form" action="#">
            <label for="search-input">Search</label>
            <input type="text" name="query" id="search-input" placeholder="Cerca un corso..."/>
            <input type="submit" value="Cerca"/>
        </form>
    </section>

    <section class="gallery">
        <img src="/icon/laboratorio.jpg" alt="Laboratorio creativo"/>
        <img src="/icon/assemblea.jpeg" alt="Assemblea studenti"/>
        <img src="/icon/sport.jpeg" alt="Attività sportiva"/>
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

    <!-- Sezione Domande frequenti -->
    <section class="faq info-box">
        <h2>Domande frequenti</h2>
        <div class="faq">
            <h4>Come faccio a iscrivermi a un corso?</h4>
            <p>Vai nella sezione “Corsi disponibili”, scegli il corso che ti interessa e clicca su “Iscriviti”.</p>

            <h4>Posso creare anch’io un corso?</h4>
            <p>Sì! Basta accedere alla sezione “Crea un corso” come studente organizzatore e compilare il modulo con le
                informazioni richieste.</p>

            <h4>Quante attività posso fare al giorno?</h4>
            <p>È possibile iscriversi a una sola attività per fascia oraria.</p>
        </div>
    </section>
</main>


<footer>
    <div class="footer-top">
        <img src="/icon/stemma.png" alt="Stemma Torino"/>
        <h2>Progetto Avogestione 2024/25</h2>
        <nav class="social-nav">
            <a href="https://www.facebook.com/cittaditorino" target="_blank"><img src="/icon/fb.jpg" alt="Facebook"></a>
            <a href="https://www.instagram.com/cittaditorino/" target="_blank"><img src="/icon/ig.jpg"
                                                                                    alt="Instagram"></a>
            <a href="https://www.youtube.com/@YouTorino" target="_blank"><img src="/icon/yb.jpg" alt="YouTube"></a>
        </nav>
    </div>
    <div class="footer-bottom">
        <p>Ultimo aggiornamento: 23/03/2025</p>
        <a href="/views/condizioni.html" target="_blank">Privacy e condizioni d'uso</a>
    </div>
</footer>
</body>
</html>
