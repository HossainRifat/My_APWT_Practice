<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <div style="margin: 300px;">
        @if ($ip)
            <h3>Platform: {{$browser}} on {{$device}}</h3>
            <h4>Ip: {{$ip->ip}}</h4>
            <h4>Location: {{$ip->city}}, {{$ip->state_name}}, {{$ip->country}}</h4>
        @endif
    </div>

    <script>

    //    var data = fetch('https://api.ipify.org/?format=json')
    //     .then(res => res.json());

    //     const entries = Object.entries(data);

    //     console.log(data[PromiseResult][ip]);
    </script>

</body>
</html>