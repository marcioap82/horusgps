<?php
/* Smarty version 3.1.30, created on 2018-04-06 08:01:34
  from "/var/www/html/financeiro/ui/theme/ibilling/email-templates.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ac7538ed42227_58046182',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0c751b829d8a0f0bef564425ba9fbe4248047613' => 
    array (
      0 => '/var/www/html/financeiro/ui/theme/ibilling/email-templates.tpl',
      1 => 1474985470,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:sections/header.tpl' => 1,
    'file:sections/footer.tpl' => 1,
  ),
),false)) {
function content_5ac7538ed42227_58046182 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="row">

    <div class="col-lg-12 animated fadeInRight">
        <div class="mail-box-header">


            <h2>
                <?php echo $_smarty_tpl->tpl_vars['_L']->value['Email Templates'];?>

            </h2>

        </div>
        <div class="mail-box" id="application_ajaxrender">

            <table class="table table-hover table-mail">
                <tbody>


              <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['d']->value, 'ds');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['ds']->value) {
?>
                  <tr class="read">

                      <td><a  class="ve" id="f<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
" href="#"><?php echo ib_lan_get_line($_smarty_tpl->tpl_vars['ds']->value['tplname']);?>
</a>  </td>
                      <td><a  class="ve" id="s<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
" href="#"><?php echo $_smarty_tpl->tpl_vars['ds']->value['subject'];?>
</a></td>
                      <td class=""></td>
                      <td class="text-right">
                              <?php if ($_smarty_tpl->tpl_vars['ds']->value['send'] == 'Yes') {?>
                          <span class="label label-success pull-right"> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Active'];?>
 </span>
                                  <?php } else { ?>
                                  <span class="label label-danger pull-right"> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Inactive'];?>
 </span>
                              <?php }?>

                          </td>
                  </tr>
              <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>


                </tbody>
            </table>


        </div>
    </div>
</div>
<?php $_smarty_tpl->_subTemplateRender("file:sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
