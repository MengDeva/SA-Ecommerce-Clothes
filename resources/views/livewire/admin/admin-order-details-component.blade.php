<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12" style="padding-bottom: 30px">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                Order Details
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.orders') }}" class="btn btn-success float-end">All Orders</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>Order Id</th>
                                <td>{{ $order->id }}</td>
                                <th>Order Date</th>
                                <td>{{ $order->created_at }}</td>
                                <th>Status</th>
                                <td>{{ $order->status }}</td>
                                @if ($order->status == 'delivered')
                                    <th>Delivery Date</th>
                                    <td>{{ $order->delivered_date }}</td>
                                @elseif($order->status == 'canceled')
                                    <th>Cancellation Date</th>
                                    <td>{{ $order->canceled_date }}</td>
                                @endif
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12" style="padding-bottom: 30px">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                Ordered Items
                            </div>
                            <div class="col-md-6">

                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="border p-md-3 p-10 border-radius cart-totals">
                            <div class="wrap-iten-in-cart">
                                <ul class="products-cart">
                                    {{-- @foreach ($order->orderItems as $item)
                                        <li class="pr-cart-item">
                                            <div class="product-image">
                                                <figure><img
                                                        src="{{ asset('assets/imgs/products') }}/{{ $item->product->image }}"
                                                        alt="{{ $item->product->name }}" width="150"></figure>
                                            </div>
                                            <div class="product-name">
                                                <h4 class="box-title">Product Name</h4>
                                                <a class="link-to-product"
                                                    href="{{ route('product.details', ['slug' => $item->product->slug]) }}">{{ $item->product->name }}</a>
                                            </div>
                                            <div class="price-field produtc-price">
                                                <h4 class="box-title">Price</h4>
                                                <p class="price">${{ $item->price }}</p>
                                            </div>
                                            <div class="quantity">
                                                <h4 class="box-title">Quantity</h4>
                                                <p>{{ $item->quantity }}</p>
                                            </div>
                                            <div class="price-field sub-total">
                                                <h4 class="box-title">SubTotal</h4>
                                                <p class="price">${{ $item->price * $item->quantity }}</p>
                                            </div>
                                        </li> --}}
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <td width="20%">Product Image</td>
                                                    <td>Product Name</td>
                                                    <td>Price</td>
                                                    <td>Quantity</td>
                                                    <td>SubTotal</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($order->orderItems as $item)
                                                    <tr>
                                                        <td><img src="{{ asset('assets/imgs/products') }}/{{ $item->product->image }}"
                                                                alt="{{ $item->product->name }}" width="70"></td>
                                                        <td><a class="link-to-product"
                                                                href="{{ route('product.details', ['slug' => $item->product->slug]) }}">{{ $item->product->name }}</a>
                                                        </td>
                                                        <td>
                                                            <p class="price">$ {{ $item->price }}</p>
                                                        </td>
                                                        <td>
                                                            <p>{{ $item->quantity }}</p>
                                                        </td>
                                                        <td>
                                                            <p class="price">${{ $item->price * $item->quantity }}</p>
                                                        </td>
                                                    </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="heading_s1 mb-3">
                                <h4>Order Summary</h4>
                            </div>
                            <hr>
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td class="cart_total_label">Subtotal</td>
                                            <td class="cart_total_amount"><span
                                                    class="font-lg fw-900 text-brand">${{ $order->subtotal }}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="cart_total_label">Subtotal</td>
                                            <td class="cart_total_amount"><span
                                                    class="font-lg fw-900 text-brand">${{ $order->tax }}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="cart_total_label">Shipping</td>
                                            <td class="cart_total_amount"><i class="ti-gift mr-5"></i> Free
                                                Shipping</td>
                                        </tr>
                                        <tr>
                                            <td class="cart_total_label">Total</td>
                                            <td class="cart_total_amount"><strong><span
                                                        class="font-xl fw-900 text-brand">${{ $order->total }}</span></strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12" style="padding-bottom: 30px">
                <div class="card">
                    <div class="card-header">
                        Billing Details
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>First Name</th>
                                <td>{{ $order->firstname }}</td>
                                <th>Last Name</th>
                                <td>{{ $order->lastname }}</td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td>{{ $order->mobile }}</td>
                                <th>Email</th>
                                <td>{{ $order->email }}</td>
                            </tr>
                            <tr>
                                <th>Line1</th>
                                <td>{{ $order->line1 }}</td>
                                <th>Line2</th>
                                <td>{{ $order->line2 }}</td>
                            </tr>
                            <tr>
                                <th>City</th>
                                <td>{{ $order->city }}</td>
                                <th>Province</th>
                                <td>{{ $order->province }}</td>
                            </tr>
                            <tr>
                                <th>Country</th>
                                <td>{{ $order->country }}</td>
                                <th>Zipcode</th>
                                <td>{{ $order->zipcode }}</td>
                            </tr>
                        </table>

                    </div>
                </div>
            </div>
        </div>

        @if ($order->is_shipping_different)
            <div class="row">
                <div class="col-md-12" style="padding-bottom: 30px">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Shipping Details
                        </div>
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <th>First Name</th>
                                    <td>{{ $order->shipping->firstname }}</td>
                                    <th>Last Name</th>
                                    <td>{{ $order->shipping->lastname }}</td>
                                </tr>
                                <tr>
                                    <th>Phone</th>
                                    <td>{{ $order->shipping->mobile }}</td>
                                    <th>Email</th>
                                    <td>{{ $order->shipping->email }}</td>
                                </tr>
                                <tr>
                                    <th>Line1</th>
                                    <td>{{ $order->shipping->line1 }}</td>
                                    <th>Line2</th>
                                    <td>{{ $order->shipping->line2 }}</td>
                                </tr>
                                <tr>
                                    <th>City</th>
                                    <td>{{ $order->shipping->city }}</td>
                                    <th>Province</th>
                                    <td>{{ $order->shipping->province }}</td>
                                </tr>
                                <tr>
                                    <th>Country</th>
                                    <td>{{ $order->shipping->country }}</td>
                                    <th>Zipcode</th>
                                    <td>{{ $order->shipping->zipcode }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        {{-- <div class=\"row\">
            <div class=\"col-md-12\">
                <div class=\"panel panel-default\">
                    <div class=\"panel-heading\">
                        Transaction
                    </div>
                    <div class=\"panel-body\">
                        <table class=\"table\">
                            <tr>
                                <th>Transaction Mode</th>
                                <td>{{ $order->transaction->mode }}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>{{ $order->transaction->status }}</td>
                            </tr>
                            <tr>
                                <th>Transaction Date</th>
                                <td>{{ $order->transaction->created_at }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
</div>
