<?php

namespace App\Http\Controllers\Backend;

use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\Backend\RoleRequest;
use App\Http\Requests\Backend\StoreRoleRequest;
use App\Http\Requests\Backend\UpdateRoleRequest;
use App\Models\RolePermission;

class RoleController extends Controller
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
        authorize('list-role');

        $order = ($request->sortBy && $request->orderBy) ?
            [
                'sortBy'  => $request->sortBy,
                'orderBy' => $request->orderBy
            ] : [
                'sortBy'  => 'created_at',
                'orderBy' => 'DESC'
            ];
        $paginate = ($request->perPage) ? $request->perPage : 8;
        $roles = Role::ofSearch($request->search)
                ->ofFilters($order)
                ->paginate($request->perPage);

        return inertia('User/Role/Index', compact('roles'));
    }
    /**
     * Show the form for inserting the role.
     *
     * @return \Inertia\Response
     */
    public function create()
    {
        authorize('add-role');

        return inertia('User/Role/Create');
    }
    /**
     * Show the form for editing the role.
     *
     * @return \Inertia\Response
     */
    public function edit(Request $request, $id)
    {
        authorize('edit-role');

        $role = Role::findOrFail($id);
        $role->load('permissions');

        $context = $request->get('context') ?? 'master';
        $contexts = \App\Api\Config\AuthConfig::contexts() ?? [];
        $contexts = [[
            'name' => 'master',
            'title' => 'Master',
        ], ...$contexts];
        $capabilities = \RoleCapability::allInContext($context);

        return inertia('User/Role/Edit', compact('context', 'contexts', 'role', 'capabilities'));
    }

    public function store(StoreRoleRequest $request)
    {
        authorize('add-role');

        $role = Role::create([
            'name'     => $request->get('name'),
            'email'    => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);

        if ($role) {
            return redirect(route('cms.role'))
                ->with('success', 'Data successfully created.');
        }
        else{
            return redirect(route('cms.role'))
                ->with('error', 'Failed create data.');
        }
    }

    /**
     * Update the role
     *
     * @param  \App\Http\Requests\UpdateRoleRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateRoleRequest $request, $id)
    {
        authorize('edit-role');

        $role = Role::findOrFail($id);

        $role->update([
            'name'     => $request->get('name'),
            'email'    => $request->get('email'),
        ]);

        $data = $request->all();
        $context = @$data['context'] ?? 'master';
        $permissions = @$data['permission'] ?? [];
        $oldPermissions = $role->permission_collection;

        $role->name = $data['name'];
        $role->save();

        $role->setPermissions($this->updateContextPermissions(
            $context, $this->addContextSuffix($context, $permissions), $oldPermissions)
        );

        return back()->with('success', "$role->name Role successfully updated.");
    }

    public function destroy($id)
    {
        authorize('delete-role');

        $getData = Role::findOrFail($id);
        $getData->delete();

        return redirect(route('cms.role'))
            ->with('success', "$getData->name Role successfully deleted.");
    }

    private function updateContextPermissions(
        $context, $updatedPermissions,
        $oldPermissions
    ){
        foreach ($oldPermissions as $key => $oldPermission) {
            if (Str::startsWith($oldPermission, "$context.")) {
                unset($oldPermissions[$key]);
            }
        }

        $newPermissions = array_merge($oldPermissions->all(), $updatedPermissions);
        return $newPermissions;
    }

    private function addContextSuffix($context, &$permissions)
    {
        foreach ($permissions as &$permission) {
            $permission = $context.'.'.$permission;
        }
        return $permissions;
    }
}
