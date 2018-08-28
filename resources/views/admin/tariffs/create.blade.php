@extends('admin.layouts.app')

@section('styles')

@endsection

@section('content')
    <h3>Тариф</h3>
    <p>* - поля обязательные для заполнения</p>
    <form method="POST"
          @if(isset($tariff))
            action="{{ route('tariffs.update', ['id' => $tariff->id]) }}"
          @else
            action="{{ route('tariffs.store') }}"
          @endif
           class="form-group"  enctype="multipart/form-data">

        {{ csrf_field() }}
        @if(isset($tariff)) {{ method_field('put') }} @endif
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="ru-tab" data-toggle="tab" href="#ru" role="tab" aria-controls="ru" aria-selected="true">русский</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="uk-tab" data-toggle="tab" href="#uk" role="tab" aria-controls="uk" aria-selected="false">украинский</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="ru" role="tabpanel" aria-labelledby="ru-tab"><br>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Заголовок тарифа *</label>
                            <input type="text" name="title_ru" class="form-control"
                                   value="{{ isset($tariff) ? $tariff->title_ru : old('title_ru') }}" >
                        </div>
                        <div class="form-group">
                            <label>Первый подзаголовок тарифа</label>
                            <input type="text" name="sub_title_first_ru" class="form-control"
                                   value="{{ isset($tariff) ? $tariff->sub_title_first_ru : old('subtitle_first_ru') }}" >
                            <small>( будет выделено жирным )</small>
                        </div>

                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Второй подзаголовок</label>
                            <input type="text" name="sub_title_second_ru" class="form-control"
                                   value="{{ isset($tariff) ? $tariff->sub_title_second_ru : old('subtitle_second_ru') }}">
                        </div>
                        <div class="form-group">
                            <label>Срок ожидания</label>
                            <input type="text" name="term_ru" class="form-control"
                                   value="{{ isset($tariff) ? $tariff->term_ru : old('term_ru') }}" >
                            <small>(прописать польностью <strong> 14 дней</strong>)</small>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Описание тарифа *</label>
                            <textarea name="description_ru" class="form-control"
                                      rows="5">{{ isset($tariff) ? $tariff->description_ru : old('description_ru') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="uk" role="tabpanel" aria-labelledby="uk-tab"><br>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Заголовок тарифа * <small>(украинский вариант)</small></label>
                            <input type="text" name="title_uk" class="form-control"
                                   value="{{ isset($tariff) ? $tariff->title_uk : old('title_uk') }}" >
                        </div>
                        <div class="form-group">
                            <label>Первый подзаголовок тарифа <small>(украинский вариант)</small></label>
                            <input type="text" name="sub_title_first_uk" class="form-control"
                                   value="{{ isset($tariff) ? $tariff->sub_title_first_uk : old('subtitle_first_uk') }}" >
                            <small>( будет выделено жирным )</small>
                        </div>

                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Второй подзаголовок <small>(украинский вариант)</small></label>
                            <input type="text" name="sub_title_second_uk" class="form-control"
                                   value="{{ isset($tariff) ? $tariff->sub_title_second_uk : old('subtitle_second_uk') }}" >
                        </div>
                        <div class="form-group">
                            <label>Срок ожидания  <small>(украинский вариант)</small></label>
                            <input type="text" name="term_uk" class="form-control"
                                   value="{{ isset($tariff) ? $tariff->term_uk : old('term_uk') }}" >
                            <small>(прописать польностью <strong> 21 день</strong>)</small>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Описание тарифа * <small>(украинский вариант)</small></label>
                            <textarea name="description_uk" class="form-control"
                                      rows="5">{{ isset($tariff) ? $tariff->description_uk : old('description_uk') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="">Состояние</label>
                    <select name="published" id="" class="form-control">
                        <option value="1" @if(isset($tariff) &&  $tariff->published ) {{ 'selected' }} @endif >
                            Опубликовано
                        </option>
                        <option value="0" @if(isset($tariff) &&  !$tariff->published ) {{ 'selected' }} @endif >
                            Не опубликовано
                        </option>
                    </select>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Ставка</label>
                    <input type="text" name="rate" class="form-control"
                           value="{{ isset($tariff) ? $tariff->rate : old('rate') }}" >
                    <small>(прописать польностью <strong>ставка 0,773 %</strong>)</small>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Категория *</label>
                    <select name="tariff_category_id" class="form-control">
                        <option value="">Выберите категорию...</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}"
                            @if(isset($tariff) && $tariff->tariff_category_id == $category->id)  {{ 'selected' }}@endif
                            >{{$category->title_ru}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-6"></div>
        </div>
        <div class="row">
            <div class="col-sm-12"><h5>Изображение</h5></div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <input type="file" name="image" class="form-control"  data-buttonName="btn-primary">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="col-sm-6">
                    @if(isset($tariff))
                        <div class="card card-body bg-light">
                            <img src="{{ asset('storage/images/tariffs/'.$tariff->image) }}" alt="" class="img-fluid">
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-success">Сохранить</button>
    </form>

@endsection