<section class="mini-layout">
    <div class="frame_title clearfix">
        <div class="pull-left">
            <span class="help-inline"></span>
            <span class="title">{lang('Фдмин панель для обновления продуктов: колес и дисков', 'avtoadmin')} </span>
        </div>
        <div class="pull-right">
            <div class="d-i_b">
                <a href="{$BASE_URL}admin/components/modules_table" class="t-d_n m-r_15 pjax"><span class="f-s_14">←</span> <span class="t-d_u">{lang('Обратно', 'avtoadmin')}</span></a>
                <button type="button" 
                        class="btn btn-small btn-primary action_on formSubmit" 
                        data-form="#settings_form" 
                        data-action="save">
                    <i class="icon-ok"></i>{lang('Сохранить', 'avtoadmin')}
                </button>
            </div>
        </div>                            
    </div>
    <form method="post" action="{site_url('admin/components/cp/avtoadmin/update_products')}" class="form-horizontal" id="settings_form" enctype="multipart/form-data">
        <table class="table table-striped table-bordered table-hover table-condensed">
            <thead>
                <tr>
                    <th colspan="6">
                       {lang('Authorization settings using your Google account', 'socauth')}
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="6">
                    	<fieldset>
							<legend>{lang('Загрузка файла ШИНЫ', 'avtoadmin')}</legend>
                    
	                        <div class="inside_padd">
	                        	<div class="control-group">
									<label class="control-label" for="FileTiresUpload">File Tires Upload:</label>
									
									<div class="controls">
										<span class="btn btn-small p_r pull-left">
										<i class="icon-folder-open"></i>
										  Выберите файл
										<input id="importcsvfile" class="btn-small btn" type="file" name="userfile">
										</span>
									</div>
								</div>
	                        
	                        
	                            <!-- <div class="control-group">
	                                <span class="control-label">
	                                    <span data-title="&lt;b&gt;OAuth2 client ID&lt;/b&gt;" class="popover_ref" data-original-title="">
	                                        <i class="icon-info-sign"></i>
	                                    </span>
	                                    <div class="d_n">{lang('Need to get 1 time', 'socauth')}</div>&nbsp;{lang('Get', 'socauth')} OAuth2 client ID:
	                                </span>
	                                <div class="controls">
	                                    <a href="https://code.google.com/apis/console#access" target="_blank">{lang('Get', 'socauth')}</a>
	                                </div>
	                            </div>
	                            <div class="control-group">
	                                <label class="control-label" for="ClientID">Client ID:</label>
	                                <div class="controls number">
	                                    <input type = "text" name = "googleClientID" value = "{$settings['googleClientID']}"/>
	                                </div>
	                            </div>
	                            <div class="control-group">
	                                <label class="control-label" for="ClientSecret">Client secret:</label>
	                                <div class="controls">
	                                    <input type = "text" name = "googleClientSecret" value = "{$settings['googleClientSecret']}"/>
	                                </div>
	                            </div>
	                            <div class="control-group">
	                                <label class="control-label">{lang('Use authorization via Google', 'socauth')}</label>
	                                <div class="controls">
	                                    <span class="frame_label no_connection">
	                                        <span class="niceCheck b_n">
	                                            <input type = "checkbox" name="useGoogle"{if $settings['useGoogle'] == 'on'} checked="true"{/if}/>
	                                        </span>
	                                    </span>
	                                </div>
	                            </div>
	                             -->
	                        </div>
                        
                        </fieldset>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</section>