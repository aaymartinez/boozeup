<div class="modal fade cart-modal" tabindex="-1" role="dialog" aria-labelledby="carts-modal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content rounded-0">
            <div class="modal-header rounded-0">
                <h5 class="modal-title font-weight-bold">MY SHOPPING CART</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="font-weight-bold">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="alert alert-success mt-2" style="display: none;">
                    <p class="m-0"></p>
                </div>

                @if ($carts->count() != 0)
                    <div class="row carts">
                        <table class="table table-borderless">
                            <thead>
                            <tr>
                                <th colspan="2">Item</th>
                                <th class="text-right">Qty.</th>
                                <th class="text-center">Amount</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach( $carts as $items )
                                <tr class="border-bottom">
                                    <td width="100">
                                        <img src="{{ Storage::url($items->products->photos) }}" alt="{{ $items->products->title }}" class="img-fluid" width="75" style="max-height: 75px;">
                                    </td>
                                    <td>
                                        <div class="title font-weight-bold">{{ $items->products->title }}</div>
                                        <div class="price">P {{ number_format($items->products->price, 2) }}</div>
                                    </td>
                                    <td class="text-right">{{ $items->quantity }}</td>
                                    <td class="text-center">P {{ number_format($items->price, 2) }}</td>
                                    <td width="50">
                                        <form id="delete-form-{{ $items->id }}" class="mr-2" method="POST" action="{{ url('/carts/'.$items->id) }}">
                                            {{ csrf_field() }}
                                            <input name="_method" type="hidden" value="DELETE">
                                            <input type="hidden" id="item" value="{{ $items->id }}">
                                            <button type="submit" id="delete" style="display: none">delete</button>

                                            <a class="delete-cart-item" cb-data="{{ $items->id }}"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                            <tr class="text-right">
                                <td colspan="3" class="font-weight-bold">Subtotal</td>
                                <td colspan="2">P {{ number_format($carts->sum('price'), 2) }}</td>
                            </tr>
                            <tr class="text-right">
                                <td colspan="3" class="font-weight-bold">Delivery Fee</td>
                                <td colspan="2">P 150.00</td>
                            </tr>
                            <tr class="text-right total">
                                <td colspan="3" class="font-weight-bold">Total Amount</td>
                                <td colspan="2">P {{ number_format($carts->sum('price') + 150, 2) }}</td>
                            </tr>
                            </tbody>
                        </table>

                        <div class="text-center mb-5 w-100">
                            <button type="button" class="btn cBtn-dark rounded-0" data-dismiss="modal">CONTINUE SHOPPING</button>
                            <button type="button" class="btn cBtn rounded-0 cart-checkout">PROCEED TO CHECKOUT</button>
                        </div>
                    </div>
                    <form class="form-horizontal" method="POST" action="{{ url('/transaction/') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="shopping-info" style="display:none;">
                            <div class="form-row mb-2">
                                <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }} col-md-6">
                                    <label for="first_name">First Name <span class="required-marker">*</span></label>
                                    <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required>
                                    @if ($errors->has('first_name'))
                                        <span class="help-block text-danger">
                                            <strong>{{ $errors->first('first_name') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }} col-md-6">
                                    <label for="last_name">Last Name <span class="required-marker">*</span></label>
                                    <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required>
                                    @if ($errors->has('last_name'))
                                        <span class="help-block text-danger">
                                            <strong>{{ $errors->first('last_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-row mt-2 mb-2">
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} col-md-6">
                                    <label for="email">Email Address <span class="required-marker">*</span></label>
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                    @if ($errors->has('email'))
                                        <span class="help-block text-danger">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('country_area_code') ? ' has-error' : '' }} col-md-3">
                                    <label for="country_area_code">Country/Area Code <span class="required-marker">*</span></label>
                                    <input id="country_area_code" type="text" class="form-control" name="country_area_code" value="{{ old('country_area_code') }}" required>
                                    @if ($errors->has('country_area_code'))
                                        <span class="help-block text-danger">
                                            <strong>{{ $errors->first('country_area_code') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('mobile_number') ? ' has-error' : '' }} col-md-3">
                                    <label for="mobile_number">Mobile Number <span class="required-marker">*</span></label>
                                    <input id="mobile_number" type="text" class="form-control" name="mobile_number" value="{{ old('mobile_number') }}" required>
                                    @if ($errors->has('mobile_number'))
                                        <span class="help-block text-danger">
                                            <strong>{{ $errors->first('mobile_number') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <hr />

                            <div class="form-row mt-2 mb-2">
                                <div class="form-group{{ $errors->has('residential_company') ? ' has-error' : '' }} col-md-6">
                                    <label for="residential_company">Residential or Company <span class="required-marker">*</span></label>
                                    <select id="residential_company" class="form-control" name="residential_company" value="{{ old('residential_company') }}" required>
                                        <option value="">--Select--</option>
                                        <option value="residential">Residential</option>
                                        <option value="company">Company</option>
                                    </select>

                                    @if ($errors->has('residential_company'))
                                        <span class="help-block text-danger">
                                            <strong>{{ $errors->first('residential_company') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-row mt-2 mb-2">
                                <div class="form-group{{ $errors->has('unit_floor') ? ' has-error' : '' }} col-md-6">
                                    <label for="unit_floor">Unit & Floor No. <span class="required-marker">*</span></label>
                                    <input id="unit_floor" type="text" class="form-control" name="unit_floor" value="{{ old('unit_floor') }}" required>
                                    @if ($errors->has('unit_floor'))
                                        <span class="help-block text-danger">
                                            <strong>{{ $errors->first('unit_floor') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('street') ? ' has-error' : '' }} col-md-6">
                                    <label for="street">Street <span class="required-marker">*</span></label>
                                    <input id="street" type="text" class="form-control" name="street" value="{{ old('street') }}" required>
                                    @if ($errors->has('street'))
                                        <span class="help-block text-danger">
                                            <strong>{{ $errors->first('street') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('building') ? ' has-error' : '' }} col-md-6">
                                    <label for="building">Building</label>
                                    <input id="building" type="text" class="form-control" name="building" value="{{ old('building') }}">
                                    @if ($errors->has('building'))
                                        <span class="help-block text-danger">
                                            <strong>{{ $errors->first('building') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('subdivision') ? ' has-error' : '' }} col-md-6">
                                    <label for="subdivision">Subdivision/Apartment/Village <span class="required-marker">*</span></label>
                                    <input id="subdivision" type="text" class="form-control" name="subdivision" value="{{ old('subdivision') }}" required>
                                    @if ($errors->has('building'))
                                        <span class="help-block text-danger">
                                            <strong>{{ $errors->first('building') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-row mt-2 mb-2">

                                <div class="form-group{{ $errors->has('barangay') ? ' has-error' : '' }} col-md-6">
                                    <label for="barangay">Barangay <span class="required-marker">*</span></label>
                                    <input id="barangay" type="text" class="form-control" name="barangay" value="{{ old('barangay') }}" required>
                                    @if ($errors->has('barangay'))
                                        <span class="help-block text-danger">
                                            <strong>{{ $errors->first('barangay') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }} col-md-6">
                                    <label for="city">City <span class="required-marker">*</span></label>
                                    <input id="city" type="text" class="form-control" name="city" value="{{ old('city') }}" required>
                                    @if ($errors->has('city'))
                                        <span class="help-block text-danger">
                                            <strong>{{ $errors->first('city') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('province') ? ' has-error' : '' }} col-md-6">
                                    <label for="province">Province <span class="required-marker">*</span></label>
                                    <input id="province" type="text" class="form-control" name="province" value="{{ old('province') }}" required>
                                    @if ($errors->has('province'))
                                        <span class="help-block text-danger">
                                            <strong>{{ $errors->first('province') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('zip') ? ' has-error' : '' }} col-md-6">
                                    <label for="zip">Zip Code <span class="required-marker">*</span></label>
                                    <input id="zip" type="text" class="form-control" name="zip" value="{{ old('zip') }}" required>
                                    @if ($errors->has('zip'))
                                        <span class="help-block text-danger">
                                            <strong>{{ $errors->first('zip') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <hr />

                            <div class="form-group{{ $errors->has('company_name') ? ' has-error' : '' }} mt-2 mb-2">
                                <label for="company_name">Company Name</label>
                                <input id="company_name" type="text" class="form-control" name="company_name" value="{{ old('company_name') }}">
                                @if ($errors->has('company_name'))
                                    <span class="help-block text-danger">
                                        <strong>{{ $errors->first('company_name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('landmarks') ? ' has-error' : '' }} mt-2 mb-2">
                                <label for="landmarks">Landmarks</label>
                                <textarea name="landmarks" id="landmarks" class="form-control" required>{{ old('landmarks') }}</textarea>
                                @if ($errors->has('landmarks'))
                                    <span class="help-block text-danger">
                                        <strong>{{ $errors->first('landmarks') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('authorized_recipient') ? ' has-error' : '' }} mt-2 mb-2">
                                <label for="authorized_recipient">Receiver <span class="required-marker">*</span></label>
                                <input id="authorized_recipient" type="text" class="form-control" name="authorized_recipient" value="{{ old('authorized_recipient')}}" required>
                                @if ($errors->has('authorized_recipient'))
                                    <span class="help-block text-danger">
                                        <strong>{{ $errors->first('authorized_recipient') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="text-center mt-4 mb-5 w-100">
                                <button type="button" class="btn cBtn rounded-0 shopping-continue">CONTINUE</button>
                            </div>
                        </div>

                        <div class="payment" style="display: none   ;">
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <div class="form-group{{ $errors->has('payment_method') ? ' has-error' : '' }}">
                                        <label for="payment_method">Payment Method <span class="required-marker">*</span></label>
                                        <select name="payment_method" id="payment_method" class="form-control" required>
                                            <option value="">-Any-</option>
                                            <option value="cod">Cash on Delivery</option>
                                            <option value="bank_deposit">Bank Deposit</option>
                                            <option value="cc">Credit Card</option>
                                        </select>
                                        @if ($errors->has('payment_method'))
                                            <span class="help-block text-danger">
                                                <strong>{{ $errors->first('payment_method') }}</strong>
                                            </span>
                                        @endif
                                        {{--<div class="font-italic note">*Cash on Delivery - Soon</div>--}}
                                    </div>

                                    <hr>

                                    <div class="bank-deposit-info" style="display: none;">
                                        <p>Choose which bank you prefer.</p>
                                        <div id="accordion" role="tablist">
                                            <div class="card">
                                                <a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    <div class="card-header" role="tab" id="headingOne">
                                                        <h6 class="mb-0">Banco de Oro (BDO)</h6>
                                                    </div>
                                                </a>

                                                <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                                                    <div class="card-body">
                                                        <div>Bank Name: Banco de Oro</div>
                                                        <div>Account Name: Test BDO </div>
                                                        <div>Account Number: 1234567891234567</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                    <div class="card-header" role="tab" id="headingTwo">
                                                        <h6 class="mb-0">Bank of the Philippine Islands (BPI)</h6>
                                                    </div>
                                                </a>

                                                <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
                                                    <div class="card-body">
                                                        <div>Bank Name: Bank of the Philippine Islands</div>
                                                        <div>Account Name: Test BDO </div>
                                                        <div>Account Number: 1234567891234567</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <a class="collapsed " data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                    <div class="card-header" role="tab" id="headingThree">
                                                        <h6 class="mb-0">Metropolitan Bank and Trust Company (Metrobank)</h6>
                                                    </div>
                                                </a>
                                                <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
                                                    <div class="card-body">
                                                        <div>Bank Name: Metropolitan Bank and Trust Company</div>
                                                        <div>Account Name: Test BDO </div>
                                                        <div>Account Number: 1234567891234567</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cc-info" style="display: none;">
                                        <div class="form-group{{ $errors->has('cc_type') ? ' has-error' : '' }}">
                                            <label for="cc_type">Credit Card Type <span class="required-marker">*</span></label>
                                            <select name="cc_type" id="cc_type" class="form-control">
                                                <option value="">-Any-</option>
                                                <option value="visa">Visa</option>
                                                <option value="mastercard">Mastercard</option>
                                            </select>
                                            @if ($errors->has('cc_type'))
                                                <span class="help-block text-danger">
                                                    <strong>{{ $errors->first('cc_type') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group{{ $errors->has('cc_number') ? ' has-error' : '' }}">
                                            <label for="cc_number">Credit Card Number <span class="required-marker">*</span></label>
                                            <input id="cc_number" type="text" class="form-control" name="cc_number" value="{{ old('cc_number') }}">
                                            @if ($errors->has('cc_number'))
                                                <span class="help-block text-danger">
                                                <strong>{{ $errors->first('cc_number') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                        <div class="form-group{{ $errors->has('cc_expiry') ? ' has-error' : '' }}">
                                            <label for="cc_expiry">Credit Card Expiry <span class="required-marker">*</span></label>
                                            <input id="cc_expiry" type="text" class="form-control" name="cc_expiry" maxlength="5" placeholder="01/20" value="{{ old('cc_expiry') }}">
                                            @if ($errors->has('cc_expiry'))
                                                <span class="help-block text-danger">
                                                <strong>{{ $errors->first('cc_expiry') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <table class="table table-borderless">
                                        <thead>
                                        <tr>
                                            <th>Item</th>
                                            <th class="text-right">Qty.</th>
                                            <th class="text-center">Amount</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach( $carts as $items )
                                            <tr class="border-bottom">
                                                <td>
                                                    <div class="title font-weight-bold">{{ $items->products->title }}</div>
                                                    <div class="price">P {{ number_format($items->products->price, 2) }}</div>
                                                </td>
                                                <td class="text-right">{{ $items->quantity }}</td>
                                                <td class="text-right">P {{ number_format($items->price, 2) }}</td>
                                            </tr>
                                        @endforeach
                                            <tr class="text-right">
                                                <td colspan="2" class="font-weight-bold">Subtotal</td>
                                                <td>P {{ number_format($carts->sum('price'), 2) }}</td>
                                            </tr>
                                            <tr class="text-right">
                                                <td colspan="2" class="font-weight-bold">Delivery Fee</td>
                                                <td>P 150.00</td>
                                            </tr>
                                            <tr class="text-right payment_total">
                                                <td colspan="2" class="font-weight-bold">Total Amount</td>
                                                <td>P {{ number_format($carts->sum('price') + 150, 2) }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <input type="hidden" id="status" name="status" value="Pending">
                            <input type="hidden" id="users_id" name="users_id" value="{{ $items->users_id }}">
                            <input type="hidden" id="subtotal" name="subtotal" value="{{ $carts->sum('price') }}">
                            <input type="hidden" id="delivery_fee" name="delivery_fee" value="150">
                            <input type="hidden" id="total_amount" name="total_amount" value="{{ $carts->sum('price') + 150 }}">


                            <div class="text-center mt-4 mb-5 w-100">
                                <button type="submit" class="btn cBtn rounded-0 cart-final-btn">SUBMIT</button>
                            </div>
                        </div>
                    </form>
                @else
                    <div class="row mt-4">
                        <p>No item yet.</p>
                    </div>

                    <div class="text-center mb-5">
                        <button type="button" class="btn cBtn-dark rounded-0" data-dismiss="modal">CONTINUE SHOPPING</button>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>