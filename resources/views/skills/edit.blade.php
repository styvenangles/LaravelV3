@extends('layouts.app')

@section('title', 'Update Table')

@section('content')
  <div class="container">
    <div class="row">
    <div id="modify" class="col-md-12">
    <div class="card">
                <div class="card-header"><strong>{{ $skill->name }}</strong></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                                      
                    <strong>Vous modifier la competence {{$skill->name}} :</strong> <br>
                    
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
               <hr>
    <div id="modify" class="col-md-12">
    <form method="post" class="form" action="{{ route('skills.update', $skill->id) }}">
      @method('PATCH')
      @csrf
      <div class="form-group">
        <div class="row">
        <div class="col-md-12">
          <label for="name">Nom:</label>
          <input type="text" class="form-control" name="name" value="{{ $skill->name }}" /><br>
          
          <label for="descr">Description :</label>
          <input type="text" class="form-control" name="descr" value="{{ $skill->description }}" /><br>
          
          <label for="Logo">Logo :</label>
          <input type="text" class="form-control" name="logo" value="{{ $skill->logo }}" /><br>
        </div>
        </div>
      </div>
      <button type="submit" name="action" class="btn btn-secondary float-right" value="modify">Modifier</button>
    </form>
      <button type="submit" name="action" class="btn btn-secondary float-left" value="return" onclick="history.go(-1);">Retour</button>
    </div>
                </div>
    </div>
    </div>    
  </div>
@endsection