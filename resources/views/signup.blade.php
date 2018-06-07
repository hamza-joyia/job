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
    <title>Register</title>
</head>
<h3>Register</h3>
<form action="{{ route('signup') }}" method = "post">
    <label for="username">Username</label> <input type="text" id="usename" name="username"><br /><br />
    <label for="password">Password:</label> <input type="text" id="password" name="password"><br /><br />
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <button type = "submit">Register</button>
</form>

</html>
