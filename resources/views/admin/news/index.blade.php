@extends('admin.layouts.app')

@section('content')

    <h3>Новости</h3>

    <div class="table">

        <form action="{{ route('news.destroyAll') }}" method="post">
            {{ csrf_field() }}
            <div class="button-group form-group">
                <a href="{{ route('news.create') }}">
                    <button type="button" class="btn btn-success"><i class="fa fa-pencil" aria-hidden="true"></i>Создать</button>
                </a>
                <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i>Удалить</button>
            </div>
            @if(count($news))
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th style="width: 5%">
                            <input type="checkbox" name="total" class="all" data-id="d1">
                        </th>
                        <th  style="width: 5%">№</th>
                        <th>Заголовок</th>
                        <th>Регион</th>
                        <th>Город</th>
                        <th style="width: 10%">Состояние</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($news as $item)
                        <tr data-element-id="{{ $item->id }}">
                            <td>
                                <input type="checkbox" name="news[]" value="{{ $item->id }}" class="one" data-id="d1">
                            </td>
                            <td>{{ $loop->iteration+$page }}</td>
                            <td><a href="{{ route('news.edit', ['id' => $item->id]) }}">{{ $item->title_ru }}</a></td>
                            <td>{{ $item->region->title_ru or '' }}</td>
                            <td>{{ $item->city->title_ru or '' }}</td>
                            <td>
                                @if( $item->published == 1)
                                    <span class="badge badge-success">Опубликовано</span>
                                @else
                                    <span class="badge badge-warning">Не опубликовано</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('news.edit', ['news' => $item->id]) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            </td>
                            <td>
                                <a href="" class="delete" data-delete-url="/admin/news/{{ $item->id }}" data-element-id="{{ $item->id }}" >
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </a>
                            </td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>
            @else
                Пока не создано ни одной новости
            @endif

        </form>
    </div>
    @if(count($news)) {{ $news->links() }} @endif

@endsection