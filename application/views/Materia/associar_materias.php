<!--<style>
	table, tr, td {
		border: 1px solid transparent;
		text-align: center;	
	}
	
</style>-->

     
     
          <div id="page-wrapper">
              <div class="row">
                  <div class="col-lg-12">
                      <h1 class="page-header">Associação Disciplina-Classe</h1>
                  </div>
                  <!-- /.col-lg-12 -->
              </div>
              <!-- /.row -->
              <div class="row">
  		                <div class="col-lg-12 col-md-8">
												<?php
												
												echo "Disciplina: ".$MATERIA[0]->NOME.br();
												
												$atributos = array('name'=>'formulario_cadastro', 'id'=>'formulario_cadastro');
												$btn = array('name'=>'btn_cadastrar', 'id'=>'botao1', 'class'=>'btn btn-success');
												$ano = date("Y");												
												echo form_open('Materia/associar', $atributos).
													 form_hidden('idMATERIA', $MATERIA[0]->idMATERIA).
													 form_label("Ano: ", "txt_ano").
													 form_input(array('name'=>'txt_ano', 'type'=>'number', 'min'=>$ano, 'max'=>1+$ano, 'value'=>$ano)).br();
													 //echo "<table><tr><th>".
													 echo form_checkbox("turma[]", "11", FALSE) .
													 form_label("1° Info Int", "txt_1i") . /*"</th><th>"*/
													 form_checkbox("turma[]", "21", FALSE) .
													 form_label("1° Meca Int", "txt_1i") ./*"</th><th>"*/
													 form_checkbox("turma[]", "31", FALSE) .
													 form_label("1° Edif Int", "txt_1i") ./*"</th><th>"*/
													 form_checkbox("turma[]", "41", FALSE) .
													 form_label("1° Info Sub", "txt_1i") ./*"</th><th>"*/
													 form_checkbox("turma[]", "51", FALSE) .
													 form_label("1° Meca Sub", "txt_1i") ./*"</th><th>"*/
													 form_checkbox("turma[]", "61", FALSE) .
													 form_label("1° Edif Sub", "txt_1i") . /*"</th></tr><tr><th>"*/br().
													 
													 
													 
													 form_checkbox("turma[]", "12", FALSE) .
													 form_label("2° Info Int", "txt_1i") ./*"</th><th>"*/
													 form_checkbox("turma[]", "22", FALSE) . 
													 form_label("2° Meca Int", "txt_1i") ./*"</th><th>"*/
													 form_checkbox("turma[]", "32", FALSE) .
													 form_label("2° Edif Int", "txt_1i") ./*"</th><th>"*/
													 form_checkbox("turma[]", "42", FALSE) .
													 form_label("2° Info Sub", "txt_1i") ./*"</th><th>"*/
													 form_checkbox("turma[]", "52", FALSE) . 
													 form_label("2° Meca Sub", "txt_1i") ./*"</th><th>"*/
													 form_checkbox("turma[]", "62", FALSE) .
													 form_label("2° Edif Sub", "txt_1i") . /*"</th></tr><tr><th>"*/br().
												

													 form_checkbox("turma[]", "13", FALSE) . 
													 form_label("3° Info Int", "txt_1i") ./*"</th><th>"*/
													 form_checkbox("turma[]", "23", FALSE) . 												 
													 form_label("3° Meca Int", "txt_1i") ./*"</th><th>"*/
													 form_checkbox("turma[]", "33", FALSE) .
													 form_label("3° Edif Int", "txt_1i") ./*"</th></tr></table>"*/br().
													 
	  
													 
													 
													 
													 form_submit("btn_cadastrar", " Salvar ", $btn).
													 form_close().
											     anchor('Materia/index', "Cancelar", array('class'=>"btn btn-danger", 'id'=>"botao"));
												?>
											</div>
              </div>
          </div>
        </div>
      </div>


    <!-- jQuery -->
    <script src="{url}assets/js/jquery.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(e){
        $("#btn a").click(function(e){
          e.preventDefault();
          var href = $(this).attr('href');
          $("#Main").load(href + " #Main");
        });
      });
    </script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{url}assets/js/bootstrap.min.js"></script>

       <script src="{url}assets/DataTables/media/js/jquery.dataTables.min.js"></script>


    <script type="text/javascript">
      $(document).ready(function(e){
        $("#btn a").click(function(e){
          e.preventDefault();
          var href = $(this).attr('href');
          $("#Main").load(href + " #Main", function(responseTxt, statusTxt, xhr){
        if(statusTxt == "success")
            $('#myTable').DataTable({
                "bRetrieve": true,
                "bPaginate": true,
                "bJQueryUI": false,
                "sPaginationType": "full_numbers",
                "oLanguage": {
                    "sUrl": "{url}assets/language/ptbr.txt"
                }
            });
        if(statusTxt == "error")
            alert("Error: " + xhr.status + ": " + xhr.statusText);
    });
        });
      });
    </script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{url}assets/js/bootstrap.min.js"></script>


    <!-- Metis Menu Plugin JavaScript -->
    <script src="{url}assets/js/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript
    <script src="{url}assets/js/raphael.min.js"></script>
    <script src="{url}assets/js/morris.min.js"></script>
    <script src="{url}assets/js/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->

    <script>
        {modal}
    </script>
    <script src="{url}assets/js/sb-admin-2.js"></script>

</body>

</html>

