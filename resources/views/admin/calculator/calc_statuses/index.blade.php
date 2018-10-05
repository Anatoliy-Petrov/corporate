@extends('admin.layouts.app')

@section('content')

    <h2>Управление статусами</h2>

    <div class="">

        <div class="button-group form-group">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter" id="addStatusButton">
                <i class="fa fa-pencil" aria-hidden="true"></i>Создать статус
            </button>
            <!-- Button trigger modal -->

            {{--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" id="addStatusButton">--}}
                {{--Добавить статус--}}
            {{--</button>--}}

        </div>
        <statuses :attributes="{{ $statuses }}" v-cloak></statuses>

    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="createStatusModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createStatusModal">Добавить статус</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('statuses.store') }}" method="post">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Название <img src="{{ asset('img/ru.svg') }}" alt="" style="width: 1.5em;"> </label>
                            <input name="title_ru" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Название <img src="{{ asset('img/ua.svg') }}" alt="" style="width: 1.5em;"> </label>
                            <input name="title_uk" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                        <button type="submit" class="btn btn-primary">Добавить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection