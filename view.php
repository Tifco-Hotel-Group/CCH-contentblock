<?php  defined("C5_EXECUTE") or die("Access Denied."); ?>
<?php  if (trim($colwidthselector) != "") { ?>
    <div class="
<?php  switch($colwidthselector) {
case "1": 
        echo "col-md-4 col-sm-6";
    // ENTER MARKUP HERE FOR FIELD "Column Width Selector" : CHOICE "One Column"
    break;
case "2":
        echo "col-md-8 col-sm-12";
    // ENTER MARKUP HERE FOR FIELD "Column Width Selector" : CHOICE "Two Column"
   break;
case "3":
        echo "col-md-12";
    // ENTER MARKUP HERE FOR FIELD "Column Width Selector" : CHOICE "Full Width"
    break;
case "4":
        echo "col-md-4 col-sm-12";
    // ENTER MARKUP HERE FOR FIELD "Column Width Selector" : CHOICE "Last Box for Mobile"
    break;
                                } ?> content-block revealOnScroll" data-animation="fadeIn"><?php  } ?>
<?php  if (trim($figureclassselector) != "") { ?>
    <figure class="<?php  switch($figureclassselector) {
case "1":
        echo "animate-justimg";
    // ENTER MARKUP HERE FOR FIELD "Figure Class Selector" : CHOICE "Standard Block"
    break;
case "2":
        echo "animate-box";
    // ENTER MARKUP HERE FOR FIELD "Figure Class Selector" : CHOICE "Offer Block"
    break;
                                } ?><?php  } ?>
<?php  if (trim($optionalcolourselector) != "") { ?>    
<?php  switch($optionalcolourselector) {
case "1":echo "purplebox";
    // ENTER MARKUP HERE FOR FIELD "Optional Colour and Double Width Selector" : CHOICE "Purple Block"
    break;
case "2":echo "yellowbox";
    // ENTER MARKUP HERE FOR FIELD "Optional Colour and Double Width Selector" : CHOICE "Yellow Block"
    break;
case "3":echo "double-width";
    // ENTER MARKUP HERE FOR FIELD "Optional Colour and Double Width Selector" : CHOICE "Double Width"
    break;
                                } ?><?php  } ?>
<?php  if (trim($optionalbackgroundselector) != "") { ?>    
<?php  switch($optionalbackgroundselector) {
case "1":echo "owlbg";
    // ENTER MARKUP HERE FOR FIELD "Optional Art Background Selector" : CHOICE "Owl"
    break;
case "2":echo "catbg";
    // ENTER MARKUP HERE FOR FIELD "Optional Art Background Selector" : CHOICE "Cat"
    break;
case "3":echo "hedgehogbg";
    // ENTER MARKUP HERE FOR FIELD "Optional Art Background Selector" : CHOICE "Hedgehog"
    break;
case "4":echo "standingbirdbg";
    // ENTER MARKUP HERE FOR FIELD "Optional Art Background Selector" : CHOICE "Bird"
    break;
case "5":echo "flyingbirdbg";
    // ENTER MARKUP HERE FOR FIELD "Optional Art Background Selector" : CHOICE "FlyingBird"
    break;        
case "6":echo "foxbg";
    // ENTER MARKUP HERE FOR FIELD "Optional Art Background Selector" : CHOICE "Fox"
    break;
                                } ?><?php  } ?>">
<?php  if ($imageforblock) { ?>
    <?php 
$imageforblock_tag = Core::make('html/image', array($imageforblock))->getTag();
$imageforblock_tag->alt($imageforblock->getTitle());
echo $imageforblock_tag;
?><?php  } ?>
<figcaption>
<?php  if (isset($headertext) && trim($headertext) != "") { ?>
    <h2><?php  echo nl2br(h($headertext)); ?></h2><?php  } ?>
<?php  if (isset($optionalsubheadertext) && trim($optionalsubheadertext) != "") { ?>
    <h3><?php  echo nl2br(h($optionalsubheadertext)); ?></h3><?php  } ?>
<?php  if (isset($optionaltext) && trim($optionaltext) != "") { ?>
    <p><?php  echo nl2br(h($optionaltext)); ?></p><?php  } ?>
<?php  if (isset($linkforblock) && trim($linkforblock) != "") { ?>
    <?php  echo "<a href=\"" . $linkforblock . "\" "; ?>>Read More</a><?php  } ?>
<?php  if (isset($buttonforblock) && trim($buttonforblock) != "") { ?>
    <span class="inner-content-btn-holder"><a class="btn btn-flag" href="#" role="button" title="Read More"><?php  echo h($buttonforblock); ?></a></span><?php  } ?>
</figcaption></figure>
<?php  if (trim($optionaltriangles) != "") { ?>    
<?php  switch($optionaltriangles) {
case "1":
        echo "<div class=floats-one-sided-triangle><img src=https://www.clontarfcastle.ie/application/themes/clontarf_castle/img/triangles-oneside.png alt=triangles></div>";
    // ENTER MARKUP HERE FOR FIELD "Optional Bottom Triangles" : CHOICE "One Sided"
    break;
case "2":
        echo"<div class=floats-both-sided-triangle><img src=https://www.clontarfcastle.ie/application/themes/clontarf_castle/img/triangles-bothsides.png alt=triangles></div>";
    // ENTER MARKUP HERE FOR FIELD "Optional Bottom Triangles" : CHOICE "Double Sided"
    break;
                                } ?><?php  } ?>
</div>