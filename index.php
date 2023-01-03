<?php

include_once("db\connection.php");

$con = connection();

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>C3 vs Camstar Insertion Comparison Web View</title>

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
              <a href="index.php">
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

    <div class="container-fluid p-0 m-0 mr-0 table-hover">
        <div class="container-fluid card shadow-sm col-sm-12 col-lg-12 m-0 border-0 p-3">
            <span class="project__title"> C3 VS CAMSTAR INSERTION COMPARISON WEB VIEW </span>
        </div>

        <div class="container mt-4 ml-5 mr-0 handlerForm">
            <?php
                
                if (isset($_POST['submit'])){
                    $searchKey = $_POST['submit'];
                    $search = "SELECT * FROM camstar_sample_data INNER JOIN c3_sample_data ON camstar_sample_data.HANDLER_ID = c3_sample_data.HANDLER_ID GROUP BY camstar_sample_data.HANDLER_ID LIKE %searchKey%";
                }else{
                  $search = "SELECT * FROM camstar_sample_data INNER JOIN c3_sample_data ON camstar_sample_data.HANDLER_ID = c3_sample_data.HANDLER_ID GROUP BY camstar_sample_data.HANDLER_ID";
                  $searchKey = "";
                }
                  $search_result = mysqli_query($con, $search);  
            
            ?> 

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
                
    <div class="table-responsive mt-4 m-0 p-0">
        <table class="table table-bordered container-fluid">
            <thead>
                <tr>
                    <th scope="col" colspan="2" class="text-center cell"> HANDLER TYPE:</th>
                    <td scope="col" class="text-center cell"> </th>
                    <th scope="col" colspan="2" class="text-center cell">TRANSWW:</th>
                    <td scope="col" class="text-center cell"></th>
                </tr>
            </thead>
            <thead>
                <tr>
                    <th scope="col" class="text-center cell">HANDLER ID</th>
                    <th scope="col" class="text-center cell">DATE</th>
                    <th scope="col" class="text-center cell">CAMSTAR</th>
                    <th scope="col" class="text-center cell">C3</th>
                    <th scope="col" class="text-center cell">DIFFERENCE</th>
                    <th scope="col" class="text-center cell">PERCENTAGE</th>
                </tr>
            </thead>
    
            <tbody>
                <?php
                    while($row = mysqli_fetch_object($search_result)){
                        $handlerID = $row->HANDLER_ID;
                        
                        $reportDate = $row->DATETIME_EVENT;
                        $bin_cs = $row->BIN_TOTALTESTED_CS;
                        $bin_c3 = $row->BIN_TOTALTESTED_C3;
                        $difference = $bin_cs - $bin_c3;
                        $percentage = round(($difference/ $bin_c3 )*100,1);
                        
                ?>
                <tr>
                    <td class="text-center cell"><?php echo ($handlerID)?></td>
                    <td class="text-center cell"><?php echo($reportDate) ?></td> 
                    <td class="text-center cell"><?php echo ($bin_cs) ?></td>
                    <td class="text-center cell"><?php echo($bin_c3)?></td>
                    <td class="text-center cell"><?php echo ($difference)?></td> 
                    <td class="text-center cell text-white"><span class="badge rounded-pill bg-success"> <?php echo $percentage . "%" ?> </span> </td> 
                </tr>

                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

    <div>
        <button class="btn btn-generate shadow-none mx-5 mt-3" type="button">
            <i class="fa-solid fa-download"></i>
                <a href="exportfile.php"> Export </a>
        </button>  
    </div>             
</div>
</body>
</html>