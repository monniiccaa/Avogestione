// menu.js - Gestione dinamica del menu utente in base al ruolo

(function () {
  // Recupera il ruolo salvato nello storage (es. "Organizzatore", "Studente" o null)
  const ruolo = sessionStorage.getItem("ruoloUtente");
  const menu = document.getElementById("menu-utente");

  // Costruzione dinamica del menu
  if (ruolo === "Organizzatore") {
    menu.innerHTML = `
      <nav class="main-nav">
        <a href="home.html">Home</a>
        <a href="CreazioneCorsi.php">Crea un corso</a>
        <a href="ViewIscrizione.php">Gestisci iscrizioni</a>
        <a href="../../../Desktop/sito/sito/regolamento.html">Regolamento</a>
        <a href="logout.html">Logout</a>
      </nav>
    `;

  } else if (ruolo === "Studente") {
    menu.innerHTML = `
      <nav class="main-nav">
        <a href="home.html">Home</a>
        <a href="ViewCorsi.php">Corsi disponibili</a>
        <a href="ViewIscrizione.php">Le tue iscrizioni</a>
        <a href="../../../Desktop/sito/sito/regolamento.html">Regolamento</a>
        <a href="logout.html">Logout</a>
      </nav>
    `;

  } else {
    menu.innerHTML = `
      <nav class="main-nav">
        <a href="home.html">Home</a>
        <a href="../../../Desktop/sito/sito/regolamento.html">Regolamento</a>
        <a href="../../../Desktop/sito/sito/login.html">Login</a>
        <a href="../../../Desktop/sito/sito/registrazione.html">Registrati</a>
      </nav>
    `;
  }

  // Debug opzionale (puoi rimuovere questa parte in produzione)
  console.log("Ruolo corrente:", ruolo);
})();