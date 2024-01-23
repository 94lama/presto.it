<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Presto.it</title>
</head>
<body>
    <div>
        <h1>Un utente ha richiesto di lavorare con noi</h1>
        <h2>Ecco i suoi dati: </h2>
        <h4>Nome: {{$user->name}}</h4>
        <h4>Email: {{$user->email}}</h4>
        <body>
            <h4>Messaggio</h4>
            <p>{{$text}}</p>
        </body>
        <p>Clicca qui per renderlo revisore: {{-- {{$request->message}} --}}</p>
        <a href="{{route('make.revisor', compact('user'))}}">Rendi revisore</a>
    </div>
</body>
</html>