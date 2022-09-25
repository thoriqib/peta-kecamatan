<?php

use Illuminate\Database\Seeder;
use App\Kecamatan;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {   
        User::create([
            'name' => 'BPS Kota Bandung',
            'username' => 'bps3273',
            'password' => '$2y$10$RpAfycAE8JSedV2/ORPOSuAhlTTZuupvZFSfqy2M9Dgnx5NK1rUxS'
        ]);
            Kecamatan::create( [
            'id'=>"3273180",
            'nama'=>'Andir',
            'slug'=>'andir'
            ] );
                        
            Kecamatan::create( [
            'id'=>"3273141",
            'nama'=>'Antapani',
            'slug'=>'antapani'
            ] );
                        
            Kecamatan::create( [
            'id'=>"3273140",
            'nama'=>'Arcamanik',
            'slug'=>'arcamanik'
            ] );

            Kecamatan::create( [
                'id'=>"3273050",
                'nama'=>'Astana Anyar',
                'slug'=>'astana_anyar'
            ] );
                        
            Kecamatan::create( [
            'id'=>"3273020",
            'nama'=>'Babakan Ciparay',
            'slug'=>'babakan_ciparay'
            ] );
                        
            Kecamatan::create( [
            'id'=>"3273080",
            'nama'=>'Bandung Kidul',
            'slug'=>'bandung_kidul'
            ] );
                        
            Kecamatan::create( [
            'id'=>"3273010",
            'nama'=>'Bandung Kulon',
            'slug'=>'bandung_kulon'
            ] );
                        
            Kecamatan::create( [
            'id'=>"3273200",
            'nama'=>'Bandung Wetan',
            'slug'=>'bandung_wetan'
            ] );
                        
            Kecamatan::create( [
            'id'=>"3273160",
            'nama'=>'Batununggal',
            'slug'=>'batununggal'
            ] );
                        
            Kecamatan::create( [
            'id'=>"3273030",
            'nama'=>'Bojongloa Kaler',
            'slug'=>'bojongloa_kaler'
            ] );
                        
            Kecamatan::create( [
            'id'=>"3273040",
            'nama'=>'Bojongloa Kidul',
            'slug'=>'bojongloa_kidul'
            ] );
                        
            Kecamatan::create( [
            'id'=>"3273090",
            'nama'=>'Buahbatu',
            'slug'=>'buahbatu'
            ] );
                        
            Kecamatan::create( [
            'id'=>"3273220",
            'nama'=>'Cibeunying Kaler',
            'slug'=>'cibeunying_kaler'
            ] );
                        
            Kecamatan::create( [
            'id'=>"3273210",
            'nama'=>'Cibeunying Kidul',
            'slug'=>'cibeunying_kidul'
            ] );
                        
            Kecamatan::create( [
            'id'=>"3273110",
            'nama'=>'Cibiru',
            'slug'=>'cibiru'
            ] );
                        
            Kecamatan::create( [
            'id'=>"3273190",
            'nama'=>'Cicendo',
            'slug'=>'cicendo'
            ] );
                        
            Kecamatan::create( [
            'id'=>"3273260",
            'nama'=>'Cidadap',
            'slug'=>'cidadap'
            ] );
                        
            Kecamatan::create( [
            'id'=>"3273121",
            'nama'=>'Cinambo',
            'slug'=>'cinambo'
            ] );
                        
            Kecamatan::create( [
            'id'=>"3273230",
            'nama'=>'Coblong',
            'slug'=>'coblong'
            ] );
                        
            Kecamatan::create( [
            'id'=>"3273101",
            'nama'=>'Gedebage',
            'slug'=>'gedebage'
            ] );
                        
            Kecamatan::create( [
            'id'=>"3273150",
            'nama'=>'Kiaracondong',
            'slug'=>'kiaracondong'
            ] );
                        
            Kecamatan::create( [
            'id'=>"3273070",
            'nama'=>'Lengkong',
            'slug'=>'lengkong'
            ] );
                        
            Kecamatan::create( [
            'id'=>"3273142",
            'nama'=>'Mandalajati',
            'slug'=>'mandalajati'
            ] );
                        
            Kecamatan::create( [
            'id'=>"3273111",
            'nama'=>'Panyileukan',
            'slug'=>'panyileukan'
            ] );
                        
            Kecamatan::create( [
            'id'=>"3273100",
            'nama'=>'Rancasari',
            'slug'=>'rancasari'
            ] );
                        
            Kecamatan::create( [
            'id'=>"3273060",
            'nama'=>'Regol',
            'slug'=>'regol'
            ] );
                        
            Kecamatan::create( [
            'id'=>"3273240",
            'nama'=>'Sukajadi',
            'slug'=>'sukajadi'
            ] );
                        
            Kecamatan::create( [
            'id'=>"3273250",
            'nama'=>'Sukasari',
            'slug'=>'sukasari'
            ] );
                        
            Kecamatan::create( [
            'id'=>"3273170",
            'nama'=>'Sumur Bandung',
            'slug'=>'sumur_bandung'
            ] );
                        
            Kecamatan::create( [
            'id'=>"3273120",
            'nama'=>'Ujung Berung',
            'slug'=>'ujung_berung'
            ] );
    }
}
