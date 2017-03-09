<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>User list</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!--Css-->
        <link rel="stylesheet" type="text/css" media="all" href="{{ asset('')}}/css/app.css" />
        <script type="text/javascript" src="{{ asset('')}}js/jquery.js"></script>

        <script type="text/javascript">
            $(document).ready(function(){
                $('.footable').footable();
            });
        </script>

    </head>
    <body>
    <form action="search" method="get">

    @if($users)
        <table class="footable" border="1">
            <thead style="border: 1px solid">
                <td>Name</td>
                <td>Surname</td>
                <td>Phone</td>
                <td>Address</td>
                <td>Дата створення
                    <button name="created" class="txt" id="created" value="down">Вниз</button>
                    <button name="created" class="txt" id="created" value="up">Вгору</button>
                </td>
                <td>
                    Count comment
                    <button name="count" class="txt" id="created" value="down">Вниз</button>
                    <button name="count" class="txt" id="created" value="up">Вгору</button>
                </td>
                <td>Last comment</td>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->surname}}</td>
                        <td>{{$user->phone}}</td>
                        <td>{{$user->address}}</td>
                        <td>{{$user->created_at}}</td>
                        <td>{{$user->comments()->count()}}</td>
                        <td>{{$user->lastComment()}}</td>
                    </tr>

                @endforeach
            </tbody>
        </table>
    @endif
    <br>

Search:


        <select name="tag">
            <option value=name>Name</option>
            <option value=surname>Surname</option>
            <option value=address>Address</option>
            <option value=phone>Phone</option>
        </select>
        <input name="text">
        <input type="submit" value="Filter" />
    </form>
    </body>
</html>
