<?php namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class SilsilahController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index($id)
	{
            $family = DB::select('SELECT a.* FROM tob_keluarga a WHERE a.deleted = 0');
            $tools = new \App\Library\Tools();
            $topRow = $tools->createTreeHTML($family,intval($id));
       
          

            return view('silsilah',["family"=>$topRow]);
	}
        
        public function home()
	{
            $teratas = DB::select('SELECT a.* FROM tob_keluarga a WHERE a.deleted = 0 and a.parent_id=0 and a.parentayah_id=0 order by nama ASC');
      
          

            return view('silsilah_home',["family"=>$teratas]);
	}

}
