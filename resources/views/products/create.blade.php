@extends("layout.layout")
@section("content")
    <div style="display: flex;align-items: center;justify-content: center;flex-direction: column">
    <div class="col-md-6 col-xl-6" >
    <form  method="post" enctype="multipart/form-data" action="{{route('products.save')}}">

        <div class="box-body">
            <div class="form-group">
                <label for="exampleInputEmail1">პროდუქტის სახელი</label>
                <input type="name" class="form-control"  placeholder="Name" name="name">
                @if($errors->has("name"))
                    <p>{{$errors->first("name")}}</p>
                @endif
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">პროდუქტის მოკლე აღწერა</label>
                <input type="name" class="form-control"  placeholder="Name" name="description">
                @if($errors->has("description"))
                    <p>{{$errors->first("description")}}</p>
                @endif
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">ფოტოს Url</label>
                <input type="name" class="form-control"  placeholder="Name" name="photo_url">
                @if($errors->has("photo_url"))
                    <p>{{$errors->first("photo_url")}}</p>
                @endif
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">უკაბელო</label>
                <input type="checkbox" class="form-control"  name="wireless">

            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">ფასი</label>
                <input type="name" class="form-control"  placeholder="price" name="price">
                @if($errors->has("price"))
                    <p>{{$errors->first("price")}}</p>
                @endif
            </div>

{{--            <div class="form-group">--}}
{{--                <label for="exampleFormControlSelect2">Example multiple select</label>--}}
{{--                <select name="tags[]" multiple class="form-control" id="exampleFormControlSelect2">--}}
{{--                    @foreach($tags as $tag)--}}
{{--                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>--}}
{{--                    @endforeach--}}
{{--                </select>--}}


{{--            </div>--}}
        </div>
        <input type="hidden" name="_token"  id='csrf_toKen' value="{{ csrf_toKen() }}">
        <div class="box-footer">
            <button type="submit" class="btn btn-primary">დამატება</button>
        </div>
    </form>
    </div>
    </div>
@endsection
