<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class QrCodeController extends Controller
{
    public function generateCode()

   {
 $image = \QrCode::format('png')
 ->size(200)->generate('OG La-fetch Solution');
$output_file = '/img/qr-code/' . time() . '.png';
Storage::disk('public')->put($output_file, $image);     //storage/app/public/img/qr-code/img-1557309130.png

return "Success";
   }
}
