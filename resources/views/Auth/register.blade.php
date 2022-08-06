<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/sb-admin-2.min.css')}}">
</head>
<body>
    <div class="card shadow my-5 w-75 mx-auto">
        <div class="card-body">
            <form action="{{route('auth.register.store')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Nome" name="user[name]">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group"> 
                            <input type="email" class="form-control" placeholder="E-mail" name="user[email]">
                        </div>
                    </div>
                    <div class="col-md-6">  
                        <div class="form-group">     
                            <input type="text" class="form-control" placeholder="CPF" name="user[cpf]">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">  
                        <div class="form-group">     
                            <input type="password" class="form-control" placeholder="Senha" name="user[password]">
                        </div>
                    </div>
                </div>

                <hr>

                <div class="col-md-3">
                    <div class="form-group">
                        <input type="text"  class="form-control" placeholder="CEP" name="address[cep]">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <input type="text"  class="form-control" placeholder="UF" name="address[uf]">
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="form-group">
                        <input type="text"  class="form-control" placeholder="Cidade" name="address[city]">
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="form-group">
                        <input type="text"  class="form-control" placeholder="Logradouro" name="address[street]">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Número" name="address[number]">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text"  class="form-control" placeholder="Bairro" name="address[district]">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text"  class="form-control" placeholder="Complemento" name="address[complement]">
                    </div>
                </div>

                <hr>

                <div class="col-md-6">  
                    <div class="form-group">     
                        <input type="text" name="phones[0][number]" class="form-control" placeholder="Telefone">
                    </div>
                </div>
                <div class="col-md-6">  
                    <div class="form-group">     
                        <input type="text" name="phones[1][number]" class="form-control" placeholder="Celular">
                    </div>
                </div>

                <button type="submit" class="btn btn-success btn-block mt-3">Criar conta</button>
            </form>
        </div>
</body>
</html>