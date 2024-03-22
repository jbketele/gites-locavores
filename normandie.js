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


var map = L.map('map').setView([48.879870, 0.171253], 8); // Amiens, France

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

var marker1 = L.marker([49.0598651, -1.0250661]).addTo(map);
marker1.bindPopup("<b>Le Cottage du Bocage</b><br>David Le Garrec");


var marker2 = L.marker([49.49552536010742, 0.1280045062303543]).addTo(map);
marker2.bindPopup("<b>Le Havre Tranquille</b><br>M. Dupond");
var marker3 = L.marker([49.3455531, 0.3427251]).addTo(map);
marker3.bindPopup("<b>La Maison du Verger</b><br>Julie Girard");
