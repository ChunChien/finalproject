<?php
session_start();

if(isset($_SESSION['admin_login'])){
	if($_SESSION['admin_login']=="Yes"){
	}else{
		echo "<script type='text/javascript'>";
        echo "alert('您尚未登入');";
        echo "</script>";
        echo "<meta http-equiv='Refresh' content='0; url=hospitallogin.php'>";
		exit();
	}
}else{
	echo "<script type='text/javascript'>";
        echo "alert('您尚未登入');";
        echo "</script>";
        echo "<meta http-equiv='Refresh' content='0; url=hospitallogin.php'>";
	exit();
}

require("DBconnect.php");
$cookieID=$_COOKIE["county"];
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="主選單" content="width=device-width, initial-scale=1.0">
        <title>圖表分析</title>
        <link rel="stylesheet" href="./css/style.css">
    </head>
    <body>
        <div class="wrap">
            <div class="sidebar">

            <ul class="menu">
                <li1><a href="signup.php">新增醫療院所</a></li1>
                <li><a href="accountlist.php">管理醫療院所名單</a></li>
                <li><a href="admintopub.php"><?php echo $cookieID?>民眾填答狀況</a></li>
                <li><a href="adminchart.php">圖表分析</a></li>
                <li><a href="adminreset.php">帳戶設定</a></li>
                <li><a href="adminlogout.php">登出</a></li>
            </ul>
            </div>

            <div class="content">
            <div class="container">
                <center>
    <form action="" method="POST">
        <select name="chart">
            <option value="1">合作醫療院所回傳人數資料量
            <option value="2">所有資料之性別比
            <option value="3">年齡別、性別之糖尿病人數
            <option value="4">主食量與空腹血糖值關係
            <option value="5">飲料習慣與空腹血糖值關係
            <option value="6">飲料甜度與空腹血糖值關係
            <option value="7">零食習慣與空腹血糖值關係
            <option value="8">甜點習慣與空腹血糖值關係
            <option value="9">運動習慣與空腹血糖值關係
        </select>
        <input type="submit">
    </form>
    <?php
        $SQL="SELECT*FROM public WHERE county='$cookieID'";

        if (isset($_POST["chart"])){
            $type=$_POST["chart"];
        }else{
            echo "<br/>";
            echo "請選擇圖表類別";
            exit();
        }

        if ($type==1){
    ?>
    <html>
            <head>
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
            google.charts.load('current', {'packages':['bar']});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                ['醫療院所', '回傳資料量']
                <?php
                
                $SQL="SELECT*FROM hospital WHERE county='$cookieID'";

                if($result=mysqli_query($link,$SQL)){
                    while($row=mysqli_fetch_assoc($result)){
                        $member=$row["uName"];
                        echo ",['".$member."',";
                        
                        $SQL="SELECT*FROM public WHERE county='$cookieID' AND member='$member'";

                        if($num=mysqli_query($link,$SQL)){
                            $total=mysqli_num_rows($num);
                            echo $total;
                            echo "]";
                        }
                    }
                    
                }
                
                ?>
                ]);

                var options = {
                chart: {
                    title: '合作醫療院所回傳人數資料量'
                }
                };

                var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                chart.draw(data, google.charts.Bar.convertOptions(options));
            }
            </script>
        </head>
        <body>
            <div id="columnchart_material" style="width: 800px; height: 500px;"></div>
        </body>
    </html>
    
    <?php
    }
    elseif($type==2){
    ?>
    <html>
    <head>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
            ['性別', '人數']
            <?php
            
            $SQL="SELECT*FROM public WHERE county='$cookieID' AND gender='男'";

            if($result=mysqli_query($link,$SQL)){
                $total=mysqli_num_rows($result);
                echo ",";
                echo "['男',".$total."]";
            }

            $SQL="SELECT*FROM public WHERE county='$cookieID' AND gender='女'";

            if($result=mysqli_query($link,$SQL)){
                $total=mysqli_num_rows($result);
                echo ",";
                echo "['女',".$total."]";
            }
            
            ?>
            ]);

            var options = {
            title: '所有資料之性別比'
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }
        </script>
    </head>
    <body>
        <div id="piechart" style="width: 900px; height: 500px;"></div>
    </body>
    </html>

    <?php
    }
    elseif($type==3){
    ?>
    <html>
    <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['年紀', '總人數', '男性', '女性'],
          ['<20'
          <?php
          $SQL=$SQL="SELECT * FROM public WHERE county='$cookieID' AND age<20";
            
          if($result=mysqli_query($link,$SQL)){
              echo ",";
              $total = mysqli_num_rows($result);
              echo $total;
          }
      
          $SQL=$SQL="SELECT * FROM public WHERE county='$cookieID' AND gender='男' AND age<20 ";
          
          if($result=mysqli_query($link,$SQL)){
              echo ",";
              $total = mysqli_num_rows($result);
              echo $total;
          }
          $SQL=$SQL="SELECT * FROM public WHERE county='$cookieID' AND gender='女' AND age<20 ";
          
          if($result=mysqli_query($link,$SQL)){
              echo ",";
              $total = mysqli_num_rows($result);
              echo $total;
          }
          ?>]
          
        <?php

        $i=20;
        $j=29;
        
        while ($i<90){
            echo ",['".$i."~".$j."'";
            $SQL=$SQL="SELECT * FROM public WHERE county='$cookieID' AND age BETWEEN $i and $j";
            
            if($result=mysqli_query($link,$SQL)){
                echo ",";
                $total = mysqli_num_rows($result);
                echo $total;
            }
        
            $SQL=$SQL="SELECT * FROM public WHERE county='$cookieID' AND gender='男' AND age BETWEEN $i and $j ";
            
            if($result=mysqli_query($link,$SQL)){
                echo ",";
                $total = mysqli_num_rows($result);
                echo $total;
            }
            $SQL=$SQL="SELECT * FROM public WHERE county='$cookieID' AND gender='女' AND age BETWEEN $i and $j ";
            
            if($result=mysqli_query($link,$SQL)){
                echo ",";
                $total = mysqli_num_rows($result);
                echo $total;
                echo "]";
            }
        
            $i=$i+10;
            $j=$j+10;
        };
        
        ?>
        ,['>90'
          <?php
          $SQL=$SQL="SELECT * FROM public WHERE county='$cookieID' AND age>90";
            
          if($result=mysqli_query($link,$SQL)){
              echo ",";
              $total = mysqli_num_rows($result);
              echo $total;
          }
      
          $SQL=$SQL="SELECT * FROM public WHERE county='$cookieID' AND gender='男' AND age>90 ";
          
          if($result=mysqli_query($link,$SQL)){
              echo ",";
              $total = mysqli_num_rows($result);
              echo $total;
          }
          $SQL=$SQL="SELECT * FROM public WHERE county='$cookieID' AND gender='女' AND age>90 ";
          
          if($result=mysqli_query($link,$SQL)){
              echo ",";
              $total = mysqli_num_rows($result);
              echo $total;
          }
          ?>]
        ]);

        var options = {
          chart: {
            title: '年齡別、性別之糖尿病患人數',
            color: ['green','blue','red']
          },
        };
       

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
  </head>
  <body>
    <div id="columnchart_material" style="width: 800px; height: 500px;"></div>
  </body>
