$(document).ready(function(){

	$('#ordenation').change(function(){
		

		var order = $(this).val();



		var request = $.ajax({

				method:"POST",
				url:"ajax.php",
				data:{data:order},
				dataType:"json"

		});


		request.done(function(e){

			var table = '<thead><tr><th class="text-center">Nível</th><th class="text-center">Música</th>  <th class="text-center">Banda</th>   <th class="text-center">Categoria</th><th class="text-center">Comentário</th> <th class="text-center">Ações</th></tr></thead><tbody>';

			for(var key in e){
				table += '<tr>';
				table += '<td class="text-center"> <a href="edit_music.php?id='+e[key].id_music+'" class="btn btn-md btn-primary" style="background-color:white; border: none;" >  <img src="public/'+e[key].name_level+'.png" class="img-responsive center-block"> </a> </td>';
				table += '<td class="text-center">'+e[key].name_music+'</td>';
				table += '<td class="text-center">'+e[key].name_band+'</td>';
				table += '<td class="text-center">'+e[key].name_category+'</td>'; 
				table += '<td class="text-center">'+e[key].comment_music+'</td>';
				table += '<td class="text-center"><a href="edit_music.php?id='+e[key].id_music+'" class="btn btn-md btn-primary"><span class="glyphicon glyphicon-edit"></span></a>   <button data-toggle="modal" data-target="#delete-music" value="'+e[key].id_music+'"  type="button" class="bt-delete btn btn-md btn-danger"><span class="glyphicon glyphicon-trash"></span></button> <a href="https://www.youtube.com/results?search_query='+e[key].name_band+'+'+e[key].name_music+'" target="_blank" class="btn btn-md btn-default" style="background-color:#9932CC; color:white"><span class="glyphicon glyphicon-play"></span></a> </td>';
				table += '</tr>';
			}

				table += '</tbody>';

				$('#data-table-music').html(table);

				

		});

	});


//para lista de espera

$('#ordenation-wait').change(function(){
		

		var order = $(this).val();



		var request = $.ajax({

				method:"POST",
				url:"ajax_wait.php",
				data:{data:order},
				dataType:"json"

		});


		request.done(function(e){

			var table = '<thead><tr><th class="text-center">Nível</th><th class="text-center">Música</th>  <th class="text-center">Banda</th>   <th class="text-center">Categoria</th><th class="text-center">Comentário</th> <th class="text-center">Ações</th></tr></thead><tbody>';

			for(var key in e){
				table += '<tr>';
				table += '<td class="text-center"> <a href="edit_music.php?id='+e[key].id_music+'" class="btn btn-md btn-primary" style="background-color:white; border: none;" >  <img src="public/'+e[key].name_level+'.png" class="img-responsive center-block"> </a> </td>';
				table += '<td class="text-center">'+e[key].name_music+'</td>';
				table += '<td class="text-center">'+e[key].name_band+'</td>';
				table += '<td class="text-center">'+e[key].name_category+'</td>'; 
				table += '<td class="text-center">'+e[key].comment_music+'</td>';
				table += '<td class="text-center"><a href="controller/control_change_level.php?id='+e[key].id_music+'" class="btn btn-md btn-warning"><span class="glyphicon glyphicon-cd"></span></a>  <a href="edit_music.php?id='+e[key].id_music+'" class="btn btn-md btn-primary"><span class="glyphicon glyphicon-edit"></span></a>   <button data-toggle="modal" data-target="#delete-music" value="'+e[key].id_music+'"  type="button" class="bt-delete btn btn-md btn-danger"><span class="glyphicon glyphicon-trash"></span></button>  <a href="https://www.youtube.com/results?search_query='+e[key].name_band+'+'+e[key].name_music+'" target="_blank" class="btn btn-md btn-default" style="background-color:#9932CC; color:white"><span class="glyphicon glyphicon-play"></span></a> </td>';
				table += '</tr>';
			}

				table += '</tbody>';

				$('#data-table-music-wait').html(table);

				

		});

	});




});

	


