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
	<li class=""><a id="ccm-colorbox-tab-preview"  href="javascript:void(0);"><?php echo t('Preview')?></a></li>
</ul>

<div id="ccm-colorboxBlockPane-internal" class="ccm-colorboxBlockPane">
	<div class="ccm-block-field-group">
		<h2><?php echo t('Image')?></h2>
		<?php echo $al->image('ccm-b-image', 'fID', t('Choose Image'), $bf);?>
	</div>

	<div class="ccm-block-field-group">
		<h2><?php echo t('Alt Text')?></h2>
		<?php echo $form->text('altText', $altText, array('style' => 'width: 250px')); ?>
	</div>

	<div class="ccm-block-field-group">
		<h2><?php echo t('Title/Caption')?></h2>
		<?php echo  $form->text('title', $title, array('style' => 'width: 250px')); ?>
	</div>
</div>

<div id="ccm-colorboxBlockPane-external" class="ccm-colorboxBlockPane">
	<div class="ccm-block-field-group">
		<h2><?php echo t('external')?></h2>
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


</div>

<div id="ccm-colorboxBlockPane-text" class="ccm-colorboxBlockPane">
	<div class="ccm-block-field-group">
		<h2><?php echo t('text')?></h2>
	</div>
</div>

<div id="ccm-colorboxBlockPane-visual" class="ccm-colorboxBlockPane">
	<div class="ccm-block-field-group">

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
			<select name="cboxDesign">
				<option value="elastic" <?php if ($controller->getTransition() == 'elastic') echo "selected"?>><?php echo t('Elastic')?></option>
				<option value="fade" <?php if ($controller->getTransition() == 'fade') echo "selected"?>><?php echo t('Fade')?></option>
				<option value="none" <?php if ($controller->getTransition() == 'none') echo "selected"?>><?php echo t('None')?></option>
			</select>
		</div>

	</div>
</div>

<div id="ccm-colorboxBlockPane-slideshow" class="ccm-colorboxBlockPane">
	<div class="ccm-block-field-group">
		<h2><?php echo t('slideshow')?></h2>
	</div>
</div>

<div id="ccm-colorboxBlockPane-preview" class="ccm-colorboxBlockPane">
	<div class="ccm-block-field-group">
		<h2><?php echo t('preview')?></h2>
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