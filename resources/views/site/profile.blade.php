@extends('layouts.app')

@section('content')


<section class="contact_section layout_padding">
    <div class="contact_bg_box">
      <img src="{{asset('assets/front/images/contact-bg.jpg')}}" alt="">
    </div>
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
		Member Profile
        </h2>
      </div>
      <div >
        <div class="row">
          <div class="col-md-7 mx-auto">
          {{$user->name}}  balance is : {{$user->balance}}

          <form method="POST" action="{{ route('update_profile') }}">
                        @csrf
              <div class="contact_form-container">
                <div class="row">
                 <input type="hidden" name="id" value="{{$user->id}}">
                <div class="col-sm-12">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                 name="name" value="{{old('name', $user->name)}}" placeholder="Name" autocomplete="name">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                  <div class="col-sm-12">
					<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
					name="email" value="{{old('email', $user->email)}}" placeholder="Email"  autocomplete="email">

					@error('email')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror

                  </div>
                  <div class="col-sm-12">
				  <input id="password" type="password" placeholder="password"class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

					@error('password')
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