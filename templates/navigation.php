<nav class="main-nav">

    <a href="/index.php?action=corsi">Corsi disponibili</a>
    <a href="/views/regolamento.html" target="_blank">Regolamento</a>

    <?php if (isset($_SESSION["id"])): ?>
        <a href="/index.php?action=iscrizioni">Le tue iscrizioni</a>
    <?php endif; ?>

    <?php if (isset($_SESSION["ruolo"]) && Roles::tryFrom($_SESSION["ruolo"]) == Roles::ORGANIZZATORE) : ?>
        <a href="/index.php?action=create">Crea un corso</a>
    <?php endif; ?>
</nav>
