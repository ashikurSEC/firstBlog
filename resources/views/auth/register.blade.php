 
<x-layout>
    
    <div class="mx-auto  max-w-screen-sm card">
        <h1 class="title text-center">Register a new Account</h1>
        <form action="{{ route('register') }}" method="POST">
            @csrf

            {{--! UserName --}}
            <div class="mb-4">
                <label for="Username">Username</label>
                <input type="text" name="username" id="username" value="{{ old('username') }}" class="input @error('username') ring-red-500 @enderror" placeholder="Enter Your Username">

                @error('username')
                    <p class="error">{{ $message }}</p>
                @enderror

            </div>

            {{--! Email --}}
            <div class="mb-4">
                <label for="Email">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" class="input @error('email') ring-red-500 @enderror" placeholder="Enter Your Email">

                @error('email')
                    <p class="error">{{ $message }}</p> 
                @enderror

            </div>

            {{--! Password --}}
            <div class="mb-4">
                <label for="Password">Password</label>
                <input type="password" name="password" id="password" class="input @error('password') ring-red-500 @enderror" placeholder="Enter Your Password">

                @error('password')
                    <p class="error">{{ $message }}</p> 
                @enderror

            </div>

            {{--! Confirm Password --}}
            <div class="mb-8">
                <label for="Confirm Password">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="input @error('password') ring-red-500 @enderror" placeholder="Confirm Your Password">
            </div>

            <button type="submit" class="btn btn-primary">Register</button>
        </form>

    </div>

</x-layout>
