<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class PdfController extends Controller
{
    //download PDF
    public function downloadPDF(){
      // $user = UserDetail::find($id);

      $pdf = PDF::loadView('apps/vesRealization/reportPdf');
      return $pdf->download('Report Realization.pdf');

    }
}
