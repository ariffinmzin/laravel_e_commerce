@extends('layouts.master')

@section('content')
<div class="card">
    <div class="card-header">
        My Profile
    </div>
    <div class="card-body">

        @if(Session::has('message'))
        <div class="alert alert-success">
            {{ Session::get('message') }}
        </div>
        @endif


        <form method="post" action="{{ route('profile.post') }}">
            @csrf

            <table>
                <tr>
                    <td>Name</td>
                    <td><input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control">
                    @error('name')
                        <span class="text-danger"><strong>{{ $message }}</strong></span>
                    @enderror
                </td>
                 
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="text" name="email" value="{{ old('email', $user->email) }}" class="form-control">
                    @error('email')
                        <span class="text-danger"><strong>{{ $message }}</strong></span>
                    @enderror
                </td>
                   
                </tr>
                <tr>
                    <td>Phone</td>
                    <td><input type="text" name="phone" value="{{ old('phone', $user->phone) }}" class="form-control">
                    @error('phone')
                        <span class="text-danger"><strong>{{ $message }}</strong></span>
                    @enderror</td>
                   
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password" class="form-control">
                    @error('password')
                        <span class="text-danger"><strong>{{ $message }}</strong></span>
                    @enderror</td>
                   
                </tr>
                <tr>
                    <td>Password Confirmation</td>
                    <td><input type="password" name="password_confirmation" class="form-control">
                    @error('password_confirmation')
                        <span class="text-danger"><strong>{{ $message }}</strong></span>
                    @enderror</td>
                   
                </tr>
                <tr>
                    <td></td>
                    <td><button type="submit" class="btn btn-primary">Submit</button></td>
                </tr>
                
            </table>
        </form>
    </div>
   
</div>

@endsection