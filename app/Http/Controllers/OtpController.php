<?php

namespace App\Http\Controllers;

use Ferdous\OtpValidator\Object\OtpRequestObject;
use Ferdous\OtpValidator\Object\OtpValidateRequestObject;
use Ferdous\OtpValidator\OtpValidator;
use Illuminate\Http\Request;
use Alert;

class OtpController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getconfirmationPage()
    {
       
        return view('otp_interface');
    }
    /**
     * @param int $defaultDigit
     * @return int
     */
    private static function randomOtpGen(int $defaultDigit = 4)
    {
        $digit = config('otp.digit') ?? $defaultDigit;
        return rand(pow(10, $digit - 1), pow(10, $digit) - 1);
    }

    public function sendtOTP(Request $request)
    {
        $client_req_id = rand(0, 1000);
        $number = intVal($request->input('number'));
        $purchase_type = $request->input('purchase_type');
        $email = $request->input('email');

        $otp_req = OtpValidator::getrequestOtp(
            new OtpRequestObject($client_req_id, $number, $purchase_type, $email)
        );
        if ($otp_req['code'] === 201) {
            return view('otp_interface', compact('otp_req', 'email', 'number'));
         
            // return view('otp_interface')->witch($otp_req,$email,$number);
        } else {
            dd($otp_req);
        }
    }



    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function validateOtp(Request $request)
    {
        $uniqId = $request->input('uniqueId');
        $otp = $request->input('otp');
        $data['resp'] = [
            200 => 'Commande confirmée !!!',
            204 => 'Trop d\'essais !!!',
            203 => 'OTP invalide',
            404 => 'Demande introuvable'
        ];
        $data['validate'] =  OtpValidator::validateOtp(
            new OtpValidateRequestObject($uniqId, $otp)
        );

        if ($data['validate']['code'] === 200) {
            toast('Votre commande à bien été confirmée!','success');
            //TODO: OTP is correct and with return the transaction ID, proceed with next step
        }

        return view('successOrFail')->with($data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function resendOtp(Request $request)
    {
        $uniqueId = $request->input('uniqueId');
        $otp_req = OtpValidator::resendOtp($uniqueId);

        if (isset($otp_req['code']) && $otp_req['code'] === 201) {
            return view('product.otp-page')->with($otp_req);
        } else {
            dd($otp_req);
        }
    }
}
