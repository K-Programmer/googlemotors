<script type="text/javascript">
    var selectedCar;
    $(function() {


      /* ----------------------Save Vehicle-------------------- */
      $("#save").on("click", function() {
        var brand = $("#brand").val();
        var model = $("#model").val();
        var motor = $("#motor").val();
        var year = $("#year").val();
        var mileage = $("#mileage").val();
        var price = $("#price").val();

        if (brand == "" || model == "" || motor == "" || year == "" || mileage == "" || price == "") {
          Swal.fire({
            position: "center",
            icon: "error",
            title: "Por favor, preencha todos campos!",
            showConfirmButton: false,
            timer: 1500,
          });

          event.preventDefault();
        } else {

          $.ajax({
            method: 'POST',
            url: "/parqueamento/view/controller/insert.php",
            data: {
              "brand": brand,
              "model": model,
              "motor": motor,
              "year": year,
              "mileage": mileage,
              "price": price
            },
          }).done(function(rs) {
            var data = JSON.parse(rs);
            console.log(data);

            Swal.fire({
              position: "center",
              icon: "success",
              title: "Viatura adicionada com sucessso",
              showConfirmButton: false,
              timer: 1500,
            });

            $("#brand").val("");
            $("#model").val("");
            $("#motor").val("");
            $("#year").val("");
            $("#mileage").val("");
            $("#price").val("");

            var carros = $('#myTable tbody');
            carros.empty();

            for (var i = 0; i < data.length; i++) {

              var id = data[i].id;
              var brand = data[i].brand;
              var model = data[i].model;
              var motor = data[i].motor;
              var year = data[i].year;
              var mileage = data[i].mileage;
              var price = data[i].price;

              carros.append('<tr><td class="id">' + id +
                '</td><td class="brand">' + brand +
                '</td><td class="model">' + model +
                '</td><td class="motor">' + motor +
                '</td><td class="year">' + year +
                '</td><td class="mileage">' + mileage +
                '</td><td class="price">' + price +
                '</td><td><button type="button" class="editCar btn btn-sm text-white" data-toggle="modal" data-target="#editModal">' + '<span class="iconify-inline editCar" data-icon="ci:edit" style="color: gray;" data-width="24" data-height="24"></span>' + '</button>' + '</td></tr>'
              );
            }

            //Selecionar-----------------------
            $(".editCar").click(function() {
              var $row = $(this).closest("tr"); // Find the row
              var $id = $row.find(".id").text(); // Find the text
              var $brand = $row.find(".brand").text(); // Find the text
              var $model = $row.find(".model").text(); // Find the text
              var $motor = $row.find(".motor").text(); // Find the text
              var $year = $row.find(".year").text(); // Find the text
              var $mileage = $row.find(".mileage").text(); // Find the text
              var $price = $row.find(".price").text(); // Find the text

              $('#brand').val($brand);
              $('#model').val($model);
              $('#motor').val($motor);
              $('#year').val($year);
              $('#mileage').val($mileage);
              $('#price').val($price);
              // Let's test it out

              selectedCar = $id;
              alert(selectedCar);



            });








})
}

})

      /* ----------------------Update Vehicle-------------------- */

      $("#saveChanges").on('click', function() {

        var brand = $("#brand").val();
        var model = $("#model").val();
        var motor = $("#motor").val();
        var year = $("#year").val();
        var mileage = $("#mileage").val();
        var price = $("#price").val();



        if (brand == "" || model == "" || motor == "" || year == "" || mileage == "" || price == "") {

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
            url: "/parqueamento/view/controller/update.php",
            data: {
              "brand": brand,
              "model": model,
              "motor": motor,
              "year": year,
              "mileage": mileage,
              "price": price,
              "id": selectedCar
            },

          }).done(function(rs) {

            var data = JSON.parse(rs);
            console.log(data);

            Swal.fire({
              position: 'center',
              icon: 'success',
              title: 'Viatura acctualizada com sucessso',
              showConfirmButton: false,
              timer: 1500
            })

            $("#brand").val("");
            $("#model").val("");
            $("#motor").val("");
            $("#year").val("");
            $("#mileage").val("");
            $("#price").val("");

            var carros = $('#myTable tbody');
            carros.empty();

            for (var i = 0; i < data.length; i++) {

              var id = data[i].id;
              var brand = data[i].brand;
              var model = data[i].model;
              var motor = data[i].motor;
              var year = data[i].year;
              var mileage = data[i].mileage;
              var price = data[i].price;

              carros.append('<tr><td class="id">' + id +
                '</td><td class="brand">' + brand +
                '</td><td class="model">' + model +
                '</td><td class="motor">' + motor +
                '</td><td class="year">' + year +
                '</td><td class="mileage">' + mileage +
                '</td><td class="price">' + price +
                '</td><td><button type="button" class="editCar btn btn-sm text-white" data-toggle="modal" data-target="#editModal">' + '<span class="iconify-inline editCar" data-icon="ci:edit" style="color: gray;" data-width="24" data-height="24"></span>' + '</button>' + '</td></tr>'
              );

            }
            //Selecionar-----------------------
            $(".editCar").click(function() {
              var $row = $(this).closest("tr"); // Find the row
              var $id = $row.find(".id").text(); // Find the text
              var $brand = $row.find(".brand").text(); // Find the text
              var $model = $row.find(".model").text(); // Find the text
              var $motor = $row.find(".motor").text(); // Find the text
              var $year = $row.find(".year").text(); // Find the text
              var $mileage = $row.find(".mileage").text(); // Find the text
              var $price = $row.find(".price").text(); // Find the text

              $('#brand').val($brand);
              $('#model').val($model);
              $('#motor').val($motor);
              $('#year').val($year);
              $('#mileage').val($mileage);
              $('#price').val($price);
              // Let's test it out

              selectedCar = $id;
              alert(selectedCar);

            });








})
}

})



      /* ----------------------Delete Vehicle-------------------- */

      $("#delete").on('click', function() {

        $.ajax({
          method: 'POST',
          url: "/parqueamento/view/controller/delete.php",
          data: {
            "id": selectedCar
          },

        }).done(function(rs) {

          // var result =data; 
          var data = JSON.parse(rs);





          Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Viatura eliminada com sucesso!',
            showConfirmButton: false,
            timer: 1500
          })

          $("#brand").val("");
          $("#model").val("");
          $("#motor").val("");
          $("#year").val("");
          $("#mileage").val("");
          $("#price").val("");

          var carros = $('#myTable tbody');
          carros.empty();

          for (var i = 0; i < data.length; i++) {

            var id = data[i].id;
            var brand = data[i].brand;
            var model = data[i].model;
            var motor = data[i].motor;
            var year = data[i].year;
            var mileage = data[i].mileage;
            var price = data[i].price;

            carros.append('<tr><td class="id">' + id +
              '</td><td class="brand">' + brand +
              '</td><td class="model">' + model +
              '</td><td class="motor">' + motor +
              '</td><td class="year">' + year +
              '</td><td class="mileage">' + mileage +
              '</td><td class="price">' + price +
              '</td><td><button type="button" class="editCar btn btn-sm text-white" data-toggle="modal" data-target="#editModal">' + '<span class="iconify-inline editCar" data-icon="ci:edit" style="color: gray;" data-width="24" data-height="24"></span>' + '</button>' + '</td></tr>'
            );
          }

          /* ----------------------Select Vehicle-------------------- */
          $(".editCar").click(function() {
              var $row = $(this).closest("tr"); // Find the row
              var $id = $row.find(".id").text(); // Find the text
              var $brand = $row.find(".brand").text(); // Find the text
              var $model = $row.find(".model").text(); // Find the text
              var $motor = $row.find(".motor").text(); // Find the text
              var $year = $row.find(".year").text(); // Find the text
              var $mileage = $row.find(".mileage").text(); // Find the text
              var $price = $row.find(".price").text(); // Find the text

              $('#brand').val($brand);
              $('#model').val($model);
              $('#motor').val($motor);
              $('#year').val($year);
              $('#mileage').val($mileage);
              $('#price').val($price);
              // Let's test it out

              selectedCar = $id;
              alert(selectedCar);



            });








})





})
//----fim apagar



