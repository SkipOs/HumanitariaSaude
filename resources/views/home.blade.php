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

<x-head></x-head>



<body>
    <header class="navbar navbar-expand-lg py-3">
        <div class="container">
            <!-- BEGIN NAVBAR LOGO -->
            <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
                <img src="https://skip0s.neocities.org/img/hs_log.png" width="32" height="32" alt="HSaúde"
                    class="">
                Humanitária Saúde
            </h1>

            <!-- END NAVBAR LOGO -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01"
                aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <nav class="navbar-nav ms-auto">
                    <div class="nav-item">
                        <a class="nav-link" href="/myadmin"><span class="nav-link-title">Administrador</span></a>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link" href="/psaude"><span class="nav-link-title">Profissional de Saúde</span></a>
                    </div>

                    <div class="nav-item ms-4">
                        <a href="/register" class="btn" role="button">Cadastre-se</a>
                    </div>

                    <div class="nav-item ms-4">
                        <a href="/login" class="btn btn-primary">Login</a>
                    </div>
                </nav>
            </div>
        </div>
    </header>

    <main class="main page-body">
        <div class="container-x1 align-middle">
            <div class="row row-deck row-cards">
                <div class="col-lg-12" style="display: flex; align-items: stretch; justify-content: center;">
                    <h1 class="hero-title">Seu sistema de prontuário unificado</h1>
                </div>
                <div class="col-lg-12" style="display: flex; align-items: stretch; justify-content: center;">
                    <p class="hero-title">Nunca mais sofra ao procurar um exame antigo em e-mails ou pastas com diversos papéis.<br>Temos tudo registrado aqui para facilitar para você.</p>
                </div>

                <div class="col-lg-12" style="display: flex; align-items: stretch; justify-content: center;">
                    <div class="lg:col-6 aos-init aos-animate" data-aos="fade-up"><img
                            alt="Tabler Admin Template Benefit Charts" loading="lazy" width="510" height="429"
                            decoding="async" data-nimg="1" class="mx-auto img-light" style="color:transparent"
                            src="https://kamimonogatari.neocities.org/images/undraw_in-the-office_e7pg.svg"><img
                            alt="Tabler Admin Template Benefit Charts Dark" loading="lazy" width="510" height="429"
                            decoding="async" data-nimg="1" class="mx-auto img-dark" style="color:transparent"
                            src="https://kamimonogatari.neocities.org/images/undraw_in-the-office_e7pg.svg">
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
