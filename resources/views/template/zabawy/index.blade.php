@extends('template.zabawy.base')
@inject('data', 'Jenssegers\Date\Date')
<?php $data->setLocale('pl'); ?>
@section('zabawyContent')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Zabawy</h3>
            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
            <div class="mailbox-controls">
                <!-- Check all button -->
                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
                </button>
                <div class="pull-right">
                    1-50/200
                    <div class="btn-group">
                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                    </div>
                    <!-- /.btn-group -->
                </div>
                <!-- /.pull-right -->
            </div>
            <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                    <tbody>
                    <tr>
                        <th>Tytuł</th>
                        <th style="width: 150px;">Dodał</th>
                        <th style="width: 150px;">Kiedy</th>
                    </tr>
                    @if(Route::input('id'))
                        @forelse($zabawy as $konspekt)
                            <tr>
                                <td class="mailbox-subject">{!! Html::linkRoute('zabawy.konspekt.get', $konspekt->title, ['id' => $konspekt->id], []) !!}</td>
                                <td class="mailbox-name"><a href="#">{{ $konspekt->firstname }} {{ $konspekt->lastname }}</a></td>
                                <td class="mailbox-date">{{ $data->createFromTimeStamp($konspekt->created)->diffForHumans() }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center"><em>Nie znaleziono żadnych zabaw w tej kategorii.</em></td>
                            </tr>
                        @endforelse
                    @else
                        <tr>
                            <td colspan="3" class="text-center"><em>Nie wybrano żadnej kategorii.</em></td>
                        </tr>
                    @endif
                    </tbody>
                </table>
                <!-- /.table -->
            </div>
            <!-- /.mail-box-messages -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer no-padding">
            <div class="mailbox-controls">
                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                <div class="pull-right">
                    1-50/200
                    <div class="btn-group">
                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                    </div>
                    <!-- /.btn-group -->
                </div>
            </div>
        </div>
    </div>
@endsection