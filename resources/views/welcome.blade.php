<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CR Telecom &mdash; Portal</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/general.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/queries.css') }}">


</head>

<body>

    <header class="header">
        <a href="#">
            <img class="logo-top-img" src="{{ asset('img/logo.png') }}" alt="CR Telecom - logo">
        </a>
        <nav class="main-nav">
            <ul class="main-nav-list">
                <li class="main-nav-item">
                    <a class="main-nav-link" href="#">Início</a>
                </li>
                <li class="main-nav-item">
                    <a class="main-nav-link" href="#">Quem somos</a>
                </li>
                <li class="main-nav-item">
                    <a class="main-nav-link" href="#section-features">Internet</a>
                </li>
                {{-- <li class="main-nav-item">
                    <a class="main-nav-link" href="">Parcerias</a>
                </li>
                <li class="main-nav-item">
                    <a class="main-nav-link" href="">Shopping</a>
                </li> --}}
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
        <div class="hero-container">
            <div class="container">
                <section class="hero-section">
                    <div class="col hero-col left-col">
                        <h1 class="heading-primary">Conectando Você e seus Sonhos!</h1>

                        <div class="hero-description">
                            <p class="hero-description-text">
                                O seu provedor de internet. Agora de cara nova!
                            </p>
                        </div>

                        <a href="#features-plans" class="btn hero-btn">Conheça nossos planos &raquo;</a>
                        {{-- <div class="hero-feature-box hero-sell-box">
                            <h2 class="hero-action-heading">Quer vender?</h2>
                            <p class="hero-text">
                                Quer vender o seu produto ou serviço aqui? Venha para o nosso programa de parcerias.
                            </p>
                            <a href="#" class="btn sell-btn">Torne-se um Parceiro &raquo;</a>
                        </div> --}}
                    </div>

                    <div class="col hero-col right-col">
                        {{-- <div class="skew-shape"></div> --}}
                        <div class="hero-img">

                        </div>
                    </div>
            </div>
            </section>


        </div>
        <section class="section-resources">
            <div class="container">
                <p class="subheading">Já é nosso cliente?</p>
                <h2 class="heading-secondary">Recursos para assinantes</h2>
                <div class="resources-container py-sm">

                    <figure class="box-resource">
                        <p class="subheading">Teste de velocidade</p>
                        <div class="box-resource-img">
                            <a href="{{ url('https://crtelecom.speedtestcustom.com') }}" target="_blank">
                                <img class="resorce-img" src="{{ asset('img/optimal/speedometer.png') }}" alt="">
                            </a>
                        </div>
                    </figure>
                    <figure class="box-resource">
                        <p class="subheading">Central do assinante</p>
                        <div class="box-resource-img">
                            <a href="{{ url('https://noivanet.altaredesistemas.com.br/central_assinante/') }}"
                                target="_blank">
                                <img class="resorce-img resource-img-fill"
                                    src="{{ asset('img/optimal/woman-laptop-couch-square.jpg') }}" alt="">
                            </a>
                        </div>
                    </figure>
                </div>

            </div>
        </section>
        {{-- <section class="featured-in">
            <h1></h1>
        </section> --}}

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
                                <p class="plan-speed">40<span>Mbps</span> </p>
                                <p class="plan-price"><span>R$</span>65,00</p>
                                <div class="plan-cta">
                                    <a href="#" class="btn btn-plan">Quero contratar &raquo;</a>
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
                                <p class="plan-speed">80<span>Mbps</span> </p>
                                <p class="plan-price"><span>R$</span>85,00</p>
                                <div class="plan-cta">
                                    <a href="#" class="btn btn-plan">Quero contratar &raquo;</a>
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
                                <p class="plan-speed">120<span>Mbps</span> </p>
                                <p class="plan-price"><span>R$</span>105,00</p>

                                <div class="plan-cta">
                                    <a href="#" class="btn btn-plan">Quero contratar &raquo;</a>
                                </div>
                            </div>
                        </div>

                    </figure>
                </div>
            </div>
            {{-- <div class="features-pre-paid">
                <p class="subheading">Não quer assinatura?</p>
                <h3 class="heading-tertiary">Confira nossos pacotes pré-pagos</h3>
                <p class="description">Temos o pacote certo para você não ficar sem navegar.</p>

                <div class="pre-paid-plans">

                    <div class="pre-paid-plan">
                        <p class="traffic">2GB*</p>
                        <span>por apenas</span>
                        <p class="price">R$ 12,00</p>
                    </div>
                    <div class="pre-paid-plan">
                        <p class="traffic">4GB*</p>
                        <span>por apenas</span>
                        <p class="price">R$ 18,00</p>
                    </div>
                    <div class="pre-paid-plan">
                        <p class="traffic">8GB*</p>
                        <span>por apenas</span>
                        <p class="price">R$ 28,00</p>
                    </div>
                </div>

                <p class="description">*Os valores são pagos por limite de tráfego. O acesso é feito por meio dos
                    nossos pontos de acesso espalhados pela cidade.</p>


                <div class="pre-paid-cta">
                    <a href="#" class="btn btn-pre-paid">Quero comprar &raquo;</a>
                </div>

            </div> --}}


        </section>

        {{-- <section class="section-partnership">
            <div class="partnership-description">
                <h2 class="heading-secondary">Apresentamos o nosso Programa de Parcerias</h2>
                <p class="partnership-text">
                    Mais do que um provedor, queremos ser seu parceiro na sua busca por desenvolvimento pessoal e
                    profissional, que se resumem também em uma melhor qualidade de vida.
                </p>
            </div>
            <div class="partnership-img-container">
                <figure>
                    <img class="partnership-img" src="{{ asset('img/partnership.jpg') }}" alt="">
                </figure>
            </div>
            <div class="partnership-description">
                <h2 class="heading-secondary">Vender Online?</h2>
                <p class="partnership-text">
                    Agora disponibilizamos um shopping virtual, inteiramente destinado aos nossos parceiros do comércio
                    local
                </p>

                <h2 class="heading-secondary">É Autônomo?</h2>
                <p class="partnership-text">
                    Sabemos das dificuldades para anunciar serviços em nossa cidade. Por isso oferecemos a nossa
                    plataforma para permitir que profissionais possam encontrar novos clientes.
                </p>
                <div class="partnership-cta">
                    <a href="#" class="btn hero-btn">Quero ser parceiro &raquo;</a>
                </div>


            </div>
        </section> --}}

        <section id="section-contact" class="section-contact">

            <div class="contact-container">
                <div class="contact-left-col">
                    {{-- <p class="contact-icon-p" > <span class="contact-icon-container"><i class="bi bi-envelope icon-contact"></i></span> </p> --}}

                </div>


                <div class="contact-form-container">

                    <p class="subheading">Dúvidas?</p>
                    <h2 class="heading-secondary">Fale Conosco!</h2>
                    <form method="POST" action="{{ route('send') }}">
                        <div class="form-group">
                            <label for="nome" class="input-caption">Nome*</label>
                            <input type="text" name="nome" id="nome" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="email" class="input-caption">E-mail*</label>
                            <input type="text" name="email" id="email" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="email" class="input-caption">Telefone*</label>
                            <input type="text" name="email" id="email" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="mensagem" class="input-caption">Mensagem</label>
                            <textarea class="form-control" name="mensagem" id="" cols="30" rows="10"></textarea>
                        </div>

                        <button class="btn btn-contact-send"><i class="bi bi-envelope icon-contact"></i>
                            Enviar</button>
                    </form>
                </div>


            </div>
        </section>


    </main>
    <footer class="footer">
        <div class="social">
            <div class="logo-col">
                <img src="{{ asset('img/logo.png') }}" alt="">
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
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="https://wbot.chat/index.js" token="a30c4f1aa4c023b7273d24f2de930d5c"></script>
</body>

</html>
