<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h4>Dashboard</h4>
<hr>
<table>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th></th>
    </tr>
    <tr>
        <td>{{ $LoggedUserInfo['name'] }}</td>
        <td>{{ $LoggedUserInfo['email'] }}</td>
        <th><a href="{{ route('auth.logout') }}">Logout</a></th>
    </tr>
</table>
</body>
</html>
