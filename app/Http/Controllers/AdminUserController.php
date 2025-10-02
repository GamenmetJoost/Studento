<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AdminUserController extends Controller
{
    public const ROLES = ['admin','student'];

    public function __construct()
    {
        $this->middleware(['auth']);
        $this->middleware(function ($request, $next) {
            if (!Auth::check() || Auth::user()->role !== 'admin') {
                abort(403, 'Niet geautoriseerd');
            }
            return $next($request);
        });
    }

    // Dashboard (root /admin)
    public function dashboard()
    {
        // Voor het dashboard gebruiken we dezelfde $users collectie als voorheen
        // zodat bestaande blade die met $users rekent blijft werken.
        $users = User::all();
        return view('admin.index', compact('users'));
    }

    // LIST users (resource index)
    public function index(Request $request)
    {
        $query = User::query();
        if ($search = $request->get('q')) {
            $query->where(function($q) use ($search) {
                $q->where('name','like',"%$search%")
                  ->orWhere('email','like',"%$search%");
            });
        }
        if ($role = $request->get('role')) {
            $query->where('role',$role);
        }
        $users = $query->orderBy('name')->paginate(25)->withQueryString();
        return view('admin.users.index', [
            'users' => $users,
            'roles' => self::ROLES,
        ]);
    }

    public function create()
    {
        return view('admin.users.create', ['roles' => self::ROLES]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required','string','max:255'],
            'email' => ['required','email','max:255','unique:users,email'],
            'role' => ['required', Rule::in(self::ROLES)],
            'password' => ['required','string','min:8'],
            'timezone' => ['nullable','string','max:64'],
        ]);
        User::create($data); // password wordt gehashed via cast in model
        return redirect()->route('admin.users.index')->with('status','Gebruiker aangemaakt');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', [
            'user' => $user,
            'roles' => self::ROLES,
        ]);
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => ['required','string','max:255'],
            'email' => ['required','email','max:255', Rule::unique('users','email')->ignore($user->id)],
            'role' => ['required', Rule::in(self::ROLES)],
            'password' => ['nullable','string','min:8'],
            'timezone' => ['nullable','string','max:64'],
        ]);

        // voorkomen dat laatste admin gedegradeerd wordt
        if ($user->role === 'admin' && $data['role'] !== 'admin') {
            $otherAdmins = User::where('role','admin')->where('id','!=',$user->id)->count();
            if ($otherAdmins === 0) {
                return back()->withErrors(['role' => 'Je kunt de laatste admin niet degraderen.'])->withInput();
            }
        }

        if (empty($data['password'])) {
            unset($data['password']);
        }
        $user->update($data);
        return redirect()->route('admin.users.edit', $user)->with('status','Gebruiker bijgewerkt');
    }

    public function destroy(User $user)
    {
        if ($user->id === Auth::id()) {
            return back()->withErrors(['delete' => 'Je kunt jezelf niet verwijderen.']);
        }
        if ($user->role === 'admin') {
            $otherAdmins = User::where('role','admin')->where('id','!=',$user->id)->count();
            if ($otherAdmins === 0) {
                return back()->withErrors(['delete' => 'Je kunt de laatste admin niet verwijderen.']);
            }
        }
        $user->delete();
        return redirect()->route('admin.users.index')->with('status','Gebruiker verwijderd');
    }
}
