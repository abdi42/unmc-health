@extends('layouts.dashboard')

@section('content')
  <form action="/admin/{{$user->id}}" method="POST">
    @method('PATCH')
    @csrf
    <div class="row justify-content-center">
      <div class="col-10">
        <div class="card">
          <div class="card-body p-5">
            <h3 class='sub-header'>Edit user {{$user->name}}</h3>
            <br>
            <br>

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} row">
              <label for="name" class="col-sm-4 font-weight-bold col-form-label">Name</label>
              <div class="col-sm-8">
                <input type="text" name="name" class="form-control" value="{{$user->name}}">
              </div>
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} row mt-4">
              <label for="email" class="col-sm-4 font-weight-bold col-form-label">E-Mail Address</label>
              <div class="col-sm-8">
                <input type="text" name="email" class="form-control" value="{{$user->email}}">
              </div>
            </div>

            <div class="form-group row mt-4">
              <label for="role" class="col-sm-4 font-weight-bold col-form-label">User Role</label>
              <div class="col-sm-8">
                <select name="role" class="form-control">
                  @foreach($roles as $id=>$role)
                    <option value="{{$id}}" {{$id == $user->role->id ? "selected=" : ""}}>{{$role}}</option>
                  @endforeach
                </select>
              </div>
            </div>


            <div class="form-group mt-5">
              <div class="col-md-12">
                <button type="submit" name="action" value="submit" class="btn btn-success float-right">Save</button>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </form>
@endsection