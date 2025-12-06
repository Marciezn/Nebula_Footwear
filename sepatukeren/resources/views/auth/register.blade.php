<x-layoutAuth>

<div class="container">
    <div class="left">

        {{-- FORM REGISTER LARAVEL --}}
        <form action="{{ route('register') }}" method="POST">
            @csrf
            
            <h2>Create Account</h2>
            <p>Sign up to get started with your dashboard</p>

            {{-- Name --}}
            <div class="input-group">
                <label>Full Name</label>
                <input type="text" name="name" placeholder="John Doe" required>
            </div>

            {{-- Email --}}
            <div class="input-group">
                <label>Email</label>
                <input type="email" name="email" placeholder="example@email.com" required>
            </div>

            {{-- Password --}}
            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="********" required>
            </div>

            <button type="submit">Sign Up</button>

            <div class="text-link">
                Already have an account? <a href="{{ route('login') }}">Login</a>
            </div>
        </form>

        {{-- Error alert (opsional) --}}
        @if(session('error'))
            <p style="color:red; margin-top:10px;">{{ session('error') }}</p>
        @endif

    </div>

    <div class="right">
        <img src="{{ asset('websepatu/gambar1.png') }}" alt="Illustration">
    </div>
</div>

</x-layoutAuth>
