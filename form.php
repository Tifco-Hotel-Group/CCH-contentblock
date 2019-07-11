<?php  defined("C5_EXECUTE") or die("Access Denied."); ?>

<div class="form-group">
    <?php  echo $form->label('colwidthselector', t("Column Width Selector") . ' <i class="fa fa-question-circle launch-tooltip" data-original-title="' . t("Width of the block") . '"></i>'); ?>
    <?php  echo isset($btFieldsRequired) && in_array('colwidthselector', $btFieldsRequired) ? '<small class="required">' . t('Required') . '</small>' : null; ?>
    <?php  echo $form->select($view->field('colwidthselector'), $colwidthselector_options, $colwidthselector, array()); ?>
</div>

<div class="form-group">
    <?php  echo $form->label('figureclassselector', t("Figure Class Selector") . ' <i class="fa fa-question-circle launch-tooltip" data-original-title="' . t("Is it a standard block or an offer block") . '"></i>'); ?>
    <?php  echo isset($btFieldsRequired) && in_array('figureclassselector', $btFieldsRequired) ? '<small class="required">' . t('Required') . '</small>' : null; ?>
    <?php  echo $form->select($view->field('figureclassselector'), $figureclassselector_options, $figureclassselector, array()); ?>
</div>

<div class="form-group">
    <?php  echo $form->label('optionalcolourselector', t("Optional Colour and Double Width Selector") . ' <i class="fa fa-question-circle launch-tooltip" data-original-title="' . t("Add background colour or set it as Double width") . '"></i>'); ?>
    <?php  echo isset($btFieldsRequired) && in_array('optionalcolourselector', $btFieldsRequired) ? '<small class="required">' . t('Required') . '</small>' : null; ?>
    <?php  echo $form->select($view->field('optionalcolourselector'), $optionalcolourselector_options, $optionalcolourselector, array()); ?>
</div>

<div class="form-group">
    <?php  echo $form->label('optionalbackgroundselector', t("Optional Art Background Selector") . ' <i class="fa fa-question-circle launch-tooltip" data-original-title="' . t("Add and optional art item") . '"></i>'); ?>
    <?php  echo isset($btFieldsRequired) && in_array('optionalbackgroundselector', $btFieldsRequired) ? '<small class="required">' . t('Required') . '</small>' : null; ?>
    <?php  echo $form->select($view->field('optionalbackgroundselector'), $optionalbackgroundselector_options, $optionalbackgroundselector, array()); ?>
</div>

<div class="form-group">
    <?php 
    if (isset($imageforblock) && $imageforblock > 0) {
        $imageforblock_o = File::getByID($imageforblock);
        if (!is_object($imageforblock_o)) {
            unset($imageforblock_o);
        }
    } ?>
    <?php  echo $form->label('imageforblock', t("Image") . ' <i class="fa fa-question-circle launch-tooltip" data-original-title="' . t("Background Image for the block ") . '"></i>'); ?>
    <?php  echo isset($btFieldsRequired) && in_array('imageforblock', $btFieldsRequired) ? '<small class="required">' . t('Required') . '</small>' : null; ?>
    <?php  echo Core::make("helper/concrete/asset_library")->image('ccm-b-contentblock-imageforblock-' . Core::make('helper/validation/identifier')->getString(18), $view->field('imageforblock'), t("Choose Image"), $imageforblock_o); ?>
</div>

<div class="form-group">
    <?php  echo $form->label('headertext', t("Header Text") . ' <i class="fa fa-question-circle launch-tooltip" data-original-title="' . t("Header text for the Block Max Length = 35") . '"></i>'); ?>
    <?php  echo isset($btFieldsRequired) && in_array('headertext', $btFieldsRequired) ? '<small class="required">' . t('Required') . '</small>' : null; ?>
    <?php  echo $form->textarea($view->field('headertext'), $headertext, array (
  'rows' => 5,
    'maxlength' => 50,
)); ?>
</div>

<div class="form-group">
    <?php  echo $form->label('optionalsubheadertext', t("Optional Sub Header Text") . ' <i class="fa fa-question-circle launch-tooltip" data-original-title="' . t("If you have optional Sub Header Text Max Length = 50") . '"></i>'); ?>
    <?php  echo isset($btFieldsRequired) && in_array('optionalsubheadertext', $btFieldsRequired) ? '<small class="required">' . t('Required') . '</small>' : null; ?>
    <?php  echo $form->textarea($view->field('optionalsubheadertext'), $optionalsubheadertext, array (
  'rows' => 5,
    'maxlength' => 80,
)); ?>
</div>

<div class="form-group">
    <?php  echo $form->label('optionaltext', t("Optional Description Text Block") . ' <i class="fa fa-question-circle launch-tooltip" data-original-title="' . t("Optional description text for the block (mostly special offer blocks) Max Length = 90") . '"></i>'); ?>
    <?php  echo isset($btFieldsRequired) && in_array('optionaltext', $btFieldsRequired) ? '<small class="required">' . t('Required') . '</small>' : null; ?>
    <?php  echo $form->textarea($view->field('optionaltext'), $optionaltext, array (
  'rows' => 5,
    'maxlength' => 130,
)); ?>
</div>

<div class="form-group">
    <?php  echo $form->label('linkforblock', t("Link") . ' <i class="fa fa-question-circle launch-tooltip" data-original-title="' . t("Link for the block") . '"></i>'); ?>
    <?php  echo isset($btFieldsRequired) && in_array('linkforblock', $btFieldsRequired) ? '<small class="required">' . t('Required') . '</small>' : null; ?>
    <?php  echo $form->text($view->field('linkforblock'), $linkforblock, array()); ?>
</div>

<div class="form-group">
    <?php  echo $form->label('atinternettracking', t("AT Internet Tracking") . ' <i class="fa fa-question-circle launch-tooltip" data-original-title="' . t("At Internet Tracking for the block") . '"></i>'); ?>
    <?php  echo isset($btFieldsRequired) && in_array('atinternettracking', $btFieldsRequired) ? '<small class="required">' . t('Required') . '</small>' : null; ?>
    <?php  echo $form->text($view->field('atinternettracking'), $atinternettracking, array (
  'maxlength' => 250,
)); ?>
</div>

<div class="form-group">
    <?php  echo $form->label('buttonforblock', t("Button") . ' <i class="fa fa-question-circle launch-tooltip" data-original-title="' . t("Button for the block") . '"></i>'); ?>
    <?php  echo isset($btFieldsRequired) && in_array('buttonforblock', $btFieldsRequired) ? '<small class="required">' . t('Required') . '</small>' : null; ?>
    <?php  echo $form->text($view->field('buttonforblock'), $buttonforblock, array (
  'maxlength' => 20,    
  'placeholder' => 'READ MORE',
)); ?>
</div>

<div class="form-group">
    <?php  echo $form->label('optionaltriangles', t("Optional Bottom Triangles") . ' <i class="fa fa-question-circle launch-tooltip" data-original-title="' . t("Optional Bottom Triangles") . '"></i>'); ?>
    <?php  echo isset($btFieldsRequired) && in_array('optionaltriangles', $btFieldsRequired) ? '<small class="required">' . t('Required') . '</small>' : null; ?>
    <?php  echo $form->select($view->field('optionaltriangles'), $optionaltriangles_options, $optionaltriangles, array()); ?>
</div>