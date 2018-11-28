@extends('template.main.base')
@section('pageName', 'Zabawy')
@inject('data', 'Jenssegers\Date\Date')
<?php $data->setLocale('pl'); ?>

@section('pageContent')
    <div class="callout callout-info">
        <h4>Informacja</h4>
        <p>Tutaj możesz przeglądać dodane już zabawy, a także dodawać nowe. Wszystkie zabawy podzielone są na kategorie, aby można było się łatwiej
            we wszystkim połapać. Rozwijaj ten spis wspólnie z nami, aby mógł on być w przyszłości pomocny! :)</p>
    </div>
    <div class="row">
        <div class="col-md-3">
            {!! Html::linkRoute('zabawy.dodaj.get', 'Nowa zabawa', [], ['class' => 'btn btn-primary btn-block margin-bottom']) !!}
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Kategorie</h3>
                </div>
                <div class="box-body no-padding" style="display: block;">
                    <ul class="nav nav-pills nav-stacked">
                        @forelse($cats->get() as $cat)
                            <li @if(Route::input('id') && Route::input('id') == $cat->id) class="active" @endif>{!! Html::linkRoute('zabawy.kategoria.get', '<i class="fa fa-minus"></i> '.$cat->catname, ['id' =>
                            $cat->id],
                             []) !!}</li>
                        @empty
                            <li><a href="#"><div class="text-center"><em>Nie znaleziono żadnych kategorii.</em></div></a></li>
                        @endforelse
                    </ul>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
        <div class="col-md-9">
            @yield('zabawyContent')
        </div>
@endsection