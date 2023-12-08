
<section id="shopping-cart">
    <div class="container">
        <form id="checkoutForm">
            <h1 class="text-center my-5">Shopping cart</h1>

            <div class="row my-3">
                <button class="btn-options option1 col-6 text-center fs-4 active">1. Your order</button>
                <button class="btn-options option2 col-6 text-center fs-4  ">2. Check out</button>
            </div>

            <div class="order">
                <table class="table table-hover">
                    <thead>
                        <tr class="fix-row">
                            <th></th>
                            <th scope="col">PRODUCT</th>
                            <th scope="col"></th>
                            <th scope="col">PRICE</th>
                            <th scope="col">QUANTITY</th>
                            <th scope="col">TOTAL</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>



                            <?php
                                foreach ($products as $key=>$product) {

                                    if(is_numeric($key)) {
                                    ?>
                                    <tr class="fix-row" data-product-id ="<?php echo $product["id"]; ?>">
                                        <td>
                                            <input type="checkbox" class="custom-checkbox">
                                        </td>
                                        <td class="d-flex justify-content-center">
                                            <div class="image">
                                                <img src="<?php echo _WEB_ROOT; ?>/public/assets/admin/images/<?php echo $product['image_name']; ?>" alt="">
                                            </div>
                                        </td>
                                        <td>
                                            <p><?php echo $product["title"]; ?></p>
                                        </td>
                                        <td id="price"><?php echo $product["price"]; ?> $</td>
                                        <td>
                                            <input type="number" class="text-center js-quantity" id="item<?php echo $product["id"];?>_quantity" value="<?php echo $product["quantity"]; ?>" min="1"  onwheel="event.preventDefault()">

                                        </td>
                                        <td id="total"><?php echo $product["quantity"]*$product["price"];?> $</td>
                                        <td class="delete">X</td>
                                    </tr>

                                    <tr class="fix-row2" data-product-id ="<?php echo $product["id"]; ?>">
                                        <td>
                                            <input type="checkbox" class="custom-checkbox">
                                        </td>
                                        <td class="d-flex justify-content-center">
                                            <div class="image">
                                                <img src="" alt="">
                                            </div>
                                        </td>
                                        <td>
                                            <p><?php echo $product["title"]; ?></p>
                                            <div class="d-flex justify-content-around mt-3">
                                                <input type="number" class="text-center js-quantity" id="item<?php echo $product["id"];?>_quantity" value="<?php echo $product["quantity"]; ?>" min="1"  onwheel="event.preventDefault()">
    <!--                                            <p id="price">--><?php //echo $product["price"]; ?><!-- $</p>-->
                                                <p id="total"><?php echo $product["quantity"]*$product["price"];?> $</p>
                                                <p>X</p>
                                            </div>
                                        </td>
                                    </tr>


                                    <?php
                                    }
                                }
                            ?>
                    </tbody>
                </table>

                <div class="row">
                    <div class="col-9 text-end ">Total: </div>
                    <div class="col-3 text-center fs-5 fw-bold js-total"><?php  echo (isset($products["sum"]))?$products["sum"]:0; ?> $</div>
                </div>
                <div class="row my-5">
                    <div class="col-12 text-center text-md-end ">
                        <button class="order-cart">Procced To Checkout</button>
                    </div>
                </div>
            </div>

            <div class="checkout">
                <div class="row mt-3">
    <!--                 col left of checkout -->
                    <div class="col-12 col-md-6">
                        <div class="row">
                            <div class="col-12 col-md-6  mb-4">
                                Your name*
                                <input type="text" id="name" placeholder="Your name" >

                            </div>
                            <div class="col-12 col-md-6  mb-4">
                                Phone number*
                                <input type="phone" id="phone" placeholder="0558956815" >
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-6  mb-4">
                                Delivery time
                                <select id="dropdown">
                                    <option value="19:00">As soon as possible</option>
                                    <option value="10:00">By 10:00 AM</option>
                                    <option value="10:30">By 10:30 AM</option>
                                    <option value="12:00">By 12:00 PM</option>
                                    <option value="12:30">By 12:30 PM</option>
                                </select>
                            </div>
                        </div>

                        <div class="row ">
                            <div class="col-12 mb-4">
                                Delivery address*
                                <input type="text" id="address" placeholder="Street, Apartment, number or etc" >
                            </div>
                        </div>

                        <div class="row ">
                            <div class="col-12 mb-4">
                                CREDIT CARD
                                <input type="number" id="cardNumber" placeholder="Card Number">
                                <div class="row mt-2">
                                    <div class="col-8">
                                        <input type="text" id="cardName" placeholder="Full Name">
                                    </div>
                                    <div class="col-4">
                                        <input type="date" id="cardDate">
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="row ">
                            <div class="col-12 mb-4">
                                Additional comments
                            </div>
                            <div class="col-12">
                                <textarea id="comment" cols="75" rows="3" ></textarea>
                            </div>
                        </div>


                    </div>

                    <!-- col right of check out -->
                    <div class="col-12 col-md-6 position-relative">
                        <div class="bill mt-4 mt-md-5 end-0 p-4">
                            <div class="row">
                                <h4 class="col-12">
                                    Your Total
                                </h4>
                            </div>
                            <div class="row py-3">
                                <div class="col-6">Subtotal: </div>
                                <div class="col-6 text-end subTotal">0 $</div>
                            </div>
                            <div class="row py-3">
                                <div class="col-6">Delivery</div>
                                <div class="col-6 text-end delivery">0 $</div>
                            </div>
                            <div class="row py-3">
                                <div class="col-6">Total: </div>
                                <div class="col-6 text-end total">0 $</div>
                            </div>
                            <div class="row py-3">
                                <div class="col-12 d-flex justify-content-center">
                                    <button type="submit" class="order submitOrder">Complete Order</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="py-4">Delivery is available from 8am-5:30pm every day.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

</section>


