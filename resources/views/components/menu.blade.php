@php($user = Auth::user())

<a class="btn btn-primary w-100 mb-2" href="{{ route('home') }}">Home</a>
<a class="btn btn-primary w-100 mb-2">My Order</a>



@if($user->role == 'admin')
<a class="btn btn-info w-100 mb-2">Manage Orders</a>
<a class="btn btn-info w-100 mb-2" href="{{ route('product.index') }}">Manage Products</a>
<a class="btn btn-info w-100 mb-2">Manage Users</a>

@endif


<a class="btn btn-primary w-100 mb-2" href="{{ route('profile') }}">Profile</a>
<button type="button" class="btn btn-danger w-100 mb-2" onclick="document.getElementById('logout-form').submit();">Logout</a>