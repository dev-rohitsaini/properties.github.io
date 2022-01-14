<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Property $property
 */

use Cake\Routing\Router;

//  error_reporting(0);
?>



<!DOCTYPE html>
<html lang="en">

<body>
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2><?= h($property->property_title) ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product-big-title-area-w">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">

                        <?= $this->html->image($property->property_image, array('class' => 'float-center', 'height' => '500', 'width' => '750'))  ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <div class="column-responsive column-80">
                        <div class="properties view content">
                            <div class="col-md-12">
                                <div class="col-md-6">

                                    <h2><?= __('Details') ?></h2>
                                    <table>
                                        <tr>
                                        </tr>
                                        <tr>
                                            <th><?= __('Property Category') ?></th>
                                            <td><?= h($property->property_category->category_name) ?></td>
                                        </tr>
                                        <tr>
                                            <th><?= __('Property Tags') ?></th>
                                            <td><?= h($property->property_tags) ?></td>
                                        </tr>
                                    </table>
                                    <h2><?= __('Reviews') ?></h2>
                                    <?php if (!empty($property->property_comments)) : ?>
                                        <div class="table-responsive">
                                            <table>
                                                <?php foreach ($property->property_comments as $propertyComments) : ?>
                                                    <tr>
                                                        <td style="font-size: 22px; font:bolder"><?= h($comm[$propertyComments->user_id]) ?></td>
                                                        <!-- <td width="20px"> :</td> -->
                                                        <td style="font-size: 18px;"><?= h($propertyComments->comments) ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </table>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-6">
                                    <div class="related">
                                    </div>
                                    <div role="tabpanel">
                                        <ul class="product-tab" role="tablist">
                                            <tr>
                                                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">
                                                        <th><?= __('Property Description') ?></th>
                                                    </a></li>
                                                <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Express your thoughts</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="home">
                                                <td><?= h($property->property_description) ?></td>
                                                </tr>
                                                <p></p>
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="profile">
                                                <div class="submit-review">
                                                    <?= $this->Form->create(null, ['id' => 'form']) ?>
                                                    <?= $this->Form->textarea('comments', ['id' => 'add_comment', 'class' => 'form-control']); ?>
                                                    <?= $this->Form->button('submit', ['id' => 'sub_comment']); ?>
                                                    <?= $this->Form->end(); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div classs="row" style="margin:50px;">
                                        <style>
                                            #hiddenform {
                                                display: none;
                                            }
                                        </style>
                                        <?= $this->Form->button(
                                            'Want to see?',
                                            array(
                                                'onclick' => 'myFunction()', 'class' => 'button  float-right'
                                            )
                                        ); ?>
                                        <div padding-top="100px" id="hiddenform" , class="hiddenform">

                                            <?= $this->Form->create(null, ['url' => ['controller' => 'Appointments', 'action' => 'add', $property->id]]); ?>
                                            <fieldset>
                                                <legend><?= __('Please Select Date And Time') ?></legend>
                                                <?= $this->Form->control('date', ['type' => 'date', 'id' => 'currentDate', 'class' => 'form-control', 'width' => '100px']); ?>
                                                <?= $this->Form->control('slot', ['type' => 'time', 'id' => 'currentTime', 'class' => 'form-control', 'margin' => '10px']);
                                                ?>
                                                <?= $this->Form->button(__('Submit')) ?>
                                                <?= $this->Form->end() ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <form action="" class="cart">
                                        <div class="quantity">
                                            <input type="number" size="4" class="input-text qty text" title="Qty" value="1" name="quantity" min="1" step="1">
                                        </div>
                                        <button class="add_to_cart_button" type="submit">Add to cart</button>
                                    </form>    -->
                </div>
            </div>
        </div>
    </div>

</body>

</html>
<?php $pid = $property->id;
?>
<?php echo $this->Html->meta('csrfToken', $this->request->getAttribute('csrfToken')); ?>
<script>
    var csrfToken = $('meta[name="csrfToken"]').attr('content');
</script>
<script>
    $('#form').submit(function(e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': csrfToken // this is defined in app.php as a js variable
            },
        });
        event.preventDefault();
        var targeturl = "/users/PropertyComments/addcomment";
        // var data = $('#add_comment~').val();
       
        $.ajax({

            type: "POST",
            url: targeturl + "/" + <?= $pid ?>,
            data: {
                comments: $('#add_comment').val()
            },
            success: function(response) {
                $('#form')[0].reset();
                alert("comment added" );
                
                
            }
        });
    });
</script>