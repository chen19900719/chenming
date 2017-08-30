@if (session('message'))
    <div class="am-form-group">
        <div class="am-u-sm-12">
            <div class="am-alert am-alert-success">
                {{ session('message') }}
            </div>
        </div>
    </div>
@endif

@if (session('alert'))
    <div class="am-form-group">
        <div class="am-u-sm-12">
            <div class="am-alert am-alert-danger">
                {{ session('alert') }}
            </div>
        </div>
    </div>
@endif

@if (count($errors) > 0)
    <div class="am-form-group">
        <div class="am-u-sm-12">
            <div class="am-alert am-alert-danger">
                <h2>表单出错</h2>
                <ol>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ol>
            </div>
        </div>
    </div>
@endif