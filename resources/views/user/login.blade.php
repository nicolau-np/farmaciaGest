@extends('layout.app')
@section('content')
    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                <a class="text-center" href="index.html"> <h4>ABD FARMÁCIA</h4></a>

                                @if (session('error'))
                                <div class="alert bg-danger" style="color:white" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em> {{__(session('error'))}} <a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>
                                @endif

                                @if (session('success'))
                                <div class="alert bg-success" style="color:white" role="alert"><em class="fa fa-lg fa-check">&nbsp;</em> {{session('success')}} <a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>
                                @endif

                                @if (session('info'))
                                <div class="alert bg-info" style="color:white" role="alert"><em class="fa fa-lg fa-check">&nbsp;</em> {{session('info')}} <a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>
                                @endif

                                {{Form::open(['class'=>"mt-5 mb-5 login-input", 'method'=>"post", 'url'=>"/user/logar"])}}

                                    <div class="form-group">
                                        {{Form::label('email', "E-mail")}} <span class="text-danger">*</span>
                                        <input type="email" class="form-control" placeholder="Email" name="email" />
                                        @if($errors->has('email'))
                                        <span class="text-danger">{{$errors->first('email')}}</span>
                                         @endif
                                    </div>
                                    <div class="form-group">
                                        {{Form::label('password', "Palavra-Passe")}} <span class="text-danger">*</span>
                                        <input type="password" class="form-control" placeholder="Palavra-Passe" name="password" />
                                         @if($errors->has('password'))
                                        <span class="text-danger">{{$errors->first('password')}}</span>
                                         @endif
                                    </div>
                                    <button class="btn login-form__btn submit w-100">Entrar</button>
                                {{Form::close()}}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
