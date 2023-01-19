<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\FileUploader;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequset;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Doctrine\DBAL\Driver\Exception;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    protected $filePath;

    public function __construct()
    {
        $this->middleware('role:Super-Admin');
        $this->filePath = public_path('panel-images');
        $this->middleware('auth');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
            return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'KullaniciKodu' => ['required', 'string'],
            'TelefonNo' => ['sometimes', 'string'],
            'Adres' => ['sometimes', 'string'],
            'KullaniciTipi' => ['required', 'string'],
            'Cinsiyet' => ['required', 'string'],
            'DogumTarihi' => ['required', 'date'],
            'ProfilResim' => ['sometimes','image','mimes:jpeg,png,jpg'],
        ]);
    }

    public function index(){
        $users = User::all();

        return view('auth.user.index',compact('users'));
    }
    public function edit($id){
        $user = User::find($id);
        return view('auth.user.edit',compact('user'));
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function create(array $data)
    {
        $currentDirectory = getcwd();
        $uploadDirectory = "/panel-images/";
        $fileName = '';
        if ($_FILES['ProfilResim']['name']){
            $fileName = $_FILES['ProfilResim']['name'];
            $fileTmpName  = $_FILES['ProfilResim']['tmp_name'];
            $fileName = date('YmdHi').'-'. basename($fileName);
            $uploadPath = $currentDirectory . $uploadDirectory .$fileName;

            move_uploaded_file($fileTmpName, $uploadPath);
        }else {
            $fileName = 'no-image.jpg';
        }
          $user = User::create(['password' => Hash::make($data['password']),'ProfilResim' => $fileName]+ $data);
          $user->assignRole($data['KullaniciTipi']);
          return $user;
    }

    public function update(UserRequset $request,$id){

        $user = User::find($id);
        $fileName = $user->ProfilResim;
        if ($request->hasFile('ProfilResim'))
        {
            if ($fileName !== 'no-image.jpg')
            {
                try {
                    unlink($this->filePath.'/'.$fileName);
                } catch (\Exception $exception){
                       $exception;
                }
            }
            $file = new FileUploader($this->filePath,$request->ProfilResim,$request->name);
            $fileName = $file->upload();
        }
        if ($request->password !== null){
            $user->update(['ProfilResim' => $fileName,'password' => Hash::make($request->password)] + $request->validated());
            $user->syncRoles($request->KullaniciTipi);
        }else{
            $user->update(['ProfilResim' => $fileName] + $request->except(['password']));
            $user->syncRoles($request->KullaniciTipi);
        }

        return redirect()->route('user.index')->with('success','Kullanıcı başarıyla güncellendi');
    }


    public function destroy($id){

        $user = User::find($id);
        $user->delete();
        return redirect()->route('user.index')
            ->with('success','Kullanıcı başarıyla silindi');
    }
}
