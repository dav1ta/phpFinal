@extends("layout.layout")
@extends("nav.nav",['count' => $p_count])

@section("content")





    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Laravelheiser</h1>
            <p class="lead text-muted mb-0">ყურსასმენების ფართო არჩევანი</p>

            @can('has_access')


                <a href="/faker" type="submit" class="btn btn-info">შეავსე ფეიკ პროდუქტებით</a>

            @endcan
        </div>
    </section>
    <div class="container">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">მთავარი</a></li>
                        <li class="breadcrumb-item"><a href="/">ყურსასმენები</a></li>
                        <li class="breadcrumb-item active" aria-current="page">პროდუქცია</li>
                        <li class="breadcrumb-item active" aria-current="page"> </li>
                        <li>
                            @can('has_access')


                                <a href="/products/create" type="submit" class="btn btn-info"> დამატება</a>

                            @endcan
                        </li>
                    </ol>


                </nav>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-3">
                <div class="card bg-light mb-3">
                    <div class="card-header bg-primary text-white text-uppercase"><i class="fa fa-list"></i> კატეგორიები</div>
                    <ul class="list-group category_block">
                        <li class="list-group-item"><a href="/?wireless=1">კაბელიანი ყურსასმენები</a></li>
                        <li class="list-group-item"><a href="/?wired=1">უკაბელო ყურსასმენები</a></li>


                    </ul>
                </div>

            </div>
            <div class="col">
                <div class="row">
                    @foreach ($products as $product)
                    <div class="col-12 col-md-6 col-lg-4">

                        <div class="card">

                            <img class="card-img-top" src="{{$product->photo_url}}" alt="Card image cap">
                            <div class="card-body">
                                <h4 class="card-title"><a title="View Product">{{ $product->name }}</a></h4>
                                <p class="card-text">{{$product->description }}</p>
                                <div class="row">
                                    <div class="col">
                                        <p class="btn btn-info btn-block">{{$product->price}} ლ</p>
                                    </div>
                                    <div class="col">
                                        <a href="{{route('cart.add', $product->id)}}" class="btn btn-success btn-block" style="font-size: 10px">კალათაში დამატება</a>

                                    </div>
                                    @can('has_access')
                                        <form method="post" action="{{route('product.delete', $product->id)}}">
                                            @csrf
                                            @method("DELETE")
                                            <button class="btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                                        </form>
                                    @endcan

                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach


                    <div class="col-12">
                        <nav aria-label="...">
                            {{ $products->links() }}
                        </nav>
                    </div>
                </div>
            </div>

        </div>
    </div>



@endsection
