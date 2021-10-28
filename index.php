$.ajax({
                    method: 'POST',
                    url:"/googlemotors/view/controller/delete.php",
                    data: { "cid":$cid},
                    
                  }) .done(function( rs ) { 

                  // var result =data; 
                  var data =JSON.parse(rs);
            alert("entreieee");
                 
   
 

  Swal.fire({
  position: 'center',
  icon: 'success',
  title: 'Carro eliminado',
  showConfirmButton: false,
  timer: 1500
})


//------------------------------------------------




var carros = $('#carros tbody');
      carros.empty();

for (var i = 0; i< data.length; i++) {

var  id  = data[i].cid;
var marca = data[i].marca;
var modelo = data[i].modelo;
var ano = data[i].ano;
var preco = data[i].preco;


carros.append('<tr><td class="cid">'+ id +'</td><td>'+ marca +'</td><td>'+ modelo +
'</td><td>'+ ano +'</td><td>'+ preco +'</td>'
+'<td><button type="button" class="btApagar btn btn-sm btn-danger text-white" data-toggle="modal" data-target="#editModal">' + 'Apagar' + '</button>' + '</td></tr>');



}


     

      

   
  
})