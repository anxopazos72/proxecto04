function showResult(str) {
  if (str.length==0) {
	document.getElementById("lecturas").innerHTML="";
	document.getElementById("lecturas").style.border="0px";
	return;
  }
  if (window.XMLHttpRequest) {
	// Navegadores actuales
	xmlhttp=new XMLHttpRequest();
  } else {  // Navegadores antiguos
	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
	if (this.readyState==4 && this.status==200) {
	  document.getElementById("lecturas").innerHTML=this.responseText;
	  document.getElementById("lecturas").style.border="1px solid #A5ACB2";
	}
  }
  xmlhttp.open("GET","/lecturas.php?q="+str,true);
  xmlhttp.send();
}