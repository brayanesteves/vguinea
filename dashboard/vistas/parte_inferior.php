
      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">¿Confirma salir y cerrar Sesión?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body"></div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <a class="btn btn-primary" href="../bd/logout.php">Salir</a>
  
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

 

  
    <!-- datatables JS -->
    <script type="text/javascript" src="vendor/datatables/datatables.min.js"></script> 
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>   
    <script src="libs/HTML&CSS&JS/moment.min.js"></script>     
    <script src="libs/HTML&CSS&JS/fullcalendar/fullcalendar.min.js"></script>     
    <script src="libs/HTML&CSS&JS/fullcalendar/fullcalendar.js"></script>     
    <script src="libs/HTML&CSS&JS/fullcalendar/locale/es.js"></script>   
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>  
    <!-- código propio JS --> 
    <script type="text/javascript" src="main.js"></script>
    <script>
      	$(document).ready(function() {
 
          var date = new Date();
              var yyyy = date.getFullYear().toString();
              var mm = (date.getMonth()+1).toString().length == 1 ? "0"+(date.getMonth()+1).toString() : (date.getMonth()+1).toString();
              var dd  = (date.getDate()).toString().length == 1 ? "0"+(date.getDate()).toString() : (date.getDate()).toString();
          
          $('#calendar').fullCalendar({
            header: {
                language: 'es',
                left: 'prev,next today',
                center: 'title',
                right: 'month,basicWeek,basicDay',

            },
            defaultDate: yyyy+"-"+mm+"-"+dd,
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            selectable: true,
            selectHelper: true,
            select: function(start, end) {
              
              $('#ModalAdd #IntlDt').val(moment(start).format('YYYY-MM-DD'));
              $('#ModalAdd #FnlDt').val(moment(end).format('YYYY-MM-DD'));
              $('#ModalAdd').modal('show');
            },
            eventRender: function(event, element) {
              element.bind('dblclick', function() {
                $('#ModalEdit #id').val(event.id);
                $('#ModalEdit #Nms').val(event.title);
                $('#ModalEdit #Pntr').val(event.Pntr);
                $('#ModalEdit #Dscrptn').val(event.description);
                $('#ModalEdit #IntlDt').val(moment(event.start).format('YYYY-MM-DD'));
                $('#ModalEdit #FnlDt').val(moment(event.end).format('YYYY-MM-DD'));
                $('#ModalEdit').modal('show');
              });
            },
            eventDrop: function(event, delta, revertFunc) { // si changement de position

              edit(event);

            },
            eventResize: function(event,dayDelta,minuteDelta,revertFunc) { // si changement de longueur

              edit(event);

            },
            /**
             * TR
             */
            events: [
            <?php foreach($events as $event): 
            
              $start = $event['IntlDt'];
              $end = $event['FnlDt'];            
            ?>
              {
                id: '<?php echo $event['Rfrnc']; ?>',
                title: '<?php echo $event['Nms']; ?>',
                start: '<?php echo $start; ?>',
                end: '<?php echo $end; ?>',
                color: '#ffffff',
                extendedProps: {
                  department: 'BioChemistry'
                },
                description: '<?php echo $event['Dscrptn']; ?>',
                Pntr: '<?php echo $event['Pntr']; ?>',
              },
            <?php endforeach; ?>
            ]
          });
          
          function edit(event){
            start = event.start.format('YYYY-MM-DD');
            if(event.end){
              end = event.end.format('YYYY-MM-DD');
            }else{
              end = start;
            }
            
            id =  event.id;
            
            Event = [];
            Event[0] = id;
            Event[1] = start;
            Event[2] = end;
            
            $.ajax({
              url: 'editEventDate.php',
              type: "POST",
              data: {Event:Event},
              success: function(rep) {
                if(rep == 'OK'){
                  alert('Se ha modificado el evento correctamente.');
                }else{
                  alert('No se pudo guardar. Inténtalo de nuevo.'); 
                }
              }
            });
          }
        
        });

</script>
</body>

</html>
