@extends('index')
@section('content')
<div class="container d-flex p-2">
    <div class="col-md-6 mt-5" style="margin-left: 30%;">
        <form class="card p-2" action="{{route('validateOtp')}}" method="post">
            <div class="card-header bg-success text-light text-center">
                <h4 class="mb-3">OTP Validation</h4>
            </div>
            <div class="card-body">

                <div class="input-group ">
                    <input type="text" class="form-control  mb-4" name="otp" id="otp" placeholder="Ex: 1098" value="" required>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <button type="submit" class=" form-control btn btn-success">Valider</button>
                    </div>
                    <div class="col-md-6 mb-3">
                        <form class="needs-validation" action="{{route('resendOtp')}}" method="post" novalidate>
                            {!! csrf_field() !!}
                            <input id="uniqueId" name="uniqueId" type="hidden" value="{{$uniqueId}}">
                            <button class="btn btn-danger col-md-12" type="submit">Nouveau OTP</button>
                        </form>
                    </div>
                </div>
                <!-- <div>Expire dans <span id="timer"></span></div>
                {!! csrf_field() !!}
                <input id="uniqueId" name="uniqueId" type="hidden" value="{{$uniqueId}}">

            </div> -->
        </form>

    </div>
</div>
@endsection