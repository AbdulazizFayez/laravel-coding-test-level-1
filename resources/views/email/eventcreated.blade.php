<!DOCTYPE html>

<html>

<head>

    <title>ACN Larave Test 1</title>

</head>

<body>
    <h3>A new Event has been registered</h3>

    <h1>{{ $eventData['name'] }}</h1>

    <p>{{ $eventData['Slug'] }}</p>

    <p>{{ $eventData['StartAt'] }}</p>

    <p>{{ $eventData['endsAt'] }}</p>   

    <p>Thank you</p>

</body>

</html>