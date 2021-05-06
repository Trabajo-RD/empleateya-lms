// $('.get-data').click(function(){
//       var route = $('.create_form').attr('action'); // recupero la url de mi formulario -> localhost/miproyecto/public/agency/search
//       var url = $('#url').val(); // recupero el dato de mi input para enviar a buscar a mi controlador
     
//           $.ajax({
//             headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
//             method:'GET',
//             dataType: 'json',
//             url: '{{ route("creator.courses.microsoft.request") }}',
//             data: { 
//                 '_token' : $('input[name=_token]').val(),
//                 'url' : url
//                 }, //Aqui tienes que enviar el objeto json
//             success:function(result){
//                 console.log(result);
//                 $("#title").val(result["title"]);
//             },
//            error:function(error){
//               console.log('error');// solo ingresa a esta parte
//            }
//        });

// });