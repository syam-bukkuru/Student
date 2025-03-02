
$("document").ready(function(){
  $("#hidingone").hide();
   $("#facdetailspage").hide();
   $("#stddetailspage").hide();
   $("#addbranchpage").hide();
   $("#stddelspage").hide();
   $("#facdelspage").hide();
   $("#students").hide();
       
  $("#sam").click(function(){
   $("#hidingone").toggle(300);
  });
  
    $("#facadd").click(function(){
         $("#facdetailspage").toggle(300);
         $("#stddetailspage").hide(300);
         $("#stddelspage").hide(300);
         $("#facdelspage").hide(300);
         $("#addbranchpage").hide(300);
         $("#students").hide(300);
          });
  
   
     $("#stdadd").click(function(){
         $("#stddetailspage").toggle(300);
         $("#facdetailspage").hide(300);
         $("#stddelspage").hide(300);
         $("#facdelspage").hide(300);
         $("#addbranchpage").hide(300);
         $("#students").hide(300);
          });
          
    $("#addbranch").click(function(){
         $("#addbranchpage").toggle(300);			
         $("#facdetailspage").hide(300);
         $("#stddelspage").hide(300);
         $("#facdelspage").hide(300);
         $("#students").hide(300);
         $("#stddetailspage").hide(300);
          });
          
    $("#stddel").click(function(){
         $("#stddelspage").toggle(300);			
         $("#facdetailspage").hide(300);
         $("#stddetailspage").hide(300);
         $("#facdelspage").hide(300);
         $("#addbranchpage").hide(300);
         $("#students").hide(300);	
          });
          
          
    $("#facdel").click(function(){
         $("#facdelspage").toggle(300);			
         $("#facdetailspage").hide(300);
         $("#stddelspage").hide(300);
         $("#stddetailspage").hide(300);
         $("#addbranchpage").hide(300);				
            $("#students").hide(300);
          });
    $("#viewstu").click(function(){
         $("#students").toggle(300);			
         $("#facdetailspage").hide(300);
         $("#stddelspage").hide(300);
         $("#stddetailspage").hide(300);
         $("#addbranchpage").hide(300);	
         $("#facdelspage").hide(300);
       
          });
 
 });
     
 