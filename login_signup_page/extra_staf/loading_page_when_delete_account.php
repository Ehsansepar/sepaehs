<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Loading Animation</title>
      <!-- <link rel="stylesheet" href="style.css"> -->
       <style>
        
        h1 {
            text-align: center;
            padding-bottom: 0px;
            margin-bottom: 0px;
        }

        body{
  margin: 0;
  padding: 0;
  font-family: montserrat;
  background: black;
}
.center{
  display: flex;
  text-align: center;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  top: 50px;
}
.ring{
  position: absolute;
  width: 300px;
  height: 300px;
  margin-top: 0px;
  border-radius: 50%;
  animation: ring 2s linear infinite;
}
@keyframes ring {
  0%{
    transform: rotate(0deg);
    box-shadow: 1px 5px 2px #e65c00;
  }
  50%{
    transform: rotate(180deg);
    box-shadow: 1px 5px 2px #18b201;
  }
  100%{
    transform: rotate(360deg);
    box-shadow: 1px 5px 2px #0456c8;
  }
}
.ring:before{
  position: absolute;
  content: '';
  left: 0;
  top: 0;
  height: 300px;
  width: 300px;
  border-radius: 50%;
  box-shadow: 0 0 5px rgba(255,255,255,.3);
}
span{
  color: #737373;
  font-size: 40px;
  font-weight: bold;
  text-transform: uppercase;
  letter-spacing: 1px;
  line-height: 200px;
  animation: text 3s ease-in-out infinite;
}
@keyframes text {
  50%{
    color: black;
  }
}


                @media only screen and (max-width: 500px) {
                          
                }
       </style>
   </head>
   <body>
    <h2 style="color: white;text-align: center">We are Deleting your Account</h1>
    <h2 style="color: white;text-align: center">Good Bye ;(</h1>
    <h1 style="text-align: center; visibility: hidden;">Counter</h1>
      <div class="center">
         <div class="ring"></div>
         <span>loading...</span>
      </div>

      <script>
                        let counter = document.querySelector('h1');
                        let count = 1;
                        setInterval(()=>{
                            counter.innerText = count;
                            count++
                            
                            if(count > 5) location.replace('../index.php')
                            
                        },1000)
      </script>

   </body>
</html>