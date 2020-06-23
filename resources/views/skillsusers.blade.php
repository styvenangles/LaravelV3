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
                                      
                    <strong>Voici vos competences aquises :</strong> <br> <br>
                    
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
                <td><strong>Niveau</strong></td>
                <td><strong>Description</strong></td>
                <td><strong>Logo</strong></td>
                <td><strong>Action</strong></td>
            </tr>
        </thead>
        @foreach($user->skills as $skill)
        <tbody>
                <tr>
                    <td>{{$skill->name}}</td>
                    <td>{{$skill->pivot->level}}</td>
                    <td>{{$skill->description}}</td>
                    <td>{{$skill->logo}}</td>
                    <td><a href="{{ route('skillsuser.edit', $skill->id) }}">Modifier</a>
                    <form action="{{ route('skillsuser.destroy', $skill->id) }}" method="post">
                          @csrf
                          @method('DELETE')           
                          <input type="text" class="form-control" name="user_id" value="{{ $user->id }}" hidden/><br>
                          <button class="btn btn-danger" type="submit">Supprimer</button>
                    </form></td>
                </tr>
        </tbody>
        @endforeach
    </table>
    <br><hr><br>
    <strong>Ajouter une competence : </strong><br><br><hr>
    <div id="modify" class="col-md-12">
    <form method="post" class="form" action="{{ route('skillsuser.store', $user->id) }}">
      @csrf
      <div class="form-group">
        <div class="row">
        <div class="col-md-12">
          <label for="id">Votre ID:</label>
          <input type="text" class="form-control" name="id" value="{{ $user->id }}" readonly/><br>
          
          <label for="skill">Competence :</label>
          <select id="skill" class="form-control @error('skill') is-invalid @enderror" name="skill" value="{{ old('skill') }}" autocomplete="skill" autofocus>
                            @foreach($skills as $skill)
                              <option value="{{$skill->id}}">{{ $skill->name }}</option>                
                            @endforeach
          </select><br>
          
          <label for="level">Niveau :</label>
          <select id="level" class="form-control @error('level') is-invalid @enderror" name="level" value="{{ old('level') }}" autocomplete="level" autofocus>
                              <option>1</option>
                              <option>2</option>
                              <option>3</option>
                              <option>4</option>
                              <option>5</option>
          </select><br>
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
