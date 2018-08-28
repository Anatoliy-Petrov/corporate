<section class="pageSection smallSection">
    <div class="mcontainer">
        <div class="content-wrapper">
            <h2 class="title section-title">{{ trans('main.get_news') }}</h2>

            <form action="{{ route('subscribe') }}" class="subscribe-form" id="newsSubscribeForm">
                <div class="formRow relative">
                    <input class="border-decor" type="email" placeholder="Ваш email" name="email">
                    <button class="standardButton black border-decor submitButton  newsSubscribeButton">{{ trans('main.subscribe') }}</button>
                </div>
            </form>
        </div>
    </div>
</section>