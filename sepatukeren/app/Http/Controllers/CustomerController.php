<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $customers = User::where('role', 'user')
            ->when($request->search, function ($query) use ($request) {
                $query->where('name', 'like', "%{$request->search}%")
                      ->orWhere('email', 'like', "%{$request->search}%")
                      ->orWhere('phone', 'like', "%{$request->search}%");
            })
            ->latest()
            ->paginate(10);

        return view('admin.customers.index', compact('customers'));
    }

    public function create()
    {
        return view('admin.customers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'   => 'required|string|max:255',
            'email'  => 'required|email|unique:users,email',
            'phone'  => 'required|max:20',
            'status' => 'required|in:active,inactive',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'phone'    => $request->phone,
            'status'   => $request->status,
            'role'     => 'user',
            'password' => bcrypt(Str::random(10)),
        ]);

        return redirect()->route('admin.customers.index')
            ->with('success', 'Customer added successfully.');
    }

    public function edit($id)
    {
        $customer = User::where('role', 'user')->findOrFail($id);
        return view('admin.customers.edit', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        $customer = User::where('role', 'user')->findOrFail($id);

        $request->validate([
            'name'   => 'required|string|max:255',
            'email'  => 'required|email|unique:users,email,' . $id,
            'phone'  => 'required|max:20',
            'status' => 'required|in:active,inactive',
        ]);

        $customer->update($request->only(['name', 'email', 'phone', 'status']));

        return redirect()->route('admin.customers.index')
            ->with('success', 'Customer updated successfully.');
    }

    public function destroy($id)
    {
        User::where('role', 'user')->findOrFail($id)->delete();

        return redirect()->route('admin.customers.index')
            ->with('success', 'Customer deleted.');
    }
}
