<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function dataUmum($request)
    {
        return $request->validate([
            'nomor'                 => ['required', 'string', 'max:128'],
            'tanggal_pengesahan'    => ['required', 'date', 'after:yesterday'],
            'tanggal_mulai'         => ['required', 'after:yesterday'],
            'tanggal_selesai'       => ['required', 'after:tanggal_mulai'],
            'lokasi_pekerjaan'      => ['required', 'string', 'max:128'],
            'pelaksana_pekerjaan'   => ['required', 'string', 'max:128'],
            'uraian_pekerjaan'      => ['required'],
        ],[
            'tanggal_pengesahan.after'  => 'tanggal pengesahan harus sesudahnya kemarin',
            'tanggal_mulai.after'       => 'tanggal mulai harus sesudahnya kemarin',
        ]);
    }

    public function dataJenisPekerjaan($request)
    {
        return $request->validate([
            'menimbulkan_api'               => ['nullable'],
            'menimbulkan_bunga_api'         => ['nullable'],
            'alat_potong'                   => ['nullable'],
            'hot_tapping_jenis_pekerjaan'   => ['nullable'],
            'menyalakan_flare'              => ['nullable'],
            'lainnya_jenis_pekerjaan'       => ['nullable'],
        ]);
    }

    public function dataSumberBahayaAlat($request)
    {
        return $request->validate([
            'alat_listrik'                      => ['nullable'],
            'moving_part'                       => ['nullable'],
            'crane'                             => ['nullable'],
            'generator_or_compressor'           => ['nullable'],
            'akses_sulit'                       => ['nullable'],
            'gas'                               => ['nullable'],
            'bahan_kimia'                       => ['nullable'],
            'bising'                            => ['nullable'],
            'kejatuhan'                         => ['nullable'],
            'media_panas_or_dingin'             => ['nullable'],
            'ergonomi'                          => ['nullable'],
            'bertekanan'                        => ['nullable'],
            'mudah_terbakar'                    => ['nullable'],
            'biologi'                           => ['nullable'],
            'blasting'                          => ['nullable'],
            'penggalan'                         => ['nullable'],
            'hot_tapping_sumber_bahaya_alat'    => ['nullable'],
            'pengelasan'                        => ['nullable'],
            'grinding'                          => ['nullable'],
            'cuaca_buruk'                       => ['nullable'],
            'materi_berbahaya'                  => ['nullable'],
            'pilling'                           => ['nullable'],
            'paparang_panas_matahari'           => ['nullable'],
            'pigging'                           => ['nullable'],
            'lifting'                           => ['nullable'],
            'drilling'                          => ['nullable'],
            'blowdown'                          => ['nullable'],
            'uji_bertekanan'                    => ['nullable'],
            'hot_cutting'                       => ['nullable'],
            'bongkar_muat'                      => ['nullable'],
            'power_bushing'                     => ['nullable'],
            'interlock_bypass'                  => ['nullable'],
            'lainnya_sumber_bahaya_alat'        => ['nullable'],
        ]);
    }

    public function dataAlatPelindungDiri($request)
    {
        return $request->validate([
            'safety_helmet'                 => ['nullable'],
            'safety_glass'                  => ['nullable'],
            'goggle'                        => ['nullable'],
            'face_shield'                   => ['nullable'],
            'others_kepala'                 => ['nullable'],
            'keterangan_others_kepala'      => ['nullable'],
            'ear_plug'                      => ['nullable'],
            'ear_muff'                      => ['nullable'],
            'others_telinga'                => ['nullable'],
            'keterangan_others_telinga'     => ['nullable'],
            'safety_shoes_or_boot'          => ['nullable'],
            'safety_rain_boot'              => ['nullable'],
            'electrical_shoes_or_boot'      => ['nullable'],
            'others_kaki'                   => ['nullable'],
            'keterangan_others_kaki'        => ['nullable'],
            'half_mask_respirator'          => ['nullable'],
            'full_face'                     => ['nullable'],
            'dust_mask'                     => ['nullable'],
            'scba_or_airline_set'           => ['nullable'],
            'others_pernapasan'             => ['nullable'],
            'keterangan_others_pernapasan'  => ['nullable'],
            'cotton_glove'                  => ['nullable'],
            'leather_glove'                 => ['nullable'],
            'rubber_glove'                  => ['nullable'],
            'chemical_glove'                => ['nullable'],
            'others_tangan'                 => ['nullable'],
            'keterangan_others_tangan'      => ['nullable'],
            'coverall'                      => ['nullable'],
            'chemical_suit'                 => ['nullable'],
            'apron'                         => ['nullable'],
            'life_vest'                     => ['nullable'],
            'others_badan'                  => ['nullable'],
            'keterangan_others_badan'       => ['nullable'],
            'full_body_harness'             => ['nullable'],
            'safety_line'                   => ['nullable'],
            'others_ketinggian'             => ['nullable'],
            'keterangan_others_ketinggian'  => ['nullable'],
        ]);
    }

    public function dataDokumenPendukung($request)
    {
        return $request->validate([
            'a' => ['nullable'],
            'b' => ['nullable'],
            'c' => ['nullable'],
            'd' => ['nullable'],
            'e' => ['nullable'],
        ]);
    }

    public function dataUjiKandunganGas($request)
    {
        return $request->validate([
            'o2'                                    => ['nullable'],
            'sebelum_pelaksanaan_pekerjaan1'        => ['nullable'],
            'saat_pelaksanaan_pekerjaan_setiap1'    => ['nullable'],
            'waktu_pelaksanaan_pekerjaan1'          => ['nullable'],
            'toxic'                                 => ['nullable'],
            'sebelum_pelaksanaan_pekerjaan2'        => ['nullable'],
            'saat_pelaksanaan_pekerjaan_setiap2'    => ['nullable'],
            'waktu_pelaksanaan_pekerjaan2'          => ['nullable'],
            'combustible'                           => ['nullable'],
            'sebelum_pelaksanaan_pekerjaan3'        => ['nullable'],
            'saat_pelaksanaan_pekerjaan_setiap3'    => ['nullable'],
            'waktu_pelaksanaan_pekerjaan3'          => ['nullable'],
        ]);
    }

    public function dataPetugasPengawas($request)
    {
        return $request->validate([
            'nama_petugas_isolasi_listrik'      => ['required', 'string', 'max:64'],
            'jabatan_petugas_isolasi_listrik'   => ['required', 'string', 'max:64'],
            'tanggal_petugas_isolasi_listrik'   => ['required', 'date', 'after:yesterday'],
            'nama_petugas_uji_kandungan_gas'    => ['required', 'string', 'max:64'],
            'jabatan_petugas_uji_kandungan_gas' => ['required', 'string', 'max:64'],
            'tanggal_petugas_uji_kandungan_gas' => ['required', 'date', 'after:yesterday'],
        ],[
            'tanggal_petugas_isolasi_listrik.after' => 'tanggal petugas isolasi listrik harus sesudahnya kemarin',
            'tanggal_petugas_uji_kandungan_gas.after'       => 'tanggal uji kandungan gas harus sesudahnya kemarin',
        ]);
    }

    public function dataPengesahan($request)
    {
        return $request->validate([
            'nama_pelaksana_pekerjaan'          => ['required', 'string', 'max:64'],
            'jabatan_pelaksana_pekerjaan'       => ['required', 'string', 'max:64'],
            'tanggal_pelaksana_pekerjaan'       => ['required', 'date', 'after:yesterday'],
            'nama_penanggung_jawab_area'       => ['required', 'string', 'max:64'],
            'jabatan_penanggung_jawab_area'    => ['required', 'string', 'max:64'],
            'tanggal_penanggung_jawab_area'    => ['required', 'date', 'after:yesterday'],
        ],[
            'tanggal_pelaksana_pekerjaan.after'     => 'tanggal petugas isolasi listrik harus sesudahnya kemarin',
            'tanggal_penanggung_jawab_area.after'  => 'tanggal uji kandungan gas harus sesudahnya kemarin',
        ]);
    }

    public function dataValidasi($request)
    {
        return $request->validate([
            'validasi_hari.*'           => ['required', 'date', 'after:yesterday'],
            'validasi_mulai_hari.*'     => ['required'],
            'validasi_selesai_hari.*'   => ['required'],
            'nama_pelaksana.*'          => ['required', 'string', 'max:64'],
            'inisial_pelaksana.*'       => ['required', 'string', 'max:64'],
            'nama_pengawas.*'           => ['required', 'string', 'max:64'],
            'inisial_pengawas.*'        => ['required', 'string', 'max:64'],
        ]);
    }
}
