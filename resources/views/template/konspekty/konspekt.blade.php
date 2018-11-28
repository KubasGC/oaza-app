@extends('template.konspekty.base')
@inject('data', 'Jenssegers\Date\Date')
<?php $data->setLocale('pl'); ?>
@section('konspektContent')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Podgląd konspektu</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
            <div class="mailbox-read-info">
                <h3>{{ $konspekt->title }}</h3>
                <h5>Dodał: <a href="#">{{ $konspekt->firstname }} {{ $konspekt->lastname }}</a>
                    <span class="mailbox-read-time pull-right">{{ $data->createFromTimeStamp($konspekt->created) }}</span></h5>
            </div>
            <div class="mailbox-read-message">
                {!! $konspekt->content !!}
            </div>
            <!-- /.mailbox-read-message -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <ul class="mailbox-attachments clearfix">
                <li>
                    <span class="mailbox-attachment-icon"><i class="fa fa-file-o"></i></span>

                    <div class="mailbox-attachment-info">
                        <a href="#" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> Sep2014-report.pdf</a>
                        <span class="mailbox-attachment-size">
                          1,245 KB
                          <a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
                        </span>
                    </div>
                </li>

            </ul>
        </div>
        <!-- /.box-footer -->
        <div class="box-footer">
            <button type="button" class="btn btn-default"><i class="fa fa-trash-o"></i> Usuń</button>
            <button type="button" class="btn btn-default"><i class="fa fa-print"></i> Wydrukuj</button>
        </div>
        <!-- /.box-footer -->
    </div>
@endsection