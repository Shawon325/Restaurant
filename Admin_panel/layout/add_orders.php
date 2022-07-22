<?php  
$order=new Order;
date_default_timezone_set("Asia/Dhaka");
?>

<div class="container-fluid">

  <div class="card shadow mb-4">
    <div class="card-header"><h3>Orders</h3></div>
    <div class="card-body">

      <form role="form" action="" method="post" id="order_form" class="form-horizontal">
             <div class="box-body">


               <div class="form-group" style="float:right">
                 <label for="gross_amount" class="col-sm-12 control-label"><?=date("h:ia")?></label>
               </div>
               <div class="form-group" style="float:right">
                 <label for="gross_amount" class="col-sm-12 control-label">Date: <?=date("Y-m-d")?></label>
               </div>

               <div class="col-md-4 col-xs-12 pull pull-left">

                 <div class="form-group">
                   <label for="gross_amount" class="col-sm-5 control-label" style="text-align:left;">Table</label>
                   <div class="col-sm-7">
                     <select class="form-control table_id" id="table_name" name="table_name">
                      <option>Select Table</option>
                      <?php
                      $data=$order->table_list();
                      while($tables=$data->fetch_assoc())
                      {
                        ?>
                        <option value="<?=$tables['id']?>"><?=$tables['table_name']?></option>
                        <?php
                      }
                      ?>
                     </select>
                   </div>
                 </div>

               </div>


               <br /> <br/>
               <table class="table table-bordered" id="product_info_table">
                 <thead>
                   <tr>
                     <th style="width:50%">Product</th>
                     <th style="width:10%">Qty</th>
                     <th style="width:10%">Rate</th>
                     <th style="width:20%">Amount</th>
                     <th style="width:10%"><button type="button" id="add_row" class="btn btn-info add_button"><i class="fa fa-plus"></i></button></th>
                   </tr>
                 </thead>

                  <tbody>
                    <tr>
                      <td>
                       <select class="form-control select_group product" style="width:100%;" name="product_id" required>
                           
                           <option>Select Product</option>
                           <?php
                           $data=$order->products_list();
                           while($product_fetch=$data->fetch_assoc())
                           {
                              ?>
                              <option class="product_op" value="<?=$product_fetch['id']?>"><?=$product_fetch['product_name']?></option>
                              <?php
                           }
                           ?>
                          </select>
                       </td>
                       <td><input type="number" value=0 min=0 name="qty" class="form-control qty" required></td>
                       <td>
                         <input type="text" name="rate" id="rate" class="form-control rate" value=0 disabled autocomplete="off">
                       </td>
                       <td>
                         <input type="text" name="amount" id="amount" class="form-control amount" disabled value=0>
                       </td>
                       <td><button type="button" class="btn btn-warning remove_button"><i class="fa fa-times"></i></button></td>
                    </tr>
                  </tbody>
               </table>

                <div class="field_wrapper">
                  
                </div>
               
               <br/> <br/>

               <div class="col-md-6 col-xs-12 pull pull-right">

                 <div class="form-group">
                   <label for="gross_amount" class="col-sm-5 control-label">Gross Amount</label>
                   <div class="col-sm-7">
                     <input type="text" class="form-control gross_amount" value=0 name="gross_amount" disabled>
                     <input type="hidden" class="form-control" id="gross_amount_value" name="gross_amount_value" autocomplete="off">
                   </div>
                 </div>
                 
                  <div class="form-group">
                   <label for="discount" class="col-sm-5 control-label">Discount</label>
                   <div class="col-sm-7">
                     <input type="number" min=0 class="form-control discount_rate" name="discount_rate" value=0 autocomplete="off">
                     <input type="hidden" class="form-control discount_amount" name="discount_amount" autocomplete="off">
                   </div>
                 </div>

                 <?php
                 $vat=$order->vat();
                 if($vat['charge_amount']>0){
                 ?>
                 <div class="form-group">
                   <label for="discount" class="col-sm-5 control-label">Service Charge</label>
                   <div class="col-sm-7">
                     <input type="hidden" class="form-control service_charge_rate" name="service_charge_rate" value="<?=$vat['charge_amount']?>" autocomplete="off">
                     <input type="text" class="form-control service_charge_amount" disabled="disabled" name="service_charge_amount" autocomplete="off">
                   </div>
                 </div>
                 <?php
                 }
                 else
                 {
                 ?>
                 <input type="hidden" class="form-control service_charge_rate" name="service_charge_rate" value="<?=$vat['charge_amount']?>" autocomplete="off">
                 <input type="hidden" class="form-control service_charge_amount" disabled="disabled" name="service_charge_amount" value=0>
                 <?php
                 }
                 ?>

                  <div class="form-group">
                   <label for="vat_charge" class="col-sm-5 control-label">Vat <?=$vat['vat_charge']?>%</label>
                   <div class="col-sm-7">
                    <input type="hidden" class="form-control vat_charge_rate" name="vat_charge_rate" value="<?=$vat['vat_charge']?>">
                     <input type="text" class="form-control vat_charge_amount" name="vat_charge_amount" disabled>
                   </div>
                 </div>

                 <div class="form-group">
                   <label for="net_amount" class="col-sm-5 control-label">Net Amount</label>
                   <div class="col-sm-7">
                     <input type="text" class="form-control net_amount" id="net_amount" name="net_amount" disabled autocomplete="off">
                   </div>
                 </div>

               </div>
             </div>
             <!-- /.box-body -->

             <input type="hidden" class="user_id" value="<?=Session::get("user_id")?>">
             <input type="hidden" class="store" value="<?=Session::get("store")?>">


             <div class="box-footer">
               <input type="hidden" name="service_charge_rate" value="" autocomplete="off">
               <input type="hidden" name="vat_charge_rate" value="13" autocomplete="off">
               <button type="button" class="btn btn-primary create">Create Order</button>
               <a href="http://localhost/Restaurant/restaurant/orders/" class="btn btn-warning">Back</a>
             </div>
           </form>

    </div>
  </div>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    var maxField= 50;
    var addButton= $(".add_button");
    var wrapper= $(".field_wrapper");
    var x=1;
    $(addButton).on("click",function(){
      if (x<maxField)
      {
        x++;
        $(wrapper).append('<div>\
          <table class="table table-bordered" id="product_info_table">\
                    <tr>\
                      <td style="width:50%">\
                       <select class="form-control select_group product" style="width:100%;" required>\
                           <option>Select Product</option>\
                           <?php
                           $data=$order->products_list();
                           while($product_fetch=$data->fetch_assoc())
                           {
                              ?>
                              <option class="product_op" value="<?=$product_fetch['id']?>"><?=$product_fetch['product_name']?></option>\
                              <?php
                           }
                           ?>
                          </select>\
                       </td>\
                       <td style="width:10%">\
                       <input type="number" value=0 min=0 name="qty" class="form-control qty" required></td>\
                       <td style="width:10%">\
                         <input type="text" name="rate" id="rate" class="form-control rate" value=0 disabled autocomplete="off">\
                       </td>\
                       <td style="width:20%">\
                         <input type="text" name="amount" id="amount" class="form-control amount" disabled value=0>\
                       </td>\
                       <td style="width:10%">\
                       <button type="button" class="btn btn-warning remove_button"><i class="fa fa-times"></i></button></td>\
                    </tr>\
                  </tbody>\
               </table>\
               </div>');
      }
      $(document).on("click",".remove_button",function(event){
        event.preventDefault();$(this).parent('div').remove();x--;
      });
    });

    var net_amount=0;
    var vat_charge_rate=$(".vat_charge_rate").val();
    var vat_charge_amount=0;
    var amount=0;
    var discount_rate=0;
    var service_charge_rate=$(".service_charge_rate").val();
    var service_charge_amount=0;

    $(document).on("change",".product",function(){
      var row=$(this).closest("tr");
      var product_id=$(this).val();

      $.ajax({
        url:'ajax_order.php',
        type:'post',
        dataType:'JSON',
        data:{'product_id':product_id},
        success:function(data)
        {
          row.find(".rate").val(data.price);
        }
      });

    });

    $(document).on("change",".discount_rate",function(){
      var total=$(".gross_amount").val();
      var discount_rate=$(this).val();
      discount_amount=parseInt((total*discount_rate)/100);
      $(".discount_amount").val(discount_amount);
      total=parseInt(total-discount_amount);
      vat_charge_amount=parseInt((total*vat_charge_rate)/100);
      $(".vat_charge_amount").val(vat_charge_amount);
      net_amount=parseInt(total+vat_charge_amount);
      $(".net_amount").val(net_amount)
    });

    $(document).on("change",".qty",function(){
      var qty=$(this).val();
      var row_price=$(this).closest("tr").find(".rate").val();
      var amount=parseInt(qty*row_price);
      $(this).closest("tr").find(".amount").val(amount);

      var total=0;
      $(".amount").each(function(){
        var value=parseInt($(this).val());
        total=parseInt(value+total);
      });

      $(".gross_amount").val(total);
      vat_charge_amount=parseInt((total*vat_charge_rate)/100);
      $(".vat_charge_amount").val(vat_charge_amount);
      net_amount=parseInt(total+vat_charge_amount);
      $(".net_amount").val(net_amount);

      if(service_charge_rate>0)
      {
        service_charge_amount=parseInt((net_amount*service_charge_rate)/100);
        $(".service_charge_amount").val(service_charge_amount);
        net_amount=parseInt(net_amount+service_charge_amount);
        $(".net_amount").val(net_amount);
      }
    });
$(document).on("click",".create",function(){
  var final_gross_amount=$(".gross_amount").val();
  var final_service_charge_rate=$(".service_charge_rate").val();
  var final_service_charge_amount=$(".service_charge_amount").val();
  var final_vat_charge_rate=$(".vat_charge_rate").val();
  var final_vat_charge_amount=$(".vat_charge_amount").val();
  var final_discount=$(".discount_amount").val();
  var final_net_amount=$(".net_amount").val();
  var user_id=$(".user_id").val();
  var table_id=$(".table_id").val();
  var store=$(".store").val();

  var product_ids = [];
  var qtys = [];
  var rates = [];
  var amounts = [];
  let allProducts = document.querySelectorAll(".product");
  let allQtys = document.querySelectorAll(".qty");
  let allRates = document.querySelectorAll(".rate");
  let allAmounts = document.querySelectorAll(".amount");
  allProducts.forEach(function(el){
    product_ids.push(el.value);
    qtys.push(el.value);
    rates.push(el.value);
    amounts.push(el.value);
  })

  $.ajax({
  url:'ajax_order.php',
  type:'post',
  data:{
    'create':1,
    'table_id':table_id,
    'gross_amount':final_gross_amount,
    'service_charge_rate':final_service_charge_rate,
    'service_charge_amount':final_vat_charge_amount,
    'vat_charge_rate':final_vat_charge_rate,
    'vat_charge_amount':final_vat_charge_amount,
    'discount':final_discount,
    'net_amount':final_net_amount,
    'user_id':user_id,
    store,
    product_ids,
    qtys,
    rates,
    amounts,
  },
  success:function(data)
  {
    if(data)
    {
      swal("Success","Successfully Order Inserted","success");
    }
    else
    {
      swal("Error","Something Went Wrong","error");
    }
  }
});
});
  });
</script>
