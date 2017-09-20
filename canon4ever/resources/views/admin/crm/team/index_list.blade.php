@extends('layouts.admin.application')
@section('css')
    <style>
        .node-list .node {
            margin-bottom: 10px;
            margin-top: 0px;
        }

        .node-list .node .media-left {
            width: 130px;
        }

        .media-left, .media > .pull-left {
            padding-right: 10px;
        }

        .node-list .node label {
            font-weight: normal;
            color: #aaa;
            text-align: right;
        }

        .media-body, .media-left, .media-right {
            display: table-cell;
            vertical-align: top;
        }

        .node-list .node .name {
            margin-bottom: 10px;
            width: 124px;
            display: block;
            float: left;
            text-align: left;
        }

        .node-list .node .name a:link, .node-list .node .name a:visited {
            /*color: #333;*/
        }
    </style>
@endsection

@section('content')
    <div class="admin-content">

        <div class="am-cf am-padding">
            <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">分组列表</strong> /
                <small>Team List</small>
            </div>
        </div>

        @include('layouts.admin.partials._flash')

        <div class="am-g">
            <div class="am-u-sm-12">

                <div id="sections" class="am-panel am-panel-primary">
                    <div class="am-panel-hd">分组列表</div>
                    <div class="am-panel-bd">
                        <div class="am-g node-list">

                            @foreach($teams as $team)
                                <div class="node media">
                                    <label class="media-left">{{$team->name}}</label>
                                    <span class="nodes media-body">
                                         @if(!$team->children->isEmpty())
                                            @foreach($team->children as $t)
                                                <span class="name"><a title="{{$t->name}}" href="/crm/team/{{$t->id}}">{{$t->name}}</a></span>
                                            @endforeach
                                        @endif
                                    </span>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
