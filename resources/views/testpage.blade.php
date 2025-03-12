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
    <?php
    $idArquivo = 1;
    ?>

    <x-alert-message></x-alert-message>
    <H1>Upload</H1>
    <div class="m-4">
        <form action="/file-upload" method="post" enctype="multipart/form-data">
            @csrf
            <input type="file" name="file">

            <input type="hidden" name="updated_at" value="{{ now() }}">
            <!-- Atualiza 'updated_at' para a data atual -->
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Realizar Upload</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            </div>
        </form>
    </div>
    <hr>
    <H1>Download</H1>
    <h2>Resultado do exame:
        @if ($idArquivo != null)
            Pronto
    </h2>
    <p>{{ Storage::url(DB::table('files')->where('idArquivo', $idArquivo)->first()->name) }}
    <p>
        <a href="{{ Storage::url(DB::table('files')->where('idArquivo', $idArquivo)->get('path')->first()->path) }}"
            target="_blank">
            <button class="btn"><i class="fa fa-download"></i>Baixar Resultado</button>
        </a>
    @else
        Indisponível</h2>
        @endif
</body>
