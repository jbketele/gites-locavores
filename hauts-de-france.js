document.getElementById('filterInput').addEventListener('keydown', function (event) {
    // Empêcher l'action par défaut du formulaire
    if (event.key === 'Enter') {
        event.preventDefault(); // Empêcher la soumission du formulaire
        filterCards();
    }
});

document.getElementById('filterInput').addEventListener('input', function () {
    filterCards();
});

function filterCards() {
    var inputText = document.getElementById('filterInput').value.toLowerCase();
    var cards = document.getElementsByClassName('card');
    for (var i = 0; i < cards.length; i++) {
        var cardText = cards[i].textContent.toLowerCase();
        var card = cards[i];

        if (cardText.includes(inputText)) {
            card.classList.remove('hidden');
            card.style.order = 0;
        } else {
            card.classList.add('hidden');
            card.style.order = 1;
        }
    }
}

// Modifier le texte de la description pour afficher uniquement les premiers caractères
var descriptionElements = document.getElementsByClassName('descriptif');
for (var i = 0; i < descriptionElements.length; i++) {
    var descriptionText = descriptionElements[i].textContent;
    var truncatedDescription = descriptionText.substring(0, 150); // Modifier la longueur selon vos besoins
    descriptionElements[i].textContent = truncatedDescription;
}


var map = L.map('map').setView([50.1024606, 2.7247515], 7.5); // Amiens, France

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

var marker1 = L.marker([49.9052, 3.7924]).addTo(map);
marker1.bindPopup("<b>La Ferme de M. Seguin</b><br>Éric Dupont");


var marker2 = L.marker([50.5452102, 3.0252819]).addTo(map);
marker2.bindPopup("<b>GAEC des Marais</b><br>D. Van De Bruck");
var marker3 = L.marker([49.7407935, 2.1511753]).addTo(map);
marker3.bindPopup("<b>SCEA de la Sablière</b><br>Jean Leclerc");
