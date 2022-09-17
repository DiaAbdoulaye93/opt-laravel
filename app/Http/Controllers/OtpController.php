<?php

namespace App\Http\Controllers;

use Ferdous\OtpValidator\Object\OtpRequestObject;
use Ferdous\OtpValidator\Object\OtpValidateRequestObject;
use Ferdous\OtpValidator\OtpValidator;
use Illuminate\Http\Request;

class OtpController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getconfirmationPage()
    {
       
        return view('otp_interface');
    }

    public function sendtOTP(Request $request)
    {
        
        $client_req_id = rand(0, 1000);
        $number=intVal($request->input('number'));
        $purchase_type=$request->input('purchase_type');
        $email=$request->input('email');
        

        $otp_req = OtpValidator::getrequestOtp(
            new OtpRequestObject($client_req_id, $number, $purchase_type, $email)
        );
//   dd($otp_req);
        if($otp_req['code'] === 201){
            return view('otp_interface')->with($otp_req);
        }else{
            dd("okey");
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
            new OtpValidateRequestObject($uniqId,$otp)
        );

        if($data['validate']['code'] === 200){
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

        if(isset($otp_req['code']) && $otp_req['code'] === 201){
            return view('product.otp-page')->with($otp_req);
        }else{
            dd($otp_req);
        }
    }
}
