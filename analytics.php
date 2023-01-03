<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Collapsible sidebar using Bootstrap 4</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
</head>

<body>


<div class="wrapper">
    <!-- Sidebar -->

    <nav id="sidebar">
        <div class="sidebar-header p-0">
            <a href="index.php">
                <img src="img\analog_logo - Copy.svg" class="img-fluid dashboard-logo p-0"   alt="">
            </a>
        </div>

        <ul class="sidebar-ul">
            <li style="list-style-type: none;">
                <a href="../index.php">
                    <i class="fas fa-home"></i><span> Home </span>
                </a>
            </li>
            <li style="list-style-type: none;">
                <a href="analytics.php">
                    <i class="fas fa-chart-line"></i><span> Analytics </span>
                </a>
            </li>
        </ul>
    </nav>

 
    <div class="container-fluid p-0">
        <div class="container-fluid card shadow-sm col-sm-12 col-lg-12 m-0 border-0 p-3">
            <span class="project__title"> C3 VS CAMSTAR INSERTION COMPARISON WEB VIEW</span>
        </div>

    <div class="container mt-4 ml-5 handlerForm">
        <form action="" method="post" class="row form-item">
            <select class="form-select col-2" name="search">
                <option selected> Handler Type</option>
                <option value="handlers">All </option>
                <option value="handler 1">DELD8000 </option>
                <option value="handler 2">DELD8880 </option>
                <option value="handler 3">HT9046 </option>
                <option value="handler 4">HT9046MX </option>
                <option value="handler 5">RAS1000</option>
                <option value="handler 6">RAS2000</option>
                <option value="handler 7">MT9510</option>
            </select>  
            <div class="col-3">
                <label class="inline__label" type="text">From</label>
                <span class="inline_span">
                    <input type="text" class="form-control" value="yyyy-mm-dd">
                </span>
            </div>
            <div class="col-3">
                <label class="inline__label" type="text">To</label>
                <span class="inline_span">
                    <input type="text" class="form-control" value="yyyy-mm-dd">
                </span>
            </div>
            
            <buttton onclick="myFunction()" class="btn btn-search" type="submit">
                Search <i class="fa-solid fa-magnifying-glass"></i>
            </buttton>
            <div>              
            </form>
        </div>
    </div>

    <div class="container">
        <canvas id="myChart"></canvas>
        <button class="btn btn-generate shadow-none mx-5 mt-3" type="button">
        <i class="fa-solid fa-download"></i>
            <a href="php\exportfile.php"> Export </a>
        </button>
    </div>
        

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
<script>
        let myChart = document.getElementById('myChart').getContext('2d');
        let massPopChart = new Chart(myChart, {
            type:'bar',
            data:{
                labels:['WW1', 'WW2', 'WW3', 'WW4', 'WW5'],
                datasets:[{
                    label:'Differences',
                    data:[
                         347296,
                        245610,
                        608042,
                        727182,
                        192632
                    ],
                    backgroundColor: '#C83264'
                    //#FAC864
                }]
            },
            options:{}
        });
    </script>
</body>
</html>