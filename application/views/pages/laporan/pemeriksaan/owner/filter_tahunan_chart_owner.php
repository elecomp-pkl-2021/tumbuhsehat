<script>
function rupiah2(angka) {
			var rupiah = '';
			var angkarev = angka.toString().split('').reverse().join('');
			for (var i = 0; i < angkarev.length; i++)
				if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
			return 'Rp. ' + rupiah.split('', rupiah.length - 1).reverse().join('');
		}
        </script>
		<?php
	$total = 0;
    foreach($harian2->result() as $value) {
        $total += $value->money;
    }
	$rata_rata = $total/count($harian2->result());
	$average ="Rp " .number_format((int)$rata_rata, 0, ",", ".");
	?>
</script>
<script type="text/javascript">
		var change = {
			0: '0',
			1000000: 'Rp. 1.000.000',
			2500000: 'Rp. 2.500.000',
			5000000: 'Rp. 5.000.000',
			7500000: 'Rp. 7.500.000',
			10000000: 'Rp. 10.500.000'
		};
		Highcharts.chart('container2', {
			chart: {
				height: 500,
				borderRadius: 10,
				backgroundColor: '#E9ECEF',
				type: 'column'
			},
			title: {
				text: 'Pendapatan',
				align: 'left',
				style: {
					fontWeight: 'bold',
					fontSize: "15px"
				},
			},
			xAxis: {
				categories: [
					<?php foreach ($harian2->result() as $result89) : ?> "<?php echo "Tahun " . $result89->tahun ?>",
					<?php endforeach; ?>
				],
				labels: {
					style: {
						color: 'black',
						fontWeight: 'bold'
					}
				},
				title: {
					enabled: true,
					text: '------ Rata2 pendapatan ------',
					style: {
						fontWeight: 'normal'
					}
				}
			},
			yAxis: {
				labels: {
					formatter: function() {
						var value = change[this.value];
						return value !== 'undefined' ? value : this.value;
					}
				},
				plotLines: [{
                    color: 'black',
                    value: <?php echo (int)$rata_rata?>,
                    width: '1',
                    zIndex: 2,
	                dashStyle: 'Dash', 
                label: {
                text: '<?php echo $average?>',
                textAlign: 'left',
				fontSize: '6px',
                 x: -82
                 }
                }]
			},
			tooltip: {
				headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
				pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
					'<td style="padding:0"><b> Rp. {point.y:.1f},-</b></td></tr>',
				footerFormat: '</table>',
				shared: true,
				useHTML: true
			},
			plotOptions: {
				column: {
					pointPadding: 0.2,
					borderWidth: 0,
					borderRadius: 10,
					pointWidth: 20
				}
			},
			series: [{
					type: 'column',
					name: '',
					showInLegend: false,
					states: {
						hover: {
							color: '#f40049'
						}
					},
					data: [
						<?php
                    foreach($harian2->result() as $key=>$value) :{  
                    $last = count($harian2->result()) - 1;
                    echo '{y :';
                    echo $value->money;
                    if($key == $last){
                    echo ",color : '#f40049'},";
                    }else
	                echo ",color : '#6A5C59'},";
                    }
                    ?>
                    <?php endforeach ?>
					]

				},
				{
					marker: {
						enabled: false,
					},
					type: 'line',
					name: '',
					lineColor: 'blue',
					showInLegend: false,
					states: {
						hover: {
							color: '#f40049'
						}
					},
					data: [
						<?php foreach ($harian2->result() as $result89) : ?> {
								color: 'blue',
								y: <?php echo $result89->money ?>
							},
						<?php endforeach; ?>
					]

				}
			]
		});
	</script>