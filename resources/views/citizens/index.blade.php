
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
                    <td>
                        <a href="{{ route('citizens.show', $citizen->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('citizens.edit', $citizen->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('citizens.destroy', $citizen->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
