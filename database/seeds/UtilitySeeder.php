<?php

use App\Utility;
use Illuminate\Database\Seeder;

class UtilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Utility::create([
            'nama_website'      => 'Black Orange CCTV',
            'logo'              => 'public/logo.png',
            'nama_perusahaan'   => 'PT. Hitam Oranye Indonesia',
            'alamat_perusahaan' => 'Perum BSI 2 Blok G No.7 RT 02/12, Pengasinan Sawangan, Depok',
            'tentang_kami'      => '<p>PT. Hitam Oranye Indonesia adalah Perusahan yang bergerak di bidang layanan jasa dan penjualan product dan Security System dalam bidang Teknologi dan Telekomunikasi yang .</p> <p>Prioriats kami adalah kepuasan konsumen untuk mencapai serta menjaga hal tersebut, selain menyediakan product berkualitas dan bergaransi kami menyediakan layanan online support, serta tenaga Proffesional yang siap melayani konsumen di seluruh Indonesia. Dengan pengalama yang kami miliki, kami siap menjadi solusi untuk semua kebutuhan Security dan telekomuniukasi adna dimanapun.</p>',
            'nomor_telepon'     => '081380809602',
            'nomor_whatsapp'    => '+6281380809602',
            'email'             => 'admin@blackorangecctv.com',
            'maps'              => '',
            'link_facebook'     => '',
            'link_instagram'    => '',
            'link_twitter'      => '',
            'link_youtube'      => '',
        ]);
    }
}
