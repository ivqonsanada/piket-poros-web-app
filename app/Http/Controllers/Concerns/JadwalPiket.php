<?php
namespace App\Http\Controllers\Concerns;

use App\Jadwal;
use  App\AgendaLain;

trait JadwalPiket
{
    protected function pemetaan()
    {
        if (!session()->has('data')) {
            return redirect('/login');
        } elseif (Jadwal::where('anggota_id', session()->get('data')['nim'])->first() == null) {
            $jadwal = session()->get('data')['jadwal'];

            $hasil = [
              '1A' => 0, '1B' => 0, '1C' => 0, '1D' => 0, '1E' => 0,
              '2A' => 0, '2B' => 0, '2C' => 0, '2D' => 0, '2E' => 0,
              '3A' => 0, '3B' => 0, '3C' => 0, '3D' => 0, '3E' => 0,
              '4A' => 0, '4B' => 0, '4C' => 0, '4D' => 0, '4E' => 0,
              '5A' => 0, '5B' => 0, '5C' => 0, '5D' => 0, '5E' => 0,
              'anggota_id' => ''

          ];
            foreach ($jadwal as $kuliah) {
                if ($kuliah->hari == 'Senin') {
                    $hasil = $this->tentukanBentrok($hasil, '1', $kuliah->jam);
                } elseif ($kuliah->hari == 'Selasa') {
                    $hasil = $this->tentukanBentrok($hasil, '2', $kuliah->jam);
                } elseif ($kuliah->hari == 'Rabu') {
                    $hasil = $this->tentukanBentrok($hasil, '3', $kuliah->jam);
                } elseif ($kuliah->hari == 'Kamis') {
                    $hasil = $this->tentukanBentrok($hasil, '4', $kuliah->jam);
                } elseif ($kuliah->hari == 'Jumat') {
                    $hasil = $this->tentukanBentrok($hasil, '5', $kuliah->jam);
                }
            }

            $hasil = $this->tentukanSetelahAdaKelas($hasil);
            $hasil = $this->tentukanSebelumAdaKelas($hasil);
            $available = $this->showHari($hasil);
            $detail = [
              'jadwal' =>  session()->get('data')['jadwal'],
              'nama' =>  session()->get('data')['nama'],
              'hari' => $available
          ];

            $hasil['anggota_id'] = session()->get('data')['nim'];
            Jadwal::insert($hasil);
            return $detail;
        }
        $jadwal = Jadwal::where('anggota_id', session()->get('data')['nim'])->first();
        $agenda = AgendaLain::where('anggota_id', session()->get('data')['nim'])->get();
        $available = $this->showHari($jadwal->toArray());

        $detail = [
          'jadwal' => session()->get('data')['jadwal'],
          'nama' =>  session()->get('data')['nama'],
          'agenda' => $agenda,
          'hari' => $available,
          'konfirmasi' => $jadwal['konfirmasi']
      ];

        return $detail;
    }
    protected function tentukanBentrok($hasil, $kode, $jam)
    {
        if ($jam == '07:00 - 08:39') {
            $hasil[$kode."A"] = 3;
        } elseif ($jam == '07:50 - 09:29') {
            $hasil[$kode."A"] = 3;
        } elseif ($jam == '08:40 - 10:19') {
            $hasil[$kode."A"] = 4;
        } elseif ($jam == '09:30 - 11:09') {
            $hasil[$kode."A"] = 4;
        } elseif ($jam == '10:20 - 11:59') {
            $hasil[$kode."A"] = 4;
            $hasil[$kode."B"] = 4;
        } elseif ($jam == '12:50 - 14:29') {
            $hasil[$kode."C"] = 4;
        } elseif ($jam == '13:40 - 15:19') {
            $hasil[$kode."C"] = 4;
            $hasil[$kode."D"] = 4;
        } elseif ($jam == '14:30 - 16:09') {
            $hasil[$kode."D"] = 4;
        } elseif ($jam == '16.10 - 17:50') {
            $hasil[$kode."E"] = 4;
        } elseif ($jam == '07:00 - 09:29') {
            $hasil[$kode."A"] = 3;
        } elseif ($jam == '07:50 - 10:19') {
            $hasil[$kode."A"] = 4;
        } elseif ($jam == '08:40 - 11:09') {
            $hasil[$kode."A"] = 4;
        } elseif ($jam == '09:30 - 11:59') {
            $hasil[$kode."A"] = 4;
            $hasil[$kode."B"] = 4;
        } elseif ($jam == '12:50 - 15:19') {
            $hasil[$kode."C"] = 4;
            $hasil[$kode."D"] = 4;
        } elseif ($jam == '13:40 - 16:09') {
            $hasil[$kode."C"] = 4;
            $hasil[$kode."D"] = 4;
        } elseif ($jam == '14:30 - 16:59') {
            $hasil[$kode."D"] = 4;
            $hasil[$kode."E"] = 4;
        } elseif ($jam == '15:20 - 17:49') {
            $hasil[$kode."D"] = 4;
            $hasil[$kode."E"] = 4;
        } elseif ($jam == '16:10 - 17:49') {
            $hasil[$kode."E"] = 4;
        }
        return $hasil;
    }
    protected function tentukanSetelahAdaKelas($hasil)
    {
        for ($kode = 1; $kode <= 5; $kode++) {
            if ($hasil[$kode."A"] == 3) {
                $hasil[$kode."A"] = 1;
            }
            if ($hasil[$kode."A"] == 4 && $hasil[$kode."B"] == 0) {
                $hasil[$kode."B"] = 1;
            }
            if ($hasil[$kode."A"] == 4 && $hasil[$kode."B"] == 0) {
                $hasil[$kode."B"] = 1;
            }
            if ($hasil[$kode."B"] == 4 && $hasil[$kode."C"] == 0) {
                $hasil[$kode."C"] = 1;
            }
            if ($hasil[$kode."C"] == 4 && $hasil[$kode."D"] == 0) {
                $hasil[$kode."D"] = 1;
            }
            if ($hasil[$kode."D"] == 4 && $hasil[$kode."E"] == 0) {
                $hasil[$kode."E"] = 1;
            }
        }
        return $hasil;
    }
    protected function tentukanSebelumAdaKelas($hasil)
    {
        for ($i = 1; $i <= 5; $i++) {
            if ($hasil[$i."C"] == 4 && $hasil[$i."B"] == 0) {
                $hasil[$i."B"] = 2;
            }
            if ($hasil[$i."D"] == 4 && $hasil[$i."C"] == 0) {
                $hasil[$i."C"] = 2;
            }
            if ($hasil[$i."E"] == 4 && $hasil[$i."D"] == 0) {
                $hasil[$i."D"] = 2;
            }
        }
        return $hasil;
    }
    protected function editBentrok($kode)
    {
        return Jadwal::where('anggota_id', session()->get('data')['nim'])
      ->update(["$kode" => 5]);
    }
    protected function showHari($jadwal)
    {
        $i = 0;
        $hari[][] = null;

        foreach($jadwal as $key => $hasil) {
            if($key == '1A' && ($hasil == 1 || $hasil == 2 || $hasil == 5))
                $hari[$i]['hari'] = "Senin, 09.30 - 11.10";
            elseif($key == '2A' && ($hasil == 1 || $hasil == 2 || $hasil == 5))
                $hari[$i]['hari'] = "Selasa, 09.30 - 11.10";
            elseif($key == '3A' && ($hasil == 1 || $hasil == 2 || $hasil == 5))
                $hari[$i]['hari'] = "Rabu, 09.30 - 11.10";
            elseif($key == '4A' && ($hasil == 1 || $hasil == 2 || $hasil == 5))
                $hari[$i]['hari'] = "Kamis, 09.30 - 11.10";
            elseif($key == '5A' && ($hasil == 1 || $hasil == 2 || $hasil == 5))
                $hari[$i]['hari'] = "Jumat, 09.30 - 11.10";
            elseif($key == '1B' && ($hasil == 1 || $hasil == 2 || $hasil == 5))
                $hari[$i]['hari'] = "Senin, 11.10 - 12.50";
            elseif($key == '2B' && ($hasil == 1 || $hasil == 2 || $hasil == 5))
                $hari[$i]['hari'] = "Selasa, 11.10 - 12.50";
            elseif($key == '3B' && ($hasil == 1 || $hasil == 2 || $hasil == 5))
                $hari[$i]['hari'] = "Rabu, 11.10 - 12.50";
            elseif($key == '4B' && ($hasil == 1 || $hasil == 2 || $hasil == 5))
                $hari[$i]['hari'] = "Kamis, 11.10 - 12.50";
            elseif($key == '5B' && ($hasil == 1 || $hasil == 2 || $hasil == 5))
                $hari[$i]['hari'] = "Jumat, 11.10 - 12.50";
            elseif($key == '1C' && ($hasil == 1 || $hasil == 2 || $hasil == 5))
                $hari[$i]['hari'] = "Senin, 12.50 - 14.30";
            elseif($key == '2C' && ($hasil == 1 || $hasil == 2 || $hasil == 5))
                $hari[$i]['hari'] = "Selasa, 12.50 - 14.30";
            elseif($key == '3C' && ($hasil == 1 || $hasil == 2 || $hasil == 5))
                $hari[$i]['hari'] = "Rabu, 12.50 - 14.30";
            elseif($key == '4C' && ($hasil == 1 || $hasil == 2 || $hasil == 5))
                $hari[$i]['hari'] = "Kamis, 12.50 - 14.30";
            elseif($key == '5C' && ($hasil == 1 || $hasil == 2 || $hasil == 5))
                $hari[$i]['hari'] = "Jumat, 12.50 - 14.30";
            elseif($key == '1D' && ($hasil == 1 || $hasil == 2 || $hasil == 5))
                $hari[$i]['hari'] = "Senin, 14.30 - 16.10";
            elseif($key == '2D' && ($hasil == 1 || $hasil == 2 || $hasil == 5))
                $hari[$i]['hari'] = "Selasa, 14.30 - 16.10";
            elseif($key == '3D' && ($hasil == 1 || $hasil == 2 || $hasil == 5))
                $hari[$i]['hari'] = "Rabu, 14.30 - 16.10";
            elseif($key == '4D' && ($hasil == 1 || $hasil == 2 || $hasil == 5))
                $hari[$i]['hari'] = "Kamis, 14.30 - 16.10";
            elseif($key == '5D' && ($hasil == 1 || $hasil == 2 || $hasil == 5))
                $hari[$i]['hari'] = "Jumat, 14.30 - 16.10";
            elseif($key == '1D' && ($hasil == 1 || $hasil == 2 || $hasil == 5))
                $hari[$i]['hari'] = "Senin, 14.30 - 16.10";
            elseif($key == '2D' && ($hasil == 1 || $hasil == 2 || $hasil == 5))
                $hari[$i]['hari'] = "Selasa, 14.30 - 16.10";
            elseif($key == '3D' && ($hasil == 1 || $hasil == 2 || $hasil == 5))
                $hari[$i]['hari'] = "Rabu, 14.30 - 16.10";
            elseif($key == '4D' && ($hasil == 1 || $hasil == 2 || $hasil == 5))
                $hari[$i]['hari'] = "Kamis, 14.30 - 16.10";
            elseif($key == '5D' && ($hasil == 1 || $hasil == 2 || $hasil == 5))
                $hari[$i]['hari'] = "Jumat, 14.30 - 16.10";
            elseif($key == '1E' && ($hasil == 1 || $hasil == 2 || $hasil == 5))
                $hari[$i]['hari'] = "Senin, 15.20 - 17.10";
            elseif($key == '2E' && ($hasil == 1 || $hasil == 2 || $hasil == 5))
                $hari[$i]['hari'] = "Selasa, 15.20 - 17.10";
            elseif($key == '3E' && ($hasil == 1 || $hasil == 2 || $hasil == 5))
                $hari[$i]['hari'] = "Rabu, 15.20 - 17.10";
            elseif($key == '4E' && ($hasil == 1 || $hasil == 2 || $hasil == 5))
                $hari[$i]['hari'] = "Kamis, 15.20 - 17.10";
            elseif($key == '5E' && ($hasil == 1 || $hasil == 2 || $hasil == 5))
                $hari[$i]['hari'] = "Jumat, 15.20 - 17.10";

            if($hasil == 1 || $hasil == 2 || $hasil == 5){
                $hari[$i]['key'] = $key;
                $hari[$i]['kode'] = $hasil;
                $i++;
            }
        }
        return $hari;
    }
    protected function showHasil()
    {
        if (!session()->has('data')) {
            return redirect('/login');
        }
        return view('user.hasil');
    }
}
