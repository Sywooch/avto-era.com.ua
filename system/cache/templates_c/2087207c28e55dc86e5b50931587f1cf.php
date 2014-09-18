<div id="popupCart" style="display: none;" class="drop drop-bask drop-style"></div>
<button type="button" data-drop="#popupCart" id="showCart" style="display: none;"></button>

<script type="text/template" id="cartPopupTemplate">
        <% var tempDiscount = Shop.Cart.discount %>
        <% var discTemp = false; if (tempDiscount != null) discTemp = tempDiscount.sum_discount_product !=0 && tempDiscount.sum_discount_product != undefined; %>
        <% if (!discTemp) {tempDiscount = new Object();tempDiscount.sum_discount_product = 0;}%>
        <% var discC = discTemp || Shop.Cart.kitDiscount!=0 %>
        <% var nextCsCond = nextCs == '' ? false : true %>
        <div class="frame-bask">
            <button type="button" class="icon_times_drop" data-closed="closed-js"></button>
            <div class="no-empty">
                <div class="drop-header">
                    <div class="title bask"><span><?php echo lang ('В вашей корзине','newLevel'); ?></span> <span class="add-info"><span class="topCartCount"><%- Shop.Cart.totalCount %></span></span> <span class="plurProd"><%- pluralStr(Shop.Cart.totalCount, plurProd) %></span> <span><?php echo lang ('на сумму','newLevel'); ?></span> <span class="add-info"><span class="topCartTotalPrice"><%- parseFloat(Shop.Cart.totalPrice).toFixed(pricePrecision) %></span></span> <%-curr%></div>
                </div>
            </div>
            <div class="drop-content">
                <div class="no-empty">
                    <div class="frame-bask-main">
                        <div class="inside-padd">
                            <table class="table-order">
                                <tbody>
                                    <% _.each(Shop.Cart.getAllItems(), function(item){ %>

        <!-- for single product -->
                                    <% if (!item.kit) { %>
                                    <tr data-prodid="<%- item.id %>" data-varid="<%- item.vId %>" data-id="popupProduct_<%- item.id+'_'+item.vId %>" class="items items-bask cartProduct">
                                        <td class="frame-remove-bask-btn"><button type="button" class="icon_times_cart" onclick="rmFromPopupCart(this);"></button></td>
                                        <td class="frame-items">
                                            <a href="<%-item.url%>" class="frame-photo-title">
                                                <span class="photo-block">
                                                    <span class="helper"></span>
                                                    <img src="<%- item.img%>" alt="<%- '('+item.vname+')'%>">
                                                </span>
                                                <span class="title title-bask"><%- item.name %>
                                            </a>
                                            <div class="description">
                                                <%if(item.vname){ %><span class="frame-variant-name"><?php echo lang ('Вариант','newLevel'); ?> <span class="code">(<%- item.vname%>)</span></span> <% } %>
                                                <%if (item.number) { %><span class="frame-variant-code"><?php echo lang ('Артикул','newLevel'); ?> <span class="code">(<%-item.number %>)</span></span> <% } %>
                                                <div class="frame-prices f-s_0">
                                                    <%if (item.origprice) { %>
                                                    <span class="price-discount">
                                                        <span>
                                                            <span class="price"><%- parseFloat(item.origprice).toFixed(pricePrecision) %></span>
                                                            <span class="curr"><%-curr%></span>
                                                        </span>
                                                    </span>
                                                    <% } %>
                                                    <span class="current-prices f-s_0">
                                                        <span class="price-new">
                                                            <span>
                                                                <span class="price"><%- parseFloat(item.price).toFixed(pricePrecision) %></span>
                                                                <span class="curr"><%-curr%></span>
                                                            </span>
                                                        </span>
                                                        <%if (nextCsCond){%>
                                                        <span class="price-add">
                                                            <span>
                                                                <span class="price"><%- parseFloat(item.addprice).toFixed(pricePrecision) %></span>
                                                                <span class="curr-add"><%-nextCs%></span>
                                                            </span>
                                                        </span>
                                                        <%}%>
                                                    </span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="frame-count">
                                            <span class="countOrCompl"><%-pcs%></span>
                                            <div class="number" data-title="<?php echo lang ('Количество на складе','newLevel'); ?><%-' '+item.maxcount%>">
                                                <div class="frame-change-count" data-prodid="<%- item.id %>" data-varid="<%- item.vId %>" data-price="<%- item.price %>" data-addprice="<%- item.addprice %>" data-origprice="<%- item.origprice %>">
                                                    <div class="btn-plus">
                                                        <button type="button">
                                                            <span class="icon-plus"></span>
                                                        </button>
                                                    </div>
                                                    <div class="btn-minus">
                                                        <button type="button">
                                                            <span class="icon-minus"></span>
                                                        </button>
                                                    </div>
                                                </div>
                                                <input type="text" value="<%- item.count %>" data-rel="plusminus" data-title="<?php echo lang ('Только цифры','newLevel'); ?>" data-min="1" <% if (item.maxcount) { %> data-max="<%-item.maxcount%>" <% } %> />
                                            </div>
                                        </td>
                                        <td class="frame-cur-sum-price">
                                            <span class="title"><?php echo lang ('Сумма','newLevel'); ?>: </span>
                                            <div class="frame-cur-sum-price">
                                                <div class="frame-prices f-s_0">
                                                    <%if (item.origprice) { %>
                                                    <span class="price-discount">
                                                        <span>
                                                            <span class="price" data-rel="priceOrigOrder"><%- parseFloat(item.count*item.origprice).toFixed(pricePrecision) %></span>
                                                            <span class="curr"><%-curr%></span>
                                                        </span>
                                                    </span>
                                                    <% } %>
                                                    <span class="current-prices f-s_0">
                                                        <span class="price-new">
                                                            <span>
                                                                <span class="price" data-rel="priceOrder"><%- parseFloat(item.count*item.price).toFixed(pricePrecision) %></span>
                                                                <span class="curr"><%-curr%></span>
                                                            </span>
                                                        </span>
                                                        <%if (nextCsCond){%>
                                                        <span class="price-add">
                                                            <span>
                                                                <span class="price" data-rel="priceAddOrder"><%- parseFloat(item.count*item.addprice).toFixed(pricePrecision) %></span>
                                                                <span class="curr-add"><%-nextCs%></span>
                                                            </span>
                                                        </span>
                                                        <%}%>
                                                    </span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <% } else { %>
                                    <!-- for product kit -->
                                    <% var i=0 %>
                                    <% var names = typeof item.name == "string" ? JSON.parse(item.name) : item.name %>
                                    <% var images = typeof item.img == "string" ? JSON.parse(item.img) : item.img %>
                                    <% var urls = typeof item.url == "string" ? JSON.parse(item.url) : item.url %>

                                    <% var prices = typeof item.prices == "string" ? JSON.parse(item.prices) : item.prices %>
                                    <% var addprices = typeof item.addprices == "string" ? JSON.parse(item.addprices) : item.addprices %>
                                    <% var origprices = typeof item.origprices == "string" ? JSON.parse(item.origprices) : item.origprices %>
                                    <% var prodstatus = typeof item.prodstatus == "string" ? JSON.parse(item.prodstatus) : item.prodstatus %>

                                    <tr class="row-kits" data-prodid="<%- item.id %>" data-kitId="<%- item.kitId %>" data-varid="<%- item.vId %>" data-id="popupKit_<%- item.kitId %>">
                                        <td colspan="4">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td class="frame-remove-bask-btn"><button type="button" class="icon_times_cart" onclick="rmFromPopupCart(this, true);"></button></td>
                                                        <td class="frame-items frame-items-kit">
                                                            <ul class="items items-bask">
                                                                <% _.each(prices, function(id){  %>
                                                                <li>
                                                                    <% if (i != 0){ %>
                                                                    <div class="next-kit">+</div>
                                                                    <% } %>
                                                                    <div class="frame-kit <% if (i == 0){%> main-product <% } %>">
                                                                        <% if (0==i) { %>
                                                                        <a class="frame-photo-title" href="<%- urls[i]%>">
                                                                            <span class="photo-block">
                                                                                <span class="helper"></span>
                                                                                <img src="<%- images[i]%>" alt="<%- '('+item.vname+')'%>">
                                                                            </span>
                                                                            <span class="title"><%- names[i] %></span>
                                                                        </a>
                                                                        <div class="description">
                                                                            <%if(item.vname){ %><span class="frame-variant-name"><?php echo lang ('Вариант','newLevel'); ?> <span class="code">(<%- item.vname%>)</span></span> <% } %>
                                                                            <%if (item.number) { %><span class="frame-variant-code"><?php echo lang ('Артикул','newLevel'); ?> <span class="code">(<%-item.number %>)</span></span> <% } %>
                                                                            <div class="frame-prices f-s_0">
                                                                                <span class="current-prices f-s_0">
                                                                                    <span class="price-new">
                                                                                        <span>
                                                                                            <span class="price"><%-parseFloat(prices[i]).toFixed(pricePrecision)%></span>
                                                                                            <span class="curr"><%-curr%></span>
                                                                                        </span>
                                                                                    </span>
                                                                                    <%if (nextCsCond){%>
                                                                                    <span class="price-add">
                                                                                        <span>
                                                                                            <span class="price"><%- parseFloat(addprices[i]).toFixed(pricePrecision) %></span>
                                                                                            <span class="curr-add"><%-nextCs%></span>
                                                                                        </span>
                                                                                    </span>
                                                                                    <%}%>
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                        <% } else { %>

                                                                        <a class="frame-photo-title" href="<%- urls[i]%>">
                                                                            <span class="photo-block">
                                                                                <span class="helper"></span>
                                                                                <img src="<%- images[i]%>" alt="<%- '('+item.vname+')'%>">
                                                                            </span>
                                                                            <span class="title"><%-names[i]%></span>
                                                                        </a>
                                                                        <div class="description">
                                                                            <%if(item.vname){ %><span class="frame-variant-name"><?php echo lang ('Вариант','newLevel'); ?> <span class="code">(<%- item.vname%>)</span></span> <% } %>
                                                                            <%if (item.number) { %><span class="frame-variant-code"><?php echo lang ('Артикул','newLevel'); ?> <span class="code">(<%-item.number %>)</span></span> <% } %>
                                                                            <div class="frame-prices f-s_0">
                                                                                <span class="price-discount">
                                                                                    <span>
                                                                                        <span class="price"><%-parseFloat(origprices[i]).toFixed(pricePrecision)%></span>
                                                                                        <span class="curr"><%-curr%></span>
                                                                                    </span>
                                                                                </span>
                                                                                <span class="current-prices f-s_0">
                                                                                    <span class="price-new">
                                                                                        <span>
                                                                                            <span class="price"><%-parseFloat(prices[i]).toFixed(pricePrecision)%></span>
                                                                                            <span class="curr"><%-curr%></span>
                                                                                        </span>
                                                                                    </span>
                                                                                    <%if (nextCsCond){%>
                                                                                    <span class="price-add">
                                                                                        <span>
                                                                                            <span class="price"><%- parseFloat(addprices[i]).toFixed(pricePrecision) %></span>
                                                                                            <span class="curr-add"><%-nextCs%></span>
                                                                                        </span>
                                                                                    </span>
                                                                                    <%}%>
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                        <% } %>
                                                                    </div>
                                                                </li>
                                                                <% i++;  }); %>
                                                            </ul>
                                                        </td>
                                                        <td class="frame-count">
                                                            <span class="countOrCompl"><%-kits%></span>
                                                            <div class="number" data-title="<?php echo lang ('Количество на складе','newLevel'); ?> <%-' '+item.maxcount%>">
                                                                <div class="frame-change-count" data-prodid="<%- item.id %>" data-varid="<%- item.vId %>" data-price="<%- item.price %>" data-origprice="<%- item.origprice %>" data-addprice="<%- item.addprice %>" data-kit="<%-item.kit %>">
                                                                    <div class="btn-plus">
                                                                        <button type="button">
                                                                            <span class="icon-plus"></span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="btn-minus">
                                                                        <button type="button">
                                                                            <span class="icon-minus"></span>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                <input type="text" value="<%- item.count %>" data-rel="plusminus" data-title="<?php echo lang ('Только цифры','newLevel'); ?>" data-min="1" <% if (item.maxcount) { %> data-max="<%-item.maxcount%>" <% } %> />
                                                            </div>
                                                        </td>
                                                        <td class="frame-cur-sum-price">
                                                            <span class="title"><?php echo lang ('Сумма','newLevel'); ?>: </span>
                                                            <div class="frame-prices f-s_0">
                                                                <span class="price-discount">
                                                                    <span>
                                                                        <span class="price" data-rel="priceOrigOrder"><%- parseFloat(item.count*item.origprice).toFixed(pricePrecision) %></span>
                                                                        <span class="curr"><%-curr%></span>
                                                                    </span>
                                                                </span>
                                                                <span class="current-prices f-s_0">
                                                                    <span class="price-new">
                                                                        <span>
                                                                            <span class="price" data-rel="priceOrder"><%- parseFloat(item.count * item.price).toFixed(pricePrecision) %></span>
                                                                            <span class="curr"><%-curr%></span>
                                                                        </span>
                                                                    </span>
                                                                    <%if (nextCsCond){%>
                                                                    <span class="price-add">
                                                                        <span>
                                                                            <span class="price" data-rel="priceAddOrder"><%- parseFloat(item.count * item.addprice).toFixed(pricePrecision) %></span>
                                                                            <span class="curr"><%-nextCs%></span>
                                                                        </span>
                                                                    </span>
                                                                    <%}%>
                                                                </span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    <% } %>

                                    <% }); %>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="no-empty">
                <div class="frame-foot drop-footer">
                    <div class="header-frame-foot">
                        <div class="inside-padd">
                            <div class="clearfix">
                                <span class="frame-discount">
                                    <span class="c_7"><?php echo lang ('Ваша текущая скидка','newLevel'); ?>:</span>
                                    <span class="text-discount current-discount"><span class="genDiscount"><% if (discC) parseFloat(tempDiscount.sum_discount_product + Shop.Cart.kitDiscount).toFixed(pricePrecision) %></span> <span class="curr"><%-curr%></span></span>
                                </span>
                                <% if (orderDetails) { %>
                                <div class="btn-back-prod f_l">
                                    <button type="button" data-closed="closed-js">
                                        <span class="text-el"><span class="f-s_14"><span class="icon_back_prod"></span></span> <?php echo lang ('Вернуться к оформлению','newLevel'); ?></span>
                                    </button>
                                </div>
                                <% } %>
                                <span class="c_7"><?php echo lang ('Итого к оплате','newLevel'); ?>:</span>
                                <span class="frame-cur-sum-price">
                                    <span class="frame-prices f-s_0">
                                        <span class="price-discount">
                                            <span class="frame-discount">
                                                <span class="price genSumDiscount"><% if (discC) parseFloat(Shop.Cart.totalPriceOrigin).toFixed(pricePrecision)%></span>
                                                <span class="curr"><%-curr%></span>
                                            </span>
                                        </span>
                                        <span class="current-prices f-s_0">
                                            <span class="price-new">
                                                <span>
                                                    <span class="price topCartTotalPrice"><%- parseFloat(Shop.Cart.getTotalPrice()).toFixed(pricePrecision) %></span>
                                                    <span class="curr"><%-curr%></span>
                                                </span>
                                            </span>
                                            <%if (nextCsCond){%>
                                            <span class="price-add">
                                                <span>
                                                    <span class="price topCartTotalAddPrice"><%- parseFloat(Shop.Cart.getTotalAddPrice()).toFixed(pricePrecision) %></span>
                                                    <span class="curr-add"><%-nextCs%></span>
                                                </span>
                                            </span>
                                            <%}%>
                                        </span>
                                    </span>
                                </span>
                            </div>
                        </div>
                        <% if (!orderDetails) { %>
                        <div class="content-frame-foot">
                            <div class="clearfix inside-padd">
                                <div class="btn-back-prod f_l">
                                    <button type="button" data-closed="closed-js">

                                        <span class="text-el"><span class="f-s_14"><span class="icon_back_prod"></span></span> <?php echo lang ('Вернуться к покупкам','newLevel'); ?></span>
                                    </button>
                                </div>
                                <div class="btn-buy-p f_r">
                                    <a href="/shop/cart">
                                        <span class="icon_cart_p"></span>
                                        <span class="text-el"><?php echo lang ('Оформить заказ','newLevel'); ?></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <% } %>
                    </div>
                </div>
            </div>
            <div class="empty">
                <div class="drop-header">
                    <div class="title"><?php echo lang ('Ваша корзина','newLevel'); ?> <span class="add-info"><?php echo lang ('пуста','newLevel'); ?></span></div>
                </div>
                <div class="drop-content">
                    <div class="inside-padd">
                        <div class="msg f-s_0">
                            <div class="success"><span class="icon_info"></span><span class="text-el"><?php echo lang ('Вы удалили все элементы из корзины','newLevel'); ?></span></div>
                        </div>
                        <% if (!orderDetails) { %>
                        <div class="btn-back-prod">
                            <button type="button" data-closed="closed-js">
                                <span class="text-el"><span class="f-s_14"><span class="icon_back_prod"></span></span> <?php echo lang ('Вернуться к покупкам','newLevel'); ?></span>
                            </button>
                        </div>
                        <% } %>
                    </div>
                </div>
            </div>
        </div>
      
