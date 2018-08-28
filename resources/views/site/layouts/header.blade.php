<header class="mainHeader">

    <section class="top-section">
        <div class="mcontainer">

            <div class="content-wrapper flex wrap">
                <div class="section-element mcol-xs-hide mcol-md-show mcol-md-auto">
                    <a href="{{ route('faqs') }}" class="faq">{{ trans('main.faqs') }}</a>
                </div>

                <div class="section-element phone mcol-xs-12 mcol-md-auto">
                    <i class="icomoon icon-phone mcol-xs-hide mcol-md-show"></i>
                    <span class="text">{{ trans('main.call_free') }}</span>
                    <span>{{ $settings->phone }}</span>
                </div>

                <div class="section-element buttonWrapper mcol-xs-6 fluid mcol-md-auto">
                    <span>{{ trans('main.search') }}</span>
                    <button id="searchButton" type="button" class="searchButton">
                        <i class="icomoon icon-search"></i>
                    </button>
                </div>

                <div class="section-element language">
                    <i class="icomoon icon-language"></i>
                    <ul class="lang-list">
                        <li {{ $locale === 'ru' ? 'class="active"' : '' }}>
                            <a href="{{ route('setlocale', ['lang' => 'ru']) }}">RU</a>
                        </li>
                        <li {{ $locale === 'uk' ? 'class="active"' : '' }}>
                            <a href="{{ route('setlocale', ['lang' => 'uk']) }}">UA</a>
                        </li>
                    </ul>
                </div>

                <ul class="section-element social-media-list mcol-xs-12 mcol-md-auto backgroundMock">
                    <li><a href="{{ $settings->email }}" class="icomoon icon-envelope"></a></li>
                    <li><a href="{{ $settings->viber }}" class="icomoon icon-viber"></a></li>
                    <li><a href="{{ $settings->instagram }}" class="icomoon icon-inst"></a></li>
                    <li><a href="{{ $settings->facebook }}" class="icomoon icon-facebook"></a></li>
                    <li><a href="{{ $settings->youtube }}" class="icomoon icon-youtube"></a></li>
                </ul>
            </div>

        </div>
    </section>

    <section class="bottom-section">
        <div class="mcontainer backgroundMock">
            <div class="menuMainWrapper">

                <div class="logo-wrapper">
                    <a href="{{ route('site.home') }}" class="icomoon icon-logo-capital"></a>
                </div>

                <div class="menuBlock relative flex center">
                    <a href="#" class="gift-button">
                        <i class="icomoon icon-present"></i>
                        <span class="action">-20%</span>
                    </a>

                    <div class="credit-block">
                        <i class="icomoon icon-calculator"></i>
                        <a href="#"><span>{{ trans('main.calculate') }}</span> <span>{{ trans('main.credit') }}</span></a>
                    </div>

                    <nav id="navMenuWrapper" class="navMenuWrapper hiddenContent scale opacityAnimate">
                        <div id="navMenuContainer" class="navMenuContainer">
                            <div class="menu-logo">
                                <a href="{{ route('home') }}" class="icomoon icon-logo-capital"></a>
                            </div>

                            <ul class="navMenu menu-section accordionMenu">
                                <li class="@@aboutUs"><span class="accordionButton">{{ trans('main.credits') }}</span>
                                    <div class="submenuWrapper">
                                        <ul class="submenu">
                                            <li><a href="{{ route('tariffs') }}">{{ trans('main.tariff_plans') }}</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="@@countriesList"><span class="accordionButton">{{ trans('main.offices') }}</span>
                                    <div class="submenuWrapper">
                                        <ul class="submenu">
                                            <li><a href="#">Отделения 1</a></li>
                                            <li><a href="#">Отделения 2</a></li>
                                            <li><a href="#">Отделения 3</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="@@stories"><a href="{{ route('actions') }}">{{ trans('main.actions') }}</a></li>
                                <li class="@@feedback"><a href="/feedback.html">{{ trans('main.for_clients') }}</a></li>
                                <li class="@@contacts"><a href="{{ route('pages.show', ['page' => 'about']) }}" class="accordionButton">{{ trans('main.about') }}</a>
                                    <div class="submenuWrapper">
                                        <ul class="submenu">
                                            <li><a href="{{ route('pages.show', ['page' => 'contacts']) }}">{{ trans('main.contacts') }}</a></li>
                                            <li><a href="{{ route('news') }}">{{ trans('main.news') }}</a></li>
                                            <li><a href="{{ route('reports') }}">{{ trans('main.financial_reports') }}</a></li>
                                            <li><a href="{{ route('pages.show', ['page' => 'rewards']) }}">{{ trans('main.company_rewards') }}</a></li>
                                            <li><a href="{{ route('pages.show', ['page' => 'collaboration']) }}">{{ trans('main.collaboration') }}</a></li>
                                            <li><a href="{{ route('vacancies') }}">{{ trans('main.vacancies') }}</a></li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                            <!--  -->
                            <div class="menu-section oneline-chat">
                                <i class="icomoon icon-chat"></i>
                                <a href="#"><span>{{ trans('main.online_chat') }}</span></a>
                            </div>

                            <div class="menu-section credit-block-menu">
                                <i class="icomoon icon-calculator"></i>
                                <a href="#"><span>{{ trans('main.calculate_credit') }}</span></a>
                            </div>

                            <div class="menu-section auth-section">
                                <a href="#" class="standardButton secondary border-decor">
                                    <i class="icomoon icon-login"></i>
                                    <span>{{ trans('main.private_office') }}</span>
                                </a>
                            </div>

                            <div class="menu-section faq-section">
                                <a href="#">{{ trans('main.faqs') }}</a>
                            </div>

                        </div>
                    </nav>

                    <button id="burgerButton" type="button" class="burgerButton mobileMenuButton">
                        <i class="icomoon icon-burger"></i>
                    </button>

                </div>
            </div>
        </div>
    </section>
</header>