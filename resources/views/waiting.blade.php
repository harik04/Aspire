<!DOCTYPE html>
<html lang="en">
  <head>
	
    <title>Processing...</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<style>
        #loader {
            border: 12px solid #f3f3f3;
            border-radius: 50%;
            border-top: 12px solid #444444;
            width: 70px;
            height: 70px;
            animation: spin 1s linear infinite;
        }
          
        @keyframes spin {
            100% {
                transform: rotate(360deg);
            }
        }
          
        .center {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            margin: auto;
        }
    </style>
  </head>
  <body>
  <div id="loader" class="center"></div>
  
  </body>
  <script>
	document.onreadystatechange = function() {
            if (document.readyState !== "complete") {
                document.querySelector(
                  "body").style.visibility = "hidden";
                document.querySelector(
                  "#loader").style.visibility = "visible";
            } else {
                document.querySelector(
                  "#loader").style.display = "none";
                document.querySelector(
                  "body").style.visibility = "visible";
            }
        };
  
      $(document).ready(function() {
		$.ajaxSetup({
			headers: { 'requestToken': "{{$data['requestToken']}}" }
		});  
		setTimeout(
		 $.ajax({
          url: "{{URL::to('api/getApproval')}}",
          type: "POST",
		 data: {
			 "_token": "{{ csrf_token() }}",
			 "id":"{{$data['uid']}}",
			 "amountrequired":"{{$data['amountrequired']}}",
			 "loanTerm":"{{$data['loanTerm']}}",
			 "username":btoa("{{$data['username']}}"),
			 },
         dataType: 'JSON',
		   success: function(result) {
			  // console.log(result);
            if(typeof result ==='object' && result.authorized === true)
			{
				//Loan is Approved, kindly enter weekly payments..
				//window.location.href =  "{{URL::to('/')}}";
				// redirect to profile page with al these parameters 
				window.location.href = 			
				"{{ URL::to('/LoanApproved') }}/"+result.authorized+'/'+result.isApproved+'/'+result.amountrequired;
				
				//window.location.href = 	"{{ URL::to('LoanApproved') }}?authorized="+result.authorized+'&isApproved='+result.isApproved+'&amountRequired='+result.amountrequired;
			}
			
          },
          error: function(error) {
			alert("Some Error has occured , kindly re-login");
			window.location.href =  "{{URL::to('/')}}";
          }
        }),		
		
		5000);
       
      });
    </script>
  
</html>