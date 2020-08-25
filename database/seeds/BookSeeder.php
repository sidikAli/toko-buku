<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
    		'judul'        => "THE BLACK CAT AND OTHER STORIES",  
            'penulis'      => "Edgar Allan Poe",  
            'penerbit'     => "Noura Books",  
            'deskripsi'    => "Siapa yang tidak mengenal sosok Edgar Allan Poe? Karya-karyanya menginspirasi para penulis cerita misteri terkenal seperti Agatha Christie hingga Sir Arthur Conan Doyle.  Ide dan gaya penceritaan yang begitu unik, suram, dan menekankan deskripsi yang kuat, membuat pembaca seakan mengalami sendiri kisah yang dilakoni tokoh utamanya.Tumbuh dewasa sebagai  anak adopsi, Poe menjalani kehidupan yang sulit. Namun, di tengah kerumitan kisah pribadinya, Poe mampu menulis begitu banyak karya yang patut diapresiasi di genre horror gothic dan detektif.",  
            'gambar'       => "15902123785ec8b71a8b557.jpg",  
            'harga'        => 70000,  
            'jumlah_halaman'=> 388,  
            'berat'        => 320,  
            'qty'          => 12,  
            'slug'         => "the-black-cat-and-other-stories",
            'category_id'  => 2,
    	]);
    }
}
