<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">

    <meta name="apple-mobile-web-app-capable" content="yes">

    <!-- Microsoft Tiles -->
    <meta name="msapplication-config" content="browserconfig.xml">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    @yield('meta_title')
    @yield('meta_description')
    @yield('meta_keywords')


    <!-- Styles -->
    <link href="{{ asset('css/chosen.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/slick.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.min.css') }}" rel="stylesheet">
    {{--@yield('styles')--}}

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Exo+2:600,700&amp;subset=cyrillic" rel="stylesheet">

    {{--<link rel="stylesheet" href="css/main.min.css">--}}
</head>
<body data-locale="{{ $locale }}">
@include('site.includes.preloader')
<!--[if lte IE 11]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->

<div class="mainWrapper">

    <div class="contentWrapper">
        @include('site.layouts.header')

        <!-- Start of page code insertion here -->
        @yield('content')
        <!-- End of page code insertion here -->

        <div class="relative scrollTopContainer">
            <div id="scrollTopButton" class="icomoon standard-arrow-icon navigateIcon up"></div>
        </div>

    </div>

    @include('site.includes.action_subscribe_popup_form')

    @include('site.includes.action_subscribe_popup_success')

    @include('site.includes.news_subscribe_popup_success')

    @include('site.includes.search_popup')

    @include('site.includes.callback_popup_success')

    @include('site.includes.callback_popup_form')

    @include('site.includes.notification_popup')

    <!--  -->
    <div id="popupError" class="popupActionsSuccess popupError popup">
        <div class="popupContentWrapper">
            
            <header class="modalHeader relative">
                <div class="modal-title title">Ошибка</div>         
            </header>
            
            <div class="popUpContainer">
                <div class="description contentRow">
                    <p>текст ошибки</p>
                </div>
            </div>
        </div>
    </div>

    <!-- ===== -->
