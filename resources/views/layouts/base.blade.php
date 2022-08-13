<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CR Telecom &mdash; Portal</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
   integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
   crossorigin=""/>
    <link rel="stylesheet" href="{{ asset('css/general.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/queries.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cr-chat.css') }}">


<!-- Make sure you put this AFTER Leaflet's CSS -->
<script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
crossorigin=""></script>
</head>

<body>




@yield('content')


<script src="{{asset('js/vue.global.js')}}"></script>
<div class="overlay hide">
    @component('components.subscription-form')

    @endcomponent
</div>
<script src="{{asset('js/app.js')}}" ></script>
    {{-- <script src="https://wbot.chat/index.js" token="a30c4f1aa4c023b7273d24f2de930d5c"></script> --}}

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

    {{-- <script src="{{ asset('js/cr-chat.js')}}">    </script> --}}

    <!-- Messenger Plugin de bate-papo Code -->
    <div id="fb-root"></div>

    <!-- Your Plugin de bate-papo code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "471056360042438");
      chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code -->
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v14.0'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/pt_BR/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>



</body>

</html>




