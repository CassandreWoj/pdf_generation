<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>PDF</title>
        <style>
            @page  {
                size: A4;
                margin: 0px;
            }
            body {
                /*padding top & bottom, same size as header and footer height*/
                padding-bottom: 100px;
                padding-top: 100px;
                page-break-after: always; /*aligns footer at bottom of a4 page*/
            }
            * {
                box-sizing: border-box;
                font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
            }
            h1 {
                color: black;
                font-size: 30px;
                text-align: center;
                padding-top: 40px;
                padding-bottom: 30px;
                margin: 0;
            }
            h2 {
                margin-top: 10px;
                margin-bottom: 10px;
                padding-bottom: 10px;
                padding-top: 10px;
            }
            h3, p {
                padding: 0;
                margin: 0;
            }
            .text {
                font-weight: bold;
                font-size: medium;
            }
            .content {
                margin-right: 100px;
                margin-left: 100px;
            }
            .title {
                vertical-align: middle !important;
                text-align: center;
                padding-top: 30px;
                padding-bottom: 20px;
                margin: 0;
            }
            .picture {
                vertical-align: middle !important;
                text-align: center;
                max-width: 1420px;
                max-height: 400px;
            }
            .picture-alone {
                max-height: 300px;
                max-width: 1420px;
            }
            .description-paragraph {
                padding-top: 50px;
                max-width: 500px;
                word-wrap: break-word;
            }
            .desc_title {
                padding-top: 30px;
            }
            .desc_par {
                padding-bottom: 40px;
                max-width: 600px;
                word-wrap: break-word;
                text-align: justify;
                text-justify: inter-word;
            }

            .header {
                background-color: #e97288;
                height: 100px;
                width: 100%;
                position: fixed;
                top: 0;
                padding-left: 30px;
                padding-right: 30px;
            }
            .header-table {
                width: 90%;
                vertical-align: middle !important;
            }
            .text-activity {
                font-weight: bold;
                text-align: right;
                vertical-align: middle !important;
            }
            .full-logo {
                vertical-align: middle !important;
            }
            .logo {
                height: 80px;
            }
            .logo-footer {
                height: 90px;
            }
            .footer {
                background-color: #e97288;
                height: 100px;
                width: 100%;
                position: fixed;
                bottom: 0;
                padding-left: 30px;
                padding-right: 30px;
                margin: 0;
            }
            .footer-table {
                width: 90%;
                vertical-align: middle !important;
            }
            .logo-bottom {
                /*margin-left: 10px;*/
                vertical-align: middle !important;
                text-align: left;
            }
            .site-url {
                /*text-align: center;*/
                text-align: right;
                vertical-align: middle !important;
            }
            .url {
                font-weight: bold;
                /*text-align: center;*/
            }
            .qr-code {
                margin-right: 10px;
                vertical-align: middle !important;
                text-align: right;
            }
            .qr-image {
                width: 120px;
                height: 120px;
            }
            .share-me {
                vertical-align: middle !important;
            }
            .scan-me {
                vertical-align: middle !important;
            }
            .qr {
                vertical-align: middle !important;
            }
            .big-table, .orga-table {
                width: 100%;
                text-align: left;
                padding-bottom: 40px;
            }
            td, th {
                height: 30px;
                vertical-align: top;
                text-align: left;
                min-width: available;
                max-width: 250px;
            }
        </style>
    </head>
    <body>
    <div class="main">
        <div class="wrapper">
            <div class="header">
                <table class="header-table">
                    <tr>
                        <th class="full-logo">
                            <img class="logo" src="img/logo-lineaire-PJU.png">
                        </th>
                        <th class="text-activity">
                            <p class="text">Toutes les activités à proximité de chez vous !</p>
                        </th>
                    </tr>
                </table>
            </div><!-- end of header -->
            <table class="content">
                <tr class="title">
                    <h1> {{ $title }} </h1>
                </tr>
                <tr class="picture">
                    <img class="picture-alone" src="{{ storage_path('app/public/' . $name) }}">
                </tr>
                <tr class="description-paragraph">
                    <h2 class="desc_title">L'activité</h2>
                    <p class="desc_par"> {{ $description}} </p>
                </tr>
                <tr class="full-table">
                    <table class="big-table">
                        <thead>
                            <tr>
                                <th>Point de rendez-vous</th>
                                <th>Date(s)</th>
                                <th>Heure</th>
                                <th>Prix</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    @foreach($address as $part_addr)
                                    {{ $part_addr }}
                                        @if($part_addr != $address[count($address) - 1])
                                            <br>
                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                    @if($nb_dates == 1)
                                        {{ $dates }}
                                    @else
                                        @foreach($dates as $date)
                                            {{ $date }}
                                            @if($date != $dates[$nb_dates - 1])
                                                <br>
                                            @endif
                                        @endforeach
                                    @endif
                                </td>
                                <td>
                                    @for($i = 0; $i < $nb_dates; $i++)
                                        {{ $hour }}
                                        @if($i != $nb_dates - 1)
                                            <br>
                                        @endif
                                    @endfor
                                </td>
                                <td>
                                    @for($i = 0; $i < $nb_dates; $i++)
                                        {{ $price }}
                                        @if($i != $nb_dates - 1)
                                            <br>
                                        @endif
                                    @endfor
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </tr>
                <tr class="organisateur">
                    <table class="orga-table">
                        <thead>
                        <tr>
                            <th>Organisateur de l'activité</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                {{ $orga_surname }} {{ $orga_name }}
                            </td>
                            <td>
                                E-mail &nbsp; &nbsp; &nbsp; : &nbsp;{{ $orga_email }} <br>
                                Téléphone : &nbsp;{{ $orga_phone }}
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </tr>
            </table>

            <div class="footer">
                <table class="footer-table">
                    <tr>
                        <th class="logo-bottom">
                            <img class="logo-footer" src="img/logo-vertical-PJU.png">
                        </th>
                        <th class="site-url">
                            <p class="url">www.plizjoinus.com</p>
                        </th>
                        <!-- TODO : find a way to generate QR code & print it
                        <th class="qr-code">
                            <table>
                                <th class="scan-me">
                                    <p class="scan">Scannez moi!</p>
                                </th>
                                <th class="qr">
                                    {!! QrCode::size(80)->generate( $url ) !!}
                                </th>
                                <th class="share-me">
                                    Inscrivez-vous <br>et partagez!
                                </th>
                            </table>
                        </th>
                        -->
                    </tr>
                </table>

            </div>
        </div>
    </div>
    </body>
</html>

