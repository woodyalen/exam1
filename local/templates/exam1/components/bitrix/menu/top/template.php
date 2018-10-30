<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
 <?//echo "<pre>" , var_dump($arResult), "</pre>"?>
<nav class="nav">
	<div class="inner-wrap">
		<div class="menu-block popup-wrap">
			<a href="" class="btn-menu btn-toggle"></a>
			<div class="menu popup-block">
				<ul class="">

<?
$previousLevel = 0;
foreach($arResult as $arItem):?>

	<?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
		<?=str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
	<?endif?>

	<?if ($arItem["IS_PARENT"]):?>

		<?if ($arItem["DEPTH_LEVEL"] == 1):?>
			<li><a href="<?=$arItem["LINK"]?>" <?if (isset($arItem['PARAMS']['MENU_COLOR'])):?> class="color-<?=$arItem['PARAMS']['MENU_COLOR']?>" <?endif?>><?=$arItem["TEXT"]?></a>
				<ul>
					<?if (isset($arItem['PARAMS']['MENU_TEXT'])):?><div class="menu-text"><?=$arItem['PARAMS']['MENU_TEXT']?></div><?endif?>
		<?else:?>
			<li><a href="<?=$arItem["LINK"]?>" ><?=$arItem["TEXT"]?></a>
				<ul>
		<?endif?>

	<?else:?>

		<?if ($arItem["PERMISSION"] > "D"):?>

			<?if ($arItem["DEPTH_LEVEL"] == 1):?>
				<li <?if ($arItem['PARAMS']['MENU_ICON_CLASS']):?> class="<?=$arItem['PARAMS']['MENU_ICON_CLASS']?>" <?endif?>><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
			<?else:?>
				<?if (isset($arItem['PARAMS']['MENU_TEXT'])):?><div class="menu-text"><?=$arItem['PARAMS']['MENU_TEXT']?></div><?endif?>
				<li><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
			<?endif?>

		<?else:?>

		<?endif?>

	<?endif?>

	<?$previousLevel = $arItem["DEPTH_LEVEL"];?>

<?endforeach?>

<?if ($previousLevel > 1)://close last item tags?>
	<?=str_repeat("</ul></li>", ($previousLevel - 1));?>
<?endif?>

</ul>
						<a href="" class="btn-close"></a>
                    </div>
                    <div class="menu-overlay"></div>
                </div>
            </div>
        </nav>
<?endif?>