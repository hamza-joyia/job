<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>


            <td>
                Post
            </td>
            <td>

            </td>
            <td>

            </td>
        </tr>

        @foreach($val as $value)
            <tr>
            <td>
                {{$value->id}}
            </td>

            <td>
                {{$value->post}}
            </td>

            <td>
                <a href="http://localhost/crud/"+{{$value->id}}>edit</a>
            </td>
        </tr>
        @endforeach

    </table>
</body>
</html>