</script>

<script type="text/template" id="orderDetailsTemplate">   
        <% var tempDiscount = Shop.Cart.discount %>
        <% var discTemp = false; if (tempDiscount != null) discTemp = tempDiscount.sum_discount_product !=0 && tempDiscount.sum_discount_product != undefined; %>
        <% if (!discTemp) {tempDiscount = new Object();tempDiscount.sum_discount_product = 0;}%>
        <% var discC = discTemp || Shop.Cart.kitDiscount!=0 %>
        <% var nextCsCond = nextCs == '' ? false : true %>
        <div class="frame-bask frame-bask-order">
        <div class="drop-header t-a_l"><div class="title bask">Ваш заказ</div></div>
            <div class="no-empty">
                <div class="frame-bask-main">
                    <div class="inside-padd">
                        <table class="table-order">
                            <tbody>
                                <% _.each(Shop.Cart.getAllItems(), function(item){ %>

        <!-- for single product -->
                                <% if (!item.kit) { %>
                                <tr data-prodid="<%- item.id %>" data-varid="<%- item.vId %>" data-id="popupProduct_<%- item.id+'_'+item.vId %>" class="items items-bask cartProduct">
                                    <td class="frame-remove-bask-btn"><button type="button" class="icon_times_cart" onclick="rmFromPopupCart(this);"></button></td>
                                    <td class="frame-items">
                                        <a href="<%-item.url%>" class="frame-photo-title">
                                            <span class="photo-block">
                                                <span class="helper"></span>
                                                <img src="<%- item.img%>" alt="<%- '('+item.vname+')'%>">
                                            </span>
                                            <span class="title title-bask"><%- item.name %>
                                        </a>
                                        <div class="description">
                                             <div class="frame-prices f-s_0">
                                                <%if (item.origprice) { %>
                                                <span class="price-discount">
                                                    <span>
                                                        <span class="price"><%- parseFloat(item.origprice).toFixed(pricePrecision) %></span>
                                                        <span class="curr"><%-curr%></span>
                                                    </span>
                                                </span>
                                                <% } %>
                                                <span class="current-prices f-s_0">
                                                    <span class="price-new">
                                                        <span>
                                                            <span class="price"><%- parseFloat(item.price).toFixed(pricePrecision) %></span>
                                                            <span class="curr"><%-curr%></span>
                                                        </span>
                                                    </span>
                                                    <%if (nextCsCond){%>
                                                    <span class="price-add">
                                                        <span>
                                                            <span class="price"><%- parseFloat(item.addprice).toFixed(pricePrecision) %></span>
                                                            <span class="curr-add"><%-nextCs%></span>
                                                        </span>
                                                    </span>
                                                    <%}%>
                                                </span>
                                                <%if(item.vname){ %><span class="frame-variant-name"><?php echo lang ('Вариант','newLevel'); ?> <span class="code">(<%- item.vname%>)</span></span> <% } %>
                                                <%if (item.number) { %><span class="frame-variant-code"><?php echo lang ('Артикул','newLevel'); ?> <span class="code">(<%-item.number %>)</span></span> <% } %>
                                            </div>
                                        </div>
                                        </td>
                                        <td class="frame-count">              
                                            <div class="frame-frame-count">
                                                <div class="frame-count">
                                                    <span class="c_9 f-s_12"><span class="text-el m-b_3 d_i-b">Количество</span></span>
                                                    <div class="number d_i-b" data-title="<?php echo lang ('Количество на складе','newLevel'); ?> <%-' '+item.maxcount%>">
                                                        <div class="frame-change-count" data-prodid="<%- item.id %>" data-varid="<%- item.vId %>" data-price="<%- item.price %>" data-addprice="<%- item.addprice %>" data-origprice="<%- item.origprice %>">
                                                            <div class="btn-plus">
                                                                <button type="button">
                                                                    <span class="icon-plus"></span>
                                                                </button>
                                                            </div>
                                                            <div class="btn-minus">
                                                                <button type="button">
                                                                    <span class="icon-minus"></span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <input type="text" value="<%- item.count %>" data-rel="plusminus" data-title="<?php echo lang ('Только цифры','newLevel'); ?>" data-min="1" <% if (item.maxcount) { %> data-max="<%-item.maxcount%>" <% } %> />
                                                    </div>
                                                </div>
                                            </div>
                                            </td>
                                            <td>
                                             <span class="text-el c_9 f-s_12 m-b_3 d_i-b">Сумма</span>
                                            <div class="frame-cur-sum-price">
                                                <div class="frame-prices f-s_0">
                                                    <%if (item.origprice) { %>
                                                    <span class="price-discount">
                                                        <span>
                                                            <span class="price" data-rel="priceOrigOrder"><%- parseFloat(item.count*item.origprice).toFixed(pricePrecision) %></span>
                                                            <span class="curr"><%-curr%></span>
                                                        </span>
                                                    </span>
                                                    <% } %>
                                                    <span class="current-prices f-s_0">
                                                        <span class="price-new">
                                                            <span>
                                                                <span class="price" data-rel="priceOrder"><%- parseFloat(item.count*item.price).toFixed(pricePrecision) %></span>
                                                                <span class="curr"><%-curr%></span>
                                                            </span>
                                                        </span>
                                                        <%if (nextCsCond){%>
                                                        <span class="price-add">
                                                            <span>
                                                                <span class="price" data-rel="priceAddOrder"><%- parseFloat(item.count*item.addprice).toFixed(pricePrecision) %></span>
                                                                <span class="curr-add"><%-nextCs%></span>
                                                            </span>
                                                        </span>
                                                        <%}%>
                                                    </span>
                                                </div>
                                            </div>
                                    </td>

                                </tr>
                                <% } else { %>
                                <!-- for product kit -->
                                <% var i=0 %>
                                <% var names = typeof item.name == "string" ? JSON.parse(item.name) : item.name %>
                                <% var images = typeof item.img == "string" ? JSON.parse(item.img) : item.img %>
                                <% var urls = typeof item.url == "string" ? JSON.parse(item.url) : item.url %>

                                <% var prices = typeof item.prices == "string" ? JSON.parse(item.prices) : item.prices %>
                                <% var addprices = typeof item.addprices == "string" ? JSON.parse(item.addprices) : item.addprices %>
                                <% var origprices = typeof item.origprices == "string" ? JSON.parse(item.origprices) : item.origprices %>
                                <% var prodstatus = typeof item.prodstatus == "string" ? JSON.parse(item.prodstatus) : item.prodstatus %>

                                <tr class="row-kits" data-prodid="<%- item.id %>" data-varid="<%- item.vId %>" data-kitId="<%- item.kitId %>" data-id="popupKit_<%- item.kitId %>">
                                    <td class="frame-remove-bask-btn"><button type="button" class="icon_times_cart" onclick="rmFromPopupCart(this, true);"></button></td>
                                    <td class="frame-items frame-items-kit">
                                        <ul class="items items-bask">
                                            <% _.each(prices, function(id){  %>
                                            <li>
                                                <% if (i != 0){ %>
                                                <div class="next-kit">+</div>
                                                <% } %>
                                                <div class="frame-kit <% if (i == 0){%> main-product <% } %>">
                                                    <% if (0==i) { %>
                                                    <a class="frame-photo-title" href="<%- urls[i]%>">
                                                        <span class="photo-block">
                                                            <span class="helper"></span>
                                                            <img src="<%- images[i]%>" alt="<%- '('+item.vname+')'%>">
                                                        </span>
                                                        <span class="title"><%- names[i] %></span>
                                                    </a>
                                                    <div class="description">
                                                        <%if(item.vname){ %><span class="frame-variant-name"><?php echo lang ('Вариант','newLevel'); ?> <span class="code">(<%- item.vname%>)</span></span> <% } %>
                                                        <%if (item.number) { %><span class="frame-variant-code"><?php echo lang ('Артикул','newLevel'); ?> <span class="code">(<%-item.number %>)</span></span> <% } %>
                                                        <div class="frame-prices f-s_0">
                                                            <span class="current-prices f-s_0">
                                                                <span class="price-new">
                                                                    <span>
                                                                        <span class="price"><%-parseFloat(prices[i]).toFixed(pricePrecision)%></span>
                                                                        <span class="curr"><%-curr%></span>
                                                                    </span>
                                                                </span>
                                                                <%if (nextCsCond){%>
                                                                <span class="price-add">
                                                                    <span>
                                                                        <span class="price"><%- parseFloat(addprices[i]).toFixed(pricePrecision) %></span>
                                                                        <span class="curr-add"><%-nextCs%></span>
                                                                    </span>
                                                                </span>
                                                                <%}%>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <% } else { %>

                                                    <a class="frame-photo-title" href="<%- urls[i]%>">
                                                        <span class="photo-block">
                                                            <span class="helper"></span>
                                                            <img src="<%- images[i]%>" alt="<%- '('+item.vname+')'%>">
                                                        </span>
                                                        <span class="title title-bask"><%-names[i]%></span>
                                                    </a>
                                                    <div class="description">
                                                        <%if(item.vname){ %><span class="frame-variant-name"><?php echo lang ('Вариант','newLevel'); ?> <span class="code">(<%- item.vname%>)</span></span> <% } %>
                                                        <%if (item.number) { %><span class="frame-variant-code"><?php echo lang ('Артикул','newLevel'); ?> <span class="code">(<%-item.number %>)</span></span> <% } %>
                                                        <div class="frame-prices f-s_0">
                                                            <span class="price-discount">
                                                                <span>
                                                                    <span class="price"><%-parseFloat(origprices[i]).toFixed(pricePrecision)%></span>
                                                                    <span class="curr"><%-curr%></span>
                                                                </span>
                                                            </span>
                                                            <span class="current-prices f-s_0">
                                                                <span class="price-new">
                                                                    <span>
                                                                        <span class="price"><%-parseFloat(prices[i]).toFixed(pricePrecision)%></span>
                                                                        <span class="curr"><%-curr%></span>
                                                                    </span>
                                                                </span>
                                                                <%if (nextCsCond){%>
                                                                <span class="price-add">
                                                                    <span>
                                                                        <span class="price"><%- parseFloat(addprices[i]).toFixed(pricePrecision) %></span>
                                                                        <span class="curr-add"><%-nextCs%></span>
                                                                    </span>
                                                                </span>
                                                                <%}%>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <% } %>
                                                </div>
                                            </li>
                                            <% i++;  }); %>
                                        </ul>
                                    </td>
                                </tr>
                                <tr data-prodid="<%- item.id %>" data-varid="<%- item.vId %>" data-id="popupKit_<%- item.kitId %>">
                                    <td class="frame-kits-gen-sum" colspan="2">
                                        <div class="kits-gen-sum">
                                            <img src="<%-theme%><%-colorScheme%>/images/kits_sum.png" />
                                        </div>
                                        <div class="frame-frame-count">
                                            <div class="frame-count">
                                                <div class="number" data-title="<?php echo lang ('Количество на складе','newLevel'); ?> <%-item.maxcount%>">
                                                    <div class="frame-change-count" data-prodid="<%- item.id %>" data-varid="<%- item.vId %>" data-price="<%- item.price %>" data-origprice="<%- item.origprice %>" data-addprice="<%- item.addprice %>" data-kit="<%-item.kit %>">
                                                        <div class="btn-plus">
                                                            <button type="button">
                                                                <span class="icon-plus"></span>
                                                            </button>
                                                        </div>
                                                        <div class="btn-minus">
                                                            <button type="button">
                                                                <span class="icon-minus"></span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <input type="text" value="<%- item.count %>" data-rel="plusminus" data-title="<?php echo lang ('Только цифры','newLevel'); ?>" data-min="1" <% if (item.maxcount) { %> data-max="<%-item.maxcount%>" <% } %> />
                                                </div>
                                                <span class="countOrCompl"><%-pluralStr(item.count, plurKits)%></span>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="frame-cur-sum-price">
                                            <div class="frame-prices f-s_0">
                                                <%if (item.origprice) { %>
                                                <span class="price-discount">
                                                    <span>
                                                        <span class="price" data-rel="priceOrigOrder"><%- parseFloat(item.count*item.origprice).toFixed(pricePrecision) %></span>
                                                        <span class="curr"><%-curr%></span>
                                                    </span>
                                                </span>
                                                <% } %>
                                                <span class="current-prices f-s_0">
                                                    <span class="price-new">
                                                        <span>
                                                            <span class="price" data-rel="priceOrder"><%- parseFloat(item.count * item.price).toFixed(pricePrecision) %></span>
                                                            <span class="curr"><%-curr%></span>
                                                        </span>
                                                    </span>
                                                    <%if (nextCsCond){%>
                                                    <span class="price-add">
                                                        <span>
                                                            <span class="price" data-rel="priceAddOrder"><%- parseFloat(item.count * item.addprice).toFixed(pricePrecision) %></span>
                                                            <span class="curr-add"><%-nextCs%></span>
                                                        </span>
                                                    </span>
                                                    <%}%>
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <% } %>

                                <% }); %>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="frame-foot drop-footer">
                    <div class="header-frame-foot">
                        <div class="inside-padd">

                            <span class="frame-discount">

                                <span class="c_7 f-s_13"><?php echo lang ('Ваша текущая скидка','newLevel'); ?>:</span>
                                <span class="text-discount current-discount"><span class="genDiscount"><%if(discC) parseFloat(tempDiscount.sum_discount_product).toFixed(pricePrecision) %></span> <span class="curr"><%-curr%></span></span>

                            </span>

                            <span class="c_7 f-s_13"><?php echo lang ('И того к оплате','newLevel'); ?>:</span>
                            <span class="frame-cur-sum-price">
                                <span class="frame-prices f-s_0">
                                    <span class="price-discount">
                                        <span class="frame-discount">
                                            <span class="price genSumDiscount"><%if(discC) parseFloat(Shop.Cart.totalPriceOrigin + Shop.Cart.kitDiscount).toFixed(pricePrecision) %></span>
                                            <span class="curr"><%-curr%></span>
                                        </span>
                                    </span>
                                    <span class="current-prices f-s_0">
                                        <span class="price-new">
                                            <span>
                                                <span class="price topCartTotalPrice"><%- parseFloat(Shop.Cart.getTotalPrice()).toFixed(pricePrecision) %></span>
                                                <span class="curr"><%-curr%></span>
                                            </span>
                                        </span>
                                        <%if (nextCsCond){%>
                                        <span class="price-add">
                                            <span>
                                                <span class="price topCartTotalAddPrice"><%- parseFloat(Shop.Cart.getTotalAddPrice()).toFixed(pricePrecision) %></span>
                                                <span class="curr-add"><%-nextCs%></span>
                                            </span>
                                        </span>
                                        <%}%>
                                    </span>
                                </span>
                            </span>
                        </div>
                        <% if (!orderDetails) { %>
                        <div class="content-frame-foot">
                            <div class="clearfix inside-padd">
                                <div class="btn-form f_l">
                                    <button type="button" data-closed="closed-js">
                                        <span class="text-el"><span class="f-s_14">←</span> <?php echo lang ('Вернуться к покупкам','newLevel'); ?></span>
                                    </button>
                                </div>
                                <div class="btn-cart btn-cart-p f_r">
                                    <a href="/shop/cart">
                                        <span class="icon_cart_p"></span>
                                        <span class="text-el"><?php echo lang ('Оформить заказ','newLevel'); ?></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <% } %>
                    </div>
                </div>
            </div>
            <div class="empty">
                <div class="drop-header">
                    <div class="title"><?php echo lang ('В вашей корзине','newLevel'); ?> <span class="add-info"><?php echo lang ('пусто','newLevel'); ?></span></div>
                </div>
                <div class="drop-content">
                    <div class="inside-padd">
                        <div class="msg f-s_0">
                            <div class="success"><span class="icon_info"></span><span class="text-el"><?php echo lang ('Вы удалили все товары из корзины','newLevel'); ?></span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
