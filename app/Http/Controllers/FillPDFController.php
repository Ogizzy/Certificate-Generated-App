<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use setasign\Fpdi\Fpdi;
// use App\Http\Requests\CertificatesRequest;
use App\Models\Certificate;

class FillPDFController extends Controller


{
    public function process($id)

    {
       
        $certificate = Certificate::find($id);
    
//         if (!$certificate->photo) {
//             $qrCode = \QrCode::format('png')
//                 ->size(200)->generate(route('certificate.show', $certificate->id));

//             $output_file = '/img/qr-code/' . time() . '.png';

//             Storage::disk('public')->put($output_file, $qrCode);
//             $certificate->photo = $output_file;
//             $certificate->save();
//         }

//$nama = $request->post('nama'); 
       
        // $nama = "TERHIDE TYAVYAR JNR";
        $outputfile = public_path().'dcc.pdf';
        $this->fillPDF(public_path().'/master/dcc.pdf',$outputfile,$certificate->name);
        //$this->fillPDF(public_path().'master/dcc.pdf', $outputfile, $certificate->name, $certificate->photo);
        return response()->file($outputfile);
    }

    public function fillPDF($file,$outputfile,$nama)
    {
        $fpdi = new FPDI;
        $fpdi->setSourceFile($file);
        $template = $fpdi->importPage(1);
        $size = $fpdi->getTemplateSize($template);
        $fpdi->AddPage($size['orientation'],array($size['width'],$size['height']));
        $fpdi->useTemplate($template);
        $top =105;
        $right = 105;
        $nama = $nama;
        $fpdi->SetFont("helvetica","",25);
        $fpdi->SetTextColor(25,26,25);
        $fpdi->Text($right,$top,$nama);
       
       //get the QRcode PNG  u generated
        $qrImage=storage_path('/app/public/img/qr-code/1676318628.png');
      

        // insert image at position x,y,w,h 
        $fpdi->Image($qrImage,234,156,36,30);
            
        return $fpdi->Output($outputfile,'F');
        
    }

    }
