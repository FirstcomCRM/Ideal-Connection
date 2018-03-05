<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SelectControl
 *
 * @author jason
 */
class SelectControl {
    public function SelectControl(){

    }
    public function getNationalitySelectCtrl($pid,$shownull="Y",$wherestring=''){
        $sql = "SELECT nationality_id,nationality_code from db_nationality WHERE (nationality_id = '$pid' or nationality_id >0) and nationality_status = 1 $wherestring
                ORDER BY nationality_seqno,nationality_code ASC";
        if($shownull =="Y"){
            $selectctrl .="<option value = '' SELECTED='SELECTED'>Select One</option>";
        }
        $query = mysql_query($sql);
        while($row = mysql_fetch_array($query)){
            $id = $row['nationality_id'];
            $code = $row['nationality_code'];
            if($id == $pid){
                $selected = "SELECTED = 'SELECTED'";
            }else{
                $selected = "";
            }
            $selectctrl .="<option value = '$id' $selected>$code</option>";
        }
        return $selectctrl;
    }

    //edr Get All location type from loctype table
    public function getLocType($pid,$shownull="Y",$wherestring=''){
        $sql = "SELECT loctype_id,loctype_type from db_loctype WHERE (loctype_id = '$pid' or loctype_id >0)  $wherestring
                ORDER BY loctype_type ASC";
        if($shownull =="Y"){
            $selectctrl .="<option value = '' SELECTED='SELECTED'>Select One</option>";
        }
        $query = mysql_query($sql);
        while($row = mysql_fetch_array($query)){
            $id = $row['loctype_id'];
            $code = $row['loctype_type'];
            if($id == $pid){
                $selected = "SELECTED = 'SELECTED'";
            }else{
                $selected = "";
            }
            $selectctrl .="<option value = '$id' $selected>$code</option>";
        }
        return $selectctrl;
    }

    //edr get all users that are salesperson in user/empl table user_group = 3
    public function getSalesPerson($pid,$shownull="Y",$wherestring=''){

        $sql = "SELECT empl_id,empl_name from db_empl WHERE (empl_id = '$pid' or empl_id >0) AND empl_group = 3 $wherestring ORDER BY empl_name ASC";
        if($shownull =="Y"){
            $selectctrl .="<option value = '' SELECTED='SELECTED'>Select One</option>";
        }
        $query = mysql_query($sql);
        while($row = mysql_fetch_array($query)){
            $id = $row['empl_id'];
            $code = $row['empl_name'];
            if($id == $pid){
                $selected = "SELECTED = 'SELECTED'";
            }else{
                $selected = "";
            }
            $selectctrl .="<option value = '$id' $selected>$code</option>";
        }
        return $selectctrl;
    }


