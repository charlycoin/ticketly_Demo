<!--Codigo ingresado por Carlos Bejarano -->
<?php
    $projects =mysqli_query($con, "select * from project");
    $priorities =mysqli_query($con, "select * from priority");
    $statuses =mysqli_query($con, "select * from status");
    $kinds =mysqli_query($con, "select * from kind");
    $asesores = mysqli_query($con, "select * from asesor");
    $categories =mysqli_query($con, "select * from category");
?>
    <div class="modal fade bs-example-modal-lg-upd" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Editar datos del cliente</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal form-label-left input_mask" id="upd_cliente" name="upd_cliente">
                        <div id="result_cliente"></div>
                        
                        <input type="hidden" id="mod_id_cliente" name="mod_id_cliente">
                        
                         <!--<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback"> -->
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <input name="Nit" id="mod_Nit" type="text" class="form-control" required>
                                <span class="fa fa-signal form-control-feedback right" aria-hidden="true"></span>
                        </div>
                        <!--Aqui termina -->
                        <!--<input type="hidden" id="mod_id" name="mod_id"> -->
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <input name="name_Empresa" id="mod_name_Empresa" type="text" class="form-control" required>
                            <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <input name="name_Representante" id="mod_name_Representante" type="text" class="form-control" required>
                            <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                        
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <input name="telefono" id="mod_telefono" type="text" class="form-control" required>
                            <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                        </div>
                        
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <input name="email" id="mod_email" type="text" class="form-control has-feedback-left" required>
                            <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <input name="Fecha_Ini_Contrato" id="mod_Fecha_Ini_Contrato" type="date" class="form-control">
                            <span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
                        </div>
                        <!--Aqui termina -->
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <input name="Fecha_Fin_Contrato" id="mod_Fecha_Fin_Contrato" type="date" class="form-control">
                                <span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <select class="form-control" name="asigned_id" id="mod_asigned_id">
                                    <option selected="" value="">-- Cambiar Asesor de soporte --</option>
                                  <?php foreach($asesores as $p):?>
                                    <option value="<?php echo $p['id']; ?>"><?php echo $p['name']; ?></option>
                                  <?php endforeach; ?>
                                </select>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-34 form-group has-feedback">
                                <!-- <input name="Observaciones" required type="text" class="form-control" placeholder="Observaciones" required> -->
                                <textarea name="Observaciones" id="mod_Observaciones" type="text" class="form-control"></textarea>
                                <span class="required" aria-hidden="true"></span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <input name="Fecha_Ini_Servicio" id="mod_Fecha_Ini_Servicio" type="date" class="form-control">
                                <span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <input name="Fecha_Fin_Servicio" id="mod_Fecha_Fin_Servicio" type="date" class="form-control">
                                <span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <select class="form-control" required name="status_cliente" id="mod_status_cliente">
                                    <option value="" selected>-- Selecciona estado --</option>
                                    <option value="1" >Activo</option>
                                    <option value="0" >Inactivo</option>  
                            </select>
                        </div>
                        <!--<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">Contraseña<span class="required">*</span>
                            </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="password" id="password" name="password" class="form-control col-md-7 col-xs-12">
                                <p class="text-muted">La contraseña solo se modificara si escribes algo, en caso contrario no se modifica.</p>
                            </div>
                        </div> -->
                       <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                  <button id="upd_data" type="submit" class="btn btn-success">Actualizar</button>
                                  <!--  <input type="submit" class="btn btn-success" value="Guardar">  -->
                                  <input type="reset" class="btn btn-success" value="Borrar"/> 
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                  
                                </div>
                            </div>                             
                    </form>
                </div>
                <!-- <div class="modal-footer"> -->
                        
                    <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button> -->
                <!-- </div> -->
            </div>
        </div>
    </div> <!-- /Modal -->
    <!--Aqui termina -->