<?php
defined('C5_EXECUTE') or die(_("Access Denied."));
Loader::block('library_file');
class ColorBoxImageBlockController extends BlockController {

	protected $btInterfaceWidth = 550;
	protected $btInterfaceHeight = 440;
	protected $btTable = 'btColorBoxContentImage';

	public $cboxDesign = "1";

	/**
	 * Used for localization. If we want to localize the name/description we have to include this
	 */
	public function getBlockTypeDescription() {
		return t("Adds images from the library to pages with the Color Box effect.");
	}

	public function getBlockTypeName() {
		return t("Color Box Image");
	}

	public function getJavaScriptStrings() {
		return array(
			'image-required' => t('You must select an image.'),
			'image-of-total' => t('image {current} of {total}'),
			'previous' => t('previous'),
			'next' => t('next'),
			'close' => t('close'),
			'start slideshow' => t('start slideshow'),
			'stop slideshow' => t('stop slideshow'),
		);
	}

	function getFileID() {
		return $this->fID;
	}

	function getFileObject() {
		return File::getByID($this->fID);
	}

	function getAltText() {
		return $this->altText;
	}

	function getTitle() {
		return $this->title;
	}

	function getDesign() {
		return $this->cboxDesign;
	}
	function getTransition() {
		return $this->transition;
	}

	function getOnOpen() {
		if(isset($this->onOpen)){
			return $this->onOpen;
		}
		else {
			return null;
		}
	}

	function getOnLoad() {
		if(isset($this->onLoad)){
			return $this->onLoad;
		}
		else {
			return null;
		}
	}

	function getOnComplete() {
		if(isset($this->onComplete)){
			return $this->onComplete;
		}
		else {
			return null;
		}
	}

	function getOnCleanup() {
		if(isset($this->onCleanup)){
			return $this->onCleanup;
		}
		else {
			return null;
		}
	}

	function getOnClosed() {
		if(isset($this->onClosed)){
			return $this->onClosed;
		}
		else {
			return null;
		}
	}

## 		intval()
##		floatval()
##		is_numeric()

	public function save($data) {
		$args['fID'] = ($args['fID'] != "") ? $args['fID'] : "0";
		$args['imgWidth'] = (intval($args['imgWidth']) > "0") ? intval($args['imgWidth']) : "100";
		$args['imgHeight'] = (intval($args['imgHeight']) > "0") ? intval($args['imgHeight']) : "100";

		if($data['cboxDesign']=="") { $args['cboxDesign'] = $cboxDesign; } else { $args['cboxDesign'] = trim($data['cboxDesign']); }


		$args['transition'] = isset($data['transition']) ? $data['transition'] : "";
		$args['speed'] = isset($data['speed']) ? $data['speed'] : "350";
		$args['href'] = isset($data['href']) ? $data['href'] : "";
		$args['title'] = isset($data['title']) ? $data['title'] : "";
		$args['rel'] = isset($data['rel']) ? $data['rel'] : "";

		$args['boxWidth'] = intval($data['boxWidth']);
		$args['boxHeight'] = intval($data['boxHeight']);
		$args['boxInnerWidth'] = intval($data['boxInnerWidth']);
		$args['boxInnerHeight'] = intval($data['boxInnerHeight']);
		$args['boxInitialWidth'] = intval($data['boxInitialWidth']);
		$args['boxInitialHeight'] = intval($data['boxInitialHeight']);
		$args['boxMaxWidth'] = intval($data['boxMaxWidth']);
		$args['boxMaxHeight'] = intval($data['boxMaxHeight']);

		$args['scalePhotos'] = isset($data['scalePhotos']) ? $data['scalePhotos'] : "";
		$args['scrolling'] = isset($data['scrolling']) ? $data['scrolling'] : "";
		$args['iframe'] = isset($data['iframe']) ? $data['iframe'] : "";
		$args['inline'] = isset($data['inline']) ? $data['inline'] : "";
		$args['html'] = isset($data['html']) ? $data['html'] : "";
		$args['photo'] = isset($data['photo']) ? $data['photo'] : "";
		$args['opacity'] = intval($data['opacity']);
		$args['open'] = isset($data['open']) ? $data['open'] : "";
		$args['preloading'] = isset($data['preloading']) ? $data['preloading'] : "";
		$args['overlayClose'] = isset($data['overlayClose']) ? $data['overlayClose'] : true;

		$args['slideshow'] = isset($data['slideshow']) ? $data['slideshow'] : "";
		$args['slideshowSpeed'] = (intval($args['slideshowSpeed']) > "0") ? intval($args['slideshowSpeed']) : "";
		$args['slideshowAuto'] = isset($data['slideshowAuto']) ? $data['slideshowAuto'] : "";
		$args['slideshowStart'] = isset($data['slideshowStart']) ? $data['slideshowStart'] : t("start slideshow");
		$args['slideshowStop'] = isset($data['slideshowStop']) ? $data['slideshowStop'] : t("stop slideshow");

		$args['current'] = isset($data['current']) ? $data['current'] : "{current} ".t("of")." {total}";
		$args['previous'] = isset($data['previous']) ? $data['previous'] : t("previous");
		$args['next'] = isset($data['next']) ? $data['next'] : t("next");
		$args['close'] = isset($data['close']) ? $data['close'] : t("close");

		$args['onOpen'] = isset($data['onOpen']) ? $data['onOpen'] : "";
		$args['onLoad'] = isset($data['onLoad']) ? $data['onLoad'] : "";
		$args['onComplete'] = isset($data['onComplete']) ? $data['onComplete'] : "";
		$args['onCleanup'] = isset($data['onCleanup']) ? $data['onCleanup'] : "";
		$args['onClosed'] = isset($data['onClosed']) ? $data['onClosed'] : "";

		parent::save($args);
	}

