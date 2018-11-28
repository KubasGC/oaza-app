@extends('template.zabawy.base')

@section('zabawyContent')
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
    <div class="box box-primary">
        {!! Form::open(['method' => 'post']) !!}
        <div class="box-header with-border">
            <h3 class="box-title">Nowa zabawa</h3>
        </div>
        <div class="box-body">
            <div class="form-group">
                {!! Form::text('title', '', ['class' => 'form-control input-lg', 'placeholder' => 'Tytuł']) !!}
            </div>
            <div class="form-group">
                <label>Kategoria</label>
               {!! Form::select('cat', $cats->lists('catname', 'id'), null, ['class' => 'form-control', 'placeholder' => 'Wybierz kategorię...']) !!}
            </div>
            <div class="form-group">
                <label>Treść</label><br />
                {!! Form::textarea('content', '', ['id' => 'editorck']) !!}
            </div>
        </div>
        <div class="box-footer">
            <div class="pull-right">
                <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Dodaj zabawę</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection

@section('scripts')
    <script src="//cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
    <script>
        $(function () {
            CKEDITOR.replace('editorck');
        });
    </script>
@endsection