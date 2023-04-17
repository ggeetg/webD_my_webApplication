window.jsPDF = window.jspdf.jsPDF;
var doc = new jsPDF();

 function saveDiv(divId, title) {
 doc.html('<html><head><title>${title}</title></head><body>' + document.getElementById(divId).innerHTML + '</body></html>');
 doc.save('Report.pdf');
}

function printDiv(divId,
  title) {

  let mywindow = window.open('', 'PRINT', 'height=650,width=900,top=100,left=150');
 var div=document.getElementById(divId);
 var cdiv = div.cloneNode(true);
  mywindow.document.write(`<html><head><title>${title}</title>`);
  mywindow.document.write('<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"></head><body >');
  mywindow.document.body.appendChild(cdiv);
  mywindow.document.write('</body></html>');

  mywindow.document.close(); // necessary for IE >= 10
  mywindow.focus(); // necessary for IE >= 10*/

  setTimeout(function(){
    mywindow.print();
  },1000);
  //mywindow.close();

  return true;
}
