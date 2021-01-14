@extends("layout.layout")
@extends('nav.nav')
@section("content")
    <div class="container mt-4">
        <div class="row">

            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">პროდუქტები</th>
                    <th scope="col">მისამართი</th>
                    <th scope="col">ფასი</th>
                    <th scope="col">თარიღი</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)

                    <tr>
                    <th scope="row">{{$order->id}}</th>
                    <td>{{$order->product_names}}</td>
                    <td>{{$order->address}}</td>
                    <td>{{$order->total}}ლ</td>
                        <td>{{$order->created_at}}</td>
                </tr>
                @endforeach

                </tbody>
            </table>


        </div>
    </div>
@endsection
