@extends("layout.layout")
@extends("nav.nav")
@section("content")
    <div class="container">
        <div class="row">
            <section>
                <div class="wizard">
                    <div class="wizard-inner">
                        <!-- <div class="connecting-line"></div> -->
                        <ul class="nav  breadcrumb_checkout" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                                    <h3>Shipping</h3>
                                </a>
                            </li>
                            <li role="presentation" class="">
                                <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
                                    <h3>Payment</h3>
                                </a>
                            </li>
                            <li role="presentation" class="disabled">
                                <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3">
                                    <h3>Invoice</h3>
                                </a>
                            </li>
                        </ul>
                    </div>

                        <div class="tab-content">
                            <div class="tab-pane active" role="tabpanel" id="step1">
                                <div class="step1">
                                    <!--  exiting customer end -->
                                    <div class="row" style="">
                                        <div class="checkout_details">
                                            <div class="col-sm-6 col-sm-offset-3">
                                                <dl class="dl-horizontal">
                                                    <dt>First Name:<span></span></dt>
                                                    <dd>{{$user->name}}</dd>
                                                </dl>

                                                <dl class="dl-horizontal">
                                                    <dt>Email:<span></span></dt>
                                                    <dd>{{$user->email}}</dd>
                                                </dl>
                                                <dl class="dl-horizontal">
                                                    <dt>Address:<span></span></dt>
                                                    <dd>{{$user->address}}</dd>
                                                </dl>
                                                <dl class="dl-horizontal">
                                                    <dt>Total:<span></span></dt>
                                                    <dd>{{$total}}ლ</dd>
                                                </dl>
                                                <dl class="dl-horizontal">
                                                    <dt>Products:<span></span></dt>
                                                    <dd>{{$names}}</dd>
                                                </dl>
                                                <dl class="dl-horizontal">
                                                    <dt>Balance:<span></span></dt>
                                                    <dd>{{$user->cash}}ლ</dd>
                                                </dl>

                                                <form method="post" action="{{route('buy')}}">
                                                    @csrf

                                                    <button type="submit" class="btn btn-primary">ყიდვა</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- exiting customer end-->
                                    <!-- new customer start -->

                          <!-- step 2 end -->

                            <div class="tab-pane" role="tabpanel" id="complete">
                                <div class="step44">
                                    <h5>invoice</h5>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                </div>

        </div>
    </div>
@endsection
