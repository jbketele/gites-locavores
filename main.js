document.addEventListener("DOMContentLoaded", function () {
    const filterInput = document.getElementById("filterInput");
    const filterCheckboxes = document.querySelectorAll(".filter-checkbox");
    const cards = document.querySelectorAll(".card");

    function filterCards() {
        const filterText = filterInput.value.toLowerCase();
        const selectedFilters = Array.from(filterCheckboxes)
            .filter(checkbox => checkbox.checked)
            .map(checkbox => checkbox.dataset.filter.toLowerCase());

        cards.forEach(card => {
            const location = card.dataset.location.toLowerCase();

            const matchText = location.includes(filterText);
            const matchFilters = selectedFilters.length === 0 || selectedFilters.some(filter => location.includes(filter));

            if (matchText || matchFilters) {
                card.style.display = "block";
            } else {
                card.style.display = "none";
            }
        });
    }

    filterInput.addEventListener("input", filterCards);
    filterCheckboxes.forEach(checkbox => checkbox.addEventListener("change", filterCards));

    // Initial filter
    filterCards();
});