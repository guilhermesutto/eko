
<!-- MODALS -->
@if(isset($ConfigFile['modals']) && $ConfigFile)
@foreach($ConfigFile['modals'] AS $modal )
@include("modals.$modal")
@endforeach
@endif
<!-- /MODALS -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->

<!-- Morris.js charts -->
<script src="<?php echo url('/'); ?>/template/bower_components/raphael/raphael.min.js"></script>
<script src="<?php echo url('/'); ?>/template/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo url('/'); ?>/template/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo url('/'); ?>/template/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo url('/'); ?>/template/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo url('/'); ?>/template/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo url('/'); ?>/template/bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo url('/'); ?>/template/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo url('/'); ?>/template/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo url('/'); ?>/template/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo url('/'); ?>/template/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo url('/'); ?>/template/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo url('/'); ?>/template/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo url('/'); ?>/template/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo url('/'); ?>/template/dist/js/demo.js"></script>

<script src="<?php echo url('/'); ?>/js/ckeditor/ckeditor.js"></script>
<script src="<?php echo url('/'); ?>/js/jquery-loading-master/src/loading.js"></script>

<!-- PAGE SCRIPTS -->
@if(isset($ConfigFile['scripts']))
@foreach($ConfigFile['scripts'] AS $script )
<script type="text/javascript" src="{{ $script }}"></script>
@endforeach
@endif
<!-- /PAGE SCRIPTS -->

</body>
</html>