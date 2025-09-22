<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Citizens List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            background: #fff;
            padding: 30px;
            max-width: 900px;
            margin: auto;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 8px;
        }
        h2 {
            margin-bottom: 20px;
        }
        a {
            display: inline-block;
            margin-bottom: 10px;
            padding: 8px 12px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        a:hover {
            background-color: #218838;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f0f0f0;
        }
        .success {
            color: green;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Citizens List</h2>

        @if (session('success'))
            <div class="success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('citizens.create') }}">+ Add Citizen</a>

        <table>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>ID Number</th>
                <th>Phone</th>
                <th>Children</th>
                <th>Infants</th>
                <th>Marital Status</th>
            </tr>
            @foreach($citizens as $citizen)
            <tr>
                <td>{{ $citizen->id }}</td>
                <td>{{ $citizen->full_name }}</td>
                <td>{{ $citizen->id_number }}</td>
                <td>{{ $citizen->phone }}</td>
                <td>{{ $citizen->num_children }}</td>
                <td>{{ $citizen->num_infants }}</td>
                <td>{{ $citizen->marital_status }}</td>
            </tr>
            @endforeach
        </table>
    </div>
</body>
</html>