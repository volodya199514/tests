<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>User list</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!--Css-->
        <link rel="stylesheet" type="text/css" media="all" href="{{ asset('')}}/css/app.css" />


    </head>
    <body>

    @if($users)
        <table class="footable" border="1">
            <thead style="border: 1px solid">
                <td>Name</td>
                <td>Surname</td>
                <td>Phone</td>
                <td>Address</td>
                <td>Дата створення
                        <button type="button" name="created" class="getRequest" id="created" value="down">Вниз</button>
                        <button type="button" name="created" class="getRequest" id="created" value="up">Вгору</button>
                </td>
                <td>
                    Count comment
                        <button name="count" class="getRequest" id="count" value="down">Вниз</button>
                        <button name="count" class="getRequest" id="count" value="up">Вгору</button>
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
        <select id="select" name="tag">
            <option value=name>Name</option>
            <option value=surname>Surname</option>
            <option value=address>Address</option>
            <option value=phone>Phone</option>
        </select>
        <input id="filter_text" name="text">
        <input id="filter" class="getRequest" type="submit" value="filter" />

    <script src="js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript">

        jQuery(document).ready(function($){
            $('.getRequest').click(function(){
                var func = this.id;
                var range = this.value;
                var select = $('#select').val();
                var text = $('#filter_text').val();

                $.get(
                    $( this ).prop( 'action' ),
                    {
                        "select": select,
                        "text": text,
                        "func": func,
                        "range": range
                    },
                    function( data ) {
                        $("tbody").html(data['html']);
                        //do something with data/response returned by server
                    },
                    'json'
                );
            });
        });
    </script>
    </body>
</html>
