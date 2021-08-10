@extends('layouts.app')

@section('content')


<section class="contact_section layout_padding">
    <div class="contact_bg_box">
      <img src="{{asset('assets/front/images/contact-bg.jpg')}}" alt="">
    </div>
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
		Transfer money
        </h2>
      </div>
      <div class="">
        <div class="row">
          <div class="col-md-7 mx-auto">
          <form method="POST" action="{{ route('transfer_money') }}">
                        @csrf
              <div class="contact_form-container">
                <div class="row">
                 <input type="hidden" name="id" value="{{$user->id}}">



                 <div class="col-sm-12">

                 <select name="receiver_id" class="select2 form-control">
                      <optgroup label="Select reviever ">
                          @if($users && $users -> count() > 0)
                              @foreach($users as $user)
                                  <option
                                      value="{{$user -> id }}">{{$user -> name}}</option>
                              @endforeach
                          @endif
                      </optgroup>
                  </select>
                  @error('receiver_id')
                  <span class="text-danger"> {{$message}}</span>
                  @enderror

                </div>
                <div class="col-sm-12">
                  <input id="holder_name" type="text" placeholder="holder name"class="form-control @error('holder_name') is-invalid @enderror"
                  value="{{old('holder_name')}}"  name="holder_name">

                  @error('holder_name')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                
                
                <div class="col-sm-12">
                  <input id="card_number" type="text" placeholder="card number"class="form-control @error('card_number') is-invalid @enderror"
                  value="{{old('card_number')}}"   name="card_number">

                  @error('card_number')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>


                <div class="col-sm-4">

                <input id="expiry_date" type="date" placeholder="expiry date"class="form-control @error('expiry_date') is-invalid @enderror"
                value="{{old('expiry_date')}}" name="expiry_date">

                  @error('expiry_date')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                
                <div class="col-sm-4">

                <input id="amount" type="text" placeholder="amount"class="form-control @error('amount') is-invalid @enderror"
                value="{{old('amount')}}"  name="amount">

                  @error('amount')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>


                

                <div class="col-sm-4">
                <input id="cvc_code" type="text" placeholder="CVC code"class="form-control @error('cvc_code') is-invalid @enderror"
                value="{{old('cvc_code')}}"   name="cvc_code">

                  @error('cvc_code')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>  
                </div>
              
                <div class="btn-box ">
                  <button type="submit">
                    Send
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>


@endsection