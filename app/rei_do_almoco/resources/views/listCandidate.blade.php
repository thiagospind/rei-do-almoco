@extends('layout.app')

@section('body')
    <div class="container">
        <div class="card mt-3 pt-3">
            <div class="py-3 text-center">
                <h2>Candidatos</h2>
            </div>
            <div class="card-body">
                @if(count($candidate) > 0 )
                    <table class="table table-bordered table-hover table-striped rounded">
                        <thead class="text-center">
                            <tr>
                                <th>Foto</th>
                                <th>Nome</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($candidate as $cand)
                                <tr>
                                    <td><img class="img-thumbnail" src="{{asset('/storage/pictures/'.$cand->picture)}}"></td>
                                    <td>{{$cand->name}}</td>
                                    <td>{{$cand->email}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                {{$candidate->links()}}
                @endif
            </div>
        </div>
    </div>
@endsection
