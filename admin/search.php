 <html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <!-- <title>Search Database</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->
 <!--  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />  -->
 </head>
 <body> 
  <div class="container">
   <br />
   <h2 align="center">Search Customers</h2><br />
   <div class="form-group">
    <div class="input-group">
     <span class="input-group-addon">Search</span>
     <input type="text" name="search_text" id="search_text" placeholder="Search by Customer Details" class="form-control" />
    </div>
   </div>
   <br />
   <div id="result"></div>
  </div>
  </body>
</html> 


<script>
$(document).ready(function()
{

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"fetch.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }
 $('#search_text').keyup(function()
 {
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
</script>
<!-- <div>
    <div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-default">Search</span>
  </div>
  <input type="text" class="form-control"name="search_text" id="search_text"  aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Search By Booking Details">
</div>
   <br />
      <div id="result">
              <table class="table table-striped table-hover">
                <thead style="background: #5d66e3;" >
                  <tr class="text-center">
                    <th>Room Number</th>
                    <th>Booking Number</th>
                    <th>Form Date</th>
                    <th>To Date</th>
                    <th>Check Out</th>
                  </tr>
                </thead>
                <?php 
                $sql=$conn->query("SELECT * FROM  room_booking");
                  while ($row=mysqli_fetch_array($sql)) 
                  {
                    if ($row['Status']==1 && $row['payment'] !=0) 
                    {
                    
                      ?>
                       <tr class="text-center">
                        <td><?php echo $row['roomId'] ; ?></td>
                        <td><?php echo $row['BookingNumber'] ; ?></td>
                        <td><?php echo $row['FromDate'] ; ?></td>
                        <td><?php echo $row['ToDate'] ; ?></td>
                        <td><a class="btn btn-warning" href="active_booking.php?checkout=<?php echo $row['BookingNumber']?>">Check Out</a></td>
                      </tr>
                      <?php
                    }
                  }
                ?>
              </table>
            </div>

</div>
<script>
$(document).ready(function()
{

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"fetch.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }
 $('#search_text').keyup(function()
 {
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
</script> -->