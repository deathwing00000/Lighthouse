<?php
use lighthouse\Form;
$form_elements = $__page->form->getElements();
?>
<main>
    <?php require_once 'partial/admin-leftmenu.php'; ?>
    <section class="admin-body-section">
        <div class="container-fluid h-100">
            <div class="col h-100">
                <div class="card shadow h-100">
                    <form id="sendContributionForm" method="post" action="contribution" autocomplete="off" class="d-flex flex-column h-100">
                        <div class="card-body p-xl-20 mb-auto">
                            <div class="display-5 fw-medium"><?php echo $__page->form->form_title; ?></div>
                            <div class="text-muted mt-1"><?php echo $__page->form->form_description; ?></div>
                            <input type="hidden" name="form_id" value="<?php echo $__page->form->id; ?>">
                            <div class="col-xl-7">
                                <label class="form-label mt-10">Which wallet do you want to contribute to?</label>
                                <input type="text" name="wallet_address" id="wallet_address" class="form-control form-control-lg">
                                <label class="form-label mt-10">What's the reason for this contribution?</label>
                                <textarea class="form-control form-control-lg fs-3" name="contribution_reason" id="contribution_reason" rows="2" placeholder="Helpful discussion on Discourse, URL tweet etc..."></textarea>
                                <label class="form-label mt-10">Tag this distribution to query it later.</label>
                                <select style="width: width: 100px !important;" class="form-control form-control-lg tags" multiple="multiple" name="tags[]" id="tags" placeholder="Marketing, Development, Strategy"></select>
                                <?php
                                foreach ($form_elements as $ele){ ?>
                                    <label class="form-label mt-10"><?php echo $ele['e_label']; ?></label>
                                    <?php
                                    switch ($ele['e_type']) {
                                        case Form::QT_SHORT_ANSWER:
                                            ?>
                                            <input type="text" name="<?php echo $ele['e_name']; ?>" id="<?php echo $ele['e_id']; ?>" placeholder="<?php echo $ele['e_description']; ?>" class="form-control form-control-lg">
                                            <?php
                                            break;
                                        case Form::QT_PARAGRAPH:
                                            ?>
                                            <textarea class="form-control form-control-lg fs-3" name="<?php echo $ele['e_name']; ?>" id="<?php echo $ele['e_id']; ?>" rows="2" placeholder="<?php echo $ele['e_placeholder']; ?>"></textarea>
                                            <?php
                                            break;
                                        case Form::QT_MULTIPLE_CHOICE:
                                            $choices = json_decode($ele['e_description']);
                                            foreach ($choices as $index => $choice){ ?>
                                                <br><input type="radio" name="<?php echo $ele['e_name']; ?>" id="<?php echo $ele['e_id']; ?>" value="<?php echo $choice; ?>"> <label for="<?php echo $choice; ?>"><?php echo ucfirst(strtolower($choice)); ?></label><br>
                                                <?php
                                            }
                                            break;
                                        case Form::QT_CHECKBOXES:
                                            $choices = json_decode($ele['e_description']);
                                            foreach ($choices as $index => $choice){ ?>
                                                <br><input type="checkbox" name="<?php echo $ele['e_name']; ?>" id="<?php echo $ele['e_id']; ?>" value="<?php echo $choice; ?>"> <label for="<?php echo $choice; ?>"><?php echo ucfirst(strtolower($choice)); ?></label><br>
                                                <?php
                                            }
                                            break;
                                        case Form::QT_DROPDOWN:
                                            $list = json_decode($ele['e_description']);
                                            ?>
                                            <selectname="<?php echo $ele['e_name']; ?>" id="<?php echo $ele['e_id']; ?>">
                                                <?php foreach ($choices as $index => $choice){ ?>
                                                <option value="<?php echo $choice; ?>"><?php echo ucfirst(strtolower($choice)); ?></option>
                                                <?php } ?>
                                            </select>
                                            <?php
                                            break;
                                        case 6:
                                            ?>
                                            <select style="width: width: 100px !important;" class="form-control form-control-lg tags" multiple="multiple" name="<?php echo $ele['e_name']; ?>" id="<?php echo $ele['e_id']; ?>" placeholder="<?php echo $ele['e_description']; ?>"></select>
                                            <?php
                                            break;
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <div class="border-top d-flex justify-content-end gap-3 py-6 px-18">
                            <button type="submit" id="btn_submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>
<?php include_once app_root . '/templates/admin-foot.php'; ?>
<script>

    $(document).ready(function() {
        selectedAccount = sessionStorage.getItem("lh_sel_wallet_add");
        if (selectedAccount) {
            $("#wallet_address").val(selectedAccount);
        }

        $(".tags").select2({
            tags: true,
            tokenSeparators: [',']
        });

        $('#sendContributionForm').validate({
            rules: {
                wallet_address:{
                    required: true
                },
                reason:{
                    required: true
                },
                <?php
                foreach ($form_elements as $ele){
                    if($ele['e_required'] == 1 ){ ?>
                        '<?php echo $ele['e_name']; ?>': {
                            required: true
                        },
                    <?php }
                }?>
            },
            submitHandler: function(form){
                $(form).ajaxSubmit({
                    type:'post',
                    dataType:'json',
                    beforeSend: function() {
                        $('#btn_submit').prop('disabled', true);
                       // showMessage('success',10000,'Submitting your claim...');
                    },
                    success: function(data){
                        $('#btn_submit').prop('disabled', false);
                        if(data.success == true){
                            showMessage('success', 10000, data.message);
                            formClear();
                        }
                        else{
                            if(data.message) {
                                showMessage('danger', 10000, data.message);
                                formClear();
                            }
                            else {
                                $('#' + data.element).addClass('form-control-lg error');
                                $('<label class="error">' + data.msg + '</label>').insertAfter('#' + data.element);
                            }
                        }
                    }
                });
            }
        });
    });

    function formClear() {
        $("#contribution_reason").val('');
        $("#tags").val(null).trigger('change');
        <?php
        foreach ($form_elements as $ele){
            if($ele['e_type'] == 'tag_select'){ ?>
                $("#<?php echo $ele['e_id']; ?>").val(null).trigger('change');
                <?php
            }
            else { ?>
                $("#<?php echo $ele['e_id']; ?>").val('');
                <?php
            }
        } ?>
    }
</script>