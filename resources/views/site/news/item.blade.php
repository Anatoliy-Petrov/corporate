@extends('site.layouts.app')
@include('site.includes.meta_tags', array('meta_tags' => $news))
@section('content')
    <!-- Start of page code insertion here -->
    <div id="newsPage" class="newsPage page">
        <section class="pageSection white-bg">
            <div class="mcontainer">
                <div class="sectionBlock">
                    <div class="sectionHeader">
                        <h1 class="title article-title">{{ $news['title_'.$locale] }}</h1>

                        {{ Breadcrumbs::render('news.show', $news->id) }}

                    </div>
                </div>

                <div class="sectionBlock contentBlock flex wrap">

                    <div class="sectionBlockColumn_sm image-block mcol-xs-12 mcol-sm-6">
                        <div class="contentRow relative">
                            <div class="overlayed-date-container">
                                <span>{{ \Jenssegers\Date\Date::parse($news->created_at)->format('d F Y') }}</span>
                            </div>

                            <div class="main-image imgWrapper">
                                <img src="{{ '/storage/images/news/'.$news->image }}" alt="img">
                            </div>
                        </div>

                        @include('site.includes.share')

                    </div>

                    <div class="sectionBlockColumn_sm mcol-xs-12 mcol-sm-6">
                        <div class="contentRow">
                            <div class="description">
                                {!! $news['description_'.$locale] !!}
                            </div>
                        </div>

                        <div class="contentRow images-row mrow flex wrap ">
                            @forelse($news->images as $image)
                                <div class="imgWrapper mcol-xs-6">
                                    <img src="{{ '/storage/images/news/'.$image->path }}" alt="img">
                                </div>
                            @empty
                            @endforelse
                        </div>

                        <div class="contentRow">
                            <a href="#" class="link-with-icon"><i class="icomoon icon-youtube"></i> <span>https://www.youtube.com/</span></a>
                        </div>
                    </div>

                </div>

                @include('site.includes.calculate_button')

            </div>
        </section>
    </div>

    <!-- End of page code insertion here -->


@endsection