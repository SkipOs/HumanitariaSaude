<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Humanitária Saúde</title>
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
