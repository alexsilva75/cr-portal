<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CR Market</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">


</head>

<body>
    <div class="hero-container">

        <nav class="navbar">
            <div class="container nav-container">
                <span class="logo-container"><img class="logo-top-img" src="{{ asset('img/logo.png') }}" alt=""></span>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="">Início</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Parcerias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Quem somos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Fale conosco</a>
                    </li>
                </ul>
            </div>


        </nav>
        <div class="container">
            <section class="hero-section">
                <div class="col hero-col left-col">
                    <h1 class="heading-primary">O que você procura?</h1>

                    <div class="hero-feature-box hero-buy-box">
                        <h2 class="hero-action-heading">Quer Comprar?</h2>
                        <p class="hero-text">
                            Contamos com os melhores parceiros, para oferer a você os melhores produtos e serviços!
                        </p>
                        <a href="#" class="btn buy-btn">Conheça o nosso Shopping 	&raquo;</a>
                    </div>
                    {{-- <div class="hero-feature-box hero-sell-box">
                        <h2 class="hero-action-heading">Quer vender?</h2>
                        <p class="hero-text">
                            Quer vender o seu produto ou serviço aqui? Venha para o nosso programa de parcerias.
                        </p>
                        <a href="#" class="btn sell-btn">Torne-se um Parceiro &raquo;</a>
                    </div> --}}
                </div>

                <div class="col hero-col right-col">
                    <div class="skew-shape"></div>
                </div>

            </section>
        </div>

    </div>
    <section>
        <h1>Página ainda em construção</h1>
    </section>

</body>

</html>
