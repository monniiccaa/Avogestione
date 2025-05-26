<?php if (!isset($_SESSION["id"])): ?>
    <a href="index.php?action=register">
        <button>Registrati</button>
    </a>
    <a href="index.php?action=login">
        <button>Accedi</button>
    </a>
<?php else: ?>
    <a href="index.php?action=logout">
        <button>Logout</button>
    </a>
<?php endif; ?>
