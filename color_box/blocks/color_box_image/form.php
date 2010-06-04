<?php
defined('C5_EXECUTE') or die(_("Access Denied."));

$includeAssetLibrary = true;
$assetLibraryPassThru = array(
	'type' => 'image'
);

$al = Loader::helper('concrete/asset_library');

$bf = null;
$bfo = null;

if ($controller->getFileID() > 0) {
	$bf = $controller->getFileObject();
}
?>
<ul class="ccm-dialog-tabs" id="ccm-colorbox-tabs">
	<li class="ccm-nav-active"><a id="ccm-colorbox-tab-internal" href="javascript:void(0);"><?php echo t('Internal Content')?></a></li>
	<li class=""><a id="ccm-colorbox-tab-external" href="javascript:void(0);"><?php echo t('External Content')?></a></li>
	<li class=""><a id="ccm-colorbox-tab-dimensions" href="javascript:void(0);"><?php echo t('Dimensions')?></a></li>
	<li class=""><a id="ccm-colorbox-tab-text" href="javascript:void(0);"><?php echo t('Buttons/Text')?></a></li>
	<li class=""><a id="ccm-colorbox-tab-visual"  href="javascript:void(0);"><?php echo t('Visual')?></a></li>
	<li class=""><a id="ccm-colorbox-tab-slideshow" href="javascript:void(0);"><?php echo t('Slideshow')?></a></li>
	<li class=""><a id="ccm-colorbox-tab-advanced"  href="javascript:void(0);"><?php echo t('Advanced')?></a></li>
</ul>

<div id="ccm-colorboxBlockPane-internal" class="ccm-colorboxBlockPane">
	<div class="ccm-block-field-group">
		<h2><?php echo t('Image')?></h2>
		<?php echo $al->image('ccm-b-image', 'fID', t('Choose Image'), $bf);?>
	</div>

	<div class="ccm-block-field-group">
		<h2><?php echo t('Colorbox inline');?></h2>
		<p><?php echo t('If "true" a jQuery selector can be used to display content from the current page.')?></p>
		<?php echo $form->checkbox('cboxInline', intval($cboxInline), array('style' => 'width: 60px')); ?>
	</div>

	<div class="ccm-block-field-group">
		<h2><?php echo t('Colorbox html');?></h2>
		<p><?php echo t('This allows an HTML string to be used directly instead of pulling content from another source (ajax, inline, or iframe).')?></p>
		<h1>TODO: We need a c5 popup that opens a c5 editor in here.</h1>
	</div>

</div>

<div id="ccm-colorboxBlockPane-external" class="ccm-colorboxBlockPane">

	<div class="ccm-block-field-group">
		<h2><?php echo t('Colorbox href');?></h2>
		<p><?php echo t('This can be used as an alternative anchor URL or to associate a URL for non-anchor elements such as images or form buttons. Example: "welcome.html"')?></p>
		<?php echo $form->text('cboxHref', intval($cboxHref), array('style' => 'width: 60px')); ?>
	</div>

	<div class="ccm-block-field-group">
		<h2><?php echo t('Colorbox iframe');?></h2>
		<p><?php echo t('If "true" specifies that content should be displayed in an iFrame.')?></p>
		<?php echo $form->checkbox('cboxIframe', intval($cboxIframe), array('style' => 'width: 60px')); ?>
	</div>

</div>

