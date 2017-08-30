<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no"/>
    <style type="text/css">
        body, html, #allmap {
            width: 100%;
            height: 100%;
            overflow: hidden;
            margin: 0;
            font-family: "微软雅黑";
        }
    </style>
    <script type="text/javascript"
            src="http://api.map.baidu.com/api?v=2.0&ak=y5p0BQ0IeG5IeWdOcyXGMEizLT86jUVK"></script>
    <script src="/abcd/js/jquery.min.js"></script>
    <title>地图展示</title>
</head>
<body>
<div id="allmap"></div>
</body>
</html>
<script type="text/javascript">

    // 百度地图API功能
    var map = new BMap.Map("allmap");    // 创建Map实例
    map.centerAndZoom(new BMap.Point(114.316, 30.581), 11);  // 初始化地图,设置中心点坐标和地图级别
    map.addControl(new BMap.MapTypeControl());   //添加地图类型控件
    map.setCurrentCity("武汉");          // 设置地图显示的城市 此项是必须设置的
    map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
    $.get('/admin/address', {}, function (data) {
        $.each(data.mapArr, function (k, v) {

            console.log(v);
            var data_info = [[v.x, v.y, v.name]];
            var opts = {
                width: 250,     // 信息窗口宽度
                height: 80,     // 信息窗口高度
                title: "<a href='http://www.kekezu.cn' target='blank'>任务详情</a>", // 信息窗口标题
                enableMessage: true//设置允许信息窗发送短息
            };

            for (var i = 0; i < data_info.length; i++) {
                var marker = new BMap.Marker(new BMap.Point(data_info[i][0], data_info[i][1]));  // 创建标注
                var content = data_info[i][2];
                map.addOverlay(marker);               // 将标注添加到地图中
                addClickHandler(content, marker);
            }
            function addClickHandler(content, marker) {
                marker.addEventListener("click", function (e) {
                            openInfo(content, e)
                        }
                );
            }
            function openInfo(content, e) {
                var p = e.target;
                var point = new BMap.Point(p.getPosition().lng, p.getPosition().lat);
                var infoWindow = new BMap.InfoWindow(content, opts);  // 创建信息窗口对象
                map.openInfoWindow(infoWindow, point); //开启信息窗口
            }
        });
    })
</script>
