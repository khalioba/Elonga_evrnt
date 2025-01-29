const CACHE_NAME = 'v2';  // Nom du cache, mets à jour à chaque modification

// Installer le Service Worker
self.addEventListener('install', event => {
    event.waitUntil(
        caches.open(CACHE_NAME).then(cache => {
            return cache.addAll([
                '/',              // Page d'accueil
                'index.php',      // Fichier PHP principal
                'css/styles.css', // Fichier CSS
                'js/script.js'    // Fichier JS
            ]);
        })
    );
});

// Gestion de l'activation : supprime les anciens caches si nécessaire
self.addEventListener('activate', event => {
    event.waitUntil(
        caches.keys().then(cacheNames => {
            return Promise.all(
                cacheNames.map(cacheName => {
                    // Si le cache n'est pas le cache actuel, on le supprime
                    if (cacheName !== CACHE_NAME) {
                        return caches.delete(cacheName);
                    }
                })
            );
        })
    );
});

// Intercepter les requêtes pour les servir depuis le cache
self.addEventListener('fetch', event => {
    event.respondWith(
        caches.match(event.request).then(response => {
            return response || fetch(event.request); // Cherche d'abord dans le cache, sinon va chercher le fichier depuis le réseau
        })
    );
});


