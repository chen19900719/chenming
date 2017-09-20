@extends('layouts.admin.application')
@section('css')
    <style>
        .gallery {
            max-height: 200px;
        }
    </style>
@endsection
@section('content')
    <div class="admin-content">

        <div class="admin-content-body">
            <div class="am-cf am-padding am-padding-bottom-0">
                <div class="am-fl am-cf">
                    <strong class="am-text-primary am-text-lg">本组学生</strong> /
                    <small>Students In This Team</small>
                </div>
            </div>

            <hr>

            <ul class="am-avg-sm-2 am-avg-md-4 am-avg-lg-6 am-margin gallery-list">
                @foreach($team->students as $student)
                    <li>
                        <a href="{{route('crm.student.edit', $student->id)}}">
                            {!! image_url($student, ['class'=>'am-img-thumbnail am-img-bdrs gallery']) !!}
                            <div class="gallery-title">{{$student->name}}</div>
                            <div class="gallery-desc">{{$student->created_at->format("Y-m-d")}}</div>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

        <footer class="admin-content-footer">
            <hr>
            <p class="am-padding-left">Copyright © 2013-2017 长乐未央公司版权所有. Made With <i class="am-icon am-icon-heart red"></i> By Aaron Ryuu</p>
        </footer>
    </div>
@endsection
