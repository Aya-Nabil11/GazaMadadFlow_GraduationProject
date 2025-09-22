<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Citizen</title>
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
            max-width: 600px;
            margin: auto;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 8px;
        }
        h2 {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-top: 10px;
        }
        input {
            width: 100%;
            padding: 8px;
            margin-top: 4px;
            box-sizing: border-box;
        }
        button {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
        button:hover {
            background-color: #0056b3;
        }
        .errors {
            color: red;
            margin-bottom: 20px;
        }
        .errors ul {
            margin: 0;
            padding-left: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Add New Citizen</h2>

        @if ($errors->any())
            <div class="errors">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('citizens.store') }}" method="POST">
            @csrf
            <label>Full Name:</label>
            <input type="text" name="full_name" required>

            <label>ID Number:</label>
            <input type="text" name="id_number" required>

            <label>Phone:</label>
            <input type="text" name="phone" required>

            <label>Address:</label>
            <input type="text" name="address">

            <label>Number of Children:</label>
            <input type="number" name="num_children" value="0">

            <label>Number of Infants:</label>
            <input type="number" name="num_infants" value="0">

            <label>Marital Status:</label>
            <input type="text" name="marital_status">

            <button type="submit">Save</button>
        </form>
    </div>
</body>
</html>