  #table-container {
    height: 10em;
}
table {
    display: flex;
    flex-flow: column;
    height: 90%;
    width: 100%;
}
table thead {
    /* head takes the height it requires, 
    and it's not scaled when table is resized */
    flex: 0 0 auto;
    width: calc(100% - 0.9em);
}
table tbody {
    /* body takes all the remaining available space */
    flex: 1 1 auto;
    display: block;
    overflow-y: scroll;
}
table tbody tr {
    width: 100%;
}
table thead,
table tbody tr {
    display: table;
    table-layout: fixed;
}
/* decorations */
#table-container {
    border: 1px solid black;
    padding: 0.3em;
}
table {
    border: 1px solid lightgrey;
}
table td, table th {
    padding: 0.3em;
    border: 1px solid lightgrey;
}
table th {
    border: 1px solid grey;
}





  <table id="checkboxlist" class="table table-bordered table-hover table-editable">
       <thead style="text-align:center;width: : 10px;background: #225ddb" >
       <tr style="font-size: 11px;text-align:center; color: #ffffff">
        <th style="text-align: center;"> <input type="checkbox"  id="checkall" ></th>
        <th style="text-align: center;">#</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th style="width:70px;" >Cédula</th>
        <th>Inscripción</th>
        <th>Sede</th>
        <th>Fac1A</th>
        <th>Esc1A</th>
        <th>Car1A</th>
        <th>Fac2A</th>
        <th>Esc2A</th>
        <th>Car2A</th>
        <th>Fac3A</th>
        <th>Esc3A</th>
        <th>Car3A</th>
        <th>Acciones</th>
       </tr>
    </thead>
     
 <tbody >
    
         <?php

         $estResultado = showDataResultado();
         if($estResultado){
          foreach ($estResultado as $item) {
          echo'<tr id="row'.$item->n_ins.'" style="font-size: 11px;text-align:center">';
          echo'<td style="text-align: center;"><input type="checkbox" class="checkthis" value='.$item->n_ins.'></td>';
          echo "<td ></td>";
          echo "<td id='name".$item->n_ins."' >".$item->nombre."</td>";  
          echo "<td id='lastname".$item->n_ins."' >".$item->apellido."</td>";  
          echo "<td id='CID".$item->n_ins."' >".$item->cedula."</td>";
          echo "<td id='n_ins".$item->n_ins."' >".$item->n_ins."</td>";  
          echo "<td id='sede".$item->n_ins."'>".$item->sede."</td>";  
          echo "<td id='fac_ia".$item->n_ins."'>".$item->fac_ia."</td>";
          echo "<td id='esc_ia".$item->n_ins."'>".$item->esc_ia."</td>";  
          echo "<td id='car_ia".$item->n_ins."'>".$item->car_ia."</td>";  
          echo "<td id='fac_iia".$item->n_ins."'>".$item->fac_iia."</td>";
          echo "<td id='esc_iia".$item->n_ins."'>".$item->esc_iia."</td>";  
          echo "<td id='car_iia".$item->n_ins."'>".$item->car_iia."</td>";  
          echo "<td id='fac_iiia".$item->n_ins."'>".$item->fac_iiia."</td>";
          echo "<td id='esc_iiia".$item->n_ins."'>".$item->esc_iiia."</td>";  
          echo "<td id='car_iiia".$item->n_ins."'>".$item->car_iiia."</td>";  
         echo '<td>
         <button type="button" id="edit_button'.$item->n_ins.'" class="btn btn-warning btn-xs" onclick="edit_row(\''.$item->n_ins.'\');"><span class="glyphicon glyphicon-pencil"></span>    </button>
         <button type="button"  id="save_button'.$item->n_ins.'"  style="display:none;" class="btn btn-success btn-xs"  onclick="save_row(\''.$item->n_ins.'\');"><span class="glyphicon glyphicon-floppy-saved"></span> </button>
         <button type="button" id="delete_button'.$item->n_ins.'" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash" onclick="delete_row(\''.$item->n_ins.'\');"></span> </button>

          </td>';

          echo"</tr>";       
          }
         }else { 
             echo'<tr><td colspan="4">No hay datos a mostrar en esta Pantalla</td></tr>';
         }     
?>



   </tbody>



   
 </table>

 style="height: 420px;"

 
 
 
  //scrollY:     315,
   /* scroller:    true,deferRender: true,
    scrollY:     300,
    scroller:    true,*/


       <!--       <?php
         $estResultado = showDataResultado();
          $estResultado = 0;
         if($estResultado){
          foreach ($estResultado as $item) {
          echo'<tr id="row'.$item->n_ins.'" style="font-size: 11px;text-align:center">';
          echo'<td style="text-align: center;"><input type="checkbox" class="checkthis" value='.$item->n_ins.'></td>';
          echo "<td ></td>";
          echo "<td id='name".$item->n_ins."' >".$item->nombre."</td>";  
          echo "<td id='lastname".$item->n_ins."' >".$item->apellido."</td>";  
          echo "<td id='CID".$item->n_ins."' >".$item->cedula."</td>";
          echo "<td id='n_ins".$item->n_ins."' >".$item->n_ins."</td>";  
          echo "<td id='sede".$item->n_ins."'>".$item->sede."</td>";  
          echo "<td id='fac_ia".$item->n_ins."'>".$item->fac_ia."</td>";
          echo "<td id='esc_ia".$item->n_ins."'>".$item->esc_ia."</td>";  
          echo "<td id='car_ia".$item->n_ins."'>".$item->car_ia."</td>";  
          echo "<td id='fac_iia".$item->n_ins."'>".$item->fac_iia."</td>";
          echo "<td id='esc_iia".$item->n_ins."'>".$item->esc_iia."</td>";  
          echo "<td id='car_iia".$item->n_ins."'>".$item->car_iia."</td>";  
          echo "<td id='fac_iiia".$item->n_ins."'>".$item->fac_iiia."</td>";
          echo "<td id='esc_iiia".$item->n_ins."'>".$item->esc_iiia."</td>";  
          echo "<td id='car_iiia".$item->n_ins."'>".$item->car_iiia."</td>";  
         echo '<td>
         <button type="button" id="edit_button'.$item->n_ins.'" class="btn btn-warning btn-xs" onclick="edit_row(\''.$item->n_ins.'\');"><span class="glyphicon glyphicon-pencil"></span>    </button>
         <button type="button"  id="save_button'.$item->n_ins.'"  style="display:none;" class="btn btn-success btn-xs"  onclick="save_row(\''.$item->n_ins.'\');"><span class="glyphicon glyphicon-floppy-saved"></span> </button>
         <button type="button" id="delete_button'.$item->n_ins.'" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash" onclick="delete_row(\''.$item->n_ins.'\');"></span> </button>

          </td>';

          echo"</tr>";       
          }
         }else { 
             echo'<tr><td colspan="17">No hay datos a mostrar en esta Pantalla</td></tr>';
         }     
?>
 -->