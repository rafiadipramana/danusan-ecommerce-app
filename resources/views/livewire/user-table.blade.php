<div>
    {{-- Success is as dangerous as failure. --}}
    <div class="mb-3">
        <input type="text" class="form-control" wire:model="search" placeholder="Cari Pengguna">
    </div>
    <table class="table table-bordered mb-2">
        <thead class="text-center table-primary">
            <th>No</th>
            <th>Nama</th>
            <th>Status</th>
        </thead>
        <tbody>
            @foreach ($users as $index => $user)
                <tr>
                    <td>{{ $users->firstItem() + $index }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ ucwords($user->role) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $users->links() }}
</div>