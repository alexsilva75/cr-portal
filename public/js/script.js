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

    const inputNome = document.getElementById("nome");
    const inputEmail = document.getElementById("email");
    const inputFone = document.getElementById("fone");
    const inputMensagem = document.getElementById("mensagem");

    formData.append("nome", inputNome.value);
    formData.append("email", inputEmail.value);
    formData.append("fone", inputFone.value);
    formData.append("mensagem", inputMensagem.value);

    const toastTitle = document.getElementById("toast-title");
    const toastMessage = document.getElementById("toast-message");

    const response = await fetch("https://portalcrtelecom.com.br/api/v1/send", {
        method: "POST",
        body: formData,
    });

    const responseData = await response.json();
    const toastEl = document.querySelector(".toast");

    if (responseData.success) {
        toastTitle.textContent = "Mensagem enviada";
        toastMessage.textContent = responseData.success;

        toastEl.classList.toggle("toast-show");
        toastEl.classList.toggle("success");
        // alert(responseData.success);

        inputNome.value = "";
        inputEmail.value = "";
        inputFone.value = "";
        inputMensagem.value = "";

        window.setTimeout(function () {
            toastEl.classList.toggle("toast-show");
            toastEl.classList.toggle("success");
        }, 5000);
    } else {
        console.log(responseData);

        toastTitle.textContent = "Erro ao enviar mensagem";
        toastMessage.textContent =
            "Não foi possível enviar a sua mensagem. Tente novamente mais tarde.";

        toastEl.classList.toggle("toast-show");
        toastEl.classList.toggle("danger");

        window.setTimeout(function () {
            toastEl.classList.toggle("toast-show");
            toastEl.classList.toggle("danger");
        }, 5000);
    }
};

const btnContact = document.getElementById("btn-contact");
btnContact.addEventListener("click", sendContactMail);

function sendMegaZapMessage(textMessage) {
    const megaZapInputEl = document.getElementById("wbot-message-input");
    console.log(megaZapInputEl);
    WBOTopenChat();
    megaZapInputEl.textContent = textMessage;
    WBOTdata.text = textMessage;

    WBOTsendMessage();
}

function showModalForm() {
    //alert("Hi");
    console.log("Showing modal");
    const overlayEl = document.querySelector(".overlay");

    //console.log("Overlay", modalEl);
    overlayEl.classList.remove("hide");
    overlayEl.classList.add("show");

    overlayEl.addEventListener("click", hideModalForm);
    const modalEl = document.getElementById("subscription");
    modalEl.addEventListener("click", function (event) {
        event.stopPropagation();
    });
    modalEl.scrollIntoView();
    //loadMap();
}

function hideModalForm(event) {
    //event.stopPropagation();
    const overlayEl = document.querySelector(".overlay");
    //console.log("Overlay", modalEl);
    overlayEl.classList.add("hide");
    overlayEl.classList.remove("show");
}

function addButtonEventListeners() {
    const planButtonsList = document.querySelectorAll(".btn-plan");

    planButtonsList.forEach((buttonItem) => {
        buttonItem.addEventListener("click", showModalForm);
    });
}

addButtonEventListeners();
