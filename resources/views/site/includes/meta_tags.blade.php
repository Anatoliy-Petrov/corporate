@section('meta_title') <title>{{ $meta_tags['meta_title_'.$locale] or env('APP_NAME') }}</title>  @endsection
@section('meta_description') <meta name="description" content="{{ $meta_tags['meta_description_'.$locale] or 'Ломбард Капитал' }}"> @endsection
@section('meta_keywords') <meta name="keywords" content="{{ $meta_tags['meta_keywords_'.$locale] }}"> @endsection