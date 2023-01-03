<?php
	require_once 'connection.php';
 
	  if (isset($_POST['submit'])){
                    $searchKey = $_POST['submit'];
                    $search = "SELECT * FROM c3_sample_data JOIN camstar_sample_data ON c3_sample_data.HANDLER_ID = camstar_sample_data.HANDLER_ID WHERE HANDLER_ID LIKE %searchKey%";
                }else{
                  $search = "SELECT * FROM c3_sample_data JOIN camstar_sample_data ON c3_sample_data.HANDLER_ID = camstar_sample_data.HANDLER_ID";
                  $searchKey = "";
                }
                  $search_result = mysqli_query($con, $search);  
    $search = isset($_GET['search']) ? $_GET['search'] : '';

    $search_string = "SELECT * FROM c3_sample_data JOIN camstar_sample_data ON c3_sample_data.HANDLER_ID = camstar_sample_data.HANDLER_ID WHERE";
    $displayResult = "";
?>