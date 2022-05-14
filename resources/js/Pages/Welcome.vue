<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import { onMounted } from 'vue';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});

onMounted(function(){





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
})
</script>

<template>
    <Head title="Bem-vindo" />

    <header class="header">
        <a href="#">
            <img class="logo-top-img" src="img/logo.png" alt="CR Telecom - logo">
        </a>
        <nav class="main-nav">
            <ul class="main-nav-list">

                <li class="main-nav-item">
                    <a class="main-nav-link" href="#">Início</a>
                </li>
                <li class="main-nav-item">
                    <a class="main-nav-link" href="#about-us">Quem somos</a>
                </li>
                <li class="main-nav-item">
                    <a class="main-nav-link" href="#section-features">Internet</a>
                </li>

                <li class="main-nav-item">
                    <a class="main-nav-link" href="#section-contact">Fale conosco</a>
                </li>
            </ul>
        </nav>
        <button class="btn-mobile-nav">
            <i class="bi bi-list icon-mobile-nav icon-menu"></i>
            <i class="bi bi-x-lg icon-mobile-nav icon-close"></i>
        </button>
    </header>

    <main>
        <div class="cr-chat">
            <div class="cr-chat-display-holder">
                <div class="cr-chat-display"></div>
            </div>
            <div  class="cr-chat-panel">
                <form class="cr-chat-form" onsubmit="sendWSCRChatMessage(event)">

                    <input class="input-cr-chat" type="text" name="wsText" id="wsText" placeholder="Escreva uma mensagem"/>
                    <button id="btnSend" type="submit" class="btn-cr-chat-send ">

                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send-fill btn-cr-chat-icon" viewBox="0 0 16 16">
                                <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083l6-15Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z"/>
                            </svg>
                            <span>Enviar</span>
                    </button>
                </form>
            </div>
        </div>
        <div class="hero-container">
            <div class="container">
                <section class="hero-section">
                    <div class="col hero-col left-col">
                        <h1 class="heading-primary">Conectando Você a seus Sonhos!</h1>

                        <div class="hero-description">
                            <p class="hero-description-text">
                                O seu provedor de internet. Agora de cara nova!
                            </p>
                        </div>

                        <a href="#features-plans" class="btn hero-btn">Conheça nossos planos &raquo;</a>

                    </div>

                    <div class="col hero-col right-col">

                        <div class="hero-img">

                        </div>
                    </div>

                </section>
            </div>

        </div>

        <section class="section-about-us">
            <div class="container">
                <p id="about-us" class="subheading">Quem somos?</p>
                <h2 class="heading-secondary heading-about-us">Uma empresa que evolui com você</h2>

                <div class="about-us-container">
                    <div class="about-us-img">

                    </div>
                    <div class="about-us-text">
                        <p class="about-us-p">
                            Somos uma empresa familiar que busca a relação humana como seu principal ativo, encurtando e
                            melhorando diariamente a distância entre clientes, empresas, colaboradores e fornecedores.
                            Atuando
                            com profissionalismo, eficiência e rapidez suas atividades na área de telecomunicações.
                        </p>
                        <p class="about-us-p">
                            Temos 18 anos de experiência e muito a evoluir, acompanhando as transformações no mundo, nas
                            pessoas
                            e mercado de trabalho.
                        </p>
                        <p class="about-us-p">
                            Atualmente atendemos às cidades de Santo Amaro, Saubara e estamos em processo de expansão
                            para novos
                            mercados.
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-resources">
            <div class="container">
                <p class="subheading">Já é nosso cliente?</p>
                <h2 class="heading-secondary">Recursos para assinantes</h2>
                <div class="resources-container py-sm">

                    <figure class="box-resource">
                        <p class="subheading">Teste de velocidade</p>
                        <div class="box-resource-img speed-img-box">
                            <a href="https://crtelecom.speedtestcustom.com" target="_blank">
                                <img class="resorce-img" src="img/optimal/speedometer.png" alt="">
                            </a>
                        </div>
                    </figure>
                    <figure class="box-resource">
                        <p class="subheading">Central do assinante</p>
                        <div class="box-resource-img">
                            <a href="https://noivanet.altaredesistemas.com.br/central_assinante/"
                                target="_blank">
                                <img class="resorce-img resource-img-fill"
                                    src="img/optimal/woman-laptop-couch-square.jpg" alt="">
                            </a>
                        </div>
                    </figure>
                </div>

            </div>
        </section>


        <section id="section-features" class="section-features">
            <div class="features-intro">
                <div class="features-intro-description">
                    <p class="subheading">Acesso à Internet?</p>
                    <h2 class="heading-secondary">
                        Trazemos para você o poder da Fibra
                    </h2>

                    <p class="features-text">
                        Nossos planos fornecem alta velocidade e estabilidade, para que você possa trabalhar,
                        estudar e se divertir à vontade, sem limite de tráfego e com velocidades que variam de 40Mbps a
                        120Mbps.
                    </p>
                </div>


            </div>
            <p class="subheading">Nossos Planos</p>
            <div class="container">
                <div id="features-plans" class="features-plans">

                    <figure class="features-plan">

                        <div class="features-plan-img people-plan-img">

                        </div>

                        <div class="plan-description people-plan">
                            <p class="plan-subheading">People</p>
                            <p class="plan-desc-p">Ideal para assistir suas séries favoritas, estudar, jogar e
                                trabalhar
                                em home office.</p>

                            <div>
                                <p class="plan-speed">60<span>Mbps</span> </p>
                                <p class="plan-price"><span>R$</span>65,00</p>
                                <div class="plan-cta">
                                    <a onclick="sendMegaZapMessage('Quero Contratar 40Mbps!')"
                                        class="btn btn-plan">Quero contratar &raquo;</a>
                                </div>
                            </div>

                        </div>
                    </figure>

                    <figure class="features-plan ">
                        <div class="features-plan-img world-plan-img">

                        </div>
                        <div class="plan-description world-plan">
                            <p class="plan-subheading">World</p>
                            <p class="plan-desc-p">Para você que precisa de maior desempenho, em suas atividades
                                profissionais.</p>

                            <div>
                                <p class="plan-speed">100<span>Mbps</span> </p>
                                <p class="plan-price"><span>R$</span>85,00</p>
                                <div class="plan-cta">
                                    <a onclick="sendMegaZapMessage('Quero Contratar 80Mbps!')"
                                        class="btn btn-plan">Quero contratar &raquo;</a>
                                </div>
                            </div>
                        </div>

                    </figure>

                    <figure class="features-plan">
                        <div class="features-plan-img  universe-plan-img">

                        </div>
                        <div class="plan-description universe-plan">
                            <p class="plan-subheading">Universe</p>
                            <p class="plan-desc-p">O pacote certo para empresas e para quem depende de velocidade.
                            </p>

                            <div>
                                <p class="plan-speed">200<span>Mbps</span> </p>
                                <p class="plan-price"><span>R$</span>105,00</p>

                                <div class="plan-cta">
                                    <a onclick="sendMegaZapMessage('Quero Contratar 120Mbps!')"
                                        class="btn btn-plan">Quero contratar
                                        &raquo;</a>
                                </div>
                            </div>
                        </div>

                    </figure>
                </div>
            </div>



        </section>



        <section id="section-contact" class="section-contact">

            <div class="contact-container">
                <div class="contact-left-col">


                </div>


                <div class="contact-form-container">

                    <p class="subheading">Dúvidas?</p>
                    <h2 class="heading-secondary">Fale Conosco!</h2>
                    <form>

                        <div class="form-group">
                            <label for="nome" class="input-caption">Nome*</label>
                            <input type="text" name="nome" id="nome" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="email" class="input-caption">E-mail*</label>
                            <input type="text" name="email" id="email" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="fone" class="input-caption">Telefone*</label>
                            <input type="text" name="fone" id="fone" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="mensagem" class="input-caption">Mensagem</label>
                            <textarea class="form-control" name="mensagem" id="mensagem" cols="30"
                                rows="10"></textarea>
                        </div>

                        <button id="btn-contact" class="btn btn-contact-send"><i
                                class="bi bi-envelope icon-contact"></i>
                            Enviar</button>
                    </form>
                    <div class="toast">
                        <p><strong id="toast-title"></strong></p>
                        <p class="toast-message" id="toast-message">
                        </p>
                    </div>
                </div>


            </div>
        </section>

        <div class="privacy-policy-container">
            <div class="privacy-policy">

                <button class="btn-close-privacy">
                    <i class="bi bi-x-lg icon-close privacy-close"></i>
                </button>
                <h2 class="heading-secondary my-h2">POLÍTICA DE PRIVACIDADE E USO DE DADOS PESSOAIS</h2>

                <p class="privacy-p">
                    A sua privacidade é importante para nós, por isso desenvolvemos uma Política de Privacidade que
                    abrange
                    informações importantes sobre quem somos, como e por que coletamos os seus dados pessoais, assim
                    como
                    por que usamos, compartilhamos, transferimos e armazenamos esses dados, incluindo o seu acesso e uso
                    do
                    nosso site e serviços. Solicitamos que você a leia com atenção, pois ela contém informações
                    importantes
                    e detalha como entrar em contato conosco em caso de dúvidas.
                    Ao utilizar a CR Telecom, você nos confia seus dados e suas informações e nós nos comprometemos a
                    manter
                    esses dados protegidos por meio de sistema de proteção.
                </p>


                <p class="privacy-p">
                    Nesse sentido, este documento explica de maneira clara e acessível como suas informações e os seus
                    dados
                    serão coletados, armazenados, usados e compartilhados por nossos sistemas.
                </p>

                <p class="privacy-p">
                    Ao acessar ou utilizar nosso website, bem como aplicativo e serviços, você estará aceitando nossa
                    política de privacidade. Isso indicará que você está ciente e em total acordo com a forma e o uso de
                    suas informações e seus dados.
                </p>

                <p class="privacy-p">
                    Para facilitar sua compreensão, a presente política está estruturada da seguinte forma:
                </p>


                <ul>
                    <li>
                        <p class="privacy-p">
                            Quem somos;
                        </p>
                    </li>
                    <li>
                        <p class="privacy-p">
                            Quais informações a CR Telecom coleta?;
                        </p>
                    </li>
                    <li>
                        <p class="privacy-p">
                            Informações coletadas de outras fontes;
                        </p>
                    </li>
                    <li>
                        <p class="privacy-p">
                            Uso de cookies;
                        </p>
                    </li>
                    <li>
                        <p class="privacy-p">
                            Serviços de terceiros;
                        </p>
                    </li>
                    <li>
                        <p class="privacy-p">
                            Como a CR Telecom utiliza seus dados?;
                        </p>
                    </li>
                    <li>
                        <p class="privacy-p">
                            Exclusão dos dados;
                        </p>
                    </li>
                    <li>
                        <p class="privacy-p">
                            Compartilhamento de informações;
                        </p>
                    </li>

                    <li>
                        <p class="privacy-p">
                            Atualização da política de privacidade e uso de dados pessoais;
                        </p>
                    </li>

                    <li>
                        <p class="privacy-p">
                            Lei aplicável.
                        </p>
                    </li>
                </ul>



                <h3 class="heading-tertiary my-h3">Quem somos</h3>

                <p class="privacy-p">
                    CR Telecom, pessoa jurídica, sociedade empresária limitada, inscrita no CNPJ 35.708.123/0001-66, com
                    endereço em Santo Amaro, Bahia, Brasil. Coletamos, usamos e somos responsáveis por alguns dos seus
                    dados
                    pessoais, somos regidos pela Lei Geral de Proteção de Dados (LGPD), que é aplicado em todo
                    território
                    Brasileiro, e somos responsáveis como o “controlador” destes dados pessoais para o propósito dessas
                    leis.
                </p>

                <h3 class="heading-tertiary my-h3">
                    Quais informações a CR Telecom coleta?
                </h3>

                <p class="privacy-p">
                    Nós coletamos informações que você nos fornece, como:
                </p>

                <p class="privacy-p">
                    Dados pessoais - Ao se cadastrar na CR Telecom, você fornece informações como nome, endereço de
                    email,
                    CPF/CNPJ, data de nascimento, estado civil, numero de telefone, foto, idade,sexo.
                    Dados Pessoais sensíveis - Você poderá fornecer dados como orientação sexual, raça e opinião
                    política,
                    que são considerados desta natureza e estes serão apenas utilizados para recomendação de produtos.
                    Por
                    meio dessa política, você concorda com a coleta, o uso e o compartilhamento desses dados nos termos
                    aqui
                    estabelecidos, tendo em vista que coletamos todas as informações ativamente disponibilizadas pelo
                    usuário na utilização do nosso website ou da nossa plataforma.
                    Quando os visitantes deixam comentários no site, coletamos os dados mostrados no formulário de
                    comentários, além do endereço de IP e de dados do navegador do visitante, para auxiliar na detecção
                    de
                    spam.
                </p>

                <p class="privacy-p">
                    Uma sequência anonimizada de caracteres criada a partir do seu e-mail (também chamada de hash)
                    poderá
                    ser enviada para o Gravatar para verificar se você usa o serviço. A política de privacidade do
                    Gravatar
                    está disponível aqui: https://automattic.com/privacy/. Depois da aprovação do seu comentário, a foto
                    do
                    seu perfil fica visível publicamente junto de seu comentário.
                    Mídia
                    Se você envia imagens para o site, evite enviar as que contenham dados de localização incorporados
                    (EXIF
                    GPS). Visitantes podem baixar estas imagens do site e extrair delas seus dados de localização.
                    Mídia incorporada de outros sites
                    Artigos neste site podem incluir conteúdo incorporado como, por exemplo, vídeos, imagens, artigos,
                    etc.
                </p>
                <p class="privacy-p">
                    Conteúdos incorporados de outros sites se comportam exatamente da mesma forma como se o visitante
                    estivesse visitando o outro site.
                </p>

                <h3 class="heading-tertiary my-h3">Informações coletadas de outras fontes</h3>
                <p class="privacy-p">
                    Também podemos obter dados pessoais de outras fontes ou de terceiros, incluindo nossos afiliados ou
                    nossos distribuidores, revendedores ou outros na sua organização.
                </p>

                <h3 class="heading-tertiary my-h3">Uso de cookies</h3>
                <p class="privacy-p">
                    Ao visitar nosso site ou ao acessar nossos serviços (incluindo o blog CR Telecom), também podemos
                    utilizar “cookies” para contar com a capacidade de monitorar nossos padrões de tráfego e servi-lo
                    com
                    mais eficiência. Apesar de um cookie não o identificar pessoalmente, ele identifica o seu
                    computador. É
                    possível configurar o seu navegador de internet para que o notifique quando receber um cookie, o que
                    oferecerá uma oportunidade para aceitá-lo ou rejeitá-lo em cada ocorrência.
                </p>

                <h3 class="heading-tertiary my-h3">
                    Como prevenir que os cookies sejam armazenados e/ou eliminá-los
                </h3>
                <p class="privacy-p">
                    A maioria dos navegadores de Internet são configurados para aceitar automaticamente os Cookies. você
                    poderá alterar as configurações para bloquear o uso de Cookies ou alertá-lo quando um Cookie estiver
                    sendo enviado para seu dispositivo.
                    Depois de autorizar o uso de Cookies, ou você pode sempre desativar parte ou a totalidade de nossos
                    Cookies.
                </p>
                <p class="privacy-p">
                    Todos os browsers permitem ao utilizador aceitar, recusar ou apagar Cookies, nomeadamente através da
                    seleção das definições apropriadas no respectivo navegador. Você pode configurar os Cookies no menu
                    “opções” ou “preferências” do seu browser.
                </p>
                <p class="privacy-p">
                    Note-se que, ao desativar cookies, pode impedir que alguns serviços da web funcionem corretamente,
                    afetando, parcial ou totalmente, a navegação no website.
                </p>
                <h3 class="heading-tertiary my-h3">
                    Cookies de terceiros
                </h3>
                <p class="privacy-p">
                    CR Telecom possui parcerias com empresas de publicidade de terceiros para veicular anúncios durante
                    a
                    sua visita ao nosso website. Essas empresas podem usar informações (que NÃO incluem o seu nome,
                    endereço, endereço de e-mail ou número de telefone) sobre suas visitas a este e a outros websites
                    com a
                    finalidade de exibir anúncios relacionados a produtos e serviços de seu interesse.
                </p>
                <h3 class="heading-tertiary my-h3">
                    Serviços de terceiros
                </h3>
                <p class="privacy-p">
                    Como um blog que cria conteúdos sobre ferramentas do mundo da tecnologia e cria tutoriais e
                    informativos
                    sobre diversos assuntos relacionados ao meio, você encontrará conteúdos incorporados de outros sites
                    por
                    aqui, como links e vídeos. É importante estar ciente que dentro destes sites de terceiros o usuário
                    estará sujeito a outros termos de uso de políticas de privacidade. Estes sites de terceiros por sua
                    vez
                    terão suas próprias regras e parcerias envolvendo links e sua forma de tratar os dados, não tendo
                    nenhuma relação direta ou endosso por parte do CR Telecom.
                </p>


                <ul>
                    <li>
                        <p class="privacy-p">
                            Nosso site pode conter links e recomendações para serviços de terceiros. Estes links para
                            serviços de
                            terceiros são fornecidos apenas para a sua conveniência;
                        </p>
                    </li>
                    <li>
                        <p class="privacy-p">
                            Os serviços de terceiros não estão sob nosso controle e não somos responsáveis por serviços
                            de
                            terceiros (incluindo a sua adequação para o seu uso pretendido dos serviços de terceiros).
                            Não
                            endossamos ou recomendamos quaisquer serviços de terceiros ou quaisquer organizações
                            provedoras
                            associadas ou seus produtos e serviços. Você deve fazer sua própria pesquisa em relação à
                            adequação de
                            qualquer serviço de terceiros;
                        </p>
                    </li>
                    <li>
                        <p class="privacy-p">
                            Serviços de terceiros também podem utilizar cookies;
                        </p>
                    </li>
                    <li>
                        <p class="privacy-p">
                            Você é responsável pela leitura das políticas de privacidade ou declarações associadas aos
                            serviços de
                            terceiros.
                        </p>
                    </li>

                </ul>

                <h3 class="heading-tertiary my-h3">
                    Como a CR Telecom utiliza seus dados?
                </h3>
                <p class="privacy-p">
                    Nós, da CR Telecom, prezamos muito por sua privacidade. Por isso, todos os dados e informações
                    disponibilizados são considerados confidenciais, e somente serão utilizados para os fins aqui
                    descritos
                    e autorizados por você para que possa utilizar os serviços da CR Telecom de forma plena, visando
                    sempre
                    melhorar a sua experiência como cliente.
                </p>
                <p class="privacy-p">
                    Por meio dessa política, a CR Telecom fica autorizada a utilizar seus dados para:
                </p>

                <p class="privacy-p">
                <ul>
                    <li>
                        <p class="privacy-p">
                            Permitir acesso a recursos e funcionalidades do ambiente da CR Telecom;
                        </p>
                    </li>
                    <li>
                        <p class="privacy-p">
                            Enviar mensagens como alertas, notificações e atualizações;
                        </p>
                    </li>
                    <li>
                        <p class="privacy-p">
                            Comunicar sobre produtos, serviços, promoções, notícias, atualizações, eventos e outros
                            assuntos
                            que
                            você possa ter interesse;
                        </p>
                    </li>
                    <li>
                        <p class="privacy-p">
                            Personalizar serviços para que possam se adequar cada vez mais aos seus interesses;
                        </p>
                    </li>
                    <li>
                        <p class="privacy-p">
                            Criar novos serviços, produtos e funcionalidades;
                        </p>
                    </li>
                    <li>
                        <p class="privacy-p">
                            Entender melhor o seu comportamento e construir perfis comportamentais.
                        </p>
                    </li>
                </ul>
                </p>
                <p class="privacy-p">
                    Eventualmente, poderemos utilizar dados para finalidades não previstas nesta política de
                    privacidade,
                    mas estas estarão dentro das suas legítimas expectativas. O eventual uso dos seus dados para
                    finalidades
                    que não cumpram com essa prerrogativa será feito mediante prévia autorização.
                </p>
                <h3 class="heading-tertiary my-h3">
                    Exclusão dos dados
                </h3>
                <p class="privacy-p">
                    Todos os dados coletados serão excluídos de nossos servidores quando você assim requisitar, por
                    procedimentos gratuitos e facilitado, ou quando estes não forem mais necessários ou relevantes no
                    que
                    tange a oferta de nossos serviços, salvo se houver qualquer outra razão para a sua manutenção, como
                    eventual obrigação legal de retenção de dados ou necessidade de preservação destes para resguardo de
                    direitos da CR Telecom.
                </p>
                <h3 class="heading-tertiary my-h3">
                    Compartilhamento de informações
                </h3>
                <p class="privacy-p">
                    A CR Telecom pode compartilhar as informações coletadas, inclusive seus dados sensíveis, com
                    parceiros
                    comerciais, anunciantes, patrocinadores e provedores de serviços, sempre que for possível e de forma
                    anônima, visando preservar a sua privacidade. Por meio deste documento, você autoriza expressamente
                    tais
                    compartilhamentos.
                </p>
                <p class="privacy-p">
                    A CR Telecom se reserva do direito de fornecer dados e informações sobre você, incluindo suas
                    interações, caso seja requisitada judicialmente para tanto, ato necessário para que a empresa esteja
                    em
                    conformidade com as leis nacionais, ou caso você autorize expressamente.
                    Todos seus dados são confidenciais e somente as pessoas com devida autorização terão acesso a eles.
                </p>
                <p class="privacy-p">
                    Qualquer uso desses dados estará de acordo com a presente política. A CR Telecom empreenderá todos
                    os
                    esforços razoáveis de mercado para garantir a segurança dos nossos sistemas e dos seus dados.
                    Nossos servidores são protegidos e controlados para garantir a segurança e podem ser acessados
                    somente
                    por pessoas previamente autorizadas.
                </p>
                <p class="privacy-p">
                    Todas as suas informações, principalmente os dados sensíveis, serão, sempre que possível,
                    criptografadas, caso isso não inviabilize o seu uso na plataforma. A qualquer momento você poderá
                    requisitar cópia dos seus dados armazenados em nossos sistemas. Manteremos os dados e as informações
                    somente até quando estes forem necessários ou relevantes para finalidade descritas nesta política,
                    ou
                    até quando esses dados forem necessários para a manutenção de interesses legítimos da CR Telecom.
                </p>
                <p class="privacy-p">
                    Todavia, não temos como dispor de garantia integral que todos os dados e informações sobre você em
                    nossa
                    plataforma estarão livres de acessos não autorizados, principalmente caso haja compartilhamento
                    indevido
                    das credenciais necessárias para acessar o nosso aplicativo. Portanto, você é o único responsável
                    por
                    manter a sua senha de acesso em local seguro e é vedado o compartilhamento desta com terceiros. Você
                    se
                    compromete a notificar o ITSEC.LAB imediatamente, por um canal seguro, a respeito de qualquer uso
                    não
                    autorizado de sua conta, bem como o acesso não autorizado por terceiros a esta.
                </p>
                <h3 class="heading-tertiary my-h3">
                    Direitos do Titular de Dados
                </h3>
                <p class="privacy-p">
                    Os seguintes direitos lhe estão disponíveis:
                </p>

                <ul>
                    <li>
                        <p class="privacy-p">
                            Direito de confirmar a existência de tratamento de seus dados pessoais, na forma do artigo
                            18,
                            I,
                            da
                            Lei Geral de Proteção de Dados – Lei nº 13.709/2018.
                        </p>
                    </li>
                    <li>
                        <p class="privacy-p">
                            Direito de acesso aos seus dados pessoais, na forma do artigo 18, II, da Lei Geral de
                            Proteção
                            de
                            Dados – Lei nº 13.709/2018.
                        </p>
                    </li>
                    <li>
                        <p class="privacy-p">
                            Direito de correção de dados incompletos, inexatos ou desatualizados, na forma do artigo 18,
                            III,
                            da
                            Lei Geral de Proteção de Dados – Lei nº 13.709/2018.
                        </p>
                    </li>
                    <li>
                        <p class="privacy-p">
                            Direito de eliminação dos dados pessoais, na forma do artigo 18, IV e VI, da Lei Geral de
                            Proteção
                            de
                            Dados – Lei nº 13.709/2018.
                        </p>
                    </li>
                    <li>
                        <p class="privacy-p">
                            Direito de bloqueio do tratamento de dados pessoais, na forma do artigo 18, IV, da Lei Geral
                            de
                            Proteção de Dados – Lei nº 13.709/2018.
                        </p>
                    </li>
                    <li>
                        <p class="privacy-p">
                            Direito de anonimização, na forma do artigo 18, IV, da Lei Geral de Proteção de Dados – Lei
                            nº
                            13.709/2018.
                        </p>

                    </li>
                    <li>
                        <p class="privacy-p">
                            Direito de portabilidade dos dados, na forma do artigo 18, V, da Lei Geral de Proteção de
                            Dados
                            –
                            Lei
                            nº 13.709/2018.
                        </p>
                    </li>
                    <li>
                        <p class="privacy-p">
                            Direito de informação sobre com quem foram compartilhados seus dados pessoais, na forma do
                            artigo
                            18,
                            VII, da Lei Geral de Proteção de Dados – Lei nº 13.709/2018.
                        </p>
                    </li>
                    <li>
                        <p class="privacy-p">
                            Direito de informação sobre a possibilidade de não fornecer consentimento e as consequências
                            negativas, na forma do artigo 18, VIII, da Lei nº 13.709/2018;
                        </p>
                    </li>
                    <li>
                        <p class="privacy-p">
                            Direito de revogar o consentimento, de modo simples, acessível e facilitado, na forma do
                            artigo
                            18,
                            IX, da Lei Geral de Proteção de Dados – Lei nº 13.709/2018.
                        </p>
                    </li>
                    <li>
                        <p class="privacy-p">
                            Direito de peticionar contra o Controlador perante a Autoridade Nacional de Proteção de
                            Dados,
                            os
                            órgãos de defesa do consumidor e/ou o Poder Judiciário, na forma dos artigos 18, § 1º, § 8º,
                            e
                            22,
                            da
                            Lei Geral de Proteção de Dados – Lei nº 13.709/2018.
                        </p>
                    </li>
                    <li>
                        <p class="privacy-p">
                            Direito de não se sujeitar a, ou de solicitar revisões de decisões tomadas unicamente por
                            conta
                            do
                            tratamento automatizado de seus dados pessoais, incluindo profiling, na forma do artigo 20,
                            da
                            Lei
                            Geral
                            de Proteção de Dados – Lei nº 13.709/2018.
                        </p>
                    </li>
                </ul>

                <h3 class="heading-tertiary my-h3">
                    Atualização da política de privacidade e uso de dados pessoais
                </h3>

                <p class="privacy-p">
                    A CR Telecom se reserva o direito de alterar essa política quantas vezes forem necessárias, visando
                    fornecer a você mais segurança e convivência, e melhorar cada vez mais sua experiência com esta
                    empresa.
                </p>
                <p class="privacy-p">
                    Nesse sentido, é muito importante o acesso periódico à nossa política. Para facilitar, indicamos no
                    início do documento a data da última atualização. Caso sejam feitas alterações relevantes que
                    ensejem
                    novas autorizações suas, publicaremos uma nova política de privacidade, sujeita novamente ao seu
                    consentimento.
                </p>

                <h3 class="heading-tertiary my-h3">
                    Lei aplicável
                </h3>

                <p class="privacy-p">
                    Este documento é regido e deve ser interpretado de acordo com as leis da República Federativa do
                    Brasil.
                </p>

                <p class="privacy-p">
                    Fica eleito o Foro Da Comarca De Santo Amaro, Bahia, como competente para dirimir quaisquer questões
                    porventura oriundas do presente documento, com expressa renúncia a qualquer outro, por mais
                    privilegiado
                    que seja.
                </p>

                <p class="privacy-p">
                    Última atualização desta Política de Privacidade: 06 de Setembro de 2021.
                </p>
            </div>
        </div>

    </main>
    <footer class="footer">
        <div class="social">
            <div class="logo-col">
                <img src="img/logo.png" alt="">

                <p class="subheading">Nossos Parceiros</p>
                <div class="partners-logos">
                    <a href="https://jbits.com.br"><img class="partner-logo"
                            src="img/optimal/logos/logo-jbits.png" alt=""></a>
                </div>

            </div>
            <div class="social-media-col">
                <p class="subheading">Mídias sociais</p>
                <ul class="social-media-list">
                    <li>
                        <a href="#"><i class="bi bi-instagram icon-social-media"></i></a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="bi bi-facebook icon-social-media"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="bi bi-twitter icon-social-media"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="bi bi-linkedin icon-social-media"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="address-col">
                <p class="subheading">Endereço</p>
                <address>
                    <p>Rua Conselheiro Paranhos, 19 - Centro</p>
                    <p>Santo Amaro - BA</p>
                    <p>Tel.: (75) 3241-1952</p>
                </address>
            </div>
            <nav class="footer-nav">
                <p class="subheading">Links</p>
                <ul class="footer-nav-list">
                    <li>
                        <a href="#">Início</a>
                    </li>
                    <li>
                        <a href="#">Quem somos</a>
                    </li>
                    <li>
                        <a href="#">Internet</a>
                    </li>
                    <li>
                        <a href="#">Parcerias</a>
                    </li>
                    <li>
                        <a href="#">Fale conosco</a>
                    </li>
                </ul>
            </nav>
        </div>
        <p>CR Telecom &copy; - <span class="year">2027</span>. Todos os direitos reservados </p>

    </footer>
