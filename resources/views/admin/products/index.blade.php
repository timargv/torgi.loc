@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left mr-5">
                            <h4>{{ $title }}</h4>
                        </div>

                        <a class="float-right btn btn-primary btn-sm" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                        </a>
                        <form class="form-inline mr-3 float-right col-3">
                            <div class="form-row align-items-center  w-100">
                                <div class=" w-100">
                                    <div class="input-group">
                                        <input type="text" name="title" class="form-control mb-2 form-control-sm mr-0 rounded-left" id="inlineFormInput" placeholder="Найти">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="collapse bg-light border-left-0 border-right-0 border-top-0 rounded-0 " id="collapseExample">
                        <form method="POST" action="{{ route('admin.products.store') }}" class="form-inline float-right mx-3">
                            @csrf

                            <div class="form-group mx-sm-3 my-3">
                                <input placeholder="Название" id="title" class="form-control-sm form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}" required>
                                @if ($errors->has('title'))
                                    <span class="invalid-feedback"><strong>{{ $errors->first('title') }}</strong></span>
                                @endif
                            </div>

                            <div class="form-group mx-sm-3 my-3">
                                <input placeholder="Ед. изм." id="unit" class="form-control-sm form-control{{ $errors->has('unit') ? ' is-invalid' : '' }}" name="unit" value="{{ old('unit') }}" required>
                                @if ($errors->has('unit'))
                                    <span class="invalid-feedback"><strong>{{ $errors->first('unit') }}</strong></span>
                                @endif
                            </div>

                            <div class="form-group mx-sm-3 my-3">
                                <input placeholder="Кол-во всего" id="pcs" class="form-control-sm form-control{{ $errors->has('pcs') ? ' is-invalid' : '' }}" name="pcs" value="{{ old('pcs') }}" required>
                                @if ($errors->has('pcs'))
                                    <span class="invalid-feedback"><strong>{{ $errors->first('pcs') }}</strong></span>
                                @endif
                            </div>

                            <div class="form-group mx-sm-3 my-3">
                                <input placeholder="Цена 1" id="price" class="form-control-sm form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" value="{{ old('price') }}" required>
                                @if ($errors->has('price'))
                                    <span class="invalid-feedback"><strong>{{ $errors->first('price') }}</strong></span>
                                @endif
                            </div>

                            <div class="form-group mx-sm-3 my-3">
                                <input placeholder="Цена 2" id="price_two" class="form-control-sm form-control{{ $errors->has('price_two') ? ' is-invalid' : '' }}" name="price_two" value="{{ old('price_two') }}" required>
                                @if ($errors->has('price_two'))
                                    <span class="invalid-feedback"><strong>{{ $errors->first('price_two') }}</strong></span>
                                @endif
                            </div>

                            <div class="form-group mx-sm-3 my-3">
                                <input placeholder="Цена 3" id="price_three" class="form-control-sm form-control{{ $errors->has('price_three') ? ' is-invalid' : '' }}" name="price_three" value="{{ old('price_three') }}" required>
                                @if ($errors->has('price_three'))
                                    <span class="invalid-feedback"><strong>{{ $errors->first('price_three') }}</strong></span>
                                @endif
                            </div>

                            <div class="form-group mx-sm-3 my-3">
                                <input placeholder="Ссылка" id="links" class="form-control-sm form-control{{ $errors->has('links') ? ' is-invalid' : '' }}" name="links" value="{{ old('links') }}" required>
                                @if ($errors->has('links'))
                                    <span class="invalid-feedback"><strong>{{ $errors->first('links') }}</strong></span>
                                @endif
                            </div>

                            <div class="form-group mx-sm-3 my-3">
                                <input placeholder="Статус" id="status" class="form-control-sm form-control{{ $errors->has('status') ? ' is-invalid' : '' }}" name="status" value="{{ old('status') }}" required>
                                @if ($errors->has('status'))
                                    <span class="invalid-feedback"><strong>{{ $errors->first('status') }}</strong></span>
                                @endif
                            </div>

                            <div class="form-group mx-sm-3 my-3">
                                <input placeholder="Дата" id="date_expiration" class="form-control-sm form-control{{ $errors->has('date_expiration') ? ' is-invalid' : '' }}" name="date_expiration" value="{{ old('date_expiration') }}" required>
                                @if ($errors->has('date_expiration'))
                                    <span class="invalid-feedback"><strong>{{ $errors->first('date_expiration') }}</strong></span>
                                @endif
                            </div>

                            <div class="form-group mx-sm-3 my-3">
                                <select id="user_id" class="form-control-sm form-control{{ $errors->has('user_id') ? ' is-invalid' : '' }}" name="user_id">
                                    <option value="">Менеджеры</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id == null ? 1 : $user->id }}"{{ $user->id == old('user') ? ' selected' : '' }}>
                                            {{ $user->name }}
                                        </option>
                                    @endforeach;
                                </select>
                                @if ($errors->has('user_id'))
                                    <span class="help-block"><strong>{{ $errors->first('user_id') }}</strong></span>
                                @endif
                            </div>

                            <div class="form-group mx-sm-3 my-3">
                                <select id="category_id" class="form-control-sm form-control{{ $errors->has('category_id') ? ' is-invalid' : '' }}" name="category_id">
                                    <option value="">Все Торги</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id == null ? 1 : $category->id }}"{{ $category->id == old('category_id') ? ' selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach;
                                </select>
                                @if ($errors->has('category_id'))
                                    <span class="help-block"><strong>{{ $errors->first('category_id') }}</strong></span>
                                @endif
                            </div>


                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-sm">Добавить</button>
                            </div>

                        </form>
                    </div>

                    <div class="card-body p-0">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @include('admin.products._products', $products)

                    </div>

                </div>

                <div class="my-3">
                   {{ $products->appends(Request::only('title'))->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')

@stop