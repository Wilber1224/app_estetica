<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// agregamos
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class RolController extends Controller
{
    // Constructor - Aplica middleware para proteger rutas 
    // según permisos asignados al rol
    function __construct()
    {
      // Middleware para vista de roles
      $this->middleware('permission:ver-rol | crear-rol | editar-rol | borrar-rol', ['only' => ['index']]);
      // Middleware para creación de roles  
      $this->middleware('permission:crear-rol', ['only' => ['create', 'store']]);
      // Middleware para edición de roles
      $this->middleware('permission:editar-rol', ['only' => ['edit', 'update']]);
      // Middleware para borrado de roles
      $this->middleware('permission:borrar-rol', ['only' => ['destroy']]);
    }
    // Obtiene lista paginada de roles
    public function index()
    {
      // Consulta paginada 
      $roles = Role::paginate(5);
      // Retorna vista de index con roles
      // return view('roles.index', compact('roles'));
      return Inertia::render('roles', compact('roles'));
    }
  
    public function create()
    {
      $permission = Permission::get();
      // return view('roles.crear', compact('permission'));
      // Retorna vista de creación de roles con permisos
      return Inertia::render('roles_agregar', [
        'permission' => $permission,
      ]);
    }
  
    // Crea un nuevo rol
    public function store(Request $request)
    {
      // Validación de datos
      $this->validate($request, [
        'name' => 'required|unique:roles,name',
        'permission' => 'required',
    ]);
    
      // Crea el rol
      $role = Role::create(['name' => $request->input('name')]);
      // Sincroniza permisos al rol
      $role->syncPermissions($request->input('permission'));
      // Redirige a la vista de índice de roles utilizando Inertia
          return Inertia::location(route('roles'));
    }
  
  
    // public function show(string $id)
    // {
    //     //
    // }
  
    public function edit($id)
    {
      $role = Role::find($id);
      $permission = Permission::get();
      $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
      ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
      ->all();
        return Inertia::render('roles_editar', [
          'role' => $role,
          'permission' => $permission,
          'rolePermissions' => $rolePermissions,
      ]);
    }
  
  
    public function update(Request $request, string $id)
    {
      $this->validate(
        $request,
        [
          // analizar este:
          // 'id' => 'required|exists:roles',
          'name' => 'required',
          'permission' => 'required'
        ]
      );
      $role = Role::find($id);
      $role->name = $request->input('name');
      $role->save();
  
  
      $role->syncPermissions($request->input('permission'));
      // Redirige a la vista de índice de roles utilizando Inertia
      return Inertia::location(route('roles'));
      }
  
    public function destroy(string $id)
    {
      //sustituir
      // DB::table('roles')->where('id', $id)->delete();
      //por: 
      Role::find($id)->delete();
      // Redirige a la vista de índice de roles utilizando Inertia
      return Inertia::location(route('roles'));  }
  }
