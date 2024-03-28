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
            card.classList.remove('hidden')
            card.style.order = 0

        } else {
            card.classList.add('hidden')
            card.style.order = 1
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


var map = L.map('map').setView([47.5490251, 1.7324062], 8);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

var marker1 = L.marker([47.3900474, 0.6889268]).addTo(map);
marker1.bindPopup("<b>Le Refuge des Vignes</b><br>M. Bouchard");


var marker2 = L.marker([47.5876861, 1.3337639]).addTo(map);
marker2.bindPopup("<b>La Maison des Châteaux</b><br>J. Lambert");
var marker3 = L.marker([47.9027336, 1.9086066]).addTo(map);
marker3.bindPopup("<b>Le Cottage de la Loire</b><br>E. Roussel");
