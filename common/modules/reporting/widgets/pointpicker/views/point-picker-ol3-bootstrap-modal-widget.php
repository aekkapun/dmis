<?php
$triggerId =  ($opts['triggerId'])?$opts['triggerId']:"button#btn-pointpicker";
$widgetDivId = $opts['widgetDivId'];
$mapDivId =$opts['mapDivId'];
$iLatId = $opts['iLatId'];
$iLonId = $opts['iLonId'];
$iPlacenameId = $opts['iPlacenameId'];
?>


<?php if (!$opts['triggerId']):; ?>
    <button id="<?php echo $triggerId ?>" class="buttons pointpicker-trigger btn btn-primary">Point from map</button>
<?php endif; ?>


<!--
<div id="<?php //echo $widgetDivId; ?>" class="pointpicker hidden container padded" >
    <div class="pointpickerdialog" title="Locate on map">
        <div class="pointpickerfields">
            <input id ='<?php //echo $iLatId; ?>' class="pointpickerfield latitude " type="text" placeholder="latitude">
            <input id ='<?php //echo $iLonId; ?>' class="pointpickerfield longitude " type="text" placeholder="longitude">
            <input id ='<?php //echo $iPlacenameId; ?>' class="pointpickerfield placename autocomplete " type="text" placeholder="Search for placename" style="width:100%">
        </div>
        <div class="pointpickeractions">
			<button class="pointpicker cancel btn btn-primary" type="button">Cancel</button>
            <button class="pointpicker ok btn btn-primary" type="button">OK</button>
            <button class = "pointpicker zoomtocurrent btn btn-primary" type = "button">ZoomToCurrent</button>
        </div>
        <?php //if(!isset($opts['externalMapDivId'])):?>
			<div id="<?php //echo $mapDivId; ?>" class="pointpickermap" style="  height:400px; width:600px; border: solid"></div>
        <?php //endif; ?>
    </div>
</div>
-->

<div id="<?php echo $widgetDivId; ?>" class="well" style="display: none;">
	<div class="pointpickerfields row">
		<input id ='<?php echo $iLatId; ?>' class="pointpickerfield latitude col-sm-4" type="text" placeholder="latitude">
        <input id ='<?php echo $iLonId; ?>' class="pointpickerfield longitude col-sm-4" type="text" placeholder="longitude">
        <input id ='<?php echo $iPlacenameId; ?>' class="pointpickerfield placename autocomplete col-sm-4" type="text" placeholder="Search for placename" >
	</div>	
	<div class="pointpickeractions row">
		<button class="pointpicker cancel btn btn-primary col-sm-4" type="button">Cancel</button>
        <button class="pointpicker ok btn btn-primary col-sm-4" type="button">OK</button>
        <button class = "pointpicker zoomtocurrent btn btn-primary col-sm-4" type = "button">ZoomToCurrent</button>
	</div>
	<div class="row">
		<div id = "<?php echo $mapDivId; ?>" class="col-sm-12" style="  height:100%; width:100%; border: solid"></div>
	</div>	
</div>

<?= \common\modules\reporting\widgets\placeautocomplete\PlaceAutocompleteWidget::widget(
    [
        'latitudeId' => $iLatId,
        'longitudeId' => $iLonId,
        'placenameId' => $iPlacenameId,
        'externalInputId'=>$iPlacenameId,
    ]

)?>

