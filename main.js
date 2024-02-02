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