</script>

<?php #
/**
* @file Render autocomplete results
* @partof main.tpl
* @updated 25 February 2013;
* Variables
*   items : (object javascript) Contain found products
*/
#?>
    <script type="text/template" id="searchResultsTemplate">
        <div class="inside-padd">
            <% var ids=[] %>
            <% if (_.keys(items).length > 1) { %>
            <ul class="items items-search-autocomplete">
                <% _.each(items, function(item){

                if (item.name != null && ids.indexOf(item.product_id)){%>
                <% ids.push(item.product_id) %>
                <li>
                    <!-- Start. Photo Block and name  -->
                    <a href="<?php echo shop_url ('product'); ?>/<%- item.url %>" class="frame-photo-title">
                        <span class="photo-block">
                            <span class="helper"></span>
                            <img src="<%- item.smallImage %>">
                        </span>
                        <span class="title"><% print( item.name)  %></span>
                        <!-- End. Photo Block and name -->

                        <span class="description">
                        <!-- Start. Product price  -->
                            <span class="frame-prices f-s_0">
                                <span class="current-prices var_price_{echo $p->firstVariant->getId()} prod_price_{echo $p->getId()}">
                                    <span class="price-new">
                                        <span>
                                            <span class="price"><%- item.price %></span>
                                            <span class="curr"><?php if(isset($CS)){ echo $CS; } ?></span>
                                        </span>
                                    </span>
                                    <% if (item.nextCurrency != null) { %>
                                    <span class="price-add">
                                        <span>
                                            (<span class="price addCurrPrice"><%- item.nextCurrency %></span>
                                        <span class="curr-add"><?php if(isset($NextCS)){ echo $NextCS; } ?></span>)                                            
                                        </span>
                                    </span>
                                    <% } %>
                                </span>
                            </span>
                        </span>
                        <!-- End. Product price  -->
                    </a>
                </li>
                <% }
                }) %>
            </ul>
            <!-- Start. Show link see all results if amount products >0  -->
            <div>
                <div class="btn-autocomplete">
                    <a href="<?php echo shop_url ('search'); ?>?text=<%- items.queryString %>"  class="f-s_0 c_6">
                        <span class="text-el"><?php echo lang ('Смотреть все товары','newLevel'); ?><span class="icon_show_all"></span></span>
                    </a>
                </div>
                <!-- End. Show link  -->
                <% } else {%>    
            <div class="msg f-s_0">
                <div class="info"><span class="icon_info"></span><span class="text-el"><?php echo ShopCore::t(lang('По Вашему запросу ничего не найдено','newLevel'))?></span></div>
            </div>
            <% }%>
        </div>
    </div>
