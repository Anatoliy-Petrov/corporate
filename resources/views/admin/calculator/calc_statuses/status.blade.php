{{--<status :attributes="{{ $status }}" inline-template v-cloak>--}}
    {{--<div  id="status-{{ $status->id }}" style="display: table-row;" class="table-light">--}}
        {{--<div style="display: table-cell;" class="table-light">--}}
            {{--<div v-if="editing">--}}
                {{--<div class="form-group">--}}
                    {{--<label for="">Название <img src="{{ asset('img/ru.svg') }}" alt="" style="width: 1.5em;"> </label>--}}
                    {{--<input class="form-control" v-model="title_ru">--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                    {{--<label for="">Название <img src="{{ asset('img/ua.svg') }}" alt="" style="width: 1.5em;"> </label>--}}
                    {{--<input class="form-control" v-model="title_uk">--}}
                {{--</div>--}}
                {{--<button class="btn btn-xs btn-primary" @click="update">сохранить</button>--}}
                {{--<button class="btn btn-xs btn-link" @click="editing = false">отмена</button>--}}
            {{--</div>--}}

            {{--<div v-else v-text="title_ru"></div>--}}
        {{--</div>--}}
        {{--<div style="display: table-cell;" class="table-light">--}}
            {{--<a  @click="editing = true"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>--}}
        {{--</div>--}}
        {{--<div style="display: table-cell;" class="table-light">--}}
            {{--<a href=""  class="delete"  @click="destroy">--}}
                {{--<i class="fa fa-trash" aria-hidden="true"></i>--}}
            {{--</a>--}}
        {{--</div>--}}
    {{--</div>--}}

{{--</status>--}}
{{--<status :attributes="{{ $status }}" v-cloak></status>--}}