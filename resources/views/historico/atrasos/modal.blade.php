<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1"
 id="modal-delete-{{$info->id}}">

 	{{Form::Open(array('action'=>array('historicoAtrasoController@destroy',$info->id),'method'=>'delete'))}}
 		<div class="modal-dialog">
 			<div class="modal-content">
 				<div class="modal-header">
 					<button type="button" class="close" data-dismiss="modal"
 					arial-label= "Close">
 						<span aria-hiden="true">x</span>
 					</button>
 					<h4 class="modal-title">Desactivar Empreasa</h4>
 				</div>
 				<div class="modal-body">
 					<p>Confirme si desea eliminar el atraso</p>
 				</div>
 				<div class="modal-footer">
 					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
 					<button type="submit" class="btn btn-primary" >Confirmar</button>
 				</div>
 			</div>
 		</div>
 	{{Form::Close()}}
	
</div>