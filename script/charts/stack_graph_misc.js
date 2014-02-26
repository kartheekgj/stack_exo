
function fnDisplayChart(categories,data){
	var bountyAmnt = new Array();
	var score = new Array();
	var answerCnt = new Array();
	jq.each(categories,function(i,value){
		bountyAmnt.push(data[categories[i]].bounty_amnt);
		answerCnt.push(data[categories[i]].answer_count);
		score.push(data[categories[i]].score);
	});
	
	//for testing the values
	/*	
	console.log(bountyAmnt);
	console.log(score);
	console.log(answerCnt);
	*/
	
	
	 jq('#container').highcharts({
	    chart: {
		type: 'column'
	    },
	    title: {
		text: 'Total Number of stats that are on stackoverflow website based on tags and ordered by votes'
	    },
	    subtitle: {
		text: 'Alpha Stage stats are based on first 100 results' 
	    },
	    xAxis: {
		categories: categories
	    },
	    yAxis: {
		min: 0,
		title: {
		    text: 'Count of Data'
		}
	    },
	    tooltip: {
		headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
		pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
		    '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
		footerFormat: '</table>',
		shared: true,
		useHTML: true
	    },
	    plotOptions: {
		column: {
		    pointPadding: 0.2,
		    borderWidth: 0
		}
	    },
	    series: [{
		name: 'Bounty amount',
		data: bountyAmnt

	    }, {
		name: 'Answer Count',
		data: answerCnt

	    }, {
		name: 'score',
		data: score

	    }]
	});
}
