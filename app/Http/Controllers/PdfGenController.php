<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use BaconQrCode;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PdfGenController extends Controller
{
    public function pdf_gen(Request $request) {
        $url = $request->input('url');
        $title = $request->input('title');
        $url_img = $request->input('url_img');
        $description = $request->input('description');
        $address = $request->input('address');
        $dates = $request->input('dates');
        $hour = $request->input('hour');
        $price = $request->input('price');
        $orga_surname = $request->input('orga_surname');
        $orga_name = $request->input('orga_name');
        $orga_email = $request->input('orga_email');
        $orga_phone = $request->input('orga_phone');

        //{!! QrCode::size(120)->generate( $url ) !!}
        //$qr = QrCode::size(120)->generate($url, public_path('img/qr_codes/qr.png'));


        $pdf = PDF::loadView('template', [
                'url'=>$url,
                'title'=>$title,
                'url_img'=>$url_img,
                'description'=>$description,
                'address'=>$address,
                'dates'=>$dates,
                'hour'=>$hour,
                'price'=>$price,
                'orga_phone'=>$orga_phone,
                'orga_email'=>$orga_email,
                'orga_name'=>$orga_name,
                'orga_surname'=>$orga_surname
            ]);

        return $pdf->download('activity-'.$title.'.pdf');
    }

}
