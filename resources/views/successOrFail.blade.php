@extends('index')
@section('content')
<div class="container d-flex p-2">


    @if($validate['code'] == 200)
    <script>
        setTimeout(function() {
            window.location.href = '{{url("/accueil")}}';
        }, 2500);
        // // your "Imaginary javascript
        // window.location.href = '{{url("/accueil")}}'; //using a named route
    </script>
    @elseif($validate['code'] == 203 || $validate['code'] == 404)
    @if(isset($validate['resendId']))
    <div class="col-md-6 mt-5" style="margin-left: 30%;">
        <form class="needs-validation card" action="{{route('validateOtp')}}" method="post" novalidate>
            <div class="card-header bg-danger text-light text-center">
                <h4 class="mb-3">{{$resp[$validate['code']]}}</h4>
            </div>
            <div class="card-body">

                <div class="">
                    <label for="otp">Merci de saisir un otp valide</label>
                    <input type="text" class="form-control" name="otp" id="otp" placeholder="" value="" required>
                </div>
            </div>

            <hr class="mb-4">
            {!! csrf_field() !!}
            <input id="uniqueId" name="uniqueId" type="hidden" value="{{$validate['resendId']}}">
            <button class="btn btn-danger btn-lg btn-block" type="submit">Envoyer</button>
        </form>
        @endif
        @else
        {{$resp[$validate['code']]}}
        @endif
    </div>
    @endsection