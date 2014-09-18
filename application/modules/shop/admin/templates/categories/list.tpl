<section class="mini-layout">
    <div class="frame_title clearfix">
        <div class="pull-left">
            <span class="help-inline"></span>
            <span class="title">{lang('Product categories','admin')}</span>
        </div>
        <div class="pull-right">
            <div class="d-i_b">
                <a class="btn btn-small btn-success pjax" href="/admin/components/run/shop/categories/create"><i class="icon-plus-sign icon-white"></i>{lang('Create a category','admin')}</a>
                <button type="button" onclick="shopCategories.deleteCategories()" class="btn btn-small btn-danger disabled action_on" id="del_sel_cat"><i class="icon-trash icon-white"></i>{lang('Delete','admin')}</button>
            </div>
        </div>                            
    </div>
    <div class="frame_level table table-striped table-bordered table-hover table-condensed products_table">
        {if sizeof($tree)>0}
            <div id="category">
                <div class="row-category p_cat_row-category head">
                    <div class="t-a_c">
                        <span class="frame_label">
                            <span class="niceCheck b_n">
                                <input type="checkbox">
                            </span>
                        </span>
                    </div>
                    <div>ID</div>
                    <div style="width: 42%;">{lang('Name','admin')}</div>
                    <div>{lang('URL','admin')}</div>
                    <div>{lang('Product','admin')}</div>
                    <div>{lang('Active','admin')}</div>
                </div>
                <div class="body_category">
                    {$htmlTree}
                </div>
            </div>
        {else:}
            </br>
            <div class="alert alert-info">
                {lang('There are no categories at the site','admin')}
            </div>
        {/if}
    </div>
    <div class="clearfix">
    </div>

    <div class="modal hide fade">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h3>{lang('Category delete','admin')}</h3>
        </div>
        <div class="modal-body">
            <p>{lang('Remove selected categories','admin')}?</p>
            <p>{lang('Attention! will also remove all the products from this category','admin')}</p>
        </div>
        <div class="modal-footer">
            <a href="#" class="btn btn-primary pjax" onclick="shopCategories.deleteCategoriesConfirm()" >{lang('Delete','admin')}</a>
            <a href="#" class="btn" onclick="$('.modal').modal('hide');">{lang('Cancel','admin')}</a>
        </div>
    </div>

</section>
