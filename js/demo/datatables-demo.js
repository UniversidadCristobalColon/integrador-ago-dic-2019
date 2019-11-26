// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable({
    language:{
      url:dir_base+'js/demo/Spanish.json'
    }
  });
});
