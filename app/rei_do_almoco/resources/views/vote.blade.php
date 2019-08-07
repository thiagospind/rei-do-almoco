@extends('layout.app')

@section('title','Votação')

@section('body')
{{--<div class="container-fluid h-100">--}}
<section id="main">

    <div class="page-header form-group">
        <div class="alert alert-primary text-center"  role="alert" >
            <h5>A votação acontece todos os dias, entre 10:00 e 12:01!</h5>
            <span class="clock" id="clock"></span>
        </div>
    </div>
    <div class="col-left">
        <div class="container-fluid">
            <div class="py-3 text-center">
                <h3>Reis das Semanas anteriores</h3>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Nome</th>
                        <th>Semana</th>
                        <th>Votos</th>
                    </tr>
                </thead>
                <tbody>
                @if(count($weekWinner) > 0)
                    @foreach($weekWinner as $winner)
                    <tr>
                        <td class="align-middle"><img class="img-thumbnail" src="{{asset('/storage/pictures/'.$winner->picture)}}"></td>
                        <td class="align-middle">{{$winner->name}}</td>
                        <td class="align-middle">{{$winner->week_year}}</td>
                        <td class="align-middle">{{$winner->qtd}}</td>
                    </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
    @if(count($candidate) > 0 )
    <div class="col-center subgrid">
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
            {{$candidate->links()}}
    </div>

    <div class="col-right"></div>

    @endif
{{--</div>--}}
</section>
@endsection