<div id="popupRequest" class="popupRequest popup">
    <div class="popupContentWrapper calculator-category">
            <button class="popupCloseButton" type="button"><i class="icomoon icon-close"></i></button>
        
        <header class="modalHeader relative">
            <div class="modal-title title">Оформление заявки</div>          
        </header>
        
        <div class="popUpContainer flex wrap">
            <div class="sectionBlockColumn_md mcol-xs-12 mcol-md-6 flex column">
                <div class="description standard-form">
                    
                    <div class="formRow flex wrap">
                      <div class="formBlock mcol-xs-12 mcol-sm-6">
                        <label>Вес изделия</label>
                      </div>
                      <div class="formBlock mcol-xs-12 mcol-sm-4">
                        <p class="resWeight-js">12 г</p>
                      </div>
                    </div>

                    <div class="formRow flex wrap">
                      <div class="formBlock mcol-xs-12 mcol-sm-6">
                        <label>Проба металла</label>
                      </div>
                      <div class="formBlock mcol-xs-12 mcol-sm-4">
                        <p class="resHall-js">333</p>
                      </div>
                    </div>

                    <div class="formRow flex wrap">
                      <div class="formBlock mcol-xs-12 mcol-sm-6">
                        <label>Камни и вставки</label>
                      </div>
                      <div class="formBlock mcol-xs-12 mcol-sm-4">
                        <p class="resStones-js">Нет</p>
                      </div>
                    </div>

                    <div class="formRow flex wrap">
                      <div class="formBlock mcol-xs-12 mcol-sm-6">
                        <label>Тарифный план</label>
                      </div>
                      <div class="formBlock mcol-xs-12 mcol-sm-4">
                        <p class="resTariff-js">нулевой</p>
                      </div>
                    </div>

                    <div class="formRow flex wrap">
                      <div class="formBlock mcol-xs-12 mcol-sm-6">
                        <label>Срок кредитования до продления</label>
                      </div>
                      <div class="formBlock mcol-xs-12 mcol-sm-4">
                        <p class="resDays-js">8</p>
                      </div>
                    </div>

                    <div class="formRow flex wrap">
                      <div class="formBlock mcol-xs-12 mcol-sm-6">
                        <label>Сумма кредита</label>
                      </div>
                      <div class="formBlock mcol-xs-12 mcol-sm-4">
                        <p class="resAmount-js">4704грн</p>
                      </div>
                    </div>

                    <div class="formRow flex wrap">
                      <div class="formBlock mcol-xs-12 mcol-sm-6">
                        <label>Сумма процентов</label>
                      </div>
                      <div class="formBlock mcol-xs-12 mcol-sm-4">
                        <p class="resOverPayment-js">3.76грн</p>
                      </div>
                    </div>

                </div>

                <div class="buttonWrapper submitButtonWrapper">
                  <button type="button" class="standardButton white border-decor popupCloseButton">Редактировать</button>
                </div>
            </div>

            <div class="sectionBlockColumn_md mcol-xs-12 mcol-md-6 flex column">
            
                <form action="#" class="standard-form calculate-form contentRow">
                    
                    <div class="contentRow formRow flex wrap">
                      <div class="formBlock mcol-xs-12 mcol-sm-5">
                        <label for="401m">ФИО</label>
                      </div>
                      <div class="formBlock mcol-xs-12 mcol-sm-7">
                        <input id="401m" class="border-decor" type="text" placeholder="Впишите свое полное имя">
                      </div>
                    </div>
                    
                    <div class="formRow flex wrap">
                      <div class="formBlock mcol-xs-12 mcol-sm-5">
                        <label for="402m">Номер телефона</label>
                      </div>
                      <div class="formBlock mcol-xs-12 mcol-sm-7">
                        <input id="402m" class="border-decor" type="text" placeholder="+38">
                      </div>
                    </div>

                    <div class="formRow flex wrap">
                      <div class="formBlock mcol-xs-12 mcol-sm-5">
                        <label for="403m">E-mail</label>
                      </div>
                      <div class="formBlock mcol-xs-12 mcol-sm-7">
                        <input id="403m" class="border-decor" type="email" placeholder="Впишите электронный адрес">
                      </div>
                    </div>

                    <div class="formRow chosen-wrapper flex wrap">
                      <div class="formBlock mcol-xs-12 mcol-sm-5">
                        <label for="404m">Город</label>
                      </div>
                      <div class="formBlock mcol-xs-12 mcol-sm-7">
                        <select id="404m" data-placeholder="Выберите город" class="">
                          <option value=""></option>
                          <option value="1" >Без статуса</option>
                          <option value="2" >Option 2</option>
                          <option value="3" >Option 3</option>
                        </select>
                      </div>
                    </div>

                    <div class="formRow flex wrap ">
                      <div class="formBlock mcol-xs-12 mcol-sm-5">
                        <label for="photoDropzoneModal">Загрузить фото изделия</label>
                      </div>
                      <div class="formBlock mcol-xs-12 mcol-sm-7">
                        <div id="photoDropzoneModal" class="js_dropzone photoDropzone" action="#"></div>                        
                      </div>
                    </div>

                                  

                    <div class="submitButtonWrapper">
                        <div class="more-button inversed">
                            <div class="more-button-wrapper">
                                <div class="more-button-container">
                                    <button type="submit" class="title semi-bold">Отправить заявку</button>
                                    <i class="icomoon standard-arrow-icon inversed"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>                
            </div>
        </div>
    </div>
</div>
    @include('site.layouts.footer')
</div>
<!--________SCRIPTS______-->
<script type="text/javascript" src="{{ asset('js/site/jquery-3.3.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/site/infobox.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/site/slick.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/site/chosen.jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/site/index.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/site/popups.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/site/jquery.colorbox.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/site/jquery-ui.min.js') }}"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>
<script type="text/javascript" src="{{ asset('js/site/dropzone.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/site.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/site/calculator.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/site/my-dropzone.js') }}"></script>


@yield('scripts')
</body>
</html>
