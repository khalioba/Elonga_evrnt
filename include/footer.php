</div>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
    const swiper = new Swiper('.swiper', {
        // Direction du défilement
        direction: 'horizontal', // horizontal pour les boutons next/prev

        // Activer le mode boucle pour que le défilement soit continu
        loop: true,

        // Autoplay
        autoplay: {
            delay: 2500, // délai entre chaque diapositive (en millisecondes)
            disableOnInteraction: false, // le défilement automatique ne s'arrête pas lors de l'interaction utilisateur
        },

        // Pagination
        pagination: {
            el: '.swiper-pagination',
        },

        // Navigation
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },


        // Scrollbar (optionnel)
        scrollbar: {
            el: '.swiper-scrollbar',
        },

    });
</script>

</body>
</html>