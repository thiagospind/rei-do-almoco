@extends('layout.app')

@section('body')
    <div class="container">
        <div class="card">
            <div class="py-3 text-center">
                <h2>Pretendentes</h2>
            </div>
            <div class="card-body">
                @if(count($pretendente) > 0 )
                    <table class="table table-bordered table-hover table-striped rounded">
                        <thead class="text-center">
                            <tr>
                                <th>Foto</th>
                                <th>Nome</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pretendente as $pret)
                                <tr>
                                    <td><img class="img-thumbnail" src="{{$pret->picture}}"></td>
                                    <td>{{$pret->name}}</td>
                                    <td>{{$pret->email}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                {{$pretendente->links()}}
                @endif
            </div>
        </div>
    </div>
@endsection