//sssss------------

$("#search").keyup(function() {

var searched = $("#search").val();

  $.ajax({
    method: 'POST',
    url: "/parqueamento/view/controller/delete.php",
    data: { "brand": searched},

  }).done(function(rs) {


    var data = JSON.parse(rs);
    console.log(data);

    var carros = $('#myTable tbody');
          carros.empty();

          for (var i = 0; i < data.length; i++) {

            var id = data[i].id;
            var brand = data[i].brand;
            var model = data[i].model;
            var motor = data[i].motor;
            var year = data[i].year;
            var mileage = data[i].mileage;
            var price = data[i].price;


            carros.append('<tr><td class="id">' + id +
              '</td><td class="brand">' + brand +
              '</td><td class="model">' + model +
              '</td><td class="motor">' + motor +
              '</td><td class="year">' + year +
              '</td><td class="mileage">' + mileage +
              '</td><td class="price">' + price +
              '</td><td><button type="button" class="editCar btn btn-sm text-white" data-toggle="modal" data-target="#editModal">' + '<span class="iconify-inline editCar" data-icon="ci:edit" style="color: gray;" data-width="24" data-height="24"></span>' + '</button>' + '</td></tr>'
            );


    }

    /* ----------------------Select Vehicle-------------------- */
    $(".editCar").click(function() {
              var $row = $(this).closest("tr"); // Find the row
              var $id = $row.find(".id").text(); // Find the text
              var $brand = $row.find(".brand").text(); // Find the text
              var $model = $row.find(".model").text(); // Find the text
              var $motor = $row.find(".motor").text(); // Find the text
              var $year = $row.find(".year").text(); // Find the text
              var $mileage = $row.find(".mileage").text(); // Find the text
              var $price = $row.find(".price").text(); // Find the text

              $('#brand').val($brand);
              $('#model').val($model);
              $('#motor').val($motor);
              $('#year').val($year);
              $('#mileage').val($mileage);
              $('#price').val($price);
              // Let's test it out

              selectedCar = $id;
              alert(selectedCar);

           
              });








            })

        



        })
        //----fim actualizar



      })
    </script>