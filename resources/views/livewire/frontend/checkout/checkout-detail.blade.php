<div>
    <div class="py-3 py-md-4 checkout">
        <div class="container">
            <h4>Order</h4>
            <hr>
            @if ($this->totalProductAmount != '0')
            <div class="row">
                <div class="col-md-12 mb-4">
                    <div class="shadow bg-white p-3">
                        <h4 class="text-dangerous">
                            Total
                            <span class="float-end total">${{ $this->totalProductAmount }}</span>
                        </h4>
                        <hr>
                        <small>* Products will be delivered in just the blink of an eye.</small>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="shadow bg-white p-3">
                        <h4 class="text-dangerous">
                            Information
                        </h4>
                        <hr>

                        <form action="" method="POST">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="mb-1">Full Name</label>
                                    <input type="text" wire:model.defer="fullname" id="fullname" class="form-control"
                                    />
                                    @error('name')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="mb-1">Phone Number</label>
                                    <input type="number" wire:model.defer="phone" id="phone" class="form-control"
                                    />
                                    @error('phone')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="mb-1">Email Address</label>
                                    <input type="email" wire:model.defer="email" id="email" class="form-control"
                                    />
                                    @error('email')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="mb-1">Pin-code (Zip-code)</label>
                                    <input type="number" wire:model.defer="pincode" id="pincode" class="form-control"
                                    />
                                    @error('pincode')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="mb-1">Full Address</label>
                                    <textarea wire:model.defer="address" id="address" class="form-control" rows="2"></textarea>
                                    @error('address')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-3" wire:ignore>
                                    <label class="mb-3">Select Payment Mode: </label>
                                    <div class="d-md-flex align-items-start">
                                        <div class="nav col-md-3 flex-column nav-pills me-3" id="v-pills-tab"
                                            role="tablist" aria-orientation="vertical">
                                            <button wire:loading.attr="disabled" class="nav-link fw-bold active" id="cashOnDeliveryTab-tab"
                                                data-bs-toggle="pill" data-bs-target="#cashOnDeliveryTab" type="button"
                                                role="tab" aria-controls="cashOnDeliveryTab"
                                                aria-selected="true">COD</button>
                                            <button wire:loading.attr="disabled" class="nav-link fw-bold" id="onlinePayment-tab"
                                                data-bs-toggle="pill" data-bs-target="#onlinePayment" type="button"
                                                role="tab" aria-controls="onlinePayment"
                                                aria-selected="false">Online Payment</button>
                                        </div>
                                        <div class="tab-content col-md-9" id="v-pills-tabContent">
                                            <div class="tab-pane fade active show" id="cashOnDeliveryTab" role="tabpanel"
                                                aria-labelledby="cashOnDeliveryTab-tab" tabindex="0">
                                                <h6 class="text-primary">Cash on Delivery Method</h6>
                                                <hr />
                                                <button wire:loading.attr="disabled" type="button" wire:click="codOrder" class="btn btn-warning">
                                                    <span wire:loading.remove wire:target="codOrder">
                                                        Place Order
                                                    </span>
                                                    <span wire:loading wire:target="codOrder">
                                                        Placing Order...
                                                    </span>
                                                </button>
                                            </div>
                                            <div class="tab-pane fade" id="onlinePayment" role="tabpanel"
                                                aria-labelledby="onlinePayment-tab" tabindex="0">
                                                <h6 class="text-primary">Online Payment Method</h6>
                                                <hr />
                                                <div>
                                                    <div id="paypal-button-container"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @else
                <div class="card card-body shadow">
                    <h5 class="mx-auto">You have no items yet</h5>
                    <a href="{{ url('collections') }}" class ="btn btn-warning">Shop now</a>
                </div>
            @endif
        </div>
    </div>
</div>
@push('scripts')
    <script src="https://www.paypal.com/sdk/js?client-id=AZlvai4Xpk-XC0p634oAhxyYjC6ryQhSNeQEqKCEy2_XPfl6_cNjbOWmc6ZeMkzOZ_ALHGLL8hoptbe1&currency=USD"></script>
    </script>
    <script>
        paypal.Buttons({
            // onClick is called when the button is clicked
            onClick: function()  {
                // Show a validation error if the checkbox is not checked
                if (!document.getElementById('fullname').value
                    || !document.getElementById('phone').value
                    || !document.getElementById('email').value
                    || !document.getElementById('pincode').value
                    || !document.getElementById('address').value
                ) {
                    Livewire.emit('validationForAll');
                    return false;
                } else {
                    @this.set('fullname', document.getElementById('fullname').value)
                    @this.set('phone', document.getElementById('phone').value)
                    @this.set('email', document.getElementById('email').value)
                    @this.set('pincode', document.getElementById('pincode').value)
                    @this.set('address', document.getElementById('address').value)
                }
            },
          // Order is created on the server and the order id is returned
          createOrder(data, action) {
            return action.order.create({
                purchase_units: [{
                    amount: {
                        value: "0.01"//"{{ $this->totalProductAmount }}"
                    }
                }]
            });
          },
          // Finalize the transaction on the server after payer approval
          onApprove(data, actions) {
            return actions.order.capture().then(function(orderData) {
              // Successful capture! For dev/demo purposes:
              console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
              const transaction = orderData.purchase_units[0].payments.captures[0];
            if(transaction.status == "COMPLETED") {
                Livewire.emit('transactionEmit', transaction.id)
            }
                // alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
            });
          }
        }).render('#paypal-button-container');
      </script>
@endpush
