<html>
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <head>
  <title>Live Inline Update data using X-editable with PHP and Mysql</title>
  

  <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.1/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.1/bootstrap3-editable/js/bootstrap-editable.js"></script>
  
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
  <script src="http://code.jquery.com/jquery-2.0.3.min.js"></script> 
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.1/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.1/bootstrap3-editable/js/bootstrap-editable.js"></script>

  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="w3.css">
  
 </head>

<div class="w3-sidebar w3-bar-block w3-blue w3-xxxlarge" style="width:130px">

<br><br>
  <a href="#" class="w3-bar-item w3-button w3-hover-black"><i class="fa fa-home" style="margin-left:30px"></i></a> 
<hr>
  <a href="#" class="w3-bar-item w3-button w3-hover-black"><i class="fa fa-search" style="margin-left:30px"></i></a> 
<hr>
  <a href="#" class="w3-bar-item w3-button w3-hover-black"><i class="fa fa-envelope" style="margin-left:30px"></i></a> 
<hr>  
  <a href="#" class="w3-bar-item w3-button w3-hover-black"><i class="fa fa-globe" style="margin-left:30px"></i></a>
<hr>  
  <a href="#" class="w3-bar-item w3-button w3-hover-black"><i class="fa fa-trash" style="margin-left:30px"></i></a> 
</div>

<div class="">
<div class="w3-bar w3-blue" style="height:130px">
  <a href="#" class="w3-bar-item w3-button" style="margin-left:500px"></a>
  <button class="w3-button w3-card-4 w3-white w3-border w3-border-red  w3-round-large w3-hover-black" style="margin-top:40px"><a href="#" >HOME</a></button>
  <button class="w3-button w3-card-4 w3-white w3-border w3-border-blue w3-round-large w3-hover-black" style="margin-top:40px"><a href="entry.html">COUNTER</a></button>
  <button class="w3-button w3-card-4 w3-white w3-border w3-border-blue w3-round-large w3-hover-black" style="margin-top:40px"><a href="filter.php">SALE</a></button>
  <button class="w3-button w3-card-4 w3-white w3-border w3-border-blue w3-round-large w3-hover-black" style="margin-top:40px"><a href="profit.php">REPORTS</a></button>
</div>
</div>


 <body>
  <div class="container" class="w3-responsive">
<br><br>

 <input class="form-control" id="myInput" type="text" style="margin-left:80px" placeholder="Search..">
  
   <br/>
  <table  class="w3-table-all w3-centered w3-hoverable w3-card-4" style="margin-left:80px">
   <thead>
 
    <tr class="w3-teal w3-hover-blue">
      <th width="1%">ID</th>
      <th width="20%">NAME</th>
      <th width="2%">PRICE</th>
      <th width="2%">RETAIL</th>
      <th width="2%">PAYMENT</th>
      <th width="15%">CUSTOMER</th>
      <th width="7%">DATE</th>
     </tr>
  
    </thead>
    <tbody id="employee_data">
    </tbody>
   </table>
 </body>
</html>

<br>
<script type="text/javascript" language="javascript" >
$(document).ready(function(){
 
 function fetch_employee_data()
 {
  $.ajax({
   url:"fetch.php",
   method:"POST",
   dataType:"json",
   success:function(data)
   {
    for(var count=0; count<data.length; count++)
    {
     var html_data = '<tr><td>'+data[count].id+'</td>';
     html_data += '<td data-name="name" class="name" data-type="text" data-pk="'+data[count].id+'">'+data[count].name+'</td>';
     html_data += '<td data-name="purchaseP" class="purchaseP" data-type="text" data-pk="'+data[count].id+'">'+data[count].purchaseP+'</td>';
     html_data += '<td data-name="saleP" class="saleP" data-type="text" data-pk="'+data[count].id+'">'+data[count].saleP+'</td>';
     html_data += '<td data-name="payment" class="payment" data-type="text" data-pk="'+data[count].id+'">'+data[count].payment+'</td>';
     html_data += '<td data-name="customer" class="customer" data-type="text" data-pk="'+data[count].id+'">'+data[count].customer+'</td>';
     html_data += '<td data-name="date" class="date" data-type="text" data-pk="'+data[count].id+'">'+data[count].date+'</td>';
     $('#employee_data').append(html_data);
    
    }
   }
  })
 }
 

 fetch_employee_data();
 
 $('#employee_data').editable({
  container: 'body',
  selector: 'td.name',
  url: "update.php",
  title: 'Item Name',
  type: "POST",
  dataType: 'json',
  validate: function(value){
   if($.trim(value) == '')
   {
    return 'This field is required';
   }
  }
 });
 
 $('#employee_data').editable({
  container: 'body',
  selector: 'td.purchaseP',
  url: "update.php",
  title: 'Price',
  type: "POST",
  dataType: 'json',
  validate: function(value){
   if($.trim(value) == '')
   {
    return 'This field is required';
   }
  }
 });
 
 $('#employee_data').editable({
  container: 'body',
  selector: 'td.saleP',
  url: "update.php",
  title: 'Sale Price',
  type: "POST",
  dataType: 'json',
  validate: function(value){
   if($.trim(value) == '')
   {
    return 'This field is required';
   }
  }
 });
 
 $('#employee_data').editable({
  container: 'body',
  selector: 'td.payment',
  url: "update.php",
  title: 'Payment',
  type: "POST",
  dataType: 'json',
  validate: function(value){
   if($.trim(value) == '')
   {
    return 'Numbers Only';
   }
  }
 });

$('#employee_data').editable({
  container: 'body',
  selector: 'td.saleP',
  url: "update.php",
  title: 'Profit',
  type: "POST",
  dataType: 'json',
  validate: function(value){
   if($.trim(value) == '')
   {
    return 'Numbers Only';
   }
  }
 });


 $('#employee_data').editable({
  container: 'body',
  selector: 'td.customer',
  url: "update.php",
  title: 'Customer',
  type: "POST",
  dataType: 'json',
  validate: function(value){
   if($.trim(value) == '')
   {
    return 'Numbers Only';
   }
  }
 });

 $('#employee_data').editable({
  container: 'body',
  selector: 'td.date',
  url: "update.php",
  title: 'Date',
  type: "POST",
  dataType: 'json',
  validate: function(value){
   if($.trim(value) == '')
   {
    return 'This field is required';
   }
  }
 });


});
</script>


<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#employee_data tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>



