<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use PDF;
use App\Models\PdfDetail;

class PdfGenController extends Controller
{
    public function pdf_gen(Request $request) {
        //$array = array('foo' => 'bar');

        $data = new PdfDetail([
            'url' => $request->input('url'),
            'title' => $request->input('title'),
            /*'url_img' => $request->input('url_img'),
            'description' => $request->input('description'),
            'address' => $request->input('address'),
            'dates' => $request->input('dates'),
            'hour' => $request->input('hour'),
            'price' => $request->input('price'),
            'orga_surname' => $request->input('orga_surname'),
            'orga_name' => $request->input('orga_name'),
            'orga_email' => $request->input('orga_email'),
            'orga_phone' => $request->input('orga_phone')*/
        ]);

       // return view('help')->with('data',$data);

        $pdf = PDF::loadView('template', ['data'=>$data]);
        return $pdf->download('activity-'.$data->title.'.pdf');

    }

}
