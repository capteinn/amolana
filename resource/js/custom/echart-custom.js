	var d = new Date();
	var month = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Ockober","November","Desember"];
    var batas = d.getMonth();
	var bulan = [];
	for(x=batas-2; x <= batas; x++){
		bulan.push(month[x]);
	}
    var myChart9 = echarts.init(document.getElementById('mainb'), theme);
	var series_data = [];
	
	for(x=0;x < data_nama_bimbel.length; x++){
		series_data.push({
		name: data_nama_bimbel[x],
		type: 'bar',
		data: data_total_murid[x],
		markPoint: {
				data: [{
				type: 'max',
				name: 'Murid'
				}, {
				type: 'min',
				name: 'Murid'
				}]
			}
		});
	}
	
    myChart9.setOption({
      title: {
        text: 'Kelas Bimbel',
      },
      tooltip: {
        trigger: 'axis'
      },
      legend: {
        data: data_nama_bimbel
      },
      toolbox: {
        show: false
      },
      calculable: false,
      xAxis: [{
        type: 'category',
        data: bulan
      }],
      yAxis: [{
        type: 'value'
      }],
		series : series_data	     
    });//setOption