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

var map = L.map('map').setView([16.2528827, -61.5686855], 10);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

var marker1 = L.marker([16.0000778, -61.7333373]).addTo(map);
marker1.bindPopup("<b>La Casa Créole</b><br>E. Saint-Louis");


var marker2 = L.marker([16.225065231323242, -61.3808479309082]).addTo(map);
marker2.bindPopup("<b>La Refuge des Cocotiers</b><br>N. Gabriel");
var marker3 = L.marker([16.2706436, -61.5057749]).addTo(map);
marker3.bindPopup("<b>Le Villa Créole</b><br>C. Jolicoeur");
