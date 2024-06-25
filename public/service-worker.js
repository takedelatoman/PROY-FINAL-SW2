const cacheName = 'v1';
const cacheAssets = [
  '/',
  '/manifest.json',
  // Añade aquí los recursos que quieres cachear
];

// Instalar el Service Worker
self.addEventListener('install', e => {
  console.log('Service Worker: Instalado');
  e.waitUntil(
    caches
      .open(cacheName)
      .then(cache => {
        console.log('Service Worker: Cacheando Archivos');
        return cache.addAll(cacheAssets);
      })
      .then(() => self.skipWaiting())
  );
});

// Activar el Service Worker
self.addEventListener('activate', e => {
  console.log('Service Worker: Activado');
  // Remover caches antiguos
  e.waitUntil(
    caches.keys().then(cacheNames => {
      return Promise.all(
        cacheNames.map(cache => {
          if (cache !== cacheName) {
            console.log('Service Worker: Limpiando Cache Antigua');
            return caches.delete(cache);
          }
        })
      );
    })
  );
});

// Fetch Event
self.addEventListener('fetch', e => {
  console.log('Service Worker: Fetching');
  e.respondWith(
    fetch(e.request).catch(() => caches.match(e.request))
  );
});
