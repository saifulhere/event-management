<?php

namespace App\Services;

use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrCodeService
{
    public function generateQrCode($data, $size = 100)
    {
        return QrCode::size($size)->generate($data);
    }
}
