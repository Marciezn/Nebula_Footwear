<x-layoutAuth>

<div class="container">
    <div class="left">

        {{-- FORM LOGIN LARAVEL --}}
        <form action="{{ route('login') }}" method="POST">
            @csrf

            <h2>Login</h2>
            <p>Welcome back! Please login to your account</p>

            {{-- Email --}}
            <div class="input-group">
                <label>Email</label>
                <input 
                    type="email" 
                    name="email" 
                    placeholder="example@email.com"
                    value="{{ old('email') }}"
                    required 
                    class="@error('email') error-input @enderror"
                >

                @error('email')
                    <small class="error-text">{{ $message }}</small>
                @enderror
            </div>

            {{-- Password --}}
            <div class="input-group">
                <label>Password</label>
                <input 
                    type="password" 
                    name="password" 
                    placeholder="********" 
                    required
                    class="@error('password') error-input @enderror"
                >

                @error('password')
                    <small class="error-text">{{ $message }}</small>
                @enderror
            </div>

            {{-- GLOBAL LOGIN ERROR --}}
            @if(session('error'))
            <div class="error-alert">
                {{ session('error') }}
            </div>
            @endif

            <button type="submit">Login</button>

            <div class="text-link">
                Don't have an account?
                <a href="{{ route('register') }}">Sign up</a><br>
                <a href="#">Forgot password?</a>
            </div>
        </form>
    </div>

    <div class="right">
        <img src="{{ asset('websepatu/gambar1.png') }}" alt="Illustration">
    </div>
</div>

</x-layoutAuth>
