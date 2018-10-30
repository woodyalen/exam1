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
<div class="item-wrap">
	<div class="rew-footer-carousel">
	<?foreach($arResult["ITEMS"] as $arItem):?>
		<div class="item">
			<div class="side-block side-opin">
				<div class="inner-block">
					<div class="title">
						<div class="photo-block">
						<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>	
							<?
							$renderImage = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], Array("width" => 39, "height" => 39));
							$arItem['PREVIEW_PICTURE']['SRC'] = $renderImage['src'];
							?>						
							<img 
								src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"								
								alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"								
								/>
							<?else:?>
							<img src="<?=$templateFolder?>/image/no_photo_left_block.jpg?>" alt="no photo" />
						<?endif?>
						</div>
						<div class="name-block">
						<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
							<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
								<a href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><?echo $arItem["NAME"]?></a>
							<?else:?>
								<?echo $arItem["NAME"]?>
							<?endif;?>
						<?endif;?>
						</div>
						<div class="pos-block">
							<?//echo "<pre>", var_dump($arItem) ,"</pre>"?>
							<?if (isset($arItem['DISPLAY_PROPERTIES']['POSITION'])):?>
								<?=$arItem['DISPLAY_PROPERTIES']['POSITION']['DISPLAY_VALUE'] . ", "?>
							<?endif?>
							<?if (isset($arItem['DISPLAY_PROPERTIES']['COMPANY'])):?>
								<?=$arItem['DISPLAY_PROPERTIES']['COMPANY']['DISPLAY_VALUE']?>
							<?endif?>
						
						</div>
					</div>
					<div class="text-block">
					<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
						<?echo $arItem["PREVIEW_TEXT"];?>
					<?endif;?>
					</div>
				</div>
			</div>
		</div>
	<?endforeach?>
	</div>
</div>

