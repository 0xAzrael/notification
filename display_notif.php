<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications</title>
</head>
<body>
    <h1>Notifications</h1>
    <div id="notifications">
        <?php include 'functions/fetch_notif.php'; ?>
    </div>

    <script>
        
        setInterval(function() {
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                document.getElementById("notifications").innerHTML = this.responseText;
            }
            xhttp.open("GET", "functions/fetch_notif.php", true);
            xhttp.send();
        }, 5000); 
    </script>
</body>
</html>
