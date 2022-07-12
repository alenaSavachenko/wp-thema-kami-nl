<html>

<head> </head>

<body>
<style> 


		
		<!--Свойство flex   flex-grow flex-shrink flex-basis. -->
		
		
.block  {  }

.block-1 { background-color:DarkKhaki; flex-grow:0.5;}
.block-2 {background-color:Gainsboro; flex-grow:1; }
.block-3 {background-color:gray;   flex-grow:0.5;}

.parent-container { display:flex; flex-direction:column; height: 100vh;
 }

        .flex-container-front-page { display:flex; flex-wrap: wrap;  height:280px; width:100%; }

        .flex-child-fp {  border:2px solid blue; width: calc(2/3*100%);}
         /*  width: calc(2/3*100%);   */

        .flex-child-fp:nth-child(1) {
            background:url(https://picsum.photos/150/150) no-repeat center;
            background-size:cover;

            width: calc(1/3*100% - 10px);
        }

        .flex-child-fp:nth-child(2) {
            background:url(https://picsum.photos/350/150) no-repeat center;
            background-size:cover;

        }

        .flex-child-fp:nth-child(3) {
            background:       Chocolate;
        }


        .flex-child-fp:nth-child(4) {
            background:url(https://picsum.photos/150/150) no-repeat center;
            background-size:cover;

            width: calc(1/3*100% - 10px);
        }





</style>


<div class="parent-container" > 

<div class="block block-1">  


 </div>
<div class="block block-2">

     <div class="flex-container-front-page">
         <?php
         for ($x = 1; $x <= 4; $x++) {
             echo "
                  <div class='flex-child-fp'>
                   </div>"  ;
         }
         ?>
     </div>

<!--
     <div class="flex-container-front-page">
         <div class="flex-child-fp flex-child-fp-1"> </div>
         <div class="flex-child-fp flex-child-fp-2"> </div>
         <div class="flex-child-fp flex-child-fp-3"> </div>
         <div class="flex-child-fp flex-child-fp-4"> </div>
     </div>

-->

 </div>
<div class="block block-3"> </div>

</div>

</body>
</html>