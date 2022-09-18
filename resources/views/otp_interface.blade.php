@extends('index')
@section('content')
<div class="container  mt-5 mb-5">
    <div class="col-md-6 mt-5" style="margin-left: 30%; height: 500px;">
        <form class="needs-validation" action="{{route('validateOtp')}}" method="post">
            <div class="card">
                <div class="card-header bg-success text-light text-center">
                    <h4 class="mb-3">Confirmation commande</h4> 
                    <span> Veuillez saisir votre code de confirmation envoyé </span> <br> par SMS au:  <small> {{$number}} et/ou par Mail sur l'adresse suivante : {{$email}} </small>
                </div>
                <div class="card-body py-3" style="height: 180px;">

                    <div class="input-group mt-5 ">
                        <input type="text" class="form-control  mb-4" name="otp" id="otp" placeholder="Ex: 1098" value="" required>
                    </div>
                    <div class="row mt-5">
                        <div class="col-md-6">
                            <button type="submit" class=" form-control btn btn-success">Valider</button>
                        </div>
                        <div class="col-md-6">
                            <form class="needs-validation" action="{{route('resendOtp')}}" method="post" novalidate>
                                {!! csrf_field() !!}
                               
                                <input id="uniqueId" name="uniqueId" type="hidden" value="{{$otp_req['uniqueId']}}">
                                <button class="btn btn-danger col-md-12" type="submit">Nouveau OTP</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>
@endsection