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
													
										foreach($QUESTIONARIO as $q) {
											echo anchor("Professor/v_dimensao/".$q->idUSUARIO."/".$q->TURMA_idTURMA."/".$q->MATERIA_idMATERIA."/".$q->QUESTIONARIO_idQUESTIONARIO,
														"".$q->NOMEQUESTIONARIO." - ".$q->SERIE."° ".$q->NOMECURSO." ".$q->MODALIDADE." ".$q->ANO." - ".$q->NOMEMATERIA, "class = 'btn btn-info'").br();
										}
		
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



