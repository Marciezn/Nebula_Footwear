<x-layoutAdmin title="Edit Customer">

<div class="page-wrapper">

    <div class="card-form">
        <h2 class="form-title">Edit Customer</h2>

        <form action="{{ route('admin.customers.update', $customer->id) }}" method="POST">
            @csrf @method('PUT')

            <div class="form-grid">

                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" value="{{ $customer->name }}" required>
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" value="{{ $customer->email }}" required>
                </div>

            </div>

            <div class="form-actions">
                <a href="{{ route('admin.customers.index') }}" class="btn-cancel">Cancel</a>
                <button class="btn-save">Update</button>
            </div>
        </form>
    </div>

</div>

</x-layoutAdmin>
