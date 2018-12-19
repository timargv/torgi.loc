<table class="table ">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Название</th>
        <th scope="col">Менеджер</th>
        <th scope="col">Дата окончания</th>
    </tr>
    </thead>
    <tbody>
    @foreach($categories as $category)
        <tr>
            <th scope="row">{{ $category->id }}</th>
            <td><a href="{{ route('admin.categories.show', $category) }}">{{ $category->name }}</a> <a target="_blank" href="{{ $category->slug }}"><i class="fa fa-external-link-alt"></i></a></td>
            <td class="@if($category->user->isAdmin()) text-danger @endif">{{ $category->user->name  }}</td>
            <td>{{ str_replace("T", "  ", $category->date_expiration)  }}</td>
        </tr>
    @endforeach

    </tbody>
</table>