<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //$role = Role::create(['name' => 'writer']);
       // $permission = Permission::create(['name' => 'edit post']);
        
            //$role = Role::findById(1);
            //$permission = Permission::findById(1);

            //$role->givePermissionTo($permission);
            //$permission->assignRole($role);


        return view('home');
    }
    public function test(){
        
        $title = "How to build your success on Fiverr in 3 steps";

        //return $slug = Str::of($title)->ascii('');
        return $random = Str::random(20);
    }

    function fetch(Request $request)
    {
     if($request->get('query'))
     {
      $query = $request->get('query');
      $data = DB::table('apps_countries')
        ->where('country_name', 'LIKE', "%{$query}%")
        ->get();
      $output = '<ul class="dropdown-menu" style="display:block; position:relative;width:100%; max-height:300px; overflow:scroll; overflow-x:hidden;">';
      foreach($data as $row)
      {
       $output .= '
       <li><a href="'.route("getsearch", $row->country_code).'" target="_blank">'.$row->country_name.'</a></li><hr style="margin:5px;">
       ';
      }
      $output .= '</ul>';
      echo $output;
     }
    }

    public function check(){
        $url = 'https://images.unsplash.com/photo-1503023345310-bd7c1de61c7d';
        
        //$data = getimagesize($url);
        //print_r($data);
        echo '<br>';
        //echo $width = $data[0];
        echo '<br>';
        //echo $height = $data[1];


        $image = get_headers($url, 1);
        dd($image);
        $bytes = $image["Content-Length"];
        $mb = $bytes/(1024 * 1024);
        echo number_format($mb,2) . " MB";
    

    }


    
    public function getModels()
    {
            $composer = json_decode(file_get_contents(base_path('composer.json')), true);
            $models = [];
            foreach ((array)data_get($composer, 'autoload.psr-4') as $namespace => $path) {
                $models = array_merge(collect(File::allFiles(base_path($path)))
                    ->map(function ($item) use ($namespace) {
                        $path = $item->getRelativePathName();
                        return sprintf('\%s%s',
                            $namespace,
                            strtr(substr($path, 0, strrpos($path, '.')), '/', '\\'));
                    })
                    ->filter(function ($class) {
                        $valid = false;
                        if (class_exists($class)) {
                            $reflection = new \ReflectionClass($class);
                            $valid = $reflection->isSubclassOf(\Illuminate\Database\Eloquent\Model::class) &&
                                !$reflection->isAbstract();
                        }
                        return $valid;
                    })
                    ->values()
                    ->toArray(), $models);
            }
            return view('permission')->with('models',$models);
    }

    
}
