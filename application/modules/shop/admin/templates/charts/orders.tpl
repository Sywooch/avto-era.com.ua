<section class="mini-layout">
	<div class="frame_title clearfix">
		<div class="pull-left">
			<span class="help-inline"></span> <span class="title">{lang('Orders
				statistics','admin')}</span>
		</div>
	</div>
	<div class="inside_padd row">
		<div class="span8">
			<div class="form-horizontal">
				<dl class="clearfix">
					<dt class="pull-left">{lang('All','admin')}
						{$totalMonthOrders} {lang('Total orders price','admin')}:</dt>
					<dd class="pull-left">{$totalMonthSum} {echo
						ShopCore::app()->SCurrencyHelper->getSymbol()}</dd>
				</dl>
				<div class="control-group">
					<label class="control-label">{lang('Date','admin')}:</label>
					<div class="controls">
						<select name="date"> {foreach $dates as $d}
							<option {if $year . '-' . $month== $d}selected {/if} value="{$d}">{$d}</option>
							{/foreach}
						</select>
					</div>
				</div>
			</div>
			<div id="wrapper_gistogram" class="span8">
				<div class="chart">
					<table class="data-table" border="1" cellpadding="10"
						cellspacing="0">
						<caption>{lang('Days','admin')} / {lang('The amount of
							orders','admin')}</caption>
						<thead>
							<tr>
								{foreach $data as $key=>$val}
								<th scope="col">{echo encode($key)}</th> {/foreach}
							</tr>
						</thead>
						<tbody>
							<tr>
								{foreach $data as $key=>$val}
								<td>{$val.sum}</td> {/foreach}
							</tr>
						</tbody>
					</table>
				</div>
				<div class="chart">
					<table class="data-table" border="1" cellpadding="10"
						cellspacing="0">
						<caption>{lang('Days','admin')} / {lang('Number of
							Orders','admin')}</caption>
						<thead>
							<tr>
								{foreach $data as $key=>$val}
								<th>{echo encode($key)}</th> {/foreach}
							</tr>
						</thead>
						<tbody>
							<tr>
								{foreach $data as $key=>$val}
								<td>{$val.count}</td> {/foreach}
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>
{literal}
<style>
.data-table {
	border: none;
	border-top: 1px solid #ccc;
	display: none
}

.data-table thead {
	background: #f0f0f0
}

.data-table th,#data-table td {
	border: none;
	border-bottom: 1px solid #ccc;
	text-align: left;
	margin: 0;
	padding: 10px
}

.toggles {
	background: #ebebeb;
	color: #545454;
	height: 20px;
	padding: 15px
}

.toggles p {
	margin: 0
}

.toggles a {
	background: #222;
	border-radius: 3px;
	color: #fff;
	display: block;
	float: left;
	text-decoration: none;
	margin: 0 10px 0 0;
	padding: 0 6px
}

.toggles a:hover {
	background: #666
}

#reset-graph-button {
	float: right
}

#wrapper_gistogram {
	margin-left: 20px;
}

#figure {
	height: 380px;
	position: relative
}

#figure ul {
	list-style: none;
	margin: 0;
	padding: 0;
	width: 100%;
}

.graph {
	height: 283px;
	position: relative;
	margin-top: 15px;
}

.x-axis {
	bottom: 0;
	color: #555;
	position: absolute;
	text-align: center;
}

.x-axis li {
	float: left;
	width: 3.2%;
	padding: 5px 0
}

.y-axis {
	color: #555;
	position: absolute;
	text-align: right;
	width: 100%
}

.y-axis li {
	border-top: 1px solid #ccc;
	display: block;
	height: 62px;
	width: 100%
}

.y-axis li span {
	display: block;
	width: 40px;
	margin: -10px 0 0 -60px;
	padding: 0 10px
}

.bars {
	height: 253px;
	position: absolute;
	width: 100%;
	z-index: 10
}

.bar-group {
	float: left;
	height: 100%;
	position: relative;
	width: 3.2%;
}

.bar {
	bottom: 0;
	cursor: pointer;
	height: 0;
	position: absolute;
	text-align: center;
	width: 100%;
}

.bar.fig0 {
	left: 0;
	background-color: red;
}

.bar.fig1 {
	left: 26px
}

.bar.fig2 {
	left: 52px
}

.bar span {
	background: #fefefe;
	border-radius: 3px;
	left: -8px;
	display: none;
	position: absolute;
	text-shadow: rgba(255, 255, 255, 0.8) 0 1px 0;
	min-width: 30px;
	padding: 0 5px;
	z-index: 20;
	-webkit-box-shadow: rgba(0, 0, 0, 0.6) 0 1px 4px;
	box-shadow: rgba(0, 0, 0, 0.6) 0 1px 4px;
	margin: 0
}

.bar:hover span {
	display: block;
	margin-top: -25px
}
</style>
<script type="text/javascript">
        function gistogram() {
            $('.data-table').each(function() {
                createGraph($(this), $(this).parent());
            })

            function createGraph(data, container) {
                // Declare some common variables and container elements	
                var bars = [];
                var figureContainer = $('<div id="figure"></div>');
                var graphContainer = $('<div class="graph"></div>');
                var barContainer = $('<div class="bars"></div>');
                var data = data;
                var container = container;
                var chartData;
                var chartYMax;
                var columnGroups;

                // Timer variables
                var barTimer;
                var graphTimer;

                // Create table data object
                var tableData = {
                    // Get numerical data from table cells
                    chartData: function() {
                        var chartData = [];
                        data.find('tbody td').each(function() {
                            chartData.push($(this).text());
                        });
                        return chartData;
                    },
                    // Get heading data from table caption
                    chartHeading: function() {
                        var chartHeading = data.find('caption').text();
                        return chartHeading;
                    },
                    // Get legend data from table body
                    chartLegend: function() {
                        var chartLegend = [];
                        // Find th elements in table body - that will tell us what items go in the main legend
                        data.find('tbody th').each(function() {
                            chartLegend.push($(this).text());
                        });
                        return chartLegend;
                    },
                    // Get highest value for y-axis scale
                    chartYMax: function() {
                        var chartData = this.chartData();
                        // Round off the value
                        var chartYMax = Math.ceil(Math.max.apply(Math, chartData));
                        return chartYMax;
                    },
                    // Get y-axis data from table cells
                    yLegend: function() {
                        var chartYMax = this.chartYMax();
                        var yLegend = [];
                        // Number of divisions on the y-axis
                        var yAxisMarkings = 5;
                        // Add required number of y-axis markings in order from 0 - max
                        //                    for (var i = 0; i < yAxisMarkings; i++) {
                        //                        yLegend.unshift(((chartYMax * i) / (yAxisMarkings - 1)) / 1000);
                        //                    }
                        for (var i = 0; i < yAxisMarkings; i++) {
                            yLegend.unshift(Math.floor((chartYMax * i) / (yAxisMarkings - 1)));
                        }
                        return yLegend;
                    },
                    // Get x-axis data from table header
                    xLegend: function() {
                        var xLegend = [];
                        // Find th elements in table header - that will tell us what items go in the x-axis legend
                        data.find('thead th').each(function() {
                            xLegend.push($(this).text());
                        });
                        return xLegend;
                    },
                    // Sort data into groups based on number of columns
                    columnGroups: function() {
                        var columnGroups = [];
                        // Get number of columns from first row of table body
                        var columns = data.find('tbody tr:eq(0) td').length;
                        for (var i = 0; i < columns; i++) {
                            columnGroups[i] = [];
                            data.find('tbody tr').each(function() {
                                columnGroups[i].push($(this).find('td').eq(i).text());
                            });
                        }
                        return columnGroups;
                    }
                }

                // Useful variables for accessing table data		
                chartData = tableData.chartData();
                chartYMax = tableData.chartYMax();
                columnGroups = tableData.columnGroups();

                // Construct the graph

                // Loop through column groups, adding bars as we go
                $.each(columnGroups, function(i) {
                    // Create bar group container
                    var barGroup = $('<div class="bar-group"></div>');
                    // Add bars inside each column
                    for (var j = 0, k = columnGroups[i].length; j < k; j++) {
                        // Create bar object to store properties (label, height, code etc.) and add it to array
                        // Set the height later in displayGraph() to allow for left-to-right sequential display
                        var barObj = {};
                        barObj.label = this[j];
                        barObj.height = Math.floor(barObj.label / chartYMax * 100) + '%';
                        barObj.bar = $('<div class="bar fig' + j + '"><span>' + barObj.label + '</span></div>')
                                .appendTo(barGroup);
                        bars.push(barObj);
                    }
                    // Add bar groups to graph
                    barGroup.appendTo(barContainer);
                });

                // Add heading to graph
                var chartHeading = tableData.chartHeading();
                var heading = $('<h4>' + chartHeading + '</h4>');
                heading.appendTo(figureContainer);

                // Add legend to graph
                var chartLegend = tableData.chartLegend();
                var legendList = $('<ul class="legend"></ul>');
                $.each(chartLegend, function(i) {
                    var listItem = $('<li><span class="icon fig' + i + '"></div></span>' + this + '</li>')
                            .appendTo(legendList);
                });
                legendList.appendTo(figureContainer);

                // Add x-axis to graph
                var xLegend = tableData.xLegend();
                var xAxisList = $('<ul class="x-axis"></ul>');
                $.each(xLegend, function(i) {
                    var listItem = $('<li><span>' + this + '</span></li>')
                            .appendTo(xAxisList);
                });
                xAxisList.appendTo(graphContainer);

                // Add y-axis to graph	
                var yLegend = tableData.yLegend();
                var yAxisList = $('<ul class="y-axis"></ul>');
                $.each(yLegend, function(i) {
                    var listItem = $('<li><span>' + this + '</span></li>')
                            .appendTo(yAxisList);
                });
                yAxisList.appendTo(graphContainer);

                // Add bars to graph
                barContainer.appendTo(graphContainer);

                // Add graph to graph container		
                graphContainer.appendTo(figureContainer);

                // Add graph container to main container
                figureContainer.appendTo(container);

                // Set individual height of bars
                function displayGraph(bars, i) {
                    // Changed the way we loop because of issues with $.each not resetting properly
                    if (i < bars.length) {
                        // Add transition properties and set height via CSS
                        $(bars[i].bar).css({
                            'height': bars[i].height,
                            '-webkit-transition': 'all 0.8s ease-out',
                            'background-color': (function() {
                                var r = Math.floor(Math.random() * (256));
                                var g = Math.floor(Math.random() * (256));
                                var b = Math.floor(Math.random() * (256));
                                return ('#' + r.toString(16) + g.toString(16) + b.toString(16));
                            })()
                        });
                        // Wait the specified time then run the displayGraph() function again for the next bar
                        barTimer = setTimeout(function() {
                            i++;
                            displayGraph(bars, i);
                        }, 50);
                    }
                }

                // Reset graph settings and prepare for display
                function resetGraph() {
                    // Set bar height to 0 and clear all transitions
                    $.each(bars, function(i) {
                        $(bars[i].bar).stop().css({
                            'height': 0,
                            '-webkit-transition': 'none'
                        });
                    });

                    // Clear timers
                    clearTimeout(barTimer);
                    clearTimeout(graphTimer);

                    // Restart timer		
                    graphTimer = setTimeout(function() {
                        displayGraph(bars, 0);
                    }, 200);
                }

                // Helper functions

                // Call resetGraph() when button is clicked to start graph over
                $('#reset-graph-button').click(function() {
                    resetGraph();
                    return false;
                });

                // Finally, display graph via reset function
                resetGraph();
            }
        }
        $('#figure+#figure').remove();    
    </script>
{/literal}
