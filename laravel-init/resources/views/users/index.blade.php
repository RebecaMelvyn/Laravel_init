@extends('layout')

@section('content')

    <div class="my-4">
        <h1>Liste des utilisateurs</h1>

        <ul class="d-flex flex-wrap align-items-start pl-0">
            @foreach($users as $user)
                <li class="col-3 d-flex flex-column">
                    <div class="top"><img src="https://source.unsplash.com/random/200x150" alt="Image"/></div>
                    <div class="bottom">
                        <div class="name">{{ $user->name }}</div>
                        <div class="email">{{ $user->email }}</div>
                        <div class="role">{{ $user->is_admin }}</div>
                        <a href="{{route('users.show', $user)}}" class="showmore btn btn-primary mt-3 my-1">Voir plus</a>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

@endsection
    <style>
        .col-3{
            background-color: #ffdd40;
            border-radius: 20px;
            box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;
        }
    </style>
