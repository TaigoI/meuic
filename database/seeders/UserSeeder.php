<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'google_id' => 1,
            'email' => 'mjgs@ic.ufal.br',
            'matricula'=> 1234,
            'name' => "Maria José Gomes Silva",
            'picture' => "https://www.showmetech.com.br/wp-content/uploads//2020/02/ginny-rometty-se-aposenta-da-ibm.jpg",
            'user_role' => 'M'
            
        ]);
        DB::table('users')->insert([
            'google_id' => 2,
            'email' => 'felipe@ic.ufal.br',
            'matricula'=> 4321,
            'name' => "felipe",
            'picture' => "https://conteudo.imguol.com.br/c/noticias/92/2022/05/04/elon-musk-no-baile-met-gala-em-nova-york-em-2-de-maio-de-2022-1651683047262_v2_4x3.jpg",
            'user_role' => 'M'
            
        ]);
        DB::table('users')->insert([
            'google_id' => 3,
            'email' => 'ebo@ic.ufal.br',
            'matricula'=> 4567,
            'name' => "Emily Brito de Oliveira",
            'picture' => "https://www.otmza.com.br/wp-content/uploads/2020/03/katiebouman-cortada.jpg",
            'user_role' => 'M'
            
        ]);
        DB::table('users')->insert([
            'google_id' => 3,
            'email' => 'jals@ic.ufal.br',
            'matricula'=> 7891,
            'name' => "José Arthur Lopes Sabino",
            'picture' => "https://t.ctcdn.com.br/IFvswOVy57rDAEBc5_ox062Me0c=/400x400/smart/filters:format(webp)/i490763.jpeg",
            'user_role' => 'S'
            
        ]);
        DB::table('users')->insert([
            'google_id' => 2,
            'email' => 'timp@ic.ufal.br',
            'matricula'=> 1567,
            'name' => "Taigo Italo de Moraes Pedrosa",
            'picture' => "https://upload.wikimedia.org/wikipedia/commons/a/a1/Alan_Turing_Aged_16.jpg",
            'user_role' => 'S'            
        ]);
        DB::table('users')->insert([
            'google_id' => 2,
            'email' => 'dbrs@ic.ufal.br',
            'matricula'=> 4789,
            'name' => "Denilson Bulhões",
            'picture' => "https://upload.wikimedia.org/wikipedia/commons/thumb/f/f5/Steve_Jobs_Headshot_2010-CROP2.jpg/1200px-Steve_Jobs_Headshot_2010-CROP2.jpg",
            'user_role' => 'M'      
        ]);
    }
}
