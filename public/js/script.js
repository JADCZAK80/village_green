document.addEventListener('DOMContentLoaded', (event) => {
    document.getElementById('registration_form').addEventListener('submit', function(e) {
        if (!verifi()) {
            e.preventDefault();  // Empêche l'envoi du formulaire si la validation échoue
        }
    });
});

function verifi() {
    var nom = document.getElementById('nom').value;
    var regexnom = /^[A-Za-z]+$/;
    var valid = true;

    if (nom === '') {
        document.getElementById('nom').style.backgroundColor = "red";
        document.getElementById('nom').style.color = "#FFF";
        document.getElementById('nom_manquant').innerHTML = "Nom manquant";
        document.getElementById('nom_manquant').style.color = "red";
        valid = false;
    } else if (!regexnom.test(nom)) {
        document.getElementById('nom').style.backgroundColor = "orange";
        document.getElementById('nom').style.color = "#FFF";
        document.getElementById('nom_manquant').innerHTML = "Nom incorrect";
        document.getElementById('nom_manquant').style.color = "orange";
        valid = false;
    } else {
        document.getElementById('nom').style.backgroundColor = "white";
        document.getElementById('nom').style.color = "black";
        document.getElementById('nom_manquant').innerHTML = "";
    }

    return valid;
}
