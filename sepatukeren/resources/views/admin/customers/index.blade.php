<x-layoutAdmin title="Customers">

<div class="customers-wrapper">

    <div class="header-section">
        <h2>Customers</h2>

        <div class="actions">
            <form action="{{ route('admin.customers.index') }}" method="GET" style="display:flex; gap:10px;">
                <input type="text" name="search" placeholder="Search customer..." class="search-input" value="{{ request('search') }}">
                <button class="btn-edit" type="submit">Search</button>
            </form>

            <a href="{{ route('admin.customers.create') }}" class="btn-add">+ Add Customer</a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    <table class="customers-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th width="150px">Actions</th>
            </tr>
        </thead>

        <tbody>
            @forelse($customers as $customer)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->email }}</td>
                
                
                <td>
                    <a href="{{ route('admin.customers.edit', $customer->id) }}" class="btn-edit">Edit</a>

                    <form action="{{ route('admin.customers.destroy', $customer->id) }}" method="POST" style="display:inline-block;">
                    @csrf @method('DELETE')
                    <button class="btn-delete" onclick="return confirm('Delete this customer?')">Delete</button>
                </form>

                </td>
            </tr>
            @empty
            <tr><td colspan="6" style="text-align:center;">No customers found</td></tr>
            @endforelse
        </tbody>
    </table>

    <br>
    {{ $customers->links() }}

</div>

</x-layoutAdmin>
