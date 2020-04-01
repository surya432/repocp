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
            "value"=>"PT. Alfan Logam Lestari",
            "flag"=>"Nama Perusahaan",
        ]);
        \App\General::create([
            "key"=>"siteDescription1",
            "value"=>"SOLUSI LIMBAH DROSS, SLAG, SCRAP",
            "flag"=>"Deskripsi 1",
        ]);
        \App\General::create([
            "key"=>"siteDescription2",
            "value"=>"Butuh pengolahan, pemanfaatan dan transportasi limbah diatas?",
            "flag"=>"Deskripsi 2",
        ]);
        \App\General::create([
            "key"=>"Keyword1",
            "value"=>"Pemanfaatan dan Jasa Transportasi Untuk Limbah B3 Industri dengan standart K3.",
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
            "nama"=>"NPWP",
            "kepanjangan"=>"Nomor Pokok Wajib Pajak",
            "nomor"=>"84.796.467.3-602.000",
        ]);
        \App\Perijinan::create([
            "nama"=>"TDP",
            "kepanjangan"=>"Tanda Daftar Perusahaan",
            "nomor"=>"132014700203",
        ]);
        \App\Perijinan::create([
            "nama"=>"SIUP",
            "kepanjangan"=>"Surat Ijin Usaha Perdagangan",
            "nomor"=>"517/0780/415.35/2018",
        ]);
        $now = Carbon::now()->toDateTimeString();

        \App\Product::create(
            array(
            "nama"=>"Transportasi",
            "deskripsi"=>"Menerima Jasa Pengangkutan limbah B3 dengan standart SOP yang sesuai dengan K3",
            "keterangan"=>"Menerima Jasa Pengangkutan limbah B3 dengan standart SOP yang sesuai dengan K3",
            "images"=>"product01.png",
           ),
        );
        \App\Product::create(
            array(
                "nama"=>"Spectro",
                "deskripsi"=>"Alat Pengukuran Kadar dan jenis logam pada suatu ingot yang terkomputerisasi dan akurat agar sesuai kebutuhan perusahaan Mitra Kerja",
                "keterangan"=>"Alat Pengukuran Kadar dan jenis logam pada suatu ingot yang terkomputerisasi dan akurat agar sesuai kebutuhan perusahaan Mitra Kerja",
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
    }
}