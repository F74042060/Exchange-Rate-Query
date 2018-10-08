<html>
    <head>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load('current', {
                'packages':['geochart'],
                'mapsApiKey': 'AIzaSyD-9tSrke72PouQMnMX-a7eZSW0jkFMBWY'
            });
            google.charts.setOnLoadCallback(drawRegionsMap);

            function drawRegionsMap() {
                var recommend = new Array();

                <?php
                $servername = "140.116.245.148";
                $username = "f74042060";
                $password = "NckuCsie108";
                $database = "f74042060";

                $connect = new mysqli($servername, $username, $password, $database);

                $query = "SELECT * FROM `range_recommend`;";
                $result = $connect->query($query);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                ?>

                var rank = <?php echo $row["Recommend"] ?>;
                recommend.push((rank-5)*(-1));

                <?php
                    }
                }

                $connect->close();
                ?>

                var data = google.visualization.arrayToDataTable([
                    ['代碼', '國家', '推薦指數'],
                    ['US', '美國', recommend[0]],
                    ['HK', '香港', recommend[1]],
                    ['GB', '英國', recommend[2]],
                    ['AU', '澳大利亞', recommend[3]],
                    ['CA', '加拿大', recommend[4]],
                    ['SG', '新加坡', recommend[5]],
                    ['CH', '瑞士', recommend[6]],
                    ['JP', '日本', recommend[7]],
                    ['ZA', '南非', recommend[8]],
                    ['SE', '瑞典', recommend[9]],
                    ['NZ', '紐西蘭', recommend[10]],
                    ['TH', '泰國', recommend[11]],
                    ['PH', '菲律賓', recommend[12]],
                    ['ID', '印尼', recommend[13]],
                    ['DE', '德國', recommend[14]],
                    ['FR', '法國', recommend[14]],
                    ['IT', '義大利', recommend[14]],
                    ['ES', '西班牙', recommend[14]],
                    ['GR', '希臘', recommend[14]],
                    ['KR', '韓國', recommend[15]],
                    ['VN', '越南', recommend[16]],
                    ['MY', '馬來西亞', recommend[17]],
                    ['CN', '中國', recommend[18]]
                ]);

                var options = {
                    colors: ['#0066FF','#FF5511']
                };

                var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));

                function selectHandler() {
                    var selectedItem = chart.getSelection()[0];
                    if (selectedItem) {
                        var topping = data.getValue(selectedItem.row, 0);
                        window.open("../website/sub_" + topping + ".php");
                    }
                }

                google.visualization.events.addListener(chart, 'select', selectHandler);    

                chart.draw(data, options);
            }
        </script>
    </head>
    <body>
        <div id="regions_div" style="width: 100%; height: 100%;"></div>
    </body>
</html>