</html>
    <?php
    }elseif ($type==4){
        ?>
        <html>
          <head>
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
              google.charts.load('current', {'packages':['corechart']});
              google.charts.setOnLoadCallback(drawChart);
        
              function drawChart() {
                var data = google.visualization.arrayToDataTable([
                  ['主食量', '空腹血糖值']
                  <?php
                  
                  $SQL="SELECT*FROM public WHERE county='$cookieID'";
        
                  if($result=mysqli_query($link,$SQL)){
                    while($row=mysqli_fetch_assoc($result)){
                        echo ",";
                        echo "[".$row['rice'].",".$row['glucose']."]";
                    }
                }
                  
                  ?>
                ]);
        
                var options = {
                  title: '主食量 vs. 空腹血糖值',
                  hAxis: {title: '主食量', minValue: 1, maxValue: 5},
                  vAxis: {title: '空腹血糖值', minValue: 50, maxValue: 150},
                  legend: 'none'
                };
        
                var chart = new google.visualization.ScatterChart(document.getElementById('chart_div'));
        
                chart.draw(data, options);
              }
            </script>
          </head>
          <body>
            <div id="chart_div" style="width: 900px; height: 500px;"></div>
          </body>
        </html>
        
        <!-- 飲料習慣 -->
        
        <?php
        }
        elseif ($type==5){
        ?>
        <html>
          <head>
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
              google.charts.load('current', {'packages':['corechart']});
              google.charts.setOnLoadCallback(drawChart);
        
              function drawChart() {
                var data = google.visualization.arrayToDataTable([
                  ['飲料習慣', '空腹血糖值']
                  <?php
                  
                  $SQL="SELECT*FROM public WHERE county='$cookieID'";
        
                  if($result=mysqli_query($link,$SQL)){
                    while($row=mysqli_fetch_assoc($result)){
                        echo ",";
                        echo "[".$row['drink'].",".$row['glucose']."]";
                    }
                }
                  
                  ?>
                ]);
        
                var options = {
                  title: '飲料習慣 vs. 空腹血糖值',
                  hAxis: {title: '飲料習慣', minValue: 1, maxValue: 5},
                  vAxis: {title: '空腹血糖值', minValue: 50, maxValue: 150},
                  legend: 'none'
                };
        
                var chart = new google.visualization.ScatterChart(document.getElementById('chart_div'));
        
                chart.draw(data, options);
              }
            </script>
          </head>
          <body>
            <div id="chart_div" style="width: 900px; height: 500px;"></div>
          </body>
        </html>
        
        <!-- 甜度 -->
        
        <?php
        }
        elseif ($type==6){
        ?>
        <html>
          <head>
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
              google.charts.load('current', {'packages':['corechart']});
              google.charts.setOnLoadCallback(drawChart);
        
              function drawChart() {
                var data = google.visualization.arrayToDataTable([
                  ['甜度選擇', '空腹血糖值']
                  <?php
                  
                  $SQL="SELECT*FROM public WHERE county='$cookieID'";
        
                  if($result=mysqli_query($link,$SQL)){
                    while($row=mysqli_fetch_assoc($result)){
                        echo ",";
                        echo "[".$row['sugar'].",".$row['glucose']."]";
                    }
                }
                  
                  ?>
                ]);
        
                var options = {
                  title: '甜度選擇 vs. 空腹血糖值',
                  hAxis: {title: '甜度選擇', minValue: 0, maxValue: 6},
                  vAxis: {title: '空腹血糖值', minValue: 50, maxValue: 150},
                  legend: 'none'
                };
        
                var chart = new google.visualization.ScatterChart(document.getElementById('chart_div'));
        
                chart.draw(data, options);
              }
            </script>
          </head>
          <body>
            <div id="chart_div" style="width: 900px; height: 500px;"></div>
          </body>
        </html>
        
        <!-- 零食 -->
        
        <?php
        }
        elseif ($type==7){
        ?>
        <html>
          <head>
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
              google.charts.load('current', {'packages':['corechart']});
              google.charts.setOnLoadCallback(drawChart);
        
              function drawChart() {
                var data = google.visualization.arrayToDataTable([
                  ['零食習慣', '空腹血糖值']
                  <?php
                  
                  $SQL="SELECT*FROM public WHERE county='$cookieID'";
        
                  if($result=mysqli_query($link,$SQL)){
                    while($row=mysqli_fetch_assoc($result)){
                        echo ",";
                        echo "[".$row['snack'].",".$row['glucose']."]";
                    }
                }
                  
                  ?>
                ]);
        
                var options = {
                  title: '零食習慣 vs. 空腹血糖值',
                  hAxis: {title: '零食習慣', minValue: 1, maxValue: 5},
                  vAxis: {title: '空腹血糖值', minValue: 50, maxValue: 150},
                  legend: 'none'
                };
        
                var chart = new google.visualization.ScatterChart(document.getElementById('chart_div'));
        
                chart.draw(data, options);
              }
            </script>
          </head>
          <body>
            <div id="chart_div" style="width: 900px; height: 500px;"></div>
          </body>
        </html>
        
        <!-- 甜點習慣 -->
        
        <?php
        }
        elseif ($type==8){
        ?>
        <html>
          <head>
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
              google.charts.load('current', {'packages':['corechart']});
              google.charts.setOnLoadCallback(drawChart);
        
              function drawChart() {
                var data = google.visualization.arrayToDataTable([
                  ['甜點習慣', '空腹血糖值']
                  <?php
                  
                  $SQL="SELECT*FROM public WHERE county='$cookieID'";
        
                  if($result=mysqli_query($link,$SQL)){
                    while($row=mysqli_fetch_assoc($result)){
                        echo ",";
                        echo "[".$row['cake'].",".$row['glucose']."]";
                    }
                }
                  
                  ?>
                ]);
        
                var options = {
                  title: '甜點習慣 vs. 空腹血糖值',
                  hAxis: {title: '甜點習慣', minValue: 1, maxValue: 5},
                  vAxis: {title: '空腹血糖值', minValue: 50, maxValue: 150},
                  legend: 'none'
                };
        
                var chart = new google.visualization.ScatterChart(document.getElementById('chart_div'));
        
                chart.draw(data, options);
              }
            </script>
          </head>
          <body>
            <div id="chart_div" style="width: 900px; height: 500px;"></div>
          </body>
        </html>
        
        <!-- 運動習慣 -->
        
        <?php
        }
        elseif ($type==9){
        ?>
        <html>
          <head>
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
              google.charts.load('current', {'packages':['corechart']});
              google.charts.setOnLoadCallback(drawChart);
        
              function drawChart() {
                var data = google.visualization.arrayToDataTable([
                  ['運動達30分鐘', '空腹血糖值']
                  <?php
                  
                  $SQL="SELECT*FROM public WHERE county='$cookieID'";
        
                  if($result=mysqli_query($link,$SQL)){
                    while($row=mysqli_fetch_assoc($result)){
                        echo ",";
                        echo "[".$row['sport'].",".$row['glucose']."]";
                    }
                }
                  
                  ?>
                ]);
        
                var options = {
                  title: '運動習慣 vs. 空腹血糖值',
                  hAxis: {title: '運動習慣', minValue: 1, maxValue: 5},
                  vAxis: {title: '空腹血糖值', minValue: 50, maxValue: 150},
                  legend: 'none'
                };
        
                var chart = new google.visualization.ScatterChart(document.getElementById('chart_div'));
        
                chart.draw(data, options);
              }
            </script>
          </head>
          <body>
            <div id="chart_div" style="width: 900px; height: 500px;"></div>
          </body>
        </html>
        <?php
        }
        ?>


</html>