    public function getBankSelectCtrl($pid,$shownull="Y",$wherestring=''){
        $sql = "SELECT bank_id,bank_code from db_bank WHERE (bank_id = '$pid' or bank_id >0) and bank_status = 1 $wherestring
                ORDER BY bank_seqno,bank_code ASC";
        if($shownull =="Y"){
            $selectctrl .="<option value = '' SELECTED='SELECTED'>Select One</option>";
        }
        $query = mysql_query($sql);
        while($row = mysql_fetch_array($query)){
            $id = $row['bank_id'];
            $code = $row['bank_code'];
            if($id == $pid){
                $selected = "SELECTED = 'SELECTED'";
            }else{
                $selected = "";
            }
            $selectctrl .="<option value = '$id' $selected>$code</option>";
        }
        return $selectctrl;
    }
    public function getEmplPassSelectCtrl($pid,$shownull="Y",$wherestring=''){
        $sql = "SELECT emplpass_id,emplpass_code from db_emplpass WHERE (emplpass_id = '$pid' or emplpass_id >0) and emplpass_status = 1 $wherestring
                ORDER BY emplpass_seqno,emplpass_code ASC";
        if($shownull =="Y"){
            $selectctrl .="<option value = '' SELECTED='SELECTED'>Select One</option>";
        }
        $query = mysql_query($sql);
        while($row = mysql_fetch_array($query)){
            $id = $row['emplpass_id'];
            $code = $row['emplpass_code'];
            if($id == $pid){
                $selected = "SELECTED = 'SELECTED'";
            }else{
                $selected = "";
            }
            $selectctrl .="<option value = '$id' $selected>$code</option>";
        }
        return $selectctrl;
    }
    public function getLeaveTypeSelectCtrl($pid,$shownull="Y",$wherestring=''){
        $sql = "SELECT leavetype_id,leavetype_code from db_leavetype INNER JOIN db_emplleave ON leavetype_id = emplleave_leavetype WHERE (leavetype_id = '$pid' or leavetype_id >0) and leavetype_status = 1 and emplleave_empl = $_SESSION[empl_id] and emplleave_disabled = '0' $wherestring
                ORDER BY leavetype_seqno,leavetype_code ASC";
        if($shownull =="Y"){
            $selectctrl .="<option value = '' SELECTED='SELECTED'>Select One</option>";
        }
        $query = mysql_query($sql);
        while($row = mysql_fetch_array($query)){
            $id = $row['leavetype_id'];
            $code = $row['leavetype_code'];
            if($id == $pid){
                $selected = "SELECTED = 'SELECTED'";
            }else{
                $selected = "";
            }
            $selectctrl .="<option value = '$id' $selected>$code</option>";
        }
        return $selectctrl;
    }
    public function getClaimsTypeSelectCtrl($pid,$shownull="Y",$wherestring=''){
        $sql = "SELECT claimstype_id,claimstype_code from db_claimstype WHERE (claimstype_id = '$pid' or claimstype_id >0) and claimstype_status = 1 $wherestring
                ORDER BY claimstype_seqno,claimstype_code ASC";
        if($shownull =="Y"){
            $selectctrl .='<option value = "" SELECTED="SELECTED">Select One</option>';
        }
        $query = mysql_query($sql);
        while($row = mysql_fetch_array($query)){
            $id = $row['claimstype_id'];
            $code = $row['claimstype_code'];
            if($id == $pid){
                $selected = 'SELECTED = "SELECTED"';
            }else{
                $selected = "";
            }
            $selectctrl .='<option value = "' . $id . '" ' . $selected . '>' . $code . '</option>';
        }
        return $selectctrl;
    }
    public function getEmployeeSelectCtrl($pid,$shownull="Y",$wherestring=''){
        $sql = "SELECT empl_id,CONCAT(empl_code,' - ',empl_name) as empl_name from db_empl WHERE (empl_id = '$pid' or empl_id >0) and empl_status = 1 and empl_client = '0' $wherestring
                ORDER BY empl_seqno,empl_name ASC";

        if($shownull =="Y"){
            $selectctrl .="<option value = '' SELECTED='SELECTED'>Select One</option>";
        }
        $query = mysql_query($sql);
        while($row = mysql_fetch_array($query)){
            $id = $row['empl_id'];
            $code = $row['empl_name'];
            if($id == $pid){
                $selected = "SELECTED = 'SELECTED'";
            }else{
                $selected = "";
            }
            $selectctrl .="<option value = '$id' $selected>$code</option>";
        }
        return $selectctrl;
    }
    public function getSalesPersonCtrl($pid,$shownull="Y",$wherestring=''){
        $sql = "SELECT empl_id,CONCAT(empl_code,' - ',empl_name) as empl_name from db_empl WHERE (empl_id = '$pid' or empl_id >0) and empl_status = 1 and empl_client = '0' and (empl_group = '4' or empl_group = '8') $wherestring
                ORDER BY empl_seqno,empl_name ASC";

        if($shownull =="Y"){
            $selectctrl .="<option value = '' SELECTED='SELECTED'>Select One</option>";
        }
        $query = mysql_query($sql);
        while($row = mysql_fetch_array($query)){
            $id = $row['empl_id'];
            $code = $row['empl_name'];
            if($id == $pid){
                $selected = "SELECTED = 'SELECTED'";
            }else{
                $selected = "";
            }
            $selectctrl .="<option value = '$id' $selected>$code</option>";
        }
        return $selectctrl;
    }
    public function getApprovedEmployeeSelectCtrl($pid,$shownull="Y",$wherestring=''){
        $sql = "SELECT empl_id,CONCAT(empl_code,' - ',empl_name) as empl_name from db_empl WHERE (empl_id = '$pid' or empl_id >0) and empl_status = 1 and empl_client = '0' and empl_group = '1' $wherestring
                ORDER BY empl_seqno,empl_name ASC";

        if($shownull =="Y"){
            $selectctrl .="<option value = '' SELECTED='SELECTED'>Select One</option>";
        }
        $query = mysql_query($sql);
        while($row = mysql_fetch_array($query)){
            $id = $row['empl_id'];
            $code = $row['empl_name'];
            if($id == $pid){
                $selected = "SELECTED = 'SELECTED'";
            }else{
                $selected = "";
            }
            $selectctrl .="<option value = '$id' $selected>$code</option>";
        }
        return $selectctrl;
    }
    public function getGroupSelectCtrl($pid,$shownull="Y",$wherestring=''){
        $sql = "SELECT group_id,group_code from db_group WHERE (group_id = '$pid' or group_id >0) and group_status = 1 $wherestring
                ORDER BY group_seqno,group_code ASC";
        if($shownull =="Y"){
            $selectctrl .="<option value = '' SELECTED='SELECTED'>Select One</option>";
        }
        $query = mysql_query($sql);
        while($row = mysql_fetch_array($query)){
            $id = $row['group_id'];
            $code = $row['group_code'];
            if($id == $pid){
                $selected = "SELECTED = 'SELECTED'";
            }else{
                $selected = "";
            }
            $selectctrl .="<option value = '$id' $selected>$code</option>";
        }

        return $selectctrl;
    }
    public function getMenuSelectCtrl($pid,$shownull="Y",$wherestring=''){
        $sql = "SELECT * from db_menu WHERE (menu_id = '$pid' or menu_id >0) and menu_status = 1 $wherestring
                ORDER BY menu_seqno,menu_name ASC";
        if($shownull =="Y"){
            $selectctrl .="<option value = '' SELECTED='SELECTED'>Select One</option>";
        }
        $query = mysql_query($sql);
        while($row = mysql_fetch_array($query)){
            $id = $row['menu_id'];
            $code = $row['menu_name'];
            if($id == $pid){
                $selected = "SELECTED = 'SELECTED'";
            }else{
                $selected = "";
            }
            $selectctrl .="<option value = '$id' $selected>$code</option>";
        }

        return $selectctrl;
    }
    public function getOutletSelectCtrl($pid,$shownull="Y",$wherestring=''){
        $sql = "SELECT outl_id,outl_code from db_outl WHERE (outl_id = '$pid' or outl_id >0) and outl_status = 1 $wherestring
                ORDER BY outl_seqno,outl_code ASC";

        if($shownull =="Y"){
            $selectctrl .="<option value = '' SELECTED='SELECTED'>Select One</option>";
        }
        $query = mysql_query($sql);
        while($row = mysql_fetch_array($query)){
            $id = $row['outl_id'];
            $code = $row['outl_code'];
            if($id == $pid){
                $selected = "SELECTED = 'SELECTED'";
            }else{
                $selected = "";
            }
            $selectctrl .="<option value = '$id' $selected>$code</option>";
        }
        return $selectctrl;
    }
    public function getIndustrySelectCtrl($pid,$shownull="Y",$wherestring=''){
        $sql = "SELECT industry_id,industry_code from db_industry WHERE (industry_id = '$pid' or industry_id >0) and industry_status = 1 $wherestring
                ORDER BY industry_seqno,industry_code ASC";

        if($shownull =="Y"){
            $selectctrl .="<option value = '' SELECTED='SELECTED'>Select One</option>";
        }
        $query = mysql_query($sql);
        while($row = mysql_fetch_array($query)){
            $id = $row['industry_id'];
            $code = $row['industry_code'];
            if($id == $pid){
                $selected = "SELECTED = 'SELECTED'";
            }else{
                $selected = "";
            }
            $selectctrl .="<option value = '$id' $selected>$code</option>";
        }
        return $selectctrl;
    }
    public function getContactSelectCtrl($pid,$shownull="Y",$wherestring=''){
        $sql = "SELECT contact_id,contact_name from db_contact WHERE (contact_id = '$pid' or contact_id >0) and contact_status = 1 $wherestring
                ORDER BY contact_seqno,contact_name ASC";

        if($shownull =="Y"){
            $selectctrl .="<option value = '' SELECTED='SELECTED'>Select One</option>";
        }
        $query = mysql_query($sql);
        while($row = mysql_fetch_array($query)){
            $id = $row['contact_id'];
            $code = $row['contact_name'];
            if($id == $pid){
                $selected = "SELECTED = 'SELECTED'";
            }else{
                $selected = "";
            }
            $selectctrl .="<option value = '$id' $selected>$code</option>";
        }
        return $selectctrl;
    }
    public function getUomSelectCtrl($pid,$shownull="Y",$wherestring=''){
        $sql = "SELECT uom_id,uom_code from db_uom WHERE (uom_id = '$pid' or uom_id >0) and uom_status = 1 $wherestring
                ORDER BY uom_seqno,uom_code ASC";

        if($shownull =="Y"){
            $selectctrl .='<option value = "" SELECTED="SELECTED">Select One</option>';
        }
        $query = mysql_query($sql);
        while($row = mysql_fetch_array($query)){
            $id = $row['uom_id'];
            $code = $row['uom_code'];
            if($id == $pid){
                $selected = 'SELECTED = "SELECTED"';
            }else{
                $selected = "";
            }
            $selectctrl .='<option value = "' . $id . '"' . $selected . ">$code</option>";
        }
        return $selectctrl;
    }
    public function getGroupCompSelectCtrl($pid,$shownull="Y",$wherestring=''){
        $sql = "SELECT groupcomp_id,groupcomp_code from db_groupcomp WHERE (groupcomp_id = '$pid' or groupcomp_id >0) and groupcomp_status = 1 $wherestring
                ORDER BY groupcomp_seqno,groupcomp_code ASC";
        if($shownull =="Y"){
            $selectctrl .="<option value = '' SELECTED='SELECTED'>Select One</option>";
        }
        $query = mysql_query($sql);
        while($row = mysql_fetch_array($query)){
            $id = $row['groupcomp_id'];
            $code = $row['groupcomp_code'];
            if($id == $pid){
                $selected = "SELECTED = 'SELECTED'";
            }else{
                $selected = "";
            }
            $selectctrl .="<option value = '$id' $selected>$code</option>";
        }
        return $selectctrl;
    }
    public function getRaceSelectCtrl($pid,$shownull="Y",$wherestring=''){
        $sql = "SELECT race_id,race_code from db_race WHERE (race_id = '$pid' or race_id >0) and race_status = 1 $wherestring
                ORDER BY race_seqno,race_code ASC";
        if($shownull =="Y"){
            $selectctrl .="<option value = '' SELECTED='SELECTED'>Select One</option>";
        }
        $query = mysql_query($sql);
        while($row = mysql_fetch_array($query)){
            $id = $row['race_id'];
            $code = $row['race_code'];
            if($id == $pid){
                $selected = "SELECTED = 'SELECTED'";
            }else{
                $selected = "";
            }
            $selectctrl .="<option value = '$id' $selected>$code</option>";
        }
        return $selectctrl;
    }
    public function getReligionSelectCtrl($pid,$shownull="Y",$wherestring=''){
        $sql = "SELECT religion_id,religion_code from db_religion WHERE (religion_id = '$pid' or religion_id >0) and religion_status = 1 $wherestring
                ORDER BY religion_seqno,religion_code ASC";
        if($shownull =="Y"){
            $selectctrl .="<option value = ''>Select One</option>";
        }
        $query = mysql_query($sql);
        while($row = mysql_fetch_array($query)){
            $id = $row['religion_id'];
            $code = $row['religion_code'];
            if($id == $pid){
                $selected = "SELECTED = 'SELECTED'";
            }else{
                $selected = "";
            }
            $selectctrl .="<option value = '$id' $selected>$code</option>";
        }
        return $selectctrl;
    }
    public function getServicefeesSelectCtrl($pid,$shownull="Y",$wherestring=''){
        $sql = "SELECT serfees_id,serfees_code from db_serfees WHERE (serfees_id = '$pid' or serfees_id >0) and serfees_status = 1 $wherestring
                ORDER BY serfees_seqno,serfees_code ASC";
        if($shownull =="Y"){
            $selectctrl .="<option value = '' SELECTED='SELECTED'>Select One</option>";
        }
        $query = mysql_query($sql);
        while($row = mysql_fetch_array($query)){
            $id = $row['serfees_id'];
            $code = $row['serfees_code'];
            if($id == $pid){
                $selected = "SELECTED = 'SELECTED'";
            }else{
                $selected = "";
            }
            $selectctrl .="<option value = '$id' $selected>$code</option>";
        }
        return $selectctrl;
    }
    public function getDepartmentSelectCtrl($pid,$shownull="Y",$wherestring='',$text = "One"){
        $sql = "SELECT department_id,department_code from db_department WHERE (department_id = '$pid' or department_id >0) and department_status = 1 $wherestring
                ORDER BY department_seqno,department_code ASC";
        if($shownull =="Y"){
            $selectctrl .="<option value = '' SELECTED='SELECTED'>Select $text</option>";
        }
        $query = mysql_query($sql);
        while($row = mysql_fetch_array($query)){
            $id = $row['department_id'];
            $code = $row['department_code'];
            if($id == $pid){
                $selected = "SELECTED = 'SELECTED'";
            }else{
                $selected = "";
            }
            $selectctrl .="<option value = '$id' $selected>$code</option>";
        }
        return $selectctrl;
    }
    public function getEmplLeaveSelectCtrl($pid,$shownull="Y",$wherestring=''){
        $sql = "SELECT lt.leavetype_id,lt.leavetype_code
                from db_emplleave el
                INNER JOIN db_leavetype lt ON lt.leavetype_id = el.emplleave_leavetype
                WHERE (lt.leavetype_id = '$pid' or lt.leavetype_id >0) and lt.leavetype_status = 1 $wherestring
                ORDER BY lt.leavetype_seqno,lt.leavetype_code ASC";
        if($shownull =="Y"){
            $selectctrl .="<option value = '' SELECTED='SELECTED'>Select One</option>";
        }
        $query = mysql_query($sql);
        while($row = mysql_fetch_array($query)){
            $id = $row['leavetype_id'];
            $code = $row['leavetype_code'];
            if($id == $pid){
                $selected = "SELECTED = 'SELECTED'";
            }else{
                $selected = "";
            }
            $selectctrl .="<option value = '$id' $selected>$code</option>";
        }
        return $selectctrl;
    }

