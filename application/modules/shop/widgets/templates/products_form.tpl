<section class="mini-layout" style="padding-top: 39px;">
    <div class="frame_title clearfix" style="top: 65px; width: 1168px;">
        <div class="pull-left">
            <span class="help-inline"></span>
            <span class="title">Настройки виджета <b>{$widget.name}</b></span>
        </div>
        <div class="pull-right">
            <div class="d-i_b">
                <a class="t-d_n m-r_15 pjax" href="{$BASE_URL}admin/widgets_manager/index"><span class="f-s_14">←</span> <span class="t-d_u">Вернуться</span></a>
                <button data-submit="" data-form="#widget_form" class="btn btn-small btn-primary formSubmit" type="button"><i class="icon-ok"></i>Сохранить</button>
                <button data-action="tomain" data-form="#widget_form" class="btn btn-small formSubmit" type="button"><i class="icon-edit"></i>Сохранить и выйти</button>
            </div>
        </div>                            
    </div>
    <form class="form-horizontal" method="post" id="widget_form" action="{$BASE_URL}admin/widgets_manager/update_widget/{$widget.id}">
        <table class="table table-striped table-bordered table-hover table-condensed content_big_td">
            <thead>
                <tr><th>Настройки</th>
                </tr></thead>
            <tbody>
                <tr>
                    <td>
                        <div class="inside_padd span9">
                            <div class="control-group">
                                <label for="popular" class="control-label">Сортировать по:</label>
                                <div class="controls">
                                    <select id="popular"  name="productsType[]">
                                        <option {if strpos($widget.settings.productsType, "popular") !== false}  selected="selected"{/if} value="popular" name="productsType[]">Популярным</option>
                                        <option {if strpos($widget.settings.productsType, "date") !== false}  selected="selected"{/if} value="date" name="productsType[]">Дате</option>
                                    </select>
                                </div>
                            </div>                           
                            <div class="control-group">
                                <label for="new" class="control-label">Новинки:</label>
                                <div class="controls">      
                                    <span class="frame_label no_connection d_b">
                                        <span class="niceCheck">
                                            <input type="checkbox" id="new" {if strpos($widget.settings.productsType,"hot") !== false}  checked="checked"{/if} value="hot" name="productsType[]" />                        
                                        </span>
                                    </span>
                                </div>
                            </div>
                            <div class="control-group">
                                <label for="action" class="control-label">Акции:</label>
                                <div class="controls">      
                                    <span class="frame_label no_connection d_b">
                                        <span class="niceCheck">
                                            <input type="checkbox" id="action" {if strpos($widget.settings.productsType, "action") !== false}  checked="checked"{/if} value="action" name="productsType[]" />
                                        </span>
                                    </span>
                                </div>
                            </div>
                            <div class="control-group">
                                <label for="hit" class="control-label">Хиты:</label>
                                <div class="controls"> 
                                    <span class="frame_label no_connection d_b">
                                        <span class="niceCheck">
                                            <input type="checkbox" id="hit" {if strpos($widget.settings.productsType, "hit") !== false}  checked="checked"{/if} value="hit" name="productsType[]" /> 
                                        </span>
                                    </span>
                                </div>
                            </div>
                            <div class="control-group">
                                <label for="oldPrice" class="control-label">Старая цена:</label>
                                <div class="controls">  
                                    <span class="frame_label no_connection d_b">
                                        <span class="niceCheck">
                                            <input type="checkbox" id="oldPrice" {if strpos($widget.settings.productsType, "oldPrice") !== false}  checked="checked"{/if} value="oldPrice" name="productsType[]" /> 
                                        </span>
                                    </span>
                                </div>
                            </div>
                            <div class="control-group">
                                <label for="oldPrice" class="control-label">Учитывать категорию:</label>
                                <div class="controls">   
                                    <span class="frame_label no_connection d_b">
                                        <span class="niceCheck">
                                            <input type="checkbox" id="oldPrice" {if strpos($widget.settings.productsType, "category") !== false}  checked="checked"{/if} value="category" name="productsType[]" /> 
                                        </span>
                                    </span>
                                </div>
                            </div>

                            <div class="control-group">
                                <label for="symcount" class="control-label">Заголовок виджета:</label>
                                <div class="controls">                                   
                                    <input type="text" value="{$widget.settings.title}" name="title">                                        
                                </div>
                            </div>

                            <div class="control-group">
                                <label for="newscount" class="control-label">Количество товаров для отображения:</label>
                                <div class="controls">
                                    <input type="number"  value="{$widget.settings.productsCount}" name="productsCount" class="numeric" min="0"> 
                                </div>            
                            </div>

                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        {form_csrf()}
</section>