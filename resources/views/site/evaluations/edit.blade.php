@extends('site.layouts.app')

@section('content')

    <div id="faqPage" class="faqPage page">
        <h3>Форма добавления коммента к оценке</h3>

        <form method="POST" action="{{ route('evaluations.update', ['evaluation' => $evaluation->id]) }}" class="form-group">

            {{ csrf_field() }}
            {{ method_field('put') }}

            <div class="form-group">
                <textarea name="comment" class="form-control" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group">
                <input type="submit" class="form-control" value="Отправить">
            </div>

        </form>
    </div>

@endsection