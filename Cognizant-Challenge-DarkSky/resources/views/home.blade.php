<script src="https://cdn.jsdelivr.net/npm/vue"></script>

<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Dark Sky</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        
        <!-- Styles -->
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="/css/weather-icons.css"/>
       <link rel="stylesheet" type="text/css" href="/css/styles.css" />
    </head>
    <body class="{!!$type!!}-bg {!!$type!!}">
<!--         <div class="content">
			<a class="btn round {!!$type!!}-btn">Boulder Office</a>
			<a class="btn round {!!$type!!}-btn">India Office</a>
			<a class="btn round {!!$type!!}-btn">Dubai Office</a>
			<a class="btn round {!!$type!!}-btn">UK Office</a>
		</div> -->
        <div id="app" class="container {!!$type!!}" style="padding-top: 50px;">
        	<div class=" heading row content round">
    			<div>
    				<i class="{!!$icon_type!!}"></i>
    				<h2>{{$forecast->currently->summary}}</h2>
    				<div v-if="!celsius" class="subheading">
    					<h2>
    						@{{farenTemp}}&deg;F
    					</h2>
    					<a @click="celsius = !celsius" class="small-text {!!$type!!}">Convert to &deg;C</a>
    				</div>
    				<div v-else>
    					<h2>@{{celsiusTemp}}&deg;C</h2>
    					<a @click="celsius = !celsius" class="small-text">Convert to &deg;F</a>
    				</div>
    			</div>
    			<div class="content subheading">
    				<div class="col-sm-3">
						<b>Feels like: </b> 
    					<span v-if="!celsius">@{{farenFeelsTemp}}&deg;F</span>
    					<span v-else>@{{celsiusFeelsTemp}}&deg;C</span>	    					
					</div>
					<div class="col-sm-3">
						<b>Time</b> is @{{time}}		
					</div>
					<div class="col-sm-3">
						<b>Humidity</b> is {{$forecast->currently->humidity}}
					</div>
					<div class="col-sm-3">
						<b>Wind Speed</b> is {{$forecast->currently->windSpeed}}km/hr
					</div>
				</div>
			</div>
			
	        <h2 class="subheading">
	        	<span>Think the weather changes that quickly and want to <a href="{{url('home')}}" class="{!!$type!!}">check again?</a></span>
	        </h2>
<!-- 			<div class="content">
				<a class="btn round {!!$type!!}-btn" @click="minutely = !minutely">Over the next hour(by the minute)</a>
				<div class="row border-double" v-show="minutely" id="by-minute">
					<div class="col-sm-3">
						<b>After 15min</b>
					</div>
					<div class="col-sm-3">
						<b>After 30min</b>
					</div>
					<div class="col-sm-3">
						<b>After 45min</b>
					</div>
					<div class="col-sm-3">
						<b>After 60min</b>
					</div>
				</div>
			</div> -->
			
			<div class="content">
				<a class="btn round {!!$type!!}-btn" @click="hourly = !hourly">For today and tomorrow</a>
				<div class="row border-double" v-show="hourly" id="by-hour">
					<div class="subheading">
						{{$forecast->hourly->summary}}
					</div>
					<div class="col-sm-3">
						<b>{{$hourly['13']['time']}}</b>
						<br>
						<i class="{!! $hourly['13']['icon'] !!}"></i>
						<br>
						<span>{{$hourly['13']['summary']}}</span>
						<br>
						<span>{{$hourly['13']['temperature']}}&deg;F</span>
					</div>
					<div class="col-sm-3">
						<b>{{$hourly['25']['time']}}</b>
						<br>
						<i class="{!! $hourly['25']['icon'] !!}"></i>
						<br>
						<span>{{$hourly['25']['summary']}}</span>
						<br>
						<span>{{$hourly['25']['temperature']}}&deg;F</span>
					</div>
					<div class="col-sm-3">
						<b>{{$hourly['37']['time']}}</b>
						<br>
						<i class="{!! $hourly['37']['icon'] !!}"></i>
						<br>
						<span>{{$hourly['37']['summary']}}</span>
						<br>
						<span>{{$hourly['37']['temperature']}}&deg;F</span>
					</div>
					<div class="col-sm-3">
						<b>{{$hourly['48']['time']}}</b>
						<br>
						<i class="{!! $hourly['48']['icon'] !!}"></i>
						<br>
						<span>{{$hourly['48']['summary']}}</span>
						<br>
						<span>{{$hourly['48']['temperature']}}&deg;F</span>
					</div>
				</div>
			</div>
			
			<div class="content">
				<a class="btn round {!!$type!!}-btn" @click="weekly = !weekly">Over the next week(by day)</a>
				<div class="row border-double" v-show="weekly" id="by-week">
					<div class="col-sm-3">
						<b>Day 1</b>
					</div>
					<div class="col-sm-3">
						<b>Day 2</b>
					</div>
					<div class="col-sm-3">
						<b>Day 3</b>
					</div>
					<div class="col-sm-3">
						<b>Day 4</b>
					</div>
					<div class="col-sm-3 col-sm-offset-1">
						<b>Day 5</b>
					</div>
					<div class="col-sm-3">
						<b>Day 6</b>
					</div>
					<div class="col-sm-3">
						<b>Day 7</b>
					</div>
				</div>
			</div>
			
        </div>
    </body>
</html>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.27/vue.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
<script src="https://unpkg.com/vue-chartjs/dist/vue-chartjs.min.js"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>	
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
<!-- Latest compiled and minified CSS -->
<script>
    new Vue(
    {
    	el: "#app",
    	data:
    	{
    		minutely: false,
    		hourly: false,
    		weekly: false,
    		celsius: false,
    		farenTemp: {{$forecast->currently->temperature}},
    		farenFeelsTemp: Math.round({{$forecast->currently->apparentTemperature}})
    	},
    	computed:
    	{
    		celsiusTemp: function()
    		{
    			return ((this.farenTemp-32)*5/9).toFixed(2);
    		},
    		celsiusFeelsTemp: function()
    		{
    			return (Math.round((this.farenFeelsTemp-32)*5/9));
    		},
    		time: function()
    		{
    			var formattedTime = this.getTime({{$forecast->currently->time}});
    			return formattedTime;
    		}
    	},
    	methods:
    	{
    		getTime: function($time)
    		{
    			// multiplied by 1000 so that the argument is in milliseconds, not seconds.
				var date = new Date($time*1000);
				// Hours part from the timestamp
				var hours = date.getHours();
				// Minutes part from the timestamp
				var minutes = "0" + date.getMinutes();
				// Seconds part from the timestamp
				var seconds = "0" + date.getSeconds();

				// Will display time in 10:30:23 format
				var formattedTime = hours + ':' + minutes.substr(-2) + ':' + seconds.substr(-2);

				return formattedTime;

    		}
    	}
    })
</script>