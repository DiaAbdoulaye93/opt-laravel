@extends('index')
@section('content')
<div class="container mt-5 mb-5">
    <div class="col-md-8 order-md-1" style="margin-left: 20%;">
        <form class="needs-validation" action="{{route('requestForOtp')}}" method="post" novalidate>
            <div class="card">
                <div class="card-header bg-success">
                    <h3 class="mb-3 text-center">Validation du panier</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="firstName">Preénom</label>
                            <input type="text" class="form-control" name="name" id="fitrsname" placeholder="Ex: Abdoulaye" value="" required>
                            <div class="invalid-feedback">
                                Le prénom est obligatoire.
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="firstName">Nom</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Ex: Dia" value="" required>
                            <div class="invalid-feedback">
                                Le nom est ob ligatoire.
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="lastName">Mobile</label>
                            <input type="number" class="form-control" name="number" id="number" placeholder="Ex: +221 77 197 07 77 " value="" required>
                            <div class="invalid-feedback">
                                Le telephone est obligatoire..
                            </div>
                        </div>
                        <div class="col-md-6  mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Ex: vous@example.com" required>
                            <div class="invalid-feedback">
                                L'email est obligatoire..
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" placeholder="Ex: 70 sicap mermoz">
                        <div class="invalid-feedback">
                            Saisir une adresse de livraison.
                        </div>
                    </div>
                    <hr class="mb-4">
                    <h4 class="mb-4">Methode de paiment</h4>
                    <div class="form-group col-12">
                        <div class="form-check form-check-inline">
                            <label class="form-check-label" for="inlineRadio1">Payement en ligne</label>
                            <input class="form-check-input btn-success" type="radio" name="paymentMethod" id="inlineRadio1" value="Espece">
                        </div>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label" for="inlineRadio2">Payement aprés livraison</label>
                            <input class="form-check-input btn-success" type="radio" name="paymentMethod" id="inlineRadio2" value="OM">
                        </div>

                    </div>
                </div>
            </div>

            <!-- 
            <div class="row d-block my-3">
                <div class="form-control">
                    <input id="credit" name="paymentMethod" type="radio" class="form-control " required>
                    <label class="custom-control-label" for="credit">Payer a la livraison</label>
                </div>
                <div class="form-control">
                    <input id="credit" name="paymentMethod" type="radio" class="form-control " required>
                    <label class="custom-control-label" for="credit">Payer a la livraison</label>
                </div>
            </div> -->
            <div class="card-footer">
                {!! csrf_field() !!}
                <input id="purchase-type" name="purchase_type" type="hidden" value="buy-product">
                <button class="btn btn-success btn-lg btn-block" type="submit">Generer un code de sécurité</button>
            </div>

        </form>
    </div>
    <!-- <div class="col-md-4 order-md-2 mb-4 float-right">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Votre panier</span>
            <span class="badge badge-secondary badge-pill">2</span>
        </h4>
        <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-condensed">
                <div>
                    <h6 class="my-0">First Product</h6>
                    <small class="text-muted">Brief description</small>
                </div>
                <span class="text-muted">$12</span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
                <div>
                    <h6 class="my-0">Second Product</h6>
                    <small class="text-muted">Brief description</small>
                </div>
                <span class="text-muted">$8</span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
                <span>Total (USD)</span>
                <strong>$20</strong>
            </li>
        </ul>
    </div> -->
</div>
@endsection