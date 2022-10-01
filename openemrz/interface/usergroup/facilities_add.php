<?php
/**
 * facilities_add.php
 *
 * @package   OpenEMR
 * @link      http://www.open-emr.org
 * @author    Brady Miller <brady.g.miller@gmail.com>
 * @copyright Copyright (c) 2018 Brady Miller <brady.g.miller@gmail.com>
 * @license   https://github.com/openemr/openemr/blob/master/LICENSE GNU General Public License 3
 */


require_once("../globals.php");
require_once("../../library/acl.inc");
require_once("$srcdir/options.inc.php");
require_once("$srcdir/erx_javascript.inc.php");

use OpenEMR\Common\Csrf\CsrfUtils;
use OpenEMR\Core\Header;
use OpenEMR\Services\FacilityService;



$facilityService = new FacilityService();

$alertmsg = '';
?>
<html>
<head>
    <?php Header::setupHeader(['opener', 'jquery-ui']); ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <!-- <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet"> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript" src="../main/calendar/modules/PostCalendar/pnincludes/AnchorPosition.js"></script>
<script type="text/javascript" src="../main/calendar/modules/PostCalendar/pnincludes/PopupWindow.js"></script>
<script type="text/javascript" src="../main/calendar/modules/PostCalendar/pnincludes/ColorPicker2.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxy/1.6.1/scripts/jquery.ajaxy.min.js" integrity="sha512-bztGAvCE/3+a1Oh0gUro7BHukf6v7zpzrAb3ReWAVrt+bVNNphcl2tDTKCBr5zk7iEDmQ2Bv401fX3jeVXGIcA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script> -->
<style>
.switch {
	position: relative;
	display: block;
	vertical-align: top;
	width: 100px;
	height: 30px;
	padding: 3px;
	margin: 0 10px 10px 0;
	background: linear-gradient(to bottom, #eeeeee, #FFFFFF 25px);
	background-image: -webkit-linear-gradient(top, #eeeeee, #FFFFFF 25px);
	border-radius: 18px;
	box-shadow: inset 0 -1px white, inset 0 1px 1px rgba(0, 0, 0, 0.05);
	cursor: pointer;
}
.switch-input {
	position: absolute;
	top: 0;
	left: 0;
	opacity: 0;
}
.switch-label {
	position: relative;
	display: block;
	height: inherit;
	font-size: 10px;
	text-transform: uppercase;
	background: #eceeef;
	border-radius: inherit;
	box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.12), inset 0 0 2px rgba(0, 0, 0, 0.15);
}
.switch-label:before, .switch-label:after {
	position: absolute;
	top: 50%;
	margin-top: -.5em;
	line-height: 1;
	-webkit-transition: inherit;
	-moz-transition: inherit;
	-o-transition: inherit;
	transition: inherit;
}
.switch-label:before {
	content: attr(data-off);
	right: 11px;
	color: #aaaaaa;
	text-shadow: 0 1px rgba(255, 255, 255, 0.5);
}
.switch-label:after {
	content: attr(data-on);
	left: 11px;
	color: #FFFFFF;
	text-shadow: 0 1px rgba(0, 0, 0, 0.2);
	opacity: 0;
}
.switch-input:checked ~ .switch-label {
	background: #EAEDED;
	box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.15), inset 0 0 3px rgba(0, 0, 0, 0.2);
}
.switch-input:checked ~ .switch-label:before {
	opacity: 0;
}
.switch-input:checked ~ .switch-label:after {
	opacity: 1;
}
.switch-handle {
	position: absolute;
	top: 4px;
	left: 4px;
	width: 28px;
	height: 28px;
	background: linear-gradient(to bottom, #FFFFFF 40%, #f0f0f0);
	background-image: -webkit-linear-gradient(top, #FFFFFF 40%, #f0f0f0);
	border-radius: 100%;
	box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.2);
}
.switch-handle:before {
	content: "";
	position: absolute;
	top: 50%;
	left: 50%;
	margin: -6px 0 0 -6px;
	width: 12px;
	height: 12px;
	background: linear-gradient(to bottom, #eeeeee, #FFFFFF);
	background-image: -webkit-linear-gradient(top, #eeeeee, #FFFFFF);
	border-radius: 6px;
	box-shadow: inset 0 1px rgba(0, 0, 0, 0.02);
}
.switch-input:checked ~ .switch-handle {
	left: 74px;
	box-shadow: -1px 1px 5px rgba(0, 0, 0, 0.2);
}

Transition
========================== */
/* .switch-label, .switch-handle {
	transition: All 0.3s ease;
	-webkit-transition: All 0.3s ease;
	-moz-transition: All 0.3s ease;
	-o-transition: All 0.3s ease;
}
</style>

<!-- validation library -->
<!--//Not lbf forms use the new validation, please make sure you have the corresponding values in the list Page validation-->
<?php    $use_validate_js = 1;?>
<?php  require_once($GLOBALS['srcdir'] . "/validation/validation_script.js.php"); ?>
<?php
//Gets validation rules from Page Validation list.
//Note that for technical reasons, we are bypassing the standard validateUsingPageRules() call.
$collectthis = collectValidationPageRules("/interface/usergroup/facilities_add.php");
if (empty($collectthis)) {
    $collectthis = "undefined";
} else {
    $collectthis = json_sanitize($collectthis["facility-add"]["rules"]);
}

// Old Browser comp trigger on js

if (isset($_POST["mode"]) && $_POST["mode"] == "facility") {
    echo '
<script type="text/javascript">
<!--
dlgclose();
//-->
</script>

	';
}
?>
<script type="text/javascript">
/// todo, move this to a common library

var collectvalidation = <?php echo $collectthis; ?>;

function submitform() {

    var valid = submitme(1, undefined, 'facility-add', collectvalidation);
    if (!valid) return;

    <?php if ($GLOBALS['erx_enable']) { ?>
    alertMsg='';
    f=document.forms[0];
    for(i=0;i<f.length;i++){
        if(f[i].type=='text' && f[i].value)
        {
            if(f[i].name == 'facility' || f[i].name == 'Washington')
            {
                alertMsg += checkLength(f[i].name,f[i].value,35);
                alertMsg += checkFacilityName(f[i].name,f[i].value);
            }
            else if(f[i].name == 'street')
            {
                alertMsg += checkLength(f[i].name,f[i].value,35);
                alertMsg += checkAlphaNumeric(f[i].name,f[i].value);
            }
            else if(f[i].name == 'phone' || f[i].name == 'fax')
            {
                alertMsg += checkPhone(f[i].name,f[i].value);
            }
            else if(f[i].name == 'federal_ein')
            {
                alertMsg += checkLength(f[i].name,f[i].value,10);
                alertMsg += checkFederalEin(f[i].name,f[i].value);
            }
        }
    }
    if(alertMsg)
    {
        alert(alertMsg);
        return false;
    }
    <?php } ?>

    top.restoreSession();

    let post_url = $("#facility-add").attr("action");
    let request_method = $("#facility-add").attr("method");
    let form_data = $("#facility-add").serialize();

    $.ajax({
        url: post_url,
        type: request_method,
        data: form_data
    }).done(function (r) { //
        dlgclose('refreshme', false);
    });
    return false;
}

function toggle( target, div ) {

    $mode = $(target).find(".indicator").text();
    if ( $mode == "collapse" ) {
        $(target).find(".indicator").text( "expand" );
        $(div).hide();
    } else {
        $(target).find(".indicator").text( "collapse" );
        $(div).show();
    }

}

$(function(){

    $("#dem_view").click( function() {
        toggle( $(this), "#DEM" );
    });

});

$(function(){
    $("#cancel").click(function() {
          dlgclose();
     });

    /**
     * add required/star sign to required form fields
     */
    for (var prop in collectvalidation) {
        //if (collectvalidation[prop].requiredSign)
        if (collectvalidation[prop].presence)
            jQuery("input[name='" + prop + "']").after('*');
    }
});
var cp = new ColorPicker('window');
  // Runs when a color is clicked
function pickColor(color) {
    document.getElementById('ncolor').value = color;
}
var field;
function pick(anchorname,target) {
    var cp = new ColorPicker('window');
    field=target;
        cp.show(anchorname);
}
function displayAlert()
{
    if(document.getElementById('primary_business_entity').checked==false)
    alert(<?php echo xlj('Primary Business Entity tax id is used as account id for NewCrop ePrescription. Changing the facility will affect the working in NewCrop.'); ?>);
    else if(document.getElementById('primary_business_entity').checked==true)
    alert(<?php echo xlj('Once the Primary Business Facility is set, it should not be changed. Changing the facility will affect the working in NewCrop ePrescription.'); ?>);
}
</script>
<link rel="stylesheet" href="<?php echo $css_header;?>" type="text/css">

</head>
<body class="body_top">
<table>
<tr><td>
    <span class="title"><?php echo xlt('Add Facility'); ?></span>&nbsp;&nbsp;&nbsp;</td>
    <td colspan=5 align=center style="padding-left:2px;">
        <a onclick="submitform();" class="css_button large_button" name='form_save' id='form_save' href='#'>
            <span class='css_button_span large_button_span'><?php echo xlt('Save'); ?></span>
        </a>
        <a class="css_button large_button" id='cancel' href='#' >
            <span class='css_button_span large_button_span'><?php echo xlt('Cancel'); ?></span>
        </a>
</td></tr>
</table>

<br>

<form name='facility-add' id='facility-add' method='post' action="facilities.php">
    <input type="hidden" name="csrf_token_form" value="<?php echo attr(CsrfUtils::collectCsrfToken()); ?>" />
    <input type=hidden name=mode value="facility">
    <table border=0 cellpadding=0 cellspacing=0>
        <tr>
        <td><span class="text"><?php echo xlt('Name'); ?>: </span></td><td><input type=entry name=facility size=20 value=""></td>
        <td width=20>&nbsp;</td>
        <td><span class="text"><?php echo xlt('Phone'); ?>: </span></td><td><input type=entry name=phone size=20 value=""></td>
        </tr>
        <tr>
        <td><span class="text"><?php echo xlt('Address'); ?>: </span></td><td><input type=entry size=20 name=street value=""></td>
        <td>&nbsp;</td>
        <td><span class="text"><?php echo xlt('Fax'); ?>: </span></td><td><input type=entry name=fax size=20 value=""></td>
        </tr>
        <tr>
        <td><span class="text"><?php echo xlt('City'); ?>: </span></td><td><input type=entry size=20 name=city value=""></td>
        <td>&nbsp;</td>
        <td><span class="text"><?php echo xlt('Zip Code'); ?>: </span></td><td><input type=entry size=20 name=postal_code value=""></td>
        </tr>
        <tr>
        <td><span class="text"><?php echo xlt('State'); ?>: </span></td><td><input type=entry size=20 name=state value=""></td>
        <td>&nbsp;</td>
        <td><span class="text"><?php echo xlt('Tax ID'); ?>: </span></td><td><select name=tax_id_type><option value="EI"><?php echo xlt('EIN'); ?></option><option value="SY"><?php echo xlt('SSN'); ?></option></select><input type=entry size=11 name=federal_ein value=""></td>
        </tr>
        <tr>
        <td height="22"><span class="text"><?php echo xlt('Country'); ?>: </span></td><td><input type=entry size=20 name=country_code value=""></td>
        <td>&nbsp;</td>
        <td><span class="text"><?php echo ($GLOBALS['simplified_demographics'] ? xlt('Facility Code') : xlt('Facility NPI')); ?>:
        </span></td><td><input type=entry size=20 name=facility_npi value=""></td>
        </tr>
        <tr>
            <td>&nbsp;</td><td>&nbsp;</td><td width="20"></td><td><span class=text><?php echo xlt('Facility Taxonomy'); ?>:</span></td>
            <td><input type=entry size=20 name=facility_taxonomy value=""></td>
        </tr>
        <tr>
        <td><span class="text"><?php echo xlt('Website'); ?>: </span></td><td><input type=entry size=20 name=website value=""></td>
        <td>&nbsp;</td>
        <td><span class="text"><?php echo xlt('Email'); ?>: </span></td><td><input type=entry size=20 name=email value=""></td>
        </tr>

        <tr>
          <td><span class='text'><?php echo xlt('Billing Location'); ?>: </span></td><td><input type='checkbox' name='billing_location' value = '1'></td>
          <td>&nbsp;</td>
          <td><span class='text'><?php echo xlt('Accepts Assignment'); ?><br>(<?php echo xlt('only if billing location'); ?>): </span></td> <td><input type='checkbox' name='accepts_assignment' value = '1'></td>
        </tr>
        <tr>
          <td><span class='text'><?php echo xlt('Service Location'); ?>: </span></td> <td><input type='checkbox' name='service_location' value = '1'></td>
          <td>&nbsp;</td>
          <td><span class='text'><?php echo xlt('Color'); ?>: </span></td> <td><input type=entry name=ncolor id=ncolor size=20 value=""><span>[<a href="javascript:void(0);" onClick="pick('pick','newcolor');return false;" NAME="pick" ID="pick"><?php echo xlt('Pick'); ?></a>]</span></td>
        </tr>
    <?php
    $disabled='';
    $resPBE = $facilityService->getPrimaryBusinessEntity(array("excludedId" => $my_fid));
    if (!empty($resPBE) && sizeof($resPBE)>0) {
        $disabled='disabled';
    }
    ?>
     <tr>
          <td><span class='text'><?php echo xlt('Primary Business Entity'); ?>: </span></td>
          <td><input type='checkbox' name='primary_business_entity' id='primary_business_entity' value='1' <?php echo ($facility['primary_business_entity'] == 1) ? 'checked' : ''; ?>
                <?php if ($GLOBALS['erx_enable']) { ?>
                    onchange='return displayAlert()'
                <?php } ?> <?php echo $disabled;?>></td>
          <td>&nbsp;</td>
         </tr>
        <tr>
            <td><span class=text><?php echo xlt('POS Code'); ?>: </span></td>
            <td colspan="6">
                <select name="pos_code">
                <?php
                $pc = new POSRef();

                foreach ($pc->get_pos_ref() as $pos) {
                    echo "<option value=\"" . attr($pos["code"]) . "\" ";
                    echo ">" . text($pos['code'])  . ": ". text($pos['title']);
                    echo "</option>\n";
                }

                ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><span class="text"><?php echo xlt('Billing Attn'); ?>:</span></td>
            <td colspan="4"><input type="entry" name="attn" size="45"></td>
        </tr>
        <tr>
            <td><span class="text"><?php echo xlt('CLIA Number'); ?>:</span></td>
            <td colspan="4"><input type="entry" name="domain_identifier" size="45"></td>
        </tr>
        <tr>
            <td><span class="text"><?php echo xlt('Facility ID'); ?>:</span></td>
            <td colspan="4"><input type="entry" name="facility_id" size="20"></td>
        </tr>
        <tr>
            <td>
                <span class="text"><?php echo xlt('OID'); ?>: </span>
            </td>
            <td>
                <input type="entry" size="20" name="oid" value="<?php echo attr($facility["oid"]) ?>">
            </td>
        </tr>
        <tr>
            <td>
                <hr>
            </td>
        </tr>
        <tr>
            <td>
                <label><?php echo xlt('Mailing Address'); ?>: </label>
            </td>
            <td>
                <input type="entry" size="20" name="mail_street" value="<?php echo attr($facility["mail_street"]) ?>">
            </td>
        </tr>

        <tr>
            <td>
                <label><?php echo xlt('Dept'); ?>: </label>
            </td>
            <td>
                <input type="entry" size="20" name="mail_street2" value="<?php echo attr($facility["mail_street2"]) ?>">
            </td>
        </tr>

        <tr>
            <td>
                <label><?php echo xlt('City'); ?>: </label>
            </td>
            <td>
                <input type="entry" size="20" name="mail_city" value="<?php echo attr($facility["mail_city"]) ?>">
            </td>
        </tr>
        <tr>
            <td>
                <label><?php echo xlt('State'); ?>: </label>
            </td>
            <td>
                <input type="entry" size="20" name="mail_state" value="<?php echo attr($facility["mail_state"]) ?>">
            </td>
        </tr>
        <tr>
            <td>
                <label><?php echo xlt('Zip'); ?>: </label>
            </td>
            <td>
                <input type="entry" size="20" name="mail_zip" value="<?php echo attr($facility["mail_zip"]) ?>">
            </td>


        </tr>

        <div class="form-row custom-control custom-switch my-2">
                        <div class="col">
                            <input type="checkbox" class='custom-control-input' name="status" id="status" value="1" />
                            <label for="status" class='custom-control-label'><?php echo xlt('status'); ?></label>
                        </div>
                    </div>
        <tr height="25" style="valign:bottom;">
            <td><font class="mandatory">*</font><span class="text"> <?php echo xlt('Required'); ?></span></td><td>&nbsp;</td><td>&nbsp;</td>
            <td>&nbsp;</td><td>&nbsp;</td>
        </tr>
    </table>
</form>

<script language="JavaScript">
<?php
if ($alertmsg = trim($alertmsg)) {
    echo "alert(" . js_escape($alertmsg) . ");\n";
}
?>
</script>
</body>
</html>

