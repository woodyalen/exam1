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
//echo "<pre>", var_dump($arResult), "</pre>";
?>
<hr>
<div class="review-block">
	<div class="review-text">
		<div class="review-text-cont">
		<?if(strlen($arResult["DETAIL_TEXT"])>0):?>
			<?echo $arResult["DETAIL_TEXT"];?>
		<?else:?>
			<?echo $arResult["PREVIEW_TEXT"];?>
		<?endif?>		
		</div>
		<div class="review-autor">
			<?if($arParams["DISPLAY_NAME"]!="N" && $arResult["NAME"]):?>
				<?=$arResult["NAME"]. ", "?>
			<?endif;?>
			<?if($arParams["DISPLAY_DATE"]!="N" && $arResult["DISPLAY_ACTIVE_FROM"]):?>
				<?=$arResult["DISPLAY_ACTIVE_FROM"]. ", "?>
			<?endif;?>
			<?if (isset($arItem['DISPLAY_VALUES']['POSITION']['DISPLAY_VALUE'])):?>
				<?$arItem['DISPLAY_VALUES']['POSITION']['DISPLAY_VALUE'] . ", "?>
			<?endif?>
			<?if (isset($arItem['DISPLAY_VALUES']['COMPANY']['DISPLAY_VALUE'])):?>
				<?$arItem['DISPLAY_VALUES']['COMPANY']['DISPLAY_VALUE'] . "."?>
			<?endif?>
		</div>
	</div>
	<div style="clear: both;" class="review-img-wrap">
	<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])):?>
		<img
			src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>"
			alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>"
			title="<?=$arResult["DETAIL_PICTURE"]["TITLE"]?>"
			/>
		<?else:?>
		<img src="<?=$templateFolder?>/image/no_photo.jpg" />
	<?endif?>
	</div>
</div>
<?if (isset($arResult['DISPLAY_PROPERTIES']['FILES'])):?>
	<div class="exam-review-doc">
	<p>Документы:</p>
	<?foreach ($arResult['DISPLAY_PROPERTIES']['FILES']['FILE_VALUE'] as $arFiles):?>
		<?//echo "<pre>", var_dump($templateFolder), "</pre>";?>
		<div  class="exam-review-item-doc"><img class="rew-doc-ico" src="<?=$templateFolder?>/image/pdf_ico_40.png"><a href="<?=$arFiles['SRC']?>"><?=$arFiles['ORIGINAL_NAME']?></a></div>
	<?endforeach?>
</div>
<?endif?>
<hr>