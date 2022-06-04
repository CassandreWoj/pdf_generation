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
            .description-paragraph {
                padding-bottom: 50px;
            }
            .picture-alone {
                max-height: 300px;
                max-width: 1420px;
            }
            .content {
                display: flex;
                flex-direction: column;
                margin-right: 100px;
                margin-left: 100px;
            }
            .picture {
                display: flex;
                align-content: center;
                justify-content: center;
                flex-grow: 1;
                max-width: 1420px;
                max-height: 400px;
            }
            .full-description {
                display: flex;
                flex-grow: 1;
                flex-direction: column;
                padding-bottom: 10px;
                padding-top: 20px;
            }
            .header {
                background-color: #e97288;
                height: 100px;
                width: 100%;
                display: flex;
                align-items: center;
                position: fixed;
                top: 0;
                padding-left: 30px;
                padding-right: 30px;
            }
            .text-activity {
                display: flex;
                margin-right: 30px;
                font-weight: bold;
            }
            .full-logo {
                display: flex;
                flex-grow: 1;
                margin-left: 10px;
            }
            .logo {
                height: 80px;
            }
            .logo-footer {
                height: 100px;
            }
            .footer {
                background-color: #e97288;
                height: 100px;
                width: 100%;
                display: flex;
                align-items: center;
                position: fixed;
                bottom: 0;
                padding-left: 30px;
                padding-right: 30px;
                margin: 0;
            }
            .logo-bottom {
                display: flex;
                margin-left: 10px;
            }
            .site-url {
                display: flex;
                flex-grow: 1;
                justify-content: center;
            }
            .url {
                font-weight: bold;
            }
            .qr-code {
                display: flex;
                margin-right: 30px;
            }
            .qr-image {
                width: 120px;
                height: 120px;
                align-items: start;
            }
            .share-me {
                display: flex;
                flex-grow: 1;
                justify-content: center;
                align-items: center;
            }
            .scan-me {
                display: flex;
                flex-grow: 1;
                justify-content: center;
                align-items: center;
            }
            .qr {
                display: flex;
                flex-grow: 1;
            }
            .big-table, .orga-table {
                width: 100%;
                text-align: left;
                padding-bottom: 50px;
            }
            td, th {
                height: 30px;
                vertical-align: top;
                min-width: available;
            }
        </style>
    </head>
    <body>
    <div class="main">
        <div class="wrapper">
            <div class="header">
                <div class="full-logo">
                    <img class="logo" src="https://plizjoinus.com/wp-content/uploads/2022/03/Logo-lineaire.png">
                </div>
                <div class="text-activity">
                    <p class="text">Toutes les activités à proximité de chez vous</p>
                </div>
            </div><!-- end of header -->
            <h1> {{ $title }} </h1>

            <div class="content">
                <div class="picture">
                    <img class="picture-alone" src="{{ $url_img }}">
                </div>
                <div class="full-description">
                    <div class="description-paragraph">
                        <h2>L'activité</h2>
                        <p> {{ $description}} </p>
                    </div>
                    <div class="full-table">
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
                                <td> {{ $address }} <br></td>
                                <td> {{ $dates }} </td>
                                <td> {{ $hour }} </td>
                                <td> {{ $price }} </td>
                              </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="organisateur">
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
                    </div>
                </div>
            </div>
            <div class="footer">
                <div class="logo-bottom">
                    <img class="logo-footer" src="https://plizjoinus.com/wp-content/uploads/2022/03/Logo-plizjoinus-pdf@2x.png">
                </div>
                <div class="site-url">
                    <p class="url">www.plizjoinus.com</p>
                </div>

                <div class="qr-code">
                    <div class="scan-me"><p class="scan">Scannez moi!</p></div>
                    <div class="qr">
                        {!! QrCode::size(120)->generate( $url ) !!}
                    </div>
                    <div class="share-me">Inscrivez-vous <br>et partagez!
                    </div>
                 </div>

            </div>
        </div>
    </div>
    </body>
</html>

