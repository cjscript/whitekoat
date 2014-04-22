<?php

/* AxonMedicineWhiteKoatBundle:Default:base.html.twig */
class __TwigTemplate_b977d0d8acc08c246ea02a69addd9b86875a143e9ff95c9986ff2e3f05b11910 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'javascripts' => array($this, 'block_javascripts'),
            'container' => array($this, 'block_container'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
    <head>
        <title>WhiteKoat</title>
        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\" />
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
        <meta name=\"description\" content=\"WhiteKoat\">
        <meta name=\"author\" content=\"cjscript\">

        <link href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/axonmedicinewhitekoat/css/bootstrap.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
        <link href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/axonmedicinewhitekoat/css/bootstrap-responsive.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
        <link href=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/axonmedicinewhitekoat/css/parsley/parsley.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
        <link href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/axonmedicinewhitekoat/css/bootstrap-fileupload.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
        <link href=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/axonmedicinewhitekoat/css/bootstrap-fileupload.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">     
        <link href=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/axonmedicinewhitekoat/css/jquery-ui-1.9.2.custom.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
        <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/axonmedicinewhitekoat/css/lightbox.css"), "html", null, true);
        echo "\">

        <link href=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/axonmedicinewhitekoat/css/bootstrap-select/bootstrap-select.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">        

        <link href=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/axonmedicinewhitekoat/css/jquery.fancybox.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">        
        <link href=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/axonmedicinewhitekoat/css/mainstyle.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
        <style type=\"text/css\">

            .info_other {
                padding: 8px 35px 8px 14px;
                margin-bottom: 20px;
                text-shadow: 0 1px 0 rgba(255, 255, 255, 0.5);
                background-color: #eeeeee;
                border: 1px solid #dddddd;
                border-radius: 4px;
            }

            .panel-heading .accordion-toggle:after {
                /* symbol for \"opening\" panels */
                //                content: \"\\e114\";    /* adjust as needed, taken from bootstrap.css */
                //                content: icon-chevron-right;
                //              float: right;        /* adjust as needed */
                //            color: grey;         /* adjust as needed */
            }
            .panel-heading .accordion-toggle.collapsed:after {
                /* symbol for \"collapsed\" panels */
                //              content: \"\\e080\";    /* adjust as needed, taken from bootstrap.css */
            }


        </style>

";
        // line 48
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 51
        echo "
        <!-- jquery dependencies -->
        <script src=\"";
        // line 53
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/axonmedicinewhitekoat/js/jquery.js"), "html", null, true);
        echo "\"></script> 
        <script src=\"";
        // line 54
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/axonmedicinewhitekoat/js/bootstrap.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 55
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/axonmedicinewhitekoat/js/rowlink.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 56
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/axonmedicinewhitekoat/js/jquery-ui-1.9.2.custom.js"), "html", null, true);
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 57
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/axonmedicinewhitekoat/js/lightbox.min.js"), "html", null, true);
        echo "\"></script>

        <!-- parsley dependencies -->
        <script src=\"";
        // line 60
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/axonmedicinewhitekoat/js/parsley/parsley.min.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 61
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/axonmedicinewhitekoat/js/parsley/parsley-standalone.min.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 62
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/axonmedicinewhitekoat/js/parsley/parsley.extend.min.js"), "html", null, true);
        echo "\"></script>

        <!-- file upload -->
        <script src=\"";
        // line 65
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/axonmedicinewhitekoat/js/bootstrap-fileupload.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 66
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/axonmedicinewhitekoat/js/bootstrap-fileupload.min.js"), "html", null, true);
        echo "\"></script>

        <!-- silvio bootstrap select -->
        <script src=\"";
        // line 69
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/axonmedicinewhitekoat/js/bootstrap-select/bootstrap-select.min.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>

        <script src=\"";
        // line 71
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/axonmedicinewhitekoat/js/jquery.fancybox.pack.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>

        <script>

            function showWindow(name, title, left, top)
            {
                var w = 300;
                var h = 600;
                window.open(name, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);
            }
            \$(document).ready(function() {
                \$(\".selectpicker\").selectpicker();
                \$(\".fancy\").fancybox({
                    padding: 0,
                    openEffect: 'elastic'
                });



            });
        </script>


";
        // line 94
        $this->displayBlock('javascripts', $context, $blocks);
        // line 97
        echo "
    </head>

    <body>

";
        // line 102
        $this->displayBlock('container', $context, $blocks);
        // line 104
        echo "    </body>
</html>

";
    }

    // line 48
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 49
        echo "
";
    }

    // line 94
    public function block_javascripts($context, array $blocks = array())
    {
        // line 95
        echo "
 ";
    }

    // line 102
    public function block_container($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "AxonMedicineWhiteKoatBundle:Default:base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  218 => 102,  213 => 95,  205 => 49,  202 => 48,  195 => 104,  193 => 102,  186 => 97,  184 => 94,  158 => 71,  153 => 69,  143 => 65,  137 => 62,  133 => 61,  129 => 60,  123 => 57,  119 => 56,  115 => 55,  111 => 54,  107 => 53,  103 => 51,  101 => 48,  67 => 20,  57 => 16,  53 => 15,  49 => 14,  45 => 13,  33 => 10,  22 => 1,  448 => 318,  445 => 317,  441 => 315,  438 => 314,  434 => 300,  431 => 299,  421 => 333,  419 => 317,  416 => 316,  414 => 314,  410 => 312,  401 => 309,  398 => 308,  393 => 307,  384 => 304,  381 => 303,  377 => 302,  374 => 301,  372 => 299,  363 => 293,  268 => 201,  249 => 185,  229 => 168,  210 => 94,  190 => 135,  168 => 116,  147 => 66,  110 => 67,  87 => 47,  62 => 18,  47 => 12,  44 => 11,  35 => 4,  32 => 3,  128 => 82,  125 => 77,  79 => 8,  76 => 7,  71 => 21,  41 => 12,  39 => 7,  37 => 11,  34 => 4,  31 => 3,);
    }
}
