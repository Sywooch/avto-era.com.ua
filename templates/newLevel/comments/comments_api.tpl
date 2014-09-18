{if $can_comment == 1 AND !$is_logged_in}
    <label>
        <span class="title__icsi-css"><b>{sprintf(lang('Пожалуйста, войдите для комментирования', 'newLevel'), site_url($modules.auth))}</b></span>
    </label>
{/if}
<div class="comment__icsi-css" id="comment__icsi-css">
    <div class="title_h2__icsi-css">{lang('Отзывы о товаре', 'newLevel')}</div>
    {if $comments_arr}
        <div class="frame-list-comment__icsi-css frame-list-comment__icsi-css-wrap">
            <ul class="sub-1 product-comment product-view">
                {foreach $comments_arr as $key => $comment}
                    <li>
                        <input type="hidden" name="comment_item_id" value="{$comment['id']}"/>
                        <div class="author-data-comment__icsi-css">
                            <span class="f-s_0"><span class="icon_comment"></span><span class="author-comment__icsi-css">{$comment.user_name}, </span></span>
                            <span class="date-comment__icsi-css">
                                <span class="day">{echo date("d", $comment.date)} </span>
                                <span class="month">{echo month(date("n", $comment.date))} </span>
                                <span class="year">{echo date("Y ", $comment.date)}</span>
                            </span>
                        </div>
                        <div class="clearfix">
                            <div class="frame-comment__icsi-css">
                                <p>{$comment.text}</p>
                                {if $comment.text_plus != Null}
                                    <p>
                                        <b>{lang('Да', 'newLevel')}</b><br>
                                        {$comment.text_plus}
                                    </p>
                                {/if}
                                {if $comment.text_minus != Null}
                                    <p>
                                        <b>{lang('Нет', 'newLevel')}</b><br>
                                        {$comment.text_minus}
                                    </p>
                                {/if}
                                <div class="func-button-comment__icsi-css">
                                    {if $can_comment == 0 OR $is_logged_in}
                                        <div class="btn__icsi-css f_l__icsi-css">
                                            <button type="button" data-rel="cloneAddPaste" data-parid="{$comment['id']}" class="pointer">
                                                <span class="icon-comment__icsi-css"></span>
                                                <span class="text-el d_l_gr">{lang('Ответить')}</span>
                                            </button>
                                        </div>
                                    {/if}
                                </div>
                            </div>
                            <div class="frame-comment__icsi-css_right">
                                {if $comment.rate != 0}
                                    <div class="mark-pr d_b">
                                        <span class="c_9">{lang('Оценка товара','newLevel')}</span>
                                        <div class="star-small d_i-b">
                                            <div class="productRate star-small">
                                                <div style="width: {echo (int)$comment.rate *20}%"></div>
                                            </div>
                                        </div>
                                    </div>
                                {/if}
                                <div class="f_r__icsi-css">
                                    <span>
                                        <span class="s-t" style="margin-bottom: 3px; display: inline-block;">{lang('Был ли вам этот отзыв полезен?','newLevel')}</span>
                                        <span class="btn__icsi-css like__icsi-css">
                                            <button type="button" class="usefullyes" data-comid="{echo $comment.id}">
                                                <span class="icon_usefullyes"></span>
                                                <span class="text-el">{lang('Да','newLevel')} <span class="yesholder{$comment.id}">({echo $comment.like})</span></span>
                                            </button>
                                        </span>
                                        <span class="btn__icsi-css dis-like__icsi-css">
                                            <button type="button" class="usefullno" data-comid="{echo $comment.id}">
                                                <span class="icon_usefullno"></span>
                                                <span class="text-el">{lang('Нет','newLevel')} <span class="noholder{$comment.id}">({echo $comment.disslike})</span></span>
                                            </button>
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        {$countAnswers = $CI->load->module('comments')->commentsapi->getCountCommentAnswersByCommentId($comment.id)}
                        {if $countAnswers}
                            <ul class="frame-list-comment__icsi-css sub-2">
                                {foreach $comment_ch as $com_ch}
                                    {if $com_ch.parent == $comment.id}
                                        <li>
                                            <div class="author-data-comment__icsi-css">
                                                <span class="author-comment__icsi-css">{$com_ch.user_name}</span>
                                                <span class="date-comment__icsi-css">
                                                    <span class="day">{echo date("d", $comment.date)} </span>
                                                    <span class="month">{echo month(date("n", $comment.date))} </span>
                                                    <span class="year">{echo date("Y ", $comment.date)}</span>
                                                </span>
                                            </div>
                                            <div class="frame-comment__icsi-css">
                                                <p>
                                                    {$com_ch.text}
                                                </p>
                                            </div>
                                        </li>
                                    {/if}
                                {/foreach}
                            </ul>
                        {/if}
                        <div class="btn-all-comments">
                            <button type="button"><span class="text-el pointer" data-hide='<span class="d_l_gr">{lang('Скрыть','newLevel')}</span> ↑' data-show='<span class="d_l_gr">{lang('Все ответы','newLevel')}</span> ↓'></span></button>
                        </div>
                    </li>
                {/foreach}
            </ul>
            <button class="t-d_n f-s_0 s-all-d ref d_n_" data-trigger="[data-href='#comment']" data-scroll="true">
                <span class="icon_arrow"></span>
                <span class="text-el">{lang('Смотреть все ответы','newLevel')}</span>
            </button>
        </div>
    {/if}
    {if $can_comment == 0 OR $is_logged_in}
        <div class="main-form-comments__icsi-css {if !$comments_arr}noComments{/if}">
            <div class="frame-comments__icsi-css layout-highlight">
                <div class="title_h2__icsi-css title-default">{lang('Оставьте свой отзыв','newLevel')}</div>
                <!-- Start of new comment fild -->
                <div class="form-comment__icsi-css form__icsi-css main-form-comments">
                    <div class="inside-padd">
                        <form method="post">
                            {if !$is_logged_in}
                                {/*if $use_moderation}
                                <label>
                                    <span class="frame_form_field__icsi-css">
                                        <div class="msg">
                                            <div class="success">
                                                {lang('Комментарий будет отправлен на модерацию','newLevel')}
                                            </div>
                                        </div>
                                    </span>
                                </label>
                            {/if */}
                            <div class="clearfix">
                                <label style="width: 52%;float: left;">
                                    <span class="title__icsi-css">{lang('Как вас зовут','newLevel')}</span>
                                    <span class="frame_form_field__icsi-css">
                                        <input type="text" name="comment_author" value="{get_cookie('comment_author')}"/>
                                    </span>
                                </label>
                                <label style="width: 44%;margin-left: 4%;float: left;">
                                    <span class="title__icsi-css" style="width: 45px;">{lang('E-mail', 'newLevel')}</span>
                                    <span class="frame_form_field__icsi-css" style="margin-left:55px;">
                                        <input type="text" name="comment_email" id="comment_email" value="{get_cookie('comment_email')}"/>
                                    </span>
                                </label>
                            </div>
                        {/if}
                        <label>
                            <span class="title__icsi-css">{lang('Комментарий')}</span>
                            <span class="frame_form_field__icsi-css">
                                <textarea name="comment_text" class="comment_text">{$_POST.comment_text}</textarea>
                            </span>
                        </label>
                        <!-- Start star reiting -->
                        <div class="frameLabel__icsi-css">
                            <div class="frame_form_field__icsi-css">
                                <div class="star">
                                    <div class="productRate star-big clicktemprate">
                                        <div class="for_comment" style="width: 0%"></div>
                                        <input class="ratec" name="ratec" type="hidden" value=""/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End star reiting -->
                        {if $use_captcha}
                            <label>
                                <span class="title__icsi-css">{lang('Код защиты')}</span>
                                {$cap_image}
                                <span class="frame_form_field__icsi-css">
                                    <input type="text" name="captcha" id="captcha"/>
                                </span>
                            </label>
                        {/if}

                        <div class="frameLabel__icsi-css">
                            <span class="frame_form_field__icsi-css">
                                <div class="btn-comment">
                                       <input type="submit" value="{lang('Отправить')}" onclick="Comments.post
                                            (this)"/>
                                </div>
                            </span>
                        </div>
                    </form>
                </div>
                <!-- End of new comment fild -->
            </div>
        </div>
    </div>
    {/if}
        <div class="frame-drop-comment__icsi-css" data-rel="whoCloneAddPaste">
            <div class="form-comment__icsi-css form__icsi-css layout-highlight frame-comments__icsi-css">
                <div class="inside-padd">
                    <form>
                        <label class="err-label">
                            <span class="frame_form_field__icsi-css">
                                <div class="frameLabel__icsi-css error" name="error_text"></div>
                            </span>
                        </label>
                        {/*}
                        <label>
                            <span class="frame_form_field__icsi-css">
                                <div class="msg">
                                    <div class="success">
                                        {lang('Комментарий будет отправлен на модерацию','newLevel')}
                                    </div>
                                </div>
                            </span>
                        </label>
                        { */}
                        {if !$is_logged_in}
                            <label>
                                <span class="title__icsi-css">{lang('Ваше имя:', 'newLevel')}</span>
                                <span class="frame_form_field__icsi-css">
                                    <input type="text" name="comment_author" value="{get_cookie('comment_author')}"/>
                                </span>
                            </label>
                            <label>
                                <span class="title__icsi-css">{lang('Ваш email:', 'newLevel')} </span>
                                <span class="frame_form_field__icsi-css">
                                    <input type="text" name="comment_email" value="{get_cookie('comment_email')}"/>
                                </span>
                            </label>
                            <label>
                                <span class="frame_form_field__icsi-css">
                                    <div class="msg">
                                        <div class="success">
                                            {lang('Комментарий будет отправлен на модерацию','newLevel')}
                                        </div>
                                    </div>
                                </span>
                            </label>
                        {/if}
                        <label>
                            <span class="title__icsi-css">{lang('Текст ответа:','newLevel')}</span>
                            <span class="frame_form_field__icsi-css">
                                <textarea class="comment_text" name="comment_text"></textarea>
                            </span>
                        </label>
                        <div class="frameLabel__icsi-css">
                            <span class="frame_form_field__icsi-css">
                                <input type="hidden" id="parent" name="comment_parent" value="">
                                <span class="btn-comment btn-comment-s">
                                    <input type="submit" value="{lang('Отправить', 'newLevel')}" onclick="Comments.post(this)"/>
                                </span>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>