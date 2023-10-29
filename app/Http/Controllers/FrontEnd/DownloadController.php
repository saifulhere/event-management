<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\BookEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Services\QrCodeService;


class DownloadController extends Controller
{

    public function index()
    {
        return view('Frontend.Download.search_ticket');
    }


    public function pdfShow ()
    {
        return view('Frontend.Download.pdf_view');
    }

    public function pdfView(Request $request)
    {
        $request->validate([
            'payment_number'      => 'required',
        ]);

        $payment_number = $request->input('payment_number');

        $ticket = BookEvent::where('payment_number', $payment_number)->first();

        
        $qrCodeService = new QrCodeService();

        $qrCode = $qrCodeService->generateQrCode($ticket->name);
        
        if (!empty($ticket)){

            return view('Frontend.Download.pdf_view', compact('ticket', 'qrCode'));

        } else {
            return redirect()->back()->with('status', 'Guest Not Found');
        }
    }

    public function pdfConvert(Request $request, $id)
    {
        $ticket = BookEvent::where('guest_id',$id)->first();

        $qrCodes = [];

        $qrCodeService = new QrCodeService();

        $verifyUrl = route('ticket.verify', $ticket->guest_id);

        $qrCode = $qrCodeService->generateQrCode($verifyUrl);


        $pdf = app('dompdf.wrapper')->setOptions(['base_path' => public_path()])->loadView('Frontend.Download.ticket', compact('ticket', 'qrCode'));
        $pdfOutput = $pdf->output();


        $headers = [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="ticket.pdf"',
        ];

        return Response::make($pdfOutput, 200, $headers);

    }

    public function verify($id)
    {
        $ticket = BookEvent::with('event')->where('guest_id', $id)->first();

        return view('Frontend.Download.ticket_verify', compact('ticket'));
    }

}
