
/* FOR SWICTHING BETWWEN PANEL IN emp_profile.php*/ 
function openpanel(index,btn) {
  var i;
  var x = document.getElementsByClassName("emp_profile_section2 ");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  document.getElementById(index).style.display = "block";

  var j;
  var z = document.getElementsByClassName("emp_profile_section1_btn ");
  for (j = 0; j < z.length; j++) {
    z[j].style.background = "#345587";
    z[j].style.color = "#fff";
  }
  document.getElementById(btn).style.background = "#fff";
  document.getElementById(btn).style.color = "#345587";

  
  
}


$(document).on('click','button',function(){
  $(this).addClass('active').siblings().removeClass('active');
});




function opentab(index) {
  var i;
  var x = document.getElementsByClassName("emp_profile_section2_tab ");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  document.getElementById(index).style.display = "block";

  $(document).on('click','button',function(){
    $(this).addClass('active').siblings().removeClass('active');
  });
  
}




function openpanel2(index) {
  var i;
  var x = document.getElementsByClassName("emp_profile_tab2");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  document.getElementById(index).style.display = "block";

  $(document).on('click','button',function(){
    $(this).addClass('active').siblings().removeClass('active');
  });
  
}


//for printing


