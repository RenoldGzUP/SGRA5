<?php

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if ($form_state == 1) {
    //filterBySede($form_filter[0]);
    $Data      = convert_object_to_array(filter_TREPORTE_By_S($form_filter[0]));
    $longArray = sizeof($Data);
    $this->printTableContent($longArray, $Data);

} elseif ($form_state == 2) {
    $Data      = convert_object_to_array(filter_TREPORTE_By_S_A($form_filter[0], $form_filter[1]));
    $longArray = sizeof($Data);
    $this->printTableContent($longArray, $Data);

} elseif ($form_state == 3) {
    $Data      = convert_object_to_array(filter_TREPORTE_By_S_A_F($form_filter[0], $form_filter[1], $form_filter[2]));
    $longArray = sizeof($Data);
    $this->printTableContent($longArray, $Data);

} elseif ($form_state == 4) {
    $Data      = convert_object_to_array(filter_TREPORTE_By_S_A_F_E($form_filter[0], $form_filter[1], $form_filter[2], $form_filter[3]));
    $longArray = sizeof($Data);
    $this->printTableContent($longArray, $Data);
} elseif ($form_state == 5) {
    $Data      = convert_object_to_array(filter_TREPORTE_By_S_A_F_E_C($form_filter[0], $form_filter[1], $form_filter[2], $form_filter[3], $form_filter[4]));
    $longArray = sizeof($Data);
    $this->printTableContent($longArray, $Data);
} else {
    echo "Algo salio mal en el server";
}

///////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////