	public function view() {

	}

	public function on_page_view() {
		$html = Loader::helper('html');

		$v = View::GetInstance();

		$b = $this->getBlockObject();
		$btID = $b->getBlockTypeID();
		$bt = BlockType::getByID($btID);
		$url = Loader::helper('concrete/urls');

		$v->addHeaderItem('<link rel="stylesheet" class="colorbox_design_'.$this->cboxDesign.'" type="text/css" href="' . $url->getBlockTypeAssetsURL($bt) . '/css/design'.$this->cboxDesign.'/colorbox.css" media="all" />','CONTROLLER');
	}

	function getContentAndGenerate($align = false, $style = false, $id = null) {
		$db = Loader::db();
		$c = Page::getCurrentPage();
		$bID = $this->bID;

		$f = $this->getFileObject();
		$fullPath = $f->getPath();
		$relPath = $f->getRelativePath();
		$size = @getimagesize($fullPath);

		if ($this->imgWidth > 0 || $this->imgHeight > 0) {
			$mw = $this->imgWidth > 0 ? $this->imgWidth : $size[0];
			$mh = $this->imgHeight > 0 ? $this->imgHeight : $size[1];
			$ih = Loader::helper('image');
			$thumb = $ih->getThumbnail($f, $mw, $mh);
			$sizeStr = ' width="' . $thumb->width . '" height="' . $thumb->height . '"';
			$relPath = $thumb->src;
		} else {
			$sizeStr = $size[3];
		}

		$img = "<img border=\"0\" class=\"ccm-image-block\" alt=\"{$this->altText}\" src=\"{$relPath}\" {$sizeStr} ";
		$img .= ($align) ? "align=\"{$align}\" " : '';

		$img .= ($style) ? "style=\"{$style}\" " : '';

		if ($this->imgWidth > 0 || $this->imgHeight > 0) {
			$thumbHover = $ih->getThumbnail($fos, $mw, $mh);
			$relPathHover = $thumbHover->src;
		}

		//$img .= " onmouseover=\"this.src = '{$relPathHover}'\" ";
		//$img .= " onmouseout=\"this.src = '{$relPath}'\" ";

		$img .= ($id) ? "id=\"{$id}\" " : "";
		$img .= "/>";
		$img = "<a href=\"{$relPath}\" rel=\"{$bID}\" title=\"{$this->title}\">" . $img ."</a>";
		?>
		<script type="text/javascript">
		$(document).ready(function(){

			$("a[rel='<?php echo $bID?>']").colorbox({
				onOpen:function(){
					<?php
					if(isset($this->transition) != "") echo $this->transition.",";
					if(isset($this->speed) != "") echo $this->speed.",";
					if(isset($this->href) != "") echo $this->href.",";
					// if(isset($this->title) != "") echo $this->title.",";
					if(isset($this->rel) != "") echo $this->rel.",";
					if(isset($this->boxWidth) != "") echo $this->boxWidth.",";
					if(isset($this->boxHeight) != "") echo $this->boxHeight.",";
					if(isset($this->innerWidth) != "") echo $this->innerWidth.",";
					if(isset($this->innerHeight) != "") echo $this->innerHeight.",";
					if(isset($this->initialWidth) != "") echo $this->initialWidth.",";
					if(isset($this->initialHeight) != "") echo $this->initialHeight.",";
					if(isset($this->maxWidth) != "") echo $this->maxWidth.",";
					if(isset($this->maxHeight) != "") echo $this->maxHeight.",";
					if(isset($this->scalePhotos)) echo $this->scalePhotos.",";
					if(isset($this->scrolling)) echo $this->scrolling.",";
					if(isset($this->iframe)) echo $this->iframe.",";
					if(isset($this->inline)) echo $this->inline.",";
					if(isset($this->html)) echo $this->html.",";
					if(isset($this->photo)) echo $this->photo.",";
					if(isset($this->opacity)) echo $this->opacity.",";
					if(isset($this->open)) echo $this->open.",";
					if(isset($this->preloading)) echo $this->preloading.",";
					if(isset($this->overlayClose)) echo $this->overlayClose.",";
					if(isset($this->slideshow)) echo $this->slideshow.",";
					if(isset($this->slideshowSpeed)) echo $this->slideshowSpeed.",";
					if(isset($this->slideshowAuto)) echo $this->slideshowAuto.",";
					if(isset($this->slideshowStart)) echo $this->slideshowStart.",";
					if(isset($this->slideshowStop)) echo $this->slideshowStop.",";
					if(isset($this->current)) echo $this->current.",";
					if(isset($this->previous)) echo $this->previous.",";
					if(isset($this->next)) echo $this->next.",";
					if(isset($this->close)) echo $this->close;
					echo $this->getOnOpen();
					echo $this->getOnLoad();
					echo $this->getOnComplete();
					echo $this->getOnCleanup();
					echo $this->getOnClosed();
					?>
					$("link.colorbox_design_<?php echo $this->cboxDesign?>").removeAttr("disabled");
					$.fn.colorbox.init();
				},
				onClosed:function(){
					$("link.colorbox_design_<?php echo $this->cboxDesign?>").attr('disabled', 'disabled');
				}
			});

		});
		</script>
		<?php
		return $img;
	}

}
?>