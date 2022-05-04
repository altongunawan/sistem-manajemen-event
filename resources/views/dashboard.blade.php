<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
</head>
<body>
    <table style="text-align: center;">
        <thead>
            <tr>
                <td colspan="3"> User Status</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td> Name</td>
                <td> Email</td>
                <td> Action </td>
            </tr>
            <tr>
                <td> {{ $data->name }}</td>
                <td> {{ $data->email }}</td>
                <td> <a href="{{ route('logout') }}">LogOut</a></td>
            </tr>
        </tbody>
    </table>
</body>
</html>