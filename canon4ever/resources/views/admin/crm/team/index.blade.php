@extends('layouts.admin.application')
@section('css')
    <link rel="stylesheet" href="/vendor/nestable/jquery.nestable.css">
@endsection
@section('content')
    <div class="admin-content" id="app">

        <div class="am-cf am-padding">
            <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">分组管理</strong> /
                <small>Team Manage</small>
            </div>
        </div>

        @include('layouts.admin.partials._flash')

        <div class="am-g">
            <div class="am-u-sm-12 am-u-md-6">
                <div class="am-btn-toolbar">
                    <div class="am-btn-group am-btn-group-xs">
                        <button type="button" class="am-btn am-btn-default" v-on:click="createParentTeam">
                            <span class="am-icon-plus"></span> 新增年份
                        </button>
                        <button type="button" class="am-btn am-btn-secondary" v-on:click="compress">
                            <span class="am-icon-compress"></span> 折叠
                        </button>
                        <button type="button" class="am-btn am-btn-success" v-on:click="expand">
                            <span class="am-icon-expand"></span> 展开
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <hr>

        <div class="am-g">
            <div class="am-u-lg-6">
                <div class="dd" id="nestable">
                    <ol class="dd-list">
                        <li class="dd-item dd3-item" v-for="team in teams" :data-id="team.id">
                            <div class="dd-handle dd3-handle">Drag</div>
                            <div class="dd3-content">
                                @{{team.name}}
                                <div class="pull-right action-buttons">
                                    <a href="javascript:;" v-on:click="createTeam(team.id)"><i class="am-icon-plus"></i></a>
                                    <a href="javascript:;" v-on:click="editTeam(team.id)"><i class="am-icon-pencil"></i></a>
                                    <a href="javascript:;" v-on:click="destroyTeam(team.id)"><i class="am-icon-trash"></i></a>
                                </div>
                            </div>

                            <ol class="dd-list dd-hide" data-start-collapsed="true" v-if="team.children != ''">
                                <li class="dd-item dd3-item" :data-id="t.id" v-for="t in team.children">
                                    <div class="dd-handle dd3-handle">Drag</div>
                                    <div class="dd3-content">
                                        @{{t.name}}
                                        <div class="pull-right action-buttons">
                                            <a :href="'/crm/team/' + t.id">
                                                <i class="am-icon-eye"></i>
                                            </a>

                                            <a href="javascript:;" v-on:click="editTeam(t.id)"><i class="am-icon-pencil"></i></a>
                                            <a href="javascript:;" v-on:click="destroyTeam(t.id)"><i class="am-icon-trash"></i></a>
                                        </div>
                                    </div>
                                </li>
                            </ol>
                        </li>
                    </ol>
                </div>
            </div>

            <div class="am-u-lg-6">
                <div class="am-panel am-panel-default">
                    <div class="am-panel-bd ">
                        <form class="am-form" v-on:submit.prevent="onSubmit" data-am-validator>
                            {{ csrf_field() }}
                            <div id="_method"></div>

                            <div class="am-g am-margin-top">
                                <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                    上级分类
                                </div>
                                <div class="am-u-sm-8 am-u-md-10">
                                    <select v-model="team.parent_id">
                                        <option value="0">顶级分类</option>

                                        <template v-for="team in teams">
                                            <option :value="team.id">@{{team.name}}</option>
                                        </template>
                                    </select>
                                </div>
                            </div>

                            <div class="am-g am-margin-top">
                                <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                    分类名称
                                </div>
                                <div class="am-u-sm-8 am-u-md-10">
                                    <input type="text" class="am-input-sm" v-model="team.name" id="name" placeholder="请输入分类名称" required>
                                </div>
                            </div>

                            <div class="am-margin">
                                <button type="submit" class="am-btn am-btn-primary am-radius">保 存</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="/vendor/nestable/jquery.nestable.js"></script>
    <script src="/vendor/vue/vue.js"></script>
    <script src="/vendor/vue/vue-resource.min.js"></script>
    <script>
        //排序
        $(function () {
            $('.dd').nestable({
                maxDepth: 2,
            }).on('change', function () {
                var sort_order = window.JSON.stringify($('#nestable').nestable('serialize'));

                $.ajax({
                    type: 'PATCH',
                    url: '/crm/team/sort_order',
                    data: {
                        sort_order: sort_order
                    },

                    success: function (data) {
                        if (data.status == 0) {
                            alert(data.msg);
                            return false;
                        }
                    }
                });
            });
        });

        Vue.use(VueResource);
        Vue.http.interceptors.push((request, next) => {
            request.headers.set('X-CSRF-TOKEN', Laravel.csrfToken);
            next();
        });

        var app = new Vue({
            el: '#app',
            data: {
                teams: {!! $teams !!},
                team: {
                    parent_id: 0,
                    name: ''
                },
                form_type: 'post',
            },
            methods: {
                //展开
                compress: function () {
                    $('.dd').nestable('collapseAll');
                },
                //折叠
                expand: function () {
                    $('.dd').nestable('expandAll');
                },
                //重置当前编辑或修改的team
                resetTeam: function () {
                    this.team = {
                        parent_id: 0,
                        name: ''
                    }

                    this.form_type = 'post';
                },
                //新增顶级team
                createParentTeam: function () {
                    this.resetTeam();
                },
                //添加team
                createTeam: function (parent_id) {
                    //设置上级菜单，并重置数据
                    this.resetTeam();
                    this.team.parent_id = parent_id;
                },
                //编辑team
                editTeam: function (id) {
                    this.form_type = 'put';

                    //ajax获取当前的team
                    this.$http.get('/crm/team/' + id + '/edit').then((response) => {
                        this.team = response.body
                    });
                },
                onSubmit: function () {
                    if (this.team.name == undefined) {
                        return false;
                    }

                    //判断是新增还是修改
                    if (this.form_type == 'post') {
                        this.storeTeam();
                    } else {
                        this.updateTeam();
                    }
                },
                //保存team
                storeTeam: function () {
                    this.$http.post('/crm/team', this.team).then((response) => {
                        var data = response.body;
                        if (data.status == 0) {
                            alert(data.msg);
                            return false;
                        }
                        this.teams = data.teams;

                        var parent_id = this.team.parent_id;
                        this.resetTeam();
                        this.team.parent_id = parent_id;

                    });
                },
                //更新team
                updateTeam: function () {
                    this.$http.put('/crm/team/' + this.team.id, this.team).then((response) => {
                        var data = response.body;
                        if (data.status == 0) {
                            alert(data.msg);
                            return false;
                        }
                        this.teams = data.teams;
                        this.resetTeam();
                    });
                },
                //删除team
                destroyTeam: function (id) {
                    this.$http.delete('/crm/team/' + id).then((response) => {
                        var data = response.body;
                        if (data.status == 0) {
                            alert(data.msg);
                            return false;
                        }
                        this.teams = data.teams;
                    });
                }
            }
        })
    </script>
@endsection