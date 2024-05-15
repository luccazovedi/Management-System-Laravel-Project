import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

var prevScrollPos = window.pageYOffset;
var nav = document.querySelector('nav');

window.addEventListener('scroll', function() {
    var currentScrollPos = window.pageYOffset;

    if (prevScrollPos > currentScrollPos) {
        nav.classList.remove('fixed-nav');
        document.body.classList.remove('fixed-nav-padding');
    } else {
        nav.classList.add('fixed-nav');
        document.body.classList.add('fixed-nav-padding');
    }

    prevScrollPos = currentScrollPos;
});