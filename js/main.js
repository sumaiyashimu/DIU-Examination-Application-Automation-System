function check(){
  var iccode=document.getElementById("icc").value;
  var icname=document.getElementById("icn").value;
  var accode=document.getElementById("acc").value;
  var acname=document.getElementById("acname").value;
  var sem=document.getElementById("sem").value;
  var ssec=document.getElementById("section").value;

     
  if(sem==""){
    alert("Semister cannot be blank");
  }
  
   else if(iccode==""){
       alert("Improvement course code cannot be blank");
     
   }
    else if(icname=="") {
       alert("Improvement course name cannot be blank")
   }
   else if(accode==""){
     alert("Attend course code cannot be blank")
   }
   else if(acname==""){
    alert("Attend course name cannot be blank")
   }
   else if(ssec==""){
    alert("Section cannot be blank")
   }
   else{
           alert("you registation successful");
       }
   
  
   

}

