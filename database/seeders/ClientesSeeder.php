<?php

namespace Database\Seeders;

use App\Models\Clientes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
        {
            Clientes::create([
                'nome' => 'Victor Padovam',
                'email' => 'v@gmail.com',
                'endereco' => 'rua x',
                'logradouro' => 'rua x',
                'cep' => '217900',
                'Bairro' => 'jardim x',
            ]
                
            );

            Clientes::create([
                'nome' => 'Teste Padovam',
                'email' => 'v@gmail.com',
                'endereco' => 'rua x',
                'logradouro' => 'rua x',
                'cep' => '217900',
                'Bairro' => 'jardim x',
            ]
                
            );
        }
}
