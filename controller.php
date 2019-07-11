<?php  namespace Application\Block\Contentblock;

defined("C5_EXECUTE") or die("Access Denied.");

use Concrete\Core\Block\BlockController;
use Core;
use File;
use Page;

class Controller extends BlockController
{
    public $helpers = array('form');
    public $btFieldsRequired = array('colwidthselector', 'figureclassselector', 'imageforblock', 'headertext', 'linkforblock');
    protected $btExportFileColumns = array('imageforblock');
    protected $btTable = 'btContentblock';
    protected $btInterfaceWidth = 650;
    protected $btInterfaceHeight = 800;
    protected $btIgnorePageThemeGridFrameworkContainer = false;
    protected $btCacheBlockRecord = true;
    protected $btCacheBlockOutput = true;
    protected $btCacheBlockOutputOnPost = true;
    protected $btCacheBlockOutputForRegisteredUsers = true;
    protected $btCacheBlockOutputLifetime = 0;
    protected $pkg = false;
    
    public function getBlockTypeDescription()
    {
        return t("This is the content block for thew home page");
    }

    public function getBlockTypeName()
    {
        return t("Main Content Block");
    }

    public function getSearchableContent()
    {
        $content = array();
        $content[] = $this->headertext;
        $content[] = $this->optionalsubheadertext;
        $content[] = $this->optionaltext;
        $content[] = $this->atinternettracking;
        $content[] = $this->buttonforblock; 
        return implode(" ", $content);
    }

    public function view()
    {
        $colwidthselector_options = array(
            '1' => "One Column",
            '2' => "Two Column",
            '3' => "Full Width",
            '4' => "Last Box for Mobile"
        );
        $this->set("colwidthselector_options", $colwidthselector_options);
        $figureclassselector_options = array(
            '1' => "Standard Block",
            '2' => "Offer Block"
        );
        $this->set("figureclassselector_options", $figureclassselector_options);
        $optionalcolourselector_options = array(
            '' => "-- " . t("None") . " --",
            '1' => "Purple Block",
            '2' => "Yellow Block",
            '3' => "Double Width"
        );
        $this->set("optionalcolourselector_options", $optionalcolourselector_options);
        $optionalbackgroundselector_options = array(
            '' => "-- " . t("None") . " --",
            '1' => "Owl",
            '2' => "Cat",
            '3' => "Hedgehog",
            '4' => "Standing Bird",
            '5' => "Flying Bird",
            '6' => "Fox"
        );
        $this->set("optionalbackgroundselector_options", $optionalbackgroundselector_options);
        
        if ($this->imageforblock && ($f = File::getByID($this->imageforblock)) && is_object($f)) {
            $this->set("imageforblock", $f);
        } else {
            $this->set("imageforblock", false);
        }        
        $optionaltriangles_options = array(
            '' => "-- " . t("None") . " --",
            '1' => "One Sided",
            '2' => "Double Sided"
        );
        $this->set("optionaltriangles_options", $optionaltriangles_options);
    }

    public function add()
    {
        $this->addEdit();
    }

    public function edit()
    {
        $this->addEdit();
    }

    protected function addEdit()
    {
        $this->set("colwidthselector_options", array(
                '1' => "One Column",
                '2' => "Two Column",
                '3' => "Full Width",
                '4' => "Last Box for Mobile"
            )
        );
        $this->set("figureclassselector_options", array(
                '1' => "Standard Block",
                '2' => "Offer Block"
            )
        );
        $this->set("optionalcolourselector_options", array(
                '' => "-- " . t("None") . " --",
                '1' => "Purple Block",
                '2' => "Yellow Block",
                '3' => "Double Width"
            )
        );
        $this->set("optionalbackgroundselector_options", array(
                '' => "-- " . t("None") . " --",
                '1' => "Owl",
                '2' => "Cat",
                '3' => "Hedgehog",
                '4' => "Standing Bird",
                '5' => "Flying Bird",
                '6' => "Fox"
            )
        );
        $this->set("optionaltriangles_options", array(
                '' => "-- " . t("None") . " --",
                '1' => "One Sided",
                '2' => "Double Sided"
            )
        );
        $this->requireAsset('core/file-manager');
        $this->set('btFieldsRequired', $this->btFieldsRequired);
    }

