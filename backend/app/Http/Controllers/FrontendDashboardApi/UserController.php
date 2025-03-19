<?php

namespace App\Http\Controllers\FrontendDashboardApi;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
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
        // $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // authorize('list-user');

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
                ->paginate($paginate);

        return response()->json([
            'data' => $users
        ]);
    }
    
    public function show(Request $request, User $user)
    {
        // authorize('edit-user');
        $user->load('roles');

        return response()->json([
            'data' => $user
        ]);
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
            return response()->json([
                'success' => true,
                'message' => 'Data successfully created.'
            ]);
        }
        else{
            return response()->json([
                'success' => false,
                'message' => 'Failed create data.'
            ], 400);
        }
    }

    public function update(UpdateUserRequest $request, $id)
    {
        // authorize('edit-user');

        $user = User::findOrFail($id);

        $status = $user->update([
            'name'     => $request->get('name'),
            'email'    => $request->get('email'),
        ]);

        if ($status) {
            return response()->json([
                'status' => true,
                'message' => __('User successfully updated.')
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => __('Failed update User.')
            ], 400);
        }
    }

    public function destroy($id)
    {
        // authorize('edit-user');

        $user = User::findOrFail($id);
        $status = $user->delete();

        if ($status) {
            return response()->json([
                'status' => true,
                'message' => __('User successfully deleted.')
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => __('Failed delete User.')
            ], 400);
        }
    }

    /**
     * Change the password
     *
     * @param  \App\Http\Requests\Backend\PasswordRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update_password(PasswordRequest $request, $id)
    {
        authorize('edit-user');

        $user = User::findOrFail($id);
        $user->password = Hash::make($request->password);
        $success = $user->save();
        
        if ($success) {
            return response()->json([
                'status' => true,
                'message' => __('Password successfully updated.')
            ], 200);
        } else {
            return response()->json([
                'status' => true,
                'message' => __('Failed update password.')
            ], 400);
        }
    }

    public function get_all_roles() 
    {
        return response()->json([
            'data' => Role::all()
        ]);
    }

    public function create_role_user(StoreRoleUserRequest $request)
    {
        // authorize('add-user-role');

        try {
            $user = User::findOrFail($request->user_id);
            $user->roles()->attach($request->role_id);
            return response()->json([
                'success' => true,
                'message' => __('Role successfully added.')
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => __('Failed add Role.')
            ], 400);
        }
    }

    public function destroy_role_user(User $user, Role $role)
    {
        // authorize('remove-user-role');

        $user->roles()->detach($role->id);

        return response()->json([
            'status' => true,
            'message' => __('Role successfully deleted.')
        ]);
    }
}
