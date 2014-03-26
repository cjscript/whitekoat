<?php

/* AxonMedicineWhiteKoatBundle:Default:student.home.html.twig */
class __TwigTemplate_724cbf260e1478fc4d2b89b41264a0f0602524042ffc718c40023ec0eb020abf extends Twig_Template
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

        \$(document).on('click', '#genericdrugbutton', function(e)
        {
            \$(\"#cardtype\").html('Select Drug Name');

            e.preventDefault();
            \$(\".modal-body\").html('');
            \$(\".modal-body\").addClass('loader');
            \$.post('";
        // line 69
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
        // line 87
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
        // line 106
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
        // line 123
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
        // line 139
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
        // line 156
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
        // line 172
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
                            <table>
                                <tr>
                                    <td align=\"right\"><a href=\"";
        // line 255
        echo $this->env->getExtension('routing')->getPath("sc_main_route_get");
        echo "\">Search and Card View</a> |
                                    <td><a href=\"\">Help</a> |
                                    </td>
                                    <td align=\"right\"><a href=\"";
        // line 258
        echo $this->env->getExtension('routing')->getPath("logout_route");
        echo "\">Logout</a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
            <td align=\"right\">
                <table>
                    <tr>
                        <td>
                            Welcome ";
        // line 270
        echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : $this->getContext($context, "name")), "html", null, true);
        echo "
                        </td>
                        <td style=\"paddding-right:15px\">
                            <img src=\"";
        // line 273
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/axonmedicinewhitekoat/images/linux-penguin.jpg"), "html", null, true);
        echo "\" width=\"30px\" alt=\"img\" />
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        </td>
        </tr>
    </table>

    ";
        // line 284
        $this->displayBlock('libcontent', $context, $blocks);
        // line 286
        echo "
    ";
        // line 287
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session"), "flashbag"), "get", array(0 => "notice"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["notice"]) {
            // line 288
            echo "    <div class=\"success_message\">
    ";
            // line 289
            echo twig_escape_filter($this->env, (isset($context["notice"]) ? $context["notice"] : $this->getContext($context, "notice")), "html", null, true);
            echo "
    </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['notice'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 292
        echo "    ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session"), "flashbag"), "get", array(0 => "error"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
            // line 293
            echo "    <div class=\"error_message\">
        ";
            // line 294
            echo twig_escape_filter($this->env, (isset($context["error"]) ? $context["error"] : $this->getContext($context, "error")), "html", null, true);
            echo "
    </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 297
        echo "
    <!-- Should be overridden -->
    ";
        // line 299
        $this->displayBlock('tablecontent', $context, $blocks);
        // line 301
        echo "
   ";
        // line 302
        $this->displayBlock('modalcontent', $context, $blocks);
        // line 318
        echo "
    <div style=\"text-align:center; font-size: x-small\">&copy;2013-14 Axon Medicine, LLC</div>

</div>

";
    }

    // line 284
    public function block_libcontent($context, array $blocks = array())
    {
        // line 285
        echo "    ";
    }

    // line 299
    public function block_tablecontent($context, array $blocks = array())
    {
        // line 300
        echo "    ";
    }

    // line 302
    public function block_modalcontent($context, array $blocks = array())
    {
        // line 303
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
        return "AxonMedicineWhiteKoatBundle:Default:student.home.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  432 => 303,  429 => 302,  425 => 300,  422 => 299,  418 => 285,  415 => 284,  406 => 318,  404 => 302,  401 => 301,  399 => 299,  395 => 297,  386 => 294,  383 => 293,  378 => 292,  369 => 289,  366 => 288,  362 => 287,  359 => 286,  357 => 284,  343 => 273,  337 => 270,  322 => 258,  316 => 255,  230 => 172,  211 => 156,  191 => 139,  172 => 123,  152 => 106,  130 => 87,  109 => 69,  95 => 57,  92 => 56,  65 => 32,  35 => 4,  32 => 3,);
    }
}
