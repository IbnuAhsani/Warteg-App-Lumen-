<?php namespace App\Http\Controllers;

	use App\Users;
	use App\Http\Controllers\Controller;
	use Illuminate\Http\Request;
	use Illuminate\Hashing\BcryptHasher;

	class UsersController extends Controller
		{
			//method to create a new account
			public function add(Request $request)
				{
					$request['api_token'] = str_random(60);
					$request['password'] = app('hash')->make($request['password']);
					$user = Users::create($request->all());

					return response()->json($user);
				}

			//method to view an account based on the given 'id'
			public function view($id)
				{
					$post = Users::find($id);
					return response()->json($post);
				}

			//method to edit an account based on the given 'id'
			public function edit(Request $request, $id)
				{
					$user = Users::find($id);
					$post->update($request->all());

					return response()->json($post);
				}

			//method to delete an account based on the given 'id'
			public function delete($id)
				{
					$post = Users::find($id);
					$post->delete();

					return response()->json('Removed successfully.');
				}

			//method to display all accounts in the database
			public function allUser()
				{
					$post = Users::all();

					return response()->json($post);
				}
		}
 ?>