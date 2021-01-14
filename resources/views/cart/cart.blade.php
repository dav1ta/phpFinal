
@extends("layout.layout")
@extends("nav.nav",['count' => $p_count])
@section("content")
    <div class="container mb-4">
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col"> </th>
                            <th scope="col">Product</th>
                            <th scope="col">Description</th>

                            <th scope="col" class="text-right">Price</th>
                            <th> </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <td><img src="{{$product->photo_url}}" width="60px" height="60" /> </td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->description}}</td>
                            <td class="text-right">{{$product->price}} ლ</td>
                            <td class="text-right"><a href="{{ route('cart.delete', $product->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </a> </td>
                        </tr>
                        @endforeach

                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>

                            <td>Sub-Total</td>
                            <td class="text-right">{{$sub_total}} ლ</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>

                            <td>Shipping</td>
                            <td class="text-right">5 ლ</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>

                            <td><strong>Total</strong></td>
                            <td class="text-right"><strong>{{$total}} ლ</strong></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col mb-2">
                <div class="row">
                    <div class="col-sm-12  col-md-6">
                        <a href="/" class="btn btn-block btn-light">Continue Shopping</a>
                    </div>
                    <div class="col-sm-12 col-md-6 text-right">
                        <a href="{{ route('checkout') }}" class="btn btn-lg btn-block btn-success text-uppercase">Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
