@extends('layouts.app')

@section('content')
    <div class="page-title w-100 d-block">
        <div class="container">
            <h3>PRODUCTS</h3>
        </div>
    </div>

    <div class="container main mt-5">

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p class="m-0">{{ $message }}</p>
            </div>
        @endif

        <div class="row">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs w-100 text-center" id="transactionTab" role="tablist">
                <li class="nav-item w-50">
                    <a class="nav-link active rounded-0" id="track-orders-tab" data-toggle="tab" href="#track-orders" role="tab" aria-controls="track-orders" aria-selected="true">TRACK ORDERS</a>
                </li>
                <li class="nav-item w-50">
                    <a class="nav-link rounded-0" id="completed-tab" data-toggle="tab" href="#completed" role="tab" aria-controls="completed" aria-selected="false">COMPLETED</a>
                </li>
            </ul>
        </div>

        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane active" id="track-orders" role="tabpanel" aria-labelledby="track-orders-tab">
                @if( $transactions->count() != 0 )
                    @foreach($transactions as $transaction)
                        <div class="row">
                            <div class="col-md-6">
                                <div><span class="font-weight-bold">INVOICE NUMBER :</span> #{{ $transaction->id }}</div>

                                @if( $transaction->payment_method == 'bank_deposit' )
                                    <div><span class="font-weight-bold">MODE OF PAYMENT :</span> Bank Deposit</div>
                                @elseif( $transaction->payment_method == 'cc' )
                                    <div><span class="font-weight-bold">MODE OF PAYMENT :</span> Credit Card</div>
                                @else
                                    <div><span class="font-weight-bold">MODE OF PAYMENT :</span> Cash on Delivery</div>
                                @endif

                                <div><span class="font-weight-bold">STATUS :</span> {{ $transaction->status }}</div>
                                <div class="amount"><span class="font-weight-bold">AMOUNT :</span> P {{ number_format($transaction->total_amount, 2) }}</div>
                            </div>

                            <div class="col-md-6 text-center">
                                <div class="wrapper">
                                    @if( Auth::user()->role_id === 3 )
                                    <button type="button" class="btn cBtn rounded-0"  data-toggle="modal" data-target="#approveOption-{{ $transaction->id }}">APPROVE PAYMENT OPTION</button>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <hr>

                        {{-- modal --}}
                        <div class="modal fade" id="approveOption-{{ $transaction->id }}" tabindex="-1" role="dialog" aria-labelledby="approveOptionLabel-{{ $transaction->id }}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="approveOptionLabel-{{ $transaction->id }}">APPROVE PAYMENT</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form class="form-horizontal" method="POST" action="{{ url('/transaction/'.$transaction->id) }}" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <input name="_method" type="hidden" value="PATCH">
                                        <div class="modal-body">
                                            <div class="form-row mr-0 ml-0">
                                                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }} w-100">
                                                    <label for="status" class="font-weight-bold">Status</label>
                                                    <select name="status" id="status" class="form-control" required>
                                                        <option value="">-Any-</option>
                                                        <option value="Pending" {{ ($transaction->status == 'Pending') ? 'selected' : '' }}>Pending</option>
                                                        <option value="For Shipping" {{ ($transaction->status == 'For Shipping') ? 'selected' : '' }}>For Shipping</option>
                                                        <option value="Completed" {{ ($transaction->status == 'Completed') ? 'selected' : '' }}>Completed</option>
                                                        <option value="Cancelled" {{ ($transaction->status == 'Cancelled') ? 'selected' : '' }}>Cancelled</option>
                                                    </select>
                                                    @if ($errors->has('status'))
                                                        <span class="help-block text-danger">
                                                            <strong>{{ $errors->first('status') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <button type="submit" class="btn cBtn rounded-0 w-100 modal-review-submit">SUBMIT</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="text-center">
                        <p>No items yet.</p>
                    </div>
                @endif
            </div>

            <div class="tab-pane" id="completed" role="tabpanel" aria-labelledby="completed-tab">
                @if( $completed->count() != 0 )
                    @foreach($completed as $transaction)
                            <div class="row">
                                <div class="pl-5">
                                    <div><span class="font-weight-bold">INVOICE NUMBER :</span> #{{ $transaction->id }}</div>

                                    @if( $transaction->payment_method == 'bank_deposit' )
                                        <div><span class="font-weight-bold">MODE OF PAYMENT :</span> Bank Deposit</div>
                                    @elseif( $transaction->payment_method == 'cc' )
                                        <div><span class="font-weight-bold">MODE OF PAYMENT :</span> Credit Card</div>
                                    @else
                                        <div><span class="font-weight-bold">MODE OF PAYMENT :</span> Cash on Delivery</div>
                                    @endif

                                    <div><span class="font-weight-bold">STATUS :</span> {{ $transaction->status }}</div>
                                    <div class="amount"><span class="font-weight-bold">AMOUNT :</span> P {{ number_format($transaction->total_amount, 2) }}</div>
                                </div>
                            </div>
                            <hr>
                    @endforeach
                @else
                    <div class="text-center">
                        <p>No items yet.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
