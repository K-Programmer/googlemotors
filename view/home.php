<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="refresh" content="1000">
  <title>Google Motors</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="../css/style.css">
  <!--jQuery-->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light " style="background-color: #18BC9C;">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="../imgs/logo-01.png">


      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active text-white" aria-current="page" href="#">Você não pode comprar felicidade, mas você pode comprar um carro.</a>
          </li>


        </ul>
        <form class="d-flex">
          <input class="form-control me-2" type="search" id="pesquisa" placeholder="ex: BMW" aria-label="Search">
          <button class="btn btn-outline-success" id="pesquisar" type="submit">Pesquisar</button>
        </form>
      </div>
    </div>
  </nav>

  <p class=" mt-5 temas ms-1"><strong class="temas"><i class="bi bi-plus-circle-fill"></i> NOVO CARRO</strong></p>
  <!--------- Edit----->
  <div class="container-fluid card  ">

  </div>

  <div class="container-fluid   mt-2  ">

    <div class="container-fluid  ">
      <div class="row row-cols-2 ">
        <div class="col ">

          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label"><i class="bi bi-building"></i> Marca</label>
            <input type="text" class="form-control" id="marca" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">ex: BMW , Mercedes , Porche etc...</div>
          </div>

        </div>
        <div class="col">
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label"><i class="bi bi-symmetry-vertical"></i> Modelo</label>
            <input type="text" class="form-control" id="modelo" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">ex: I4 , Cabrio , X2 etc...</div>
          </div>

        </div>
        <div class="col">
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label"><i class="bi bi-calendar-event"></i> Ano</label>
            <input type="text" class="form-control" id="ano" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">ex: 2021 , 2002, 2005 etc...</div>
          </div>

        </div>
        <div class="col">

          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label"><i class="bi bi-cash-coin"></i> Preco</label>
            <input type="text" class="form-control" id="preco" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">ex: 210000.00</div>
          </div>
        </div>

        <div class="col">

          <div class="row row-cols-auto">
            <div class="col"><button type="button" id="save" class="btn btn-success"><i class="bi bi-plus-circle-dotted"></i> Adicionar</button></div>
            <div class="col"><button type="button" id="update" class="btn btn-success"><i class="bi bi-pencil-square"></i> Actualizar</button></div>
            <div class="col"><button type="button" id="delete" class="btn btn-success"><i class="bi bi-trash"></i> Eliminar</button></div>

          </div>
        </div>


      </div>
    </div>


  </div>

  </div>
  <div class="container-fluid card  mt-3 ">


    <table id="carros" class="table table-striped table-bordered table-hover" width="100%">
      <thead>
        <tr>
          <th>ID</th>
          <th>Marca</th>
          <th>Modelo</th>
          <th>Ano</th>
          <th>Preco</th>
          <th>Op 1</th>
        </tr>
      </thead>
      <tbody id="tabldata"></tbody>
    </table>



    <!----------------------------------Script----------------------->


    <!-----------preencher tabela-------------->
    <script type="text/javascript">
   $.ajax({
              method: 'GET',
              url: "/googlemotors/view/controller/all.php",
              
            }).done(function(rs) {

              // var result =data; 
              var data = JSON.parse(rs);
              console.log(data);





              $('#marca').val('');
              $('#modelo').val('');
              $('#ano').val('');
              $('#preco').val('');

              //------------------------------------------------


      

              var carros = $('#carros tbody');
              carros.empty();

              for (var i = 0; i < data.length; i++) {

                var id = data[i].cid;
                var marca = data[i].marca;
                var modelo = data[i].modelo;
                var ano = data[i].ano;
                var preco = data[i].preco;


                carros.append('<tr><td class="cid">' + id + '</td><td class="marca">' + marca + '</td><td class="modelo">' + modelo +
                  '</td><td class="ano">' + ano + '</td><td class="preco">' + preco + '</td>' +
                  '<td><button type="button" class="btSelecionar btn btn-sm btn-danger text-white" data-toggle="modal" data-target="#editModal">' + 'selecionar' + '</button>' + '</td></tr>');



              }

              //Selecionar-----------------------
              $(".btSelecionar").click(function() {
                var $row = $(this).closest("tr"); // Find the row
                var $cid = $row.find(".cid").text(); // Find the text
                var $marca = $row.find(".marca").text(); // Find the text
                var $modelo = $row.find(".modelo").text(); // Find the text
                var $ano = $row.find(".ano").text(); // Find the text
                var $preco = $row.find(".preco").text(); // Find the text

                $('#marca').val($marca);
                $('#modelo').val($modelo);
                $('#ano').val($ano);
                $('#preco').val($preco);
                // Let's test it out
                selecionado = $cid;
                alert(selecionado);
              });

            })

  </script>

    <!----------- FIM  preencher tabela-------------->











