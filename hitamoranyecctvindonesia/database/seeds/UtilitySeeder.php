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
            'nama_website'              => 'Black Orange CCTV',
            'logo'                      => 'public/logo.png',
            'nama_perusahaan'           => 'PT. Hitam Oranye Indonesia',
            'slogan'                    => 'Specialist CCTV & Security System',
            'kalimat_penarik_pelanggan' => 'Apakah anda mencari specialist cctv dan security system?',
            'alamat_perusahaan'         => 'Perum BSI 2 Blok G No.7 RT 02/12, Pengasinan Sawangan, Depok',
            'tentang_kami'              => 'PT. Hitam Oranye Indonesia adalah Perusahan yang bergerak di bidang layanan jasa dan penjualan product dan Security System dalam bidang Teknologi dan Telekomunikasi.

            Prioritas kami adalah kepuasan konsumen untuk mencapai serta menjaga hal tersebut, selain menyediakan product berkualitas dan bergaransi kami menyediakan layanan online support, serta tenaga Proffesional yang siap melayani konsumen di seluruh Indonesia. Dengan pengalama yang kami miliki, kami siap menjadi solusi untuk semua kebutuhan Security dan telekomuniukasi anda dimanapun.',
            'visi'                      => 'Menjadi perusahaan terpercaya sebagai parter terbaik dan terdepan di Indonesia pada bidang security system',
            'misi'                      => 'Menyediakan produk-produk yang berkualitas dengan harga terjangkau dan bergaransi.

            Menyerdiakan tenaga teknisi yang berpengalamandi bidangnya, dan mengedepankan kerjasama team dan profisionaliseme terbaik.

            Memberikan konsultasi dan pengetahuan umumtentang manfaat dan penting nya CCTV SYSTEM, PABX, ALARM SYSTEM, ACCESS CONTROL serta JARINGAN DATA (LAN/WAN) bagi perusahaan maupun perorangan.

            Memberikan kemudahan dan kepuasan kepada konsumen dan calon konsumen melalui pelayanan Prima.

            Membangun kerjasama dan kemitraan usaha / mitra kerja yang saling mengguntungkan satu sama lain.',
            'nomor_telepon'             => '081380809602',
            'nomor_whatsapp'            => '081380809602',
            'email'                     => 'admin@blackorangecctv.com',
            'maps'                      => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d448.99108668045164!2d106.76089840102658!3d-6.427468571933368!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNsKwMjUnMzguNyJTIDEwNsKwNDUnMzkuNiJF!5e0!3m2!1sid!2sid!4v1599960724682!5m2!1sid!2sid" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>',
            'link_facebook'             => '',
            'link_instagram'            => '',
            'link_twitter'              => '',
            'link_youtube'              => '',
        ]);
    }
}
