@if(Auth::guard('web')->check())
    <p class="text-success">You are logged IN as <strong>USER</strong></p>
    @else
    <p class="text-danger">You are logged OUT as <strong>USER</strong></p>
@endif

@if(Auth::guard('admin')->check())
    <p class="text-success">You are logged IN as <strong>ADMIN</strong></p>
    @else
    <p class="text-danger">You are logged OUT as <strong>ADMIN</strong></p>
@endif