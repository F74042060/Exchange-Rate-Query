<html>
    <head>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var date = new Array();
                var buy = new Array();
                var sell = new Array();

                <?php
                $servername = "140.116.245.148";
                $username = "f74042060";
                $password = "NckuCsie108";
                $database = "f74042060";

                $connect = new mysqli($servername, $username, $password, $database);

                $query = "SELECT * FROM `ZAR`;";
                $result = $connect->query($query);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                ?>

                date.push('<?php echo $row["Date"] ?>');
                buy.push(<?php echo $row["Buy"] ?>);
                sell.push(<?php echo $row["Sell"] ?>);

                <?php
                    }
                }

                $connect->close();
                ?>

                var data = google.visualization.arrayToDataTable([
                    ['掛牌日期', '賣出', '買入'],
                    [date[60], sell[60], buy[60]],
                    [date[59], sell[59], buy[59]],
                    [date[58], sell[58], buy[58]],
                    [date[57], sell[57], buy[57]],
                    [date[56], sell[56], buy[56]],
                    [date[55], sell[55], buy[55]],
                    [date[54], sell[54], buy[54]],
                    [date[53], sell[53], buy[53]],
                    [date[52], sell[52], buy[52]],
                    [date[51], sell[51], buy[51]],
                    [date[50], sell[50], buy[50]],
                    [date[49], sell[49], buy[49]],
                    [date[48], sell[48], buy[48]],
                    [date[47], sell[47], buy[47]],
                    [date[46], sell[46], buy[46]],
                    [date[45], sell[45], buy[45]],
                    [date[44], sell[44], buy[44]],
                    [date[43], sell[43], buy[43]],
                    [date[42], sell[42], buy[42]],
                    [date[41], sell[41], buy[41]],
                    [date[40], sell[40], buy[40]],
                    [date[39], sell[39], buy[39]],
                    [date[38], sell[38], buy[38]],
                    [date[37], sell[37], buy[37]],
                    [date[36], sell[36], buy[36]],
                    [date[35], sell[35], buy[35]],
                    [date[34], sell[34], buy[34]],
                    [date[33], sell[33], buy[33]],
                    [date[32], sell[32], buy[32]],
                    [date[31], sell[31], buy[31]],
                    [date[30], sell[30], buy[30]],
                    [date[29], sell[29], buy[29]],
                    [date[28], sell[28], buy[28]],
                    [date[27], sell[27], buy[27]],
                    [date[26], sell[26], buy[26]],
                    [date[25], sell[25], buy[25]],
                    [date[24], sell[24], buy[24]],
                    [date[23], sell[23], buy[23]],
                    [date[22], sell[22], buy[22]],
                    [date[21], sell[21], buy[21]],
                    [date[20], sell[20], buy[20]],
                    [date[19], sell[19], buy[19]],
                    [date[18], sell[18], buy[18]],
                    [date[17], sell[17], buy[17]],
                    [date[16], sell[16], buy[16]],
                    [date[15], sell[15], buy[15]],
                    [date[14], sell[14], buy[14]],
                    [date[13], sell[13], buy[13]],
                    [date[12], sell[12], buy[12]],
                    [date[11], sell[11], buy[11]],
                    [date[10], sell[10], buy[10]],
                    [date[9], sell[9], buy[9]],
                    [date[8], sell[8], buy[8]],
                    [date[7], sell[7], buy[7]],
                    [date[6], sell[6], buy[6]],
                    [date[5], sell[5], buy[5]],
                    [date[4], sell[4], buy[4]],
                    [date[3], sell[3], buy[3]],
                    [date[2], sell[2], buy[2]],
                    [date[1], sell[1], buy[1]],
                    [date[0], sell[0], buy[0]]
                ]);

                var options = {
                    title: '走勢圖',
                    legend: { position: 'top' },
                    hAxis: { title: '時間' },
                    vAxis: { title: '匯率' }
                };

                var chart = new google.visualization.LineChart(document.getElementById('line_chart'));

                chart.draw(data, options);
            }
        </script>
    </head>
    <body>
        <div id="line_chart" style="width: 100%; height: 70%"></div>
    </body>
</html>