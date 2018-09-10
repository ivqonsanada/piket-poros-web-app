<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Jadwal;
use App\AgendaLain;

use App\Http\Controllers\Concerns\JadwalPiket;


class UserController extends Controller
{
    use JadwalPiket;

    public function index(){
        if (session()->has('data')) {
            $jadwal = Jadwal::where('anggota_id', session()->get('data')['nim'])->first();
            if($jadwal == null){
                $data = [
                    'detail' => session()->get('data'),
                    'jadwal' => '-'
                ];
            }
            else{
                $data = [
                    'detail' => session()->get('data'),
                    'jadwal' => $jadwal->konfirmasi
                ];
            }

            return view('user.index', compact('data'));
        }
        return redirect('/login');
    }
    public function jadwalKuliah(){
        if (session()->has('data')) {
            $detail = [
                'jadwal' =>  session()->get('data')['jadwal'],
                'nama' =>  session()->get('data')['nama']
            ];
            return view('user.jadwalKuliah', compact('detail'));
        }
        return redirect('/login');
    }
    public function daftarPiket(){
        if (!session()->exists('data')) {
            return redirect('/login');
        }
        $data = $this->pemetaan();
        return view('user.daftarPiket', compact('data'));
    }
    public function tambahAgenda(Request $request){
        if (!session()->exists('data')) {
            return redirect('/login');
        }

        $this->validate($request, [
            'opsi' => 'required',
            'alasan' => 'required|max:100'
        ]);
        $agenda = new AgendaLain;
        $agenda->agenda = $request->alasan;
        $agenda->id_sesi = $request->opsi;
        $agenda->anggota_id = session()->get('data')['nim'];
        $agenda->save();

        $this->editBentrok($request->opsi);

        return redirect()->route('user.daftar');
    }
    public function hapusAgenda($id){
        $hasil = AgendaLain::findOrFail($id)->where('anggota_id', session()->get('data')['nim'])->first();
        Jadwal::where('anggota_id', session()->get('data')['nim'])->first()->update([
            $hasil['id_sesi'] => '1'
        ]);
        $hasil->delete();
        return redirect()->route('user.daftar');
    }

}
