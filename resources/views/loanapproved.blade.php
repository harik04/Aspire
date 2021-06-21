<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
           <div>
		   <fieldset>
  <div>
   
	<p style="color:blue;font-size:20px;"> <b>Congratulations {{ strtoupper(session('username'))}} your loan have been approved, Please fill the below form</b></p>
   <form action="{{URL::to('api/payment')}}" class="form-horizontal" id="validation-form" method="post" role="form" >
   @csrf
  
  <p>
    <label>Sanctioned Amount (in Rupees)</label><br>
    <input type="number" name="sanctionAmount" id="sanctionAmount" value="{{ Session::get('sanctionAmount')}}" required disabled>
  </p>
  <p>
	<label for="payment">Enter Amount for Weekly Payment</label>
	 <input type="number" name="weeklyamountpayment" id="weeklyamountpayment" value='' required>
	 <label for="payment"></label>
	<input type="date" id="paymentdate" name="paymentdate" required>
	</p>
	<input type="hidden" value="{{session('userid')}}" name="uid">
      <button type="submit">Submit</button>
	
</form>

  </div>
</fieldset>

        </div>
    </body>
</html>
