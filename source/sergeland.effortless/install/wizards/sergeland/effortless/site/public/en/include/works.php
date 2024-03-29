<div class="section <?=(!empty($_SESSION["SERGELAND_THEME"][SITE_ID]["WORKS_BG"]) ? $_SESSION["SERGELAND_THEME"][SITE_ID]["WORKS_BG"] : COption::GetOptionString("effortless", "SERGELAND_THEME_WORKS_BG", "white-bg", SITE_ID))?> clearfix">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2 class="underline">Our projects</h2>
				<p>Sed ut Perspiciatis Unde Omnis Iste Sed ut sit  voluptatem accusan tium</p>				
				<?$APPLICATION->IncludeComponent("bitrix:catalog.section", "works", Array(
						"IBLOCK_TYPE" => "#IBLOCK_TYPE_WORKS#",
						"IBLOCK_ID" => "#IBLOCK_ID_WORKS#",
						"SECTION_ID" => $_REQUEST["SECTION_ID"],
						"SECTION_CODE" => "",
						"SECTION_USER_FIELDS" => "",
						"ELEMENT_SORT_FIELD" => "property_TOP_SORT",
						"ELEMENT_SORT_ORDER" => "asc",
						"ELEMENT_SORT_FIELD2" => "name",
						"ELEMENT_SORT_ORDER2" => "asc",
						"FILTER_NAME" => "arrFilter",
						"INCLUDE_SUBSECTIONS" => "Y",
						"SHOW_ALL_WO_SECTION" => "Y",
						"PAGE_ELEMENT_COUNT" => "1000000",
						"LINE_ELEMENT_COUNT" => "4",
						"PROPERTY_CODE" => array(
							0 => "TOP",
							1 => "TOP_SORT",
							2 => "TOP_SUBTITLE",
							3 => "TOP_PHOTO_TOP",
							4 => "TOP_PHOTO_BOTTOM",
							5 => "PREVIEW_PICTURE_DESCRIPTION",
						),
						"OFFERS_LIMIT" => "5",
						"ADD_PICT_PROP" => "-",
						"LABEL_PROP" => "-",
						"SECTION_URL" => "",
						"DETAIL_URL" => "",
						"SECTION_ID_VARIABLE" => "SECTION_ID",
						"AJAX_MODE" => "N",
						"AJAX_OPTION_JUMP" => "N",
						"AJAX_OPTION_STYLE" => "N",
						"AJAX_OPTION_HISTORY" => "N",
						"CACHE_TYPE" => "A",
						"CACHE_TIME" => "36000000",
						"CACHE_GROUPS" => "Y",
						"SET_META_KEYWORDS" => "Y",
						"META_KEYWORDS" => "-",
						"SET_META_DESCRIPTION" => "Y",
						"META_DESCRIPTION" => "-",
						"BROWSER_TITLE" => "-",
						"ADD_SECTIONS_CHAIN" => "N",
						"DISPLAY_COMPARE" => "N",
						"SET_TITLE" => "N",
						"SET_STATUS_404" => "N",
						"CACHE_FILTER" => "Y",
						"PRICE_CODE" => "",
						"USE_PRICE_COUNT" => "N",
						"SHOW_PRICE_COUNT" => "1",
						"PRICE_VAT_INCLUDE" => "Y",
						"ACTION_VARIABLE" => "action",
						"PRODUCT_ID_VARIABLE" => "id",
						"USE_PRODUCT_QUANTITY" => "N",
						"ADD_PROPERTIES_TO_BASKET" => "Y",
						"PRODUCT_PROPS_VARIABLE" => "prop",
						"PARTIAL_PRODUCT_PROPERTIES" => "N",
						"PRODUCT_PROPERTIES" => "",
						"PAGER_TEMPLATE" => "",
						"DISPLAY_TOP_PAGER" => "N",
						"DISPLAY_BOTTOM_PAGER" => "N",
						"PAGER_SHOW_ALWAYS" => "N",
						"PAGER_DESC_NUMBERING" => "N",
						"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
						"PAGER_SHOW_ALL" => "N",
						"AJAX_OPTION_ADDITIONAL" => "",
						"PRODUCT_QUANTITY_VARIABLE" => "quantity",
						"TEMPLATE_THEME" => "blue",
						"MESS_BTN_BUY" => "",
						"MESS_BTN_ADD_TO_BASKET" => "",
						"MESS_BTN_SUBSCRIBE" => "",
						"MESS_BTN_DETAIL" => "",
						"MESS_NOT_AVAILABLE" => "",
						"SET_BROWSER_TITLE" => "Y",
						"BASKET_URL" => "/personal/basket.php",
						"PAGER_TITLE" => "",
						"AUTOPLAY" => (!empty($_SESSION["SERGELAND_THEME"][SITE_ID]["WORKS_AUTOPLAY"]) ? $_SESSION["SERGELAND_THEME"][SITE_ID]["WORKS_AUTOPLAY"] : COption::GetOptionString("effortless", "SERGELAND_THEME_WORKS_AUTOPLAY", "carousel", SITE_ID)),
					),
					false
				);?>			
			</div>
		</div>
	</div>
</div>