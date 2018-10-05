@extends('admin.layouts.app')

@section('content')
    <h2>Новый тариф</h2>
    {{--<p>* - поля обязательные для заполнения</p>--}}
    <form method="POST" action="{{ route('calc_tariffs.store') }}" class="form-group">

        {{ csrf_field() }}

        <hr>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Название тарифа * <img src="{{ asset('img/ru.svg') }}" alt="" style="width: 1.5em;"></label>
                    <input type="text" name="title_ru" class="form-control" value="{{ old('title_ru') }}" required>
                </div>

            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Название тарифа * <img src="{{ asset('img/ua.svg') }}" alt="" style="width: 1.5em;"> <small>(украинский вариант)</small></label>
                    <input type="text" name="title_uk" class="form-control" value="{{ old('title_uk') }}" required>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="">Состояние</label>
                    <select name="published" class="form-control">
                        <option value="1" @if(old('published') &&  old('published') == 1 ) {{ 'selected' }} @endif >
                            Опубликовано
                        </option>
                        <option value="0"  @if(old('published') &&  old('published') == 0 ) {{ 'selected' }} @endif >
                            Не опубликовано
                        </option>
                    </select>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group" id="category_block">
                    <label>Категория *</label>
                    <select name="calc_category_id" class="form-control"  id=""
                            data-selected="{{ old('calc_category_id') }}" data-placeholder="Выберите категорию">
                        <option value="">Выберите категорию...</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                            @if(old('calc_category_id') && old('calc_category_id') == $category->id)
                                {{ 'selected' }}@endif
                            >{{ $category->title_ru }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group" id="category_block_disabled" style="display: none;">
                    <label>Категория </label>
                    <div id="category_name"></div>
                </div>
            </div>

        </div>
        <hr>

        {{--цены за грамм металла--}}


        <calculator-price></calculator-price>

        {{--Добавление ставок по тарифу--}}
        <calculator-rates></calculator-rates>

        <hr>
        <div class="form-group">
            <input type="submit" class="btn btn-success" value="Сохранить">
            {{--<button type="submit" class="btn btn-success">Сохранить</button>--}}
        </div>

    </form>


@endsection