    //license
    public function getLicenseTypeSelectCtrl($pid,$shownull="Y",$wherestring=''){
        $sql = "SELECT license_type_id, license_type_name FROM db_license_type where license_type_status = 1";
        if($shownull =="Y"){
            $selectctrl .="<option value = '' SELECTED='SELECTED'>Select One</option>";
        }
        $query = mysql_query($sql);
        while($row = mysql_fetch_array($query)){
            $id = $row['license_type_id'];
            $code = $row['license_type_name'];
            if($id == $pid){
                $selected = "SELECTED = 'SELECTED'";
            }else{
                $selected = "";
            }
            $selectctrl .="<option value = '$id' $selected>$code</option>";
        }

        return $selectctrl;
    }

    public function getAddressTypeSelectCtrl($pid,$shownull="Y",$wherestring=''){
        $sql = "SELECT partneraddresstype_id,partneraddresstype_code from db_partneraddresstype WHERE (partneraddresstype_id = '$pid' or partneraddresstype_id >0) and partneraddresstype_status = 1 $wherestring
                ORDER BY partneraddresstype_seqno,partneraddresstype_code ASC";

        if($shownull =="Y"){
            $selectctrl .='<option value = "" SELECTED="SELECTED">Select One</option>';
        }
        $query = mysql_query($sql);
        while($row = mysql_fetch_array($query)){
            $id = $row['partneraddresstype_id'];
            $code = $row['partneraddresstype_code'];
            if($id == $pid){
                $selected = 'SELECTED = "SELECTED"';
            }else{
                $selected = "";
            }
            $selectctrl .='<option value = "' . $id . '"' . $selected . ">$code</option>";
        }
        return $selectctrl;
    }
    public function getManagerCtrl($pid,$shownull="Y",$wherestring='',$text = "One"){
        $empl_id = $_SESSION['empl_id'];
        $sql = "SELECT empl_id, empl_manager FROM db_empl WHERE empl_id = '$empl_id'";
        $query = mysql_query($sql);
        $row = mysql_fetch_array($query);

        $sql2 = "SELECT empl_id , empl_name FROM `db_empl` WHERE (empl_id = '$pid' or empl_id = '$row[empl_manager]')";
        if($shownull =="Y"){
            $selectctrl .="<option value = '' SELECTED='SELECTED'>Select $text</option>";
        }
        $query2 = mysql_query($sql2);
        while($row2 = mysql_fetch_array($query2)){
            $id = $row2['empl_id'];
            $code = $row2['empl_name'];
            if($id == $pid){
                $selected = "SELECTED = 'SELECTED'";
            }
            else{
                $selected = "";
            }
            $selectctrl .="<option value = '$id' $selected>$code</option>";
        }

        if ($pid != ""){
            $where = 'AND empl_id != $pid';
        }
        else {
            $where = "";
        }
        $sql2 = "SELECT empl_id , empl_name FROM db_empl WHERE  empl_id != '$row[empl_manager]' AND empl_group = '4' $where";
        $query2 = mysql_query($sql2);
        while($row2 = mysql_fetch_array($query2)){
            $id = $row2['empl_id'];
            $code = $row2['empl_name'];

            $selectctrl .="<option value = '$id' $selected>$code</option>";
        }


        return $selectctrl;
    }
    public function getApplicantLeaveTypeSelectCtrl($pid,$shownull="Y",$wherestring=''){
        $sql = "SELECT leavetype_id,leavetype_code from db_leavetype INNER JOIN db_applleave ON leavetype_id = applleave_leavetype WHERE (leavetype_id = '$pid' or leavetype_id >0) and leavetype_status = 1 and applleave_appl = $_SESSION[empl_id] and applleave_disabled = '0' $wherestring
                ORDER BY leavetype_seqno,leavetype_code ASC";
        if($shownull =="Y"){
            $selectctrl .="<option value = '' SELECTED='SELECTED'>Select One</option>";
        }
        $query = mysql_query($sql);
        while($row = mysql_fetch_array($query)){
            $id = $row['leavetype_id'];
            $code = $row['leavetype_code'];
            if($id == $pid){
                $selected = "SELECTED = 'SELECTED'";
            }else{
                $selected = "";
            }
            $selectctrl .="<option value = '$id' $selected>$code</option>";
        }
        return $selectctrl;
    }
    public function getSHROutletSelectCtrl($pid,$shownull="Y",$wherestring='',$text = "One"){
        $sql = "SELECT outlet_id , outlet_name FROM `db_company_outlet` WHERE (outlet_id = '$pid' or outlet_id >0) ORDER BY outlet_seqno ASC";
        if($shownull =="Y"){
            $selectctrl .="<option value = '' SELECTED='SELECTED'>Select $text</option>";
        }
        $query = mysql_query($sql);
        while($row = mysql_fetch_array($query)){
            $id = $row['outlet_id'];
            $code = $row['outlet_name'];
            if($id == $pid){
                $selected = "SELECTED = 'SELECTED'";
            }else{
                $selected = "";
            }
            $selectctrl .="<option value = '$id' $selected>$code</option>";
        }
        return $selectctrl;
    }
    public function getServiceTypeSelectCtrl($pid,$shownull="Y",$wherestring='',$text = "One"){
        $sql = "SELECT service_id , service_title FROM `db_servicestype` WHERE (service_id = '$pid' or service_id >0) AND service_status = '1' ORDER BY service_seqno";
        if($shownull =="Y"){
            $selectctrl .="<option value = '' SELECTED='SELECTED'>Select $text</option>";
        }
        $query = mysql_query($sql);
        while($row = mysql_fetch_array($query)){
            $id = $row['service_id'];
            $code = $row['service_title'];
            if($id == $pid){
                $selected = "SELECTED = 'SELECTED'";
            }else{
                $selected = "";
            }
            $selectctrl .="<option value = '$id' $selected>$code</option>";
        }
        return $selectctrl;
    }
    public function getBPServiceTypeSelectCtrl($pid,$shownull="Y",$wherestring='',$text = "One"){
        $sql = "SELECT service_id , service_title FROM `db_servicestype` WHERE (service_id = '$pid' or service_id >0) AND service_status = '1'";
        if($shownull =="Y"){
            $selectctrl .="<option value = '0' SELECTED='SELECTED'>ALL</option>";
        }
        $query = mysql_query($sql);
        while($row = mysql_fetch_array($query)){
            $id = $row['service_id'];
            $code = $row['service_title'];
            if($id == $pid){
                $selected = "SELECTED = 'SELECTED'";
            }else{
                $selected = "";
            }
            $selectctrl .="<option value = '$id' $selected>$code</option>";
        }
        return $selectctrl;
    }

