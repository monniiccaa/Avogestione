const updateInformazioniForm = () => {
    const form = document.getElementById('form');
    const selection = document.getElementById('corso')
    fetch("index.php?action=getCorsiOfUserJson").then((response) => {
        if (!response.ok) {
            throw new Error("Corsi Of User Json");
        }
        return response.json();
    }).then(json => {
        let data = json[selection.selectedIndex];
        form["titolo"].value = data["titolo"];
        form["descrizione"].value = data["descrizione"];
        form["max"].value = data["maxPartecipanti"];
        form["date"].value = data["dataEOra"];
        form["aula"].value = data["aula"];

    }).catch(error => {
        console.log(error);
    })
}

document.addEventListener('DOMContentLoaded', () => {
    document.getElementById('corso').addEventListener("click", updateInformazioniForm);
});