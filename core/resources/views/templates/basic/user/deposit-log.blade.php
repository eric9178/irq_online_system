@extends(activeTemplate().'layouts.user')
@section('title','')
@section('content')


    <!--Dashboard area-->
    <section class="section-padding gray-bg blog-area">
        <div class="container">
            <div class="row">

                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="dashboard-content">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <div class="dashboard-inner-content">
                                    <div class="card">
                                        <h5 class="card-header">{{__($page_title)}}</h5>
                                        <div class="card-body">


                                            <div class="table-responsive table-responsive-xl table-responsive-lg table-responsive-md table-responsive-sm">
                                                <table class="table table-striped">
                                                    <thead class="thead-dark">
                                                    <tr>
                                                        <th scope="col">@lang('Transaction ID')</th>
                                                        <th scope="col">@lang('Gateway')</th>
                                                        <th scope="col">@lang('Amount')</th>
                                                        <th scope="col">@lang('Time')</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @if(count($deposits) >0)
                                                        @foreach($deposits as $k=>$data)
                                                            <tr>
                                                                <td data-label="#@lang('Trx')">{{$data->trx}}</td>
                                                                <td data-label="@lang('Gateway')">{{ $data->gateway->name   }}</td>
                                                                <td data-label="@lang('Amount')">
                                                                    <strong>{{formatter_money($data->amount)}} {{$data->currency->code}}</strong>
                                                                </td>
                                                                <td data-label="@lang('Time')">
                                                                    <i class="fa fa-calendar"></i> {{date(' d M, Y ', strtotime($data->created_at))}}
                                                                    <i class="fa fa-clock-o pl-1"></i> {{date('h:i A', strtotime($data->created_at))}}
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        <tr>
                                                            <td colspan="4"> @lang('No results found')!</td>
                                                        </tr>
                                                    @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                {{$deposits->links('partials.pagination')}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/Dashboard area-->


@endsection