    //edr changed order by from location_seqno, which does not exist to location_title
    public function getLocationSelectCtrl($pid,$shownull="Y",$wherestring='',$text = "One"){
        $sql = "SELECT location_id , location_title FROM `db_location` WHERE (location_id = '$pid' or location_id >0) AND location_status = '1' ORDER BY location_title";
        if($shownull =="Y"){
            $selectctrl .="<option value = '' SELECTED='SELECTED'>Select $text</option>";
        }
        $query = mysql_query($sql);
        while($row = mysql_fetch_array($query)){
            $id = $row['location_id'];
            $code = $row['location_title'];
            if($id == $pid){
                $selected = "SELECTED = 'SELECTED'";
            }else{
                $selected = "";
            }
            $selectctrl .="<option value = '$id' $selected>$code</option>";
        }
        return $selectctrl;
    }

    public function getLocationCtrl($pid,$shownull="Y",$wherestring='',$text = "One"){
        $sql = "SELECT location_id , location_title FROM `db_location` WHERE (location_id = '$pid' or location_id >0) AND location_status = '1'";
        if($shownull =="Y"){
            $selectctrl .="<option value = '' SELECTED='SELECTED'>Select $text</option>";
        }
        $query = mysql_query($sql);
        while($row = mysql_fetch_array($query)){
            $id = $row['location_id'];
            $code = $row['location_title'];
            if($id == $pid){
                $selected = "SELECTED = 'SELECTED'";
            }else{
                $selected = "";
            }
            $selectctrl .="<option value = '$id' $selected>$code</option>";
        }
        return $selectctrl;
    }

    public function getBoothCtrl($pid,$own_id,$shownull="Y",$wherestring='',$text = "One"){
        $sql = "SELECT booth_id , booth_title FROM `db_booth` WHERE (booth_id = '$pid' or booth_id >0) AND booth_status = '1' AND booth_id != '$own_id'";
        if($shownull =="Y"){
            $selectctrl .="<option value = '' SELECTED='SELECTED'>Select $text</option>";
        }
        $query = mysql_query($sql);
        while($row = mysql_fetch_array($query)){
            $id = $row['booth_id'];
            $code = $row['booth_title'];
            if($id == $pid){
                $selected = "SELECTED = 'SELECTED'";
            }else{
                $selected = "";
            }
            $selectctrl .="<option value = '$id' $selected>$code</option>";
        }
        return $selectctrl;
    }
}

?>