<div id="ccm-colorboxBlockPane-dimensions" class="ccm-colorboxBlockPane">
	<div class="ccm-block-field-group">
		<h2><?php echo t('Image Dimensions')?></h2>
		<table border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td><?php echo t('Width')?>&nbsp;</td>
				<td><?php echo $form->text('imgWidth', intval($imgWidth), array('style' => 'width: 60px')); ?></td>
				<td>&nbsp;&nbsp;</td>
				<td><?php echo t('Height')?>&nbsp;</td>
				<td><?php echo $form->text('imgHeight', intval($imgHeight), array('style' => 'width: 60px')); ?></td>
			</tr>
		</table>
	</div>

	<div class="ccm-block-field-group">
		<h2><?php echo t('Colorbox width');?></h2>
		<p><?php echo t('Set a fixed total width. This includes borders and buttons. Example: "100%", "500px", or 500')?></p>
		<?php echo $form->text('cboxWidth', intval($cboxWidth), array('style' => 'width: 60px')); ?>
	</div>

	<div class="ccm-block-field-group">
		<h2><?php echo t('Colorbox height');?></h2>
		<p><?php echo t('Set a fixed total height. This includes borders and buttons. Example: "100%", "500px", or 500')?></p>
		<?php echo $form->text('cboxHeight', intval($cboxHeight), array('style' => 'width: 60px')); ?>
	</div>

	<div class="ccm-block-field-group">
		<h2><?php echo t('Colorbox innerWidth');?></h2>
		<p><?php echo t('This is an alternative to "width" used to set a fixed inner width. This excludes borders and buttons. Example: "50%", "500px", or 500')?></p>
		<?php echo $form->text('cboxInnerWidth', intval($cboxInnerWidth), array('style' => 'width: 60px')); ?>
	</div>

	<div class="ccm-block-field-group">
		<h2><?php echo t('Colorbox innerHeight');?></h2>
		<p><?php echo t('This is an alternative to "height" used to set a fixed inner height. This excludes borders and buttons. Example: "50%", "500px", or 500')?></p>
		<?php echo $form->text('cboxInnerHeight', intval($cboxInnerHeight), array('style' => 'width: 60px')); ?>
	</div>

	<div class="ccm-block-field-group">
		<h2><?php echo t('Colorbox initialWidth');?></h2>
		<p><?php echo t('Set the initial width, prior to any content being loaded.')?></p>
		<?php echo $form->text('cboxInitialWidth', intval($cboxInitialWidth), array('style' => 'width: 60px')); ?>
	</div>

	<div class="ccm-block-field-group">
		<h2><?php echo t('Colorbox initialHeight');?></h2>
		<p><?php echo t('Set the initial height, prior to any content being loaded.')?></p>
		<?php echo $form->text('cboxInitialHeight', intval($cboxInitialHeight), array('style' => 'width: 60px')); ?>
	</div>

	<div class="ccm-block-field-group">
		<h2><?php echo t('Colorbox maxWidth');?></h2>
		<p><?php echo t('Set a maximum width for loaded content. Example: "100%", 500, "500px"')?></p>
		<?php echo $form->text('cboxMaxWidth', intval($cboxMaxWidth), array('style' => 'width: 60px')); ?>
	</div>

	<div class="ccm-block-field-group">
		<h2><?php echo t('Colorbox maxHeight');?></h2>
		<p><?php echo t('Set a maximum height for loaded content. Example: "100%", 500, "500px"')?></p>
		<?php echo $form->text('cboxMaxHeight', intval($cboxMaxHeight), array('style' => 'width: 60px')); ?>
	</div>

</div>

<div id="ccm-colorboxBlockPane-text" class="ccm-colorboxBlockPane">

	<div class="ccm-block-field-group">
		<h2><?php echo t('Alt Text')?></h2>
		<?php echo $form->text('altText', $altText, array('style' => 'width: 250px')); ?>
	</div>

	<div class="ccm-block-field-group">
		<h2><?php echo t('Title/Caption')?></h2>
		<p><?php echo t('This can be used as an anchor title alternative for ColorBox.')?></p>
		<?php echo  $form->text('title', $title, array('style' => 'width: 250px')); ?>
	</div>

	<div class="ccm-block-field-group">
		<h2><?php echo t('Slideshow start text');?></h2>
		<p><?php echo t('Text for the slideshow start button. <strong>Default: "start slideshow"</strong>')?></p>
		<?php echo $form->text('cboxSlideshowStartTxt', intval($cboxSlideshowStartTxt), array('style' => 'width: 60px')); ?>
	</div>

	<div class="ccm-block-field-group">
		<h2><?php echo t('Slideshow current text');?></h2>
		<p><?php echo t('Text for the slideshow stop button. <strong>Default: "stop slideshow"</strong>')?></p>
		<?php echo $form->text('cboxSlideshowStopTxt', intval($cboxSlideshowSopTxt), array('style' => 'width: 60px')); ?>
	</div>

	<div class="ccm-block-field-group">
		<h2><?php echo t('Slideshow current text');?></h2>
		<p><?php echo t('Text format for the content group / gallery count. {current} and {total} are detected and replaced with actual numbers while ColorBox runs. <strong>Default: "{current} of {total}"</strong>')?></p>
		<?php echo $form->text('cboxSlideshowCurrentTxt', intval($cboxSlideshowCurrentTxt), array('style' => 'width: 60px')); ?>
	</div>

	<div class="ccm-block-field-group">
		<h2><?php echo t('Slideshow previous text');?></h2>
		<p><?php echo t('Text for the previous button in a shared relation group (same values for "rel" attribute). <strong>Default: "previous"</strong>')?></p>
		<?php echo $form->text('cboxSlideshowPreviousTxt', intval($cboxSlideshowPreviousTxt), array('style' => 'width: 60px')); ?>
	</div>

	<div class="ccm-block-field-group">
		<h2><?php echo t('Slideshow next text');?></h2>
		<p><?php echo t('Text for the next button in a shared relation group (same values for "rel" attribute). <strong>Default: "next"</strong>')?></p>
		<?php echo $form->text('cboxSlideshowNextTxt', intval($cboxSlideshowNextTxt), array('style' => 'width: 60px')); ?>
	</div>

	<div class="ccm-block-field-group">
		<h2><?php echo t('Slideshow close text');?></h2>
		<p><?php echo t('Text for the close button. The "Esc" key will also close ColorBox. <strong>Default: "close"</strong>')?></p>
		<?php echo $form->text('cboxSlideshowCloseTxt', intval($cboxSlideshowCloseTxt), array('style' => 'width: 60px')); ?>
	</div>

