<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class AdminController extends Controller {

    public function __construct() {
        $this->middleware('guest');
    }

    public function index(Request $request) {
        /// session check
       
        if (!$request->session()->has('solata_user')) {
            return redirect('tidakbolehmasuk');
        }
        /// / session check

        $user = $request->session()->get('solata_user');
        $configs = \App\Library\Config::getParams();
        //   $family = DB::select('select * from tob_keluarga where active = ?', [1]);
        $family = DB::select('SELECT (SELECT nama FROM tob_keluarga b WHERE b.keluarga_id=a.parent_id) AS parent_nama,(SELECT nama FROM tob_keluarga c WHERE c.keluarga_id=a.parentayah_id) AS parentayah_nama,a.* FROM tob_keluarga a WHERE a.deleted = 0 order by nama asc');

       
        $urls = array(
            "add" => url('admin/add'),
            "index" => url('admin'),
            "theme" => asset($configs["PATH_ADMINTHEME"]),
            "blog_admin"=> $configs["BLOG_ADMIN"]
        );


        //return view('admin');
        return view('admin_index', ['user'=>$user,'family' => $family, 'urls' => $urls]);
    }

    public function add(Request $request) {
        /// session check
        $value = $request->session()->get('key');
        if (!$request->session()->has('solata_user')) {
            return redirect('tidakbolehmasuk');
        }
        /// / session check
        
        $user = $request->session()->get('solata_user');
        //   $family = DB::select('select * from tob_keluarga where active = ?', [1]);
        $configs = \App\Library\Config::getParams();
        $family = array();
        $msg = "";
        $inputs = array(
            "keluarga_id" => 0,
            "nama" => "",
            "parent_id" => 0,
            "parentayah_id" => 0,
            "alias" => "",
            "pekerjaan" => "",
            "nama_perusahaan" => "",
            "jenis_kelamin" => "L", // default ke L
            "pasangan"=>0,
            "tondok"=>""
        );

        // parent
        $parents = DB::select('select * from tob_keluarga where deleted = 0 and keluarga_id<>? and jenis_kelamin="P" ORDER BY nama ASC', [0]);
        // parent ayah
        $parentAyahs = DB::select('select * from tob_keluarga where deleted = 0 and keluarga_id<>? and jenis_kelamin="L" ORDER BY nama ASC', [0]);
        //pasangan
        $pasangans = DB::select('select * from tob_keluarga where deleted = 0 and keluarga_id<>? ORDER BY nama ASC', [0]);

        if ($request->isMethod('post')) {
            $inputs = $request->input();
            $nama = trim($inputs["nama"]);
             
            if (strlen($nama) > 3) {
                DB::insert('insert into tob_keluarga (nama,parent_id,alias,pekerjaan,nama_perusahaan,parentayah_id,jenis_kelamin,pasangan,addby,addon) values (?, ?,?,?,?,?,?,?,?,NOW())', [$inputs["nama"], $inputs["parent_id"], $inputs["alias"], $inputs["pekerjaan"], $inputs["nama_perusahaan"], $inputs["parentayah_id"], $inputs["jenis_kelamin"],$inputs["pasangan"],$user]);
                //   $msg = "Data berhasil di simpan.";
                //   $request->session()->flash('message', "Data berhasil di simpan.");
                return redirect('admin/add')->with('status', 'Data berhasil di simpan!');
            } else {
                $msg = "Nama minimal 3 karakter.";
            }
        }



        /// sidebar
        $urls = array(
            "add" => url('admin/add'),
            "index" => url('admin'),
            "theme" => asset($configs["PATH_ADMINTHEME"]),
            "blog_admin"=> $configs["BLOG_ADMIN"]
        );


        //return view('admin');
        return view('admin_add', ['user'=>$user,'pasangans'=>$pasangans,'parents' => $parents, 'parentayahs' => $parentAyahs, 'family' => $family, 'urls' => $urls, 'message' => $msg, 'inputs' => $inputs, 'urlpost' => url('admin/add/'), 'label_h' => "Dafar Baru"]);
    }

    public function edit($id, Request $request) {
        /// session check
        $value = $request->session()->get('key');
        if (!$request->session()->has('solata_user')) {
            return redirect('tidakbolehmasuk');
        }
        /// / session check
        
         $user = $request->session()->get('solata_user');
        //   $family = DB::select('select * from tob_keluarga where active = ?', [1]);
        $configs = \App\Library\Config::getParams();
        $family = array();
        $msg = "";
        $inputs = array(
            "keluarga_id" => 0,
            "nama" => "",
            "parent_id" => 0,
            "parentayah_id" => 0,
            "alias" => "",
            "pekerjaan" => "",
            "nama_perusahaan" => "",
            "jenis_kelamin" => "L", // default ke L,
            "pasangan"=>0,
            "tondok"=>""
        );

        // parent
        $parents = DB::select('select * from tob_keluarga where deleted = 0 and keluarga_id<>? and jenis_kelamin="P" ORDER BY nama ASC', [$id]);
        // parent ayah
        $parentAyahs = DB::select('select * from tob_keluarga where deleted = 0 and keluarga_id<>? and jenis_kelamin="L" ORDER BY nama ASC', [$id]);
        //pasangan
        $pasangans = DB::select('select * from tob_keluarga where deleted = 0 and keluarga_id<>? ORDER BY nama ASC', [$id]);

        if ($request->isMethod('post')) {
            $inputs = $request->input();
            $nama = trim($inputs["nama"]);
            $idpost = intval(($inputs["keluarga_id"]));
           
            if (strlen($nama) > 3 && $idpost > 0) {
                DB::update('update tob_keluarga set nama = ?,parent_id = ?,alias = ?,pekerjaan = ?,nama_perusahaan = ?,jenis_kelamin=?,parentayah_id=?,pasangan=?,modiby=?,modion=NOW() where keluarga_id = ?', [$inputs["nama"], $inputs["parent_id"], $inputs["alias"], $inputs["pekerjaan"], $inputs["nama_perusahaan"], $inputs["jenis_kelamin"], $inputs["parentayah_id"],$inputs["pasangan"],$user,$idpost]);
                //   $msg = "Data berhasil di simpan.";
                //   $request->session()->flash('message', "Data berhasil di simpan.");
                return redirect('admin')->with('status', 'Informasi keluarga berhasil di update!');
            } else {
                $msg = "Nama minimal 3 karakter atau id keluarga tidak valid.";
            }
        } else {

            $detail = DB::select('select * from tob_keluarga where deleted = 0 and keluarga_id=? LIMIT 1', [intval($id)]);

            if (count($detail) > 0) {
                $inputs["keluarga_id"] = $detail[0]->keluarga_id;
                $inputs["nama"] = $detail[0]->nama;
                $inputs["parent_id"] = $detail[0]->parent_id;
                $inputs["parentayah_id"] = $detail[0]->parentayah_id;
                $inputs["alias"] = $detail[0]->alias;
                $inputs["pekerjaan"] = $detail[0]->pekerjaan;
                $inputs["nama_perusahaan"] = $detail[0]->nama_perusahaan;
                $inputs["jenis_kelamin"] = $detail[0]->jenis_kelamin;
                $inputs["pasangan"] = $detail[0]->pasangan;
                $inputs["tondok"] = $detail[0]->tondok;
            }
        }



        /// sidebar
        $urls = array(
            "add" => url('admin/add'),
            "index" => url('admin'),
            "theme" => asset($configs["PATH_ADMINTHEME"]),
            "blog_admin"=> $configs["BLOG_ADMIN"]
        );


        //return view('admin');
        return view('admin_add', ['user'=>$user,'pasangans'=>$pasangans,'parents' => $parents, 'parentayahs' => $parentAyahs, 'family' => $family, 'urls' => $urls, 'message' => $msg, 'inputs' => $inputs, 'urlpost' => url('admin/edit/' . $id), 'label_h' => "Edit Informasi Keluarga"]);
    }

    public function delete($id, Request $request) {
        /// session check
        $value = $request->session()->get('key');
        if (!$request->session()->has('solata_user')) {
            return redirect('tidakbolehmasuk');
        }
        /// / session check
        $user = $request->session()->get('solata_user');
        $hasil = DB::update('update tob_keluarga set deleted = 1,deleteon=NOW(),deleteby=? where keluarga_id = ?', [$user,intval($id)]);


        return redirect('admin')->with('status', 'Data berhasil dihapus');
    }

    public function aksesdariwp($kunci, Request $request) {
        $users = \App\Library\Config::getUsers();
        $configs = \App\Library\Config::getParams();
        $match = 0;
        $user = "";
        foreach ($users as $u) {
            $testMatch = sha1($u["user"] . "" . $configs["KATA_RAHASIA"]);
            if ($testMatch === $kunci) {
                $user = $u["user"];
                $match++;
                break;
            }
        }

        if ($match > 0) {
            $request->session()->put('solata_user', $user);
            return redirect('admin');
        } else {
            return redirect('tidakbolehmasuk');
        }


        //  $category = $request->input->get('category', 'default category');
        // $term = $request->input->get('term', false);
    }

}
