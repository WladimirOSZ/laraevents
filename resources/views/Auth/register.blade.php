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
                            <input type="text" class="form-control {{$errors->has('user.name') ? 'is-invalid' : ''}}" placeholder="Nome" name="user[name]" value="{{old('user.name')}}">
                            <div class="invalid-feedback">{{ $errors->first('user.name') }}</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="email" class="form-control  {{$errors->has('user.email') ? 'is-invalid' : ''}}" placeholder="E-mail" name="user[email]" value="{{old('user.email')}}">
                            <div class="invalid-feedback">{{ $errors->first('user.email') }}</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control cpf {{$errors->has('user.cpf') ? 'is-invalid' : ''}}" placeholder="CPF" name="user[cpf]" value="{{old('user.cpf')}}">
                            <div class="invalid-feedback">{{ $errors->first('user.cpf') }}</div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <input type="password" class="form-control {{$errors->has('user.password') ? 'is-invalid' : ''}}" placeholder="Senha" name="user[password]" >
                            <div class="invalid-feedback">{{ $errors->first('user.password') }}</div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="confirmar senha" name="user[password_confirmation]" >
                        </div>
                    </div>
                </div>

                <hr>

                <div class="col-md-3">
                    <div class="form-group">
                        <input type="text"  class="form-control cep
                         {{$errors->has('address.cep') ? 'is-invalid' : ''}} " placeholder="CEP"
                          name="address[cep]" value="{{old('address.cep')}}"
                          id="cep">
                        <div class="invalid-feedback">{{ $errors->first('address.cep') }}</div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <input type="text"  class="form-control uf {{$errors->has('address.uf') ? 'is-invalid' : ''}}" placeholder="UF" name="address[uf]" value="{{old('address.uf')}}">
                        <div class="invalid-feedback">{{ $errors->first('address.uf') }}</div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="form-group">
                        <input type="text"  class="form-control {{$errors->has('address.city') ? 'is-invalid' : ''}}" placeholder="Cidade" name="address[city]" value="{{old('address.city')}}">
                        <div class="invalid-feedback">{{ $errors->first('address.city') }}</div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="form-group">
                        <input type="text"  class="form-control {{$errors->has('address.street') ? 'is-invalid' : ''}}" placeholder="Logradouro" name="address[street]" value="{{old('address.street')}}">
                        <div class="invalid-feedback">{{ $errors->first('address.street') }}</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="text" class="form-control {{$errors->has('address.number') ? 'is-invalid' : ''}}" placeholder="N??mero" name="address[number]" value="{{old('address.number')}}">
                        <div class="invalid-feedback">{{ $errors->first('address.number') }}</div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text"  class="form-control {{$errors->has('address.district') ? 'is-invalid' : ''}}" placeholder="Bairro" name="address[district]" value="{{old('address.district')}}">
                        <div class="invalid-feedback">{{ $errors->first('address.district') }}</div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text"  class="form-control {{$errors->has('address.complement') ? 'is-invalid' : ''}}" placeholder="Complemento" name="address[complement]" value="{{old('address.complement')}}">
                        <div class="invalid-feedback">{{ $errors->first('address.complement') }}</div>
                    </div>
                </div>

                <hr>

                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" name="phones[0][number]" class=" phone form-control {{$errors->has('phones.0.number') ? 'is-invalid' : ''}}" placeholder="Telefone" value="{{old('phones.0.number')}}">
                        <div class="invalid-feedback">{{ $errors->first('phones.0.number') }}</div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" name="phones[1][number]" class="cellphone form-control {{$errors->has('phones.1.number') ? 'is-invalid' : ''}}" placeholder="Celular" value="{{old('phones.1.number')}}">
                        <div class="invalid-feedback">{{ $errors->first('phones.1.number') }}</div>
                    </div>
                </div>

                <button type="submit" class="btn btn-success btn-block mt-3">Criar conta</button>
            </form>
        </div>

        <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('vendor/jquery-mask/jquery.mask.min.js')}}"></script>

        <script>
            $('.cpf').mask('000.000.000-00');
            $('.cep').mask('00000-00');
            $('.uf').mask('SS');
            $('.phone').mask('(00) 0000-0000');
            $('.cellphone').mask('(00) 00000-0000');

            $(document).on('blur', '#cep', function(){
                const cep = $(this).val();
                $.ajax({
                    url: 'https://viacep.com.br/ws/'+cep+'/json',
                    method: 'GET',
                    dataType: 'json',
                    success: function(data){
                        console.log(data);
                    }
                });


            });


        </script>
</body>
</html>
