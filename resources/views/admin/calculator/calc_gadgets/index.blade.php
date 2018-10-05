@extends('admin.layouts.app')

@section('content')

    <h3>Техника</h3>

    <div class="table">

        {{--<form action="{{ route('calc_tariffs.destroyAll') }}" method="post">--}}
            {{--{{ csrf_field() }}--}}
            {{--<div class="button-group form-group">--}}
                {{--<a href="{{ route('calc_tariffs.create') }}">--}}
                    {{--<button type="button" class="btn btn-success"><i aria-hidden="true" class="fa fa-pencil"></i>Создать</button>--}}
                {{--</a>--}}
                {{--<button type="submit" class="btn btn-danger"><i aria-hidden="true" class="fa fa-trash-o"></i>Удалить</button>--}}
            {{--</div>--}}
        <div class="navigate d-flex justify-content-between align-items-start">
            <div class="buttons">
                {{--<div class="button-group form-group">--}}
                    {{--<a href="{{ route('news.create') }}">--}}
                        {{--<button type="button" class="btn btn-success"><i class="fa fa-pencil" aria-hidden="true"></i>Создать</button>--}}
                    {{--</a>--}}
                    {{--<button type="submit" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i>Удалить</button>--}}
                {{--</div>--}}
            </div>
            <div class="fields d-flex">
                <div class="form-inline">
                    <input type="text" class="form-control mb-3 mr-sm-3 mb-sm-0" id="searchGadgetField" name="q"
                           placeholder="Поиск..." value="@if(request()->has('q')){{request()->q}}@endif">
                    <div id="searchGadgetButton" class="btn btn-primary">Найти</div>&nbsp;
                    {{--<div id="searchGadgetButton" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i></div>--}}
                    <a class="btn btn-outline-primary" href="{{ route('gadgets.index') }}">Очистить поиск</a>
                </div>
            </div>
        </div>
        <br>
            @if(count($gadgets))
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>№</th>
                        <th>Модель</th>
                        <th>Категория</th>
                        <th>Производитель</th>
                        <th>Цена</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($gadgets as $gadget)
                        <tr data-element-id="{{ $gadget->id }}">

                            <td>{{ $loop->iteration+$page }}</td>
                            {{--<td><a href="#">{{ $gadget->model }}</a></td>--}}
                            <td><a href="{{ route('gadgets.show', ['gadget' => $gadget->id]) }}">{{ $gadget->model }}</a></td>
                            <td>{{ $gadget->category }}</td>
                            <td>{{ $gadget->brand }}</td>
                            <td>
                                {{ $gadget->price }} грн
                            </td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>
            @else
                Нет ни одного устройства
            @endif

        {{--</form>--}}

    </div>

    @if(count($gadgets)) {{ $gadgets->links() }} @endif

@endsection