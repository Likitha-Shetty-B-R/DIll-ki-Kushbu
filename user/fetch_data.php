<?php
include('../backend_php/config.php');
if(isset($_POST["action"]))
{
 $query = "SELECT * from products WHERE restatus = '1'";

 if(isset($_POST["brand"]))
 {
  $brand_filter = implode("','", $_POST["brand"]);
  $query .= "AND category_id IN('".$brand_filter."')";

 }
//  <a href="documents/products/'.$data['image'].'><img src="documents/products/'.$data['image'].' class="flex-shrink-0 img-fluid rounded" src="documents/products/aaa.jpg" alt="" style="width: 80px;"></a>
 $statement = $db->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 $total_row = $statement->rowCount();
 $output = '';
 if($total_row > 0)
 {
  foreach($result as $data)
  {
   $output .= '
   
    <div class="col-lg-6">
        <div class="d-flex align-items-center">
        <a href="documents/products/'.$data['image'].'"><img src="documents/products/'.$data['image'].'" style="width: 80px;" class="flex-shrink-0 img-fluid rounded"></a>
               
                <div class="w-100 d-flex flex-column text-start ps-4">
                    <h5 class="d-flex justify-content-between border-bottom pb-2">
                        <span>'. $data['product_name'] .'</span>
                        <span class="text-primary">'.number_format($data['price'],2).'</span>
                    </h5>
                    <span class="d-flex justify-content-between  pb-2">
                    <a href="product_det.php?key='.  $data['id'] .'"><b class="fst-italic">BUY NOW >></b></a>
                    </span>
                </div>
            
        </div>
    </div>
   
   ';
  }
 }
 else
 {
  $output = '<h3>No Data Found</h3>';
 }
 echo $output;
}

?>
