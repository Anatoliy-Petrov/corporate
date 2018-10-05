@extends('site.layouts.app')

@include('site.includes.meta_tags')

@section('content')


    <!-- Start of page code insertion here -->
    <div class="form-group">
      <form action="/calculator/requests" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="files[]" value="myname">
        <input type="hidden" name="files[]" value="mynamghghbne">
        <input type="hidden" name="files[]" value="mynabnbnme">
        <input type="hidden" name="files[]" value="myna565656me">
        <input type="text" name="hallmark" value="585">
        <input type="text" name="category" value="gold">
        <input type="text" name="client_status" value="without">
        <input type="text" name="city" value="city">
        <input type="text" name="tariff" value="tariff">
        <input type="text" name="term" value="15">
        <input type="text" name="amount" value="6541">
        <input type="text" name="overpayment" value="465">
        <input type="text" name="phone" value="6566565">
        <input type="text" name="email" value="mail">
        <input type="text" name="stone" value="0">
        <input type="text" name="weight" value="5">
        <input type="file" name="image">
        {{--<input type="file" multiple name="img[]">--}}
        <button type="submit">save</button>
      </form>
    </div>
  <div class="form-group">

  </div>


    

@endsection