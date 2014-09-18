<form action="{$ADMIN_URL}banners/translate/{echo $model->Id}" method="post" id="item_t_save_form" style="width:100%;" enctype="multipart/form-data">
    <div id="shopSettingsTabs">
        <script>
            var message = "{lang('Message: ','admin')}";
            var edit_save = "{lang('Changes have been saved','admin')}";
            var error = "{lang('Error ','admin')}";

        </script>
        {foreach $languages as $language}
            <h4 title="{echo $language.lang_name}">{echo $language.lang_name}</h4>
            <div> <!-- Begin {echo $language.lang_name} tab -->
                {$model->setLocale($language.identif)}
                {foreach $translatableFieldNames as $fieldName}
                    {$methodName = 'get'.$fieldName}
                    <div class="form_text">{echo $model->getLabel($fieldName)}:</div>
                    <div class="form_input">
                        {if in_array($fieldName, $mceEditorFieldNames)}
                            <textarea class="elRTE" name="{echo $fieldName}_{echo $language.identif}" >{echo $model->$methodName()}</textarea>
                        {elseif in_array($fieldName, $imageFieldNames)}
                            <div class="imageBoxStripe" style="">
                                <table border="0" cellspacing="0" cellpadding="0" height="90px" width="90px">
                                    <tr>
                                        <td>
                                            {if $model->getImage() == true}
                                                <a href="/uploads/shop/banners/{echo $model->getImage()}?{rand(1,9999)}" class="boxed" rel="{literal}{handler:'image'}{/literal}" target="_blank">
                                                    <img src="/uploads/shop/banners/{echo $model->getImage()}?{rand(1,9999)}" style="cursor:pointer;" width="90px" />
                                                </a>
                                            {/if}
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            <div style="height:16px;width:125px;float:left;text-align: center; overflow: hidden;" class="button_silver_130">
                                <div style="color:#fff;" id="mainImageName_{echo $language.identif}">{lang('Select the file','admin')}</div>
                                <input type="file" onchange="$('mainImageName_{echo $language.identif}').set('html', document.getElementById('mainPhoto_{echo $language.identif}').value);" id="mainPhoto_{echo $language.identif}" class="mainPhoto" name="mainPhoto_{echo $language.identif}" size="1" />
                            </div>
                        {else:}
                            <input type="text" name="{echo $fieldName}_{echo $language.identif}" value="{echo $model->$methodName()}" class="textbox_long" />
                        {/if}
                        {if in_array($fieldName, $requairedFieldNames)}
                            <span class="required">*</span>
                        {/if}
                        {if $fieldName == 'Url'}
                            <div class="lite">{lang('The absolute path to the page','admin')}</div>
                        {/if}
                    </div>
                    <div class="form_overflow"></div>
                {/foreach}
            </div>
        {/foreach}
    </div>
    {form_csrf()}

    <div class="form_text"></div>
    <div class="form_input">
        <input type="submit" name="_add" value="{lang('Save','admin')}" class="button"/>
        <input type="button" name="button" class="button" value="{lang('Cancel','admin')}" onclick="MochaUI.closeWindow($('translate_list_item_Window'));" />
        <div class="form_overflow"></div>
    </div>
    <iframe id="upload_target" name="upload_target" src="" style="width:0;height:0;border:0px solid #fff;display:none;"></iframe>
</form>

{literal}
    <script type="text/javascript">
            window.addEvent('domready', function() {
                var SSettings_tabs = new SimpleTabs('shopSettingsTabs', {
                    selector: 'h4'
                });

                load_editor();

                SqueezeBox.assign($$('a.boxed'), {
                    parse: 'rel'
                });

                document.getElementById('item_t_save_form').onsubmit = function() {
                    document.getElementById('item_t_save_form').target = 'upload_target';
                    document.getElementById("upload_target").onload = translatingUploadCallback;
                }
            });
    </script>
{/literal}