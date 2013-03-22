[{$smarty.block.parent}]
[{oxscript include=$oViewConf->getOtranceJsUrl() priority=10 }]
<div id="otrance-connector" title="[{oxmultilang ident="TRANSLATE_USING_OTC"}]">
    <form method="post" target="_blank" id="otrance-connector-form" action="[{$oViewConf->getOtranCeUrl()}]/connector/index"
          accept-charset="UTF-8">
    [{assign var="aKeys" value=$oViewConf->getTranslatedKeys()}]
        [{foreach from=$aKeys key=keyName item=translation}]
            <input type="hidden" name="oTranceKeys[[{$keyName|escape}]]" value="[{$translation|escape}]" />
        [{/foreach}]
    </form>
</div>
