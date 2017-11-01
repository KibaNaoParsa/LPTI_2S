<style>

	table {
  		border-collapse: collapse;
    	border-spacing: 0;
	   width: 100%;
    	border: 1px solid #ddd;
    	text-overflow: ellipsis;
	}

	th, td {
    	border: 1px solid black;
    	text-align: left;
    	padding: 8px;
    	text-overflow: ellipsis;
	}

	#check {text-align: center;}
	tr:nth-child(even){background-color: #f2f2f2;}

</style>

          <div id="page-wrapper">
              <div class="row">
                  <div class="col-lg-12">
                      <h1 class="page-header">Questionários</h1>
                  </div>
                  <!-- /.col-lg-12 -->
              </div>
              <!-- /.row -->
              <div class="row">
  		        	<div class="col-lg-12 col-md-12" id="btn">
							<?php		
								$atributos = array('name'=>'formulario_cadastro', 'id'=>'formulario_cadastro');
								$btn = array('name'=>'btn_cadastrar', 'id'=>'botao1', 'class'=>'btn btn-lg btn-success');
												
								echo form_open('Professor/resposta', $atributos).
									  form_hidden('idUSUARIO', $idUSUARIO);
									  
								foreach ($ALUNOS as $a) {
									echo form_hidden('idTURMA_ALUNO[]', $a->idALUNO);
								}							
							
								echo '<div style="overflow-x:scroll;">
  											<table>
    											<tr>
      											<th></th>';		
      						
      						foreach ($PERGUNTA_FECHADA as $pf) {
										echo '<th>'.$pf->PERGUNTA.'</th>';
								}
								echo '</tr>';
								
								foreach($ALUNOS as $a) {
									echo '<tr>';
									echo '<td>'.$a->NOME.'</td>';
									foreach ($PERGUNTA_FECHADA as $pf) {
										echo '<td id="check">'. form_checkbox("".$a->idALUNO."[]", $a->idALUNO.";".$pf->idPERGUNTA.";1", FALSE) .'</td>';									
									}
									echo '</tr>';
								}
								
								echo	'</table></div>';
										
								echo br().br();
								
								foreach($PERGUNTA_ABERTA as $pa) {
									echo form_hidden('idPERGUNTA[]', $pa->idPERGUNTA).
										  '<h2>'.form_label($pa->PERGUNTA, "txt_perguntaaberta").'</h2>'.br().
										  form_textarea('txt_respostaaberta[]').br().br();																	
								}
								
								
								echo form_submit('btn_cadastrar', 'Enviar', $btn).
								form_close();
								
							?>
				</div>
          </div>
          </div>
				</div>
			</div>


    <!-- jQuery -->
    <script src="{url}assets/js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{url}assets/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{url}assets/js/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="{url}assets/js/raphael.min.js"></script>
    <script src="{url}assets/js/morris.min.js"></script>
    <script src="{url}assets/js/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{url}assets/js/sb-admin-2.js"></script>


		<script>
			{modal}
		</script>

</body>

</html>


