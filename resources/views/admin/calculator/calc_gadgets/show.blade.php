@extends('admin.layouts.app')

@section('styles')

@endsection

@section('content')
    <h3>{{ $gadget->model }}</h3>
    <br>

        <div class="row">
            <div class="col-sm-8">
                <table class="table table-striped">
                    <tr>
                        <td>Модель</td>
                        <td><strong>{{ $gadget->model }}</strong></td>
                    </tr>
                    <tr>
                        <td>Бренд</td>
                        <td><strong>{{ $gadget->brand }}</strong></td>
                    </tr>
                    <tr>
                        <td>Категория</td>
                        <td><strong>{{ $gadget->category }}</strong></td>
                    </tr>
                    <tr>
                        <td>Цена</td>
                        <td><strong>{{ $gadget->price }}</strong> грн</td>
                    </tr>
                    <tr>
                        <td>Описание</td>
                        <td><strong>{{ $gadget->description }}</strong></td>
                    </tr>
                    <tr>
                        <td>Изображение</td>
                        <td>
                            @isset($gadget->image)
                                <div class="card card-body bg-light col-sm-4">
                                    <img src="{{ $gadget->image }}" alt=""   class="img-fluid">
                                </div>
                            @endisset
                        </td>
                    </tr>
                </table>
                <a href="{{ url()->previous() }}" class="btn btn-default">Вернуться к списку</a>
            </div>
        </div>

@endsection