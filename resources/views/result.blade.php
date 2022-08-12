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
			<th>2D</th>
			<th>3D</th>
			<th>12</th>
		</tr>
		</thead>
		<tbody>
        <tr id="first-row">
            <th>-</th>
            <th><span class="badge" id="two-animate-1"></span><span class="badge" id="two-animate-2"></span></th>
            <th><span class="badge" id="three-animate-1"></span><span class="badge" id="three-animate-2"></span><span class="badge" id="three-animate-3"></th>
            <th>
                @for($i = 0; $i <= 12; $i++)
					<!--Adding 0 -->
					<?php
						if($i < 10){
							$i = '0'.$i;
						}
					?>
					<!---->
				    <span class="badge">{{$i}}</span>
				@endfor        
            </th>
        </tr>    


		@foreach($items as $item)
		<tr>
            <!-- ID -->
			<td>{{$item->id}}</td>
            <!-- 2D -->
            <td>
				<?php   
				$digits = str_split($item->data_two);
				?>
				@foreach($digits as $digit)
				<span class="badge">{{$digit}}</span>
				@endforeach
			</td>
            <!-- 3D -->
            <td>
				<?php   
				$digits = str_split($item->data_three);
				?>
				@foreach($digits as $digit)
				<span class="badge">{{$digit}}</span>
				@endforeach
			</td>
            <!-- Twelve 12 -->
			<td>
				<?php   
				$data = $item->data_twelve;
				?>
				@for($i = 0; $i <= 12; $i++)
					<!--Adding 0 -->
					<?php
						if($i < 10){
							$i = '0'.$i;
						}
					?>
					<!---->
					@if($i==$data)
						<span class="badge" style="background-color:red">{{$i}}</span>
					@else
						<span class="badge">{{$i}}</span>
					@endif
				@endfor
			</td>
            <!-- END -->

		</tr>
	    @endforeach
	    <tbody>
	</table>
  
  <script>
      $( document ).ready(function() {
          animateShipped();
      });
    var totalShipped = 9;
    var shippedDisplay = 0;
    var shippedStep = totalShipped / (2 * 1000 / 100); // Animation duration 2 sec
    function animateShipped() {
        if (shippedDisplay > totalShipped)
        shippedDisplay = totalShipped;
        document.getElementById("two-animate-1").innerHTML = Math.round(shippedDisplay);
        document.getElementById("two-animate-2").innerHTML = Math.round(shippedDisplay);
        document.getElementById("three-animate-1").innerHTML = Math.round(shippedDisplay);
        document.getElementById("three-animate-2").innerHTML = Math.round(shippedDisplay);
        document.getElementById("three-animate-3").innerHTML = Math.round(shippedDisplay);



        if(shippedDisplay == 9){
            shippedDisplay = 0;
        }
        if (shippedDisplay < totalShipped) {
        shippedDisplay += shippedStep;
        setTimeout(animateShipped, 50);
        }
    }
   
  
  </script>

	
  <script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;
    var pusher = new Pusher('afbb2d4713581f829256', {cluster: 'ap2'});
    var channel = pusher.subscribe('my-channel');
    
    channel.bind('my-event', function(data) {
        console.log('* Data Received *');


        // $('#myTable tr:first').after('<tr><td>'+data.id+'</td><td id=data-two-'+data.id+' ></td><td id=data-three-'+data.id+'></td><td id=data-twelve-'+data.id+'></td></tr>');
        $('#first-row').after('<tr><td>'+data.id+'</td><td id=data-two-'+data.id+' ></td><td id=data-three-'+data.id+'></td><td id=data-twelve-'+data.id+'></td></tr>');

		// 2D
		let text = data.data_two;
		myArray = text.split("");
		myArray.forEach((element) => {
			$('#data-two-'+data.id).append('<span class="badge">'+ element +'</span>');
		});
		// END

        // 3D
		let txt = data.data_three;
		myArray = txt.split("");
		myArray.forEach((element) => {
			$('#data-three-'+data.id).append('<span class="badge">'+ element +'</span>');
		});
		// END

		// Data 1 to 12
		for (let i = 0; i <= 12; i++) {
		
			if(i==data.data_twelve){
				if(i < 10){ i = '0'+i;}
				$('#data-twelve-'+data.id).append('<span class="badge" style="background-color:red">'+ i +'</span>');
			}else{
				if(i < 10){ i = '0'+i;}
				$('#data-twelve-'+data.id).append('<span class="badge">'+ i +'</span>');
			}
		}

    });
    
  </script>
  
  
</body>
</html>