    public function validate($args)
    {
        $e = Core::make("helper/validation/error");
        if ((in_array("colwidthselector", $this->btFieldsRequired) && (!isset($args["colwidthselector"]) || trim($args["colwidthselector"]) == "")) || (isset($args["colwidthselector"]) && trim($args["colwidthselector"]) != "" && !in_array($args["colwidthselector"], array("1", "2", "3", "4")))) {
            $e->add(t("The %s field has an invalid value.", t("Column Width Selector")));
        }
        if ((in_array("figureclassselector", $this->btFieldsRequired) && (!isset($args["figureclassselector"]) || trim($args["figureclassselector"]) == "")) || (isset($args["figureclassselector"]) && trim($args["figureclassselector"]) != "" && !in_array($args["figureclassselector"], array("1", "2", "3")))) {
            $e->add(t("The %s field has an invalid value.", t("Figure Class Selector")));
        }
        if ((in_array("optionalcolourselector", $this->btFieldsRequired) && (!isset($args["optionalcolourselector"]) || trim($args["optionalcolourselector"]) == "")) || (isset($args["optionalcolourselector"]) && trim($args["optionalcolourselector"]) != "" && !in_array($args["optionalcolourselector"], array("1", "2", "3")))) {
            $e->add(t("The %s field has an invalid value.", t("Optional Colour and Double Width Selector")));
        }
        if ((in_array("optionalbackgroundselector", $this->btFieldsRequired) && (!isset($args["optionalbackgroundselector"]) || trim($args["optionalbackgroundselector"]) == "")) || (isset($args["optionalbackgroundselector"]) && trim($args["optionalbackgroundselector"]) != "" && !in_array($args["optionalbackgroundselector"], array("1", "2", "3", "4", "5", "6")))) {
            $e->add(t("The %s field has an invalid value.", t("Optional Art Background Selector")));
        }
        if (in_array("imageforblock", $this->btFieldsRequired) && (trim($args["imageforblock"]) == "" || !is_object(File::getByID($args["imageforblock"])))) {
            $e->add(t("The %s field is required.", t("Image")));
        }
        if (in_array("headertext", $this->btFieldsRequired) && trim($args["headertext"]) == "") {
            $e->add(t("The %s field is required.", t("Header Text")));
        }
        if (in_array("optionalsubheadertext", $this->btFieldsRequired) && trim($args["optionalsubheadertext"]) == "") {
            $e->add(t("The %s field is required.", t("Optional Sub Header Text")));
        }
        if (in_array("optionaltext", $this->btFieldsRequired) && trim($args["optionaltext"]) == "") {
            $e->add(t("The %s field is required.", t("Optional Description Text Block")));
        }
        if (((!in_array("linkforblock", $this->btFieldsRequired) && trim($args["linkforblock"]) != "") || (in_array("linkforblock", $this->btFieldsRequired))) && !filter_var($args["linkforblock"], FILTER_VALIDATE_URL)) {
            $e->add(t("The %s field does not have a valid URL.", t("Link")));
        }
        if (in_array("buttonforblock", $this->btFieldsRequired) && (trim($args["buttonforblock"]) == "")) {
            $e->add(t("The %s field is required.", t("Button")));
        }
        if ((in_array("optionaltriangles", $this->btFieldsRequired) && (!isset($args["optionaltriangles"]) || trim($args["optionaltriangles"]) == "")) || (isset($args["optionaltriangles"]) && trim($args["optionaltriangles"]) != "" && !in_array($args["optionaltriangles"], array("1", "2")))) {
            $e->add(t("The %s field has an invalid value.", t("Optional Bottom Triangles")));
        }
        return $e;
    }

    public function composer()
    {
        $this->edit();
    }
}