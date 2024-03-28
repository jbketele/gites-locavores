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

// Fonction pour tronquer la description en fonction de la largeur de l'écran
function truncateDescription() {
    var descriptionElements = document.getElementsByClassName('descriptif');
    var screenWidth = window.innerWidth;

    // Définir la longueur maximale de la description en fonction de la largeur de l'écran
    var maxCharacters = screenWidth < 768 ? 100 : 300;

    for (var i = 0; i < descriptionElements.length; i++) {
        var descriptionText = descriptionElements[i].textContent;
        var truncatedDescription = descriptionText.length > maxCharacters ? descriptionText.substring(0, maxCharacters) + '...' : descriptionText;
        descriptionElements[i].textContent = truncatedDescription;
    }
}

// Appeler la fonction pour tronquer la description au chargement de la page et lors du redimensionnement de la fenêtre
window.addEventListener('DOMContentLoaded', truncateDescription);
window.addEventListener('resize', truncateDescription);

var map = L.map('map').setView([48.6443057, 2.7537863], 7.5); // Amiens, France

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

var marker1 = L.marker([48.831548, 2.4341479]).addTo(map);
marker1.bindPopup("<b>La Maison du Bois</b><br>C. Vincent");


var marker2 = L.marker([48.4049375, 2.7015872]).addTo(map);
marker2.bindPopup("<b>Le Refuge des Étangs</b><br>A. Fontaine");
var marker3 = L.marker([48.8035403, 2.1266886]).addTo(map);
marker3.bindPopup("<b>La Maison des Champs</b><br>E. Duchateau");
