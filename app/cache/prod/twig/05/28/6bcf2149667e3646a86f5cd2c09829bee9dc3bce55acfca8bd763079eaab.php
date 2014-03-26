<?php

/* AxonMedicineWhiteKoatBundle:Default:home.student.html.twig */
class __TwigTemplate_05286bcf2149667e3646a86f5cd2c09829bee9dc3bce55acfca8bd763079eaab extends Twig_Template
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

        \$(document).on('keydown', '#genericdrugdiseasename', function(e)
        {
            if (e.which == 113) { //F2
                \$(\"#cardtype\").html('Select Name');

                e.preventDefault();
                \$(\".modal-body\").html('');
                \$(\".modal-body\").addClass('loader');
                \$.post('";
        // line 70
        echo $this->env->getExtension('routing')->getPath("drugdisease_popup_route_get");
        echo "',
                        {generic: '1'},
                function(html) {
//                        alert('html returned: ' + html);
                    \$(\".modal-body\").removeClass('loader');
                    \$(\".modal-body\").html(html);
                }
                );
                \$(\"#genericModal\").modal('show');
                return true;
            }
        });


        \$(document).on('keydown', '#genericdrugname', function(e)
        {
            if (e.which == 113) { //F2
                \$(\"#cardtype\").html('Select Name');

                e.preventDefault();
                \$(\".modal-body\").html('');
                \$(\".modal-body\").addClass('loader');
                \$.post('";
        // line 92
        echo $this->env->getExtension('routing')->getPath("drug_popup_route_get");
        echo "',
                        {generic: '1'},
                function(html) {
                    \$(\".modal-body\").removeClass('loader');
                    \$(\".modal-body\").html(html);
                }
                );
                \$(\"#genericModal\").modal('show');
                return true;
            }
        });

        \$(document).on('keydown', '#genericdiseasename', function(e)
        {
            if (e.which == 113) { //F2
                \$(\"#cardtype\").html('Select Name');

                e.preventDefault();
                \$(\".modal-body\").html('');
                \$(\".modal-body\").addClass('loader');
                \$.post('";
        // line 112
        echo $this->env->getExtension('routing')->getPath("disease_popup_route_get");
        echo "',
                        function(html) {
                            \$(\".modal-body\").removeClass('loader');
                            \$(\".modal-body\").html(html);
                        }
                );
                \$(\"#genericModal\").modal('show');
                return true;
            }
        });


        \$(document).on('click', '#drugsearchbutton', function(e)
        {
            e.preventDefault();
            \$.post('";
        // line 127
        echo $this->env->getExtension('routing')->getPath("sc_drug_search");
        echo "',
                    function(html) {
                    }
            );
        });




        \$(document).on('click', '#genericdrugdiseasebutton', function(e)
        {
            \$(\"#cardtype\").html('Select Name');

            e.preventDefault();
            \$(\".modal-body\").html('');
            \$(\".modal-body\").addClass('loader');
            \$.post('";
        // line 143
        echo $this->env->getExtension('routing')->getPath("drugdisease_popup_route_get");
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
            \$(\"#cardtype\").html('Select Name');

            e.preventDefault();
            \$(\".modal-body\").html('');
            \$(\".modal-body\").addClass('loader');
            \$.post('";
        // line 161
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
            \$(\"#cardtype\").html('Select Class');

            e.preventDefault();
            \$(\".modal-body\").html('');
            \$(\".modal-body\").addClass('loader');
            \$.post('";
        // line 180
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
            \$(\"#cardtype\").html('Select Target');

            e.preventDefault();
            \$(\".modal-body\").html('');
            \$(\".modal-body\").addClass('loader');
            \$.post('";
        // line 197
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
            \$(\"#cardtype\").html('Select Treatment');

            e.preventDefault();
            \$(\".modal-body\").html('');
            \$(\".modal-body\").addClass('loader');
            \$.post('";
        // line 213
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
            \$(\"#cardtype\").html('Select Side Effect');

            e.preventDefault();
            \$(\".modal-body\").html('');
            \$(\".modal-body\").addClass('loader');
            \$.post('";
        // line 230
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
            \$(\"#cardtype\").html('Select Contraindication');

            e.preventDefault();
            \$(\".modal-body\").html('');
            \$(\".modal-body\").addClass('loader');
            \$.post('";
        // line 246
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
    <div align=\"right\"><a href=\"";
        // line 321
        echo $this->env->getExtension('routing')->getPath("logout_route");
        echo "\" data-toggle=\"tab\">Logout</a></div>

    <ul class=\"nav nav-tabs\">
        <li class=\"active\"><a href=\"#home\" data-toggle=\"tab\">Search and Card View</a></li>
        <li><a href=\"#help\" data-toggle=\"tab\">Help</a></li>
    </ul>

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
        echo "            ";
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

</div>
<div style=\"text-align:center; font-size: x-small\">&copy;2013-14 Axon Medicine, LLC</div>


";
    }

    // line 328
    public function block_libcontent($context, array $blocks = array())
    {
        // line 329
        echo "        ";
    }

    // line 343
    public function block_tablecontent($context, array $blocks = array())
    {
        // line 344
        echo "            ";
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
        return "AxonMedicineWhiteKoatBundle:Default:home.student.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  480 => 347,  477 => 346,  473 => 344,  470 => 343,  466 => 329,  463 => 328,  453 => 362,  451 => 346,  448 => 345,  446 => 343,  442 => 341,  433 => 338,  430 => 337,  425 => 336,  416 => 333,  413 => 332,  409 => 331,  406 => 330,  404 => 328,  394 => 321,  316 => 246,  297 => 230,  277 => 213,  258 => 197,  238 => 180,  216 => 161,  195 => 143,  176 => 127,  158 => 112,  135 => 92,  110 => 70,  95 => 57,  92 => 56,  65 => 32,  35 => 4,  32 => 3,);
    }
}
