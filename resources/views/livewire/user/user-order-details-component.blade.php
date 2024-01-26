<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12" style="padding-bottom: 30px">
                @if (Session::has('order_message'))
                    <div class="alert alert-success" role="alert">{{ Session::get('order_message') }}</div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                Order Details
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('user.orders') }}" class="btn btn-success float-end">My Orders</a>
                                @if ($order->status == 'ordered')
                                    <a href="#" wire:click.prevent="cancelOrder" style="margin-right:20px;"
                                        class="btn btn-warning float-end">Cancel Order</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Order Date</th>
                                    <th>Status</th>
                                    <th>Delivery Date</th>
                                    <th>Canceled Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->created_at }}</td>
                                    <td>{{ $order->status }}</td>
                                    @if ($order->status == 'delivered')
                                        <th>Delivery Date</th>
                                        <td>{{ $order->delivered_date }}</td>
                                    @elseif($order->status == 'canceled')
                                        <th>Canceled Date</th>
                                        <td>{{ $order->canceled_date }}</td>
                                    @endif
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Ordered Items
                    </div>
                    <div class="card-body">
                        <div class="wrap-iten-in-cart">
                            <ul class="products-cart">
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
                        <div class="border p-md-4 p-20 border-radius cart-totals">
                            <div class="heading_s1 mb-3">
                                <h4>Order Summary</h4>
                            </div>
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
    </div>
