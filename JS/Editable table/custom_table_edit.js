$(document).ready(function(){
$('#checkboxlist').Tabledit({
deleteButton: true,
editButton: true,
columns: {
identifier: [0, 'id'],
editable: [[1, 'nombre'], [2, 'apellido'],]
},
hideIdentifier: true,
url: 'live_edit.php'
});
});