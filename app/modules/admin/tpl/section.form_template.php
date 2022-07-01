<?php
$form_elements = $__page->form->getElements();
?>
<main>
    <?php require_once 'partial/admin-leftmenu.php'; ?>
    <section class="admin-body-section">
        <div class="container-fluid h-100">
            <div class="col">
                <div class="card shadow">
                    <form id="sendContributionForm" method="post" action="contribution" autocomplete="off" class="d-flex flex-column h-100">
                        <div class="card-body p-xl-20">
                            <div class="display-5 fw-medium"><?php echo $__page->form->form_title; ?></div>
                            <div class="text-muted mt-1"><?php echo $__page->form->form_description; ?></div>
                            <input type="hidden" name="form_id" value="<?php echo $__page->form->id; ?>">
                            <div class="col-xl-7">
                                <label class="form-label mt-20">Which wallet do you want to contribute to?</label>
                                <input type="text" name="wallet_address" id="wallet_address" class="form-control form-control-lg">
                                <label class="form-label fw-medium mt-18 mb-3">What's the reason for this contribution?</label>
                                <textarea class="form-control form-control-lg fs-3" name="contribution_reason" id="contribution_reason" rows="2" placeholder="Helpful discussion on Discourse, URL tweet etc..."></textarea>
                                <?php
                                foreach ($form_elements as $ele){ ?>
                                    <label class="form-label mt-10"><?php echo $ele['e_label']; ?></label>
                                    <?php
                                    if($ele['e_type'] == 'text'){ ?>
                                        <input type="text" name="<?php echo $ele['e_name']; ?>" id="<?php echo $ele['e_id']; ?>" placeholder="<?php echo $ele['e_placeholder']; ?>" class="form-control form-control-lg">
                                        <?php
                                    }
                                    elseif ($ele['e_type'] == 'textarea') { ?>
                                        <textarea class="form-control form-control-lg fs-3" name="<?php echo $ele['e_name']; ?>" id="<?php echo $ele['e_id']; ?>" rows="2" placeholder="<?php echo $ele['e_placeholder']; ?>"></textarea>
                                        <?PHP
                                    }
                                    elseif ($ele['e_type'] == 'tag_select') { ?>
                                        <select style="width: width: 100px !important;" class="form-control form-control-lg" multiple="multiple" name="<?php echo $ele['e_name']; ?>" id="<?php echo $ele['e_id']; ?>" placeholder="<?php echo $ele['e_placeholder']; ?>"></select>
                                        <?php
                                    }
                                 } ?>
                            </div>
                        </div>
                        <div class="card-body border-top d-flex justify-content-end gap-3">
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
    feather.replace();

    $(document).ready(function() {
        selectedAccount = sessionStorage.getItem("lh_sel_wallet_add");
        if (selectedAccount) {
            $("#wallet_address").val(selectedAccount);
        }

        <?php
            foreach ($form_elements as $ele){
                if($ele['e_type'] == 'tag_select'){ ?>
                    $("#<?php echo $ele['e_id']; ?>").select2({
                        tags: true,
                        tokenSeparators: [','],
                        selectOnClose: true,
                        closeOnSelect: false
                    });
                    <?php
                }
            }
        ?>

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
                        showMessage('success',10000,'Your contribution are being sent.');
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