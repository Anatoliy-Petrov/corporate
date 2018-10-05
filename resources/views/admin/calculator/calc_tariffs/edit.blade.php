@extends('admin.layouts.app')

@section('content')
    <h2>{{ $tariff->title_ru }}</h2>
    {{--<p>* - поля обязательные для заполнения</p>--}}
    <form method="POST" action="{{ route('calc_tariffs.update', ['tariff' => $tariff->id]) }}" class="form-group">

        {{ method_field('patch') }}
        {{ csrf_field() }}

        <hr>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Название тарифа * <img src="{{ asset('img/ru.svg') }}" alt="" style="width: 1.5em;"></label>
                    <input type="text" name="title_ru" class="form-control" value="{{ $tariff->title_ru }}" required>
                </div>

            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Название тарифа * <img src="{{ asset('img/ua.svg') }}" alt="" style="width: 1.5em;"> <small>(украинский вариант)</small></label>
                    <input type="text" name="title_uk" class="form-control" value="{{ $tariff->title_uk }}" required>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="">Состояние</label>
                    <select name="published" class="form-control">
                        <option value="1" @if($tariff->published == 1 ) {{ 'selected' }} @endif >
                            Опубликовано
                        </option>
                        <option value="0"  @if($tariff->published == 0 ) {{ 'selected' }} @endif >
                            Не опубликовано
                        </option>
                    </select>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group" id="category_block">
                    <label>Категория *</label>
                    <select name="calc_category_id" class="form-control"  required
                            data-selected="{{ old('calc_category_id') }}" data-placeholder="Выберите категорию">
                        <option value="">Выберите категорию...</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                            @if($tariff->calc_category_id == $category->id)
                                {{ 'selected' }}@endif
                            >{{ $category->title_ru }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <hr>

        <calculator-price :tariff="{{$tariff}}"></calculator-price>

        <hr>

        Добавление ставок по тарифу
        <calculator-rates :tariff="{{$tariff}}"></calculator-rates>

        <hr>
        <div class="form-group">
            <input type="submit" class="btn btn-success" value="Сохранить">
            {{--<button type="submit" class="btn btn-success">Сохранить</button>--}}
        </div>

    </form>

@endsection