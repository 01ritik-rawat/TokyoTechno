<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Dompdf\Dompdf;

class PDFController extends Controller
{
    //

    public function index(Request $request)
    {
        $request= json_decode($request->data);
        // return $request;
        // return $request->orderDetails;
        $data = [
            'data'=>$request->data,
            'orderDetails'=>$request->orderDetails,
        ];
        // return view('myPDF', $data);
        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('myPDF', $data));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream();
    }
}
