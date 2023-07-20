<div>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow">Home</a>
                    <span></span> Shop
                    <span></span> Your Cart
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table shopping-summery text-center clean">
                                <thead>
                                    <tr class="main-heading">
                                        <th scope="col">Image</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Subtotal</th>
                                        <th scope="col">Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (Session::has('success_message'))
                                        <div class="alert alert-success">
                                            <strong>Success | {{ Session::get('success_message') }}</strong>
                                        </div>
                                    @endif
                                    @if (Cart::instance('cart')->count() > 0)
                                        @foreach (Cart::instance('cart')->content() as $item)
                                            <tr>
                                                <td class="image product-thumbnail"><img
                                                        src="{{ asset('assets/imgs/products') }}/{{ $item->model->image }}"
                                                        alt="{{ $item->name }}"></td>
                                                <td class="product-des product-name">
                                                    <h5 class="product-name"><a
                                                            href="product-details.html">{{ $item->model->name }}</a>
                                                    </h5>
                                                    {{--                                        <p class="font-xs">Maboriosam in a tonto nesciung eget<br> distingy magndapibus. --}}
                                                    {{--                                        </p> --}}
                                                </td>
                                                <td class="price" data-title="Price">
                                                    <span>${{ $item->model->regular_price }} </span>
                                                </td>
                                                <td class="text-center" data-title="Stock">
                                                    <div class="detail-qty border radius  m-auto">
                                                        <a href="#" class="qty-down"
                                                            wire:click.prevent="decreaseQuantity('{{ $item->rowId }}')"><i
                                                                class="fi-rs-angle-small-down"></i></a>
                                                        <span class="qty-val">{{ $item->qty }}</span>
                                                        <a href="#" class="qty-up"
                                                            wire:click.prevent="increaseQuantity('{{ $item->rowId }}')"><i
                                                                class="fi-rs-angle-small-up"></i></a>
                                                    </div>
                                                </td>
                                                <td class="text-right" data-title="Cart">
                                                    <span>${{ $item->subtotal }} </span>
                                                </td>
                                                <td class="action" data-title="Remove"><a href="#"
                                                        class="text-muted"
                                                        wire:click.prevent="destroy('{{ $item->rowId }}')"><i
                                                            class="fi-rs-trash"></i></a></td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <p>No Item in cart</p>
                                    @endif
                                    <tr>
                                        <td colspan="6" class="text-end">
                                            <a href="#" class="text-muted" wire:click.prevent="clearAll()"> <i
                                                    class="fi-rs-cross-small"></i> Clear Cart</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="cart-action text-end mt-30 mb-30">
                            <a class="btn  mr-10 mb-sm-15"><i class="fi-rs-shuffle mr-10"></i>Update Cart</a>
                            <a class="btn "><i class="fi-rs-shopping-bag mr-10"></i>Continue Shopping</a>
                        </div>
                        <div class="row mb-50">
                            <div class="col-lg-6 col-md-12">
                                <div class="heading_s1 mb-3">
                                    <h4>Calculate Shipping</h4>
                                </div>
                                <p class="mt-15 mb-30">Flat rate: <span class="font-xl text-brand fw-900">5%</span></p>
                                <div class="mb-30 mt-50">
                                    <div class="heading_s1 mb-3">
                                        <h4>Apply Coupon</h4>
                                    </div>
                                    <div class="total-amount">
                                        <div class="left">
                                            <div class="coupon">
                                                <form action="#" target="_blank">
                                                    <div class="form-row row justify-content-center">
                                                        <div class="form-group col-lg-6">
                                                            <input class="font-medium" name="Coupon"
                                                                placeholder="Enter Your Coupon">
                                                        </div>
                                                        <div class="form-group col-lg-6">
                                                            <button class="btn  btn-sm"><i
                                                                    class="fi-rs-label mr-10"></i>Apply</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="border p-md-4 p-30 border-radius cart-totals">
                                    <div class="heading_s1 mb-3">
                                        <h4>Cart Totals</h4>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td class="cart_total_label">Cart Subtotal</td>
                                                    <td class="cart_total_amount"><span
                                                            class="font-lg fw-900 text-brand">${{ Cart::subtotal() }}</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="cart_total_label">Tax Subtotal</td>
                                                    <td class="cart_total_amount"><span
                                                            class="font-lg fw-900 text-brand">${{ Cart::tax() }}</span>
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
                                                                class="font-xl fw-900 text-brand">${{ Cart::total() }}</span></strong>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    {{--                                    <a href="checkout.html" class="btn "> <i class="fi-rs-box-alt mr-10"></i> Proceed To CheckOut</a> --}}
                                    <a class="btn btn-checkout" href="#" wire:click.prevent="checkout">Check
                                        out</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
