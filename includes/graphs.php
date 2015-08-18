        
 <?php //$g1=mysql_query("select count(id) as book from book_base");
// $gr1=mysql_fetch_array($g1);
// $countgr1=$gr1['book'];

// $g2=mysql_query("select count(id) as issued_book from book_base where availability='issued'");
// $gr2=mysql_fetch_array($g2);
// $countgr2=$gr2['issued_book'];


// $g3=mysql_query("select count(id) as mem from members");
// $gr3=mysql_fetch_array($g3);
// $countgr3=$gr3['mem'];


// $g4=mysql_query("select count(user_id) as op from g_users where user_type='operator'");
// $gr4=mysql_fetch_array($g4);
// $countgr4=$gr4['op'];

?>
         <script type="text/javascript">
$(function () {
    
        var colors = Highcharts.getOptions().colors,
            categories = ['All Departments', 'Dept of Botany', 'Dept. of Applied Geology','Dept. of Economics'],
            name = '<?php echo $cname;?>',
            data = [
                {
                    y: <?php echo "70";?>,
                    color: colors[0],
                }, {
                    y: <?php echo "20";?>,
                    color: colors[1],
                     
                }, {
                    y: <?php echo "40";?>,
                    color: colors[2],
                     
                },

               {
                    y: <?php echo "60";?>,
                    color: colors[3]
                     
                } 





                 ];
    
        function setChart(name, categories, data, color) {
            chart.xAxis[0].setCategories(categories, false);
            chart.series[0].remove(false);
            chart.addSeries({
                name: name,
                data: data,
                color: color || 'white'
            }, false);
            chart.redraw();
        }
    
        var chart = $('#graphs').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: '<?php echo "University Bar Graph";?>'
            },
            subtitle: {
                text: 'DU Overview Stats'
            },
            xAxis: {
                categories: categories
            },
            yAxis: {
                title: {
                    text: '<?php echo $short;?> Stats Legend Chart'
                }
            },
            plotOptions: {
                column: {
                    cursor: 'pointer',
                    point: {
                        events: {
                            click: function() {
                                var drilldown = this.drilldown;
                                if (drilldown) { // drill down
                                    setChart(drilldown.name, drilldown.categories, drilldown.data, drilldown.color);
                                } else { // restore
                                    setChart(name, categories, data);
                                }
                            }
                        }
                    },
                    dataLabels: {
                        enabled: true,
                        color: colors[0],
                        style: {
                            fontWeight: 'bold'
                        },
                        formatter: function() {
                            return this.y;
                        }
                    }
                }
            },
            tooltip: {
                formatter: function() {
                    var point = this.point,
                     
                        s = this.x +':<b>'+ this.y +'number(s)</b><br/>';
                    
                    
                   return s;
                }
            },
            series: [{
                name: name,
                data: data,
                color: 'white'
            }],
            exporting: {
                enabled: false
            }
        })
        .highcharts(); // return chart
    });
    

        </script>

    <script src="<?php echo $base;?>js/highcharts.js"></script>
<script src="<?php echo $base;?>js/modules/data.js"></script>
<script src="<?php echo $base;?>js/modules/drilldown.js"></script>
        
        <div id="graphs" class="col-sm-6 col-md-6" style="min-width: 310px; height: 400px; margin: 0 auto">
           


      </div>

      