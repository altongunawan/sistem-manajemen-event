<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Page</title>
</head>
<body>
    <form action="{{ route('registerUser') }}" method="post">
        @csrf


        {{-- Response Feedback --}}
        @if (Session::has('success'))
            <div>{{ Session::get('success') }}</div>
        @endif
        @if (Session::has('failed'))
            <div>{{ Session::get('failed') }}</div>
        @endif
        {{-- End Response Feedback --}}


        <table>
            <thead>
                <tr>
                    <td colspan="3" style="text-align: center;"> Register </td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><label for="name">Name</label></td>
                    <td> : </td>
                    <td>
                        <input type="text" name="name" id="name" required value="{{ old('name') }}">
                        @error('name')
                            {{ $message }}
                        @enderror   
                    </td>
                </tr>
                <tr>
                    <td><label for="email">Email</label></td>
                    <td> : </td>
                    <td>
                        <input type="text" name="email" id="email" required value="{{ old('email') }}">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td><label for="password">Password</label></td>
                    <td> : </td>
                    <td>
                        <input type="password" name="password" id="password" required>
                        @error('password')
                            {{ $message }}
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="text-align: center;"><button type="submit"> Register! </button></td>
                </tr>
            </tbody>
        </table>
   
    </form>
    <a href="{{ route('login') }}">Already Registered? Login Now!</a>
</body>
</html>