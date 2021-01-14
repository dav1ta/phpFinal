
@section('nav')
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/">Laravelheiser</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarsExampleDefault">
                <ul class="navbar-nav m-auto">
                    <li class="nav-item">
                        <a class="nav-link " href="/products">მაღაზია</a>
                    </li>

                    @if (Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="/orders">ჩემი შეკვეთები</a>
                    </li>
                        @endif
                    <li class="nav-item">
                        <a class="nav-link" href="/about">ჩვენს შესახებ</a>
                    </li>

                </ul>

                <form method="get" action="{{route('index')}}" class="form-inline my-2 my-lg-0">
                    <div class="input-group input-group-sm">
                        <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="ძიება..." name="search">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-secondary btn-number">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                    <a class="btn btn-success btn-sm ml-3" href="/cart">
                        <i class="fa fa-shopping-cart"></i> კალათა
                        <span class="badge badge-light">{{$count ?? "0"}}</span>
                    </a>


                </form>





            </div>
        </div>
        @if (Auth::check())

            <ul class="navbar-nav m-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="/products">ბალანსი:{{Auth::user()->cash}}ლ</a>
                </li>
                <li class="nav-item">
                    <b class="nav-link" >{{Auth::user()->name}}</b>
                </li>
                <li>
                    <form method="post" action="{{route('logout')}}">
                        @csrf

                        <button type="submit" class="btn btn-primary">logout</button>
                    </form>
                </li>

            </ul>
        @else
            <a class="btn btn-success btn-sm ml-3" href="/login">
                <i class="fa fa-shopping-cart"></i> ავტორიზაცია

            </a>
        @endif

    </nav>
@endsection
