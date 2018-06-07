<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <title>Login</title>
</head>
<h3>Login</h3>
<p> Add another Article</p>
<form action="{{ route('login') }}" method = "post">
    @csrf
    <label for="username">Username</label> <input type="text" id="usename" name="username"><br /><br />
    <label for="password">Password:</label> <input type="text" id="password" name="password"><br /><br />
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <button type = "submit">Login</button>
</form>
<a href="{{route('register')}}">Signup</a>
</html>
