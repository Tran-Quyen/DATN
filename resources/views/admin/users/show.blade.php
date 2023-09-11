<div class="card-body show-user">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if($user->role_as == '0')
                            <label class="badge btn-primary">User</label>
                        @elseif($user->role_as == '1')
                            <label class="badge btn-danger">Admin</label>
                        @else
                            <label class="badge btn-success">None</label>
                        @endif
                    </td>
                    <td>
                        <a href="{{ url('admin/users/' . $user->id . '/edit') }}" class="btn btn-primary text-white">Edit</a>
                        <a href="" class="btn btn-danger delete_user text-white" data-id="{{ $user->id }}" data-name="{{ $user->name }}">
                            Delete
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">
                        No user found
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div class="float-end mt-5">{{ $users->links() }}</div>
</div>

