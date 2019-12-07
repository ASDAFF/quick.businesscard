<?if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();if(!CModule::IncludeModule("iblock"))return;@copy(WIZARD_ABSOLUTE_PATH."/site/services/iblock/xml/".LANGUAGE_ID."/services_tpl.xml",WIZARD_ABSOLUTE_PATH."/site/services/iblock/xml/".LANGUAGE_ID."/services.xml");CWizardUtil::ReplaceMacros(WIZARD_ABSOLUTE_PATH."/site/services/iblock/xml/".LANGUAGE_ID."/services.xml",Array("SERVICES_XML_ID"=>htmlspecialchars("services-effortless-".ToLower(WIZARD_SITE_ID)),"SITE_DIR_IMG"=>WIZARD_SITE_DIR,"DOCUMENTS_XML_ID"=>htmlspecialchars("documents-effortless-".ToLower(WIZARD_SITE_ID)),"REVIEWS_XML_ID"=>htmlspecialchars("reviews-effortless-".ToLower(WIZARD_SITE_ID)),"LICENSES_XML_ID"=>htmlspecialchars("licenses-effortless-".ToLower(WIZARD_SITE_ID)),"CATALOG_XML_ID"=>htmlspecialchars("catalog-effortless-".ToLower(WIZARD_SITE_ID)),"STAFF_XML_ID"=>htmlspecialchars("staff-effortless-".ToLower(WIZARD_SITE_ID)),"WORKS_XML_ID"=>htmlspecialchars("works-effortless-".ToLower(WIZARD_SITE_ID)),));$iblockXMLFile=WIZARD_SERVICE_RELATIVE_PATH."/xml/".LANGUAGE_ID."/services.xml";$iblockType="effortless";$iblockID=$wizard->GetVar("iblockServicesID");$permissions=Array("1"=>"X","2"=>"R");$dbGroup=CGroup::GetList($by="",$order="",Array("STRING_ID"=>"content_editor"));if($arGroup=$dbGroup->Fetch())
$permissions[$arGroup["ID"]]="W";$iblockID=WizardServices_SERGELAND::ImportIBlockFromXML($iblockXMLFile,$iblockType,$iblockID,WIZARD_SITE_ID,$permissions,WIZARD_INSTALL_DEMO_DATA);if($iblockID<1)
return;$dbSite=CSite::GetByID(WIZARD_SITE_ID);if($arSite=$dbSite->Fetch())
$lang=$arSite["LANGUAGE_ID"];if(strlen($lang)<=0)
$lang="ru";WizardServices::IncludeServiceLang("services.php",$lang);$res=CIBlock::GetByID($iblockID);$ar_res=$res->GetNext();$iblockType=$ar_res[IBLOCK_TYPE_ID];$iblock=new CIBlock;$arFields=Array("ACTIVE"=>"Y","FIELDS"=>array('IBLOCK_SECTION'=>array('IS_REQUIRED'=>'N','DEFAULT_VALUE'=>'',),'ACTIVE'=>array('IS_REQUIRED'=>'Y','DEFAULT_VALUE'=>'Y',),'ACTIVE_FROM'=>array('IS_REQUIRED'=>'N','DEFAULT_VALUE'=>'',),'ACTIVE_TO'=>array('IS_REQUIRED'=>'N','DEFAULT_VALUE'=>'',),'SORT'=>array('IS_REQUIRED'=>'N','DEFAULT_VALUE'=>'',),'NAME'=>array('IS_REQUIRED'=>'Y','DEFAULT_VALUE'=>'',),'PREVIEW_PICTURE'=>array('IS_REQUIRED'=>'N','DEFAULT_VALUE'=>array('FROM_DETAIL'=>'N','DELETE_WITH_DETAIL'=>'N','UPDATE_WITH_DETAIL'=>'N','SCALE'=>'N','WIDTH'=>'800','HEIGHT'=>'800','IGNORE_ERRORS'=>'Y','METHOD'=>'resample','COMPRESSION'=>95,),),'PREVIEW_TEXT_TYPE'=>array('IS_REQUIRED'=>'Y','DEFAULT_VALUE'=>'html',),'PREVIEW_TEXT'=>array('IS_REQUIRED'=>'N','DEFAULT_VALUE'=>'',),'DETAIL_PICTURE'=>array('IS_REQUIRED'=>'N','DEFAULT_VALUE'=>array('SCALE'=>'N','WIDTH'=>'1200','HEIGHT'=>'1200','IGNORE_ERRORS'=>'Y','METHOD'=>'resample','COMPRESSION'=>95,),),'DETAIL_TEXT_TYPE'=>array('IS_REQUIRED'=>'Y','DEFAULT_VALUE'=>'html',),'DETAIL_TEXT'=>array('IS_REQUIRED'=>'N','DEFAULT_VALUE'=>'',),'XML_ID'=>array('IS_REQUIRED'=>'N','DEFAULT_VALUE'=>'',),'CODE'=>array('IS_REQUIRED'=>'Y','DEFAULT_VALUE'=>array('UNIQUE'=>'Y','TRANSLITERATION'=>'Y','TRANS_LEN'=>100,'TRANS_CASE'=>'L','TRANS_SPACE'=>'-','TRANS_OTHER'=>'-','TRANS_EAT'=>'Y','USE_GOOGLE'=>'Y',),),'TAGS'=>array('IS_REQUIRED'=>'N','DEFAULT_VALUE'=>'',),'SECTION_NAME'=>array('IS_REQUIRED'=>'Y','DEFAULT_VALUE'=>'',),'SECTION_PICTURE'=>array('IS_REQUIRED'=>'N','DEFAULT_VALUE'=>array('FROM_DETAIL'=>'N','DELETE_WITH_DETAIL'=>'N','UPDATE_WITH_DETAIL'=>'N','SCALE'=>'N','WIDTH'=>'800','HEIGHT'=>'800','IGNORE_ERRORS'=>'Y','METHOD'=>'resample','COMPRESSION'=>95,),),'SECTION_DESCRIPTION_TYPE'=>array('IS_REQUIRED'=>'Y','DEFAULT_VALUE'=>'html',),'SECTION_DESCRIPTION'=>array('IS_REQUIRED'=>'N','DEFAULT_VALUE'=>'',),'SECTION_DETAIL_PICTURE'=>array('IS_REQUIRED'=>'N','DEFAULT_VALUE'=>array('SCALE'=>'N','WIDTH'=>'800','HEIGHT'=>'800','IGNORE_ERRORS'=>'Y','METHOD'=>'resample','COMPRESSION'=>95,),),'SECTION_XML_ID'=>array('IS_REQUIRED'=>'N','DEFAULT_VALUE'=>'',),'SECTION_CODE'=>array('IS_REQUIRED'=>'Y','DEFAULT_VALUE'=>array('UNIQUE'=>'Y','TRANSLITERATION'=>'Y','TRANS_LEN'=>100,'TRANS_CASE'=>'L','TRANS_SPACE'=>'-','TRANS_OTHER'=>'-','TRANS_EAT'=>'Y','USE_GOOGLE'=>'Y',),),),);$iblock->Update($iblockID,$arFields);$arProperty=Array();$dbProperty=CIBlockProperty::GetList(Array(),Array("IBLOCK_ID"=>$iblockID));while($arProp=$dbProperty->Fetch())
$arProperty[$arProp["CODE"]]=$arProp["ID"];CUserOptions::SetOption("form","form_element_".$iblockID,array('tabs'=>'edit1--#--'.GetMessage("WZD_OPTION_SERVICES_1").'--,'.'--ACTIVE--#--'.GetMessage("WZD_OPTION_SERVICES_2").'--,'.'--SORT--#--'.GetMessage("WZD_OPTION_SERVICES_3").'--,'.'--PROPERTY_'.$arProperty["POPULAR"].'--#--'.GetMessage("WZD_OPTION_SERVICES_4").'--,'.'--NAME--#--'.GetMessage("WZD_OPTION_SERVICES_5").'--,'.'--CODE--#--'.GetMessage("WZD_OPTION_SERVICES_6").'--;'.'--edit5--#--'.GetMessage("WZD_OPTION_SERVICES_7").'--,'.'--PREVIEW_PICTURE--#--'.GetMessage("WZD_OPTION_SERVICES_8").'--,'.'--PREVIEW_TEXT--#--'.GetMessage("WZD_OPTION_SERVICES_9").'--;'.'--edit6--#--'.GetMessage("WZD_OPTION_SERVICES_10").'--,'.'--DETAIL_TEXT--#--'.GetMessage("WZD_OPTION_SERVICES_11").'--;'.'--cedit1--#--'.GetMessage("WZD_OPTION_SERVICES_12").'--,'.'--cedit1_csection1--#----'.GetMessage("WZD_OPTION_SERVICES_13").'--,'.'--PROPERTY_'.$arProperty["PHOTO_TOP_AUTOPLAY"].'--#--'.GetMessage("WZD_OPTION_SERVICES_14").'--,'.'--PROPERTY_'.$arProperty["PHOTO_TOP"].'--#--'.GetMessage("WZD_OPTION_SERVICES_15").'--,'.'--PROPERTY_'.$arProperty["PHOTO_TOP_DESCRIPTION"].'--#--'.GetMessage("WZD_OPTION_SERVICES_16").'--,'.'--cedit1_csection2--#----'.GetMessage("WZD_OPTION_SERVICES_17").'--,'.'--PROPERTY_'.$arProperty["PHOTO_BOTTOM_AUTOPLAY"].'--#--'.GetMessage("WZD_OPTION_SERVICES_18").'--,'.'--PROPERTY_'.$arProperty["PHOTO_BOTTOM"].'--#--'.GetMessage("WZD_OPTION_SERVICES_19").'--,'.'--PROPERTY_'.$arProperty["PHOTO_BOTTOM_DESCRIPTION"].'--#--'.GetMessage("WZD_OPTION_SERVICES_20").'--,'.'--PROPERTY_'.$arProperty["PHOTO_BOTTOM_HREF"].'--#--'.GetMessage("WZD_OPTION_SERVICES_21").'--;'.'--cedit2--#--'.GetMessage("WZD_OPTION_SERVICES_22").'--,'.'--PROPERTY_'.$arProperty["PREVIEW_VIDEO"].'--#--'.GetMessage("WZD_OPTION_SERVICES_23").'--,'.'--PROPERTY_'.$arProperty["HREF_VIDEO"].'--#--'.GetMessage("WZD_OPTION_SERVICES_24").'--;'.'--cedit3--#--'.GetMessage("WZD_OPTION_SERVICES_25").'--,'.'--PROPERTY_'.$arProperty["DOCUMENTS_HEADER"].'--#--'.GetMessage("WZD_OPTION_SERVICES_26").'--,'.'--PROPERTY_'.$arProperty["DOCUMENTS"].'--#--'.GetMessage("WZD_OPTION_SERVICES_27").'--;'.'--cedit4--#--'.GetMessage("WZD_OPTION_SERVICES_28").'--,'.'--PROPERTY_'.$arProperty["REVIEWS_CIRCLE_IMG"].'--#--'.GetMessage("WZD_OPTION_SERVICES_29").'--,'.'--PROPERTY_'.$arProperty["REVIEWS_COLOR_BG"].'--#--'.GetMessage("WZD_OPTION_SERVICES_30").'--,'.'--PROPERTY_'.$arProperty["REVIEWS_VER"].'--#--'.GetMessage("WZD_OPTION_SERVICES_31").'--,'.'--PROPERTY_'.$arProperty["REVIEWS"].'--#--'.GetMessage("WZD_OPTION_SERVICES_32").'--;'.'--cedit5--#--'.GetMessage("WZD_OPTION_SERVICES_33").'--,'.'--PROPERTY_'.$arProperty["USE_SHARE"].'--#--'.GetMessage("WZD_OPTION_SERVICES_34").'--;'.'--cedit6--#--'.GetMessage("WZD_OPTION_SERVICES_35").'--,'.'--PROPERTY_'.$arProperty["SHOW_CALLBACK_FORM"].'--#--'.GetMessage("WZD_OPTION_SERVICES_36").'--,'.'--PROPERTY_'.$arProperty["TEXT_CALLBACK_FORM"].'--#--'.GetMessage("WZD_OPTION_SERVICES_37").'--;'.'--cedit10--#--'.GetMessage("WZD_OPTION_SERVICES_38").'--,'.'--PROPERTY_'.$arProperty["MORE_LICENSE_HEADER"].'--#--'.GetMessage("WZD_OPTION_SERVICES_39").'--,'.'--PROPERTY_'.$arProperty["MORE_LICENSE"].'--#--'.GetMessage("WZD_OPTION_SERVICES_40").'--;'.'--cedit7--#--'.GetMessage("WZD_OPTION_SERVICES_41").'--,'.'--PROPERTY_'.$arProperty["MORE_STAFF_HEADER"].'--#--'.GetMessage("WZD_OPTION_SERVICES_42").'--,'.'--PROPERTY_'.$arProperty["MORE_STAFF"].'--#--'.GetMessage("WZD_OPTION_SERVICES_43").'--;'.'--cedit9--#--'.GetMessage("WZD_OPTION_SERVICES_44").'--,'.'--PROPERTY_'.$arProperty["MORE_PRODUCTS_HEADER"].'--#--'.GetMessage("WZD_OPTION_SERVICES_45").'--,'.'--PROPERTY_'.$arProperty["MORE_PRODUCTS"].'--#--'.GetMessage("WZD_OPTION_SERVICES_46").'--;'.'--cedit8--#--'.GetMessage("WZD_OPTION_SERVICES_47").'--,'.'--PROPERTY_'.$arProperty["MORE_WORKS_HEADER"].'--#--'.GetMessage("WZD_OPTION_SERVICES_48").'--,'.'--PROPERTY_'.$arProperty["MORE_WORKS"].'--#--'.GetMessage("WZD_OPTION_SERVICES_49").'--;'.'--edit14--#--'.GetMessage("WZD_OPTION_SERVICES_201").'--,'.'--IPROPERTY_TEMPLATES_ELEMENT_META_TITLE--#--'.GetMessage("WZD_OPTION_SERVICES_202").'--,'.'--IPROPERTY_TEMPLATES_ELEMENT_META_KEYWORDS--#--'.GetMessage("WZD_OPTION_SERVICES_203").'--,'.'--IPROPERTY_TEMPLATES_ELEMENT_META_DESCRIPTION--#--'.GetMessage("WZD_OPTION_SERVICES_204").'--,'.'--IPROPERTY_TEMPLATES_ELEMENT_PAGE_TITLE--#--'.GetMessage("WZD_OPTION_SERVICES_205").'--,'.'--IPROPERTY_TEMPLATES_ELEMENTS_PREVIEW_PICTURE--#----'.GetMessage("WZD_OPTION_SERVICES_206").'--,'.'--IPROPERTY_TEMPLATES_ELEMENT_PREVIEW_PICTURE_FILE_ALT--#--'.GetMessage("WZD_OPTION_SERVICES_207").'--,'.'--IPROPERTY_TEMPLATES_ELEMENT_PREVIEW_PICTURE_FILE_TITLE--#--'.GetMessage("WZD_OPTION_SERVICES_208").'--,'.'--IPROPERTY_TEMPLATES_ELEMENT_PREVIEW_PICTURE_FILE_NAME--#--'.GetMessage("WZD_OPTION_SERVICES_209").'--,'.'--IPROPERTY_TEMPLATES_ELEMENTS_DETAIL_PICTURE--#----'.GetMessage("WZD_OPTION_SERVICES_210").'--,'.'--IPROPERTY_TEMPLATES_ELEMENT_DETAIL_PICTURE_FILE_ALT--#--'.GetMessage("WZD_OPTION_SERVICES_211").'--,'.'--IPROPERTY_TEMPLATES_ELEMENT_DETAIL_PICTURE_FILE_TITLE--#--'.GetMessage("WZD_OPTION_SERVICES_212").'--,'.'--IPROPERTY_TEMPLATES_ELEMENT_DETAIL_PICTURE_FILE_NAME--#--'.GetMessage("WZD_OPTION_SERVICES_213").'--,'.'--SEO_ADDITIONAL--#----'.GetMessage("WZD_OPTION_SERVICES_214").'--,'.'--TAGS--#--'.GetMessage("WZD_OPTION_SERVICES_215").'--;'.'--edit2--#--'.GetMessage("WZD_OPTION_SERVICES_301").'--,'.'--XML_ID--#--'.GetMessage("WZD_OPTION_SERVICES_302").'--;'.'--'));CUserOptions::SetOption("list","tbl_iblock_list_".md5($iblockType.".".$iblockID),array("columns"=>"NAME, PREVIEW_PICTURE, PREVIEW_TEXT, PROPERTY_".$arProperty["POPULAR"].", SORT, ACTIVE","by"=>"sort","order"=>"asc","page_size"=>"20",));COption::SetOptionInt("effortless","iblockServicesID",$iblockID,false,WIZARD_SITE_ID);$arLanguages=Array();$arProperty=Array();$arUserFields=array("UF_SEO_DESCRIPTION","UF_COLOR");$rsLanguage=CLanguage::GetList($by,$order,array());while($arLanguage=$rsLanguage->Fetch())
$arLanguages[]=$arLanguage["LID"];foreach($arUserFields as $userField)
{$arLabelNames=Array();foreach($arLanguages as $languageID)
{WizardServices::IncludeServiceLang("property_names.php",$languageID);$arLabelNames[$languageID]=GetMessage($userField);}
$arProperty["EDIT_FORM_LABEL"]=$arLabelNames;$arProperty["LIST_COLUMN_LABEL"]=$arLabelNames;$arProperty["LIST_FILTER_LABEL"]=$arLabelNames;$dbRes=CUserTypeEntity::GetList(Array(),Array("ENTITY_ID"=>'IBLOCK_'.$iblockID.'_SECTION',"FIELD_NAME"=>$userField));if($arRes=$dbRes->Fetch())
{$userType=new CUserTypeEntity();$userType->Update($arRes["ID"],$arProperty);}}
$property=CIBlockProperty::GetList(Array("SORT"=>"ASC"),Array("IBLOCK_ID"=>COption::GetOptionInt("effortless","iblockStaffID",0,WIZARD_SITE_ID),"CODE"=>"MORE_SERVICES"));if($property_fields=$property->GetNext())
{$ibp=new CIBlockProperty;$ibp->Update($property_fields["ID"],array("LINK_IBLOCK_TYPE_ID"=>"effortless","LINK_IBLOCK_ID"=>$iblockID));}
WizardServices::ReplaceMacrosRecursive(WIZARD_SITE_PATH."services/",array("SITE_DIR"=>WIZARD_SITE_DIR,"IBLOCK_TYPE_SERVICES"=>$iblockType,"IBLOCK_ID_SERVICES"=>$iblockID,));?>