@extends("layout.layout")
@section("content")




    <div class="login-form">
        <form method="post" action="{{route('auth')}}">
            @csrf
            <h2 class="text-center">Log in</h2>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Username" name="name"  required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Password" name="password" required="required">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">შესვლა</button>
            </div>
        </form>
        <p class="text-center"><a href="/register">რეგისტრაცია</a></p>
    </div>


@endsection
