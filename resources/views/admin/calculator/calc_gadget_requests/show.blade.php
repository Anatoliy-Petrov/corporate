@extends('admin.layouts.app')

@section('styles')

@endsection

@section('content')
    <h3>Заявка на оценку техники от {{ $request->name }}</h3>
    <br>

        <div class="row">
            <div class="col-sm-8">
                <br>
                <table class="table table-striped">
                    <tr>
                        <td>Имя</td>
                        <td><strong>{{ $request->name }}</strong></td>
                    </tr>
                    <tr>
                        <td>Телефон</td>
                        <td><strong>{{ $request->phone }}</strong></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><strong>{{ $request->email }}</strong></td>
                    </tr>
                    <tr>
                        <td>Город</td>
                        <td><strong>{{ $request->city }}</strong></td>
                    </tr>
                    <tr>
                        <td>Отделение</td>
                        <td><strong>{{ $request->office }}</strong></td>
                    </tr>
                    <tr>
                        <td>Категория</td>
                        <td><strong>{{ $request->category }}</strong></td>
                    </tr>

                    <tr>
                        <td>Бренд</td>
                        <td><strong>{{ $request->brand  or 'Не указано'}}</strong></td>
                    </tr>
                    <tr>
                        <td>Модель</td>
                        <td><strong>{{ $request->model  or 'Не указано'}}</strong></td>
                    </tr>
                    <tr>
                        <td>Процессор</td>
                        <td><strong>{{ $request->cpu or 'Не указано'}}</strong></td>
                    </tr>
                    <tr>
                        <td>Процессор</td>
                        <td><strong>{{ $request->memory or 'Не указано'}}</strong></td>
                    </tr>
                    <tr>
                        <td>Процессор</td>
                        <td><strong>{{ $request->hdd or 'Не указано'}}</strong></td>
                    </tr>
                    <tr>
                        <td>Процессор</td>
                        <td><strong>{{ $request->video or 'Не указано'}}</strong></td>
                    </tr>
                    <tr>
                        <td>Комплектация</td>
                        <td><strong>{{ $request->tariff }}</strong></td>
                    </tr>
                    <tr>
                        <td>Состояние</td>
                        <td><strong>{{ $request->client_status }}</strong></td>
                    </tr>
                    {{--<tr>--}}
                        {{--<td>Срок</td>--}}
                        {{--<td><strong>{{ $request->term }}</strong></td>--}}
                    {{--</tr>--}}
                    <tr>
                        <td>Цена</td>
                        <td><strong>{{ $request->price }}</strong> грн</td>
                    </tr>

                </table>
                <a href="{{ url()->previous() }}" class="btn btn-default">Вернуться к списку заявок</a>
            </div>
            <div class="col-sm-4">
                {{--<div class="form-group">--}}
                    {{--<label for="">Состояние</label>--}}
                    {{--<select name="status" id="" class="form-control">--}}
                        {{--<option value="1" @if(isset($request) &&  $request->status ) {{ 'selected' }} @endif >--}}
                            {{--Обработано--}}
                        {{--</option>--}}
                        {{--<option value="0" @if(isset($request) &&  !$request->status ) {{ 'selected' }} @endif >--}}
                            {{--Не обработано--}}
                        {{--</option>--}}
                    {{--</select>--}}
                {{--</div>--}}
                <div class="form-group">
                    <h6>Изображения</h6>
                    @forelse($request->images as $image)
                        <div class="card card-body bg-light col-sm-6">
                            <img src="{{ $image }}" alt=""   class="img-fluid">
                        </div>
                    @empty
                        Нет изображений
                    @endforelse
                </div>
            </div>
        </div>

@endsection