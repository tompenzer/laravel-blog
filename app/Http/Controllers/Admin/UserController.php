<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UsersRequest;
use App\Models\MediaLibrary;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Show the application users index.
     */
    public function index(): View
    {
        return view('admin.users.index', [
            'users' => User::latest()->paginate(50)
        ]);
    }

    /**
     * Display the specified resource edit form.
     */
    public function edit(User $user): View
    {
        return view('admin.users.edit', [
            'user' => $user,
            'roles' => Role::all(),
            'media' => MediaLibrary::first()->media()->get()->pluck('name', 'id')
        ]);
    }

    /**
     * Display the specified resource create form.
     */
    public function create(): View
    {
        return view('admin.users.create', [
            'roles' => Role::all(),
            'media' => MediaLibrary::first()->media()->get()->pluck('name', 'id')
        ]);
    }

    /**
     * Store the specified resource.
     */
    public function store(UsersRequest $request): RedirectResponse
    {
        $user = User::create(array_filter($request->only(['name', 'email', 'password', 'title', 'blurb', 'media_id'])));

        $role_ids = array_values($request->get('roles', []));
        $user->roles()->sync($role_ids);

        return redirect()->route('admin.users.edit', $user)->withSuccess(__('users.created', ['user' => $user->name]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UsersRequest $request, User $user): RedirectResponse
    {
        $user->update(array_filter($request->only(['name', 'email', 'password', 'title', 'blurb', 'media_id'])));

        $role_ids = array_values($request->get('roles', []));
        $user->roles()->sync($role_ids);

        return redirect()->route('admin.users.edit', $user)->withSuccess(__('users.updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User  $user)
    {
        $user_name = $user->name;

        $user->delete();

        return redirect()->route('admin.users.index')->withSuccess(__('users.deleted', ['user' => $user_name]));
    }
}
