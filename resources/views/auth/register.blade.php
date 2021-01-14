@extends("layout.layout")
@section("content")




    <div class="login-form">
        <form method="post" action="{{route('adduser')}}">
            @csrf
            <h2 class="text-center">Log in</h2>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Username" name="name"  required="required">
            </div>
            @if($errors->has("name"))
                <p>{{$errors->first("name")}}</p>
            @endif
            <div class="form-group">
                <input type="email" class="form-control" placeholder="Email" name="email"  required="required">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Address" name="address" required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Password" name="password" required="required">
            </div>
            @if($errors->has("password"))
                <p>{{$errors->first("password")}}</p>
            @endif
            <div class="form-group">
                <span>Admin</span>
                <input type="checkbox" class="form-control" placeholder="Admin Role" name="is_admin" >
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">რეგისტრაცია</button>
            </div>
        </form>
        <p class="text-center"><a href="/login">შესვლა</a></p>
    </div>


@endsection
