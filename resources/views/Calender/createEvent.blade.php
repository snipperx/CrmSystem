@extends('layouts.default')

@section('title', 'Company Identity ')
@push('css')
    <link href="/assets/plugins/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet"/>
    <link href="/assets/plugins/dropzone/dist/min/dropzone.min.css" rel="stylesheet"/>
    <link href="/assets/css/app.css" rel="stylesheet"/>


@endpush
@section('content')
    <!-- begin breadcrumb -->
    <ol class=" breadcrumb pull-right">
        <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">Dashboard</a></li>
        <li class="breadcrumb-item active">Company Identity</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Company Identity <small></small></h1>
    <!-- end page-header -->

    <!-- begin row -->
    <div class="row">
        <!-- begin col-6 -->
        <div class="col-md-12">
            <!-- begin panel -->
            <div class="panel panel-inverse" data-sortable-id="form-stuff-1">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default"
                           data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success"
                           data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning"
                           data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger"
                           data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                    <h4 class="panel-title">Company Details </h4>
                </div>

                <form class="form-horizontal" method="POST" action="{{route('cal.store')}}"
                      enctype="multipart/form-data">
                        {{csrf_field()}}
                        <legend>
                            Create Event
                        </legend>
                        <div class="form-group">
                            <label for="title">
                                Title
                            </label>
                            <input class="form-control" name="title" placeholder="Title" type="text">
                        </div>
                        <div class="form-group">
                            <label for="description">
                                Description
                            </label>
                            <input class="form-control" name="description" placeholder="Description" type="text">
                        </div>
                        <div class="form-group">
                            <label for="start_date">
                                Start Date
                            </label>
                            <input class="form-control" name="start_date" placeholder="Start Date" type="text">
                        </div>
                        <div class="form-group">
                            <label for="end_date">
                                End Date
                            </label>
                            <input class="form-control" name="end_date" placeholder="End Date" type="text">
                        </div>
                        <button class="btn btn-primary" type="submit">
                            Submit
                        </button>
                    </form>


                    @endsection

                    @push('scripts')
                        <script src="/assets/plugins/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
                        <script src="/assets/plugins/dropzone/dist/dropzone.js"></script>
                        <script src="/assets/plugins/highlight/highlight.min.js"></script>
                        <script src="/assets/js/demo/render.highlight.js"></script>
                        <script>
                            $(document).ready(function () {

                            });
                        </script>

                        <script>
                            $("div#myId").dropzone({url: "/file/post"});
                        </script>
    @endpush