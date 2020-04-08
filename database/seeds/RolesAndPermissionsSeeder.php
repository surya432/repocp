<?php

use Illuminate\Database\Seeder;
use \Spatie\Permission\Models\Permission;
use \Spatie\Permission\Models\Role;
use Carbon\Carbon;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if ($this->command->confirm('Do you wish to refresh migration before seeding, it will clear all old data ?')) {
            // Call the php artisan migrate:refresh
            $this->command->call('migrate:refresh');

            $this->command->warn("Data cleared, starting from blank database.");
        }
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        \Spatie\Permission\Models\Permission::create(['name' => 'edit articles']);
        \Spatie\Permission\Models\Permission::create(['name' => 'delete articles']);
        \Spatie\Permission\Models\Permission::create(['name' => 'publish articles']);
        \Spatie\Permission\Models\Permission::create(['name' => 'unpublish articles']);

        // create roles and assign created permissions

        // this can be done as separate statements
        $role = \Spatie\Permission\Models\Role::create(['name' => 'writer']);
        $role->givePermissionTo('edit articles');

        // or may be done by chaining
        $role = \Spatie\Permission\Models\Role::create(['name' => 'moderator'])
            ->givePermissionTo(['publish articles', 'unpublish articles']);

        $role = \Spatie\Permission\Models\Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());
        $user = \App\User::create([
            'name' => "Super Admin",
            'email' => "hadisurya295@gmail.com",
            'password' => Hash::make("hadisurya295"),
        ]);
        $user->syncRoles(['super-admin']);
        \App\General::create([
            "key"=>"siteName",
            "value"=>"PT. Afan Logam Lestari",
            "flag"=>"Nama Perusahaan",
        ]);
        \App\General::create([
            "key"=>"siteDescription1",
            "value"=>"SOLUSI LIMBAH B3 DROSS, SLAG, SCRAP ALUMINIUM",
            "flag"=>"Deskripsi 1",
        ]);
        \App\General::create([
            "key"=>"siteDescription2",
            "value"=>"Percayakan Pada Kami Pengolahan, Pemanfaatan dan Transportasi Limbah B3 Dross, Slag dan Scrap Aluminium<br/>( Abu, Rosok Kaleng, Seeker, Plat )",
            "flag"=>"Deskripsi 2",
        ]);
        \App\General::create([
            "key"=>"Keyword1",
            "value"=>"Pemanfaatan dan Jasa Transportasi Untuk DROSS, SLAG, SCRAP Limbah B3 Industri dengan standart K3.",
            "flag"=>"Keyword Website",
        ]);
        \App\General::create([
            "key"=>"phoneWA",
            "value"=>"6285706516579",
            "flag"=>"Telepon WA",
        ]);
        \App\General::create([
            "key"=>"address",
            "value"=>"Dusun Mlaras Desa Mlaras<br/>Kecamatan Sumobito, Kab. Jombang - Jawa Timur",
            "flag"=>"Alamat Perusahan",
        ]);
        \App\General::create([
            "key"=>"phone",
            "value"=>"+62 81335912344 / +62 85706516579",
            "flag"=>"Telepon Perusahaan",
        ]);
        \App\General::create([
            "key"=>"facebook",
            "value"=>"people/Afan-Logam-Lestari/100009219022758",
            "flag"=>"Facebook",
        ]);
        \App\General::create([
            "key"=>"twitter",
            "value"=>"",
            "flag"=>"Twitter",
        ]);
        \App\Perijinan::create([
            "nama"=>"NIB",
            "kepanjangan"=>"Nomor Induk Berusaha",
            "nomor"=>"470/21/415.65.7/2018",
        ]);
        \App\Perijinan::create([
            "nama"=>"SIP",
            "kepanjangan"=>"Surat Ijin Pemanfaat",
            "nomor"=>"S880/Menlhk/Setjen/PLB.3/10/2019",
        ]);
        \App\Perijinan::create([
            "nama"=>"SIT",
            "kepanjangan"=>"Surat Ijin Transporter",
            "nomor"=>"1021007081800002",
        ]);
        \App\Perijinan::create([
            "nama"=>"RIT",
            "kepanjangan"=>"Rekom Ijin Transporter",
            "nomor"=>"S.802/VLPB3/PPLB3/PLB.3/8.2019",
        ]);
        \App\Perijinan::create([
            "nama"=>"SPPKP",
            "kepanjangan"=>"Surat Pengukuhan Pengusaha Kena Pajak",
            "nomor"=>"S-4PKP/WPJ.24/KP.1603/2018",
        ]);
        $now = Carbon::now()->toDateTimeString();

        \App\Product::create(
            array(
            "nama"=>"Transportasi",
            "deskripsi"=>"Menerima Jasa Pengangkutan limbah B3 dengan standart SOP yang sesuai dengan K3",
            "keterangan"=>"PT. AFAN LOGAM LESTARI dengan perizinan dan kelengkapannya menawarkan jasa pengolahan limbah B3 padat maupun cair meliputi Ash, Dross, Slag serta limbah B3 cair sisa dari proses perawatan mesin & produksi.",
            "images"=>"product01.png",
           ),
        );
        \App\Product::create(
            array(
                "nama"=>"Spectro",
                "deskripsi"=>"Alat Pengukuran Kadar dan jenis logam pada suatu ingot yang terkomputerisasi dan akurat agar sesuai kebutuhan perusahaan Mitra Kerja",
                "keterangan"=>"Dengan kelengkapannya alat Spectro, produksi lebih akurat untuk mengelola limbah Ash, dross dan slag menjadi batangan ingot timah, tembaga, almunium untuk dijual ke perusahaan / pemurnian / industri",
                "images"=>"product02.png",
            ),
        );
        \App\Product::create(
            array(
                "nama"=>"Pemanfaatan",
                "deskripsi"=>"Pemanfaatan dan pengolahan Limbah B3 seperti Scrap, Drag dan Slag Untuk menjadi Aluminium yang berkualitas",
                "keterangan"=>"Pemanfaatan dan pengolahan Limbah B3 seperti Scrap, Drag dan Slag Untuk menjadi Aluminium yang berkualitas",
                "images"=>"product03.png",
            ),
        );
        \App\Mitra::create(
            array(
                "nama"=>"PT. Molten Alumunium Producer Indonesia",
                "images"=>"1585395244.png"
            ),
        );
        \App\Mitra::create(
            array(
                "nama"=>"PT DAIKI ALUMINIUN INDUSTRY INDONESIA",
                "images"=>"DAIKI.PT.jpg"
            ),
        );
        \App\Mitra::create(
            array(
                "nama"=>"PT DAIKI TRADING INDONESIA",
                "images"=>"DAIKI.PT.jpg"
            ),
        );
        \App\Mitra::create(
            array(
                "nama"=>"PT SIDO AGUNG ALUMI",
                "images"=>"SAA.PT.jpg"
            ),
        );
        \App\Mitra::create(
            array(
                "nama"=>"PT. LUT PUTRA SOLDER",
                "images"=>"LPS.PT.png"
            ),
        );
        \App\About::create(
            array(
                "title"=>"Home Industry",
                "year"=>"2006",
                "flag"=>"active",
                "deskripsi"=>"Pada tahun 2006 kami memulai usaha ini melalui Home Industri di daerah Jawa Tengah. Tepatnya di Kelurahan Tambakrejo Jawa Tengah. Selama kurang lebih 2 Tahun, kami akhirnya memutuskan pindah ke Jombang untuk Pengembangan Usaha.",
                "images"=>"about-01.jpg"
            ),
        );
        \App\About::create(
            array(
                "title"=>"CV. Afan Logam Lestari",
                "year"=>"2008",
                "flag"=>"active",
                "deskripsi"=>"Pada Tahun 2008 saat awal pindah di Jombang. Kmai masih menyewa tempat rekan kerja kami untuk pengembangan usaha ini. Selama 7 bulan menyewa tempat, akhirnya kami bisa menemoati tempat yang baru sampai sekarang ini. Tepatnya di Dusun Mlaras Desa Mlaras Kecamatan Sumobito Kabupaten Jombang. Dari sinilah pengembangan usaha kami terbentuk dan berkembang secara perlahan tapi pasti.",
                "images"=>"about-02.jpg"
            ),
        );
        \App\About::create(
            array(
                "title"=>"PT. Afan Logam Lestari",
                "year"=>"2017",
                "flag"=>"active",
                "deskripsi"=>"Selama 9 tahun menjadi CV, pada tahun 2017 regulasi pemerintah mengharuskan semua yang melakukan pemanfaatan dan pengolahan limbah harus berupa PT. Proses untuk menjadi PT. pun tidak mudah karena harus memenuhi beberapa ijin. Kami berjuang dan berusaha untuk mendapatkan semua ijin yang harus didapat. Dari Ijin Lokasi di Desa, Provinsi, ijin dari Kementerian Lingkungan Hidup dan Kehutanan Republik Indonesia (KLHK) untuk pendirian usaha ini.",
                "images"=>"about-03.jpg"
            ),
        );
        \App\About::create(
            array(
                "title"=>"PT. Afan Logam Lestari",
                "year"=>"2019",
                "flag"=>"active",
                "deskripsi"=>"Semua hal besar berasal dari hal kecil. Terjatuh bukan sebuah kegagalan, asal terus berjuang dan tidak menyerah. Percayalah akan indah pada waktunya.",
                "images"=>"about-04.jpg"
            ),
        );
        $dokumentasi1 = \App\Dokumentasi::create(
            array(
                "title"=>"Transportasi",
                "tanggal"=>"2019-02-20",
                "deskripsi"=>"Aktivitas Pengangkutan Barang",
                "content"=>"Aktivitas Pengangkutan Barang",
                "images"=>"kegiatan/Garasi_Transporter.jpg"
            ),
        );
        \App\Media::Create(
            array(
                "title"=>"Aktivitas Pengangkutan Barang",
                "mime"=>"images/jpg",
                "path"=>"kegiatan/Garasi_Transporter_2.jpg",
                "dokumentasi_id"=>$dokumentasi1->id,
            )
        );
        \App\Media::Create(
            array(
                "title"=>"Aktivitas Pengangkutan Barang",
                "mime"=>"images/jpg",
                "path"=>"kegiatan/Garasi_Transporter.jpg",
                "dokumentasi_id"=>$dokumentasi1->id,
            )
        );
        \App\Media::Create(
            array(
                "title"=>"Aktivitas Pengangkutan Barang",
                "mime"=>"images/jpg",
                "path"=>"kegiatan/Transportasi_ALL2.jpg",
                "dokumentasi_id"=>$dokumentasi1->id,
            )
        );
        \App\Media::Create(
            array(
                "title"=>"Aktivitas Pengangkutan Barang",
                "mime"=>"images/jpg",
                "path"=>"kegiatan/Transportasi_ALL9.jpg",
                "dokumentasi_id"=>$dokumentasi1->id,
            )
        );
        \App\Media::Create(
            array(
                "title"=>"Aktivitas Pengangkutan Barang",
                "mime"=>"images/jpg",
                "path"=>"kegiatan/Transportasi_ALL10.jpg",
                "dokumentasi_id"=>$dokumentasi1->id,
            )
        );
        $dokumentasi1 = \App\Dokumentasi::create(
            array(
                "title"=>"Pelaksanaan Pos Usaha Kesehatan Desa",
                "tanggal"=>"2019-02-20",
                "deskripsi"=>"Dengan ini perusahan tidak hanya memberdayakan SDM setempat tetapi mendukung kesehatan bagi warga sekitar pabrik.",
                "content"=>"Dengan ini perusahan tidak hanya memberdayakan SDM setempat tetapi mendukung kesehatan bagi warga sekitar pabrik.",
                "images"=>"kegiatan/Pembentukan_pos_usaha_kesehatan_desa.jpg"
            ),
        );
        \App\Media::Create(
            array(
                "title"=>"Pelaksanaan Pos Usaha Kesehatan Desa",
                "mime"=>"images/jpg",
                "path"=>"kegiatan/Transportasi_ALL10.jpg",
                "dokumentasi_id"=>$dokumentasi1->id,
            )
        );
        $dokumentasi1 = \App\Dokumentasi::create(
            array(
                "title"=>"Pelaksanaan Uji Emisi",
                "tanggal"=>"2019-02-20",
                "deskripsi"=>"Pelaksanaan Uji Emisi",
                "content"=>"Pelaksanaan Uji Emisi",
                "images"=>"kegiatan/Pelaksanaan-uji-emisi.jpg"
            ),
        );
        \App\Media::Create(
            array(
                "title"=>"Pelaksanaan Uji Emisi",
                "mime"=>"images/jpg",
                "path"=>"kegiatan/Pelaksanaan-uji-emisi.jpg",
                "dokumentasi_id"=>$dokumentasi1->id,
            )
        );
        \App\Media::Create(
            array(
                "title"=>"Pelaksanaan Uji Emisi",
                "mime"=>"images/jpg",
                "path"=>"kegiatan/Uji-emisi-cerobong.jpg",
                "dokumentasi_id"=>$dokumentasi1->id,
            )
        );
    }
}