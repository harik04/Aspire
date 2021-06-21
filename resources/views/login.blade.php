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
  
  
   <form action='Approval' class="form-horizontal" id="validation-form" method="post" role="form" >
   
  <p>
    <label>Name</label><br>
    <input type="text" name="name" value="HARISH" required disabled> 
  </p>
 
  <p>
    <label>Amount Required (in Rupees)</label><br>
    <input type="number" name="AmtRequired" id="AmtRequired" value='100000' required>
  </p>
 
  <p>
    <label>Loan Term</label><br>
    <select id="loanTerm" name="loanTerm">
      <option value='1'>1</option>
      <option value='1'>2</option>
      <option value='3'>3</option>
     
    </select>
  </p>
 
  <p>
   
    <button type="submit">Approve</button>
</form>
  </div>
</fieldset>

        </div>
    </body>
</html>
