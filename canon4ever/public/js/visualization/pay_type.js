$.get('/api/pay_type').done(function (data) {

    // console.log(data);

    var myChart = echarts.init(document.getElementById('pay_type'), 'macarons');
    myChart.setOption({
        title: {
            text: '支付方式',
            x: 'center'
        },
        tooltip: {
            trigger: 'item',
            formatter: "{a} <br/>{b}: {c} ({d}%)"
        },
        legend: {
            orient: 'vertical',
            x: 'left',
            data: ['现金/支付宝', '刷卡', '百度钱包', '阳光钱包']
        },
        series: [
            {
                name: '支付方式',
                type: 'pie',
                radius: ['50%', '70%'],
                avoidLabelOverlap: false,
                label: {
                    normal: {
                        show: false,
                        position: 'center'
                    },
                    emphasis: {
                        show: true,
                        textStyle: {
                            fontSize: '30',
                            fontWeight: 'bold'
                        }
                    }
                },
                labelLine: {
                    normal: {
                        show: false
                    }
                },
                data: data
            }
        ]
    });
});