@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ $title }}
                        <a class="float-right btn btn-primary btn-sm" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                        </a>
                    </div>
                    <div class="collapse bg-light border-left-0 border-right-0 border-top-0 rounded-0 " id="collapseExample">
                        <form method="POST" action="{{ route('admin.categories.store') }}" class="form-inline  mx-3">
                            @csrf

                            <div class="row">
                                <div class="form-group mx-sm-3 my-3">
                                    <input placeholder="Название" id="name" class="form-control-sm form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required>
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback"><strong>{{ $errors->first('name') }}</strong></span>
                                    @endif
                                </div>

                                <div class="form-group mx-sm-3 my-3">
                                    <input placeholder="Номер" id="number" class="form-control-sm form-control{{ $errors->has('number') ? ' is-invalid' : '' }}" name="number" value="{{ old('number') }}" required>
                                    @if ($errors->has('number'))
                                        <span class="invalid-feedback"><strong>{{ $errors->first('number') }}</strong></span>
                                    @endif
                                </div>

                                <div class="form-group mx-sm-3 my-3">
                                    <input placeholder="Ссылка на торги" id="slug" class="form-control-sm form-control{{ $errors->has('slug') ? ' is-invalid' : '' }}" name="slug" value="{{ old('slug') }}" required>
                                    @if ($errors->has('slug'))
                                        <span class="invalid-feedback"><strong>{{ $errors->first('slug') }}</strong></span>
                                    @endif
                                </div>
                                <div class="form-group mx-sm-3 my-3" style="width: 160px;">
                                    <input type="datetime-local" placeholder="Дата окончания" id="slug" class="w-100 form-control-sm form-control{{ $errors->has('date_expiration') ? ' is-invalid' : '' }}" name="date_expiration" value="{{ old('date_expiration') }}" >
                                    @if ($errors->has('date_expiration'))
                                        <span class="invalid-feedback"><strong>{{ $errors->first('date_expiration') }}</strong></span>
                                    @endif
                                </div>
                                <div class="form-group mx-sm-3 my-3">
                                    <select id="user_id" class="form-control-sm form-control{{ $errors->has('user_id') ? ' is-invalid' : '' }}" name="user_id">
                                        <option value="">Менеджер</option>
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
                                <div class="form-group my-3">
                                    <button type="submit" class="btn btn-primary btn-sm">Добавить</button>
                                </div>
                            </div>




                        </form>
                    </div>

                    <div class="card-body p-0">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @include('admin.categories._categories', $categories)

                    </div>

                </div>

                <div class="my-3">
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
<script type="text/javascript">
    $('.DateTimeTextBox').datetimepicker({
        mask:'39.19.9999 29:59',
        format:'d.m.Y H:i'
    });
</script>
@stop