const giteCard = document.getElementById("gite_card");

function survol() {
    giteCard.classList.add('hover-card');
}

function sortieSurvol() {
    giteCard.classList.remove('hover-card');
}

giteCard.addEventListener('mouseover', survol)
giteCard.addEventListener('mouseout', sortieSurvol)

