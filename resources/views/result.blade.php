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
			background-color: rgb(49, 147, 49);
		}
		table {
			background-color: white;
		}
		.right-badge{
			background-color: aliceblue;
			color: black;
		}
		.border{
			border-style: groove;
			color: aliceblue;
		}
	</style>
</head>
<body>
	<div class="container-fluid">
    	<div class="row">
			<!--Left Section Start-->
			<div class="col-sm-9"> 	
			<br><br>
			<!--PLACE LOGO HERE-->
			<h1 style="color:red">LOGO</h1>

				<br><br>
				<div class="alert alert-success" style="background-color: white;"> <strong>POST</strong>
					<a href="#" class="alert-link"></a>. </div>
				<div class="container-fluid" style="background-color: white;" id="all-content">
				<br>

	<!--LOOPING THROUGH DATA ON LEFT-->
	@foreach ($arr1 as $item)	
		<table class="table table-bordered">
			<thead>
				<!--Daw ID-->
				<tr class="table-info">
					<th style="width: 150px;background-color: lightblue;">ID: {{$item->draw_id}} </th>
					<th style="background-color: lightblue;">Date: {{$item->created_at}} </th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<!--2D-->
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
					<!-- 3D -->
					<td>3D :</td>
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
					<!--12-->
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
				<!--end-->
			</tbody>
		</table>	
	    @endforeach

	</div>
    </div>
	<!--End Left Section-->

	<!--Right Section Start-->
	<div class="col-sm-3" style="background-color: rgb(13, 94, 13);">
	<h4 style="background-color: red ; color:white;" class="text-center">ALL RESULT</h4>
	<div id="right-side-content">
	<!--Looping through DATA-->
		@foreach ($arr2 as $item)	
			<h5 style="color: aliceblue;" class="border text-center" >ID: {{$item->draw_id}}</h5>
			<!--2D-->
				@if($item->data_two == Null)
					<p style="color: aliceblue;">2D: <span class="badge two-animate-1 right-badge"></span><span class="badge two-animate-2 right-badge"></span></p>
				@else
					<p style="color: aliceblue;">2D: 
						<?php   
							$digits = str_split($item->data_two);
						?>
						@foreach($digits as $digit)
							<span class="badge right-badge">{{$digit}}</span>
						@endforeach
					</p>
				@endif
			<!--3D-->
				@if($item->data_three == Null)
				<p style="color: aliceblue;">3D: <span class="badge three-animate-1 right-badge"></span><span class="badge three-animate-2 right-badge"></span><span class="badge three-animate-3 right-badge"></p>
				@else
				<p style="color: aliceblue;">3D: 
				<?php   
				$digits = str_split($item->data_three);
				?>
				@foreach($digits as $digit)
				<span class="badge right-badge">{{$digit}}</span>
				@endforeach
				</p>
				@endif
			<!--12-->
			<p style="color: aliceblue;">12: <span class="badge right-badge">{{$item->data_twelve}}</span></p>	
			<hr>
		@endforeach
	</div>
    </div> 	
	<!--Right Section End-->

	</div>
	</div>

</body>
</html>


<!---Scripts--->
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
    // Event received now do your own logic accordingly
    channel.bind('my-event', function(data) {

    	console.log('* Data Received *');
    	console.log('* Loading .... *');
		// Left Side
		$.ajax({
          type: "GET",
          url:"{{url('get-data')}}",
          dataType: "json",
          success: function(response) {
			resp = response;
			$('#all-content').html('');
			$('#right-side-content').html('');
			// Content
			$.each(resp.left_data,function(i,v){
				$('#all-content').append('<table class="table table-bordered">'+
	            '<thead><tr class="table-info"><th style="width: 150px;background-color: lightblue;">ID:'+v.draw_id+'</th>'+
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
			// END //

			// RIGHT SIDE
			$.each(resp.right_data,function(i,v){			
			$('#right-side-content').append('<h5 style="color: aliceblue;" class="border text-center" >ID: '+v.draw_id+'</h5>'+
				'<p style="color: aliceblue;" id="data-right-two-'+v.id+'">2D:</p>'+
				'<p style="color: aliceblue;" id="data-right-three-'+v.id+'">3D: </p>'+
				'<p style="color: aliceblue;" id="data-right-twelve-'+v.id+'">12: </p>');
						
			// 2D
			let text1 = v.data_two;
			if(!text1){
				$('#data-right-two-'+v.id).append('<span class="badge two-animate-1 right-badge"></span><span class="badge two-animate-2 right-badge"></span>');	
				animateTwoD();
			}else{
				text1 = text1.toString();
				myArray = text1.split("");
				myArray.forEach((element) => {
					$('#data-right-two-'+v.id).append('<span class="badge right-badge">'+ element +'</span>');
				});
			}	
			// 3D
			let txt1 = v.data_three;
			if(!txt1){
				$('#data-right-three-'+v.id).append('<span class="badge three-animate-1 right-badge"></span><span class="badge three-animate-2 right-badge"></span><span class="badge three-animate-3 right-badge">');	
					animateThreeD();
			}else{
				txt1 = txt1.toString();
				myArray = txt1.split("");
				myArray.forEach((element) => {
					$('#data-right-three-'+v.id).append('<span class="badge right-badge">'+ element +'</span>');
				});
			}
			// Data 1 to 12
			let twelve = v.data_twelve;
			twelve = twelve.toString();
			$('#data-right-twelve-'+v.id).append('<span class="badge right-badge">'+twelve+'</span>');
			//
			});

	        // END //
         }
        });





    });
    
  </script>