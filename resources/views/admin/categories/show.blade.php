@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ $category->name }}
                        {{--<a class="float-right btn btn-primary btn-sm" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">--}}
                        {{--<i class="fa fa-plus" aria-hidden="true"></i>--}}
                        {{--</a>--}}
                    </div>
                    <div class="bg-light border-left-0 border-right-0 border-top-0 rounded-0 " id="collapseExample">
                        <div class="card-body p-0">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            @include('admin.products._products', $products)

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop