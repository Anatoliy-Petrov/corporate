@extends('admin.layouts.app')

@section('content')

    <h3>Заявки на оценку золота и серебра</h3>

    <div class="table">

        <form action="{{ route('requests.destroyAll') }}" method="post">
            {{ csrf_field() }}

            @if(count($requests))
                <div class="button-group form-group">
                    <button type="submit" class="btn btn-danger"><i aria-hidden="true" class="fa fa-trash-o"></i>Удалить</button>
                    {{--<a href="{{ route('callbacks.create') }}">--}}
                    {{--<button type="button" class="btn btn-sm btn-success">Создать</button>--}}
                    {{--</a>--}}
                </div>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>
                            <input type="checkbox" name="total" class="all" data-id="d1">
                        </th>
                        <th>№</th>
                        <th>Имя</th>
                        <th>Телефон</th>
                        <th>email</th>
                        <th>Город</th>


                        {{--<th>Вес</th>--}}
                        {{--<th>Проба</th>--}}
                        {{--<th>Камень</th>--}}
                        {{--<th>Тариф</th>--}}
                        {{--<th>Статус</th>--}}
                        {{--<th>Срок</th>--}}
                        {{--<th>Сумма</th>--}}
                        {{--<th>Переплата</th>--}}

                        <th>Отправлено</th>
                        <th>Состояние</th>
                        <th>Изменить состояние</th>
                        {{--<th>Изображение</th>--}}
                        <th>Просмотреть</th>
                        <th>Удалить</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($requests as $request)
                        <tr  data-element-id="{{ $request->id }}">
                            <td>
                                <input type="checkbox" name="requests[]" value="{{ $request->id }}" class="one" data-id="d1">
                            </td>
                            <td>{{ $loop->iteration+$page }}</td>
                            <td><a href="{{ route('requests.show', $request->id) }}">{{ $request->name }}</a></td>
                            <td>{{ $request->phone }}</td>
                            <td>{{ $request->email }}</td>
                            <td>{{ $request->city }}</td>

                            {{--<td>{{ $request->weight }}</td>--}}
                            {{--<td>{{ $request->hallmark }}</td>--}}
                            {{--<td>--}}
                                {{--@if($request->stone)--}}
                                    {{--Есть--}}
                                {{--@else--}}
                                    {{--Нет--}}
                                {{--@endif--}}
                            {{--</td>--}}
                            {{--<td>{{ $request->tariff }}</td>--}}
                            {{--<td>{{ $request->client_status }}</td>--}}
                            {{--<td>{{ $request->term }}</td>--}}
                            {{--<td>{{ $request->amount }}</td>--}}
                            {{--<td>{{ $request->overpayment }}</td>--}}

                            <td>
                                {{ $request->created_at->diffForHumans() }}
                            </td>
                            <td>
                                @if( $request->status == 1)
                                    <span class="badge badge-success" id="status-badge-{{ $request->id }}">Обработано</span>
                                @else
                                    <span class="badge badge-warning" id="status-badge-{{ $request->id }}">Не обработано</span>
                                @endif
                            </td>
                            <td>
                                <label class="switch">
                                    <input type="checkbox" class="status-switcher" data-change-url="/admin/calculator/requests/{{ $request->id }}"  data-change-id="{{ $request->id }}"  @if($request->status == 0) checked @endif>
                                    <span class="slider round"></span>
                                </label>
                            </td>
                            {{--<td>--}}
                                {{--<img src="/img/wedding-ring.jpg" alt="ring" style="height: 60px; width: 60px;">--}}
                            {{--</td>--}}
                            <td><a href="{{ route('requests.show', $request->id) }}"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                            <td>
                                <a href=""  class="delete" data-delete-url="/admin/calculator/requests/{{ $request->id }}" data-element-id="{{ $request->id }}">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </a>
                            </td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>
            @else
                Не создано ни одной заявки
            @endif

        </form>

    </div>

    @if(count($requests)) {{ $requests->links() }} @endif

@endsection

@section('styles')
    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 30px;
            height: 17px;
        }

        .switch input {display:none;}

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 13px;
            width: 13px;
            left: 2px;
            bottom: 2px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked + .slider {
            background-color: #2196F3;
        }

        input:focus + .slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(13px);
            -ms-transform: translateX(13px);
            transform: translateX(13px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 17px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
    </style>
@endsection