</template>

<style scoped>
    .bg-gray-100 {
        background-color: #f7fafc;
        background-color: rgba(247, 250, 252, var(--tw-bg-opacity));
    }

    .border-gray-200 {
        border-color: #edf2f7;
        border-color: rgba(237, 242, 247, var(--tw-border-opacity));
    }

    .text-gray-400 {
        color: #cbd5e0;
        color: rgba(203, 213, 224, var(--tw-text-opacity));
    }

    .text-gray-500 {
        color: #a0aec0;
        color: rgba(160, 174, 192, var(--tw-text-opacity));
    }

    .text-gray-600 {
        color: #718096;
        color: rgba(113, 128, 150, var(--tw-text-opacity));
    }

    .text-gray-700 {
        color: #4a5568;
        color: rgba(74, 85, 104, var(--tw-text-opacity));
    }

    .text-gray-900 {
        color: #1a202c;
        color: rgba(26, 32, 44, var(--tw-text-opacity));
    }

    @media (prefers-color-scheme: dark) {
        .dark\:bg-gray-800 {
            background-color: #2d3748;
            background-color: rgba(45, 55, 72, var(--tw-bg-opacity));
        }

        .dark\:bg-gray-900 {
            background-color: #1a202c;
            background-color: rgba(26, 32, 44, var(--tw-bg-opacity));
        }

        .dark\:border-gray-700 {
            border-color: #4a5568;
            border-color: rgba(74, 85, 104, var(--tw-border-opacity));
        }

        .dark\:text-white {
            color: #fff;
            color: rgba(255, 255, 255, var(--tw-text-opacity));
        }

        .dark\:text-gray-400 {
            color: #cbd5e0;
            color: rgba(203, 213, 224, var(--tw-text-opacity));
        }
    }
</style>
