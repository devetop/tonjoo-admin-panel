<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\PasswordRequest;
use App\Http\Requests\Backend\UserRequest;
use App\Http\Requests\Backend\StoreUserRequest;
use App\Http\Requests\Backend\UpdateUserRequest;
use App\Http\Requests\Backend\StoreRoleUserRequest;
use App\Models\Role;
use App\Models\RoleUser;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     * @return \Inertia\Response
     */
    public function index(Request $request)
    {
        authorize('list-user');

        $order = ($request->sortBy && $request->orderBy) ?
            [
                'sortBy'  => $request->sortBy,
                'orderBy' => $request->orderBy
            ] : [
                'sortBy'  => 'created_at',
                'orderBy' => 'DESC'
            ];
        $paginate = ($request->perPage) ? $request->perPage : 8;
        $users = User::ofSearch($request->search)
                ->ofFilters($order)
                ->paginate($request->perPage);

        return inertia('User/Index', compact('users'));
    }
    /**
     * Show the form for inserting the user.
     *
     * @return \Inertia\Response
     */
    public function create()
    {
        authorize('add-user');

        return inertia('User/Create');
    }
    /**
     * Show the form for editing the user.
     *
     * @return \Inertia\Response
     */
    public function edit(Request $request, User $user)
    {
        authorize('edit-user');

        $roles = Role::all();
        $paginate = ($request->perPage) ? $request->perPage : 8;
        $role_user = $user->roles;

        return inertia('User/Edit', compact('user','roles','role_user'));
    }

    public function store(StoreUserRequest $request)
    {
        authorize('add-user');

        $user = User::create([
            'name'     => $request->get('name'),
            'email'    => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);

        if ($user) {
            return redirect(route('cms.user'))
                ->with('status', 'Data successfully created.');
        }
        else{
            return redirect(route('cms.user'))
                ->with('status', 'Failed create data.');
        }
    }

    /**
     * Update the user
     *
     * @param  \App\Http\Requests\Backend\UpdateUserRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateUserRequest $request, $id)
    {
        authorize('edit-user');

        $user = User::findOrFail($id);

        $user->update([
            'name'     => $request->get('name'),
            'email'    => $request->get('email'),
        ]);

        return back()->withCustom(['update-success' => __('Data successfully updated.')]);
        // return back()->withStatus(__('Data successfully updated.'));
    }

    /**
     * Change the password
     *
     * @param  \App\Http\Requests\Backend\PasswordRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(PasswordRequest $request, $id)
    {
        authorize('edit-user');

        $user = User::findOrFail($id);
        $user->password = Hash::make($request->password);
        $user->save();
        
        return back()->withCustom(['password-success' => __('Password successfully updated.')]);
    }

    public function createRoleUser(StoreRoleUserRequest $request)
    {
        authorize('add-user-role');

        try {
            $user = User::findOrFail($request->user_id);
            $user->roles()->attach($request->role_id);
            return back()->withCustom(['create_role_user-success' => __('Data successfully created.')]);
        } catch (\Exception $e) {
            return back()->withCustom(['create_role_user-error' => __('Failed create data.')]);
        }
    }

    public function destroyRoleUser(User $user, Role $role)
    {
        authorize('remove-user-role');

        $user->roles()->detach($role->id);

        return back()->withStatus(__('Content successfully deleted.'));
    }
}
