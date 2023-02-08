
function SumaVales(){
    try{
        var a = parseInt(document.getElementById("val").
        value)|| 0,
            b= parseInt(document.getElementById("imp").
            value)|| 0;

            document.getElementById("total").value= (a*b);
    } catch (e){}
}   
function mejorada(){   
    try{
    var a=parseInt(document.getElementById("desde").value)||0,
        b= parseInt(document.getElementById("novales").value)||0;
    if(a<2){
        document.getElementById("hasta").value= (a+b)-2;
    }else{
        document.getElementById("hasta").value= (a+b)-1;
    }
}catch(e){}
}

document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('search-button').addEventListener('click', function() {
      // Obtener el valor del campo de entrada
      var searchValue = document.getElementById('search-input').value;
  
      // Obtener todas las filas de la tabla
      var rows = document.querySelectorAll('table tr');
  
      // Ocultar todas las filas
      rows.forEach(function(row) {
        row.style.display = 'none';
      });
  
      // Mostrar solo las filas que coinciden con la búsqueda
      rows.forEach(function(row) {
        var cells = row.querySelectorAll('td');
        for (var i = 0; i < cells.length; i++) {
          if (cells[i].textContent.indexOf(searchValue) !== -1) {
            row.style.display = '';
            break;
          }
        }
      });
    });
  });
  