</script>

        <script type="text/template" id="reportappearance">
            <% var nextCsCond = nextCs == '' ? false : true %>
            <ul class="items items-bask item-report">
                <li>
                    <a href="<%-item.url%>" class="frame-photo-title" title="<%-item.name%>">
                        <span class="photo-block">
                            <span class="helper"></span>
                            <img src="<%-item.img%>" alt="<%-item.name%>">
                        </span>
                        <span class="title"><%-item.name%></span>
                    </a>
                    <div class="description">
                        <div class="frame-prices f-s_0">
                            <%if (item.origprice) { %>
                            <span class="price-discount">
                                <span>
                                    <span class="price"><%- parseFloat(item.origprice).toFixed(pricePrecision) %></span>
                                    <span class="curr"><%-curr%></span>
                                </span>
                            </span>
                            <% } %>
                            <span class="current-prices f-s_0">
                                <span class="price-new">
                                    <span>
                                        <span class="price priceVariant"><%-parseFloat(item.price).toFixed(pricePrecision)%></span>
                                        <span class="curr"><%-curr%></span>
                                    </span>
                                </span>
                                <%if (nextCsCond){%>
                                <span class="price-add">
                                    <span>
                                        (<span class="price addCurrPrice"><%-parseFloat(item.addprice).toFixed(pricePrecision)%></span>
                                        <span class="curr-add"><%-nextCs%></span>)
                                    </span>
                                </span>
                                <%}%>
                            </span>
                        </div>
                    </div>
                </li>
            </ul>
        </script>
    
    <span class="tooltip"></span>
    <div class="apply">
        <div class="content-apply">
            <a href="#"><?php echo lang ('Фильтр','newLevel'); ?></a>
            <div class="description"><?php echo lang ('Найдено','newLevel'); ?> <span class="f-s_0"><span id="apply-count">5</span><span class="text-el">&nbsp;</span><span class="plurProd"></span></span></div>
        </div>
        <button type="button" class="icon_times_drop icon_times_apply"></button>
    </div>
    <div class="drop drop-style" id="notification">
        <div class="drop-content-notification">
            <div class="inside-padd notification">

            </div>
        </div>
    </div>
    <button style="display: none;" type="button" data-drop="#notification"  data-modal="true" data-effect-on="fadeIn" data-effect-off="fadeOut" class="trigger"></button>

    <div class="drop drop-style" id="confirm">
        <div class="drop-header">
            <div class="title"><?php echo lang ('Подтвердите' , 'newLevel'); ?></div>
        </div>
        <div class="drop-content-confirm">
            <div class="inside-padd cofirm w-s_n-w">
                <div class="btn-not-avail">
                    <button type="button" data-button-confirm data-modal="true">
                        <span class="text-el"><?php echo lang ('Подтвердить' , 'newLevel'); ?></span>
                    </button>
                </div>
                <div class="btn-cancel">
                    <button type="button" data-closed="closed-js" class="pointer">
                        <span class="text-el d_l_bl"><?php echo lang ('Отменить' , 'newLevel'); ?></span>
                    </button>
                </div>
            </div>
        </div>
        <div class="drop-footer"></div>
    </div>
    <button style="display: none;" type="button" data-drop="#confirm"  data-modal="true" data-confirm="true" data-effect-on="fadeIn" data-effect-off="fadeOut"></button><?php $mabilis_ttl=1411133401; $mabilis_last_modified=1403818558; ///var/www/avto-era.com.ua/templates/newLevel/shop/js_templates.tpl ?>