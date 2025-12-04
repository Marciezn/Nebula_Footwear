<x-layoutAdmin title="Add Customer">

<div class="page-wrapper">

    <div class="card-form">
        <h2 class="form-title">Add Customer</h2>

        <form action="{{ route('admin.customers.store') }}" method="POST">
            @csrf

            <div class="form-grid">

                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" placeholder="Enter customer name" required>
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" placeholder="example@email.com" required>
                </div>

            </div>

            <div class="form-actions">
                <a href="{{ route('admin.customers.index') }}" class="btn-cancel">Cancel</a>
                <button class="btn-save">Save</button>
            </div>
        </form>
    </div>

</div>

</x-layoutAdmin>
