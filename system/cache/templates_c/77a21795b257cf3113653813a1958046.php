<div class="container">
    <section class="mini-layout">
        <div class="frame_title clearfix">
            <div class="pull-left">
                <span class="help-inline"></span>
                <span class="title"><?php echo lang ('Banners management', 'banners'); ?></span>
            </div>
            <div class="pull-right">
                <div class="d-i_b">
                    
                    <span style="position: relative">
                        <a href="#" onclick="$(this).next().slideToggle();return false" class="btn btn-small"><?php echo lang ('Template settings', 'banners'); ?></a>
                        <div style="position: absolute; display: none; background-color: white; padding: 8px; margin-top: 5px; border-radius: 5px; width: 335px;">
                            <input <?php if($show_tpl): ?>checked='checked'<?php endif; ?>type="checkbox" onclick="chckTplParam(this);" /> <?php echo lang ('Use different templates for different pages', 'banners'); ?>
                        </div>
                    </span>

                    <a href="/admin/components/init_window/banners/create" class="btn btn-small btn-success pjax"><i class="icon-plus-sign icon-white"></i><?php echo lang ('Create a banner', 'banners'); ?></a>
                    <button type="button" class="btn btn-small btn-danger disabled action_on" id="banner_del" onclick="DeleteSliderBanner()"><i class="icon-trash icon-white"></i><?php echo lang ('Delete', 'banners'); ?></button>
                </div>
            </div>
        </div>
        <div class="tab-content">
            <div class="row-fluid">
                <?php if(count($banners) > 0): ?>
                    <table class="table table-striped table-bordered table-hover table-condensed">
                        <thead>
                            <tr>
                                <th class="t-a_c span1">
                                    <span class="frame_label">
                                        <span class="niceCheck b_n">
                                            <input type="checkbox" />
                                        </span>
                                    </span>
                                </th>
                                <th class="span1"><?php echo lang ('ID', 'banners'); ?></th>
                                <th class="span3"><?php echo lang ('Name', 'banners'); ?></th>
                                <th class="span2" style="width:80px;"><?php echo lang ('Active to', 'banners'); ?></th>
                                <th class="span1" style="width:60px;"><?php echo lang ('Status', 'banners'); ?></th>

                            </tr>
                        </thead>
                        <tbody class="sortable save_positions" data-url='/admin/components/init_window/banners/save_positions'>
                            <?php if(is_true_array($banners)){ foreach ($banners as $b){ ?>
                                <tr>
                                    <td class="t-a_c span1">
                                        <span class="frame_label">
                                            <span class="niceCheck b_n">
                                                <input type="checkbox" name="ids" value="<?php echo $b['id']?>"/>
                                            </span>
                                        </span>
                                    </td>
                                    <td><a class="pjax" href="/admin/components/init_window/banners/edit/<?php echo $b['id']?>/<?php if(isset($locale)){ echo $locale; } ?>" data-rel="tooltip" data-title="<?php echo lang ('Editing', 'banners'); ?>"><?php echo $b['id']?></a></td>
                                    <td>
                                        <a class="pjax" href="/admin/components/init_window/banners/edit/<?php echo $b['id']?>/<?php if(isset($locale)){ echo $locale; } ?>" data-rel="tooltip" data-title="<?php echo lang ('Editing', 'banners'); ?>"><?php echo $b['name']?></a>
                                    </td>

                                    <td><p><?php echo date('Y-m-d',$b['active_to'])?></p></td>
                                    <td>
                                        <div class="frame_prod-on_off" data-rel="tooltip" data-placement="top" data-original-title="<?php if($b['active'] == 1): ?><?php echo lang ('show', 'banners'); ?><?php else:?><?php echo lang ("don't show", 'banners'); ?><?php endif; ?>" >
                                            <span class="prod-on_off <?php if($b['active'] != 1): ?>disable_tovar<?php endif; ?>" style="<?php if($b['active'] != 1): ?>left: -28px;<?php endif; ?>" <?php if($b['active'] == 1): ?>rel="true"<?php else:?>rel="false"<?php endif; ?>
                                                  onclick="ChangeBannerSliderActive(this,<?php echo $b['id']?>);"></span>
                                        </div>
                                    </td>

                                    </div>
                                    </td>
                                </tr>
                                                  <?php }} ?>

                        </tbody>
                    </table>
                                                      <?php else:?>
                    <div class="alert alert-info" style="margin-bottom: 18px; margin-top: 18px;">
                                                          <?php echo lang ('Empty banner list.', 'banners'); ?>
                    </div>
                                                          <?php endif; ?>
            </div>
        </div>
    </section>
</div>
<?php $mabilis_ttl=1411133330; $mabilis_last_modified=1403818055; //application/modules/banners/assets/admin/list.tpl ?>