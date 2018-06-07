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
    <title>Post</title>
</head>
<h3>Post</h3>
<form action="{{ route('create') }}" method = "post">
    <label for="username">Post</label> <input type="text" id="post" name="post"><br /><br />
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <button type = "submit">add post </button>
</form>
<a href="{{route('crud')}}">View</a>
</html>
