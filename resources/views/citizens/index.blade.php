
<div class="container">
    <h2>Citizen List</h2>
    <a href="{{ route('citizens.create') }}" class="btn btn-success mb-3">Add New Citizen</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Full Name</th>
                <th>Identity Number</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($citizens as $citizen)
                <tr>
                    <td>{{ $citizen->id }}</td>
                    <td>{{ $citizen->first_name }} {{ $citizen->second_name }} {{ $citizen->third_name }} {{ $citizen->family_name }}</td>
                    <td>{{ $citizen->identity_number }}</td>
                    <td>{{ $citizen->mobile_number1 }}</td>
                    <td>{{ $citizen->address }}</td>
                   
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
