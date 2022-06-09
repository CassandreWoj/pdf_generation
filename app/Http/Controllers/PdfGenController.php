<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use BaconQrCode;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;

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
        QrCode::size(90)->generate($url, public_path('img/qr_codes/qr.png'));
        $content = file_get_contents($url_img);
        $exploded_url = explode("/", $url_img);
        $name = $exploded_url[count($exploded_url) - 1];
        Storage::disk('public')->put($name, $content);

        $exploded_address = explode(",", $address);
        $dates_len = 1;
        // 3 char is for "N/A" and there is a , -> multiple dates in the string
        if (strlen($dates) > 3 && str_contains($dates, ", ")) {
            $dates = explode(", ", $dates);
            $dates_len = count($dates);
        }

        $pdf = PDF::loadView('template', [
                'url'=>$url,
                'title'=>$title,
                'url_img'=>$url_img,
                'name'=>$name,
                'description'=>$description,
                'address'=>$exploded_address, // this is an array
                'nb_dates' => $dates_len,
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
