            <div id="page-wrapper">
              <div class="row">
                  <div class="col-lg-12">
                      <h1 class="page-header"> Inserir Frequência </h1>
                  </div>
                  <!-- /.col-lg-12 -->
              </div>
              <!-- /.row -->
              <div class="row">
                <?php
                echo anchor("Importacao/excel3", "Baixar .xls", 'class = "btn btn-info"');
                echo anchor("Importacao/readmeFrequencias", "Instruções para a utilização do sistema", 'class = "btn btn-info"');
                    $atributos = array('name'=>'formulario_cadastro', 'id'=>'formulario_cadastro');
                    $btn = array('name'=>'btn_cadastrar', 'id'=>'btn_cadastro', 'class'=>'btn btn-lg btn-primary');
                    $i = 0;
                    echo form_open('Estagiario/freq/'.$materia[0]->TURMA_idTURMA.'/'.$materia[0]->ANO, $atributos);
                    foreach($materia as $data){
                        echo form_radio("txt_materia", $data->idMATERIA, true).
                        form_label($data->NOME, "txt_materia")."  ";
                        $i++;
                        if($i == 4){
                            echo br();
                            $i = 0;
                        }
                    }
                    echo br().form_label("Frequências: ", "txt_freq").br().
                    form_input('txt_freq').br().
                    form_label("Bimestre", "txt_bim")." ".
                    form_input(array('name'=>'txt_bim', 'type'=>'number', 'min'=>1, 'max'=>4, 'value'=>1)).br().
                    form_submit("btn_cadastrar", "Cadastrar", $btn).
                    form_close();
                ?>
              </div>
          </div>
		</div>
	</div>
	<script src="{url}assets/js/jquery.min.js"></script>
	<script src="{url}assets/js/bootstrap.min.js"></script>
    <script src="{url}assets/js/metisMenu.min.js"></script>
    <script src="{url}assets/js/raphael.min.js"></script>
    <script src="{url}assets/js/morris.min.js"></script>
    <script src="{url}assets/js/morris-data.js"></script>
    <script src="{url}assets/js/sb-admin-2.js"></script>
    <script>{modal}</script>
	</body>
</html>
