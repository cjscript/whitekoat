<?php

/* AxonMedicineWhiteKoatBundle:Default:home.html.twig */
class __TwigTemplate_70cf173b096d5d40f0fdb7f476fba0e820a51f8f6aca6e256941a55454632737 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("AxonMedicineWhiteKoatBundle:Default:base.html.twig");

        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'container' => array($this, 'block_container'),
            'libcontent' => array($this, 'block_libcontent'),
            'tablecontent' => array($this, 'block_tablecontent'),
            'modalcontent' => array($this, 'block_modalcontent'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "AxonMedicineWhiteKoatBundle:Default:base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 4
        echo "
<style type=\"text/css\">
    .text-placeholder {color: #AAA !important}

    table{
        table-layout: fixed;
    }

    td{
        word-wrap: break-word
    }

    .success_message
    {
        color: green;
        font-size:75%;
        font-weight:bold;
    }

    .error_message
    {
        color: red;
        font-size:75%;
        font-weight:bold;
    }

    .loader
    {
        background-image: url(";
        // line 32
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/axonmedicinewhitekoat/images/ajax-loader.gif"), "html", null, true);
        echo ");
        background-repeat: no-repeat;
        background-position: center;
        height: 100px;
    }
    .main 
    {
        width: 800px;
        padding: 10px 30px 30px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
        -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
        box-shadow: 0 1px 2px rgba(0,0,0,.05);
    }

</style>

";
    }

    // line 56
    public function block_container($context, array $blocks = array())
    {
        // line 57
        echo "
<script language=\"javascript\">

    \$(function() {

        \$(document).on('click', '#uploadData', function(e)
        {
            e.preventDefault();
            \$(\".progressbar\").html('');
            \$(\".progressbar\").addClass('loader');
            \$.post('";
        // line 67
        echo $this->env->getExtension('routing')->getPath("import_route_upload");
        echo "',
                    function(html) {
//                        alert('html returned: ' + html);
                        \$(\".progressbar\").removeClass('loader');
                        \$(\".progressbar\").html(html);
                    }
            );
        });

        \$(document).on('click', '#genericdrugbutton', function(e)
        {
            \$(\"#cardtype\").html('Select Drug Name');

            e.preventDefault();
            \$(\".modal-body\").html('');
            \$(\".modal-body\").addClass('loader');
            \$.post('";
        // line 83
        echo $this->env->getExtension('routing')->getPath("drug_popup_route_get");
        echo "',
                    {generic: '1'},
            function(html) {
//                        alert('html returned: ' + html);
                \$(\".modal-body\").removeClass('loader');
                \$(\".modal-body\").html(html);
            }
            );
            \$(\"#genericModal\").modal('show');
        });

        \$(document).on('click', '#branddrugbutton', function(e)
        {
            \$(\"#cardtype\").html('Select Drug Name');

            e.preventDefault();
            \$(\".modal-body\").html('');
            \$(\".modal-body\").addClass('loader');
            \$.post('";
        // line 101
        echo $this->env->getExtension('routing')->getPath("drug_popup_route_get");
        echo "',
                    {generic: '0'},
            function(html) {
                \$(\".modal-body\").removeClass('loader');
                \$(\".modal-body\").html(html);
            }
            );
            \$(\"#genericModal\").modal('show');
        });



        \$(document).on('click', '#drugclassbutton', function(e)
        {
            \$(\"#cardtype\").html('Select Drug Class');

            e.preventDefault();
            \$(\".modal-body\").html('');
            \$(\".modal-body\").addClass('loader');
            \$.post('";
        // line 120
        echo $this->env->getExtension('routing')->getPath("drug_class_popup_route_get");
        echo "',
                    {},
                    function(html) {
//                        alert('html returned: ' + html);
                        \$(\".modal-body\").removeClass('loader');
                        \$(\".modal-body\").html(html);
                    }
            );
            \$(\"#genericModal\").modal('show');
        });
        \$(document).on('click', '#drugtargetbutton', function(e)
        {
            \$(\"#cardtype\").html('Select Drug Target');

            e.preventDefault();
            \$(\".modal-body\").html('');
            \$(\".modal-body\").addClass('loader');
            \$.post('";
        // line 137
        echo $this->env->getExtension('routing')->getPath("drug_target_popup_route_get");
        echo "',
                    {},
                    function(html) {
                        \$(\".modal-body\").removeClass('loader');
                        \$(\".modal-body\").html(html);
                    }
            );
            \$(\"#genericModal\").modal('show');
        });
        \$(document).on('click', '#drugtreatmentbutton', function(e)
        {
            \$(\"#cardtype\").html('Select Drug Treatment');

            e.preventDefault();
            \$(\".modal-body\").html('');
            \$(\".modal-body\").addClass('loader');
            \$.post('";
        // line 153
        echo $this->env->getExtension('routing')->getPath("drug_treatment_popup_route_get");
        echo "',
                    {},
                    function(html) {
//                        alert('html returned: ' + html);
                        \$(\".modal-body\").removeClass('loader');
                        \$(\".modal-body\").html(html);
                    }
            );
            \$(\"#genericModal\").modal('show');
        });
        \$(document).on('click', '#drugsideeffectbutton', function(e)
        {
            \$(\"#cardtype\").html('Select Drug Side Effect');

            e.preventDefault();
            \$(\".modal-body\").html('');
            \$(\".modal-body\").addClass('loader');
            \$.post('";
        // line 170
        echo $this->env->getExtension('routing')->getPath("drug_sideeffect_popup_route_get");
        echo "',
                    {},
                    function(html) {
                        \$(\".modal-body\").removeClass('loader');
                        \$(\".modal-body\").html(html);
                    }
            );
            \$(\"#genericModal\").modal('show');
        });
        \$(document).on('click', '#drugcontraindbutton', function(e)
        {
            \$(\"#cardtype\").html('Select Drug Contraindication');

            e.preventDefault();
            \$(\".modal-body\").html('');
            \$(\".modal-body\").addClass('loader');
            \$.post('";
        // line 186
        echo $this->env->getExtension('routing')->getPath("drug_contraind_popup_route_get");
        echo "',
                    {},
                    function(html) {
                        \$(\".modal-body\").removeClass('loader');
                        \$(\".modal-body\").html(html);
                    }
            );
            \$(\"#genericModal\").modal('show');
        });


    });
    function updateAndCloseModal(fieldName, fieldId, fieldPrefix, id, name)
    {
        \$(fieldName).val(fieldPrefix + name);

        \$(fieldId).val(id);

        \$('#genericModal').modal(\"hide\");
    }

    function updateSelectAndCloseModal(fieldName, fieldId, fieldPrefix, id, name)
    {
        // if field name doesn't already exist, add it.
        var exists = false;

        var fieldOutput = fieldPrefix + name;

        var currentVal = \$(fieldId).val();

        if (currentVal !== '')
        {
            currentVal = currentVal + ':';
        }
        currentVal += id;
        \$(fieldId).val(currentVal);
        \$(fieldName + \" option\").each(function()
        {
            if (id == \$(this).val())
            {
                exists = true;
                return false;
            }
        });

        if (!exists)
        {
            \$(fieldName)
                    .append(\$('<option>' + fieldOutput + '</option>')
                            .attr('value', id));
        }


        \$('#genericModal').modal(\"hide\");
    }

    function libraryDropDownChanged() {

        alert('library changed');

        /**        \$.post('{path('AcmeHomeBundle_ajax_update_mydata')}',
         {data1: 'mydata1', data2: 'mydata2'},
         function(response) {
         if (response.code == 100 && response.success) {//dummy check
         //do something
         }
         
         }, \"json\");
         */
    }


</script>

<div class=\"main\">
    <table width=\"800px\">
        <tr>
            <td>
                <table>
                    <tr>
                        <td>
                            <a href=\"";
        // line 267
        echo $this->env->getExtension('routing')->getPath("dlc_route_get");
        echo "\">Drug</a> |  
                        </td>
                        <td>
                            <a href=\"";
        // line 270
        echo $this->env->getExtension('routing')->getPath("clc_route_get");
        echo "\">Class</a> |  
                        </td>
                        <td>
                            <a href=\"";
        // line 273
        echo $this->env->getExtension('routing')->getPath("mlc_route_get");
        echo "\">Targ/Molec</a> |  
                        </td>
                        <td>
                            <a href=\"";
        // line 276
        echo $this->env->getExtension('routing')->getPath("dislc_route_get");
        echo "\">Dis/Treatment</a> |  
                        </td>
                        <td>
                            <a href=\"";
        // line 279
        echo $this->env->getExtension('routing')->getPath("symlc_route_get");
        echo "\">Symptom</a> |  
                        </td>
                        <td>
                            <a href=\"";
        // line 282
        echo $this->env->getExtension('routing')->getPath("actc_route_get");
        echo "\">Action</a> |  
                        </td>
                        <td>
                            <a href=\"";
        // line 285
        echo $this->env->getExtension('routing')->getPath("alic_route_get");
        echo "\">Alias</a> |  
                        </td>
                        <td>
                            <a href=\"";
        // line 288
        echo $this->env->getExtension('routing')->getPath("drug_card_route_get");
        echo "\">Drug Card</a> |  
                        </td>
                        <td>
                            <a href=\"";
        // line 291
        echo $this->env->getExtension('routing')->getPath("disease_card_route_get");
        echo "\">Disease Card</a> |  
                        </td>
                        <td>
                            <a href=\"";
        // line 294
        echo $this->env->getExtension('routing')->getPath("import_route_get");
        echo "\">Import</a> |  
                        </td>
                        <td>
                            <a href=\"";
        // line 297
        echo $this->env->getExtension('routing')->getPath("img_route_get");
        echo "\">Image</a> |  
                        </td>
                        <td><a href=\"\">Help</a>
                        </td>
                        <td align=\"right\">&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"";
        // line 301
        echo $this->env->getExtension('routing')->getPath("logout_route");
        echo "\">Logout</a>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td align=\"right\">
                <table>
                    <tr><td>
                            Welcome ";
        // line 311
        echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : $this->getContext($context, "name")), "html", null, true);
        echo "
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <table width=\"800px\">
        <tr align=\"right\">
            <td style=\"paddding-right:15px\">
                <img src=\"";
        // line 321
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/axonmedicinewhitekoat/images/linux-penguin.jpg"), "html", null, true);
        echo "\" width=\"30px\" alt=\"img\" />
                </div>

            </td>
        </tr>
    </table>

    ";
        // line 328
        $this->displayBlock('libcontent', $context, $blocks);
        // line 330
        echo "
    ";
        // line 331
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session"), "flashbag"), "get", array(0 => "notice"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["notice"]) {
            // line 332
            echo "    <div class=\"success_message\">
    ";
            // line 333
            echo twig_escape_filter($this->env, (isset($context["notice"]) ? $context["notice"] : $this->getContext($context, "notice")), "html", null, true);
            echo "
    </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['notice'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 336
        echo "    ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session"), "flashbag"), "get", array(0 => "error"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
            // line 337
            echo "    <div class=\"error_message\">
        ";
            // line 338
            echo twig_escape_filter($this->env, (isset($context["error"]) ? $context["error"] : $this->getContext($context, "error")), "html", null, true);
            echo "
    </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 341
        echo "
    <!-- Should be overridden -->
    ";
        // line 343
        $this->displayBlock('tablecontent', $context, $blocks);
        // line 345
        echo "
   ";
        // line 346
        $this->displayBlock('modalcontent', $context, $blocks);
        // line 362
        echo "
    <div style=\"text-align:center; font-size: x-small\">&copy;2013-14 Axon Medicine, LLC</div>

</div>

";
    }

    // line 328
    public function block_libcontent($context, array $blocks = array())
    {
        // line 329
        echo "    ";
    }

    // line 343
    public function block_tablecontent($context, array $blocks = array())
    {
        // line 344
        echo "    ";
    }

    // line 346
    public function block_modalcontent($context, array $blocks = array())
    {
        // line 347
        echo "
    <!-- Modal -->
    <div id=\"genericModal\" class=\"modal hide fade\" tabindex=\"-1\" aria-labelledby=\"genericPopupLabel\" aria-hidden=\"true\">
        <input type=\"hidden\" id=\"modaltype\" value=\"[modaltype]\">
        <div class=\"modal-header\">
            <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>
            <h4 class=\"modal-title\" id=\"genericPopupLabel\"><div id=\"cardtype\"></div></h4>
        </div>
        <div class=\"modal-body\">
        </div>
        <div class=\"modal-footer\">
            <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>
        </div>
    </div><!-- /.modal -->
    ";
    }

    public function getTemplateName()
    {
        return "AxonMedicineWhiteKoatBundle:Default:home.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  509 => 347,  506 => 346,  502 => 344,  499 => 343,  495 => 329,  492 => 328,  483 => 362,  481 => 346,  478 => 345,  476 => 343,  472 => 341,  463 => 338,  460 => 337,  455 => 336,  446 => 333,  443 => 332,  439 => 331,  436 => 330,  434 => 328,  424 => 321,  411 => 311,  398 => 301,  391 => 297,  385 => 294,  379 => 291,  373 => 288,  367 => 285,  361 => 282,  355 => 279,  349 => 276,  343 => 273,  337 => 270,  331 => 267,  247 => 186,  228 => 170,  208 => 153,  189 => 137,  169 => 120,  147 => 101,  126 => 83,  107 => 67,  95 => 57,  92 => 56,  65 => 32,  35 => 4,  32 => 3,);
    }
}
