<!DOCTYPE html>
<html>
<head>
    <title>Book | ProBook</title>
    <link href="css/bootstrap.css" rel="stylesheet">
</head>
<body onLoad="window.print()">
<table class="table table-bordered">
    <tr>
        <th>Your Email</th>
        <td>{{$detail['email']}}</td>
    </tr>
    <tr>
        <th>Property Name</th>
        <td>{{$detail['property_name']}}</td>
    </tr>
    <tr>
        <th>Property Location</th>
        <td>{{$detail['location']}}</td>
    </tr>
    <tr>
        <th>Start Date</th>
        <td>{{$detail['start_date']}}</td>
    </tr>
    <tr>
        <th>End Date</th>
        <td>{{$detail['end_date']}}</td>
    </tr>
    <tr>
        <th>Book Date</th>
        <td>{{$detail['book_date']}}</td>
    </tr>
    <tr>
        <th>Agent Email</th>
        <td>{{$detail['agent_email']}}</td>
    </tr>
    <tr>
        <th>Total Price</th>
        <td>${{$detail['price']}}</td>
    </tr>
</table>
</body>
</html>