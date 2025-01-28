<?php
namespace App\Http\Controllers;

    use App\Models\User;
    use Illuminate\Http\Request;

    class UserController extends Controller
    {
        public function index()
        {
            $users = User::paginate(2);

            return view('users.index', [
                'greeting' => 'hello world',
                'users' => $users,
            ]);       
        }

        public function create()
        {
            return view('users.create');
        }

        public function store(Request $request)
        {
            $input = $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required|min:3',
                'avatar'=> 'file'
            ]);
            //User::create($input);

            if (!empty($input['avatar']) && $input['avatar']-> isValid()) {
                $input['avatar']->store();
            }

            dd($input);

            return redirect()->back();
        }

        public function show(User $user)
        {
            return view('users.show', [
                'user' => $user
            ]);  
        }
    }