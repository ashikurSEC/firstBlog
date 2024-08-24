 
<x-layout>
    
    <div class="mx-auto  max-w-screen-sm card">
        <h1 class="title text-center">Welcome Back</h1>
        <form action="{{ route('login') }}" method="POST">
            @csrf

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

            {{--! Remember Checkbox --}}
            <div class="mb-4">
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Remember Me</label>

                @error('failed')
                    <p class="error">{{ $message }}</p> 
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Login</button>
        </form>

    </div>

</x-layout>
