document.addEventListener('DOMContentLoaded', function () {
    var carte = document.querySelector('.map path');

    hoverableElement.addEventListener('touchstart', function () {
        carte.classList.add('hovered');
    });

    hoverableElement.addEventListener('touchend', function () {
        hoverableElement.classList.remove('hovered');
    });
});