</div>

<div id="ccm-colorboxBlockPane-visual" class="ccm-colorboxBlockPane">
	<div class="ccm-block-field-group">
		<h2><?php echo t('Choose your ColorBox design');?></h2>
		<select name="cboxDesign">
			<option value="1" <?php if ($controller->getDesign() == '1') echo "selected"?>><?php echo t('decent shadows')?></option>
			<option value="2" <?php if ($controller->getDesign() == '2') echo "selected"?>><?php echo t('bright light')?></option>
			<option value="3" <?php if ($controller->getDesign() == '3') echo "selected"?>><?php echo t('dark night')?></option>
			<option value="4" <?php if ($controller->getDesign() == '4') echo "selected"?>><?php echo t('white glow')?></option>
			<option value="5" <?php if ($controller->getDesign() == '5') echo "selected"?>><?php echo t('grey outline')?></option>
		</select>
	</div>

	<div class="ccm-block-field-group">
		<h2><?php echo t('Colorbox transition');?></h2>
		<p><?php echo t('The transition type. Can be set to "elastic", "fade", or "none".')?></p>
		<select name="cboxTransition">
			<option <?php if ($controller->getTransition() == null) echo "selected"?>></option>
			<option value="elastic" <?php if ($controller->getTransition() == '"elastic"') echo "selected"?>><?php echo t('Elastic')?></option>
			<option value="fade" <?php if ($controller->getTransition() == '"fade"') echo "selected"?>><?php echo t('Fade')?></option>
			<option value="none" <?php if ($controller->getTransition() == '"none"') echo "selected"?>><?php echo t('None')?></option>
		</select>
	</div>

	<div class="ccm-block-field-group">
		<h2><?php echo t('Colorbox speed');?></h2>
		<p><?php echo t('Sets the speed of the fade and elastic transitions, in milliseconds.')?></p>
		<?php echo $form->text('cboxSpeed', intval($cboxSpeed), array('style' => 'width: 60px')); ?>
	</div>

	<div class="ccm-block-field-group">
		<h2><?php echo t('Colorbox rel');?></h2>
		<p><?php echo t('This can be used as an anchor rel alternative for ColorBox. This allows the user to group any combination of elements together for a gallery, or to override an existing rel so elements are not grouped together. Example: "group1"')?></p>
		<p><?php echo t('<small><em>Note: The value can also be set to "nofollow" to disable grouping.</em></small>')?></p>
		<?php echo $form->text('cboxRel', intval($cboxRel), array('style' => 'width: 60px')); ?>
	</div>

	<div class="ccm-block-field-group">
		<h2><?php echo t('Close by clicking the overlay');?></h2>
		<p><?php echo t('If true, enables closing ColorBox by clicking on the background overlay.')?></p>
		<?php echo $form->checkbox('cboxOverlayClose', intval($cboxOverlayClose), array('style' => 'width: 60px')); ?>
	</div>

	<div class="ccm-block-field-group">
		<h2><?php echo t('Show scrolbar');?></h2>
		<p><?php echo t('If "false" ColorBox will hide scrollbars for overflowing content. This could be used on conjunction with the resize method (see below) for a smoother transition if you are appending content to an already open instance of ColorBox.')?></p>
		<?php echo $form->checkbox('cboxScrolling', intval($cboxScrolling), array('style' => 'width: 60px')); ?>
	</div>

</div>

<div id="ccm-colorboxBlockPane-slideshow" class="ccm-colorboxBlockPane">
	<div class="ccm-block-field-group">
		<h2><?php echo t('Enable slideshow');?></h2>
		<p><?php echo t('If true, adds an automatic slideshow to a content group / gallery')?></p>
		<?php echo $form->checkbox('cboxSlideshow', intval($cboxSlideshow), array('style' => 'width: 60px')); ?>
	</div>

	<div class="ccm-block-field-group">
		<h2><?php echo t('Slideshow speed');?></h2>
		<p><?php echo t('Sets the speed of the slideshow, in milliseconds.')?></p>
		<?php echo $form->text('cboxSlideshowSpeed', intval($cboxSlideshowSpeed), array('style' => 'width: 60px')); ?>
	</div>

	<div class="ccm-block-field-group">
		<h2><?php echo t('Autostart slideshow');?></h2>
		<p><?php echo t('Sets the speed of the slideshow, in milliseconds.')?></p>
		<?php echo $form->checkbox('cboxSlideshowAuto', intval($cboxSlideshowAuto), array('style' => 'width: 60px')); ?>
	</div>

