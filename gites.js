// Fonction pour charger les données JSON
async function fetchData(url) {
    try {
        const response = await fetch(url);
        const data = await response.json();
        return data;
    } catch (error) {
        console.error('Error fetching JSON:', error);
    }
}

// Fonction pour remplir les balises HTML avec les données JSON
function fillHTML(data) {
    document.getElementById('titre').textContent = data.ferme.titre;
    document.getElementById('auteur').textContent = data.ferme.auteur;
    document.getElementById('lieu').textContent = data.ferme.lieu;
    document.getElementById('description').textContent = data.ferme.description;
    document.getElementById('productions').textContent = data.ferme.productions;
    document.getElementById('prodDescription').textContent = data.ferme.prodDescription;
    document.getElementById('pointsVente').textContent = data.ferme.pointsVente;
    document.getElementById('pointsVenteDescription').textContent = data.ferme.pointsVenteDescription;
    document.getElementById('image').src = data.images.src;

    var chambresGitesContainer = document.getElementById('chambresGites');

    data.chambresGites.contenu.forEach(function (item) {
        var chambreGiteElement = document.createElement('div');
        chambreGiteElement.className = 'd-flex justify-content-around align-items-center';

        var imgChambreGite = document.createElement('img');
        imgChambreGite.src = item.imageSrc;
        imgChambreGite.alt = '';

        var pChambreGite = document.createElement('p');
        pChambreGite.style.width = '50%';
        pChambreGite.textContent = item.description;

        chambreGiteElement.appendChild(imgChambreGite);
        chambreGiteElement.appendChild(pChambreGite);

        chambresGitesContainer.appendChild(chambreGiteElement);

        var brElement = document.createElement('br');
        chambresGitesContainer.appendChild(brElement);
    });
}

// Fonction principale
async function main() {
    const data = await fetchData('gites.json');
    fillHTML(data);
}

// Appeler la fonction principale
main();
