<?php

namespace App\Console\Commands;
use App\Models\User;
use Illuminate\Console\Command;

class CreateOrganizationUser extends Command
{

    protected $signature = 'create:organization-user {name} {email} {cpf} {password}';

    protected $description = 'Cria um novo usuário do tipo organização';

    public function __construct()
    {
        parent::__construct();
    }


    public function handle()
    {
        $name = $this->argument('name');
        $email = $this->argument('email');
        $cpf = $this->argument('cpf');
        $password = $this->argument('password');

        User::create([
            'name'=>$name,
            'email'=>$email,
            'cpf'=>$cpf,
            'password'=>$password,
            'role'=>'organization'
        ]);

        $this->info('Usuário criado com sucesso');
    }


}
