<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function uploadAvatar(Request $request)
    {
        if ($request->hasFile('image')) {

            User::uploadAvatar($request->image);
//            session()->put('message','image uploaded successfully!!');   if we want it permanently
//            $request->session()->flash('message','image uploaded successfully');  //one time
            return redirect()->back()->with('message', 'image uploaded successfully');  //shortcut for one time.

        }
//        $request->session()->flash('error','Oops, image uploading failed!!image not found');
        return redirect()->back()->with('error', 'Oops, image uploading failed!!image not found');
    }


    public function index()
    {
//        -------------RAW QUERIES------------------
//        DB::insert('insert into users (name,email,password) values (?,?,?)',['shree','shree@company.com','shree@12',]);
//
//        $users = DB::select('select * from users');
//        DB::update('update users set name = ? where id = 1', ['bhagyashree']);
//        DB::delete('delete from users');
//        return DB::select('select * from users');

//        --------------ELOQUENT ORM-------------------
//            $user = new User();
////            var_dump($user);
////            dd($user);    it will give all eloquent objects.
//        $user->name = 'shree';
//        $user->email= 'shree2707@gmail.com';
//        $user->password = bcrypt('password');  //we can encrypt the fields and then store it for security purpose.
//        $user->save();
//
//        -----------------------ALTERNATE METHOD TO CREATE USER----------------
//        $data = [
//            'name' => 'MAKHIJA',
//            'email' => 'kamina@gmail.com',
//            'password' => 'password',
//        ];
//        User::create($data);

//        //steps to insert ....create a new object of User model.
//        and then insert all fields using obj ref followed by an arrow and the property.
        /** @var TYPE_NAME $user */
        //$user = User::all();    //to fetch all users from table basically select *. this is possible because of facade.
        //all() function works as a static method..i.e we dont need to create instance of User object at all.
        //we will not get password field in the result because in migrations file we have specified to exclude specific fields

//      migrations m table ka structure hoga..
        // or User.php m uski settings nullable h yaa nhi
        //controller files m queries aayegi...jo control kregi views ko..mtlb front-end ko.
//
//        User::where('id',4)->delete();

        /** @var TYPE_NAME $upd */
        //update query update tabhi hi krta h db m..pr front end m old result fetch hota h first time.
        //second refresh m new value..or agr variable m store kia to kitne number of rows affect ho rhe vo dega.
//or agr update krne k baad fetch kia to updated aata h...like in this case.

//        User::where('id',2)->update(['name' => 'SHANKAR']);

        //---------------------MUTATORS-------------------
        //these will modify the data according to user needs...
        //before inserting..
        //refer User.php
        $newRow = [
            'name' => 'samarth',
            'email' => 'samarth@gmail.com',
            'password' => 'password',
        ];
//            User::create($newRow);

        //---------------------ACCESORS-------------------
        //these will modify the data according to user needs...
        //while fetching...
        //refer User.php

//          $user = User::all();
//        return $user;
    }
}
