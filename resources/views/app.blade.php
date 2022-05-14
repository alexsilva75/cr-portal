<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title inertia>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap"> -->
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/bootstrap-icons.css') }}">
        <link rel="stylesheet" href="{{ asset('css/general.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/queries.css') }}">
        <link rel="stylesheet" href="{{ asset('css/cr-chat.css') }}">
        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <!-- Scripts -->
        @routes
        <script src="{{ mix('js/app.js') }}" defer></script>
        @inertiaHead
    </head>
    <body class="font-sans antialiased">
        @inertia

        @env ('local')
            <script src="http://localhost:3000/browser-sync/browser-sync-client.js"></script>
        @endenv

        <script src="https://wbot.chat/index.js" token="a30c4f1aa4c023b7273d24f2de930d5c"></script>

<!-- Cookie Consent by https://www.TermsFeed.com -->
<script type="text/javascript" src="//www.termsfeed.com/public/cookie-consent/4.0.0/cookie-consent.js" charset="UTF-8">
</script>

<script src="{{ asset('js/script.js') }}"></script>
<script type="text/javascript" charset="UTF-8">
    let ccNbMainContainerEl = null;
    document.addEventListener('DOMContentLoaded', function() {
        cookieconsent.run({
            "notice_banner_type": "simple",
            "consent_type": "express",
            "palette": "dark",
            "language": "pt",
            "page_load_consent_levels": ["strictly-necessary"],
            "notice_banner_reject_button_hide": false,
            "preferences_center_close_button_hide": false,
            "website_name": "CR Telecom"
        });

        ccNbMainContainerEl = document.querySelector('.cc-nb-main-container');

        ccNbMainContainerEl.style.zIndex = '990';

        let privacyButtonContainerEl = document.querySelector('.cc-nb-buttons-container');

        privacyButtonContainerEl.insertAdjacentHTML('beforeend',
            `<button class="cc-nb-changep" onclick="openPrivacy()" role="button">Conheça a nossa Política de Privacidade</button>`
        );
        console.log(privacyButtonContainerEl);
    });

    let privacyPolicyContainerEl = document.querySelector('.privacy-policy-container');


    function openPrivacy() {

        privacyPolicyContainerEl.classList.add('open-privacy');
        ccNbMainContainerEl.style.display = 'none';
    }

    function closePrivacy() {
        privacyPolicyContainerEl.classList.remove('open-privacy');
        ccNbMainContainerEl.style.display = 'block';
    }

    let closePrivacyBtnEl = document.querySelector('.btn-close-privacy');

    privacyPolicyContainerEl.addEventListener('click', closePrivacy);

    closePrivacyBtnEl.addEventListener('click', closePrivacy);
</script>

<noscript>Cookie Consent by <a href="https://www.termsfeed.com/privacy-policy-generator/"
        rel="nofollow noopener">TermsFeed Generator</a></noscript>
<!-- End Cookie Consent -->

<script src="{{ asset('js/cr-chat.js')}}">    </script>
    </body>
</html>
