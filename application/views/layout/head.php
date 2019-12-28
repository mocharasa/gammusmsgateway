<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title><?php echo $title;?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="<?php echo base_url();?>assets/backend/css/bootstrap.css" rel="stylesheet" type="text/css" />    
	<link href="<?php echo base_url();?>assets/backend/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="<?php echo base_url().'assets/backend/css/jquery-ui.css'?>" />
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/backend/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/backend/css/skins/skin-blue.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/backend/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/backend/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/backend/morris/morris.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/backend/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/backend/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/backend/daterangepicker/bootstrap-datepicker.min.js" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/backend/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="<?php echo base_url (); ?>assets/backend/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
    <!-- CK Editor -->
    
   
    <script src="<?php echo base_url(); ?>assets/backend/ckeditor/ckeditor.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend/ckeditor/config.js"></script>    
    <script src="<?php echo base_url(); ?>assets/backend/ckeditor/build-config.js"></script>
    
	<script src="<?php echo base_url(); ?>assets/backend/js/jquery.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend/js/bootstrap-alert.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend/js/bootstrap-modal.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend/js/bootstrap-transition.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend/js/bootstrap-tooltip.js"></script>
    
    <!--
      <script src="<?php //echo base_url(); ?>assets/backend/tinymce/js/tinymce/tinymce.min.js"></script>
      <script src="<?php //echo base_url(); ?>assets/backend/tinymce/js/tinymce/jquery.tinymce.min.js"></script>
      <script src="<?php //echo base_url(); ?>assets/backend/tinymce/js/tinymce/plugins/table/plugin.min.js"></script>
      <script src="<?php //echo base_url(); ?>assets/backend/tinymce/js/tinymce/plugins/paste/plugin.min.js"></script>
      <script src="<?php //echo base_url(); ?>assets/backend/tinymce/js/tinymce/plugins/wordcount/plugin.min.js"></script>
      <script src="<?php //echo base_url(); ?>assets/backend/tinymce/js/tinymce/plugins/print/plugin.min.js"></script>
      <script src="<?php //echo base_url(); ?>assets/backend/tinymce/js/tinymce/plugins/emoticon/plugin.min.js"></script>
      <script src="<?php //echo base_url(); ?>assets/backend/tinymce/js/tinymce/plugins/spellchecker/plugin.min.js"></script>
    -->
    
    <!-- page script -->
    <script type="text/javascript">
      $(function () bootstrap-wysiht{
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
    <script>
    		var editor1 = CKEDITOR.replace( 'editor1', {
			extraAllowedContent : 'div'
		} );
		editor1.on('instanceReady', function() {
			// Output self-closing tags the HTML4 way, like <br>.
			this.dataProcessor.writer.selfClosingEnd = '>';

			// Use line breaks for block elements, tables, and lists.
			var dtd = CKEDITOR.dtd;
			for ( var e in CKEDITOR.tools.extend( {}, dtd.$nonBodyContent, dtd.$block, dtd.$listItem, dtd.$tableContent ) ) {
				this.dataProcessor.writer.setRules( e, {
					indent: true,
					breakBeforeOpen: true,
					breakAfterOpen: true,
					breakBeforeClose: true,
					breakAfterClose: true
				});
			}
			// Start in source mode.
			this.setMode('source');
		});
	</script>
        <script>
		tinymce.init({
			selector: "#isi",
                        branding: false,
                        skin: "lightgray",
                        plugins: [
			"advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker toc",
			"searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
			"save table contextmenu directionality emoticons template paste textcolor importcss colorpicker textpattern codesample"
                        ],                  
                        toolbar: "insertfile undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons table codesample",

                        image_advtab: true,
                        image_caption: true,

                        style_formats: [
			{title: 'Bold text', format: 'h1'},
			{title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
			{title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
			{title: 'Example 1', inline: 'span', classes: 'example1'},
			{title: 'Example 2', inline: 'span', classes: 'example2'},
			{title: 'Table styles'},
			{title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
                        ],
                        theme: 'modern'                      
		});
	</script>

      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>	
  </head>
  
  <body class="skin-blue sidebar-mini">
    <div class="wrapper">