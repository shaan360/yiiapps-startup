<!-- The file upload form used as target for the file upload widget -->
<?php echo CHtml::beginForm($this -> url, 'post', $this -> htmlOptions);?>
<div class="row fileupload-buttonbar">
	<div class="span7 offset1">
		<!-- The fileinput-button span is used to style the file input field as button -->
		<span class="btn btn-success fileinput-button"> <i class="icon-plus icon-white"></i> <span>Add Photos...</span>
			<?php
            if ($this -> hasModel()) :
                echo CHtml::activeFileField($this -> model, $this -> attribute, $htmlOptions) . "\n";
            else :
                echo CHtml::fileField($name, $this -> value, $htmlOptions) . "\n";
            endif;
            ?>
		</span>
		<button type="submit" class="btn start">
			<i class="icon-upload"></i>
			<span>Start upload</span>
		</button>
		<button type="reset" class="btn cancel">
			<i class="icon-ban-circle"></i>
			<span>Cancel upload</span>
		</button>
		<button type="button" class="btn delete">
			<i class="icon-trash"></i>
			<span>Delete</span>
		</button>
		<input type="checkbox" class="toggle">
	</div>
	<div class="span4 fileupload-progress fade">
                <!-- The global progress bar -->
                <div class="progress progress-primary progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                    <div class="bar" style="width:0%;"></div>
                </div>
                <!-- The extended global progress information -->
                <div class="progress-extended">&nbsp;</div>
            </div>
</div>
<!-- The loading indicator is shown during image processing -->
<div class="fileupload-loading"></div>
<br>
<!-- The table listing the files available for upload/download -->
<table class="table table-striped">
	<tbody class="files" data-toggle="modal-gallery" data-target="#modal-gallery"></tbody>
</table>
<?php echo CHtml::endForm();?>
