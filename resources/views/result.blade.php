<!DOCTYPE html>
<html>
<head>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
	<style>
	table {
		font-family: arial, sans-serif;
		border-collapse: collapse;
		width: 100%;
	}
	
	td,
	th {
		border: 1px solid #dddddd;
		text-align: left;
		padding: 8px;
	}
	
	tr:nth-child(even) {
		background-color: #dddddd;
	}
	</style>
</head>

<body>
	<h2>Get data from postman not without refresh page</h2>
	<table id="myTable">
	    <thead>
		<tr>
			<th>ID</th>
			<th>data</th>
			<th>price</th>
			<th>detail</th>
		</tr>
		</thead>
		<tbody>
		@foreach($items as $item)
		<tr>
			<td>{{$item->id}}</td>
			<td>{{$item->data}}</td>
			<td>
				<?php   
				$digits = str_split($item->price);
				?>
				@foreach($digits as $digit)
				<span class="badge">{{$digit}}</span>
				@endforeach
			</td>
			<td>{{$item->detail}}</td>
		</tr>
	    @endforeach
	    <tbody>
	</table>
	
  <script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;
    var pusher = new Pusher('afbb2d4713581f829256', {cluster: 'ap2'});
    var channel = pusher.subscribe('my-channel');
    
    channel.bind('my-event', function(data) {
        console.log('* Data Received *');
        $('#myTable tr:first').after('<tr><td>'+data.id+'</td><td>'+data.data+'</td><td id='+data.id+'></td><td>'+data.detail+'</td></tr>');
		// Price Digits Seperation
		let text = data.price;
		myArray = text.split("");
		myArray.forEach((element) => {
			$('#'+data.id).append('<span class="badge">'+ element +'</span>');
		});

    });
    
  </script>
  
  
</body>
</html>