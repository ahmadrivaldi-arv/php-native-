<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="icon" href="../static/img/icon-404.png" type="image/icon">
    <title>Access Denied</title>

    <script>

        var time_left = 5;

        function countdown(){
            time_left--;
            document.getElementById('countdown').innerHTML = String(time_left);

            if(time_left > 0){
                setTimeout(countdown,1000)
            }else if(time_left == 0){
                window.location.href = "../../";
            }
        }
        setTimeout(countdown,1000);
    
    </script>
</head>
<body>
    <div class="container">
        <div class="row vh-100 d-flex justify-content-center align-items-center">
            <div class="col-md-7 col-lg-5">
                <h3 class="text-center">ACCESS FORBIDDEN | 403</h3>
                <p class="tex-center">You're not logged in,You will redirect in <span id="countdown">5</span></p>
            </div>
        </div>
    </div>
</body>
</html>