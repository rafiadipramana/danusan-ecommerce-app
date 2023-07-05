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
                    <td>
                        <select class="form-select" wire:model="roleUpdate.{{ $user->id }}"
                            wire:change="updateRole('{{ $user->id }}')">
                            <option value="admin" {{ $roleUpdate[$user->id] == 'admin' ? 'selected' : '' }}>Admin
                            </option>
                            <option value="seller" {{ $roleUpdate[$user->id] == 'seller' ? 'selected' : '' }}>
                                Seller</option>
                            <option value="customer" {{ $roleUpdate[$user->id] == 'user' ? 'selected' : '' }}>Customer</option>
                        </select>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $users->links() }}
</div>
