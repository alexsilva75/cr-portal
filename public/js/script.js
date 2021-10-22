// alert('hi')

const headerEl = document.querySelector('.header');

function toggleDrawer(){
    headerEl.classList.toggle('nav-open');
}

const btnMobileNav = document.querySelector('.btn-mobile-nav');

btnMobileNav.addEventListener('click', toggleDrawer);