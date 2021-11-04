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

const sendContactMail = async function (e) {
    e.preventDefault();
    const formData = new FormData();
    formData.append("nome", document.getElementById("nome"));
    formData.append("email", document.getElementById("email"));
    formData.append("fone", document.getElementById("fone"));
    formData.append("mensagem", document.getElementById("mensagem"));

    const response = await fetch("https://portalcrtelecom.com.br/api/v1/send", {
        method: "POST",
        body: formData,
    });

    const responseData = response.json();

    if (responseData.success) {
        alert(responseData.success);
    } else {
        console.log(responseData);
    }
};

const btnContact = document.getElementById("btn-contact");
btnContact.addEventListener("click", sendContactMail);
