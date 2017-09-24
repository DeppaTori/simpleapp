<?php

/**
 * Description of Tools
 *
 * @author tommytoban
 */

namespace App\Library;

class Tools {

    public function getSession() {
        var_dump($_SESSION);
    }

    public function createTree($data) {
        $topRow = array();
        foreach ($data as $row) {
            $ibuId = intval($row->parent_id);
            $ayahId = intval($row->parentayah_id);
            if ($ibuId === 0 && $ayahId === 0) {
                if (count($topRow) === 0) { // hanya orang pertama yang dipakai
                    $topRow[] = array($row, array());
                    $topRow[0][1] = $this->createChild($row->keluarga_id, $row->jenis_kelamin, $data);
                }
            }
        }
        return $topRow;
    }

    public function createChild($parentId, $jenisKelamin, $data) {
        $hasil = array();
        $found = 0;
        foreach ($data as $row) {
            if ($jenisKelamin === "P") { /// maka cari anak berdasrkan nama ibu
                if ($row->parent_id === $parentId) {
                    $hasil[] = array($row, array());
                    $hasil[$found][1] = $this->createChild($row->keluarga_id, $row->jenis_kelamin, $data);
                    $found++;
                }
            } else if ($jenisKelamin === "L") { /// maka cari anak berdasarkan nama ayah
                if ($row->parentayah_id === $parentId) {
                    $hasil[] = array($row, array());
                    $hasil[$found][1] = $this->createChild($row->keluarga_id, $row->jenis_kelamin, $data);
                    $found++;
                }
            }
        }

        return $hasil;
    }

    public function createTreeHTML($data, $id) {
        $topRow = "<ul>";
        $count = 0;
        $kelasGender = "";
        $absen = array(); // untuk menampung anggota keluarga yang sudah masuk dalam tree
        foreach ($data as $row) {
            $kelasGender = "";
            $ibuId = intval($row->parent_id);
            $ayahId = intval($row->parentayah_id);
         //   if ($ibuId === 0 && $ayahId === 0 && $row->keluarga_id === $id) {
             if ($row->keluarga_id === $id) {
                if ($count === 0) { // hanya orang pertama yang dipakai
                    //$topRow[] = array($row,array());
                    
                    $namaPasangan = $this->getNamaPasangan($row, $data);
                    
                    $absen[$row->keluarga_id] = array("jk" => $row->jenis_kelamin);
                    $kelasGender = $row->jenis_kelamin === "P" ? "perempuan" : "laki_laki";
                    $topRow .= "<li>";
                 //   $topRow .= "<a href='".url('/app/'.$row->keluarga_id)."' class='" . $kelasGender . "'>" . $row->nama . "</a>".$namaPasangan;
                    $topRow .= "<a href='".url('/app/'.$row->keluarga_id)."'><div class='kotak_keluarga'><div class='foto'>&nbsp;</div><div class='info " . $kelasGender . "'>" . $row->nama . "</div></div></a>".$namaPasangan;
                    // $topRow[0][1] = $this->createChildHTML($row->keluarga_id,$row->jenis_kelamin,$data);
                    $topRow .= $this->createChildHTML($row->keluarga_id, $row->jenis_kelamin, $data, $absen);

                    $topRow .= "</li>";
                    $count++;
                }
            }
        }
        $topRow .= "</ul>";




        return $topRow;
    }

    public function createChildHTML($parentId, $jenisKelamin, $data, & $absen) {
        $hasil = "<ul>";
        $found = 0;
        $kelasGender = "";
        //  $indeksCari = $this->getIndeksById(15,$data);
        //  var_dump($indeksCari);
        foreach ($data as $row) {
            $kelasGender = "";
            if ($jenisKelamin === "P") { /// maka cari anak berdasrkan nama ibu
                //  if($row->parent_id===$parentId){
                // check jika sudah terdaftar di garis bapak
                $garisBapakExist = key_exists($row->parentayah_id, $absen);
                //var_dump($garisBapakExist);
                // die();

                if ($row->parent_id === $parentId && !$garisBapakExist) {
                    //  $hasil[] = array($row,array());
                    $absen[$row->keluarga_id] = array("jk" => $row->jenis_kelamin);
                    $kelasGender = $row->jenis_kelamin === "P" ? "perempuan" : "laki_laki";

        
                    $namaPasangan = $this->getNamaPasangan($row, $data);    

                    $hasil .= "<li>";
                    $hasil .= "<a href='".url('/app/'.$row->keluarga_id)."'><div class='kotak_keluarga'><div class='foto'>&nbsp;</div><div class='info " . $kelasGender . "'>" . $row->nama . "</div></div></a>".$namaPasangan;
                    // $hasil[$found][1] = $this->createChildHTML($row->keluarga_id, $row->jenis_kelamin, $data);

                    $hasil .= $this->createChildHTML($row->keluarga_id, $row->jenis_kelamin, $data, $absen);
                    $hasil .= "</li>";
                    $found++;
                }
            } else if ($jenisKelamin === "L") { /// maka cari anak berdasarkan nama ayah
                $garisMamaExist = key_exists($row->parent_id, $absen);

                if ($row->parentayah_id === $parentId && !$garisMamaExist) {
                    $absen[$row->keluarga_id] = array("jk" => $row->jenis_kelamin);
                    $kelasGender = $row->jenis_kelamin === "P" ? "perempuan" : "laki_laki";
                    
                    $namaPasangan = $this->getNamaPasangan($row, $data);
                    //$hasil[] = array($row,array());
                    $hasil .= "<li>";
                   // $hasil .= "<a href='".url('/app/'.$row->keluarga_id)."' class='" . $kelasGender . "'>" . $row->nama . "</a>".$namaPasangan;
                    $hasil .= "<a href='".url('/app/'.$row->keluarga_id)."'><div class='kotak_keluarga'><div class='foto'>&nbsp;</div><div class='info " . $kelasGender . "'>" . $row->nama . "</div></div></a>".$namaPasangan;
                    // $hasil[$found][1] = $this->createChildHTML($row->keluarga_id, $row->jenis_kelamin, $data);
                    $hasil .= $this->createChildHTML($row->keluarga_id, $row->jenis_kelamin, $data, $absen);
                    $hasil .= "</li>";
                    $found++;
                }
            }
        }
        $hasil .= "</ul>";
        return $hasil;
    }

    private function getNamaPasangan($row,$data) {
        /// cek, jika punya pasangan , maka tambahkan nama pasangan di samping nama
        $teks = "";
        $idPasangan = intval($row->pasangan);
        if ($idPasangan > 0) {
            $dataPasangan = $this->getItemById($idPasangan, $data);
            if ($dataPasangan) {
                $kelasGender = $dataPasangan->jenis_kelamin === "P" ? "perempuan" : "laki_laki";
              //  $teks = " + <a href='".url('/app/'.$dataPasangan->keluarga_id)."' style='position:absolute;' href='#" . $dataPasangan->keluarga_id . "' class='" . $kelasGender . "'>" . $dataPasangan->nama . "</a>";
                $teks = " + <a href='".url('/app/'.$dataPasangan->keluarga_id)."' style='position:absolute;' ><div class='kotak_keluarga' ><div class='foto'>&nbsp;</div><div class='info " . $kelasGender . "'>" . $dataPasangan->nama . "</div></div></a>";
                
            }
        }
        return $teks;
    }

    public function getItemById($id, $array) {
        $item = null;
        foreach ($array as $struct) {
            if ($id == $struct->keluarga_id) {
                $item = $struct;
                break;
            }
        }
        return $item;
    }

}
