<?php  

defined('C5_EXECUTE') or die(_("Access Denied."));
$includeAssetLibrary = true;
$assetLibraryPassThru = array(
	'type' => 'image'
);
$al = Loader::helper('concrete/asset_library');
?>
<div class="ccm-block-field-group">
<h2><?=t('Image')?></h2>
<?=$al->image('ccm-b-image', 'fID', t('Choose Image'), $bf);?>
</div>

<div class="ccm-block-field-group">
<h2><?=t('Alt Text')?></h2>
<?= $form->text('altText', array('style' => 'width: 250px')); ?>
</div>

<div class="ccm-block-field-group">
<h2><?=t('Title/Caption')?></h2>
<?= $form->text('title', array('style' => 'width: 250px')); ?>
</div>

<div class="ccm-block-field-group">
<h2><?=t('Maximum Dimensions')?></h2>
<table border="0" cellspacing="0" cellpadding="0">
<tr>
<td><?=t('Width')?>&nbsp;</td>
<td><?= $form->text('maxWidth', array('style' => 'width: 60px')); ?></td>
<td><?=t('Height')?>&nbsp;</td>
<td><?= $form->text('maxHeight', array('style' => 'width: 60px')); ?></td>
</tr>
</table>

</div>