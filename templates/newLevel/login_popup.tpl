{
/**
* @file template file for creating drop-down login form uses imagecms.api.js for submiting and appending validation errors
*/
}
<div class="drop-enter drop drop-style" id="enter">
    <button type="button" class="icon_times_drop" data-closed="closed-js"></button>
    <div class="drop-header">
        <div class="title">
            {lang('Вход в магазин','newLevel')}
        </div>
    </div>
    <div class="drop-content">
        <div class="inside-padd">
            <div class="horizontal-form">
                <form method="post" id="login_form" onsubmit="ImageCMSApi.formAction('{site_url("/auth/authapi/login")}', '#login_form');
                        return false;">
                    <label>
                        <span class="title">{lang('E-mail','newLevel')}</span>
                        <span class="frame-form-field">
                            <input type="text" name="email"/>
                            <span class="must">*</span>
                        </span>
                    </label>
                    <label>
                        <span class="title">{lang('Пароль','newLevel')}</span>
                        <span class="frame-form-field">
                            <input type="password" name="password"/>
                            <span class="must">*</span>
                        </span>
                    </label>
                    <!-- captcha block -->
                    <lable id="captcha_block">

                    </lable>
                    <div class="frame-label m-b_5">
                        <span class="title">&nbsp;</span>
                        <div class="frame-form-field">
                            <div class="clearfix m-t_15">
                                <span class="btn-back-prod btn-back-prod-ent f_l">
                                    <button type="submit">
                                        <span class="text-el">{lang('Войти','newLevel')}</span>
                                        <span class="icon_show_all"></span>
                                    </button>
                                </span>
                                <div class="f_r neigh-buttonform">
                                    <span class="helper"></span>
                                    <button type="button" class="pointer" data-drop=".drop-forgot" data-source="{site_url('auth/forgot_password')}"><span class="text-el d_l_red">{lang('Напоминание пароля','newLevel')}</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="drop-footer">
        <div class="frame-label">
            <div class="frame-form-field">
                <div class="help-block m-b_5">{lang('Для новых покупателей нашего магазина','newLevel')}</div>
                <button type="button">
                    <span class="icon_enter"></span>
                    <a href="/auth/register" class="c_6">{lang('Регистрация','newLevel')}</a>
                </button>
            </div>
        </div>
        {form_csrf()}
    </div>
</div>