<!----------- ADD UPDATE DELETE-------------->
    <script type="text/javascript">
      var selecionado;
      $(function() {
        $("#save").on('click', function() {


          var marca = $("#marca").val();
          var modelo = $("#modelo").val();
          var ano = $("#ano").val();
          var preco = $("#preco").val();



          if (marca == '' || modelo == '' || ano == '' || preco == '') {

            Swal.fire({
              position: 'center',
              icon: 'error',
              title: 'Por favor, preencha todos campos',
              showConfirmButton: false,
              timer: 1500
            })

            event.preventDefault();

          } else {



            $.ajax({
              method: 'POST',
              url: "/googlemotors/view/controller/carroDAO.php",
              data: {
                "marca": marca,
                "modelo": modelo,
                "ano": ano,
                "preco": preco
              },

            }).done(function(rs) {

              // var result =data; 
              var data = JSON.parse(rs);
              console.log(data);




              Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Carro adicionado com sucessso',
                showConfirmButton: false,
                timer: 1500
              })

              $('#marca').val('');
              $('#modelo').val('');
              $('#ano').val('');
              $('#preco').val('');

              //------------------------------------------------


      

              var carros = $('#carros tbody');
              carros.empty();

              for (var i = 0; i < data.length; i++) {

                var id = data[i].cid;
                var marca = data[i].marca;
                var modelo = data[i].modelo;
                var ano = data[i].ano;
                var preco = data[i].preco;


                carros.append('<tr><td class="cid">' + id + '</td><td class="marca">' + marca + '</td><td class="modelo">' + modelo +
                  '</td><td class="ano">' + ano + '</td><td class="preco">' + preco + '</td>' +
                  '<td><button type="button" class="btSelecionar btn btn-sm btn-danger text-white" data-toggle="modal" data-target="#editModal">' + 'selecionar' + '</button>' + '</td></tr>');



              }

              //Selecionar-----------------------
              $(".btSelecionar").click(function() {
                var $row = $(this).closest("tr"); // Find the row
                var $cid = $row.find(".cid").text(); // Find the text
                var $marca = $row.find(".marca").text(); // Find the text
                var $modelo = $row.find(".modelo").text(); // Find the text
                var $ano = $row.find(".ano").text(); // Find the text
                var $preco = $row.find(".preco").text(); // Find the text

                $('#marca').val($marca);
                $('#modelo').val($modelo);
                $('#ano').val($ano);
                $('#preco').val($preco);
                // Let's test it out
                selecionado = $cid;
                alert(selecionado);



              });








            })
          }

        })


        //actualizar------------------------
        $("#update").on('click', function() {


var marca = $("#marca").val();
var modelo = $("#modelo").val();
var ano = $("#ano").val();
var preco = $("#preco").val();



if (marca == '' || modelo == '' || ano == '' || preco == '') {

  Swal.fire({
    position: 'center',
    icon: 'error',
    title: 'Por favor, preencha todos campos',
    showConfirmButton: false,
    timer: 1500
  })

  event.preventDefault();

} else {



  $.ajax({
    method: 'POST',
    url: "/googlemotors/view/controller/update.php",
    data: {
      "marca": marca,
      "modelo": modelo,
      "ano": ano,
      "preco": preco,
      "cid":selecionado
    },

  }).done(function(rs) {

    // var result =data; 
    var data = JSON.parse(rs);
    console.log(data);




    Swal.fire({
      position: 'center',
      icon: 'success',
      title: 'Carro actualizado com sucessso',
      showConfirmButton: false,
      timer: 1500
    })

    $('#marca').val('');
    $('#modelo').val('');
    $('#ano').val('');
    $('#preco').val('');

    //------------------------------------------------




    var carros = $('#carros tbody');
    carros.empty();

    for (var i = 0; i < data.length; i++) {

      var id = data[i].cid;
      var marca = data[i].marca;
      var modelo = data[i].modelo;
      var ano = data[i].ano;
      var preco = data[i].preco;


      carros.append('<tr><td class="cid">' + id + '</td><td class="marca">' + marca + '</td><td class="modelo">' + modelo +
        '</td><td class="ano">' + ano + '</td><td class="preco">' + preco + '</td>' +
        '<td><button type="button" class="btSelecionar btn btn-sm btn-danger text-white" data-toggle="modal" data-target="#editModal">' + 'selecionar' + '</button>' + '</td></tr>');



    }

    //Selecionar-----------------------
    $(".btSelecionar").click(function() {
      var $row = $(this).closest("tr"); // Find the row
      var $cid = $row.find(".cid").text(); // Find the text
      var $marca = $row.find(".marca").text(); // Find the text
      var $modelo = $row.find(".modelo").text(); // Find the text
      var $ano = $row.find(".ano").text(); // Find the text
      var $preco = $row.find(".preco").text(); // Find the text

      $('#marca').val($marca);
      $('#modelo').val($modelo);
      $('#ano').val($ano);
      $('#preco').val($preco);
      // Let's test it out
      selecionado = $cid;
      alert(selecionado);



    });








  })
}

})
//-----FIm update


        //Apagar---------------------------------------------------------------------------------------------

        $("#delete").on('click', function() {

          $.ajax({
            method: 'POST',
            url: "/googlemotors/view/controller/delete.php",
            data: {
              "cid": selecionado
            },

          }).done(function(rs) {

            // var result =data; 
            var data = JSON.parse(rs);
            alert("entreieee");




            Swal.fire({
              position: 'center',
              icon: 'success',
              title: 'Carro eliminado',
              showConfirmButton: false,
              timer: 1500
            })

            $('#marca').val('');
            $('#modelo').val('');
            $('#ano').val('');
            $('#preco').val('');


            //------------------------------------------------




            var carros = $('#carros tbody');
            carros.empty();

            for (var i = 0; i < data.length; i++) {

              var id = data[i].cid;
              var marca = data[i].marca;
              var modelo = data[i].modelo;
              var ano = data[i].ano;
              var preco = data[i].preco;


              carros.append('<tr><td class="cid">' + id + '</td><td class="marca">' + marca + '</td><td class="modelo">' + modelo +
                '</td><td class="ano">' + ano + '</td><td class="preco">' + preco + '</td>' +
                '<td><button type="button" class="btSelecionar btn btn-sm btn-danger text-white" data-toggle="modal" data-target="#editModal">' +'<i class="bi bi-pin-fill">'+'</i>'+ 'selecionar' + '</button>' + '</td></tr>');



            }

            //selecionar-----------------------
            $(".btSelecionar").click(function() {
              var $row = $(this).closest("tr"); // Find the row
              var $cid = $row.find(".cid").text(); // Find the text
              var $marca = $row.find(".marca").text(); // Find the text
              var $modelo = $row.find(".modelo").text(); // Find the text
              var $ano = $row.find(".ano").text(); // Find the text
              var $preco = $row.find(".preco").text(); // Find the text

              $('#marca').val($marca);
              $('#modelo').val($modelo);
              $('#ano').val($ano);
              $('#preco').val($preco);
              // Let's test it out
              selecionado = $cid;
              alert(selecionado);



            });








          })





        })
        //----fim apagar


        //Pesquuisar---------------------------------------------------------------------------------------------

        $("#pesquisa").keyup(function() {

          var pesquisa = $("#pesquisa").val();
        



            $.ajax({
              method: 'POST',
              url: "/googlemotors/view/controller/search.php",
              data: {
                "marca": pesquisa
              },

            }).done(function(rs) {

              // var result =data; 
              var data = JSON.parse(rs);
              console.log(data);



              //-----------------------------------------------


              var carros = $('#carros tbody');
              carros.empty();

              for (var i = 0; i < data.length; i++) {

                var id = data[i].cid;
                var marca = data[i].marca;
                var modelo = data[i].modelo;
                var ano = data[i].ano;
                var preco = data[i].preco;


                carros.append('<tr><td class="cid">' + id + '</td><td class="marca">' + marca + '</td><td class="modelo">' + modelo +
                  '</td><td class="ano">' + ano + '</td><td class="preco">' + preco + '</td>' +
                  '<td><button type="button" class="btSelecionar btn btn-sm btn-danger text-white" data-toggle="modal" data-target="#editModal">' + 'selecionar' + '</button>' + '</td></tr>');



              }

              //selecionar-----------------------
              $(".btSelecionar").click(function() {
                var $row = $(this).closest("tr"); // Find the row
                var $cid = $row.find(".cid").text(); // Find the text
                var $marca = $row.find(".marca").text(); // Find the text
                var $modelo = $row.find(".modelo").text(); // Find the text
                var $ano = $row.find(".ano").text(); // Find the text
                var $preco = $row.find(".preco").text(); // Find the text

                $('#marca').val($marca);
                $('#modelo').val($modelo);
                $('#ano').val($ano);
                $('#preco').val($preco);
                // Let's test it out
                selecionado = $cid;
                alert(selecionado);



              });








            })

        



        })
        //----fim pesquisar



      });
    </script>

    <!----------- FIM ADD UPDATE DELETE-------------->

</body>

</html>