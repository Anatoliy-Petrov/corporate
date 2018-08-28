@extends('admin.layouts.app')

@section('styles')

@endsection

@section('content')
    <h3>Часто задаваемый вопрос</h3>
    <p>* - поля обязательные для заполнения</p>
    <form method="POST"
          @if(isset($faq))
            action="{{ route('faqs.update', ['id' => $faq->id]) }}"
          @else
            action="{{ route('faqs.store') }}"
          @endif
           class="form-group"  enctype="multipart/form-data">

        {{ csrf_field() }}
        @if(isset($faq)) {{ method_field('put') }} @endif
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
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Вопрос *</label>
                            <input type="text" name="title_ru" class="form-control"
                                   value="{{ isset($faq) ? $faq->title_ru : old('title_ru') }}" >
                        </div>

                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Ответ *</label>
                            <textarea name="description_ru" class="form-control"
                                      rows="5">{{ isset($faq) ? $faq->description_ru : old('description_ru') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="uk" role="tabpanel" aria-labelledby="uk-tab"><br>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Вопрос * <small>(украинский вариант)</small></label>
                            <input type="text" name="title_uk" class="form-control"
                                   value="{{ isset($faq) ? $faq->title_uk : old('title_uk') }}" >
                        </div>

                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Ответ * <small>(украинский вариант)</small></label>
                            <textarea name="description_uk" class="form-control"
                                      rows="5">{{ isset($faq) ? $faq->description_uk : old('description_uk') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="">Состояние</label>
                    <select name="published" id="" class="form-control">
                        <option value="1" @if(isset($faq) &&  $faq->published ) {{ 'selected' }} @endif >
                            Опубликовано
                        </option>
                        <option value="0" @if(isset($faq) &&  !$faq->published ) {{ 'selected' }} @endif >
                            Не опубликовано
                        </option>
                    </select>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Категория *</label>
                    <select name="faq_category_id" class="form-control">
                        <option value="">Выберите категорию...</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}"
                            @if(isset($faq) && $faq->faq_category_id == $category->id)
                                {{ 'selected' }}
                            @elseif(old('faq_category_id') == $category->id)
                                {{ 'selected' }}
                            @endif
                            >{{$category->title_ru}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-6"></div>
        </div>

        <button type="submit" class="btn btn-success">Сохранить</button>

    </form>
@endsection