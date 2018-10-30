<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<?//echo "<pre>",  var_dump($arResult),"</pre>"?>
<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<div id="<?=$this->GetEditAreaId($arItem['ID']);?>" class="review-block">
		<div class="review-text">
		
			<div class="review-block-title">
				<span class="review-block-name">
					<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
						<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
							<a href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><?echo $arItem["NAME"]?></a>
						<?else:?>
							<?echo $arItem["NAME"]?>
						<?endif;?>
					<?endif;?>
				</span>
				<span class="review-block-description">
				<?if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
					<?echo $arItem["DISPLAY_ACTIVE_FROM"] . ", "?>
				<?endif?>
				<?if (isset($arItem['DISPLAY_PROPERTIES']['POSITION'])):?>
					<?=$arItem['DISPLAY_PROPERTIES']['POSITION']['DISPLAY_VALUE'] . ", "?>
				<?endif?>
				<?if (isset($arItem['DISPLAY_PROPERTIES']['COMPANY'])):?>
					<?=$arItem['DISPLAY_PROPERTIES']['COMPANY']['DISPLAY_VALUE']?>
				<?endif?>
				</span>
			</div>
			
			<div class="review-text-cont">
			<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
				<?echo $arItem["PREVIEW_TEXT"];?>
			<?endif;?>
			</div>
		</div>
		<div class="review-img-wrap">
			<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
				<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
					<a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><img							
							src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"							
							alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
							title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
							/></a>
				<?else:?>
					<img
						src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"						
						alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
						title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
						/>
				<?endif;?>
			<?else:?>
				<img src="<?=$templateFolder?>/image/no_photo.jpg" />
			<?endif?>
		</div>
	</div>
	
<?endforeach;?>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>