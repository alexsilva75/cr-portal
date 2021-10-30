// alert('hi')

const headerEl = document.querySelector(".header");

function toggleDrawer() {
    headerEl.classList.toggle("nav-open");
}

const btnMobileNav = document.querySelector(".btn-mobile-nav");

btnMobileNav.addEventListener("click", toggleDrawer);

function updateCopyrightYear() {
    let yearEl = document.querySelector(".year");
    yearEl.textContent = new Date().getFullYear();
}

updateCopyrightYear();

let allLinks = document.querySelectorAll("a:link");

allLinks.forEach((linkEl) => {
    linkEl.addEventListener("click", function (event) {
        const hrefAttr = linkEl.getAttribute("href");

        if (hrefAttr === "#" || hrefAttr.startsWith("#")) {
            event.preventDefault();
            // alert("Prevent default");
            if (hrefAttr === "#") {
                window.scrollTo({
                    top: 0,
                    behavior: "smooth",
                });
            }

            if (hrefAttr != "#" && hrefAttr.startsWith("#")) {
                const sectionEl = document.querySelector(hrefAttr);
                sectionEl.scrollIntoView({ behavior: "smooth" });
            }

            if (linkEl.classList.contains("main-nav-link")) {
                // alert('remove')
                headerEl.classList.remove("nav-open");
            }
        }
    });
});

const sectionHeroEl = document.querySelector(".hero-container");

const observer = new IntersectionObserver(
    function (entries, observer) {
        const ent = entries[0];
        if (ent.isIntersecting === false) {
            document.body.classList.add("sticky");
        }

        if (ent.isIntersecting === true) {
            document.body.classList.remove("sticky");
        }
    },

    {
        root: null,
        threshold: 0,
        rootMargin: "-84px",
    }
);

observer.observe(sectionHeroEl);
