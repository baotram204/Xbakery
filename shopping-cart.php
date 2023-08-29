<?php
    require 'layouts/header.php'
?>

<header>
    <link rel="stylesheet" href="shopping-cart.css">
</header>

<section id="shopping-cart">
    <div class="container">
        <h1 class="text-center my-5">Shopping cart</h1>

        <div class="row my-3">
            <button class="btn-options option1 col-6 text-center fs-4 active">1. Your order</button>
            <button class="btn-options option2 col-6 text-center fs-4  ">2. Check out</button>
        </div>

        <div class="order">
            <table class="table table-hover">
                <thead>
                    <tr class="fix-row">
                        <th scope="col">PRODUCT</th>
                        <th scope="col"></th>
                        <th scope="col">PRICE</th>
                        <th scope="col">QUANTITY</th>
                        <th scope="col">TOTAL</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    
                    <tr class="fix-row">
                        <td class="d-flex justify-content-center">
                            <div class="image">
                                <img src="" alt="">
                            </div>
                        </td>
                        <td>
                            <p>Pain Au Chocolat</p>
                        </td>
                        <td>3.45 $</td>
                        <td>
                            <input type="number" class="text-center " id="item1_quantity" value="1" min="1"  onwheel="event.preventDefault()">
                        </td>
                        <td>3.45 $</td>
                        <td>X</td>
                    </tr>
    
                    <tr class="fix-row2">
                        <td class="d-flex justify-content-center">
                            <div class="image">
                                <img src="" alt="">
                            </div>
                        </td>
                        <td>
                            <p>Pain Au Chocolat</p>
                            <div class="d-flex justify-content-around mt-3">
                                <input type="number" class="text-center " id="item1_quantity" value="1" min="1"  onwheel="event.preventDefault()">
                                <p>3.45 $</p>
                                <p>X</p>
                            </div>
    
                        </td>
                    </tr>
                    
                </tbody>
            </table>
        
            <div class="row">
                <div class="col-9 text-end ">Total: </div>
                <div class="col-3 text-center fs-5 fw-bold">144.9 $</div>
            </div>
            <div class="row my-5">
                <div class="col-12 text-center text-md-end ">
                    <button class="order-cart" data-item-id="item1">Procced To Checkout</button>
                </div>
            </div>
        </div>

        <div class="checkout">
            <div class="row mt-3">
                <!-- col left of checkout -->
                <div class="col-12 col-md-6">
                    <div class="row">
                        <div class="col-12 col-md-6  mb-4">
                            Your name
                            <input type="text" id="name" placeholder="Your name">

                        </div>
                        <div class="col-12 col-md-6  mb-4">
                            Phone number*
                            <input type="phone" id="phone" placeholder="0558956815">
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-12 col-md-6  mb-4">
                            Delivery time*
                            <select id="dropdown">
                                <option value="option1">As soon as possible</option>
                                <option value="option2">By 10:00 AM</option>
                                <option value="option3">By 10:30 AM</option>
                                <option value="option4">By 12:00 PM</option>
                                <option value="option5">By 12:30 PM</option>
                            </select>
                        </div>
                        <div class="col-12 col-md-6  mb-4">
                            Drop-off options
                            <div class="my-2">
                                <div class="row">
                                    <div class="col-5 d-flex ">
                                        <div class="custom-toggle">
                                            <div class="small-checked" onclick="toggleChecked(this)"></div>
                                        </div>
                                        <div class="fz ms-2">Hand it to me</div>
    
                                    </div>
                                    
                                    <div class="col-7 d-flex">
                                        <div class="custom-toggle">
                                            <div class="small-checked" onclick="toggleChecked(this)"></div>
                                        </div>
                                        <div class="fz ms-2">Leave it at my door</div>
    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row ">
                        <div class="col-12 mb-4">
                            Delivery address*
                            <input type="text" id="address" placeholder="Street, Apartment, number or etc">
                        </div>
                    </div>

                    <div class="row ">
                        <div class="col-12 mb-4">
                            CREDIT CARD
                            <input type="number" placeholder="Card Number">
                            <div class="row mt-2">
                                <div class="col-8">
                                    <input type="text" placeholder="Full Name">
                                </div>
                                <div class="col-2">
                                    <input type="date">
                                </div>
                                <div class="col-2">
                                    <input type="text" placeholder="CVC">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row ">
                        <div class="col-12 mb-4">
                            Additional comments
                        </div>
                        <div class="col-12">
                            <textarea name="" id="" cols="75" rows="3" ></textarea>
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
                            <div class="col-6 text-end">14.25 $</div>
                        </div>
                        <div class="row py-3">
                            <div class="col-6">Delivery</div>
                            <div class="col-6 text-end">2.15 $</div>
                        </div>
                        <div class="row py-3">
                            <div class="col-6">Total: </div>
                            <div class="col-6 text-end">16.40 $</div>
                        </div>
                        <div class="row py-3">
                            <div class="col-12 d-flex justify-content-center">
                                <button type="submit" class="order">Complete Order</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="py-4">Delivery is available from 8am-5:30pm every day.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<script src="shopping-cart.js"></script>

<?php
    require 'layouts/footer.php'
?>