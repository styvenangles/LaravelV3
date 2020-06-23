@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><strong>Competences</strong></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                                      
                    <strong>Voici les competences enregistrees :</strong> <br> <br>
                    
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <?php
                      $username = "Nom d'utilisateur";
                      $user_id = Auth::user()->id;
                      $user_rank = Auth::user()->rank;
                    ?>
                    
          <table class="table">
        <thead>
            <tr>
                <td><strong>Nom</strong></td>
                <td><strong>Description</strong></td>
                <td><strong>Logo</strong></td>
                <td><strong>Action</strong></td>
            </tr>
        </thead>
        @foreach($skills as $skill)
        <tbody>
                <tr>
                    <td>{{$skill->name}}</td>
                    <td>{{$skill->description}}</td>
                    <td>{{$skill->logo}}</td>
                    <td><a href="{{ route('skills.show', $skill->id) }}">Modifier</a>
                    <form action="{{ route('skills.destroy', $skill->id) }}" method="post">
                          @csrf
                          @method('DELETE')           
                          <button class="btn btn-danger" type="submit">Supprimer</button>
                    </form></td>
                </tr>
        </tbody>
        @endforeach
    </table>
    <hr><br>
    <strong>Ajouter une competence : </strong><br><br><hr>
    <div id="modify" class="col-md-12">
    <form method="post" class="form" action="{{ route('skills.store') }}">
      @csrf
      <div class="form-group">
        <div class="row">
        <div class="col-md-12">
          <label for="name">Nom:</label>
          <input type="text" class="form-control" name="name" value="{{ old('name') }}" /><br>
          
          <label for="descr">Description :</label>
          <input type="text" class="form-control" name="descr" value="{{ old('descr') }}" /><br>
          
          <label for="Logo">Logo :</label>
          <input type="text" class="form-control" name="logo" value="{{ old('logo') }}" /><br>
        </div>
        </div>
      </div>
      <button type="submit" name="action" class="btn btn-secondary float-right" value="modify">Ajouter</button>
    </form>
      <button type="submit" name="action" class="btn btn-secondary float-left" value="return" onclick="history.go(-1);">Retour</button>
    </div>
                </div>
            </div>
        </div>
        
</div>
@endsection
