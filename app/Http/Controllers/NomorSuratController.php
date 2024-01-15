<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class NomorSuratController extends Controller
{
    public function index()
    {
        // $nomor_surat = DB::table('tbl_nomor_surat')->orderBy('nomor_surat', 'desc')->orderBy('sub_nomor_surat', 'desc')->get();

        $nomor_surat = DB::select('SELECT * FROM tbl_nomor_surat ORDER BY nomor_surat DESC, sub_nomor_surat DESC');
        return view('NomorSurat.index', ['nomor_surat' => $nomor_surat]);
    }

    public function create(Request $request)
    {   
        $tgl_surat = $request->input('tgl_surat');
        $perihal = $request->input('perihal');
        $tgl_permintaan = $request->input('tgl_permintaan');

        if(Str::length($perihal) < 10){
            return redirect('/nomor_surat')->with(['sukses'=>'tidak', 'pesan'=>'Gagal Simpan Data - Perihal Minimal 10 Karakter']);
        }else{
            if($tgl_surat == date('Y-m-d')){
                // $nomor_surat_terakhir = DB::table('tbl_nomor_surat')->max('nomor_surat');
                // DB::table('tbl_nomor_surat')->insert(['tgl_surat'=>$tgl_surat,'nomor_surat'=>$nomor_surat, 'perihal'=>$perihal, 'tgl_permintaan'=>$tgl_permintaan, 'status'=>'1', ]);  
                
                $nomor_surat_terakhir = DB::select('SELECT MAX(nomor_surat) FROM tbl_nomor_surat');
                $nomor_surat = (int) $nomor_surat_terakhir+1;

                DB::insert('INSERT INTO tbl_nomor_surat (tgl_surat, nomor_surat, perihal, tgl_permintaan, status) VALUES (?,?,?,?,?)', [$tgl_surat, $nomor_surat, $perihal, $tgl_permintaan, 1] );
                return redirect('/nomor_surat')->with(['sukses'=>'ya', 'pesan'=>'Berhasil Simpan Data', 'nomor_surat'=>$nomor_surat, 'perihal'=>$perihal]);

            }elseif($tgl_surat < date('Y-m-d')){
                if(is_null($nomor_surat_terakhir)){
                    return redirect('/nomor_surat')->with(['sukses'=>'tidak', 'pesan'=>'Gagal Simpan Data - Nomor Surat Tidak Ditemukan']);
                }else{
                    $sub_nomor_surat_terakhir = DB::table('tbl_nomor_surat')->whereDate('tgl_surat', '=', $tgl_surat)->max('sub_nomor_surat');

                    $sub_nomor_surat = $sub_nomor_surat_terakhir+1;

                    $nomor_surat_terakhir = DB::table('tbl_nomor_surat')->whereDate('tgl_surat', '=', $tgl_surat)->max('nomor_surat');
                    DB::table('tbl_nomor_surat')->insert(['tgl_surat'=>$tgl_surat,'nomor_surat'=>$nomor_surat_terakhir, 'sub_nomor_surat'=>$sub_nomor_surat, 'perihal'=>$perihal, 'tgl_permintaan'=>$tgl_permintaan, 'status'=>'1', ]);

                    return redirect('/nomor_surat')->with(['sukses'=>'ya', 'pesan'=>'Berhasil Simpan Data', 'nomor_surat'=>$nomor_surat, 'perihal'=>$perihal]);   
                }
            }else{
                return redirect('/nomor_surat')->with(['sukses'=>'tidak', 'pesan'=>'Gagal Simpan Data - Tanggal Melebihi Hari ini']);
            }
        }
    }
}
