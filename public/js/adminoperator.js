function operators() {
    var table = document.getElementById("wc_select").value;
    if (table == "Repair") {
       document.getElementById("f1").style.display = 'block';
       document.getElementById("f2").style.display = 'none';
       document.getElementById("f3").style.display = 'none';
   }
    else if(table == "Sample1"){
       document.getElementById("f1").style.display = 'none';
       document.getElementById("f2").style.display = 'block';
       document.getElementById("f3").style.display = 'none';
    }
    else if(table == "Sample2"){
        document.getElementById("f1").style.display = 'none';
        document.getElementById("f2").style.display = 'none';
        document.getElementById("f3").style.display = 'block';
     }
     else if(table == "N/A"){
        document.getElementById("f1").style.display = 'none';
        document.getElementById("f2").style.display = 'none';
        document.getElementById("f3").style.display = 'none';
     }
 }