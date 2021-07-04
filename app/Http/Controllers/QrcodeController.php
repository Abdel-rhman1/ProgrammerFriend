<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
class QrcodeController extends Controller
{
    public function generate(string $url_code , string $Name){
        $code = QrCode::generate($url_code);
        
       
        return $code;
    }
}
