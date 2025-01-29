<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta20
* @link https://tabler.io
* Copyright 2018-2023 The Tabler Authors
* Copyright 2018-2023 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Humanitaria Saúde</title>
    <!-- CSS files -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta24/dist/css/tabler.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta24/dist/js/tabler.min.js"></script>
    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>

    <script type="importmap">
    {
      "imports": {
        "maska": "https://cdn.jsdelivr.net/npm/maska@3/dist/maska.mjs"
      }
    }
  </script>
    <script type="module">
        import {
            Mask,
            MaskInput
        } from "maska"

        new MaskInput("[data-maska]") // for masked input
        const mask = new Mask({
            mask: "#-#"
        }) // for programmatic use
    </script>
</head>

<body class="flex-column">
    <script src="./dist/js/demo-theme.min.js?1692870487"></script>
    <div class="page page-center" style="padding-top: 10px;">
        <div class="container container-tight py-4">
            <div class="text-center mb-4">
                <img src="https://skip0s.neocities.org/img/hs_title.png" height="36" alt="HSaúde" class="">
            </div>
            {{ $slot }}
        </div>
    </div>
</body>

</html>
