<?php defined('BASEPATH') or exit('No direct script access allowed');

class Importacao extends CI_Controller {

	public function readme() {
		
		$dicas = "Dicas para usar o sistema de importação";		
		
 		header("Content-type: application/text");   
   	header("Content-Disposition: attachment; filename=readme.txt");   
		echo $dicas;
	}
	
	public function excel() {
		$html = "<table>
					<tr>
        				<td><b>Matricula</b></td>        
        				<td></td>        
						<td><b>Nome</b></td>
						<td></td>     
    			    </tr>					 
					 <tr>
        				<td></td>        
        				<td>:</td>        
						<td></td>
						<td>:</td>       
    			    </tr>
    			 </table>";

		// Configurações header para forçar o download
		header ('Content-type: application/x-msexcel');
		header ('Content-Disposition: attachment; filename="importHelper.xls"' );

		echo $html;	
	}
}
