@extends('layouts.admin')

@section('title', isset($user) ? 'Edit User - Admin' : 'Create User - Admin')
@section('topTitle', isset($user) ? 'Edit User' : 'Create User')

@section('content')
<div class="wrap">
    <div class="whitePanel" style="max-width: 700px; margin: 0 auto;">
        <div class="panelHead">
            <div>
                <h5>{{ isset($user) ? 'Edit User' : 'Create New User' }}</h5>
                <small>{{ isset($user) ? 'Update user information' : 'Add a new user to the system' }}</small>
            </div>
            <a href="{{ isset($user) ? route('admin.users.show', $user) : route('admin.users') }}" style="padding: 8px 16px; border-radius: 8px; background: #6b7280; color: white; font-size: 12px; font-weight: 900; text-decoration: none;">
                ← Back
            </a>
        </div>

        @if($errors->any())
            <div style="margin: 12px 14px; padding: 12px; background: #fee2e2; border: 1px solid #ef4444; border-radius: 8px;">
                <ul style="margin: 0; padding-left: 20px; color: #dc2626; font-size: 12px;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ isset($user) ? route('admin.users.update', $user) : route('admin.users.store') }}" style="padding: 20px;">
            @csrf
            @if(isset($user))
                @method('PUT')
            @endif



            <div style="margin-bottom: 16px;">
                <label style="display: block; font-size: 11px; font-weight: 900; color: #6b7280; margin-bottom: 6px;">Full Name *</label>
                <input type="text" name="name" value="{{ old('name', isset($user) ? $user->name : '') }}" required
                    style="width: 100%; height: 40px; padding: 0 12px; border-radius: 8px; border: 1px solid rgba(0,0,0,.1); font-size: 13px;"
                    placeholder="John Doe" />
            </div>

            <div style="margin-bottom: 16px;">
                <label style="display: block; font-size: 11px; font-weight: 900; color: #6b7280; margin-bottom: 6px;">Email *</label>
                <input type="email" name="email" value="{{ old('email', isset($user) ? $user->email : '') }}" required
                    style="width: 100%; height: 40px; padding: 0 12px; border-radius: 8px; border: 1px solid rgba(0,0,0,.1); font-size: 13px;"
                    placeholder="user@example.com" />
            </div>

            <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 16px; margin-bottom: 16px;">
                <div>
                    <label style="display: block; font-size: 11px; font-weight: 900; color: #6b7280; margin-bottom: 6px;">Password {{ isset($user) ? '(leave blank to keep current)' : '*' }}</label>
                    <div style="position: relative;">
                        <input type="password" name="password" id="password_input" {{ isset($user) ? '' : 'required' }}
                            style="width: 100%; height: 40px; padding: 0 40px 0 12px; border-radius: 8px; border: 1px solid rgba(0,0,0,.1); font-size: 13px;" />
                        <button type="button" onclick="togglePasswordVisibility('password_input', 'eye_icon_1')" style="position: absolute; right: 10px; top: 10px; background: none; border: none; cursor: pointer; color: #9ca3af; padding: 0; display: flex;">
                            <svg id="eye_icon_1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 20px; height: 20px;">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div>
                    <label style="display: block; font-size: 11px; font-weight: 900; color: #6b7280; margin-bottom: 6px;">Confirm Password {{ isset($user) ? '(leave blank to keep current)' : '*' }}</label>
                    <div style="position: relative;">
                        <input type="password" name="password_confirmation" id="password_confirmation_input" {{ isset($user) ? '' : 'required' }}
                            style="width: 100%; height: 40px; padding: 0 40px 0 12px; border-radius: 8px; border: 1px solid rgba(0,0,0,.1); font-size: 13px;" />
                        <button type="button" onclick="togglePasswordVisibility('password_confirmation_input', 'eye_icon_2')" style="position: absolute; right: 10px; top: 10px; background: none; border: none; cursor: pointer; color: #9ca3af; padding: 0; display: flex;">
                            <svg id="eye_icon_2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 20px; height: 20px;">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; font-size: 11px; font-weight: 900; color: #6b7280; margin-bottom: 6px;">Initial Balance</label>
                <input type="number" name="available_balance" value="{{ old('available_balance', isset($user) ? $user->available_balance : 0) }}" step="0.01" min="0"
                    style="width: 100%; height: 40px; padding: 0 12px; border-radius: 8px; border: 1px solid rgba(0,0,0,.1); font-size: 13px;"
                    placeholder="0.00" />
            </div>

            <div style="display: flex; gap: 12px;">
                <button type="submit" style="flex: 1; height: 44px; border-radius: 8px; background: #111827; color: white; font-size: 13px; font-weight: 900; cursor: pointer; border: none;">
                    {{ isset($user) ? 'Update User' : 'Create User' }}
                </button>
                <a href="{{ isset($user) ? route('admin.users.show', $user) : route('admin.users') }}" style="flex: 1; height: 44px; border-radius: 8px; background: #ef4444; color: white; font-size: 13px; font-weight: 900; text-decoration: none; display: flex; align-items: center; justify-content: center;">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>

<style>
@media (max-width: 768px) {
    .wrap > div { margin: 0 !important; }
    form > div[style*="grid"] { grid-template-columns: 1fr !important; }
}
</style>
<script>
function togglePasswordVisibility(inputId, iconId) {
    const input = document.getElementById(inputId);
    const icon = document.getElementById(iconId);
    
    if (input.type === 'password') {
        input.type = 'text';
        icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />';
    } else {
        input.type = 'password';
        icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" /><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />';
    }
}
</script>
@endsection
