<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dateformat
{
    public function tgl($tanggal, $cetak_hari = false)
    {
        $hari = array(1 => 'Senin',
            'Selasa',
            'Rabu',
            'Kamis',
            'Jumat',
            'Sabtu',
            'Minggu'
        );

        $bulan = array(1 => 'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        if($tanggal) {
            $split = explode('-', $tanggal);
            $tgl_indo = $split[2] . ' ' . $bulan[(int) $split[1]] . ' ' . $split[0];
    
            if ($cetak_hari) {
                $num = date('N', strtotime($tanggal));
                return $hari[$num] . ', ' . $tgl_indo;
            }
        return $tgl_indo;            
        }
        
    }
}
