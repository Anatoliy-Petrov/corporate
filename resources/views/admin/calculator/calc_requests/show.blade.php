@extends('admin.layouts.app')

@section('styles')

@endsection

@section('content')
    <h3>Заявка на оценку от {{ $request->name }}</h3>
    <br>

        <div class="row">
            <div class="col-sm-7">
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
                        <td>Категория</td>
                        <td><strong>{{ $request->category }}</strong></td>
                    </tr>
                    <tr>
                        <td>Вес</td>
                        <td><strong>{{ $request->weight }}</strong></td>
                    </tr>
                    <tr>
                        <td>Проба</td>
                        <td><strong>{{ $request->hallmark }}</strong></td>
                    </tr>
                    <tr>
                        <td>Камень</td>
                        <td><strong>{{ $request->stone }}</strong></td>
                    </tr>
                    <tr>
                        <td>Тариф</td>
                        <td><strong>{{ $request->tariff }}</strong></td>
                    </tr>
                    <tr>
                        <td>Статус</td>
                        <td><strong>{{ $request->client_status }}</strong></td>
                    </tr>
                    <tr>
                        <td>Срок</td>
                        <td><strong>{{ $request->term }}</strong></td>
                    </tr>
                    <tr>
                        <td>Сумма</td>
                        <td><strong>{{ $request->amount }}</strong> грн</td>
                    </tr>
                    <tr>
                        <td>Переплата</td>
                        <td><strong>{{ $request->overpayment }}</strong> грн</td>
                    </tr>
                </table>
                <a href="{{ url()->previous() }}" class="btn btn-default">Вернуться к списку заявок</a>
            </div>
            <div class="col-sm-5">
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
                        <div class="card card-body bg-light col-sm-10">
                            <img src="{{ asset('storage/images/request/'.$image->path) }}" alt=""   class="img-fluid">
                        </div>
                    @empty
                        Нет изображений
                    @endforelse
                </div>
            </div>
        </div>

@endsection