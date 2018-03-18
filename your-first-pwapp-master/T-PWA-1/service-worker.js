//******** Etape 8 ********** //
var dataCacheName = 'weatherData-v1';

//******** Etape 8 ********** //


//******** Etape 4 ********** //
var cacheName = 'weatherPWA-step-6-1';

//******** Etape 6 ********** //
var filesToCache = [
    '/',
    '/index.php',
    '/inc/Contact.class.php',
    '/inc/init.inc.php',
    // '/scripts/js/accordion.js',
    // '/scripts/js/bootstrap.js',
    // '/scripts/js/bootstrap.min.js',
    // '/scripts/js/jquery-2.2.1.min.js',
    // '/scripts/js/jquery-2.2.3.js',
    // '/scripts/js/jquery-2.2.3.min.js',
    // '/scripts/js/jquery.magnific-popup.js',
    // '/scripts/js/jquery-mixitup.min.js',
    // '/scripts/js/jquery-main.js',
    // '/scripts/js/jquery-materialize.js',
    // '/scripts/js/jquery-mdb.js',
    // '/scripts/js/jquery-mdb.min.js',
    // '/scripts/js/jquery-npm.js',
    // '/scripts/js/jquery-plugins.js',
    // '/scripts/js/jquery-tether.js',
    // '/scripts/js/jquery-tether.min.js',
    // '/scripts/js/jquery-wow.min.js',
    '/scripts/app.js',
    '/styles/inline.css',
    '/images/cloudy-scattered-showers.png',
    '/images/cloudy.png',
    '/images/fog.png',
    '/images/ic_add_white_24px.svg',
    '/images/ic_refresh_white_24px.svg',
    '/images/partly-cloudy.png',
    '/images/rain.png',
    '/images/scattered-showers.png',
    '/images/sleet.png',
    '/images/snow.png',
    '/images/thunderstorm.png',
    '/images/img/Seblogo.png',
    '/images/img/homebener.jpg',
    '/images/img/homebenner.jpg',
    '/images/img/accordion.png',
    '/images/img/counterbg.jpg',
    '/images/img/loading.gif',
    '/images/img/pro1.png',
    '/images/img/pro2.png',
    '/images/img/lightbox/default-skin.png',
    '/images/img/lightbox/default-skin.svg',
    '/images/img/lightbox/preloader.gif'

];
//******** fin Etape 6 ********** //

self.addEventListener('install', function(e) {
    console.log('[ServiceWorker] Install');
    e.waitUntil(
        caches.open(cacheName).then(function(cache) {
            console.log('[ServiceWorker] Caching app shell');
            return cache.addAll(filesToCache);
        })
    );
});
//********  fin Etape 4 ********** //

//********   Etape 5 ********** //
    self.addEventListener('activate', function(e) {
        console.log('[ServiceWorker] Activate');
        e.waitUntil(
            caches.keys().then(function(keyList) {
                return Promise.all(keyList.map(function(key) {
                    if (key !== cacheName && key !== dataCacheName) {
                        console.log('[ServiceWorker] Removing old cache', key);
                        return caches.delete(key);
                    }
                }));
            })
        );
        return self.clients.claim();
    });
    //********   fin Etape 5 ********** //


    //********    Etape 7 ********** //
    self.addEventListener('fetch', function(e) {
        console.log('[Service Worker] Fetch', e.request.url);
        var dataUrl = 'https://miatti-sebastien.fr/yql';
        if (e.request.url.indexOf(dataUrl) > -1) {
            /*
            * When the request URL contains dataUrl, the app is asking for fresh
            * weather data. In this case, the service worker always goes to the
            * network and then caches the response. This is called the "Cache then
            * network" strategy:
            * https://jakearchibald.com/2014/offline-cookbook/#cache-then-network
            */
            e.respondWith(
                caches.open(dataCacheName).then(function(cache) {
                    return fetch(e.request).then(function(response){
                        cache.put(e.request.url, response.clone());
                        return response;
                    });
                })
            );
        } else {
            /*
            * The app is asking for app shell files. In this scenario the app uses the
            * "Cache, falling back to the network" offline strategy:
            * https://jakearchibald.com/2014/offline-cookbook/#cache-falling-back-to-network
            */
            e.respondWith(
                caches.match(e.request).then(function(response) {
                    return response || fetch(e.request);
                })
            );
        }
    });
    //********   fin Etape 7 ********** //
