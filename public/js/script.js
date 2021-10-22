// alert('hi')

const headerEl = document.querySelector('.header');

function toggleDrawer(){
    headerEl.classList.toggle('nav-open');
}

const btnMobileNav = document.querySelector('.btn-mobile-nav');

btnMobileNav.addEventListener('click', toggleDrawer);

function updateCopyrightYear(){
    let yearEl = document.querySelector('.year');
    yearEl.textContent = new Date().getFullYear();
}

updateCopyrightYear();

let allLinks = document.querySelectorAll('a:link');

allLinks.forEach(linkEl => {
    linkEl.addEventListener('click', function(event){
        event.preventDefault();

        const hrefAttr = linkEl.getAttribute('href');

        if(hrefAttr === '#'){
            window.scrollTo({
                top: 0,
                behavior: 'smooth',
            });
        }
    
        if(hrefAttr != '#' && hrefAttr.startsWith('#')){
            const sectionEl = document.querySelector(hrefAttr);
            sectionEl.scrollIntoView({behavior: 'smooth'})
        }
    
    
        if(linkEl.classList.contains('main-nav-link')){
            // alert('remove')
            headerEl.classList.remove('nav-open');
        }


    });

    
})
