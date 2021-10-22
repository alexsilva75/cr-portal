<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/general.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/queries.css') }}">
    <title>CR Telecom &mdash; Portal</title>
</head>

<body onload="animateLogo()">
    <main>
        <section class="maintenance">
            <div class="container">
                <h1 class="heading-primary">Em breve, você conhecerá o nosso novo portal. Aguarde!</h1>
                <div class="logo-container logo-base">
                    <img src="{{ asset('img/logo.png') }}" alt="" class="logo-lg">
                </div>
            </div>
        </section>

    </main>

    <script>
        function animateLogo() {
            let logoContainerEl = document.querySelector('.logo-container');
            logoContainerEl.classList.add('logo-appear');
        }
    </script>
</body>

</html>
