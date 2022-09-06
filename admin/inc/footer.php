  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2021 <a href="<?php echo $base_url; ?>/">Aspireglobal</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0-rc
    </div>
  </footer>


</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo $admin_base_url; ?>/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo $admin_base_url; ?>/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo $admin_base_url; ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- daterangepicker -->
<script src="<?php echo $admin_base_url; ?>/plugins/moment/moment.min.js"></script>
<script src="<?php echo $admin_base_url; ?>/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo $admin_base_url; ?>/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?php echo $admin_base_url; ?>/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo $admin_base_url; ?>/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<!-- DataTables  & Plugins -->
<script src="<?php echo $admin_base_url; ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo $admin_base_url; ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo $admin_base_url; ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo $admin_base_url; ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo $admin_base_url; ?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo $admin_base_url; ?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo $admin_base_url; ?>/plugins/jszip/jszip.min.js"></script>
<script src="<?php echo $admin_base_url; ?>/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo $admin_base_url; ?>/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo $admin_base_url; ?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo $admin_base_url; ?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo $admin_base_url; ?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!-- AdminLTE App -->
<script src="<?php echo $admin_base_url; ?>/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo $admin_base_url; ?>/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo $admin_base_url; ?>/plugins/toastr/toastr.min.js"></script>
<script src="<?php echo $admin_base_url; ?>/ckeditor/ckeditor.js"></script>
<script>

    //
// Pipelining function for DataTables. To be used to the `ajax` option of DataTables
//
$.fn.dataTable.pipeline = function ( opts ) {
    // Configuration options
    var conf = $.extend( {
        pages: 5,     // number of pages to cache
        url: '',      // script url
        data: null,   // function or object with parameters to send to the server
                      // matching how `ajax.data` works in DataTables
        method: 'GET' // Ajax HTTP method
    }, opts );
 
    // Private variables for storing the cache
    var cacheLower = -1;
    var cacheUpper = null;
    var cacheLastRequest = null;
    var cacheLastJson = null;
 
    return function ( request, drawCallback, settings ) {
        var ajax          = false;
        var requestStart  = request.start;
        var drawStart     = request.start;
        var requestLength = request.length;
        var requestEnd    = requestStart + requestLength;
         
        if ( settings.clearCache ) {
            // API requested that the cache be cleared
            ajax = true;
            settings.clearCache = false;
        }
        else if ( cacheLower < 0 || requestStart < cacheLower || requestEnd > cacheUpper ) {
            // outside cached data - need to make a request
            ajax = true;
        }
        else if ( JSON.stringify( request.order )   !== JSON.stringify( cacheLastRequest.order ) ||
                  JSON.stringify( request.columns ) !== JSON.stringify( cacheLastRequest.columns ) ||
                  JSON.stringify( request.search )  !== JSON.stringify( cacheLastRequest.search )
        ) {
            // properties changed (ordering, columns, searching)
            ajax = true;
        }
         
        // Store the request for checking next time around
        cacheLastRequest = $.extend( true, {}, request );
 
        if ( ajax ) {
            // Need data from the server
            if ( requestStart < cacheLower ) {
                requestStart = requestStart - (requestLength*(conf.pages-1));
 
                if ( requestStart < 0 ) {
                    requestStart = 0;
                }
            }
             
            cacheLower = requestStart;
            cacheUpper = requestStart + (requestLength * conf.pages);
 
            request.start = requestStart;
            request.length = requestLength*conf.pages;
 
            // Provide the same `data` options as DataTables.
            if ( typeof conf.data === 'function' ) {
                // As a function it is executed with the data object as an arg
                // for manipulation. If an object is returned, it is used as the
                // data object to submit
                var d = conf.data( request );
                if ( d ) {
                    $.extend( request, d );
                }
            }
            else if ( $.isPlainObject( conf.data ) ) {
                // As an object, the data given extends the default
                $.extend( request, conf.data );
            }
 
            return $.ajax( {
                "type":     conf.method,
                "url":      conf.url,
                "data":     request,
                "dataType": "json",
                "cache":    false,
                "success":  function ( json ) {
                    cacheLastJson = $.extend(true, {}, json);
 
                    if ( cacheLower != drawStart ) {
                        json.data.splice( 0, drawStart-cacheLower );
                    }
                    if ( requestLength >= -1 ) {
                        json.data.splice( requestLength, json.data.length );
                    }
                     
                    drawCallback( json );
                }
            } );
        }
        else {
            json = $.extend( true, {}, cacheLastJson );
            json.draw = request.draw; // Update the echo for each response
            json.data.splice( 0, requestStart-cacheLower );
            json.data.splice( requestLength, json.data.length );
 
            drawCallback(json);
        }
    }
};
 
// Register an API method that will empty the pipelined data, forcing an Ajax
// fetch on the next draw (i.e. `table.clearPipeline().draw()`)
$.fn.dataTable.Api.register( 'clearPipeline()', function () {
    return this.iterator( 'table', function ( settings ) {
        settings.clearCache = true;
    } );
} );
 
</script>



<?php 
    
    
    @$status=$_GET['status'];
    
    if($status=='loginsuccess'){
        
        ?>
        
       <script> toastr.success('Congratulations.', 'Successfully Logged in As Admin', {timeOut: 5000})</script>
        <?php
        
        
    }
        elseif($status=='wrongcredentials'){
        
        ?>
        
       <script> toastr.warning('!!Opps.', 'Wrong Password Please Try Again', {timeOut: 5000})</script>
        <?php
        
        
    }else if($status=='successfullyadded'){
        
        ?>
        
       <script> toastr.success('Congratulations', 'Your Data added Successfully', {timeOut: 5000})</script>
        <?php
        
        
    }else if($status=='failedtoadd'){
        
        ?>
        
       <script> toastr.error('!!Opps', 'Your Data Not Added please Try Again ', {timeOut: 5000})</script>
        <?php
        
        
    }elseif($status=='successfullydeleted'){
        
        ?>
        
       <script> toastr.success('Congratulations', 'Your Data Successfully Deleted', {timeOut: 5000})</script>
        <?php
        
        
    }elseif($status=='failedtodelete'){
        
        ?>
        
       <script> toastr.error('!!Opps', 'Your Data Not Deleted Please Try Again', {timeOut: 5000})</script>
        <?php
        
        
    }elseif($status=='successfullyedited'){
        
        ?>
        
       <script> toastr.success('Congratulations', 'Your Data Successfully Edited', {timeOut: 5000})</script>
        <?php
        
        
    }elseif($status=='failedtoedit'){
        
        ?>
        
       <script> toastr.error('!!Opps', 'Your Data Not Edited Please Try Again', {timeOut: 5000})</script>
        <?php
        
        
    }
    
    ?>