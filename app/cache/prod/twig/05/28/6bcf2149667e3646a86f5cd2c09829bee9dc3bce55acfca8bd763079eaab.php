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
    
</style>

";
    }

    // line 11
    public function block_container($context, array $blocks = array())
    {
        // line 12
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
        // line 25
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
        // line 47
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
        // line 67
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
        // line 82
        echo $this->env->getExtension('routing')->getPath("sc_drug_search");
        echo "',
                    function(html) {
                    }
            );
        });
\t\t



        \$(document).on('click', '#genericdrugdiseasebutton', function(e)
        {
            \$(\"#cardtype\").html('Select Name');

            e.preventDefault();
            \$(\".modal-body\").html('');
            \$(\".modal-body\").addClass('loader');
            \$.post('";
        // line 98
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
        // line 116
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
        // line 135
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
        // line 152
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
        // line 168
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
        // line 185
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
        // line 201
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
\t\$(document).ready(function() {
\t\tvar resizeCardAreaFn = function(\$this) {
\t\t\tvar newHeight = \$(window).height()-150;
\t\t\t\$this.height(newHeight);
\t\t\tconsole.log('new height', newHeight);
\t\t};
\t\tvar \$outerCardArea = \$(\"#outerCardArea\");
\t\tresizeCardAreaFn(\$outerCardArea);
\t\t\$(window).resize(function(){resizeCardAreaFn(\$outerCardArea);});
\t});

</script>


<div class=\"main\">
    
\t<div class=\"nav-bar\">
\t\t<div class=\"nav-tabs-nobs\">
\t\t\t<ul class=\"nav-nobs \">
\t\t\t\t<li class=\"active\"><a href=\"#home\" data-toggle=\"tab\">Home</a></li>
\t\t\t\t<li><a href=\"#about\" data-toggle=\"tab\">About</a></li>
\t\t\t\t<li><a href=\"#help\" data-toggle=\"tab\">Help</a></li>
\t\t\t\t<li><a href=\"";
        // line 293
        echo $this->env->getExtension('routing')->getPath("logout_route");
        echo "\" data-toggle=\"tab\">Sign Out</a></li>
\t\t\t</ul>
\t\t</div>
\t\t<span id=\"WhiteKoatLogo\">&nbsp;</span>
\t</div>

        ";
        // line 299
        $this->displayBlock('libcontent', $context, $blocks);
        // line 301
        echo "
            ";
        // line 302
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session"), "flashbag"), "get", array(0 => "notice"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["notice"]) {
            // line 303
            echo "    <div class=\"success_message\">
            ";
            // line 304
            echo twig_escape_filter($this->env, (isset($context["notice"]) ? $context["notice"] : $this->getContext($context, "notice")), "html", null, true);
            echo "
    </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['notice'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 307
        echo "            ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session"), "flashbag"), "get", array(0 => "error"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
            // line 308
            echo "    <div class=\"error_message\">
                ";
            // line 309
            echo twig_escape_filter($this->env, (isset($context["error"]) ? $context["error"] : $this->getContext($context, "error")), "html", null, true);
            echo "
    </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 312
        echo "
    <!-- Should be overridden -->
            ";
        // line 314
        $this->displayBlock('tablecontent', $context, $blocks);
        // line 316
        echo "
           ";
        // line 317
        $this->displayBlock('modalcontent', $context, $blocks);
        // line 333
        echo "
\t<div class=\"push\"></div>
</div>
<div id=\"footer\">&copy;2013-14 Axon Medicine, LLC</div>


";
    }

    // line 299
    public function block_libcontent($context, array $blocks = array())
    {
        // line 300
        echo "        ";
    }

    // line 314
    public function block_tablecontent($context, array $blocks = array())
    {
        // line 315
        echo "            ";
    }

    // line 317
    public function block_modalcontent($context, array $blocks = array())
    {
        // line 318
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
        return array (  448 => 318,  445 => 317,  441 => 315,  438 => 314,  434 => 300,  431 => 299,  421 => 333,  419 => 317,  416 => 316,  414 => 314,  410 => 312,  401 => 309,  398 => 308,  393 => 307,  384 => 304,  381 => 303,  377 => 302,  374 => 301,  372 => 299,  363 => 293,  268 => 201,  249 => 185,  229 => 168,  210 => 152,  190 => 135,  168 => 116,  147 => 98,  110 => 67,  87 => 47,  62 => 25,  47 => 12,  44 => 11,  35 => 4,  32 => 3,  128 => 82,  125 => 77,  79 => 8,  76 => 7,  71 => 5,  41 => 51,  39 => 7,  37 => 5,  34 => 4,  31 => 3,);
    }
}
