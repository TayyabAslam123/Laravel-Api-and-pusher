<!DOCTYPE html>
<html lang="en">
<head>
	<title>Spin Win</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script src="https://js.pusher.com/7.2/pusher.min.js"></script>
	<style>
		body {
			background-color: green;
		}
		table {
			background-color: white;
		}
	</style>
</head>
<body>
	<br><br>
	<h1 style="color:red">LOGO</h1>
	<br><br>
	<div class="alert alert-success" style="background-color: white;"> <strong>POST</strong>
		<a href="#" class="alert-link"></a>. </div>
	<div class="container" style="background-color: white;" id="all-content">
	<br>
	@foreach ($items as $item)	
	<table class="table table-bordered">
		<thead>
			<tr class="table-info">
				<th style="width: 150px;background-color: lightblue;">ID: {{$item->id}} </th>
				<th style="background-color: lightblue;">Date: {{$item->created_at}} </th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>2D :</td>
				@if($item->data_two == Null)
					<td id="data-two-{{$item->id}}"><span class="badge two-animate-1"></span><span class="badge two-animate-2"></span></td>
				@else
					<td id="data-two-{{$item->id}}">
					<?php   
					$digits = str_split($item->data_two);
					?>
					@foreach($digits as $digit)
						<span class="badge">{{$digit}}</span>
					@endforeach
					</td>
				@endif
			</tr>
			<tr>
				<td>3D :</td>
			   <!-- 3D -->
				@if($item->data_three == Null)
				<td id="data-three-{{$item->id}}"><span class="badge three-animate-1"></span><span class="badge three-animate-2"></span><span class="badge three-animate-3"></td>
				@else
					<td id="data-three-{{$item->id}}">
					<?php   
					$digits = str_split($item->data_three);
					?>
					@foreach($digits as $digit)
						<span class="badge">{{$digit}}</span>
					@endforeach
					</td>
				@endif
			</tr>
			<tr>
				<td>12 : </td>
				<td id="data-twelve-{{$item->id}}">
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
			</tr>
		</tbody>
	</table>	
	@endforeach
	</div>
</body>

</html>

<script>
    

    var totalShipped = 9;
    var shippedDisplay = 0;
    var shippedStep = totalShipped / (2 * 1000 / 100); // Animation duration 2 sec

	// Animate Two D
    function animateTwoD() {
        if (shippedDisplay > totalShipped)
        shippedDisplay = totalShipped;
        $(".two-animate-1").html(Math.round(shippedDisplay));
        $(".two-animate-2").html(Math.round(shippedDisplay));
        if(shippedDisplay == 9){
            shippedDisplay = 0;
        }
        if (shippedDisplay < totalShipped) {
        shippedDisplay += shippedStep;
        setTimeout(animateTwoD, 50);
        }
    }

	// Animate Three D
	function animateThreeD() {
        if (shippedDisplay > totalShipped)
        shippedDisplay = totalShipped;
        $(".three-animate-1").html(Math.round(shippedDisplay));
        $(".three-animate-2").html(Math.round(shippedDisplay));
        $(".three-animate-3").html(Math.round(shippedDisplay));
        if(shippedDisplay == 9){
            shippedDisplay = 0;
        }
        if (shippedDisplay < totalShipped) {
        shippedDisplay += shippedStep;
        setTimeout(animateThreeD, 50);
        }
    }
   
    animateTwoD();
    animateThreeD();
  </script>

<script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;
    var pusher = new Pusher('afbb2d4713581f829256', {cluster: 'ap2'});
    var channel = pusher.subscribe('my-channel');
    
    channel.bind('my-event', function(data) {

    	console.log('* Data Received *');
        // Send Ajax call
		$.ajax({
          type: "GET",
          url:"{{url('get-data')}}",
          dataType: "json",
          success: function(response) {
			  resp = response;
			$('#all-content').html('');
			$.each(resp.data,function(i,v){
				$('#all-content').append('<table class="table table-bordered">'+
	            '<thead><tr class="table-info"><th style="width: 150px;background-color: lightblue;">ID:'+v.id+'</th>'+
				'<th style="background-color: lightblue;">Date:'+v.created_at+'</th>'+
		     	'</tr></thead><tbody>'+
				'<tr><td>2D :</td><td id="data-two-'+v.id+'"></td></tr>'+
                '<tr><td>3D :</td><td id="data-three-'+v.id+'"></td></tr>'+
	         	'<tr><td>12 : </td><td id="data-twelve-'+v.id+'"></td></tr></tbody></table>');

						
			// 2D
			let text = v.data_two;
			if(!text){
				$('#data-two-'+v.id).append('<td><span class="badge two-animate-1"></span><span class="badge two-animate-2"></span></td>');	
				animateTwoD();
			}else{
				text = text.toString();
				myArray = text.split("");
				myArray.forEach((element) => {
					$('#data-two-'+v.id).append('<span class="badge">'+ element +'</span>');
				});
			}	
			// 3D
			let txt = v.data_three;
			if(!txt){
				$('#data-three-'+v.id).append('<td><span class="badge three-animate-1"></span><span class="badge three-animate-2"></span><span class="badge three-animate-3"></td>');	
					animateThreeD();
			}else{
				txt = txt.toString();
				myArray = txt.split("");
				myArray.forEach((element) => {
					$('#data-three-'+v.id).append('<span class="badge">'+ element +'</span>');
				});
			}
			// Data 1 to 12
			for (let i = 0; i <= 12; i++) {
			
					if(i==v.data_twelve){
						if(i < 10){ i = '0'+i;}
						$('#data-twelve-'+v.id).append('<span class="badge" style="background-color:red">'+ i +'</span>');
					}else{
						if(i < 10){ i = '0'+i;}
						$('#data-twelve-'+v.id).append('<span class="badge">'+ i +'</span>');
					}
		    	}
			});
	
         }
        });





    });
    
  </script>
