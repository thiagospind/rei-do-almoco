@extends('layout.app')

@section('body')
<div class="container-fluid h-100">


    <div class="form-group ">
        <div class="alert alert-primary mt-3 text-center col-xl-auto"  role="alert" >
            <h5>A votação acontece todos os dias, entre 10:00 e 12:01!</h5>
            <span class="clock" id="clock"></span>
        </div>
    </div>

    @if(count($candidate) > 0 )
        <section class="grid grid-template-columns">
            @foreach( $candidate as $cand)
            <form method="post" action="/votar">
                @csrf
                <div class="card card-voto">
                    <input value="{{$cand->id}}" name="id" id="id" hidden>
                    <img src="{{asset('/storage/pictures/'.$cand->picture)}}" class="img-thumbnail" alt="...">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{$cand->name}}</h5>
                        <button class="btn btn-outline-success" type="submit" {{$isTimeVote != true ? 'hidden' : ''}}>Votar</button>
                    </div>
                </div>
            </form>
            @endforeach
            <div class="row justify-content-center align-items-center">
                {{$candidate->links()}}
            </div>
        </section>
    @endif
</div>
@endsection
