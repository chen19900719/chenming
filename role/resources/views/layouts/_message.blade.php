@if (session('message'))
    <div class="am-g">
        <div class="am-u-md-12">
            <div class="am-alert am-alert-success">
                {{ session('message') }}
            </div>
        </div>
    </div>
@endif