<?php
namespace App\Http\Controllers;
use App\Models\Admin;
use App\Models\BibleBook;
use App\Models\ProjectVerse;
use App\Models\Setting;
use Database\Seeders\SettingsTableSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function home(Request $request)
    {
        $admin = Auth::guard('admin')->user();
        $ulink = $admin->ulink;
        return view('admin.home', compact('ulink'));
    }
    public function login(Request $request)
    {
        return view('admin.login');
    }
    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username'=>'required',
            'password'=>'required',
        ]);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator->errors());
        }
        $LoginData = $request->only(['username','password']);
        $username=$request->input('username');
        if(Auth::guard('admin')->attempt($LoginData)){
            $admin=Admin::where('username',$username)->first();
            $admin_hash = $admin->admin_hash;
            cookie()->queue('admin_hash', $admin_hash, 43200);
            Auth::guard('admin')->login($admin);
            return redirect()->route('admin');
        } else{
            return back()->withInput(['username' => $request->input('username'),'password' => $request->input('password')])->withErrors(['Invalid Credentials']);
        }
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        if (Cookie::get('admin_hash')) {
            Cookie::queue(Cookie::forget('admin_hash'));
        }
        return redirect()->route('admin.login');
    }
    public function password(Request $request)
    {
        return view('admin.password');
    }
    public function newAdmin(Request $request)
    {
        $adminId = 1;
        SettingsTableSeeder::$adminId = $adminId;
        Artisan::call('db:seed', [
        '--class' => 'SettingsTableSeeder',
        '--force' => true,
    ]);
    }
    public function passwordUpdate(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);

        $admin = Auth::guard('admin')->user();

        if (!Hash::check($request->current_password, $admin->password)) {
            return back()->with('error', 'Current password is incorrect.');
        }

        $admin->password = Hash::make($request->new_password);
        $admin->save();
        return back()->with('success', 'Password updated successfully.');
    }
    public function settings(Request $request)
    {
        $admin_id = Auth::guard('admin')->id();
        $settings = Setting::where('admin_id', $admin_id)->pluck('value', 'key');
        $fonts = [
            'tamil-mukta' => 'Mukta Malar',
            'tamil-catamaran' => 'Catamaran',
            'tamil-anek' => 'Anek Tamil',
            'tamil-baloo' => 'Baloo Thambi 2',
            'tamil-hind' => 'Hind Madurai',
            'tamil-kavivanar' => 'Kavivanar',
            'tamil-meera' => 'Meera Inimai',
            'tamil-noto-sans' => 'Noto Sans Tamil',
            'tamil-noto-serif' => 'Noto Serif Tamil',
            'tamil-tiro' => 'Tiro Tamil',
        ];
        return view('admin.settings', compact('fonts', 'settings'));
    }
    public function settingsUpdate(Request $request)
    {
        $admin_id = Auth::guard('admin')->id();
        $request->validate([
            'home_tamil_font' => 'required|string',
            'project_tamil_font' => 'required|string',
        ]);

        $data = $request->only(['home_tamil_font', 'project_tamil_font']);

        foreach ($data as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key, 'admin_id' => $admin_id],
                ['value' => $value]
            );
        }

        return redirect()->back()->with('success', 'Font settings updated successfully.');
    }
    public function projectVerse(Request $request)
    {
        $books = BibleBook::orderBy('id')->get();
        return view('admin.project', compact('books'));
    }
    public function projectVerseStore(Request $request)
    {
        $admin = Auth::guard('admin')->user();
        $ulink = $admin->ulink;
        $request->validate([
            'verse_id' => 'required|exists:bible_verses,id',
        ]);

        $projectVerse = ProjectVerse::Create([
            'verse_id' => $request->verse_id,
            'admin_id' => $admin->id,
            'ulink' => $ulink,
        ]);

        return response()->json(['status' => 'success']);
    }
}
