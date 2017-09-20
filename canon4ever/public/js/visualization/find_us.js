$.get('/api/find_us').done(function (data) {

    // console.log(data);

    var myChart = echarts.init(document.getElementById('find_us'), 'macarons');
    myChart.setOption({
        title: {
            text: '学生来源渠道',
            x: 'center'
        },
        tooltip: {
            trigger: 'item',
            formatter: "{a} <br/>{b} : {c} ({d}%)"
        },
        legend: {
            orient: 'vertical',
            left: 'left',
            data: ['长乐未央官网', '朋友介绍', 'QQ群', '其他']
        },
        series: [
            {
                name: '来源渠道',
                type: 'pie',
                radius: '55%',
                center: ['50%', '50%'],
                data: data,
                itemStyle: {
                    emphasis: {
                        shadowBlur: 10,
                        shadowOffsetX: 0,
                        shadowColor: 'rgba(0, 0, 0, 0.5)'
                    }
                }
            }
        ]
    });
});

