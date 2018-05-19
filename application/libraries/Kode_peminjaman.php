<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kode_peminjaman
{
    public function random($limit)
    {
        return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $limit);
    }
}
