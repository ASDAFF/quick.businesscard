<?if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();if(!CModule::IncludeModule("iblock"))return;$iblockXMLFile=WIZARD_SERVICE_RELATIVE_PATH."/xml/".LANGUAGE_ID."/photo.xml";$iblockType="businesscard";$iblockID=$wizard->GetVar("iblockPhotoID");$permissions=Array("1"=>"X","2"=>"R");$dbGroup=CGroup::GetList($by="",$order="",Array("STRING_ID"=>"content_editor"));if($arGroup=$dbGroup->Fetch())
$permissions[$arGroup["ID"]]="W";$iblockID=WizardServices_QUICK::ImportIBlockFromXML($iblockXMLFile,$iblockType,$iblockID,WIZARD_SITE_ID,$permissions,WIZARD_INSTALL_DEMO_DATA);if($iblockID<1)
return;$dbSite=CSite::GetByID(WIZARD_SITE_ID);if($arSite=$dbSite->Fetch())
$lang=$arSite["LANGUAGE_ID"];if(strlen($lang)<=0)
$lang="ru";WizardServices::IncludeServiceLang("photo.php",$lang);$res=CIBlock::GetByID($iblockID);$ar_res=$res->GetNext();$iblockType=$ar_res[IBLOCK_TYPE_ID];$iblock=new CIBlock;$arFields=Array("ACTIVE"=>"Y","FIELDS"=>array('IBLOCK_SECTION'=>array('IS_REQUIRED'=>'N','DEFAULT_VALUE'=>'',),'ACTIVE'=>array('IS_REQUIRED'=>'Y','DEFAULT_VALUE'=>'Y',),'ACTIVE_FROM'=>array('IS_REQUIRED'=>'N','DEFAULT_VALUE'=>'',),'ACTIVE_TO'=>array('IS_REQUIRED'=>'N','DEFAULT_VALUE'=>'',),'SORT'=>array('IS_REQUIRED'=>'N','DEFAULT_VALUE'=>'',),'NAME'=>array('IS_REQUIRED'=>'Y','DEFAULT_VALUE'=>GetMessage("WZD_OPTION_PHOTO_1"),),'PREVIEW_PICTURE'=>array('IS_REQUIRED'=>'N','DEFAULT_VALUE'=>array('FROM_DETAIL'=>'N','DELETE_WITH_DETAIL'=>'N','UPDATE_WITH_DETAIL'=>'N','SCALE'=>'N','WIDTH'=>'800','HEIGHT'=>'800','IGNORE_ERRORS'=>'Y','METHOD'=>'resample','COMPRESSION'=>95,),),'PREVIEW_TEXT_TYPE'=>array('IS_REQUIRED'=>'Y','DEFAULT_VALUE'=>'html',),'PREVIEW_TEXT'=>array('IS_REQUIRED'=>'N','DEFAULT_VALUE'=>'',),'DETAIL_PICTURE'=>array('IS_REQUIRED'=>'N','DEFAULT_VALUE'=>array('SCALE'=>'N','WIDTH'=>'1200','HEIGHT'=>'1200','IGNORE_ERRORS'=>'Y','METHOD'=>'resample','COMPRESSION'=>95,),),'DETAIL_TEXT_TYPE'=>array('IS_REQUIRED'=>'Y','DEFAULT_VALUE'=>'html',),'DETAIL_TEXT'=>array('IS_REQUIRED'=>'N','DEFAULT_VALUE'=>'',),'XML_ID'=>array('IS_REQUIRED'=>'N','DEFAULT_VALUE'=>'',),'CODE'=>array('IS_REQUIRED'=>'N','DEFAULT_VALUE'=>array('UNIQUE'=>'Y','TRANSLITERATION'=>'N','TRANS_LEN'=>100,'TRANS_CASE'=>'L','TRANS_SPACE'=>'-','TRANS_OTHER'=>'-','TRANS_EAT'=>'Y','USE_GOOGLE'=>'Y',),),'TAGS'=>array('IS_REQUIRED'=>'N','DEFAULT_VALUE'=>'',),'SECTION_NAME'=>array('IS_REQUIRED'=>'Y','DEFAULT_VALUE'=>'',),'SECTION_PICTURE'=>array('IS_REQUIRED'=>'N','DEFAULT_VALUE'=>array('FROM_DETAIL'=>'N','DELETE_WITH_DETAIL'=>'N','UPDATE_WITH_DETAIL'=>'N','SCALE'=>'N','WIDTH'=>'800','HEIGHT'=>'800','IGNORE_ERRORS'=>'Y','METHOD'=>'resample','COMPRESSION'=>95,),),'SECTION_DESCRIPTION_TYPE'=>array('IS_REQUIRED'=>'Y','DEFAULT_VALUE'=>'html',),'SECTION_DESCRIPTION'=>array('IS_REQUIRED'=>'N','DEFAULT_VALUE'=>'',),'SECTION_DETAIL_PICTURE'=>array('IS_REQUIRED'=>'N','DEFAULT_VALUE'=>array('SCALE'=>'N','WIDTH'=>'800','HEIGHT'=>'800','IGNORE_ERRORS'=>'Y','METHOD'=>'resample','COMPRESSION'=>95,),),'SECTION_XML_ID'=>array('IS_REQUIRED'=>'N','DEFAULT_VALUE'=>'',),'SECTION_CODE'=>array('IS_REQUIRED'=>'Y','DEFAULT_VALUE'=>array('UNIQUE'=>'Y','TRANSLITERATION'=>'Y','TRANS_LEN'=>100,'TRANS_CASE'=>'L','TRANS_SPACE'=>'-','TRANS_OTHER'=>'-','TRANS_EAT'=>'Y','USE_GOOGLE'=>'Y',),),),);$iblock->Update($iblockID,$arFields);$arProperty=Array();$dbProperty=CIBlockProperty::GetList(Array(),Array("IBLOCK_ID"=>$iblockID));while($arProp=$dbProperty->Fetch())
$arProperty[$arProp["CODE"]]=$arProp["ID"];CUserOptions::SetOption("form","form_element_".$iblockID,array('tabs'=>'edit1--#--'.GetMessage("WZD_OPTION_PHOTO_2").'--,'.'--ACTIVE--#--'.GetMessage("WZD_OPTION_PHOTO_3").'--,'.'--PROPERTY_'.$arProperty["TOP"].'--#--'.GetMessage("WZD_OPTION_PHOTO_4").'--,'.'--PROPERTY_'.$arProperty["TOP_SORT"].'--#--'.GetMessage("WZD_OPTION_PHOTO_5").'--,'.'--SORT--#--'.GetMessage("WZD_OPTION_PHOTO_6").'--,'.'--NAME--#--'.GetMessage("WZD_OPTION_PHOTO_7").'--,'.'--CODE--#--'.GetMessage("WZD_OPTION_PHOTO_8").'--,'.'--PREVIEW_PICTURE--#--'.GetMessage("WZD_OPTION_PHOTO_9").'--,'.'--PROPERTY_'.$arProperty["PREVIEW_PICTURE_DESCRIPTION"].'--#--'.GetMessage("WZD_OPTION_PHOTO_10").'--;'.'--cedit1--#--'.GetMessage("WZD_OPTION_PHOTO_11").'--,'.'--PROPERTY_'.$arProperty["MORE_PHOTO"].'--#--'.GetMessage("WZD_OPTION_PHOTO_12").'--,'.'--PROPERTY_'.$arProperty["MORE_PHOTO_DESCRIPTION"].'--#--'.GetMessage("WZD_OPTION_PHOTO_13").'--;'.'--edit6--#--'.GetMessage("WZD_OPTION_PHOTO_14").'--,'.'--DETAIL_TEXT--#--'.GetMessage("WZD_OPTION_PHOTO_15").'--;'.'--cedit2--#--'.GetMessage("WZD_OPTION_PHOTO_16").'--,'.'--PROPERTY_'.$arProperty["USE_SHARE"].'--#--'.GetMessage("WZD_OPTION_PHOTO_17").'--;'.'--edit2--#--'.GetMessage("WZD_OPTION_PHOTO_301").'--,'.'--XML_ID--#--'.GetMessage("WZD_OPTION_PHOTO_302").'--;'.'--'));CUserOptions::SetOption("list","tbl_iblock_list_".md5($iblockType.".".$iblockID),array("columns"=>"NAME, PREVIEW_PICTURE, PROPERTY_".$arProperty["TOP"].", ACTIVE, SORT","by"=>"sort","order"=>"asc","page_size"=>"20",));COption::SetOptionInt("businesscard","iblockPhotoID",$iblockID,false,WIZARD_SITE_ID);WizardServices::ReplaceMacrosRecursive(WIZARD_SITE_PATH."include/",array("IBLOCK_TYPE_PHOTO"=>$iblockType,"IBLOCK_ID_PHOTO"=>$iblockID,));WizardServices::ReplaceMacrosRecursive(WIZARD_SITE_PATH."info/photo/",array("SITE_DIR"=>WIZARD_SITE_DIR,"IBLOCK_TYPE_PHOTO"=>$iblockType,"IBLOCK_ID_PHOTO"=>$iblockID,));?>