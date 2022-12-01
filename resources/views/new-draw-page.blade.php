<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Swing Project</title>
	<script src="https://js.pusher.com/7.2/pusher.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://camloto.azurewebsites.net/lib/bootstrap/dist/css/bootstrap.min.css" />
	<link rel="stylesheet" href="https://camloto.azurewebsites.net//css/site.css?v=svpxAfbUtclzQSLfrYxhQObswDFGVmd54UrZ8fbErh0" />
	<link rel="stylesheet" href="/SignalR.styles.css?v=ULhmyqupAYY_WtGaEbTPG4ndTjKstG3x23ujlh2SAbU" />
	<script src="https://kit.fontawesome.com/7603579037.js" crossorigin="anonymous"></script>
	<link href="https://fonts.googleapis.com/css2?family=Koh+Santepheap:wght@300&display=swap" rel="stylesheet">
	<style>
	body {
		all: unset;
	}
	.choosen{
		background-color: red;
		color: white;
	}
	</style>
</head>

<body style="background-color: rgb(69, 69, 73);background-image: none;">
	<header style="display:none;">
		<nav b-o3x0qkhyr3 class="navbar navbar-expand-sm navbar-toggleable-sm navbar-light bg-white border-bottom box-shadow mb-3">
			<div b-o3x0qkhyr3 class="container"> <a class="navbar-brand" href="">SignalR</a>
				<button b-o3x0qkhyr3 class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target=".navbar-collapse" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span b-o3x0qkhyr3 class="navbar-toggler-icon"></span> </button>
				<div b-o3x0qkhyr3 class="navbar-collapse collapse d-sm-inline-flex justify-content-between">
					<ul b-o3x0qkhyr3 class="navbar-nav flex-grow-1">
						<li b-o3x0qkhyr3 class="nav-item"> <a class="nav-link text-dark" href="">Home</a> </li>
						<li b-o3x0qkhyr3 class="nav-item"> <a class="nav-link text-dark" href="/Privacy">Privacy</a> </li>
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<div b-o3x0qkhyr3 class="container">
		<main b-o3x0qkhyr3 role="main" class="pb-3">
			<header>
				<input type="hidden" value="" id="hdUsername" />
				<div class="div-popup" id="div_printpopup" style="display:none;">
					<div class="div-popup-detail" id="div_printdetail">
						<div style="text-align:center">
							<input type="button" value="?????????" onclick="startdisplaygame()" class="button-start" /> </div>
					</div>
				</div>
				<div class="div-popup" id="div_popup_drawing" style="background:none;display:none;">
					<div class="div-popup-drawingdetail" id="div_popup_drawingdetail">
						<div class="big-loto" id="div_loto"></div>
					</div>
				</div>
				<div class="dropdown show-lg" style="display:none;">
					<button type="button" class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown"> <span name="span_lang">English</span> <span class="caret"></span> </button>
					<ul class="dropdown-menu pull-right" role="menu" aria-labelledby="dropdownMenu1">
						<li lang="en" role="presentation"> <a role="menuitem" tabindex="-1" href="javascript:void(0);" lang="en" onclick="changeLang(this)">English</a> </li>
						<li lang="khmer" role="presentation"> <a role="menuitem" tabindex="-1" href="javascript:void(0);" lang="khmer" onclick="changeLang(this)">Khmer</a> </li>
					</ul>
					<p class="version">3.1130</p>
				</div>
				<div id="menuL1" class="menu-container" style="display:none;">
					<button id="navbarToggle" type="button" class="menu-nav-toggle"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
					<div id="menuGroup" class="menu-group">
						<ul>
							<li id="menuL1Home" url="./?_a=main&amp;cmd=home" class="">Home</li>
							<li id="menuL1Lotto639" url="./?_a=main&amp;cmd=lotto639">Lotto 6/39</li>
							<li id="menuL1Lotto649" url="./?_a=main&amp;cmd=lotto649">Lotto 6/49</li>
							<li id="menuL1Lotto18" url="./?_a=main&amp;cmd=lotto18">Lotto 18</li>
							<li id="menuL1Lotto27" url="./?_a=main&amp;cmd=lotto27">Lotto 27</li>
							<li id="menuL1Lotto4D" url="./?_a=main&amp;cmd=lotto4d">Lotto 4D</li>
							<li id="menuL1Lotto90" url="./?_a=main&amp;cmd=lotto90" class="selected">Lotto 90</li>
							<li id="menuL1ScratchCard" url="./?_a=main&amp;cmd=scratchCard">Scratch Card</li>
							<li id="menuL1About" url="./?_a=main&amp;cmd=about">About</li>
							<li id="lg_language" class="hidden-lg lg-language"><span>Language</span>
								<ul>
									<li lang="en"><a href="javascript:void(0);" lang="en" onclick="changeLang(this)">English</a></li>
									<li lang="khmer"><a lang="khmer" onclick="changeLang(this)">Khmer</a></li>
								</ul>
							</li>
							<li id="lg_version" class="hidden-lg lg-version">3.1130</li>
						</ul>
					</div>
				</div>
			</header>
			<section class="page-root">
				<div class="page-container">
					<article id="article_main" class="article-main lotto-90">
						<div class="split-main custom-main">
							<div class="result-area main-top overflow-hidden">
								<div class="title-detail">
									<div class="logo-line"> <span class="logo-title" style="display:none;"><span style="color:white;">CAM</span><span style="color:#c67819"> LOTTO</span>
										<br>
										</span>
									</div> <span class="font-style-3" style="display:none;"><a href="javascript: void(0);" onclick="LottoInst.goRule()">Rules &gt;&gt;</a></span> </div>
								<div class="margin-top-35 clearfix">
									<div id="div_gameinfo" class="game-info"> </div>
									<div class="right-column">
										<div>
											<div class="lotto-close-time">
												<div id="div_timer" class="Time"> </div>
											</div>
										</div>
									</div>
									<div class="lotto-result left-column">
										<div id="div_resultinfo"><span class="font-style-2" id="draw-id"></span> <span id="top_date" class="font-style-2">Date : {{$date}}</span> <span id="time" class="font-style-2">15</span> </div>
										<div class="lotto-special clearfix">
											<div></div>
											<div class="lotto-special-list" id="my-draw">
												<div class="lotto-special-num">
													<div class="span-result-letter" style="background-color: green;">A</div> <span id="span_result1"></span> </div>
												<div class="lotto-special-num">
													<div class="span-result-letter" style="background-color: green;">B</div> <span id="span_result2"></span> </div>
												<div class="lotto-special-num">
													<div class="span-result-letter" style="background-color: green;">C</div> <span id="span_result3"></span> </div>
												<div class="lotto-special-num">
													<div class="span-result-letter" style="background-color: green;">D</div> <span id="span_result4"></span> </div>
												<div class="lotto-special-num">
													<div class="span-result-letter" style="background-color: green;">E</div> <span id="span_result5"></span> </div>
											</div>
										</div>
										<div id="top_special_x" class="special-x special-x-left" style="display:none;">
											<div>Special X</div>
											<div class="x-group">
												<div class="special-x-bg">
													<div class="x-title">U</div>
													<div class="x-content">
														<p>Under 15~227</p>
													</div>
												</div>
												<div class="special-x-bg">
													<div class="x-title">O</div>
													<div class="x-content">
														<p>Odd</p>
													</div>
												</div>
												<div class="special-x-bg">
													<div class="x-title">UO</div>
													<div class="x-content">
														<p>Under Odd</p>
													</div>
												</div>
												<div class="special-x-bg">
													<div class="x-title">R2</div>
													<div class="x-content">
														<p>2nd 161~200</p>
													</div>
												</div>
												<div class="special-x-bg">
													<div class="x-title">S3</div>
													<div class="x-content">
														<p>&gt;=09</p>
													</div>
												</div>
												<div class="special-x-bg">
													<div class="x-title">B1</div>
													<div class="x-content">
														<p>&lt;=82</p>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="lotto-number" id="div_numbers">
									<ul id="top_result">
										<li id="top_result_1" class="green">1</li>
										<li id="top_result_2" class="green">2</li>
										<li id="top_result_3" class="green">3</li>
										<li id="top_result_4" class="green">4</li>
										<li id="top_result_5" class="green">5</li>
										<li id="top_result_6" class="green">6</li>
										<li id="top_result_7" class="green">7</li>
										<li id="top_result_8" class="green">8</li>
										<li id="top_result_9" class="green">9</li>
										<li id="top_result_10" class="green">10</li>
										<li id="top_result_11" class="green">11</li>
										<li id="top_result_12" class="green">12</li>
										<li id="top_result_13" class="green">13</li>
										<li id="top_result_14" class="green">14</li>
										<li id="top_result_15" class="green">15</li>
										<li id="top_result_16" class="green">16</li>
										<li id="top_result_17" class="green">17</li>
										<li id="top_result_18" class="green">18</li>
										<li id="top_result_19" class="green">19</li>
										<li id="top_result_20" class="green">20</li>
										<li id="top_result_21" class="green">21</li>
										<li id="top_result_22" class="green">22</li>
										<li id="top_result_23" class="green">23</li>
										<li id="top_result_24" class="green">24</li>
										<li id="top_result_25" class="green">25</li>
										<li id="top_result_26" class="green">26</li>
										<li id="top_result_27" class="green">27</li>
										<li id="top_result_28" class="green">28</li>
										<li id="top_result_29" class="green">29</li>
										<li id="top_result_30" class="green">30</li>
										<li id="top_result_31" class="green">31</li>
										<li id="top_result_32" class="green">32</li>
										<li id="top_result_33" class="green">33</li>
										<li id="top_result_34" class="green">34</li>
										<li id="top_result_35" class="green">35</li>
										<li id="top_result_36" class="green">36</li>
										<li id="top_result_37" class="green">37</li>
										<li id="top_result_38" class="green">38</li>
										<li id="top_result_39" class="green">39</li>
										<li id="top_result_40" class="green">40</li>
										<li id="top_result_41" class="green">41</li>
										<li id="top_result_42" class="green">42</li>
										<li id="top_result_43" class="green">43</li>
										<li id="top_result_44" class="green">44</li>
										<li id="top_result_45" class="green">45</li>
										<li id="top_result_46" class="green">46</li>
										<li id="top_result_47" class="green">47</li>
										<li id="top_result_48" class="green">48</li>
										<li id="top_result_49" class="green">49</li>
										<li id="top_result_50" class="green">50</li>
										<li id="top_result_51" class="green">51</li>
										<li id="top_result_52" class="green">52</li>
										<li id="top_result_53" class="green">53</li>
										<li id="top_result_54" class="green">54</li>
										<li id="top_result_55" class="green">55</li>
										<li id="top_result_56" class="green">56</li>
										<li id="top_result_57" class="green">57</li>
										<li id="top_result_58" class="green">58</li>
										<li id="top_result_59" class="green">59</li>
										<li id="top_result_60" class="green">60</li>
										<li id="top_result_61" class="green">61</li>
										<li id="top_result_62" class="green">62</li>
										<li id="top_result_63" class="green">63</li>
										<li id="top_result_64" class="green">64</li>
										<li id="top_result_65" class="green">65</li>
										<li id="top_result_66" class="green">66</li>
										<li id="top_result_67" class="green">67</li>
										<li id="top_result_68" class="green">68</li>
										<li id="top_result_69" class="green">69</li>
										<li id="top_result_70" class="green">70</li>
										<li id="top_result_71" class="green">71</li>
										<li id="top_result_72" class="green">72</li>
										<li id="top_result_73" class="green">73</li>
										<li id="top_result_74" class="green">74</li>
										<li id="top_result_75" class="green">75</li>
										<li id="top_result_76" class="green">76</li>
										<li id="top_result_77" class="green">77</li>
										<li id="top_result_78" class="green">78</li>
										<li id="top_result_79" class="green">79</li>
										<li id="top_result_80" class="green">80</li>
										<li id="top_result_81" class="green">81</li>
										<li id="top_result_82" class="green">82</li>
										<li id="top_result_83" class="green">83</li>
										<li id="top_result_84" class="green">84</li>
										<li id="top_result_85" class="green">85</li>
										<li id="top_result_86" class="green">86</li>
										<li id="top_result_87" class="green">87</li>
										<li id="top_result_88" class="green">88</li>
										<li id="top_result_89" class="green">89</li>
										<li id="top_result_90" class="green">90</li>
										<li id="top_result_91" class="green">91</li>
										<li id="top_result_92" class="green">92</li>
										<li id="top_result_93" class="green">93</li>
										<li id="top_result_94" class="green">94</li>
										<li id="top_result_95" class="green">95</li>
										<li id="top_result_96" class="green">96</li>
										<li id="top_result_97" class="green">97</li>
										<li id="top_result_98" class="green">98</li>
										<li id="top_result_99" class="green">99</li>
									</ul>
								</div>
								<div id="top_win_info" class="lotto-ticket-detail" style="display:none;">
									<div class="cup-icon"></div>
									<div class="ticket-detail">
										<div class="prize-pool"><span>Prize Pool : </span><span>0 KHR</span></div>
										<div class="center-line"></div>
										<div class="ticket-win"><span>Ticket Win (0) : </span></div>
									</div>
								</div>
							</div>
							<div class="split-line"></div>
							<div class="recent-area">
								<h1 class="recent-title">RESULT</h1>
								<div id="div_result_list" class="recent-list">
									<div class="recent-area" id="all-past-result">
									@forEach($items as $item)	
										<!----->
										<div class="recent-item">
											<p><span style="margin-right: 15px">Draw Id : {{$item->draw_id}}</span></p>
											<div class="special">
												<div class="special-abcde">
													<span>{{$item->a}}</span>
													<span>{{$item->b}}</span>
													<span>{{$item->c}}</span>
													<span>{{$item->d}}</span>
													<span>{{$item->e}}</span>
											    </div>
											</div>
										</div>
										<!----->  
									@endforeach	
								    </div>
								</div>
							</div>
					</article>
					</div>
			</section>
			<footer> </footer>
			<div class="container">

			<!--Manage Audio-->
			<audio id="audioplayer_notice" controls="controls" style="display: none;">
			<source type="audio/wav" src="https://camloto.azurewebsites.net/Audio/winning.wav">	
			</audio>
			<input id="hdGameID" type="hidden" value="0">
			<input id="hdServer" type="hidden" value="0">
			<!--Manage Audio-->	

		<script>
			var myTimer;
			// Timer Logic
			var fivteenMin = 60 * 15; // 15 mins ( you can change accordingly)
			display = $('#time');
			startTimer(fivteenMin, display);
			// Timer Funtion
			function startTimer(duration, display) {
				var timer ;
				timer = 0 ;
				var timer = duration, minutes, seconds;
				myTimer = setInterval(function () {
				console.log(timer);
				minutes = parseInt(timer / 60, 10)
				seconds = parseInt(timer % 60, 10);
				minutes = minutes < 10 ? "0" + minutes : minutes;
				seconds = seconds < 10 ? "0" + seconds : seconds;
				display.text(minutes + ":" + seconds);
				if(timer < 10){
					// start playing sound in last 10 seconds
					document.getElementById('audioplayer_notice').play();
				}

				// Timer Completion
				if (--timer < 0) {

					clearInterval(myTimer);
					$('#time').text('Waiting ....');
					$('.green').css({"background-color": "#6fc00f", "color": "#fff"});
					$('#my-draw').html('<div class="lotto-special-num">\
					<div class="span-result-letter" style="background-color: green;">A</div> <span id="span_result1"></span> </div>\
					<div class="lotto-special-num">\
					<div class="span-result-letter" style="background-color: green;">B</div> <span id="span_result2"></span> </div>\
					<div class="lotto-special-num">\
					<div class="span-result-letter" style="background-color: green;">C</div> <span id="span_result3"></span> </div>\
					<div class="lotto-special-num">\
					<div class="span-result-letter" style="background-color: green;">D</div> <span id="span_result4"></span> </div>\
					<div class="lotto-special-num">\
					<div class="span-result-letter" style="background-color: green;">E</div> <span id="span_result5"></span> </div>\
					');

					animateNumbers();
				
				}

				}, 1000);
			} //end-function
		</script>	

		<script>

			var totalShipped = 99;
			var shippedDisplay = 0;
		    var shippedStep = totalShipped / (2 * 1000 / 100); // Animation duration 2 sec
			function animateNumbers() {
				if (shippedDisplay > totalShipped)
				shippedDisplay = totalShipped;
		
				$("#span_result1").html(Math.round(shippedDisplay));
				$("#span_result2").html(Math.round(shippedDisplay));
				$("#span_result3").html(Math.round(shippedDisplay));
				$("#span_result4").html(Math.round(shippedDisplay));
				$("#span_result5").html(Math.round(shippedDisplay));

				if(shippedDisplay == 99){
				shippedDisplay = 0;
				}
				if (shippedDisplay < totalShipped) {
					shippedDisplay += shippedStep;
					setTimeout(animateNumbers, 50);
				}
			}

			// Enable pusher logging - don't include this in production
			Pusher.logToConsole = true;
			var pusher = new Pusher('afbb2d4713581f829256', {cluster: 'ap2'});
			var channel = pusher.subscribe('my-channel');
			// Event received now do your own logic accordingly
			channel.bind('my-event', function(data) {
				console.log(data);

				console.log('** DATA RECEIVED **');
				// play sound
		        document.getElementById('audioplayer_notice').play();
				// Set Draw Id Data
				$('#draw-id').text('Draw ID : '+ data.draw_id); // draw id
				$('#my-draw').html('');
				$('#my-draw').html('<div class="lotto-special-num">\
				<div class="span-result-letter" style="background-color: green;">A</div> <span>'+data.a+'</span> </div>\
				<div class="lotto-special-num">\
				<div class="span-result-letter" style="background-color: green;">B</div> <span>'+data.b+'</span> </div>\
				<div class="lotto-special-num">\
				<div class="span-result-letter" style="background-color: green;">C</div> <span>'+data.c+'</span> </div>\
				<div class="lotto-special-num">\
				<div class="span-result-letter" style="background-color: green;">D</div> <span>'+data.d+'</span> </div>\
				<div class="lotto-special-num">\
				<div class="span-result-letter" style="background-color: green;">E</div> <span>'+data.e+'</span> </div>\
				');
				// Set Numbers color
				$('#top_result_'+data.a).css({"background-color": "red", "color": "white"});
				$('#top_result_'+data.b).css({"background-color": "red", "color": "white"});
				$('#top_result_'+data.c).css({"background-color": "red", "color": "white"});
				$('#top_result_'+data.d).css({"background-color": "red", "color": "white"});
				$('#top_result_'+data.e).css({"background-color": "red", "color": "white"});

                // Reset Time
				$('#time').text('');
				var fivteenMin = 60 * 15; // 15 mins ( you can change accordingly)
				display = $('#time');
				startTimer(fivteenMin, display);
				// Get Data
				$.ajax({
				type: "GET",
				url:"{{url('get-data')}}",
				dataType: "json",
				success: function(response) {
					resp = response;
					console.log(resp);
					$('#all-past-result').html('');
					// Past Draw Data on right side
					$.each(resp.past_draw,function(i,v){
					$('#all-past-result').append('<div class="recent-item">\
						<p><span style="margin-right: 15px">Draw Id :'+v.draw_id+'</span></p>\
						<div class="special">\
							<div class="special-abcde">\
								<span>'+v.a+'</span>\
								<span>'+v.b+'</span>\
								<span>'+v.c+'</span>\
								<span>'+v.d+'</span>\
								<span>'+v.e+'</span>\
							</div>\
						</div>\
					</div>');
					});
				}	
				});
			
			});
		</script>

			<input id="hdServer" type="hidden" value="0" /> </div>
			<script src="/js/signalr/dist/browser/signalr.js"></script>
			<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
			<script src="/js/client_timer.js?v=7"></script>
			<script src="/js/display.js?v=9"></script>
			<link href="https://camloto.azurewebsites.net/css/mycss.css?v=5" rel="stylesheet" />
			<link href="https://camloto.azurewebsites.net/css/changeful.css?v=5" rel="stylesheet" />
			<link href="https://camloto.azurewebsites.net/css/changeless.css?v=2" rel="stylesheet" />
			<link href="https://camloto.azurewebsites.net/css/display.css?v=1" rel="stylesheet" /> </main>
		</div>
		<footer b-o3x0qkhyr3 class="border-top footer text-muted" style="display:none;">
			<div b-o3x0qkhyr3 class="container"> &copy; 2021 - SignalR - <a href="/Privacy">Privacy</a> </div>
		</footer>
		<script src="/lib/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
		<script src="/js/site.js?v=4q1jwFhaPaZgr8WAUSrux6hAuh0XDg9kPS3xIVq36I0"></script>

</body>

</html>