</div>

<div id="ccm-colorboxBlockPane-advanced" class="ccm-colorboxBlockPane">

	<div class="ccm-block-field-group">
		<h2><?php echo t('Image preloading');?></h2>
		<p><?php echo t("Allows for preloading of 'Next' and 'Previous' content in a shared relation group (same values for the 'rel' attribute), after the current content has finished loading. Set to 'false' to disable.")?></p>
		<?php echo $form->checkbox('cboxPreloading', intval($cboxPreloading), array('style' => 'width: 60px')); ?>
	</div>

	<div class="ccm-block-field-group">
		<h2><?php echo t('Scale photos');?></h2>
		<p><?php echo t('If "true" and if maxWidth, maxHeight, innerWidth, innerHeight, width, or height have been defined, ColorBox will scale photos to fit within the those values.')?></p>
		<?php echo $form->checkbox('cboxScalePhotos', intval($cboxScalePhotos), array('style' => 'width: 60px')); ?>
	</div>

	<div class="ccm-block-field-group">
		<h2><?php echo t('Force photo mode');?></h2>
		<p><?php echo t("If true, this setting forces ColorBox to display a link as a photo. Use this when automatic photo detection fails (such as using a url like 'photo.php' instead of 'photo.jpg', 'photo.jpg#1', or 'photo.jpg?pic=1')")?></p>
		<?php echo $form->checkbox('cboxPhoto', intval($cboxPhoto), array('style' => 'width: 60px')); ?>
	</div>

	<div class="ccm-block-field-group">
		<h2><?php echo t('Modal overlay opacity');?></h2>
		<p><?php echo t('The overlay opacity level. Range: 0.00 to 1.00')?></p>
		<?php echo $form->text('cboxOpacity', intval($cboxOpacity), array('style' => 'width: 60px')); ?>
	</div>

	<div class="ccm-block-field-group">
		<h2><?php echo t('Autostart Colorbox');?></h2>
		<p><?php echo t('If true, the lightbox will automatically open with no input from the visitor.')?></p>
		<?php echo $form->checkbox('cboxOpen', intval($cboxOpen), array('style' => 'width: 60px')); ?>
	</div>

	<div class="ccm-block-field-group">
		<h2><?php echo t('Colorbox onOpen Callback');?></h2>
		<p><?php echo t('Callback that fires right before ColorBox begins to open.')?></p>
		<?php echo $form->textarea('onOpen'); ?>
	</div>

	<div class="ccm-block-field-group">
		<h2><?php echo t('Colorbox onLoad Callback');?></h2>
		<p><?php echo t('Callback that fires right before attempting to load the target content.')?></p>
		<?php echo $form->textarea('onLoad'); ?>
	</div>

	<div class="ccm-block-field-group">
		<h2><?php echo t('Colorbox onComplete Callback');?></h2>
		<p><?php echo t('Callback that fires right after loaded content is displayed.')?></p>
		<?php echo $form->textarea('onComplete'); ?>
	</div>

	<div class="ccm-block-field-group">
		<h2><?php echo t('Colorbox onCleanup Callback');?></h2>
		<p><?php echo t('Callback that fires at the start of the close process.')?></p>
		<?php echo $form->textarea('onCleanup'); ?>
	</div>

	<div class="ccm-block-field-group">
		<h2><?php echo t('Colorbox onClosed Callback');?></h2>
		<p><?php echo t('Callback that fires once ColorBox is closed.')?></p>
		<?php echo $form->textarea('onClosed'); ?>
	</div>

</div>

<style type="text/css">
div.fieldRow{ border-top: 1px solid #ccc; padding:8px 4px ; margin:8px; clear:left}
div.fieldRow div.fieldLabel{ float: left; width:22%; text-align:right; padding-top: 6px; padding-right:8px}
div.fieldRow div.fieldValues{ float: left; width:75%}

#ccm-colorbox-tabs{margin-bottom:16px}
.ccm-colorboxBlockPane{ display:none; margin-bottom:16px }
</style>

<script type="text/javascript">
function initColorboxBlockWhenReady(){
	if(colorbox && typeof(colorbox.init)=='function'){
		colorbox.init();
	}else setTimeout('initColorboxBlockWhenReady()',100);
}
initColorboxBlockWhenReady();
</script>