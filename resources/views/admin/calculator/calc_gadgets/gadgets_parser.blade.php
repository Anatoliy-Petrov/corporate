@extends('admin.layouts.app')

@section('content')
    <h2>Парсер техники</h2>
    {{--<p>* - поля обязательные для заполнения</p>--}}
    <form method="POST" action="{{ route('parser.parse') }}" class="form-group"  enctype="multipart/form-data">

        {{ csrf_field() }}

        <div class="row">

            <div class="col-sm-6">
                <hr>
                <h5>Выберите XML файл</h5>
                <input class="form-control" type="file" name="gadgets" />
                <hr>
            </div>

        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-success" value="Сохранить">
        </div>

    </form>


@endsection