<?
	Loader::block('library_file');
	defined('C5_EXECUTE') or die(_("Access Denied."));
	class ColorBoxImageBlockController extends BlockController {

		protected $btInterfaceWidth = 300;
		protected $btInterfaceHeight = 440;
		protected $btTable = 'btColorBoxContentImage';

		public function getBlockTypeDescription() {
			return t("Adds images from the library to pages with the Color Box effect.");
		}

		public function getBlockTypeName() {
			return t("Color Box Image");
		}

		public function getJavaScriptStrings() {
			return array(
				'image-required' => t('You must select an image.')
			);
		}


		function getFileID() {return $this->fID;}

		function getFileObject() {
			return File::getByID($this->fID);
		}
		function getAltText() {return $this->altText;}
		function gettitle() {return $this->title;}

		public function save($args) {
			$args['fID'] = ($args['fID'] != '') ? $args['fID'] : 0;
			$args['maxWidth'] = (intval($args['maxWidth']) > 0) ? intval($args['maxWidth']) : 0;
			$args['maxHeight'] = (intval($args['maxHeight']) > 0) ? intval($args['maxHeight']) : 0;
			parent::save($args);
		}

    public function on_page_view() {
       if($this->cboxDesign == ""){
            $this->cboxDesign = "1";
       }

       $html = Loader::helper('html');

       $v = View::GetInstance();

       $b = $this->getBlockObject();
       $btID = $b->getBlockTypeID();
       $bt = BlockType::getByID($btID);

       $url = Loader::helper('concrete/urls');

       $v->addHeaderItem('<link rel="stylesheet" type="text/css" href="' . $url->getBlockTypeAssetsURL($bt) . '/css/design'.$this->cboxDesign.'/colorbox.css" />','CONTROLLER');
}

		function getContentAndGenerate($align = false, $style = false, $id = null) {
			$db = Loader::db();
			$c = Page::getCurrentPage();
			$bID = $this->bID;

			$f = $this->getFileObject();
			$fullPath = $f->getPath();
			$relPath = $f->getRelativePath();
			$size = @getimagesize($fullPath);

			if ($this->maxWidth > 0 || $this->maxHeight > 0) {
				$mw = $this->maxWidth > 0 ? $this->maxWidth : $size[0];
				$mh = $this->maxHeight > 0 ? $this->maxHeight : $size[1];
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

				if ($this->maxWidth > 0 || $this->maxHeight > 0) {
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
$("a[rel='<?=$bID?>']").colorbox();
});
</script>
			<?
			return $img;
			}

		}



?>