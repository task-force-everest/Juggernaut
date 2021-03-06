@extends('frontend.templates.master')

@section('title','Home')

@section('content')
    <!-- wrapper -->
    <div id="wrapper">
        <section class="hero hero-games height-600" style="background-image: url({{$team->header_image or $team->randomHeader()}});">
            <div class="hero-bg"></div>
            <div class="container">
                <div class="page-header">
                    <div class="page-title bold"><a href="#">{{$team->name}}</a></div>
                    <p>{{$team->motto}}</p>
                    <p><img src="{{$team->team_image}}" class="center-block"></p>
                    <br>
                </div>
            </div>
        </section>

        @include('frontend.team.include.nav')
        <section class="bg-grey-50 border-bottom-1 border-grey-300 padding-10">
            <div class="container">
                <ol class="breadcrumb">
                    <li><a href="/">Home</a></li>
                    <li><a href="{{route('frontend.team',$team->id)}}">{{$team->name}}</a></li>
                    <li><a href="{{route('frontend.team.leader',$team->id)}}">Leader Panel</a></li>
                    <li><a href="{{route('frontend.team.leader.training',$team->id)}}">Training Management</a></li>
                    <li><a href="#">{{$member->searchable_name}}</a></li>
                    <li><a href="{{route('frontend.team.leader.training.report',[$team->id,$member->id])}}">Training Report</a></li>
                    <li class="active">Class Completion Form</li>
                </ol>
            </div>
        </section>

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="post post-fl">
                            <div class="post-header">
                                <div class="post-title">
                                    <h2>Mark Goal as Complete</h2>
                                </div>
                            </div>
                            {{ Form::open(['route' => ['frontend.team.leader.training.report.mark.post',$team->id,$member->id,$goal->id], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) }}
                            <br>
                            <blockquote>
                                <h3>{{$goal->goal}}</h3>
                            </blockquote>

                            <div class="form-group">
                                {{ Form::label('note', 'Goal Completion Note:', ['class' => 'control-label']) }}

                                {{ Form::textarea('note', null, ['class' => 'form-control']) }}
                            </div><!--form control-->
                            <p>Once you submit, this goal will be marked as complete.</p>
                            <div class="form-group pull-right">
                                    <input type="submit" class="btn btn-primary">
                                </div>
                            {{ Form::close() }}

                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
    <!-- /#wrapper -->

@endsection

@section('after-scripts-end')
    <script type="text/javascript" src="/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
    <!-- Select2 -->
    <script src="/plugins/select2/select2.full.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            CKEDITOR.replace( 'content', {
                height: 400
            });
        });
    </script>
@endsection