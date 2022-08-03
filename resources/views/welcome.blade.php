@extends('layouts.base')


@section('content')

@component('components.header')

@endcomponent
<main>
        {{-- <div class="cr-chat">
            <div class="cr-chat-display-holder">
                <div class="cr-chat-display"></div>
            </div>
            <div  class="cr-chat-panel">
                <form class="cr-chat-form" onsubmit="sendWSCRChatMessage(event)">

                    <input class="input-cr-chat" type="text" name="wsText" id="wsText" placeholder="Escreva uma mensagem"></input>
                    <button type="submit" class="btn-cr-chat-send ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send-fill btn-cr-chat-icon" viewBox="0 0 16 16">
                            <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083l6-15Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z"/>
                        </svg>Enviar
                    </button>
                </form>
            </div>
        </div> --}}
        @component('components.hero')

        @endcomponent

        @component('components.about-us')

        @endcomponent
        <section class="section-resources">
            <div class="container">
                <p class="subheading">Já é nosso cliente?</p>
                <h2 class="heading-secondary">Recursos para assinantes</h2>
                <div class="resources-container py-sm">

                    <figure class="box-resource">
                        <p class="subheading">Teste de velocidade</p>
                        <div class="box-resource-img speed-img-box">
                            <a href="{{ url('https://crtelecom.speedtestcustom.com') }}" target="_blank">
                                <img class="resorce-img" src="{{ asset('img/optimal/speedometer.png') }}" alt="">
                            </a>
                        </div>
                    </figure>
                    {{-- <figure class="box-resource">
                        <p class="subheading">Central do assinante</p>
                        <div class="box-resource-img">
                            <a href="{{ url('https://noivanet.altaredesistemas.com.br/central_assinante/') }}"
                                target="_blank">
                                <img class="resorce-img resource-img-fill"
                                    src="{{ asset('img/optimal/woman-laptop-couch-square.jpg') }}" alt="">
                            </a>
                        </div>
                    </figure> --}}

                    <figure class="box-resource">
                        <p class="subheading">Central do assinante</p>
                        <div class="box-resource-img">
                            <a href="{{ url('https://noivanet.sgp.net.br/accounts/central/login') }}"
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
                            <p class="plan-subheading">FTTH People</p>
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
                            <p class="plan-subheading">FTTH World</p>
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
                            <p class="plan-subheading">FTTH Universe</p>
                            <p class="plan-desc-p">O pacote certo para empresas e para quem depende de velocidade.
                            </p>

                            <div>
                                <p class="plan-speed">350<span>Mbps</span> </p>
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

            <p class="subheading">Para Quem precisa de Mais</p>
            <div class="container">
                <div class="dedicated-plan-container flex-justify-space-between border-radius-sm box-shadow-sm">
                    <div class="features-dedicated-plan-img">

                    </div>
                    <div class="features-dedicated-plan">
                        <p class="dedicated-plan-subheading">UNIVERSE EXTREME</p>
                        <p class="dedicated-plan-speed">400MB</p>
                        <p>
                            <ul class="plan-desc-list">
                                <li>
                                    <i class="bi bi-check-square-fill"></i>&nbsp;Link dedicado Up/Down
                                </li>
                                <li><i class="bi bi-check-square-fill"></i>&nbsp;Perfeito para quem trabalha com Streaming</li>
                                <li><i class="bi bi-check-square-fill"></i>&nbsp;IP Público</li>
                                <li><i class="bi bi-check-square-fill"></i>&nbsp;Roteador Wi-Fi Gigabit inteiramente GRÁTIS</li>
                            </ul>

                        </p>
                        <div class="plan-cta">
                            <a onclick="sendMegaZapMessage('Quero Contratar 120Mbps!')"
                                class="btn btn-plan">Quero contratar
                                &raquo;</a>
                        </div>
                    </div>
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
                    <form>
                        @csrf
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

        @component('components.privacy-policy')

        @endcomponent

    </main>

    @component('components.footer')

    @endcomponent

    @endsection




