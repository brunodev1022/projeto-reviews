document.addEventListener('DOMContentLoaded', function () {
    const cards = document.querySelectorAll('.card-produto');

    cards.forEach(function (card) {
        card.addEventListener('mouseenter', function () {
            card.style.boxShadow = '0 12px 24px rgba(0, 0, 0, 0.12)';
        });

        card.addEventListener('mouseleave', function () {
            card.style.boxShadow = '';
        });
    });
});
