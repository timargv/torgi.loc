<table class="table ">
    <thead>
    <tr>
        <th scope="col" width="50px">#</th>
        <th scope="col" width="10px"><i data-toggle="tooltip" data-placement="top" title="Картинка" class="fa fa-image"></i></th>
        <th scope="col" width="800px">Название</th>
        <th scope="col" width="90px"><i class="fa fa-search" aria-hidden="true"></i></th>
        {{--<th scope="col" width="120px"><i class="fa fa-user"></i></th>--}}
        <th scope="col" width="50px"><i class="fa fa-list-alt " data-toggle="tooltip" data-placement="top" title="Ед. Измерения"></i></th>
        <th scope="col" width="50px"><i class="fa fa-cube"></i></th>
        <th data-toggle="tooltip" data-placement="top" title="Цена 1" scope="col"><i class="fa fa-ruble"></i></th>
        {{--<th data-toggle="tooltip" data-placement="top" title="Цена 2" scope="col"><i class="fa fa-ruble"></i></th>--}}
        {{--<th data-toggle="tooltip" data-placement="top" title="Цена 3" scope="col"><i class="fa fa-ruble"></i></th>--}}
        {{--<th scope="col">Статус</th>--}}
        <th scope="col" width="110px"><i class="fa fa-calendar"></i></th>
        <th scope="col" width="50px">Упр</th>

    </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
        <tr>
            <th scope="row">{{ $product->id }}</th>
            <th>
                <a data-toggle="tooltip" data-placement="top" title="Найти на Goolge"  target="_blank" href="https://www.google.com/search?q={{ $product->title }}&source=lnms&tbm=isch&sa=X&ved=0ahUKEwiFsJbWy6vfAhWIuIsKHaQjA04Q_AUIDigB&biw=1920&bih=969#imgrc=XhaogWBF-U9unM:">
                    <i class="fa fa-image"></i>
                </a>
            </th>
            <td><a {{ $product->category != null ? print ('target="_blank"') : ''}} href="{{ $product->category->count() != null ? route('admin.categories.show', $product->category->id) : '#' }}">{{ $product->title }}</a></td>
            <td>
                <a data-toggle="tooltip" data-placement="top" title="Goolge" class="btn btn-light btn-sm" target="_blank" href="https://www.google.com/search?source=hp&ei=EAkaXIKTOpKqrgT7xJ-gCQ&q={{ $product->title }}"><i class="fa fa-google" aria-hidden="true"></i></a>
                <a data-toggle="tooltip" data-placement="top" title="Яндекс" class="btn btn-warning btn-sm" target="_blank" href="https://yandex.ru/search/?text={{ $product->title }}&lr=193"><i class="fa fa-yahoo" aria-hidden="true"></i></a>
            </td>
{{--            <td class="@if($product->user->isAdmin()) text-danger @endif">{{ $product->user->name  }}</td>--}}
            <td>{{ $product->unit }}</td>
            <td>{{ $product->pcs }}</td>
            <td>{{ $product->price }}</td>
            {{--<td>{{ $product->price_two }}</td>--}}
            {{--<td>{{ $product->price_three }}</td>--}}
            {{--<td>{{ $product->status }}</td>--}}
            <td>{{ str_replace("T", "  ", $product->date_expiration)  }}</td>
            <td>

                <form method="POST" action="{{ route('admin.products.destroy', $product) }}" class="mr-1">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-light" onclick="return confirm('Вы точно хотите удалить?')">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </button>
                </form>
            </td>
        </tr>
    @endforeach

    </tbody>
</table>