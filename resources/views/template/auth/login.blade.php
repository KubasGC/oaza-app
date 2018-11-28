@extends('template.main.base')
@section('pageName', "Logowanie")

@section('pageContent')
    @if (count($errors))
        <div class="alert alert-danger">
            <h4>Wystąpiły błędy</h4>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {!! Form::open(['method' => 'post']) !!}
    <div class="login-box-body">
        <div class="form-group has-feedback">
            {!! Form::text('user', '', ['class' => 'form-control', 'placeholder' => 'Nazwa użytkownika']) !!}
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            {!! Form::password('pass', ['class' => 'form-control', 'placeholder' => 'Hasło']) !!}
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
            <div class="col-xs-8">

            </div>
            <!-- /.col -->
            <div class="col-xs-4">
                {!! Form::submit('Zaloguj się', ['class' => 'btn btn-primary btn-block btn-flat']) !!}
            </div>
            <!-- /.col -->
        </div>
        </form>

        <a href="#">Zapomniałeś hasła?</a><br>
        Nie masz jeszcze konta? <a href="register.html" class="text-center">Załóż je</a>!

    </div>
    {!! Form::close() !!}
@endsection