<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Home</title>
    <style>
        *{margin:0;padding:0;}
        html,body{width:100%;height:100%}
    </style>
</head>
<body>
    <main style="width:100%;height:100%;display:flex;justify-content:center;align-items: center;background-color:#2b74e2;">
        <section id="container" style="background-color:#f0f0f0;height:50%;width:40%;color:#2b74e2;display: flex;align-items: center;justify-content: center;border-radius: 10px;box-shadow: 0px 2px 6px #fff;">
            <h1 style="color:green;font-size:30px">You are in safe mode</h1>
        </section>
    </main>
    <button onclick="trigger()" id="btn" style="border:none;position:fixed;bottom:20px;right:20px;font-size: 22px;background-color: #f0f0f0;color:#2b74e2;padding:10px;border-radius: 10px;">Demo Trigger</button>

    <script>
        function safe(){
            document.getElementById("btn").style.display="none"
            container = document.getElementById("container");
            container.innerHTML=`
            <h1 style="color:green;font-size:30px">You are in safe mode</h1>
            `
        }
        function trigger(){
            document.getElementById("btn").style.display="none"
            container = document.getElementById("container");
            container.innerHTML=`
            <section style="display:flex;flex-direction:column;align-items:center">
                <h1 id="time" style="font-size:60px;color:red">10</h1>
                <div style="margin-top:40px">
                    <button onclick="safe()" style="padding:10px;color:#ffffff;background-color:green;border:none;font-size:26px;border-radius:10px">I'm Safe</button>
                </div>
            </section>
            `
            var i =10;
            function play() {
                var audio = new Audio('https://media.geeksforgeeks.org/wp-content/uploads/20190531135120/beep.mp3');
                audio.play();
            }
            var timer = setInterval(() => {
                if(i>0){
                    time = document.getElementById("time")
                    time.innerHTML=i
                    i--;
                    play()
                }else{
                    container = document.getElementById("container");
                    if (navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition(showPosition);
                        function showPosition(position) {
                            fetch("/user/api.php?lat="+position.coords.latitude+"&lan="+position.coords.longitude)
                            .then((res)=>{
                                if(res.status==200){
                                    console.log(res.body);
                                    container.innerHTML=`
                                    <section style="display:flex;flex-direction:column;align-items:center">
                                        <h1 id="time" style="font-size:60px;color:green">Alert Sended!</h1>
                                    </section>
                                    `
                                }else{
                                    container.innerHTML=`
                                    <section style="display:flex;flex-direction:column;align-items:center">
                                        <h1 id="time" style="font-size:60px;color:red">Network Error!</h1>
                                    </section>
                                    `
                                }
                            })
                        }
                    } else {
                        container.innerHTML=`
                        <section style="display:flex;flex-direction:column;align-items:center">
                            <h1 id="time" style="font-size:60px;color:red">Geolocation is not supported by this browser.</h1>
                        </section>
                        `
                    }
                    clearInterval(timer)
                }
            }, 1000);
        }
    </script>
</body>
</html>