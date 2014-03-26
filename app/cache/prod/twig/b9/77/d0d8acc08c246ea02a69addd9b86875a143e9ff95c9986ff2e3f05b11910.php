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
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/axonmedicinewhitekoat/css/bootstrap-select/bootstrap-select.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">        

        <link href=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/axonmedicinewhitekoat/css/jquery.fancybox.css"), "html", null, true);
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
            body {
                padding-top: 40px;
                padding-bottom: 40px;
                background-color: #f6f6f6;
            }

        </style>

";
        // line 50
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 53
        echo "
        <!-- jquery dependencies -->
        <script src=\"";
        // line 55
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/axonmedicinewhitekoat/js/jquery.js"), "html", null, true);
        echo "\"></script> 
        <script src=\"";
        // line 56
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/axonmedicinewhitekoat/js/bootstrap.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 57
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/axonmedicinewhitekoat/js/rowlink.js"), "html", null, true);
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
        // line 91
        $this->displayBlock('javascripts', $context, $blocks);
        // line 94
        echo "
    </head>

    <body>

";
        // line 99
        $this->displayBlock('container', $context, $blocks);
        // line 101
        echo "    </body>
</html>

";
    }

    // line 50
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 51
        echo "
";
    }

    // line 91
    public function block_javascripts($context, array $blocks = array())
    {
        // line 92
        echo "
 ";
    }

    // line 99
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
        return array (  200 => 99,  195 => 92,  192 => 91,  187 => 51,  184 => 50,  177 => 101,  175 => 99,  168 => 94,  166 => 91,  143 => 71,  138 => 69,  132 => 66,  128 => 65,  122 => 62,  118 => 61,  108 => 57,  104 => 56,  100 => 55,  96 => 53,  94 => 50,  59 => 18,  49 => 14,  45 => 13,  41 => 12,  37 => 11,  33 => 10,  22 => 1,  139 => 68,  129 => 64,  125 => 63,  121 => 62,  117 => 61,  114 => 60,  110 => 59,  95 => 46,  92 => 45,  65 => 20,  54 => 16,  50 => 17,  38 => 8,  32 => 4,  29 => 3,);
    }
}
