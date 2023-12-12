var currentTab = 0;
              document.addEventListener("DOMContentLoaded", function(event) {


              showTab(currentTab);
             
              });

              function showTab(n) {
              var x = document.getElementsByClassName("tabpk");
              x[n].style.display = "block";
              if (n == 0) {
            document.getElementById("prvoisformpk").style.display = "block"
              document.getElementById("prevBtnpk").style.display = "none";
              } else {
                document.getElementById("prvoisformpk").style.display = "none"
              document.getElementById("prevBtnpk").style.display = "inline";
              }
              if (n == (x.length - 1)) {
              document.getElementById("nextBtnpk").innerHTML = '<i class="fa fa-angle-double-right"></i>';
              } else {
              document.getElementById("nextBtnpk").innerHTML = '<i class="fa fa-angle-double-right"></i>';
              }
              fixStepIndicator(n)
              }

              function nextPrevpk(n) {
              var x = document.getElementsByClassName("tabpk");
              if (n == 1 && !validateForm()) return false;
              x[currentTab].style.display = "none";
              currentTab = currentTab + n;
              if (currentTab >= x.length) {
                window.open("home.html","_self");
              
              document.getElementById("nextpreviouspk").style.display = "none";
              document.getElementById("all-steps").style.display = "none";
              document.getElementById("register").style.display = "none";
              document.getElementById("text-message").style.display = "block";
             

             


              }
             
              showTab(currentTab);
             
              }
           
              function validateForm() {
                   var x, y, i, valid = true;
                   x = document.getElementsByClassName("tabpk");
                   y = x[currentTab].getElementsByTagName("input");
                 
                   for (i = 0; i < y.length; i++) {
                   
                       if (y[i].value == "") {
                           y[i].className1 += " invalid";
                           valid = false;
                           
                       }
                      
                     
                   }
             
                  
                   return valid;
                 
               
               }
             
             
           
              