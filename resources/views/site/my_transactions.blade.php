@extends('layouts.app')

@section('content')


<section class="contact_section layout_padding">
    <div class="contact_bg_box">
      <img src="{{asset('assets/front/images/contact-bg.jpg')}}" alt="">
    </div>
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
		My transactions
        </h2>
      </div>
      <br>
      <div class="">
        <div class="row">
          <div class="col-md-7 mx-auto">

          <table class="table table-dark">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">sender</th>
                <th scope="col">receiver</th>
                <th scope="col">type</th>
                <th scope="col">amount</th>
                <th scope="col">status</th>
                </tr>
            </thead>
            <tbody>
            @if($transactions->count())
            	@php $counter = 1 ; @endphp 
                @foreach($transactions as $transaction)
                <tr>
                <th scope="row">{{ $counter }}</th>
                <td>{{$transaction->sender->name}}</td>
                <td>{{$transaction->receiver->name}}</td>
                <td>{{$transaction->getStatus()}}</td>
                <td>{{$transaction->amount}}</td>
                <td>{{$transaction->status}}</td>
                </tr>
                @php $counter++ ; @endphp 
                @endforeach
            @endif
            </tbody>
            </table>
            <div class="d-flex p-2">
            {{ $transactions->links() }}
            </div>
            

          </div>
        </div>
      </div>
    </div>
  </section>


@endsection