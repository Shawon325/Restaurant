<div class="container-fluid">
<?php
$orders=new Order;
if (isset($_POST['update']))
{
    $orders->update($_POST);
}
?>
<h3>Manage Orders</h3>
<a href="?page=add_orders"><button class="btn btn-success" type="button" name="add_products">Add Orders</button></a>
<br> <br>
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Order List</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Bill No</th>
            <th>Date</th>
            <th>Vat Rate</th>
            <th>Vat Amount</th>
            <th>Discount</th>
            <th>Gross Amount</th>
            <th>Net Amount</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $data=$orders->get();
          while ($order_list=$data->fetch_assoc())
          {
          ?>
          <tr>
            <td><?=$order_list['bill_no']?></td>
            <td><?=$order_list['date_time']?></td>
            <td><?=$order_list['vat_charge_rate']?></td>
            <td><?=$order_list['vat_charge_amount']?></td>
            <td><?=$order_list['discount']?></td>
            <td><?=$order_list['gross_amount']?></td>
            <td><?=$order_list['net_amount']?></td>
          </tr>
          <?php
          }
           ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
