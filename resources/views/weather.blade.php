<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>天氣API串接</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link rel="shortcut icon" href="{{ asset('images/weather.png') }}" type="image/x-icon" />
</head>
<body>

    @include('components.navigation')

    <div class="container">
        <h1 class="center-align">Weather</h1>
        @if(isset($weatherData['records']['location']))
            <div class="row">
                @foreach($weatherData['records']['location'] as $location)
                    <div class="col m4">
                        <div class="card">
                            <div class="card-content">
                                <span class="card-title">{{ $location['locationName'] }}</span>
                                <ul class="collection">
                                    @foreach($location['weatherElement'] as $element)
                                        <li class="collection-item">{{ $element['elementName'] }}: {{ $element['time'][0]['parameter']['parameterName'] }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="card-panel red lighten-2">
                <span class="white-text">No weather data available.</span>
            </div>
        @endif
    </div>

    @include('components.footer')

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</html>
