<h1>Users</h1>
<a href="{{route('users.create') }}">Add New User</a>
<table>
    <thead>
        <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->username }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <a href="{{route('users.edit', $user->id) }}">Edit</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
