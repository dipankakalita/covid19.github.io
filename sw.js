self.addEventListener("install", e => {
    e.waitUntil(
        caches.open("static").then(cache => {
            return cache.addAll(["./", "./assam.php", "./css/style.css", "./css/responsive.css", "./css/animate.css", "./mdbootstrap/css/bootstrap.min.css", "./mdbootstrap/css/mdb.min.css", "./mdbootstrap/js/jquery.min.js", "./mdbootstrap/js/popper.min.js", "./mdbootstrap/js/bootstrap.min.js", "./icon/192px.png"]);
        })
    );

});

self.addEventListener("fetch", e => {
    e.respondWith(
        caches.match(e.request).then(response => {
            return response || fetch(e.request);
        })
    );
});